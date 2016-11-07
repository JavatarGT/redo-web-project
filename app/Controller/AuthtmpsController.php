<?php
App::uses('AppController', 'Controller');
// date_default_timezone_set('America/Guatemala');
/**
 * Authtmps Controller
 *
 * CRUD de Authtmps
 */
class AuthtmpsController extends AppController {

	public $uses = array('Authtmp', 'Persona', 'User');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout = 'tables';
		$this->set('title_for_layout', __('Lista de usuarios nuevos'));
		$conditions = array();
		$conditions['AND'] = array('Authtmp.estado_activo' => 0);
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
							array('lower(Authtmp.primer_nombre) LIKE' => '%' . strtolower($value) . '%'),
							array('lower(Authtmp.primer_apellido) LIKE' => '%' . strtolower($value) . '%'),
							array('lower(Authtmp.usarname) LIKE' => '%' . strtolower($value) . '%')
						);
					}			
					$this->request->data['Filter'][$param_name] = $value;
				}
			}
		}
		
		$this->Authtmp->recursive = 0;
		$this->paginate = array(
			'limit' => 8,
			'conditions' => $conditions
		);

		$this->set('authtmps', $this->paginate());

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
		$this->set('title_for_layout', __('Ver información de nuevo usuario'));
		$this->Authtmp->id = $id;
		if (!$this->Authtmp->exists()) {
			throw new NotFoundException(__('Registro inválido'));
		}
		$this->set('authtmp', $this->Authtmp->read(null, $id));
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
		$this->Authtmp->id = $id;
		if (!$this->Authtmp->exists()) {
			throw new NotFoundException(__('Registro inválido'));
		}
		if ($this->Authtmp->delete()) {
			$this->Session->setFlash(__('Registro eliminado'),'flash_success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('El registro no ha sido eliminado'),'flash_fail');
		$this->redirect(array('action' => 'index'));
	}

	public function confirmar(){
		if ($this->request->is('post')) {
			if(isset($this->request->data['idnusuario'])){
				$idnusuario = $this->request->data['idnusuario'];
				$data = $this->Authtmp->find('first', array(
					'conditions'=>array('Authtmp.id'=>$idnusuario),
					'recursive'=>-1
					)
				);
				$dato_persona = array(
					'primer_nombre'=>$data['Authtmp']['primer_nombre'],
					'primer_apellido'=>$data['Authtmp']['primer_apellido'],
					'cui'=>'0',
					'id_establecimiento'=>$data['Authtmp']['id_establecimiento'],
					'id_puesto'=>2,
					'fec_actualizacion'=>DboSource::expression('NOW()'),
					'usr_actualizacion'=>AuthComponent::user('username'),
					'estado_activo'=>1
				);

				$this->Persona->create();
				if ($this->Persona->save($dato_persona)) {
					$dato_usuario=array(
						'username'=>$data['Authtmp']['username'],
						'password'=>$data['Authtmp']['password'],
						'email'=>$data['Authtmp']['email'],
						'group_id'=>2,
						'created'=>DboSource::expression('NOW()'),
						'modified'=>DboSource::expression('NOW()'),
						'id_persona'=>$this->Persona->id,
						'estado_activo'=>1
					);
					$this->User->create();
					$this->User->save($dato_usuario);

					$data['Authtmp']['estado_activo']=1;
					$this->Authtmp->id=$data['Authtmp']['id'];
					$this->Authtmp->save($data);

					$this->Session->setFlash(__('El usuario ha sido confirmado'),'flash_success');
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('El usuario no ha sido confirmado, por favor inténtelo de nuevo.'),'flash_fail');
				}
			}
		}
	}
}