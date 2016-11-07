<?php
App::uses('AppController', 'Controller');
// date_default_timezone_set('America/Guatemala');
/**
 * Puestos Controller
 *
 * CRUD de Puestos
 */
class ConsController extends AppController {

	public $uses = array('Cons', 'Persona');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout = 'tables';
		$this->set('title_for_layout', __('Solicitudes de Constancia de Ingresos'));
		$conditions = array();
		if(AuthComponent::user('group_id') != 1){
			$conditions['AND']=array(
				'Cons.id_persona'=>AuthComponent::user('id_persona')
			);
		}
		$this->Cons->recursive = 0;
		$this->paginate = array(
			'limit' => 8,
			'conditions' => $conditions
		);

		$this->set('solicitudes', $this->paginate());	
	}

/**
 * ver method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function ver($id = null) {
		$this->set('title_for_layout', __('Ver Información de Puesto'));
		$this->Cons->id = $id;
		if (!$this->Cons->exists()) {
			throw new NotFoundException(__('Registro inválido'));
		}
		$this->Cons->recursive = 2;
		$this->set('solicitud', $this->Cons->read(null, $id));
	}

/**
 * agregar method
 *
 * @return void
 */
	public function agregar() {
		$this->set('title_for_layout', __('Nueva Solicitud de Ingresos'));
		if ($this->request->is('post')) {
			$this->request->data['Cons']['id_persona'] = AuthComponent::user('id_persona');
			$fecha = split('/', $this->request->data['Cons']['fecha_solicitud']);
			$this->request->data['Cons']['fecha_solicitud']=$fecha[2].'-'.$fecha[1].'-'.$fecha[0];
			$this->request->data['Cons']['fecha_creacion'] = DboSource::expression('NOW()');
			$this->request->data['Cons']['estado_activo'] = 1;
			$this->Cons->create();
			if ($this->Cons->save($this->request->data)) {
				$this->Session->setFlash(__('El registro ha sido guardado'),'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El registro no ha sido guardado, por favor inténtelo de nuevo.'),'flash_fail');
			}
		}
	}

	public function confirmar(){
		if ($this->request->is('post')){
			if(isset($this->request->data['idcons'])){
				$idcons = $this->request->data['idcons'];
				$data = $this->Cons->find('first', array(
					'conditions'=>array('Cons.id'=>$idcons),
					'recursive'=>-1
					)
				);
				$data['Cons']['estado_activo']=2;
				$this->Cons->id=$didcons;
				$this->Cons->save($data);
				// if($this->Cons->save($data)){
				$this->Session->setFlash(__('La solicitud ha sido confirmada'),'flash_success');
				$this->redirect(array('action' => 'index'));
				// }else{
				// 	$this->Session->setFlash(__('La solicitud no ha sido confirmada'),'flash_fail');
				// 	$this->redirect(array('action' => 'index'));
				// }
			}
		}
	}

	public function rechazar(){
		if ($this->request->is('post')){
			if(isset($this->request->data['idcons'])){
				$idcons = $this->request->data['idcons'];
				$data = $this->Cons->find('first', array(
					'conditions'=>array('Cons.id'=>$idcons),
					'recursive'=>-1
					)
				);
				$data['Cons']['estado_activo']=3;
				$this->Cons->id=$data['Cons']['id'];
				if($this->Cons->save($data)){
					$this->Session->setFlash(__('La solicitud ha sido rechazada'),'flash_success');
					$this->redirect(array('action' => 'index'));
				}else{
					$this->Session->setFlash(__('La solicitud no ha sido rechazada'),'flash_fail');
					$this->redirect(array('action' => 'index'));
				}
			}
		}
	}

	public function doc($id = null){
		$this->Cons->recursive=2;
		$this->set('solicitud', $this->Cons->read(null, $id));
		$this->response->type('application/pdf');
        $this->layout='pdf'; 
	}

}