<?php
App::uses('AppController', 'Controller');
/**
 * SkuMasters Controller
 *
 * @property SkuMaster $SkuMaster
 * @property ApiClientComponent $ApiClient
 */
class SkuMastersController extends AppController {

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
		$this->SkuMaster->recursive = 0;
		$this->set('skuMasters', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->SkuMaster->exists($id)) {
			throw new NotFoundException(__('Invalid sku master'));
		}
		$options = array('conditions' => array('SkuMaster.' . $this->SkuMaster->primaryKey => $id));
		$this->set('skuMaster', $this->SkuMaster->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SkuMaster->create();
			if ($this->SkuMaster->save($this->request->data)) {
				$this->Session->setFlash(__('The sku master has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sku master could not be saved. Please, try again.'));
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
		if (!$this->SkuMaster->exists($id)) {
			throw new NotFoundException(__('Invalid sku master'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->SkuMaster->save($this->request->data)) {
				$this->Session->setFlash(__('The sku master has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sku master could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SkuMaster.' . $this->SkuMaster->primaryKey => $id));
			$this->request->data = $this->SkuMaster->find('first', $options);
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
		$this->SkuMaster->id = $id;
		if (!$this->SkuMaster->exists()) {
			throw new NotFoundException(__('Invalid sku master'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->SkuMaster->delete()) {
			$this->Session->setFlash(__('Sku master deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Sku master was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
