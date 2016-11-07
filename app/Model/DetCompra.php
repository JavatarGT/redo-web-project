<?php
App::uses('AppModel', 'Model');
/**
 * Municipio Model
 *
 * @property Municipio $municipio
 */
class DetCompra extends AppModel {

/**
 * Display field
 *
 * @var string
 */
    public $useTable = 'detalle_compra';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

    public $belongsTo = array(
        'Compra' => array(
            'className' => 'Compra',
            'foreignKey' => 'id_compra',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

}
