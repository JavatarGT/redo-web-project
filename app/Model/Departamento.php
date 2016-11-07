<?php
App::uses('AppModel', 'Model');
/**
 * Departamento Model
 *
 * @property Departamento $departamento
 */


class Departamento extends AppModel {

	public $useTable = 'departamento';

	public $displayField = 'nombre';

	public $hasMany = array(
		'Municipio' => array(
			'className' => 'Municipio',
			'foreignKey' => 'id_departamento',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Establecimiento' => array(
			'className' => 'Municipio',
			'foreignKey' => 'id_departamento',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
