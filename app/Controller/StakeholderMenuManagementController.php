<?php
class StakeholderMenuManagementController extends AppController{
	var $name = 'StakeholderMenuManagement';
	var $uses = array('StakeholdersMenu', 'Stakeholder', 'Menu', 'Application');
	var $helpers = array('Form', 'Html');
	
	function index(){
                    
		$data = $this->Stakeholder->find('all',array("order"=>"name"));
		$this->set('data', $data);
	}
	
	
	function add(){
        $applicationDataLists  = $this->Application->find('list',array("order"=>"name",'fields'=>array('id','name'))); 
        $this->set('applicationDataLists',$applicationDataLists); 
		if(!empty($this->data)){
			$data['Stakeholders']["name"] = $this->data['StakeholderMenuManagement']["name"];
            $data['Stakeholders']["application_id"] = $this->data['StakeholderMenuManagement']["application_id"];
            $data['Stakeholders']["is_active"] = "Y"; 
            $data['Stakeholders']['_version_'] = $this->VERSION();
                                
			if($this->Stakeholder->save($data["Stakeholders"])){
                $this->Session->setFlash('Stakeholder has been added.'); 
                $this->redirect("/StakeholderMenuManagement"); 
            }
            else{
                $this->Session->setFlash('Stakeholder cannot add, please try again.'); 
                $this->redirect("/StakeholderMenuManagement"); 
            }
		}
		
		$stakeholders = $this->Stakeholder->find('list');
		$menus = $this->Menu->find('list', array(
							'fields'=>array('Menu.id', 'Menu.name')
		));
		
		$this->set('stakeholders', $stakeholders);
		$this->set('menus', $menus);
	}
	
	
	function view($stakeholder_id){
		$added_menu = $this->StakeholdersMenu->find('all', array(
			'conditions'=>array('StakeholdersMenu.stakeholder_id'=>$stakeholder_id)
		));
		
	}
	
	
    function edit($stakeholder_id = null){
        if(empty($stakeholder_id) && empty($this->data)){
            $this->redirect("/StakeholderMenuManagement");
        }
        
        if(!empty($this->data)){
            $data = $this->data;
            $data['Stakeholder']['_version_'] = $this->VERSION();
            
            $this->Stakeholder->create();
            if($this->Stakeholder->save($data)){
                $this->redirect('/StakeholderMenuManagement');
            }else{
                $this->Session->setFlash("Error!!!");
            }
        }else{
            $data = $this->Stakeholder->find('first', array(
                'conditions'=>array('Stakeholder.id'=>$stakeholder_id)
            ));
            $this->set('data', $data);
            
            $application = $this->Application->find('list', array('fields'=>array('id', 'name')));
            $this->set('application_list', $application);
            
            $this->data = $data;
        }
    }
    
    
    function deleteStakeholder($stakeholder_id = null){
        if(empty($stakeholder_id)){
            $this->redirect('/StakeholderMenuManagement');
        }else{
            if($this->Stakeholder->delete($stakeholder_id)){
                $this->redirect('/StakeholderMenuManagement');
            }
        }
    }
    
    
    
	function menu($stakeholder_id = null){	
		if(!empty($this->data)){
			$data = $this->data['StakeholderMenuManagement'];
			$stakeholder_id = $data['stakeholder_id'];
			
			if(!empty($data['menus'])){
				foreach($data['menus'] as $i => $d){
					$stakeholder_menu['stakeholder_id'] = $stakeholder_id;
					$stakeholder_menu['menu_id'] = $d;
					//$stakeholder_menu['update_by'] = $this->Session->read('GlobalUser.id');
					$stakeholder_menu['_version_'] = $this->VERSION();
					
					$st['StakeholdersMenu'] = $stakeholder_menu;
					
					$this->StakeholdersMenu->create();
					$this->StakeholdersMenu->save($st);
				}	
				$this->redirect("/StakeholderMenuManagement/menu/{$stakeholder_id}");
			}
		}else {
			if ($stakeholder_id === NULL) return;
			if (strlen($stakeholder_id)!=36) return;
		}
	
		$added_menus = array();
		
		$added = $this->StakeholdersMenu->find('all', array(
			'conditions'=>array('StakeholdersMenu.stakeholder_id'=>$stakeholder_id), 
			'fields'=>array('StakeholdersMenu.menu_id')
		));
		
		foreach($added as $i => $a){
			$added_menus[] = $a['StakeholdersMenu']['menu_id'];
		}
		
		
		if(!empty($added_menus)){ 
			$conditions = array('Menu.id'=>$added_menus); 
		}else{ 
			$conditions = array('Menu.id'=>'ffffffff-ffff-ffff-ffff-ffffffffffff'); 
		}
		
		$stakeholder_menus = $this->Menu->find('list', array(
			'conditions'=>array($conditions), 
			'fields'=>array('Menu.id', 'Menu.name')
		));
		
		
		
		if(!empty($added_menus)){ $conditions = array('Menu.id NOT'=>$added_menus);}else{ $conditions = array(); }
		$available_menus = $this->Menu->find('list', array(
			'conditions'=>$conditions, 
			'fields'=>array('Menu.id', 'Menu.name')
		));
		foreach($available_menus as $i => $a){
			$available_menus[$i] = " " . $a;
		}
		
		
		$this->set('stakeholder_menus', $stakeholder_menus);
		$this->set('available_menus', $available_menus);
	}
	
	
	function delete($stakeholder_id, $menu_id){
		$conditions = array(
			'StakeholdersMenu.stakeholder_id'=>$stakeholder_id, 
			'StakeholdersMenu.menu_id'=>$menu_id
		);
		
		$this->StakeholdersMenu->deleteAll($conditions, FALSE);
		$this->redirect("/StakeholderMenuManagement/edit/$stakeholder_id");
	}
	
}

?>