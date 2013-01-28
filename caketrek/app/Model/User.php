<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Tourist $Tourist
 */
class User extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasOne associations
 *
 * @var array
 */
	public $hasOne = array(
		'Tourist' => array(
			'className' => 'Tourist',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
