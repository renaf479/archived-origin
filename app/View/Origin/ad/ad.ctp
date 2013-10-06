<?php
	$contentArray		= array('OriginAd'.$originAd_platform.'InitialContent', 'OriginAd'.$originAd_platform.'TriggeredContent');
	$origin_ad['OriginAd']['config'] 		= json_decode($origin_ad['OriginAd']['config']);
	$origin_ad['OriginAd']['content'] 		= json_decode($origin_ad['OriginAd']['content']);

	foreach($origin_ad['OriginAdSchedule'] as $skey=>$schedules) {
		foreach($contentArray as $contentName) {
			foreach($schedules[$contentName] as $ckey=>$content) {
				$origin_ad['OriginAdSchedule'][$skey][$contentName][$ckey]['content']	= json_decode($content['content']);
				$origin_ad['OriginAdSchedule'][$skey][$contentName][$ckey]['config']	= json_decode($content['config']);
				$origin_ad['OriginAdSchedule'][$skey][$contentName][$ckey]['render']	= urlencode($content['render']);
			}
		}
	}	
	
	//$template	= $origin_ad['OriginAd']['config']->template;
	//$trigger	= strtolower($origin_ad['OriginAd']['config']->animations->trigger);
	$type	= $origin_ad['OriginAd']['config']->type;

	//Add GA tracking if available
	if(isset($origin_ad['OriginAd']['content']->ga_id)) {
	?>
		<script type="text/javascript">
		var _gaq=_gaq||[];_gaq.push(["_setAccount","<?php echo $origin_ad['OriginAd']['content']->ga_id;?>"]);_gaq.push(["_trackPageview"]);var ga=document.createElement("script");ga.type="text/javascript";ga.async=!0;ga.src=("https:"==document.location.protocol?"https://ssl":"http://www")+".google-analytics.com/ga.js";var s=document.getElementsByTagName("script")[0];s.parentNode.insertBefore(ga,s);
		</script>
	<?php 
	}

	//Add Override styles if available
	if(isset($origin_ad['OriginAd']['content_css'])) {
		echo $origin_ad['OriginAd']['content_css'];
	}
?>

<script type="text/javascript">
	var origin_ad		= '<?php echo addslashes(json_encode($origin_ad));?>';
	var origin_platform	= '<?php echo $originAd_platform;?>';
	var originAd_id		= '<?php echo $origin_ad['OriginAd']['id'];?>';
	var originAd_action	= '<?php echo ($originAd_state === 'triggered')? 'close': 'open';?>';
</script>

<div id="<?php echo $type;?>" data-ng-controller="<?php echo $type;?>Controller">
	<?php 
		//echo $this->element('/ad/'.strtolower($originAd_platform).'/'.$template, array('origin_ad'=>$origin_ad));
		
/*
		$dimensions 				= new stdClass();
		$dimensions->initial		= "width:{$origin_ad['OriginAd']['config']->dimensions->Initial->{$originAd_platform}->width}px;height:{$origin_ad['OriginAd']['config']->dimensions->Initial->{$originAd_platform}->height}px;";
		$dimensions->triggered		= "width:{$origin_ad['OriginAd']['config']->dimensions->Triggered->{$originAd_platform}->width}px;height:{$origin_ad['OriginAd']['config']->dimensions->Triggered->{$originAd_platform}->height}px;";
*/
	?>
		
		<?php
			echo $this->element('ad/'.strtolower($originAd_platform).'/'.$type, array('originAd_platform'=>$originAd_platform));
		
		
/*
		switch($type) {
			case 'expand':
				//If the ad type is an expansion, render both #initial and #triggered views
				echo $this->element('/ad/content', array('id'=>'Initial', 'dimensions'=>$dimensions->initial, 'originAd_platform'=>$originAd_platform));
				echo $this->element('/ad/content', array('id'=>'Triggered', 'dimensions'=>$dimensions->triggered, 'originAd_platform'=>$originAd_platform));
				break;
			case 'overlay':
				//If the triggered state is an overlay
				if($originAd_state !== 'triggered') {
					//Render if it's an #initial view
					echo $this->element('/ad/content', array('id'=>'Initial', 'dimensions'=>$dimensions->initial, 'originAd_platform'=>$originAd_platform));
				} else {
					//Render if it's an #triggered view
					echo $this->element('/ad/content', array('id'=>'Triggered', 'dimensions'=>$dimensions->triggered, 'originAd_platform'=>$originAd_platform));
				}
			
				break;
			case 'interstitial':
				//If the ad type is an interstital, render just #initial
				echo $this->element('/ad/content', array('id'=>'Initial', 'dimensions'=>$dimensions->initial, 'originAd_platform'=>$originAd_platform));
				break;
		}
*/
		?>
</div>

<?php
	echo $this->Minify->css(array('ad/ad'));
	echo $this->Minify->script(array('ad/plugins/angularjs', 'ad/plugins/anim', 'ad/plugins/cm', 'ad/plugins/xd', 'ad/app/app', 'ad/app/directives', 'ad/app/services', 'ad/app/'.$type.'Controller'));