<?php
class Login extends AppModel{
	var $name = 'Login';
	var $useDbConfig = 'core';
	var $useTable = 'global_users';
	
	function login($code = '1000', $password = '1234'){
		$password = md5(md5($password));
		
		$sql = "SELECT * FROM handheld.handheld_users WHERE code = '$code' AND password = '$password'";
		//$data = $this->query($sql);
		
		//debug($data);
	}
	
}
?>