<?php
App::uses('AppController', 'Controller');
class DocksTypesController extends AppController {
    var $name = 'DocksTypes';
    var $helpers = array('Html', 'Form','DisplayFormat');
    var $components = array('ApiClient');
	
	function index() {
            $key = @$this->data['Search']['keyword'];
            $is_active = empty($this->data['Search']['is_active']) ? "Y" : $this->data['Search']['is_active'];
            $page = 1;
            $order = "";
            if(isset($this->request->data['PaginateButton'])){
                $page = array_key_exists('page', $this->data['Paginate']) ? $this->data['Paginate']['page'] : 1 ;
                $order = array_key_exists('order', $this->data['Paginate']) ? $this->data['Paginate']['order'] : "" ;
            }
            $is_active = ($is_active == 'A') ? "" : $is_active;
            $datas = $this->ApiClient->CallFunction('configurations.dock_type_search' ,array('keyword'=>$key , 'is_active'=>$is_active , 'page'=>$page , 'order'=>$order));
            $this->set('datas',$datas);
	}
        
	function view($id=null) {
		$data = $this->ApiClient->CallFunction('configurations.dock_type_id_info' ,array('id'=>$id));
                $this->set('data',$data);  
	}
        
	function add() {
            $active = array('Y' => 'Yes', 'N' => 'No'); 
            $this->set('active',$active);
            
            if(!empty($this->data)){
                $data = $this->ApiClient->CallFunction('#configurations.dock_type_insert',array('id'=>$this->data['Dt']['id'],'description'=>$this->data['Dt']['description'],
                        'name'=>$this->data['Dt']['name'] ,'name_eng'=>$this->data['Dt']['name_eng'],'is_active'=>$this->data['Dt']['is_active'],
                        'uid'=>$this->Session->read('GlobalUser.id') ));
                         $this->redirect(array('action'=>'index')); 
                            
            }else{
              
                 }
        }
        
	function edit($id=null) {
            if(!empty($this->data)){
                    $data = $this->ApiClient->CallFunction('#configurations.dock_type_update',array('id'=>$this->data['Dt']['id'],
                    'description'=>$this->data['Dt']['description'],'name'=>$this->data['Dt']['name'] ,'name_eng'=>$this->data['Dt']['name_eng'],
                    'is_active'=>$this->data['Dt']['is_active'],'uid'=>$this->Session->read('GlobalUser.id') ));
                   $this->redirect(array('action'=>'view',$id)); 
            }
            
            $this->set('id',$id);
            
            $active = array('Y' => 'Yes', 'N' => 'No'); 
            $this->set('active',$active);
            
            $data = $this->ApiClient->CallFunction('configurations.dock_type_id_info' ,array('id'=>$id));
            $this->set('data',$data); 
            
	}
        
	function delete($id=null) {
            
	if (!empty($id)){
              $data=$this->ApiClient->CallFunction('#configurations.dock_type_delete' ,array('id'=>$id,'uid'=>$this->Session->read('GlobalUser.id')  ));
              
              if($data[0]=='Y'){
                   $this->redirect(array('action'=>'index'));
              } else {
                  
                  $this->redirect(array('action'=>'index'));
              }
         }
	}
}
