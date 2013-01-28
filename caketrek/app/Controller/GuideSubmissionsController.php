<?php
App::uses('AppController', 'Controller');
/**
 * GuideSubmissions Controller
 *
 * @property GuideSubmission $GuideSubmission
 */
class GuideSubmissionsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->GuideSubmission->recursive = 0;
		$this->set('guideSubmissions', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->GuideSubmission->id = $id;
		if (!$this->GuideSubmission->exists()) {
			throw new NotFoundException(__('Invalid guide submission'));
		}
		$this->set('guideSubmission', $this->GuideSubmission->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->GuideSubmission->create();
			if ($this->GuideSubmission->save($this->request->data)) {
				$this->Session->setFlash(__('The guide submission has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The guide submission could not be saved. Please, try again.'));
			}
		}
		$tourists = $this->GuideSubmission->Tourist->find('list');
		$this->set(compact('tourists'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->GuideSubmission->id = $id;
		if (!$this->GuideSubmission->exists()) {
			throw new NotFoundException(__('Invalid guide submission'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->GuideSubmission->save($this->request->data)) {
				$this->Session->setFlash(__('The guide submission has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The guide submission could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->GuideSubmission->read(null, $id);
		}
		$tourists = $this->GuideSubmission->Tourist->find('list');
		$this->set(compact('tourists'));
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->GuideSubmission->id = $id;
		if (!$this->GuideSubmission->exists()) {
			throw new NotFoundException(__('Invalid guide submission'));
		}
		if ($this->GuideSubmission->delete()) {
			$this->Session->setFlash(__('Guide submission deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Guide submission was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
