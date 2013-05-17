<?php
class ReasonCodesController extends AppController {
    var $name = 'ReasonCodes';
    var $helpers = array('Html','Form');
    var $components = array('ApiClient');
    
    function index() {
            $key = @$this->data['Re']['key'];
            $is_active = empty($this->data['Re']['is_active']) ? "Y" : $this->data['Re']['is_active'];
            $page = 1;
            $order = "";
            
            if(isset($this->request->data['PaginateButton'])){
                        $page = array_key_exists('page', $this->data['Paginate']) ? $this->data['Paginate']['page'] : 1 ;
                        $order = array_key_exists('order', $this->data['Paginate']) ? $this->data['Paginate']['order'] : "" ;
                    }
                     
                         $is_active = ($is_active == 'A') ? "" : $is_active;   
                         $result = $this->ApiClient->CallFunction('general_info.reason_search',array('keyword'=>$key,'is_active'=> $is_active,
                                            'page'=>$page ,'order'=>$order, 'limit'=>'10'));
                        $this->set('result',$result);
    
      
     }
    
    
     function view($id=null){

         $data = $this->ApiClient->CallFunction('general_info.reason_id_info' ,array('id'=>$id));
         $this->set('data',$data);
         
     }
    function edit($id=null) {
              $data = $this->ApiClient->CallFunction('configurations.reason_id_info' ,array('id'=>$id));
              $this->set('data',$data);
           
            
                if(!empty($this->data)){ 
                
                                       $this->redirect(array('action'=>'index'));
                               

                            
                }
     }
}



?>
