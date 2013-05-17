<?php
class GlobalUsersController extends AppController {

	var $name = 'GlobalUsers';
    var $uses = array('GlobalUser', 'StakeholdersMenu', 'Stakeholder', 'Menu', 'Position');
	var $helpers = array('Html', 'Form');

	function index() {
        $this->GlobalUser->recursive = 0;


        if(!empty($this->data['GlobalUser']['txtSearch'])){
            $conditions = array();
            $txtSearch = strtoupper($this->data['GlobalUser']['txtSearch']);

            $conditions= array(" (UPPER(GlobalUser.display) LIKE '%".strtoupper($txtSearch)."%' OR UPPER(GlobalUser.email) LIKE '%".strtoupper($txtSearch)."%'  
OR UPPER(GlobalUser.ref3) LIKE '%".strtoupper($txtSearch)."%'
)AND status <>'D' "); 
        } 
        else{
            $conditions=array(" UPPER(GlobalUser.status) !='D' ");
        }
        //print_r($conditions); 
        $this->paginate = array(
        'totallimit'=>'10',
        'limit'=>'10',
        'conditions'=>$conditions
        );
        $globalUsers = $this->paginate('GlobalUser');
        $this->set('globalUsers', $globalUsers);
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Users', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('globalUser', $this->GlobalUser->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->GlobalUser->create();
            $data = $this->data;
            $data["GlobalUser"]["_version_"] = $this->VERSION(); 
            
			if ($this->GlobalUser->save($data)) {
				$this->Session->setFlash(__('The users has been saved', true));
				$this->redirect('/GlobalUsers');
			} else {
				$this->Session->setFlash(__('The users could not be saved. Please, try again.', true));
			}
		}
        
        $positions = $this->Position->find('list', array('fields'=>array('id', 'position_name')));
		$this->set('positions', $positions);
        
        $stakeholders = $this->Stakeholder->find('list');
		$this->set('stakeholders', $stakeholders);
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid users', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
            $data = $this->data;
                               		 $data["GlobalUser"]["_version_"] =$this->VERSION(); 
			if ($this->GlobalUser->save($data)) {
				$this->Session->setFlash(__('The users has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The users could not be saved. Please, try again.', true));
				
			}
		}
		if (empty($this->data)) {
			$this->data = $this->GlobalUser->read(null, $id);
		}
        
        $positions = $this->Position->find('list', array('fields'=>array('id', 'position_name')));
		$this->set('positions', $positions);
        
        $stakeholders = $this->Stakeholder->find('list');
		$this->set('stakeholders', $stakeholders);
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid ID for GlobalUser', true));
			$this->redirect(array('action' => 'index'));
		}
		else{
            $data = $this->data;
			$data["GlobalUser"]["id"] =$id ; 
			$data["GlobalUser"]["status"] ='D';  
			$data["GlobalUser"]["_version_"] = $this->VERSION(); 
			
			$this->GlobalUser->save($this->data["GlobalUser"]); 
			$this->Session->setFlash(__('Users Deactivated', true));
			$this->redirect(array('action' => 'index'));
		}
		/*
		if ($this->GlobalUser->del($id)) {
			$this->Session->setFlash(__('Users Deactivated', true));
			$this->redirect(array('action' => 'index'));
		}
		*/
		
		$this->Session->setFlash(__('The users could not be deactive. Please, try again.', true));
		$this->redirect(array('action' => 'index'));
	}

}
?>