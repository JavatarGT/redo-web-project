<?php
App::uses('AppModel', 'Model');
/**
 * Municipio Model
 *
 * @property Municipio $municipio
 */
class Compra extends AppModel {

/**
 * Display field
 *
 * @var string
 */
    public $useTable = 'compra';
    public $primaryKey = 'id_compra';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

    public $hasMany = array(
        'DetCompra' => array(
            'className' => 'DetCompra',
            'foreignKey' => 'id_compra',
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
