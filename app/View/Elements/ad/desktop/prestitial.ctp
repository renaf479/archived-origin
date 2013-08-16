<div id="initial" content-container="Initial">
	<countdown id="countdown">Continue to site in {{countdown}} seconds</countdown>
	<close id="continue"></close>
	<overlay id="overlayBg" data-type="triggered"></overlay>
	<div id="content-{{content.id}}" data-ng-repeat="content in originAd_content['OriginAd<?php echo $originAd_platform;?>InitialContent']" content="content"></div>
</div>