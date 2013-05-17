<?php
class TestController extends AppController{
    var $name = 'Test';
    var $uses = array('DocksType');
    var $components = array('ApiClient');
    var $helpers = array('Form', 'Html', 'Paginator');
    public $paginate = array();

    function index($id=0) {
//        $data = $this->paginate('DocksType');
        $data = $this->ApiClient->callFunction('configurations.reason_search');
        $this->paginate['total_page'] = $data['total_page'];
        $this->paginate['page'] = $data['page'];
        $this->paginate['count'] = $data['total_record'];
        $this->set('data', $data);
    }


    function test2($id=0) {
//pr($this->data);
//        if(!empty($this->data) || $id!=0){  //การเช็ค2ค่า
//            $key_word = empty($this->data) ? $id : $this->data['Pm']['key'] ;  //ถ้าว่างให้ใช้$id ถ้าไม่ว่าง$this->data['Pm']['key'](เหมือนif short)
//            $data = $this->ApiClient->CallFunction('general_info.product_info1' ,
//                                                       array('keyword'=>$key_word,'order'=>'','offset'=>'', 'limit'=>''));
//        }
//            $this->set('data',$data);
//            $this->set('id',$id);
//
//             $data = $this->ApiClient->CallFunction('general_info.product_info2' , array('id'=>$id));
//             $this->set('data',$data);
//             $this->set('id',$id);
////             pr($data);
//
//             $data = $this->ApiClient->CallFunction('general_info.product_info3' , array('id'=>$id));
//             $this->set('data',$data);
////             pr($data);
//             $this->set('id',$id);

    }
}
?>