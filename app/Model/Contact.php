<?php
class Contact extends AppModel{
    public $name = 'messages';

	public $validate = array(
	    'name' => array(
	        'rule'       => 'notEmpty',
	        'required'   => true,
	        'allowEmpty' => false,
	        'message'    => 'Vous devez remplir ce champ'
	    ),
        'email' => array(
            'email_not_empty' => array(
                'rule' => 'notEmpty',
                'message' => 'Email requis',
                'last' => true
	                )
            ),
	    'message' => array(
	        'rule'       => 'notEmpty',
	        'required'   => true,
	        'allowEmpty' => false,
	        'message'    => 'Vous devez remplir ce champ'
	    )
	);
}