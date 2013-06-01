<?php

App::uses('Origin', 'Model');

class OriginAdSchedule extends AppModel {
	//public $belongsTo	= 'OriginAd';
	//public $hasMany		= array('OriginAdDesktopInitialContent', 'OriginAdDesktopTriggeredContent', 'OriginAdMobileInitialContent', 'OriginAdMobileTriggeredContent', 'OriginAdTabletInitialContent', 'OriginAdTabletTriggeredContent');
	
	
	public $hasMany 	= array(
		'OriginAdDesktopInitialContent'=>array(
			'className'=>'OriginAdDesktopInitialContent',
			'foreignKey'=>'origin_ad_schedule_id',
			'dependent'=>true
		),
		'OriginAdDesktopTriggeredContent'=>array(
			'className'=>'OriginAdDesktopTriggeredContent',
			'foreignKey'=>'origin_ad_schedule_id',
			'dependent'=>true
		),
		'OriginAdMobileInitialContent'=>array(
			'className'=>'OriginAdMobileInitialContent',
			'foreignKey'=>'origin_ad_schedule_id',
			'dependent'=>true
		),
		'OriginAdMobileTriggeredContent'=>array(
			'className'=>'OriginAdMobileTriggeredContent',
			'foreignKey'=>'origin_ad_schedule_id',
			'dependent'=>true
		),
		'OriginAdTabletInitialContent'=>array(
			'className'=>'OriginAdTabletInitialContent',
			'foreignKey'=>'origin_ad_schedule_id',
			'dependent'=>true
		),
		'OriginAdTabletTriggeredContent'=>array(
			'className'=>'OriginAdTabletTriggeredContent',
			'foreignKey'=>'origin_ad_schedule_id',
			'dependent'=>true
		)
	);
}