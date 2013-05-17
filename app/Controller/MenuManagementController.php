<?php
class MenuManagementController extends AppController {

	var $name = 'MenuManagement';
    var $uses = array('Menu');
	var $helpers = array('Html', 'Form');

	function index() {
		$search = @strtoupper($this->data['Menu']['search']);
		if(!empty($search)){
			$this->paginate = array(
				'conditions'=>array(
					'or'=>array(
						'UPPER(Menu.name) LIKE'=>"%$search%",
						'UPPER(Menu.name_cn) LIKE'=>"%$search%",
						'UPPER(Menu.name_th) LIKE'=>"%$search%"
					)),
				'order'=>array('Menu.seq_no'=>'ASC')
			);
			
			$this->Menu->recursive = 1;
			$this->set('menus',$this->paginate());
		}else{
			$this->paginate = array('order'=>array('Menu.seq_no'=>'ASC'));
			$this->Menu->recursive = 0;
			$this->set('menus', $this->paginate());
		}
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Menu', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('menu', $this->Menu->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
            $data = $this->data;
            $data['Menu']['_version_'] = $this->VERSION();
            
			$this->Menu->create();
			//$data['Menu']['update_by'] = $this->Session->read('GlobalUser.id');
			if ($this->Menu->save($data)) {
				$this->Session->setFlash(__('The Menu has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Menu could not be saved. Please, try again.', true));
			}
		}
		$stakeholders = $this->Menu->Stakeholder->find('list');
		$this->set(compact('stakeholders'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Menu', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
            $data = $this->data;
            $data['Menu']['_version_'] = $this->VERSION();
            
			//$data['Menu']['update_by'] = $this->Session->read('GlobalUser.id');
			if ($this->Menu->save($data)) {
				$this->Session->setFlash(__('The Menu has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Menu could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Menu->read(null, $id);
		}
		$stakeholders = $this->Menu->Stakeholder->find('list');
		$this->set(compact('stakeholders'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Menu', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Menu->delete($id)) {
			$this->Session->setFlash(__('Menu deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The Menu could not be deleted. Please, try again.', true));
		$this->redirect(array('action' => 'index'));
	}

}
?>