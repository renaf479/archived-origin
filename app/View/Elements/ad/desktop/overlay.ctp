	<?php 	
	if(!isset($this->params['pass'][0]) || $this->params['pass'][0] !== 'triggered') {
	?>	
		<overlay id="overlayBg" data-type="initial"></overlay>
		<div id="initial" content-container="Initial">
			<div id="content-{{content.id}}" data-ng-repeat="content in originAd_content['OriginAd<?php echo $originAd_platform;?>InitialContent']" content="content"></div>
		</div>
	<?php 
	} else { 
	?>
		<overlay id="overlayBg" data-type="triggered"></overlay>
		<div id="triggered" content-container="Triggered">
			<div id="content-{{content.id}}" data-ng-repeat="content in originAd_content['OriginAd<?php echo $originAd_platform;?>TriggeredContent']" content="content"></div>
		</div>	
	<?php 
	} 
	?>