<?php
App::uses('AppModel', 'Model');
/**
 * GuideSubmission Model
 *
 * @property Tourist $Tourist
 */
class GuideSubmission extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'guide_submission';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Tourist' => array(
			'className' => 'Tourist',
			'foreignKey' => 'tourist_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
