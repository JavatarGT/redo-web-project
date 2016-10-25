<?php
App::uses('AppModel', 'Model');
/**
 * Programa Model
 *
 * @property Programa $programa
 */


class Programa extends AppModel {

	public $useTable = 'programa';

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