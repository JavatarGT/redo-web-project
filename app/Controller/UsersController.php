<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

	public $uses = array('User', 'Group', 'Persona');

	public function beforeFilter() {
    	parent::beforeFilter();
    	
    	$this->Auth->allow();   	
    //$this->Auth->allow('add');

	}

	public function login() {
		$this->layout = 'login';
		$this->set('title_for_layout', __('Inicio de Sesión'));
	    if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
	        	//$this->AclManager->set_session_permissions();
	            $this->redirect($this->Auth->redirect());
	        } else {
	            $this->Session->setFlash('Acceso denegado - nombre de usuario o contraseña incorrectos.','flash_fail');
	        }
	    }

	}

	public function logout() {
		//$this->Session->delete('Alaxos.Acl.permissions');
    	//$this->Session->setFlash('Usted ha cerrado sesión.','flash_success');
		$this->redirect($this->Auth->logout());
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout = 'tables';
		$this->set('title_for_layout', __('Usuarios'));
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

/**
 * ver method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function ver($id = null) {
		$this->layout = 'tables';
		$this->set('title_for_layout', __('Ver Usuario'));
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Usuario inválido'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

/**
 * agregar method
 *
 * @return void
 */
	public function agregar() {
		$this->set('title_for_layout', __('Nuevo Usuario'));
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('El usuario ha sido guardado'),'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El usuario no ha sido guardado, por favor intentelo de nuevo.'),'flash_fail');
			}
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));

		$personas = $this->Persona->find('list', array('conditions' => array('Persona.estado_activo' => 1),
			'fields' => array('Persona.id', 'Persona.nombre_completo')));
		$this->set(compact('personas'));
	}

/**
 * editar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function editar($id = null) {
		$this->set('title_for_layout', __('Editar Usuario'));
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Usuario inválido'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('El usuario ha sido guardado.'),'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El usuario no ha podido guardarse, por favor intentelo de nuevo.'),'flash_fail');
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));

		$personas = $this->Persona->find('list', array('conditions' => array('Persona.estado_activo' => 1),
			'fields' => array('Persona.id', 'Persona.nombre_completo')));
		$this->set(compact('personas'));
	}

/**
 * eliminar method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function eliminar($id = null) {
		if ($id == 1){
			$this->Session->setFlash(__('No es posible eliminar el usuario'),'flash_fail');
			$this->redirect(array('action' => 'index'));
		}
		if (!$this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Usuario inválido'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('Usuario eliminado'),'flash_success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('El usuario no ha sido eliminado'),'flash_fail');
		$this->redirect(array('action' => 'index'));
	}
}
