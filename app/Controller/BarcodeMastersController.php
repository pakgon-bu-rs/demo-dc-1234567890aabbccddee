<?php
App::uses('AppController', 'Controller');
/**
 * BarcodeMasters Controller
 *
 * @property BarcodeMaster $BarcodeMaster
 * @property ApiClientComponent $ApiClient
 */
class BarcodeMastersController extends AppController {

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
		$this->BarcodeMaster->recursive = 0;
		$this->set('barcodeMasters', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->BarcodeMaster->exists($id)) {
			throw new NotFoundException(__('Invalid barcode master'));
		}
		$options = array('conditions' => array('BarcodeMaster.' . $this->BarcodeMaster->primaryKey => $id));
		$this->set('barcodeMaster', $this->BarcodeMaster->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->BarcodeMaster->create();
			if ($this->BarcodeMaster->save($this->request->data)) {
				$this->Session->setFlash(__('The barcode master has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The barcode master could not be saved. Please, try again.'));
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
		if (!$this->BarcodeMaster->exists($id)) {
			throw new NotFoundException(__('Invalid barcode master'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BarcodeMaster->save($this->request->data)) {
				$this->Session->setFlash(__('The barcode master has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The barcode master could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('BarcodeMaster.' . $this->BarcodeMaster->primaryKey => $id));
			$this->request->data = $this->BarcodeMaster->find('first', $options);
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
		$this->BarcodeMaster->id = $id;
		if (!$this->BarcodeMaster->exists()) {
			throw new NotFoundException(__('Invalid barcode master'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->BarcodeMaster->delete()) {
			$this->Session->setFlash(__('Barcode master deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Barcode master was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
