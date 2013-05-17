<?php
App::uses('AppController', 'Controller');
/**
 * ReasonNames Controller
 *
 * @property ReasonName $ReasonName
 * @property ApiClientComponent $ApiClient
 */
class ReasonNamesController extends AppController {

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
		$this->ReasonName->recursive = 0;
		$this->set('reasonNames', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ReasonName->exists($id)) {
			throw new NotFoundException(__('Invalid reason name'));
		}
		$options = array('conditions' => array('ReasonName.' . $this->ReasonName->primaryKey => $id));
		$this->set('reasonName', $this->ReasonName->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ReasonName->create();
			if ($this->ReasonName->save($this->request->data)) {
				$this->Session->setFlash(__('The reason name has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The reason name could not be saved. Please, try again.'));
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
		if (!$this->ReasonName->exists($id)) {
			throw new NotFoundException(__('Invalid reason name'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ReasonName->save($this->request->data)) {
				$this->Session->setFlash(__('The reason name has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The reason name could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ReasonName.' . $this->ReasonName->primaryKey => $id));
			$this->request->data = $this->ReasonName->find('first', $options);
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
		$this->ReasonName->id = $id;
		if (!$this->ReasonName->exists()) {
			throw new NotFoundException(__('Invalid reason name'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ReasonName->delete()) {
			$this->Session->setFlash(__('Reason name deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Reason name was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
