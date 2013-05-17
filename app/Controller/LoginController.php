<?php
class LoginController extends AppController{
	var $name = 'Login';
	var $uses = array('GlobalUser');
	var $helpers = array('Form', 'Html');
	
	function index(){
		$this->layout = 'authentication';
		
		if(!empty($this->data)){
			$code = $this->data['Login']['code'];
			$password = $this->data['Login']['password'];
			
			$session = $this->GlobalUser->login($code, $password);
			//pr($session);exit;
			if(!empty($session)){
				$this->setSession($session);
                $this->redirect('/Home');
			}else{
				$this->Session->setFlash('Username / Password not valid'); 
				$this->data = null;
			}
		}else{
			if($this->Session->check("GlobalUser.id")){
				$this->redirect("/Home");
			}
		}
		//yarg test for ftp
	}
	
	
	function setSession($s){
		$this->Session->write('GlobalUser.id', $s['id']);
		$this->Session->write('GlobalUser.code', $s['code']);
		$this->Session->write('GlobalUser.display', $s['display']);
		$this->Session->write('GlobalUser.stakeholder_id', $s['stakeholder_id']);
		$this->Session->write('GlobalUser.stakeholder_name', $s['stakeholder_name']);
		$this->Session->write('GlobalUser.positions', $s['positions']);
		
		$this->redirect("/Home"); // redirect pages when login successful 
		
	}
	
}
?>