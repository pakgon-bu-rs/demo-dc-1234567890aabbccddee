<?php
App::uses('AppController', 'Controller');
/**
 * ColorNames Controller
 *
 * @property ColorName $ColorName
 * @property ApiClientComponent $ApiClient
 */
class ColorNamesController extends AppController {

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
		$this->ColorName->recursive = 0;
		$this->set('colorNames', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ColorName->exists($id)) {
			throw new NotFoundException(__('Invalid color name'));
		}
		$options = array('conditions' => array('ColorName.' . $this->ColorName->primaryKey => $id));
		$this->set('colorName', $this->ColorName->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ColorName->create();
			if ($this->ColorName->save($this->request->data)) {
				$this->Session->setFlash(__('The color name has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The color name could not be saved. Please, try again.'));
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
		if (!$this->ColorName->exists($id)) {
			throw new NotFoundException(__('Invalid color name'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ColorName->save($this->request->data)) {
				$this->Session->setFlash(__('The color name has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The color name could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ColorName.' . $this->ColorName->primaryKey => $id));
			$this->request->data = $this->ColorName->find('first', $options);
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
		$this->ColorName->id = $id;
		if (!$this->ColorName->exists()) {
			throw new NotFoundException(__('Invalid color name'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ColorName->delete()) {
			$this->Session->setFlash(__('Color name deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Color name was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
