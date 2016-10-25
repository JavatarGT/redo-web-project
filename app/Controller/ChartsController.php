<?php
App::uses('AppController', 'Controller');
date_default_timezone_set('America/Guatemala');
/**
 * Departamentos Controller
 *
 * Administra los departamentos
 */
class ChartsController extends AppController {

	public $uses = array('Vistadb', 'Labdb', 'Ciedb', 'Edaddb', 'Labedaddb', 'Ptcontroldb');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->set('title_for_layout', __('Total de Consultas'));
	}

	public function consultagenero() {
		$this->set('title_for_layout', __('Total de Consultas por Género'));
	}

	public function consultaedad() {
		$this->set('title_for_layout', __('Total de Consultas por Edades'));
	}

	public function consultagrupo() {
		$this->set('title_for_layout', __('Total de Consultas por Grupo Étnico'));
	}

	public function consultaimpc() {
		$this->set('title_for_layout', __('Total de Consultas por Impresión Clínica'));
	}

	public function consultacie() {
		$this->set('title_for_layout', __('Total de Consultas por CIE-10'));
	}

	public function consultapt() {
		$this->set('title_for_layout', __('Total de Registros de Peso y Talla'));
	}

	public function labindx() {
		$this->set('title_for_layout', __('Total de Laboratorios'));
	}

	public function labgenero() {
		$this->set('title_for_layout', __('Total de Laboratorios por Género'));
	}

	public function labedad() {
		$this->set('title_for_layout', __('Total de Laboratorios por Edades'));
	}
