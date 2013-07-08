<div class="adList-expand originUI-bgColor originUI-borderColor originUI-expandWrapper" ng:show="adShow === ad.OriginAd.id">
	<a href="javascript:void(0)" class="adListExpand-close originUI-hover" ng:click="expandClose()">close</a>
	<h2 class="adListExpand-name originUI-header originUI-borderColor" ng:click="editor('{{ad.OriginAd.id}}')">{{ad.OriginAd.name}}</h2>
	
	<div class="originUI-expandLeft inline">
	</div>
	<div class="originUI-expandRight inline">
		<?php echo $this->element('form_embed');?>
	</div>
</div>