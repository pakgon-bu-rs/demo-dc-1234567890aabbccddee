<?php
class DocksController extends AppController {
    var $name = 'Docks';
    var $helpers = array('Html', 'Form','DisplayFormat');
    var $components = array('ApiClient');
    
   function index() {
            $key = @$this->data['Do']['key'];
            $is_active = empty($this->data['Do']['is_active']) ? "Y" : $this->data['Do']['is_active'];

            $dock_type_list= $this->ApiClient->CallFunction('configurations.dock_type_list',array());
            $this->set('dock_type_list',$dock_type_list);
            
            $page = 1;
            $order = "";
            
            if(isset($this->request->data['PaginateButton'])){
                        $page = array_key_exists('page', $this->data['Paginate']) ? $this->data['Paginate']['page'] : 1 ;
                        $order = array_key_exists('order', $this->data['Paginate']) ? $this->data['Paginate']['order'] : "" ;
                    }
                         $dock_type_id=@$this->data['Do']['docks_types_id'];
                         $dock_type_id = ( $dock_type_id == 'A') ? "" :  $dock_type_id;  
                         $is_active = ($is_active == 'A') ? "" : $is_active;   
                         
                         $datas = $this->ApiClient->CallFunction('configurations.dock_search',array('keyword'=>$key ,
                             'dock_type_id'=>$dock_type_id,'is_active'=> $is_active,'page'=>$page , 'order'=>$order, 'limit'=>'10'));
                         $this->set('datas',$datas);
                       
             
            
                                 
     }

   function view($id=null) {
           
            $data = $this->ApiClient->CallFunction('configurations.dock_id_info' ,array('id'=>$id));
            $this->set('data',$data);   
     }  


   function add() {
       if(!empty($this->data)){
          $data = $this->ApiClient->CallFunction('#configurations.dock_insert',array('description'=>$this->data['Do']['description'],
                                                'name_eng'=>$this->data['Do']['name_eng'] ,'name'=>$this->data['Do']['docks_name'] ,
                                                'dock_type_id'=>$this->data['Do']['docks_types_name'],'is_active'=>$this->data['Do']['is_active'],
                                                'uid'=>$this->Session->read('GlobalUser.id') ));
                                                $this->redirect(array('action'=>'index'));
                                              
        }
           $dock_type_list= $this->ApiClient->CallFunction('configurations.dock_type_list',array());
           $this->set('dock_type_list',$dock_type_list);
        
           $active = array('Y' => 'Yes', 'N' => 'No'); 
           $this->set('active',$active);
    }
    
   function edit($id=null) {
             if(!empty($this->data)){ 
                    $data = $this->ApiClient->CallFunction('#configurations.dock_update',array('id'=>$this->data['Do']['id'],
                                                        'description'=>$this->data['Do']['description'],
                                                        'name_eng'=>$this->data['Do']['name_eng'] ,'name'=>$this->data['Do']['docks_name'] ,
                                                        'dock_type_id'=>$this->data['Do']['docks_types_name'],'is_active'=>$this->data['Do']['is_active'],
                                                        'uid'=>$this->Session->read('GlobalUser.id') ));
                                                        $this->redirect(array('action'=>'view',$id)); 
               }
              $this->set('id',$id);
              
              $data = $this->ApiClient->CallFunction('configurations.dock_id_info' ,array('id'=>$id));
              $this->set('data',$data);
              
              $active = array('Y' => 'Yes', 'N' => 'No'); 
              $this->set('active',$active);
              
              $dock_type_list= $this->ApiClient->CallFunction('configurations.dock_type_list' ,array('id'=>$id));
              $this->set('dock_type_list',$dock_type_list);

     }

   function delete($id=null) {

        if (!empty($id)){
              $data=$this->ApiClient->CallFunction('#configurations.dock_delete' ,array('id'=>$id,'uid'=>$this->Session->read('GlobalUser.id') ));
              
              if($data[0]=='Y'){
                   $this->redirect(array('action'=>'index'));
                   
              } else {
                        echo "$data[0]";                   
                     }
         }
   
    }
    
}
?>
