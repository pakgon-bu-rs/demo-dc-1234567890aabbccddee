<?php
App::uses('AppController', 'Controller');
 /**
 *
 * Lcoation Controller handle for Locatino Management module
 * @author		Sarawutt.b
 * @property 	Location $Location
 * @property 	ApiComponent $ApiClient
 * @since		2013/05/15 10:05:26
 * @license		Pakgon Ltd, Company
 */
class LocationsController extends AppController {
	
	public $name = "Locations";
	public $uses = array();
	public $helpers = array('Html', 'Form','Session','DisplayFormat');
	public $components = array('ApiClient','Session');


	/**
	 *
	 * index method for Location management
	 * @author  Sarawutt.b
	 * @since   2013/05/03 15:20:26
	 * @license Pakgon Ltd ,Company
	 * @return  void
	 */
	public function index() {
/*		$datatable = array();
		$key = isset($this->data['Locations']['keyword']) ? $this->data['Locations']['keyword'] : '';
		$page = 1;
		$order = "";
		
		if(isset($this->request->data['PaginateButton'])){
			$page = array_key_exists('page', $this->data['Paginate']) ? $this->data['Paginate']['page'] : 1 ;
			$order = array_key_exists('order', $this->data['Paginate']) ? $this->data['Paginate']['order'] : "" ;
		}
		
		$datatable = $this->ApiClient->CallFunction('configurations.location_search' ,array('keyword'=>$key , 'page'=>$page , 'order'=>$order));
		$this->set("title_for_layout","Locations Management");
		//debug($datatable);exit;
		$this->set('locations',$datatable);
		
		
		*/
		
		    $key = @$this->data['Search']['keyword'];
            $is_active = empty($this->data['Search']['is_active']) ? "Y" : $this->data['Search']['is_active'];
            $page = 1;
            $order = "";
            if(isset($this->request->data['PaginateButton'])){
                $page = array_key_exists('page', $this->data['Paginate']) ? $this->data['Paginate']['page'] : 1 ;
                $order = array_key_exists('order', $this->data['Paginate']) ? $this->data['Paginate']['order'] : "" ;
            }
            $is_active = ($is_active == 'A') ? "" : $is_active;
            $datas = $this->ApiClient->CallFunction('configurations.location_search' ,array('keyword'=>$key , 'is_active'=>$is_active , 'page'=>$page , 'order'=>$order));
			$this->set('locations',$datas);
			
			
			
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Location->exists($id)) {
			throw new NotFoundException(__('Invalid location'));
		}
		$options = array('conditions' => array('Location.' . $this->Location->primaryKey => $id));
		$this->set('location', $this->Location->find('first', $options));
	}
	
	/**
	 *
	 * build for ddl for zone
	 * @author  Sarawutt.b
	 * @since   2013/05/09 17:18:26
	 * @license Pakgon Ltd ,Company
	 * @return  array() in cake ddl format
	 */
	public function buildZoneDDL(){
		$zones = $this->ApiClient->CallFunction('configurations.zone_search',array('order'=>'id'));
		$zoneOptions = array();
		//if(!empty($zones)){
			foreach($zones as $zone){
				$zoneOptions += array($zone['id']=>$zone['name']);
			}	
		//}
		return $zoneOptions;
	}
	
	/**
	 *
	 * build for ddl for location type
	 * @author  Sarawutt.b
	 * @since   2013/05/09 17:18:26
	 * @license Pakgon Ltd ,Company
	 * @return  array() in cake ddl format
	 */
	public function buildLocationTypeDDL(){
		$locationTypes = $this->ApiClient->CallFunction('configurations.location_type_search',array('order'=>'id'));
		$locationTypeOptions = array();
		//if(!empty($locationTypeOptions)){
			foreach($locationTypes as $locationType){
				$locationTypeOptions += array($locationType['id']=>$locationType['name_local']);
			}	
		//}
		return $locationTypeOptions;
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->set('zoneOptions',$this->buildZoneDDL());
		$this->set('locationTypeOptions',$this->buildLocationTypeDDL());
		
/*		if ($this->request->is('post')) {
			$this->Location->create();
			if ($this->Location->save($this->request->data)) {
				$this->Session->setFlash(__('The location has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The location could not be saved. Please, try again.'));
			}
		}*/
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Location->exists($id)) {
			throw new NotFoundException(__('Invalid location'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Location->save($this->request->data)) {
				$this->Session->setFlash(__('The location has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The location could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Location.' . $this->Location->primaryKey => $id));
			$this->request->data = $this->Location->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Location->id = $id;
		if (!$this->Location->exists()) {
			throw new NotFoundException(__('Invalid location'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Location->delete()) {
			$this->Session->setFlash(__('Location deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Location was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	
		/**
	  * Test for API from back end
	  * @author		Sarawutt.b
	  * @since		2013/05/08
	  */
	function testApi(){
		$this->autoRender = false;
		//$result = $this->ApiClient->CallFunction('configurations.location_search',array('id'=>'3-2-2-B','zones_id'=>'3','locations_types_id'=>'6'));//press search button	
		//$result = $this->ApiClient->CallFunction('configurations.location_id_info',array('id'=>'3-2-2-B'));//press view button
		//$result = $this->ApiClient->CallFunction('#configurations.location_create',array('zones_id'=>'3','locations_types_id'=>'6','level_from'=>'A','level_to'=>'B','column_from'=>'1','column_to'=>'2','row_from'=>'1','row_to'=>'2','status'=>'A'));//press insert button or update button
		//$result = $this->ApiClient->CallFunction('#configurations.location_save',array('id'=>'3-2-2-B','zones_id'=>'3','locations_types_id'=>'6','note'=>'NOTE UPDATE','status'=>'I'));//used for update
		debug($result);//exit;
	}
	
	
	
	function buildJquery(){
		//$this->autoRender = false;	
		$this->set('zoneOptions',array());
		$this->set('locationTypeOptions',array());
	}
}