//Consultas para Clínica
//---------------------------------------------------------
	public function consupt() {
		$nombre = "";
		$condiciones =array();
		if (isset($this->request->data['Consulta']['fecha1']) && isset($this->request->data['Consulta']['fecha2'])){
			$fechai = $this->request->data['Consulta']['fecha1'];
			$fechaf = $this->request->data['Consulta']['fecha2'];
			$condiciones = array('Ptcontroldb.fecha >=' => $fechai, 'Ptcontroldb.fecha <=' => $fechaf);
		}
		$this->Ptcontroldb->virtualFields['TOTAL_C'] = 0;
		$n = $this->Ptcontroldb->find('all', array(
			'fields' => array('genero','count(id) AS Ptcontroldb__TOTAL_C'),
			'conditions' => array('AND' => $condiciones),
			'recursive' => 0,
    		'group' => 'genero'
    		)
		);
		$this->set('consultas', $n);
        $this->layout='ajax';  
	}

	public function consu() {
		$nombre = "";
		$condiciones =array();
		if (isset($this->request->data['Consulta']['fecha1']) && isset($this->request->data['Consulta']['fecha2'])){
			$fechai = $this->request->data['Consulta']['fecha1'];
			$fechaf = $this->request->data['Consulta']['fecha2'];
			$condiciones = array('Vistadb.fecha >=' => $fechai, 'Vistadb.fecha <=' => $fechaf);
		}
		$this->Vistadb->virtualFields['TOTAL_C'] = 0;
		$n = $this->Vistadb->find('all', array(
			'fields' => array('tipo','count(id) AS Vistadb__TOTAL_C'),
			'conditions' => array('AND' => $condiciones),
			'recursive' => 0,
    		'group' => 'tipo'
    		)
		);
		$this->set('consultas', $n);
        $this->layout='ajax';  
	}
	//consulta por edades
	public function consedad($i = null) {
		$nombre = "";
		$condiciones =array();
		if (isset($this->request->data['Consulta']['fecha1']) && isset($this->request->data['Consulta']['fecha2'])){
			$fechai = $this->request->data['Consulta']['fecha1'];
			$fechaf = $this->request->data['Consulta']['fecha2'];
			if($i == 1)
				$condiciones = array('Edaddb.tipo' => 'Consulta', 'Edaddb.fecha >=' => $fechai, 'Edaddb.fecha <=' => $fechaf);
			if($i == 2)
				$condiciones = array('Edaddb.tipo' => 'Reconsulta','Edaddb.fecha >=' => $fechai, 'Edaddb.fecha <=' => $fechaf);
			if($i == 3)
				$condiciones = array('Edaddb.fecha >=' => $fechai, 'Edaddb.fecha <=' => $fechaf);
		}
		$this->Edaddb->virtualFields['TOTAL_C'] = 0;
		$n = $this->Edaddb->find('all', array(
			'fields' => array('clasificacion','count(tipo) AS Edaddb__TOTAL_C'),
			'conditions' => array('AND' => $condiciones),
			'recursive' => 0,
    		'group' => 'clasificacion'
    		)
		);
		$this->set('consultas', $n);
        $this->layout='ajax';  
	}
	//consulta por grupo etnico
	public function consgrupo($i = null) {
		$nombre = "";
		$condiciones =array();
		if (isset($this->request->data['Consulta']['fecha1']) && isset($this->request->data['Consulta']['fecha2'])){
			$fechai = $this->request->data['Consulta']['fecha1'];
			$fechaf = $this->request->data['Consulta']['fecha2'];
			if($i == 1)
				$condiciones = array('Vistadb.tipo' => 'Consulta', 'Vistadb.fecha >=' => $fechai, 'Vistadb.fecha <=' => $fechaf);
			if($i == 2)
				$condiciones = array('Vistadb.tipo' => 'Reconsulta','Vistadb.fecha >=' => $fechai, 'Vistadb.fecha <=' => $fechaf);
			if($i == 3)
				$condiciones = array('Vistadb.fecha >=' => $fechai, 'Vistadb.fecha <=' => $fechaf);
		}
		$this->Vistadb->virtualFields['TOTAL_C'] = 0;
		$n = $this->Vistadb->find('all', array(
			'fields' => array('nom_grupo_etnico','count(id) AS Vistadb__TOTAL_C'),
			'conditions' => array('AND' => $condiciones),
			'recursive' => 0,
    		'group' => 'nom_grupo_etnico'
    		)
		);
		$this->set('consultas', $n);
        $this->layout='ajax';  
	}

	//Consultas por Genero M
	public function consgenero() {
		$nombre = "";
		$condiciones =array();
		if (isset($this->request->data['Consulta']['fecha1']) && isset($this->request->data['Consulta']['fecha2'])){
			$fechai = $this->request->data['Consulta']['fecha1'];
			$fechaf = $this->request->data['Consulta']['fecha2'];
			$condiciones = array('Vistadb.genero LIKE' => '%'.'M'.'%', 'Vistadb.fecha >=' => $fechai, 'Vistadb.fecha <=' => $fechaf);
		}
		$this->Vistadb->virtualFields['TOTAL_C'] = 0;
		$n = $this->Vistadb->find('all', array(
			'fields' => array('genero','count(id) AS Vistadb__TOTAL_C'),
			'conditions' => array('AND' => $condiciones),
			'recursive' => 0,
    		'group' => 'genero, tipo'
    		)
		);
		$this->set('consultas', $n);
        $this->layout='ajax';  
	}

	//Reconsultas por Genero F
	public function reconsgenero() {
		$nombre = "";
		$condiciones =array();
		if (isset($this->request->data['Consulta']['fecha1']) && isset($this->request->data['Consulta']['fecha2'])){
			$fechai = $this->request->data['Consulta']['fecha1'];
			$fechaf = $this->request->data['Consulta']['fecha2'];
			$condiciones = array('Vistadb.genero LIKE' => '%'.'F'.'%', 'Vistadb.fecha >=' => $fechai, 'Vistadb.fecha <=' => $fechaf);
		}
		$this->Vistadb->virtualFields['TOTAL_C'] = 0;
		$n = $this->Vistadb->find('all', array(
			'fields' => array('genero','count(id) AS Vistadb__TOTAL_C'),
			'conditions' => array('AND' => $condiciones),
			'recursive' => 0,
    		'group' => 'genero, tipo'
    		)
		);
		$this->set('consultas', $n);
        $this->layout='ajax';  
	}

	public function consuimpc() {
		$nombre = "";
		$condiciones =array();
		if (isset($this->request->data['Consulta']['fecha1']) && isset($this->request->data['Consulta']['fecha2'])){
			$fechai = $this->request->data['Consulta']['fecha1'];
			$fechaf = $this->request->data['Consulta']['fecha2'];
			$condiciones = array('Vistadb.fecha >=' => $fechai, 'Vistadb.fecha <=' => $fechaf);
		}
		$this->Vistadb->virtualFields['TOTAL_C'] = 0;
		$n = $this->Vistadb->find('all', array(
			'fields' => array('Impresion','count(id) AS Vistadb__TOTAL_C'),
			'conditions' => array('AND' => $condiciones),
			'recursive' => 0,
    		'group' => 'Impresion'
    		)
		);
		$this->set('consultas', $n);
        $this->layout='ajax';  
	}

	public function consucie() {
		$nombre = "";
		$condiciones =array();
		if (isset($this->request->data['Consulta']['fecha1']) && isset($this->request->data['Consulta']['fecha2'])){
			$fechai = $this->request->data['Consulta']['fecha1'];
			$fechaf = $this->request->data['Consulta']['fecha2'];
			$condiciones = array('Ciedb.tipo' => 'Consulta', 'Ciedb.fecha >=' => $fechai, 'Ciedb.fecha <=' => $fechaf);
		}
		$this->Ciedb->virtualFields['TOTAL_C'] = 0;
		$n = $this->Ciedb->find('all', array(
			'fields' => array('diagnosticocie','count(id) AS Ciedb__TOTAL_C'),
			'conditions' => array('AND' => $condiciones),
			'recursive' => 0,
    		'group' => 'diagnosticocie, tipo'
    		)
		);
		$this->set('consultas', $n);
        $this->layout='ajax';  
	}

	public function reconsucie() {
		$nombre = "";
		$condiciones =array();
		if (isset($this->request->data['Consulta']['fecha1']) && isset($this->request->data['Consulta']['fecha2'])){
			$fechai = $this->request->data['Consulta']['fecha1'];
			$fechaf = $this->request->data['Consulta']['fecha2'];
			$condiciones = array('Ciedb.tipo' => 'Reconsulta', 'Ciedb.fecha >=' => $fechai, 'Ciedb.fecha <=' => $fechaf);
		}
		$this->Ciedb->virtualFields['TOTAL_C'] = 0;
		$n = $this->Ciedb->find('all', array(
			'fields' => array('diagnosticocie','count(id) AS Ciedb__TOTAL_C'),
			'conditions' => array('AND' => $condiciones),
			'recursive' => 0,
    		'group' => 'diagnosticocie, tipo'
    		)
		);
		$this->set('consultas', $n);
        $this->layout='ajax';  
	}

	public function consucietot() {
		$nombre = "";
		$condiciones =array();
		if (isset($this->request->data['Consulta']['fecha1']) && isset($this->request->data['Consulta']['fecha2'])){
			$fechai = $this->request->data['Consulta']['fecha1'];
			$fechaf = $this->request->data['Consulta']['fecha2'];
			$condiciones = array('Ciedb.fecha >=' => $fechai, 'Ciedb.fecha <=' => $fechaf);
		}
		$this->Ciedb->virtualFields['TOTAL_C'] = 0;
		$n = $this->Ciedb->find('all', array(
			'fields' => array('diagnosticocie','count(id) AS Ciedb__TOTAL_C'),
			'conditions' => array('AND' => $condiciones),
			'recursive' => 0,
    		'group' => 'diagnosticocie'
    		)
		);
		$this->set('consultas', $n);
        $this->layout='ajax';  
	}
