<?php
App::uses('AppModel', 'Model');
/**
 * Track Model
 *
 * @property Guide $Guide
 * @property Journey $Journey
 */
class Track extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Guide' => array(
			'className' => 'Guide',
			'foreignKey' => 'guide_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Journey' => array(
			'className' => 'Journey',
			'joinTable' => 'journeys_tracks',
			'foreignKey' => 'track_id',
			'associationForeignKey' => 'journey_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}
