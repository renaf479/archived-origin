<div id="<?php echo strtolower($id);?>" content-container="<?php echo $id;?>">
	<div id="content-{{content.id}}" data-ng-repeat="content in originAd_content['OriginAd<?php echo $originAd_platform.$id;?>Content']" content="content"></div>
</div>