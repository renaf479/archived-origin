<?php
	$dimensions 				= new stdClass();
	$marginLeft					= '-'.($origin_ad['OriginAd']['config']->dimensions->Initial->{$originAd_platform}->width/2).'px';
	$dimensions->initial		= "width:{$origin_ad['OriginAd']['config']->dimensions->Initial->{$originAd_platform}->width}px;height:{$origin_ad['OriginAd']['config']->dimensions->Initial->{$originAd_platform}->height}px;margin-left:{$marginLeft}";
?>
<div ng:controller="auroraController">
	<div id="initial" style="<?php echo $dimensions->initial;?>">
		<div id="content-{{content.id}}" ng:repeat="content in originAd_content['OriginAd<?php echo $originAd_platform;?>InitialContent']" content="content"></div>
	</div>
</div>