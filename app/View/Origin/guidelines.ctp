<script type="text/javascript">
	var _template	= '<?php echo addslashes(json_encode($specsheet));?>';
</script>
<div id="guidelines" ng:controller="guidelinesController" ng:cloak>
	<h2 id="guidelines-header" class="originUI-header">{{template.name}} Unit Guidelines</h2>
	
	<div id="guidelines-left" class="originUI-borderColorSecondary originUI-bgColor originUI-shadow inline" data-intro="Ad unit dimension guidelines" data-position="left">
		<h3 id="guidelines-dimensionsHeader" class="originUI-tileHeader originUI-borderColor originUI-textColor">Ad Unit Guides</h3>
		<ul id="guidelines-dimensionsPlatforms" class="originUI-list">
			<li id="guidelines-dimensions{{platform.name}}" class="guidelines-dimensionsIcon originUI-hover" ng:show="template.config.dimensions.Initial[platform.name].width" ng:repeat="platform in platforms" ng:click="dimensionsShow(platform.name)" ng:class="(platform.name == platformShow)? 'active': ''">{{platform.name}}</li>
		</ul>
		<div id="guidelines-dimensions" class="originUI-tileContent">
			<p id="guidelines-summary" class="">{{template.content.description}}</p>
			<h4 id="guidelines-dimensionsInitialHeader">Initial</h4>
			<div id="guidelines-dimensionsInitial" class="guidelines-dimensionsPreview">
				<span class="guidelines-dimensionsWidth">{{template.config.dimensions.Initial[platformShow].width}}px</span>
				<span class="guidelines-dimensionsHeight">{{template.config.dimensions.Initial[platformShow].height}}px</span>
				<img id="" class="guidelines-dimensionsImage" ng:src="{{dimensionsInitial}}" src="http://placehold.it/100/100"/>
			</div>
			<div id="guidelines-dimensionsTriggered" class="originUI-borderColorSecondary" ng:show="template.config.dimensions.Triggered[platformShow].width > 0">
				<h4 id="guidelines-dimensionsTriggeredHeader">Triggered</h4>
				<div class="guidelines-dimensionsPreview">
					<span class="guidelines-dimensionsWidth">{{template.config.dimensions.Triggered[platformShow].width}}px</span>
					<span class="guidelines-dimensionsHeight">{{template.config.dimensions.Triggered[platformShow].height}}px</span>
					<img id="" class="guidelines-dimensionsImage" ng:src="{{dimensionsTriggered}}" src="http://placehold.it/100/100"/>
				</div>
			</div>
		</div>
	</div>
	<div id="guidelines-showcase" class="inline originUI-bgColor originUI-shadow" data-intro="Showcase units of this ad unit type. Click to see a demo." data-position="right">
		<h2 id="guidelines-showcaseHeader" class="originUI-tileHeader originUI-borderColor originUI-textColor">Showcase Units</h2>
		<div class="originUI-tileContent">
			<ul class="originUI-list">
				<li ng:repeat="ad in showcase|filter:{OriginAd.config.template: template.alias}" class="guidelines-showcaseAd">
					<a href="/demo/Origin/{{ad.OriginAd.id}}" target="_blank">
						<h3>{{ad.OriginAd.name}}</h3>
						<img ng:src="{{ad.OriginAd.content.img_thumbnail}}"/>
					</a>
				</li>
			</ul>
		</div>
	</div>
<!--
	<div id="guidelines-components">
		<div ng:repeat="component in components" class="originUI-bgColorSecondary originUI-borderColor inline guidelines-component" tooltip-placement="bottom" tooltip="{{component.OriginComponent.content.description}}">
			{{component.OriginComponent.name}}
			<img ng:src="{{component.OriginComponent.config.img_icon}}"/>
		</div>
	</div>
-->

<?php
	echo $this->Minify->script(array('controllers/guidelinesController'));