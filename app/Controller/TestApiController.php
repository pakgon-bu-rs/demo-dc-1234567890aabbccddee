<?php
class TestApiController extends AppController {

	var $name = 'TestApi';
	var $helpers = array('Html', 'Form');
        public $components = array('ApiClient');
        
        function index(){
            if(!empty($this->data)){
                $function = $this->data['Input']['function'];
                $params = $this->data['Input']['params'];
                if (array_key_exists('call', $this->data)) {
                    $result = $this->ApiClient->CallFunction($function , $params);
                }elseif(array_key_exists('debug', $this->data)) {
                    $result = $this->ApiClient->DebugFunction($function , $params);
                }
                $this->set('function' , $function);
                $this->set('params' , $params);
                $this->set('result' , $result);
            }
        }
}
?>