//------------------------------------------------------------------------
	//Consultas para Laboratorio
//------------------------------------------------------------------------
	public function labtotal() {
		$nombre = "";
		$condiciones =array();
		if (isset($this->request->data['Consulta']['fecha1']) && isset($this->request->data['Consulta']['fecha2'])){
			$fechai = $this->request->data['Consulta']['fecha1'];
			$fechaf = $this->request->data['Consulta']['fecha2'];
			$condiciones = array('Labdb.fecha >=' => $fechai, 'Labdb.fecha <=' => $fechaf);
		}
		$this->Labdb->virtualFields['TOTAL_C'] = 0;
		$n = $this->Labdb->find('all', array(
			'fields' => array('tipo_laboratorio','count(id) AS Labdb__TOTAL_C'),
			'conditions' => array('AND' => $condiciones),
			'recursive' => 0,
    		'group' => 'tipo_laboratorio'
    		)
		);
		$this->set('consultas', $n);
        $this->layout='ajax';  
	}

	public function conslabgenero() {
		$nombre = "";
		$condiciones =array();
		if (isset($this->request->data['Consulta']['fecha1']) && isset($this->request->data['Consulta']['fecha2'])){
			$fechai = $this->request->data['Consulta']['fecha1'];
			$fechaf = $this->request->data['Consulta']['fecha2'];
			$condiciones = array('Labdb.fecha >=' => $fechai, 'Labdb.fecha <=' => $fechaf);
		}
		$this->Labdb->virtualFields['TOTAL_C'] = 0;
		$n = $this->Labdb->find('all', array(
			'fields' => array('genero','count(id) AS Labdb__TOTAL_C'),
			'conditions' => array('AND' => $condiciones),
			'recursive' => 0,
    		'group' => 'genero'
    		)
		);
		$this->set('consultas', $n);
        $this->layout='ajax';  
	}

	//laboratios por edades
	public function conslabedad() {
		$nombre = "";
		$condiciones =array();
		if (isset($this->request->data['Consulta']['fecha1']) && isset($this->request->data['Consulta']['fecha2'])){
			$fechai = $this->request->data['Consulta']['fecha1'];
			$fechaf = $this->request->data['Consulta']['fecha2'];
			$condiciones = array('Labedaddb.fecha >=' => $fechai, 'Labedaddb.fecha <=' => $fechaf);
		}
		$this->Labedaddb->virtualFields['TOTAL_C'] = 0;
		$n = $this->Labedaddb->find('all', array(
			'fields' => array('clasificacion','count(clasificacion) AS Labedaddb__TOTAL_C'),
			'conditions' => array('AND' => $condiciones),
			'recursive' => 0,
    		'group' => 'clasificacion'
    		)
		);
		$this->set('consultas', $n);
        $this->layout='ajax';  
	}

}