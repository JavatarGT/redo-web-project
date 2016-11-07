<?php
App::uses('AppModel', 'Model');
/**
 * Desembolso Model
 *
 * @property Desembolso $desembolso
 */


class Authtmp extends AppModel {

	public $useTable = 'auth_tmp';
	public $belongsTo = array(
		'Establecimiento' => array(
			'className' => 'Establecimiento',
			'foreignKey' => 'id_establecimiento',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}