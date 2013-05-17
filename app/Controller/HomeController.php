<?php
class HomeController extends AppController{
	var $name = 'Home';
	var $uses = array('GlobalUser');
	var $helpers = array('Form', 'Html');
	
	function index(){
		$stakeholder_id = $this->Session->read("GlobalUser.stakeholder_id");
		if($this->Session->check("GlobalUser.id")){
            
		}else{
			$this->redirect('/Login');
			$this->setFlash("Please login!!!");
		}
	}
}

?>