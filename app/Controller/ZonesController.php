<?php
App::uses('AppController', 'Controller');
/**
 *
 * Zones Controller handle for Zone Management module
 * @author		Sarawutt.b
 * @property 	Zone $Zone
 * @property 	ApiComponent $ApiClient
 * @since		2013/05/03 11:38:26
 * @license		Pakgon Ltd, Company
 */
class ZonesController extends AppController {

	public $name = "Zones";
	public $uses = array();
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
            $order = "id";
            if(isset($this->request->data['PaginateButton'])){
                $page = array_key_exists('page', $this->data['Paginate']) ? $this->data['Paginate']['page'] : 1 ;
                $order = array_key_exists('order', $this->data['Paginate']) ? $this->data['Paginate']['order'] : "" ;
            }
            $is_active = ($is_active == 'A') ? "" : $is_active;
            $datas = $this->ApiClient->CallFunction('configurations.zone_search' ,array('keyword'=>$key , 'is_active'=>$is_active , 'page'=>$page , 'order'=>$order));
            $this->set('zones',$datas);
	}
	 
   /**
	 *
	 * view method for show information detail data of zone management
	 * @author  Sarawutt.b
	 * @throws 	NotFoundException
	 * @param 	string $id
	 * @since   2013/05/03 15:27:26
	 * @license Pakgon Ltd ,Company
	 * @return  void
	 */
	public function view($id = null) {
		
		$result = $this->ApiClient->CallFunction('configurations.zone_id_info',array('id'=>$id));
		$this->set('result', $result);
	}

	/**
	 *
	 * add method for add new zone for zone management module
	 * @author  Sarawutt.b
	 * @since   2013/05/03 15:27:26
	 * @license Pakgon Ltd ,Company
	 * @return  void
	 */
	public function add() {
		$result = array();
		$this->set("title_for_layout","Zone Management");
		if ($this->request->is('post') || $this->request->is('put')) {
			$zoneId = trim($this->data['Zone']['id']);
			$zoneNameLocal = trim($this->data['Zone']['name']);
			$zoneNameEng = trim($this->data['Zone']['name_eng']);
			$zoneNote = trim($this->data['Zone']['note']);
			$params = array('id'=>$zoneId,'name'=>$zoneNameLocal,'name_eng'=>$zoneNameEng,'note'=>$zoneNote,'uid'=>$this->Session->read('GlobalUser.id'));
			
			
			$result = $result = $this->ApiClient->callFunction('#configurations.zone_insert',$params);//press insert button or update button
			if($result[0] == 'Y'){
				$this->redirect(array('action' => 'index'));
			}else{
				echo "<script>alert('{$result["0"]}');</script>";	
			}
		}
	}
	 
   /**
	 *
	 * Ask for zone has existing
	 * @author  Sarawutt.b
	 * @param 	string $id
	 * @since   2013/05/08 15:37:34
	 * @license Pakgon Ltd ,Company
	 * @return  void
	 */
	public function hasExitingZoneID($id = null){
		$this->autoRender = FALSE;
		$result = array();
		if ($this->request->is('post') || $this->request->is('put')) {
			if(is_numeric($id)){
				$result = $this->ApiClient->CallFunction('configurations.zone_id_info',array('id'=>$id));	
			}
		}
		
		if(isset($result['id'])){echo 'N';}else{echo 'Y';}
	}
	
	/**
	 *
	 * edit method for edit data of zone management
	 * @author  Sarawutt.b
	 * @throws 	NotFoundException
	 * @param 	string $id
	 * @since   2013/05/03 15:27:26
	 * @license Pakgon Ltd ,Company
	 * @return  void
	 */
	public function edit($id = null) {
		if (!$this->Zone->exists($id)) {
			throw new NotFoundException(__('Invalid zone'));
		}
		
		$result = array();
		$this->set("title_for_layout","Zone Management");
		if ($this->request->is('post') || $this->request->is('put')) {
			$zoneId = trim($this->data['Zone']['id']);
			$zoneNameLocal = trim($this->data['Zone']['name']);
			$zoneNameEng = trim($this->data['Zone']['name_eng']);
			$zoneNote = trim($this->data['Zone']['note']);
			$params = array('id'=>$zoneId,'name'=>$zoneNameLocal,'name_eng'=>$zoneNameEng,'note'=>$zoneNote,'uid'=>$this->Session->read('GlobalUser.id'));
			
			$result = $result = $this->ApiClient->CallFunction('#configurations.zone_update',$params);
			if($result[0] == 'Y'){
				$this->redirect(array('action' => 'index'));
			}else{
				echo "<script>alert('{$result["0"]}');</script>";	
			}
		}else{
			$result = $this->ApiClient->CallFunction('configurations.zone_id_info',array('id'=>$id));
			$this->request->data['Zone'] = isset($result['id']) ? $result : array();
		}
	}
	 
	/**
	 *
	 * delete method for delete zone data of zone management
	 * @author  Sarawutt.b
	 * @throws 	NotFoundException
	 * @param 	string $id
	 * @since   2013/05/03 15:27:26
	 * @license Pakgon Ltd ,Company
	 * @return  void
	 */ 
	public function delete($id = null) {
		$this->Zone->id = $id;
		$this->autoRender = FALSE;
		if (!$this->Zone->exists()) {
			throw new NotFoundException(__('Invalid zone'));
		}
		
		//$this->request->onlyAllow('post', 'delete');
		$result = array();
		if(is_numeric($id)){
			$result = $this->ApiClient->CallFunction('#configurations.zone_delete',array('id'=>$id));
			if($result[0] == 'Y'){
				$this->redirect(array('action' => 'index'));
			}else{
				echo "<script>alert('{$result["0"]}');</script>";
			}
		}else{
			$this->redirect(array("action"=>"index"));
		}
	}
	
	/**
	  * Test for API from back end
	  * @author		Sarawutt.b
	  * @since		2013/05/08
	  */
	function testApi(){
		//$this->autoRender = false;
		//$result = $this->ApiClient->CallFunction('configurations.zone_search',array('keyword'=>'zone'));//press search button
		//$result = $this->ApiClient->CallFunction('configurations.zone_id_info',array('id'=>'1'));//press view button
		//$result = $this->ApiClient->CallFunction('#configurations.zone_insert',array('name'=>'Test zone API 2','name_eng'=>'test zone save zpi 2','note'=>'test note 2'));//press insert button
		//$result = $this->ApiClient->CallFunction('#configurations.zone_update',array('id'=>'1','name'=>'Test zone API update 111111','name_eng'=>'test zone save zpi update 1111111','note'=>'test note update 111111'));//press insert button
		//$result = $this->ApiClient->CallFunction('#configurations.zone_delete',array('id'=>'1'));//press delete button
		//debug($result);exit;
		
	}
}
