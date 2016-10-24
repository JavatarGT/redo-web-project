<?php
App::uses('AppController', 'Controller');
date_default_timezone_set('America/Guatemala');
/**
 * Groups Controller
 *
 * @property Group $Group
 */
class GroupsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout = 'tables';
		$this->set('title_for_layout', __('Grupos'));
		$this->Group->recursive = 0;
		$this->set('groups', $this->paginate());
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
		$this->set('title_for_layout', __('Ver Grupo'));
		$this->Group->id = $id;
		if (!$this->Group->exists()) {
			throw new NotFoundException(__('Grupo Inválido'));
		}
		$this->set('group', $this->Group->read(null, $id));
	}

/**
 * agregar method
 *
 * @return void
 */
	public function agregar() {
		$this->set('title_for_layout', __('Nuevo Grupo'));
		if ($this->request->is('post')) {
			$this->Group->create();
			if ($this->Group->save($this->request->data)) {
				$this->Session->setFlash(__('El grupo ha sido guardado'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('No se pudo guardar el grupo, por favor intentelo de nuevo.'), 'flash_fail');
			}
		}
	}

/**
 * editar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function editar($id = null) {
		$this->set('title_for_layout', __('Editar Grupo'));
		$this->Group->id = $id;
		if (!$this->Group->exists()) {
			throw new NotFoundException(__('Grupo inválido'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			
			if ($this->Group->save($this->request->data)) {
				$this->Session->setFlash(__('El grupo ha sido guardado'),'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('No se pudo guardar el grupo, por favor intentelo de nuevo'),'flash_fail');
			}
		} else {
			$this->request->data = $this->Group->read(null, $id);
		}
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
			$this->Session->setFlash(__('No es posible eliminar el grupo'),'flash_fail');
			$this->redirect(array('action' => 'index'));
		}
		if (!$this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		$this->Group->id = $id;
		if (!$this->Group->exists()) {
			throw new NotFoundException(__('Grupo inválido'));
		}
		if ($this->Group->delete()) {
			$this->Session->setFlash(__('Grupo eliminado'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('El grupo no ha sido eliminado'));
		$this->redirect(array('action' => 'index'));
	}
}
