<?php
App::uses('AppController', 'Controller');
date_default_timezone_set('America/Guatemala');
/**
 * Establecimientos Controller
 *
 * CRUD de establecimientos
 */
class MieController extends AppController {

	public $uses = array('Establecimiento', 'Persona', 'Departamento', 'Municipio', 'EstablecimientoPrograma', 'Desembolso', 'Programa');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout = 'tables';
		$this->set('title_for_layout', __('Programas Escolares Asignados'));
		$persona = $this->Persona->find('first', array(
					'conditions' => array(
						'Persona.id' => AuthComponent::user('id_persona'),
						'Persona.id_puesto' => 1
						),
					'recursive' => -1
					)
				);
		$establecimiento = $this->EstablecimientoPrograma->find('first', array(
				'conditions' => array('EstablecimientoPrograma.id_establecimiento' => $persona['Persona']['id_establecimiento']),
				'recursive' => -1
				)
			);
		
		$conditions = array();
		$conditions['AND'] = array(
							array('Desembolso.id_establecimiento_programa' => $establecimiento['EstablecimientoPrograma']['id'])
						);
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
							array('lower(Tiposangre.nombre) LIKE' => '%' . strtolower($value) . '%')
						);
					}			
					$this->request->data['Filter'][$param_name] = $value;
				}
			}
		}
		
		$this->Desembolso->recursive = 0;
		$this->paginate = array(
			'limit' => 8,
			'conditions' => $conditions
		);

		$this->set('desembolsos', $this->paginate('Desembolso'));

		// Si se manda como parametro "", en el search, se limpia la URL.
		$this->set('search', isset($this->params['named']['search']) ? $this->params['named']['search'] : "");	
	}

/**
 * agregar method
 *
 * @return void
 */
	public function agregar() {
		$this->set('title_for_layout', __('Nuevo Desembolso'));
		$id = $this->Persona->find('first', array(
					'conditions' => array(
						'Persona.id' => AuthComponent::user('id_persona'),
						'Persona.id_puesto' => 1
						),
					'recursive' => -1
					)
				);

		$personas = $this->Persona->find('list', array(
					'conditions' => array(
						'Persona.id_establecimiento' => $id['Persona']['id_establecimiento']
						),
					'fields' => array('Persona.id', 'Persona.nombre_completo'),
					'recursive' => -1
					)
				);

		if ($this->request->is('post')) {
			$est = $this->EstablecimientoPrograma->find('first', array(
				'EstablecimientoPrograma.id_establecimiento' => $id['Persona']['id_establecimiento'],
				'EstablecimientoPrograma.id_programa'=>$this->request->data['Desembolso']['id_programa'],
				'recursive' => -1
				)
			);
			$this->request->data['Desembolso']['id_establecimiento_programa'] = $est['EstablecimientoPrograma']['id'];
			$fecha = split('/', $this->request->data['Desembolso']['fecha']);
			$this->request->data['Desembolso']['fecha']=$fecha[2].'-'.$fecha[1].'-'.$fecha[0];
			
			$this->Desembolso->create();
			if ($this->Desembolso->save($this->request->data)) {
				$this->Session->setFlash(__('El registro de desembolso ha sido guardado'),'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El registro de desembolso no ha sido guardado, por favor inténtelo de nuevo.'),'flash_fail');
			}
		}
		$this->set(compact('personas'));
		$ids = $this->EstablecimientoPrograma->find('list', array(
			'conditions'=>array('EstablecimientoPrograma.id_establecimiento'=>$id['Persona']['id_establecimiento']),
			'fields'=>array('EstablecimientoPrograma.id_programa'),
			'recursive'=>-1
			)
		);
		$programas = $this->Programa->find('list', array(
			'conditions'=>array('Programa.id'=>$ids),
			'fields'=>array('Programa.id','Programa.nombre'),
			'recursive'=>-1
			)
		);
		$this->set(compact('programas'));
	}

