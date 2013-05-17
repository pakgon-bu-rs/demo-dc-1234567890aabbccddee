<?php
class GlobalUser extends AppModel{
    var $name = 'GlobalUser';
    var $useDbConfig = 'core';
    var $useTable = 'global_users'; 
	
	function login($code = '1000', $password = '1234'){
		$password = md5(md5($password)); // Generate 2 times md5 

		$sql = 'SELECT u.id, u.code, u.display, u.stakeholder_id, u.position_id, s.name AS stakeholder_name
				FROM core.global_users u
				  LEFT JOIN core.stakeholders s ON s.id = u.stakeholder_id
				WHERE code = \'' . $code . '\' AND pwd_md5x2 = \'' . $password . '\'';
		$data = $this->query($sql);
		
		if(!empty($data)){
			$session = $data[0][0];
			$id = $session['id'];
			return $session;
		}
	}

	
	//..........................................................................................................................
	
	
	
	function getMenu($stakeholder_id){
		$sql = "SELECT m.* FROM portal.stakeholders_menus shm
				LEFT JOIN portal.menus m ON m.id = shm.menu_id
				WHERE shm.stakeholder_id = '$stakeholder_id'";
		$data = $this->query($sql);
		
		return $data;
	}
}
?>