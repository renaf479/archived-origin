<?php

App::uses('Origin', 'Model');

class OriginAd extends AppModel {
	public $actsAs 		= array('Containable');
	//public $hasMany		= 'OriginAdSchedule';
	public $hasMany 	= array(
		'OriginAdSchedule'=>array(
			'className'=>'OriginAdSchedule',
			'foreignKey'=>'origin_ad_id',
			'dependent'=>true
		)
	);
}