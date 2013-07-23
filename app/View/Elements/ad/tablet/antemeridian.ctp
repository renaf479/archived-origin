<?php
	$dimensions 				= new stdClass();
	
	$initialMarginLeft		= '-'.($origin_ad['OriginAd']['config']->dimensions->Initial->{$originAd_platform}->width/2).'px';
	$initialMarginTop		= '-'.($origin_ad['OriginAd']['config']->dimensions->Initial->{$originAd_platform}->height/2).'px';
	$initialMargin 			= "margin:{$initialMarginTop} 0 0 {$initialMarginLeft}";
	
	$dimensions->initial	= "width:{$origin_ad['OriginAd']['config']->dimensions->Initial->{$originAd_platform}->width}px;height:{$origin_ad['OriginAd']['config']->dimensions->Initial->{$originAd_platform}->height}px;{$initialMargin}";
?>

<div ng:controller="antemeridianController">
	<div id="overlay" ng:click="close()"></div>
	<div id="initial" style="<?php echo $dimensions->initial;?>">
		<countdown id="countdown" ng:click="close()" ng:show="countdownShow">Continuing to site in {{countdown}} seconds</countdown>
		<div id="continue" ng:click="close()"></div>
		<div id="content-{{content.id}}" ng:repeat="content in originAd_content['OriginAd<?php echo $originAd_platform;?>InitialContent']" content="content"></div>
	</div>
</div>