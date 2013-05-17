<?php
App::uses('AppModel', 'Model');
 /**
 * 
 * Vendor Model handle for Vendors Management module
 * @author		Sarawutt.b
 * @since		2013/05/03 11:38:26
 * @license		Pakgon Ltd, Company
 */
class Vendor extends AppModel {
	public $useDbConfig = 'core';
	public $displayField = 'name';
	public $useTable = 'vendors';
}
