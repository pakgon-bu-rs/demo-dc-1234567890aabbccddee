<?php
App::uses('AppController', 'Controller');
/**
 * LocationsTypes Controller
 *
 * @property LocationsType $LocationsType
 * @property ApiClientComponent $ApiClient
 */
class LocationsTypesController extends AppController {

	public $name = "LocationsTypes";
	
	public $helpers = array('Html', 'Form','Session','DisplayFormat');
	public $components = array('ApiClient','Session');

	/**
	 *
	 * index method for zone management
	 * @author  Sarawutt.b
	 * @since   2013/05/03 15:27:26
	 * @license Pakgon Ltd ,Company
	 * @return  void
	 */
	public function index() {
            $key = @$this->data['Search']['keyword'];
            $is_active = empty($this->data['Search']['is_active']) ? "Y" : $this->data['Search']['is_active'];
            $page = 1;
            $order = "";
            if(isset($this->request->data['PaginateButton'])){
                $page = array_key_exists('page', $this->data['Paginate']) ? $this->data['Paginate']['page'] : 1 ;
                $order = array_key_exists('order', $this->data['Paginate']) ? $this->data['Paginate']['order'] : "" ;
            }
            $is_active = ($is_active == 'A') ? "" : $is_active;
            $datas = $this->ApiClient->CallFunction('configurations.location_type_search' ,array('keyword'=>$key , 'is_active'=>$is_active , 'page'=>$page , 'order'=>$order));
            $this->set('LocationsTypes',$datas);
            
//		$datatable = array();
//		$key = isset($this->data['LocationsType']['keyword']) ? $this->data['LocationsType']['keyword'] : '';
//		$page = 1;
//		$order = "";
//		
//		if(isset($this->request->data['PaginateButton'])){
//			$page = array_key_exists('page', $this->data['Paginate']) ? $this->data['Paginate']['page'] : 1 ;
//			$order = array_key_exists('order', $this->data['Paginate']) ? $this->data['Paginate']['order'] : "" ;
//		}
//		
//		$datatable = $this->ApiClient->CallFunction('configurations.location_type_search' ,array('keyword'=>$key , 'page'=>$page , 'order'=>$order));
//		$this->set("title_for_layout","Location Types Management");
//		$this->set('LocationsTypes',$datatable);
	}

   /**
	 *
	 * view method for show information detail data of Location Types management
	 * @author  Sarawutt.b
	 * @throws 	NotFoundException
	 * @param 	string $id
	 * @since   2013/05/09 14:11:26
	 * @license Pakgon Ltd ,Company
	 * @return  void
	 */
	public function view($id = null) {
		
		$result = $this->ApiClient->CallFunction('configurations.location_type_id_info',array('id'=>$id));//press view button
		$this->set('result', $result);
	}

	/**
	 *
	 * add method for add new Location Type for location type management module
	 * @author  Sarawutt.b
	 * @since   2013/05/09 11:52:26
	 * @license Pakgon Ltd ,Company
	 * @return  void
	 */
	public function add() {
		$result = array();
		$this->set("title_for_layout","Location Types Management");
		if ($this->request->is('post') || $this->request->is('put')) {
			$nameLocal = trim($this->data['LocationsType']['name']);
			$nameEng = trim($this->data['LocationsType']['name_eng']);
			$maxXaxis = trim($this->data['LocationsType']['max_column']);
			$maxYaxis = trim($this->data['LocationsType']['max_row']);
			$maxZaxis = trim($this->data['LocationsType']['max_level']);
			$capacityLimit = trim($this->data['LocationsType']['capacity_limit']);
			$description = trim($this->data['LocationsType']['description']);
			
			$params = array('name'=>$nameLocal,'name_eng'=>$nameEng,'max_column'=>$maxXaxis,'max_row'=>$maxYaxis,'max_level'=>$maxZaxis,'capacity_limit'=>$capacityLimit,'description'=>$description);
			$result = $this->ApiClient->CallFunction('#configurations.location_type_insert',$params);
			
			if($result[0] == 'Y'){
				$this->redirect(array('action' => 'index'));
			}else{
				echo "<script>alert('{$result["0"]}');</script>";	
			}
		}
	}
	
   /**
	 *
	 * Ask for location type has existing
	 * @author  Sarawutt.b
	 * @param 	string $id
	 * @since   2013/05/09 10:37:34
	 * @license Pakgon Ltd ,Company
	 * @return  void
	 */
	public function hasExitingID($id = null){
		$this->autoRender = FALSE;
		$result = array();
		if ($this->request->is('post') || $this->request->is('put')) {
			if(is_numeric($id)){
				$result = $this->ApiClient->CallFunction('configurations.location_type_id_info',array('id'=>$id));
			}
		}
	
		if(!(empty($result[0]['id']))){echo 'N';}else{echo 'Y';}
	}

