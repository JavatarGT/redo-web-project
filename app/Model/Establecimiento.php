<?php
App::uses('AppModel', 'Model');
/**
 * Establecimiento Model
 *
 * @property Establecimiento $establecimiento
 */


class Establecimiento extends AppModel {

	public $useTable = 'establecimiento';
	public $displayField = 'nombre';

	public $hasMany = array(
		'EstablecimientoPrograma' => array(
			'className' => 'EstablecimientoPrograma',
			'foreignKey' => 'id',
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