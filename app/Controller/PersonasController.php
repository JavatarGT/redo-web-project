<?php
App::uses('AppController', 'Controller');
date_default_timezone_set('America/Guatemala');
/**
 * Departamentos Controller
 *
 * Administra los departamentos
 */
class PersonasController extends AppController {

	public $uses = array('Persona', 'Departamento', 'Municipio', 'Tiposangre', 'Establecimiento', 'Puesto');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout = 'tables';
		$this->set('title_for_layout', __('Personas'));
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
							array('lower(Persona.primer_nombre) LIKE' => '%' . strtolower($value) . '%'),
    						array('lower(Persona.primer_apellido) LIKE' => '%' . strtolower($value) . '%'),
    						array('Persona.cod_perfil <=' => 3)
						);
					}			
					$this->request->data['Filter'][$param_name] = $value;
				}
			}
		}
		
		$this->Persona->recursive = 0;
		$this->paginate = array(
			'limit' => 8,
			'conditions' => $conditions
		);

		$this->set('personas', $this->paginate());

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
		$this->layout = 'tables';
		$this->set('title_for_layout', __('Ver Información de Persona'));
		$this->Persona->id = $id;
		if (!$this->Persona->exists()) {
			throw new NotFoundException(__('Registro inválido'));
		}
		$this->set('persona', $this->Persona->read(null, $id));
	}

	public function filterMunicipios(){
		if(isset($this->request->data['Persona']['id_departamento']))
        	$id = $this->request->data['Persona']['id_departamento'];

        if(isset($this->request->data['Establecimiento']['id_departamento']))
        	$id = $this->request->data['Establecimiento']['id_departamento'];

        $municipios = $this->Municipio->find('list', array(
                            'conditions' => array('Municipio.id_departamento' => $id),
                            'fields' => array('Municipio.id','Municipio.nombre')
                        ));
        $this->set('municipios',$municipios);
        $this->layout = 'ajax';
    }

/**
 * agregar method
 *
 * @return void
 */
	public function agregar() {
		$this->set('title_for_layout', __('Nueva Persona'));
		if ($this->request->is('post')) {
			$this->request->data['Persona']['estado'] = 1; // 1 = Contratado, 2 = despedido, 3 = inactivo
			$this->request->data['Persona']['fec_nacimiento'] = date('Y-m-d', strtotime($this->request->data['Persona']['fec_nacimiento']));
			$this->request->data['Persona']['fec_actualizacion'] = DboSource::expression('NOW()');
			$this->request->data['Persona']['usr_actualizacion'] = AuthComponent::user('username');
			$this->Persona->create();
			if ($this->Persona->save($this->request->data)) {
				$this->Session->setFlash(__('El registro de persona ha sido guardado'),'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El registro de persona no ha sido guardado, por favor inténtelo de nuevo.'),'flash_fail');
			}
		}
		$departamentos = $this->Departamento->find('list');
		$this->set(compact('departamentos'));

		$tipo_sangre = $this->Tiposangre->find('list');
		$this->set(compact('tipo_sangre'));

		$puestos = $this->Puesto->find('list', array(
			'conditions' => array(
				'Puesto.estado_activo' => 1
				)
			)
		);
		$this->set(compact('puestos'));

	}

/**
 * editar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function editar($id = null) {
		$this->set('title_for_layout', __('Editar Información de Persona'));
		$this->Persona->id = $id;
		if (!$this->Persona->exists()) {
			throw new NotFoundException(__('Registro inválido'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->request->data['Persona']['fec_nacimiento'] = date('Y-m-d', strtotime($this->request->data['Persona']['fec_nacimiento']));
			if ($this->Persona->save($this->request->data)) {
				$this->Session->setFlash(__('La información del personal ha sido guardada.'),'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El registro de personal no ha podido guardarse, por favor inténtelo de nuevo.'),'flash_fail');
			}
		} else {
			$this->request->data = $this->Persona->read(null, $id);
		}

		$departamentos = $this->Departamento->find('list');
		$this->set(compact('departamentos'));

		$municipios = $this->Municipio->find('list', array(
                            'conditions' => array('Municipio.id' => $this->request->data['Persona']['id_municipio']),
                            'fields' => array('Municipio.id','Municipio.nombre')
                        ));
		$this->set(compact('municipios'));

		$tipo_sangre = $this->Tiposangre->find('list');
		$this->set(compact('tipo_sangre'));

		$puestos = $this->Puesto->find('list', array(
			'conditions' => array(
				'Puesto.estado_activo' => 1
				)
			)
		);
		$this->set(compact('puestos'));

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
		$this->Persona->id = $id;
		if (!$this->Persona->exists()) {
			throw new NotFoundException(__('Registro inválido'));
		}
		if ($this->Persona->delete()) {
			$this->Session->setFlash(__('Personal eliminado'),'flash_success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('El registro de personal no ha sido eliminado'),'flash_fail');
		$this->redirect(array('action' => 'index'));
	}

/**
 * perfil method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function perfil($id = null) {
		$this->set('title_for_layout', __('Perfil de Usuario'));
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->request->data['Persona']['fec_nacimiento'] = date('Y-m-d', strtotime($this->request->data['Persona']['fec_nacimiento']));
			if ($this->Persona->save($this->request->data)) {
				$this->Session->setFlash(__('La información del perfil ha sido guardada.'),'flash_success');
				$this->redirect(array('action' => 'perfil', $id));
			} else {
				$this->Session->setFlash(__('La información de perfil no ha podido guardarse, por favor inténtelo de nuevo.'),'flash_fail');
			}
		} else {
			$this->request->data = $this->Persona->read(null, $id);
		}

		$departamentos = $this->Departamento->find('list');
		$this->set(compact('departamentos'));

		$municipios = $this->Municipio->find('list', array(
                            'conditions' => array('Municipio.id' => $this->request->data['Persona']['id_municipio']),
                            'fields' => array('Municipio.id','Municipio.nombre')
                        ));
		$this->set(compact('municipios'));

		$tipo_sangre = $this->Tiposangre->find('list');
		$this->set(compact('tipo_sangre'));

		$establecimiento = $this->Establecimiento->find('list', array(
			'conditions' => array('Establecimiento.estado_activo' => 1)
			)
		);
		$this->set(compact('establecimiento'));
	}
}