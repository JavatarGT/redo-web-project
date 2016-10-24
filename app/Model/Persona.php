<?php
App::uses('AppModel', 'Model');
/**
 * Group Model
 *
 * @property Puesto $Puesto
 */


class Persona extends AppModel {

	public $useTable = 'persona';
	public $virtualFields = array('nombre_completo' => 'CONCAT('."Persona.primer_nombre, ' ', Persona.segundo_nombre, ' ', Persona.primer_apellido, ' ', Persona.segundo_apellido". ')');

	public $belongsTo = array(
		'Puesto' => array(
			'className' => 'Puesto',
			'foreignKey' => 'id_puesto',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
