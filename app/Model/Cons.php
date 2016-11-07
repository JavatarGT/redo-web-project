<?php
App::uses('AppModel', 'Model');
/**
 * Municipio Model
 *
 * @property Municipio $municipio
 */
class Cons extends AppModel {

/**
 * Display field
 *
 * @var string
 */
    public $useTable = 'cons';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
    // public $hasMany = array(
    //     'Persona' => array(
    //         'className' => 'Persona',
    //         'foreignKey' => 'id_persona',
    //         'dependent' => false,
    //         'conditions' => '',
    //         'fields' => '',
    //         'order' => '',
    //         'limit' => '',
    //         'offset' => '',
    //         'exclusive' => '',
    //         'finderQuery' => '',
    //         'counterQuery' => ''
    //     )
    // );

    public $belongsTo = array(
        'Persona' => array(
            'className' => 'Persona',
            'foreignKey' => 'id_persona',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

}
