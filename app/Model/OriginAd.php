<?php

App::uses('Origin', 'Model');

class OriginAd extends AppModel {
	public $actsAs 		= array('Containable');
	//public $hasMany		= 'OriginAdSchedule';
	public $hasMany 	= array(
		'OriginAdSchedule'=>array(
			'className'=>'OriginAdSchedule',
			'order'=>'OriginAdSchedule.start_date IS NULL DESC, OriginAdSchedule.start_date ASC',
			'foreignKey'=>'origin_ad_id',
			'dependent'=>true
		)
	);
}