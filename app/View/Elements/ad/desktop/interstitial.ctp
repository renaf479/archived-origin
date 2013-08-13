
	<?php 	
	if(!isset($this->params['pass'][0]) || $this->params['pass'][0] !== 'triggered') {
	
	
	
	} else { 
	?>
		<div id="initial" content-container="initial">
			<countdown id="countdown" ng:click="close()" ng:show="countdownShow">Skip ad in {{countdown}} seconds</countdown>
			<div id="continue" ng:click="close()"></div>
			<div id="content-{{content.id}}" data-ng-repeat="content in originAd_content['OriginAd<?php echo $originAd_platform;?>InitialContent']" content="content"></div>
		</div>
	<?php 
	} 
	?>
