<?php
App::uses('AppController', 'Controller');
/**
 * GradeNames Controller
 *
 * @property GradeName $GradeName
 * @property ApiClientComponent $ApiClient
 */
class GradeNamesController extends AppController {

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
		$this->GradeName->recursive = 0;
		$this->set('gradeNames', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->GradeName->exists($id)) {
			throw new NotFoundException(__('Invalid grade name'));
		}
		$options = array('conditions' => array('GradeName.' . $this->GradeName->primaryKey => $id));
		$this->set('gradeName', $this->GradeName->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->GradeName->create();
			if ($this->GradeName->save($this->request->data)) {
				$this->Session->setFlash(__('The grade name has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The grade name could not be saved. Please, try again.'));
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
		if (!$this->GradeName->exists($id)) {
			throw new NotFoundException(__('Invalid grade name'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->GradeName->save($this->request->data)) {
				$this->Session->setFlash(__('The grade name has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The grade name could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('GradeName.' . $this->GradeName->primaryKey => $id));
			$this->request->data = $this->GradeName->find('first', $options);
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
		$this->GradeName->id = $id;
		if (!$this->GradeName->exists()) {
			throw new NotFoundException(__('Invalid grade name'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->GradeName->delete()) {
			$this->Session->setFlash(__('Grade name deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Grade name was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
