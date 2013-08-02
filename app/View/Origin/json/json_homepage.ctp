<?php
	foreach($origin_templates as $key=>&$origin_template) {
		$origin_template['OriginTemplate']['config']	= json_decode($origin_template['OriginTemplate']['config']);
		$origin_template['OriginTemplate']['content']	= json_decode($origin_template['OriginTemplate']['content']);
		
		//$origin_template['OriginAds']['config']			= json_decode($origin_template['OriginAds']['config']);
		//$origin_template['OriginAds']['content']		= json_decode($origin_template['OriginAds']['content']);
		
		$origin_template['OriginAds']['demoLink']		= PseudoCrypt::hash($origin_template['OriginAds']['id'], 6);
	}
	echo json_encode($origin_templates);