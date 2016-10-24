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

    public $belongsTo = array(
        'Departamento' => array(
            'className' => 'Departamento',
            'foreignKey' => 'id_departamento',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

}
