<?php
class User extends AppModel{
	public $hasMany = array('Message');
	public function beforeSave($options = array()) {
	        parent::beforeSave();
	        if(isset($this->data['User']['password'])){
				$this->data['User']['password'] = Security::hash($this->data['User']['password'], NULL, true);
			}
	        return true;
	}

    public $name = 'users';
}