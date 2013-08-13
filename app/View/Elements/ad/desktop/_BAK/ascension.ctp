<?php
	$dimensions 				= new stdClass();
	$dimensions->initial		= "width:{$origin_ad['OriginAd']['config']->dimensions->Initial->{$originAd_platform}->width}px;height:{$origin_ad['OriginAd']['config']->dimensions->Initial->{$originAd_platform}->height}px";
	$dimensions->triggered		= "width:{$origin_ad['OriginAd']['config']->dimensions->Triggered->{$originAd_platform}->width}px;height:{$origin_ad['OriginAd']['config']->dimensions->Triggered->{$originAd_platform}->height}px";
?>
<div ng:controller="ascensionController">
	<div id="initial" style="<?php echo $dimensions->initial;?>" ng:class="{hidden: hiddenView == 'initial'}">
		<div id="content-{{content.id}}" ng:repeat="content in originAd_content['OriginAd<?php echo $originAd_platform;?>InitialContent']" content="content"></div>
	</div>
	<div id="triggered" style="<?php echo $dimensions->triggered;?>" ng:class="{hidden: hiddenView == 'triggered'}">
		<div id="content-{{content.id}}" ng:repeat="content in originAd_content['OriginAd<?php echo $originAd_platform;?>TriggeredContent']" content="content"></div>
	</div>
</div>