	/**
	 *
	 * edit method for edit data of Location Type management
	 * @author  Sarawutt.b
	 * @throws 	NotFoundException
	 * @param 	string $id
	 * @since   2013/05/09 13:39:26
	 * @license Pakgon Ltd ,Company
	 * @return  void
	 */
	public function edit($id = null) {
		if (!$this->LocationsType->exists($id)) {
			throw new NotFoundException(__('Invalid locations type'));
		}
		
		$result = array();
		$this->set("title_for_layout","Location Types Management");
		if ($this->request->is('post') || $this->request->is('put')) {
			$Id = trim($this->data['LocationsType']['id']);
			$nameLocal = trim($this->data['LocationsType']['name']);
			$nameEng = trim($this->data['LocationsType']['name_eng']);
			$maxXaxis = trim($this->data['LocationsType']['max_column']);
			$maxYaxis = trim($this->data['LocationsType']['max_row']);
			$maxZaxis = trim($this->data['LocationsType']['max_level']);
			$capacityLimit = trim($this->data['LocationsType']['capacity_limit']);
			$description = trim($this->data['LocationsType']['description']);
			
			$params = array('id'=>$Id,'name'=>$nameLocal,'name_eng'=>$nameEng,'max_column'=>$maxXaxis,'max_row'=>$maxYaxis,'max_level'=>$maxZaxis,'capacity_limit'=>$capacityLimit,'description'=>$description);
			$result = $this->ApiClient->CallFunction('#configurations.location_type_update',$params);
			if($result[0] == 'Y'){
				$this->redirect(array('action' => 'index'));
			}else{
				echo "<script>alert('Type of Locations was not deleted with not valid parameter.');</script>";	
			}
		}else{
			$result = $this->ApiClient->CallFunction('configurations.location_type_id_info',array('id'=>$id));
			$result['LocationsType'] = $result['data'][0];
			unset($result['data'][0]);
			$this->request->data = $result;	
		}
	}

	/**
	 *
	 * delete method for delete Locations Type data of Locations Types management
	 * @author  Sarawutt.b
	 * @throws 	NotFoundException
	 * @param 	string $id
	 * @since   2013/05/09 09:51:26
	 * @license Pakgon Ltd ,Company
	 * @return  void
	 */
	public function delete($id = null) {
		$this->LocationsType->id = $id;
		$this->autoRender = FALSE;
		if (!$this->LocationsType->exists()) {
			throw new NotFoundException(__('Invalid locations type'));
		}
		
		$this->request->onlyAllow('post', 'delete');
		$result = array();
		if(is_numeric($id)){
			$result = $this->ApiClient->CallFunction('#configurations.location_type_delete',array('id'=>$id));
		}else{
			echo "<script>alert('Type of Locations was not deleted with not valid parameter.');</script>";
		}
	
		if(!empty($result)){
			if($result[0] == "Y"){
				$this->redirect(array('action'=>'index'));
			}else{
				echo "<script>alert('{$result["0"]}');</script>";
			}
		}
	}
	
	/**
	  * Test for API from back end
	  * @author		Sarawutt.b
	  * @since		2013/05/08
	  */
	function testApi(){
		//$this->autoRender = false;
		//$result = $this->ApiClient->CallFunction('configurations.location_type_search',array('keyword'=>'name','order'=>'id'));//press search button	
		//$result = $this->ApiClient->CallFunction('configurations.location_type_id_info',array('id'=>'2'));//press view button
		//$result = $this->ApiClient->CallFunction('#configurations.location_type_insert',array('name'=>'Test locations API update','name_eng'=>'Test locations API update','max_x_axis'=>'300','max_y_axis'=>'300','max_z_axis'=>'300','capacity_limit'=>'300','is_active'=>'Y','description'=>'description locatino type update'));//press insert button
		//$result = $this->ApiClient->CallFunction('#configurations.location_type_insert',array('name'=>'Test locations API update','name_eng'=>'Test locations API update','max_x_axis'=>'300','max_y_axis'=>'300','max_z_axis'=>'300','capacity_limit'=>'300','is_active'=>'Y','description'=>'description locatino type update'));//press insert button
		//$result = $this->ApiClient->CallFunction('configurations.location_type_delete',array('id'=>'6'));//press delete button
		//debug($result);exit;
	}
}
