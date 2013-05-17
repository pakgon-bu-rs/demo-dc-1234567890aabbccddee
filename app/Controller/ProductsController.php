<?php
class ProductsController extends AppController {
    var $name = 'Products';
    var $helpers = array('Html', 'Form');
    var $components = array('ApiClient');
    
    function index() {
        if(!empty($this->data)){
            $result = $this->ApiClient->CallFunction(' ' , 
                                                       array('keyword'=>$this->data['Po']['key'],'order'=>'','offset'=>'', 'limit'=>''));
//         pr($result);
            $this->set('result',$result);
            
         }else {
                   
                }
    }
    
  
}
?>