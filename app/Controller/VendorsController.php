<?php
App::uses('AppController', 'Controller');
/**
 * 
 * Vendors Controller handle for Vendors Management module
 * @author		Sarawutt.b
 * @property 	Vendor $Vendor
 * @property 	ApiClientComponent $ApiClient
 * @since		2013/05/03 15:38:26
 * @license		Pakgon Ltd, Company
 */
class VendorsController extends AppController {

	public $name = 'Vendors';
	public $uses = array('Vendor');
	public $helpers = array('Html','Form','DisplayFormat');
	public $components = array('ApiClient');
	
	/**
	 *
	 * index method for vendors management
	 * @author  Sarawutt.b
	 * @since   2013/05/03 15:27:26
	 * @license Pakgon Ltd ,Company
	 * @return  void
	 */
	public function index() {
/*		$datatable = array();
		$this->set("title_for_layout","Vendors Management");
		
		if($this->request->is('post') || $this->request->is('put')){
			$params = trim($this->data['Vendor']['keyword']);
			$page = 1;
            $order = "";
			
			if(isset($this->request->data['PaginateButton'])){
                $page = array_key_exists('page', $this->data['Paginate']) ? $this->data['Paginate']['page'] : 1 ;
                $order = array_key_exists('order', $this->data['Paginate']) ? $this->data['Paginate']['order'] : "" ;
            }
			
			if(!empty($params)){
				$datatable = $this->ApiClient->CallFunction('general_info.vendor_search',array('keyword'=>$params,'page'=>$page,'order'=>'id'));//press search button
			}else{
				$datatable = $this->ApiClient->CallFunction('general_info.vendor_search',array('page'=>$page,'order'=>'id'));//press search button
			}	
		}else{
			$datatable = $this->ApiClient->CallFunction('general_info.vendor_search',array('page'=>$page,'order'=>'id'));//press search button
		}
		
		$this->set('vendors', $datatable);*/
		
			$datatable = array();
			$this->set("title_for_layout","Vendors Management");
		 	$key = isset($this->data['Vendor']['keyword']) ? $this->data['Vendor']['keyword'] : '';
            $page = 1;
            $order = "";
            if(isset($this->request->data['PaginateButton'])){
                $page = array_key_exists('page', $this->data['Paginate']) ? $this->data['Paginate']['page'] : 1 ;
                $order = array_key_exists('order', $this->data['Paginate']) ? $this->data['Paginate']['order'] : "" ;
            }
           $datatable = $this->ApiClient->CallFunction('general_info.vendor_search' ,array('keyword'=>$key , 'page'=>$page , 'order'=>$order));
            $this->set('vendors',$datatable);
	}

   /**
	 *
	 * view method for show information detail data of vendors management
	 * @author  Sarawutt.b
	 * @throws 	NotFoundException
	 * @param 	string $id
	 * @since   2013/05/03 15:27:26
	 * @license Pakgon Ltd ,Company
	 * @return  void
	 */
	public function view($id = null) {
		$this->set("title_for_layout","Vendors Management");
		if (!$this->Vendor->exists($id)) {
			throw new NotFoundException(__('Invalid vendor'));
		}
		
		$result = $this->ApiClient->CallFunction('general_info.vendor_id_info',array('id'=>$id));
		$this->set('vendor', $result);
	}
	
	/**
	  * Test for API from back end
	  * @author		Sarawutt.b
	  * @since		2013/05/08
	  */
	function testApi(){
		//$this->autoRender = false;
		//$result = $this->ApiClient->CallFunction('general_info.vendor_search',array('keyword'=>'vendor','order'=>'id'));//press search button	
		//$result = $this->ApiClient->CallFunction('general_info.vendor_id_info',array('id'=>'88888'));//press view button
		//debug($result);exit;
	}

}
