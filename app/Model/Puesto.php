<?php
App::uses('AppModel', 'Model');
/**
 * Puesto Model
 *
 * @property Puesto $puesto
 */


class Puesto extends AppModel {

	public $useTable = 'puesto';
	public $displayField = 'nom_puesto';
	
	public $hasMany = array(
		'Persona' => array(
			'className' => 'Persona',
			'foreignKey' => 'id_puesto',
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