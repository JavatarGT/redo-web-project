<?php
App::uses('AppModel', 'Model');
/**
 * EstablecimientoPrograma Model
 *
 * @property Establecimiento $establecimiento
 */


class EstablecimientoPrograma extends AppModel {

	public $useTable = 'establecimiento_programa';

	public $belongsTo = array(
		'Establecimiento' => array(
			'className' => 'Establecimiento',
			'foreignKey' => 'id_establecimiento',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Programa' => array(
			'className' => 'Programa',
			'foreignKey' => 'id_programa',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}