<?php
App::uses('AppModel', 'Model');
/**
 * Municipio Model
 *
 * @property Municipio $municipio
 */
class Municipio extends AppModel {

/**
 * Display field
 *
 * @var string
 */
    public $useTable = 'municipio';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
    public $hasMany = array(
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
    public $belongsTo = array(
        'Departamento' => array(
            'className' => 'Departamento',
            'foreignKey' => 'id_departamento',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Establecimiento' => array(
            'className' => 'Establecimiento',
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
