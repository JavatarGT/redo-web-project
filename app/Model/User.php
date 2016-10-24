<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');
/**
 * User Model
 *
 * @property Group $Group
 */
class User extends AppModel {

    
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'username';


	public function beforeSave($options = array()) {
        if (isset($this->data['User']['password']))
        {
          if ($this->data['User']['password'] != "")
            $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
          else{
            unset($this->data['User']['password']);
          }
        }

        return true;
    }

	//The Associations below have been created with all possible keys, those that are not needed can be removed

    public $belongsTo = array('Group');
    public $actsAs = array('Acl' => array('type' => 'requester'));

    public function parentNode() {
        if (!$this->id && empty($this->data)) {
            return null;
        }
        if (isset($this->data['User']['group_id'])) {
            $groupId = $this->data['User']['group_id'];
        } else {
            $groupId = $this->field('group_id');
        }
        if (!$groupId) {
            return null;
        }
        return array('Group' => array('id' => $groupId));
    }


}