/**
 * editar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function editar() {
		$this->layout = 'tables';
		$this->set('title_for_layout', __('Información de Establecimiento Escolar'));
		$persona = $this->Persona->find('first', array(
					'conditions' => array(
						'Persona.id' => AuthComponent::user('id_persona'),
						'Persona.id_puesto' => 1
						),
					'recursive' => -1
					)
				);

		$this->Establecimiento->id = $persona['Persona']['id_establecimiento'];
		if (!$this->Establecimiento->exists()) {
			throw new NotFoundException(__('Registro inválido'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			foreach ($this->request->data['EstablecimientoPrograma'] as $key => $value) {
				$this->request->data['EstablecimientoPrograma'][$key]['id_establecimiento'] = $this->request->data['Establecimiento']['id'];
			}
			if ($this->Establecimiento->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__('La información de establecimiento ha sido guardada.'),'flash_success');
				$this->redirect(array('action' => 'editar'));
			} else {
				$this->Session->setFlash(__('El registro de establecimiento no ha podido guardarse, por favor inténtelo de nuevo.'),'flash_fail');
			}
		} else {
			$this->request->data = $this->Establecimiento->find('first', array(
				'conditions' => array('Establecimiento.id' => $persona['Persona']['id_establecimiento']),
				'recursive' => -1
				)
			);
			$this->request->data['EstablecimientoPrograma'] = $this->EstablecimientoPrograma->find('all', array(
				'conditions' => array('EstablecimientoPrograma.id_establecimiento' => $persona['Persona']['id_establecimiento']),
				'recursive' => 0
				)
			);
		}

		$departamentos = $this->Departamento->find('list');
		$this->set(compact('departamentos'));

		$municipios = $this->Municipio->find('list', array(
                            'conditions' => array('Municipio.id' => $this->request->data['Establecimiento']['id_municipio']),
                            'fields' => array('Municipio.id','Municipio.nombre')
                        ));
		$this->set(compact('municipios'));
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
		$this->set('title_for_layout', __('Ver Información de Desembolso'));
		$this->Desembolso->id = $id;
		if (!$this->Desembolso->exists()) {
			throw new NotFoundException(__('Registro inválido'));
		}
		$desembolso = $this->Desembolso->read(null, $id);
		$est = $this->EstablecimientoPrograma->find('first', array(
				'conditions' => array('EstablecimientoPrograma.id' => $desembolso['Desembolso']['id_establecimiento_programa']),
				'recursive' => 0
				)
			);
		$persona1 = $this->Persona->find('first', array(
				'conditions' => array('Persona.id' => $desembolso['Desembolso']['persona_firma1']),
				'recursive' => -1
				)
			);
		$persona2 = $this->Persona->find('first', array(
				'conditions' => array('Persona.id' => $desembolso['Desembolso']['persona_firma2']),
				'recursive' => -1
				)
			);
		$desembolso['EstablecimientoPrograma'] = $est;
		$desembolso['Persona1'] = $persona1['Persona'];
		if(array_key_exists('Persona', $persona2))
			$desembolso['Persona2'] = $persona2['Persona'];
		$this->set('desembolso', $desembolso);
	}

/**
 * edit method
 *
 * @return void
 */
	public function edit($id = null, $programa = null) {
		$this->set('title_for_layout', __('Editar Desembolso'));
		$idd = $this->Persona->find('first', array(
					'conditions' => array(
						'Persona.id' => AuthComponent::user('id_persona'),
						'Persona.id_puesto' => 1
						),
					'recursive' => -1
					)
				);

		$personas = $this->Persona->find('list', array(
					'conditions' => array(
						'Persona.id_establecimiento' => $idd['Persona']['id_establecimiento']
						),
					'fields' => array('Persona.id', 'Persona.nombre_completo'),
					'recursive' => -1
					)
				);
		$this->Desembolso->id = $id;
		if (!$this->Desembolso->exists()) {
			throw new NotFoundException(__('Registro inválido'));
		}

		if ($this->request->is('post') || $this->request->is('put')) {
			$est = $this->EstablecimientoPrograma->find('first', array(
				'EstablecimientoPrograma.id_establecimiento' => $idd['Persona']['id_establecimiento'],
				'EstablecimientoPrograma.id_programa'=>$this->request->data['Desembolso']['id_programa'],
				'recursive' => -1
				)
			);

			$this->request->data['Desembolso']['id_establecimiento_programa'] = $est['EstablecimientoPrograma']['id'];
			$this->request->data['Desembolso']['fecha'] = date('Y-m-d', strtotime($this->request->data['Desembolso']['fecha']));
			// print_r($this->request->data);
			if ($this->Desembolso->save($this->request->data)) {
				$this->Session->setFlash(__('El registro de desembolso ha sido guardado'),'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El registro de desembolso no ha sido guardado, por favor inténtelo de nuevo.'),'flash_fail');
			}
		}else{
			$this->request->data = $this->Desembolso->read(null, $id);
		}

		$this->set(compact('personas'));
		$ids = $this->EstablecimientoPrograma->find('list', array(
			'conditions'=>array('EstablecimientoPrograma.id_establecimiento'=>$idd['Persona']['id_establecimiento']),
			'fields'=>array('EstablecimientoPrograma.id_programa'),
			'recursive'=>-1
			)
		);
		$programas = $this->Programa->find('all', array(
			'conditions'=>array('Programa.id'=>$ids),
			'fields'=>array('Programa.id','Programa.nombre'),
			'recursive'=>-1
			)
		);
		$this->set(compact('programas'));
		$this->set('id_programa', $programa);
	}

}