<?php
App::uses('AppController', 'Controller');
// date_default_timezone_set('America/Guatemala');
/**
 * Compras Controller
 *
 * CRUD de tipos de sangre
 */
class ComprasController extends AppController {

	public $uses = array('Compra', 'DetCompra', 'Desembolso', 'Persona', 'EstablecimientoPrograma');

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
 * agregar method
 *
 * @return void
 */
	public function agregar($id = null) {
		$this->set('title_for_layout', __('Nueva Compra'));
		$desembolso = $this->Desembolso->find('first', array(
			'conditions'=>array('Desembolso.id'=>$id),
			'recursive'=>-1
			)
		);
		if ($this->request->is('post')) {
			$nuevo_gasto = $desembolso['Desembolso']['gasto_anterior']+$this->request->data['Compra']['monto_total'];
			$this->request->data['Compra']['id_desembolso'] = $desembolso['Desembolso']['id'];
			$fecha = split('/', $this->request->data['Compra']['fecha_inicio']);
			$this->request->data['Compra']['fecha_inicio']=$fecha[2].'-'.$fecha[1].'-'.$fecha[0];
			$fecha = split('/', $this->request->data['Compra']['fecha_fin']);
			$this->request->data['Compra']['fecha_fin']=$fecha[2].'-'.$fecha[1].'-'.$fecha[0];
			$this->Desembolso->updateAll(
				array(
					'gasto_anterior' => $nuevo_gasto
					), 
				array(
					'Desembolso.id' => $desembolso['Desembolso']['id']
					)
				);

			foreach ($this->request->data['DetCompra'] as $key => $value) {
				$fecha = split('/', $value['fecha_factura']);
				$this->request->data['DetCompra'][$key]['fecha_factura']=$fecha[2].'-'.$fecha[1].'-'.$fecha[0];
			}
			
			$this->Compra->create();
			if ($this->Compra->saveAssociated($this->request->data)) {

				$this->Session->setFlash(__('El registro ha sido guardado'),'flash_success');
				$this->redirect(array('action' => 'index_cmp', $desembolso['Desembolso']['id']));
			} else {
				$this->Session->setFlash(__('El registro no ha sido guardado, por favor inténtelo de nuevo.'),'flash_fail');
			}
		}
	
		$saldo = $desembolso['Desembolso']['cantidad'] - $desembolso['Desembolso']['gasto_anterior'];
		$this->set('iddesembolso', $id);
		$this->set('saldo', $saldo);
	}

/**
 * editar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function editar($id = null) {
		$this->set('title_for_layout', __('Editar Información de Tipo de Sangre'));
		$this->Compra->id = $id;
		if (!$this->Compra->exists()) {
			throw new NotFoundException(__('Registro inválido'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Compra->save($this->request->data)) {
				$this->Session->setFlash(__('La información de compra ha sido guardada.'),'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El registro de compra no ha podido guardarse, por favor inténtelo de nuevo.'),'flash_fail');
			}
		} else {
			$this->request->data = $this->Compra->read(null, $id);
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
		$this->Compra->id = $id;
		if (!$this->Compra->exists()) {
			throw new NotFoundException(__('Registro inválido'));
		}
		if ($this->Compra->delete()) {
			$this->Session->setFlash(__('Compra eliminada'),'flash_success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('El registro de Compra no ha sido eliminado'),'flash_fail');
		$this->redirect(array('action' => 'index'));
	}

/**
 * index method
 *
 * @return void
 */
	public function index_cmp($id = null) {
		$this->layout = 'tables';
		$this->set('title_for_layout', __('Compras realizadas'));
		
		$conditions = array();
		$conditions['AND'] = array(
							array('Compra.id_desembolso' => $id)
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
		
		$this->Compra->recursive = 1;
		$this->paginate = array(
			'limit' => 8,
			'conditions' => $conditions
		);

		$this->set('compras', $this->paginate());
		$this->set('iddesembolso', $id);

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
	public function ver_cmp($id = null, $iddesembolso = null) {
		$this->layout = 'tables';
		$this->set('title_for_layout', __('Ver Información de Compra'));
		$this->Compra->id = $id;
		if (!$this->Compra->exists()) {
			throw new NotFoundException(__('Registro inválido'));
		}
		$compra = $this->Compra->read(null, $id);
		$this->set('compra', $compra);
		$desembolso = $this->Desembolso->find('first', array(
			'conditions'=>array('Desembolso.id'=>$id),
			'recursive'=>-1
			)
		);
		$this->set('iddesembolso', $iddesembolso);
	}
}