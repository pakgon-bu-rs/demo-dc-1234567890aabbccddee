<?php
App::uses('AppController', 'Controller');
/**
 * PoTypes Controller
 *
 * @property PoType $PoType
 * @property ApiClientComponent $ApiClient
 */
class PoTypesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('ApiClient');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->PoType->recursive = 0;
		$this->set('poTypes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PoType->exists($id)) {
			throw new NotFoundException(__('Invalid po type'));
		}
		$options = array('conditions' => array('PoType.' . $this->PoType->primaryKey => $id));
		$this->set('poType', $this->PoType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PoType->create();
			if ($this->PoType->save($this->request->data)) {
				$this->Session->setFlash(__('The po type has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The po type could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PoType->exists($id)) {
			throw new NotFoundException(__('Invalid po type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->PoType->save($this->request->data)) {
				$this->Session->setFlash(__('The po type has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The po type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PoType.' . $this->PoType->primaryKey => $id));
			$this->request->data = $this->PoType->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->PoType->id = $id;
		if (!$this->PoType->exists()) {
			throw new NotFoundException(__('Invalid po type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PoType->delete()) {
			$this->Session->setFlash(__('Po type deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Po type was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
