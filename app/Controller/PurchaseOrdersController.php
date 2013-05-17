<?php
class PurchaseOrdersController extends AppController {
    var $name = 'PurchaseOrders';
    var $helpers = array('Html', 'Form','DisplayFormat');
    var $components = array('ApiClient');
    
    function index() {

        if(!empty($this->data)){
            $result = $this->ApiClient->CallFunction('purchase_order.po_search' , 
                                                       array('keyword'=>$this->data['Po']['key'],'order'=>'','offset'=>'', 'limit'=>''));
 
            $this->set('result',$result);
           
            
         }else {
                    $result = $this->ApiClient->CallFunction('purchase_order.po_search' ,array());
                    $this->set('result',$result);
                   
                }
    }
     
    function view($id=null){

         $datas = $this->ApiClient->CallFunction('purchase_order.po_detail_list' ,array('id'=>$id));
//         pr($data);
         $this->set('datas',$datas);
     }
}
?>