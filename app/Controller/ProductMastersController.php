<?php
    class ProductMastersController extends AppController {
        var $name = 'ProductMasters';
        var $helpers = array('Html', 'Form');
        var $components = array('ApiClient');
    
    function index() {
        if(!empty($this->data)){ 
 
             $key_word =$this->data['Pm']['key'] ;

             $data = $this->ApiClient->CallFunction('general_info.product_info1',array('keyword'=>$key_word));
             $this->set('data',$data);

             $datas = $this->ApiClient->CallFunction('general_info.product_info2',array('keyword'=>$key_word ));
             $this->set('datas',$datas);
      

//             $result = $this->ApiClient->CallFunction('general_info.product_info3',array('keyword'=>$key_word ));
//             $this->set('result',$result);

         }  
     
      }
}

?> 