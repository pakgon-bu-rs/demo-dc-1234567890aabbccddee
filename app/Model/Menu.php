<?php
class Menu extends AppModel {
/*
 * Config Change Log
 * 2012-11-02 change var $useDbConfig from "CORE" to "PORTAL"
 */
	var $name = 'Menu';
	var $useDbConfig = 'core';
    var $useTable = 'menus';
	var $validate = array(
		'name' => array('notempty'),
		'domain' => array('notempty'),
		'ports' => array('notempty'),
		'seq_no' => array('numeric')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasAndBelongsToMany = array(
		'Stakeholder' => array(
			'className' => 'Stakeholder',
			'joinTable' => 'stakeholders_menus',
			'foreignKey' => 'menu_id',
			'associationForeignKey' => 'stakeholder_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}
?>