	<?php 	
	if(!isset($this->params['pass'][0]) || $this->params['pass'][0] !== 'triggered') {
	
	} else { 
	?>
		<div id="initial" content-container="Initial">
			<countdown id="countdown" data-ng-hide="countdownHide == 'true'">Skip ad in {{countdown}} seconds</countdown>
			<close id="close"></close>
			<div id="content-{{content.id}}" data-ng-repeat="content in originAd_content['OriginAd<?php echo $originAd_platform;?>InitialContent']" content="content"></div>
		</div>
	<?php 
	} 
	?>
