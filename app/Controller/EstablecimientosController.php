<?php
App::uses('AppController', 'Controller');
// date_default_timezone_set('America/Guatemala');
/**
 * Establecimientos Controller
 *
 * CRUD de establecimientos
 */
class EstablecimientosController extends AppController {

	// public $uses = array('Establecimiento');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout = 'tables';
		$this->set('title_for_layout', __('Establecimientos'));
		$conditions = array();
		//Se extraen los parámetros que vienen vía POST o PUT.
		if(($this->request->is('post') || $this->request->is('put')) && isset($this->data['Filter'])){
			$filter_url['controller'] = $this->request->params['controller'];
			$filter_url['action'] = $this->request->params['action'];
			// Se necesita reescribir el cambio del paginador, la página predeterminada será 1.
			$filter_url['page'] = 1;

			// Se agrega al filtro, el nombre del parámetro que se está mandando desde el formulario.
			// Se construye una URL en formato GET.
			foreach($this->data['Filter'] as $name => $value){
				if($value){
					// Es necesario satinizar, el valor que viene del formulario
					// Se utiliza urlencode para estar seguros del contenido.
					$filter_url[$name] = urlencode($value);
				}
			}	
			// Se redirecciona a la URL, según lo que se armó como filtros. 
			// Al redireccionarse, se realizarán los filtros según los parámetros enviados.
			return $this->redirect($filter_url);
		} else {
			// Se inspeccionan todos los nombres de los parámetros, enviados por el formulario.
			foreach($this->params['named'] as $param_name => $value){
				// No se aplica el primer nombre de parametro, para la paginación.
				if(!in_array($param_name, array('page','sort','direction','limit'))){
					// En esta parte se pueden utilizar los diferentes filtros, según lo enviado
					// se pueden utilizar filtros por fecha, entre otros.
					if($param_name == "search"){
						$conditions['OR'] = array(
							array('lower(Establecimiento.nombre) LIKE' => '%' . strtolower($value) . '%')
						);
					}			
					$this->request->data['Filter'][$param_name] = $value;
				}
			}
		}
		
		$this->Establecimiento->recursive = 0;
		$this->paginate = array(
			'limit' => 8,
			'conditions' => $conditions
		);

		$this->set('establecimientos', $this->paginate());

		// Si se manda como parametro "", en el search, se limpia la URL.
		$this->set('search', isset($this->params['named']['search']) ? $this->params['named']['search'] : "");	
	}

/**
 * ver method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function ver($id = null) {
		$this->set('title_for_layout', __('Ver Información de Establecimiento'));
		$this->Establecimiento->id = $id;
		if (!$this->Establecimiento->exists()) {
			throw new NotFoundException(__('Registro inválido'));
		}
		$this->set('establecimiento', $this->Establecimiento->read(null, $id));
	}

/**
 * agregar method
 *
 * @return void
 */
	public function agregar() {
		$this->set('title_for_layout', __('Nuevo Establecimiento'));
		if ($this->request->is('post')) {
			$this->Establecimiento->create();
			if ($this->Establecimiento->save($this->request->data)) {
				$this->Session->setFlash(__('El registro ha sido guardado'),'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El registro no ha sido guardado, por favor inténtelo de nuevo.'),'flash_fail');
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
		$this->set('title_for_layout', __('Editar Información de Establecimiento'));
		$this->Establecimiento->id = $id;
		if (!$this->Establecimiento->exists()) {
			throw new NotFoundException(__('Registro inválido'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Establecimiento->save($this->request->data)) {
				$this->Session->setFlash(__('La información de establecimiento ha sido guardado.'),'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El registro de establecimiento no ha podido guardarse, por favor inténtelo de nuevo.'),'flash_fail');
			}
		} else {
			$this->request->data = $this->Establecimiento->read(null, $id);
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
		
		if (!$this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		$this->Establecimiento->id = $id;
		if (!$this->Establecimiento->exists()) {
			throw new NotFoundException(__('Registro inválido'));
		}
		if ($this->Establecimiento->delete()) {
			$this->Session->setFlash(__('Establecimiento eliminada'),'flash_success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('El registro de Establecimiento no ha sido eliminado'),'flash_fail');
		$this->redirect(array('action' => 'index'));
	}
}