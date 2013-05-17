<?php
App::uses('AppController', 'Controller');
/**
 * PackageNames Controller
 *
 * @property PackageName $PackageName
 * @property ApiClientComponent $ApiClient
 */
class PackageNamesController extends AppController {

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
		$this->PackageName->recursive = 0;
		$this->set('packageNames', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PackageName->exists($id)) {
			throw new NotFoundException(__('Invalid package name'));
		}
		$options = array('conditions' => array('PackageName.' . $this->PackageName->primaryKey => $id));
		$this->set('packageName', $this->PackageName->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PackageName->create();
			if ($this->PackageName->save($this->request->data)) {
				$this->Session->setFlash(__('The package name has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The package name could not be saved. Please, try again.'));
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
		if (!$this->PackageName->exists($id)) {
			throw new NotFoundException(__('Invalid package name'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->PackageName->save($this->request->data)) {
				$this->Session->setFlash(__('The package name has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The package name could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PackageName.' . $this->PackageName->primaryKey => $id));
			$this->request->data = $this->PackageName->find('first', $options);
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
		$this->PackageName->id = $id;
		if (!$this->PackageName->exists()) {
			throw new NotFoundException(__('Invalid package name'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PackageName->delete()) {
			$this->Session->setFlash(__('Package name deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Package name was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
