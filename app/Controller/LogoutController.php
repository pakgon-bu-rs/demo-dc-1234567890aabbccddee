<?php
class LogoutController extends AppController{
	var $name = 'Logout';
	var $uses = array();
	
	function index(){
		$this->Session->destroy();
		
		$this->redirect('/Login/');
	}
}
?>