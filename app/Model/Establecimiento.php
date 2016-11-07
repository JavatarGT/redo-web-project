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
		),
		'Authtmp' => array(
			'className' => 'Authtmp',
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
		),
		'Persona' => array(
			'className' => 'Persona',
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

	public $belongsTo = array(
        'Departamento' => array(
            'className' => 'Departamento',
            'foreignKey' => 'id_departamento',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Municipio' => array(
            'className' => 'Municipio',
            'foreignKey' => 'id_municipio',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
}