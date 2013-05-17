<?php
class VehicleTypesController extends AppController {
    var $name = 'VehicleTypes';
    var $helpers = array('Html', 'Form','DisplayFormat');
    var $components = array('ApiClient');

    function index() {
            $key = @$this->data['Vt']['key'];
            $is_active = empty($this->data['Vt']['is_active']) ? "Y" : $this->data['Vt']['is_active'];
            $page = 1;
            $order = "";
            
            if(isset($this->request->data['PaginateButton'])){
                $page = array_key_exists('page', $this->data['Paginate']) ? $this->data['Paginate']['page'] : 1 ;
                $order = array_key_exists('order', $this->data['Paginate']) ? $this->data['Paginate']['order'] : "" ;
            }
              
                                        $is_active = ($is_active == 'A') ? "" : $is_active;
                                        $datas = $this->ApiClient->CallFunction('configurations.vehicle_type_search' ,array('keyword'=>$key , 'page'=>$page , 
                                                                                   'is_active'=>$is_active ,'order'=>$order, 'limit'=>''));
                                        $this->set('datas',$datas);
     }
     
    function view($id=null) {

             $data = $this->ApiClient->CallFunction('configurations.vehicle_type_id_info',array('id'=>$id));
             $this->set('data',$data);    
     }  
     
    function add() {
        
            $active = array('Y' => 'Yes', 'N' => 'No'); 
            $this->set('active',$active);
            
           if(!empty($this->data)){
                $data = $this->ApiClient->CallFunction('#configurations.vehicle_type_insert' ,
                        array('name'=>$this->data['Vt']['name'],'name_eng'=>$this->data['Vt']['name_eng'],
                            'description'=>$this->data['Vt']['description'],'is_active'=>$this->data['Vt']['is_active'],
                            'uid'=>$this->Session->read('GlobalUser.id') ));
                       
                                 
                                       $this->redirect(array('action'=>'index'));
                             
           }  
     }
     
    function edit($id=null) {
        
              $active = array('Y' => 'Yes', 'N' => 'No'); 
              $this->set('active',$active);
              
              $data = $this->ApiClient->CallFunction('configurations.vehicle_type_id_info',array('id'=>$id));
              $this->set('data',$data);
             

            if(!empty($this->data)){ 
                $datas = $this->ApiClient->CallFunction('#configurations.vehicle_type_update' ,array('id'=>$this->data['Vt']['id'], 
                            'name'=>$this->data['Vt']['name'],'name_eng'=>$this->data['Vt']['name_eng'],
                            'description'=>$this->data['Vt']['description'],
                            'is_active'=>$this->data['Vt']['is_active'],'uid'=>$this->Session->read('GlobalUser.id') ));
                              $this->redirect(array('action'=>'index'));
                                                                      
                     }
       }

     
     
    function delete($id=null) {
          if (!empty($id)){
                $data=$this->ApiClient->CallFunction('#configurations.vehicle_type_delete' ,array('id'=>$id,'uid'=>$this->Session->read('GlobalUser.id')));

                    if($data[0]=='Y'){
                          $this->redirect(array('action'=>'index'));

                     } else {

                           echo "$data[0]";                   
                     }


            }
     }
}
?>
