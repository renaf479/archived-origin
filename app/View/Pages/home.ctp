<div id="homepage-container" ng:controller="homepageController">
	<div class="homepage-product inline" ng:repeat="product in products|filter:searchOrigin" ng:animate="'originUI-fade'" ng:class="{expand: (productShow === product.OriginTemplate.id), noAnimate: (rowExpand)}" product="{{$index}}">
		<div class="homepageProduct originUI-shadow originUI-borderColor" ng:click="productExpand('open', product, $index)">
			<img class="homepageProduct-image" ng:src="{{product.OriginAds.content.img_thumbnail}}"/>
			<h2 class="homepageProduct-title originUI-bgColor">{{product.OriginTemplate.name}}</h2>
		</div>
		
		<div id="homepage-detail" class="originUI-bgColor" >
			<a href="javascript:void(0)" id="homepageDetail-close" class="originUI-hover" ng:click="productExpand('close', '')">close</a>
			<div id="homepageDetail-left" class="inline">
				<h3 id="homepageDetail-title">{{product.OriginTemplate.name}} Ad Unit</h3>
				<p id="homepageDetail-description">{{product.OriginTemplate.content.description}}</p>
			</div><!--
			--><div id="homepageDetail-right" class="inline">
				
				<div id="guideliens-stateWrapper">
					<div ng:show="product.OriginTemplate.config.dimensions.Triggered[platformShow].width > 0">
						<h3 id="guidelines-stateInitial" class="inline guidelines-state originUI-hover" ng:click="state('Initial')" ng:class="{active:stateShow === 'Initial'}">Initial</h3>
						<h3 id="guidelines-stateTriggered" class="inline guidelines-state originUI-hover" ng:click="state('Triggered')" ng:class="{active:stateShow === 'Triggered'}" ng:show="product.OriginTemplate.config.dimensions.Triggered[platformShow].width > 0">Triggered</h3>
					</div>
				</div>
				<div id="guidelines">
					<div id="guidelines-imageWrapper">
						<div ng:animate="'originUI-fade'" ng:show="stateShow === 'Initial'" ng:hide="stateShow !== 'Initial'">
							<img class="guidelines-imageInitial guidelines-image" guideline-image="{{product[platformShow+'Initial'].content}}"/>
							<span class="guidelines-dimensions">{{product.OriginTemplate.config.dimensions.Initial[platformShow].width}}px by {{product.OriginTemplate.config.dimensions.Initial[platformShow].height}}px</span>
						</div>
						<div ng:animate="'originUI-fade'" ng:show="stateShow === 'Triggered'" ng:hide="stateShow !== 'Triggered'">
							<img class="guidelines-imageTriggered guidelines-image" guideline-image="{{product[platformShow+'Triggered'].content}}"/>
							<span class="guidelines-dimensions">{{product.OriginTemplate.config.dimensions.Triggered[platformShow].width}}px by {{product.OriginTemplate.config.dimensions.Triggered[platformShow].height}}px</span>
						</div>
					</div>
				</div>
				



<!--
				<div id="guidelines-initial" class="originUI-borderColorSecondary">
					<div id="" class="guidelines-imageWrapper" !style="width:{{product.OriginTemplate.config.dimensions.Initial[platformShow].width}}px">
						<span class="guidelines-imageWidth">{{product.OriginTemplate.config.dimensions.Initial[platformShow].width}}px</span>
						<span class="guidelines-imageHeight">{{product.OriginTemplate.config.dimensions.Initial[platformShow].height}}px</span>
						<img id="guidelines-imageInitial" class="guidelines-image" guideline-image="{{product[platformShow+'Initial'].content}}"/>
					</div>
				</div>
-->


<!--
				<div id="guidelines-triggered" class="originUI-borderColorSecondary" ng:show="product.OriginTemplate.config.dimensions.Triggered[platformShow].width > 0">
					<h4 id="">Triggered</h4>
					<div id="" class="guidelines-imageWrapper" !style="width:{{product.OriginTemplate.config.dimensions.Triggered[platformShow].width}}px">
						<span class="guidelines-imageWidth">{{product.OriginTemplate.config.dimensions.Triggered[platformShow].width}}px</span>
						<span class="guidelines-imageHeight">{{product.OriginTemplate.config.dimensions.Triggered[platformShow].height}}px</span>
						<img id="guidelines-imageTriggered" class="guidelines-image" guideline-image="{{product[platformShow+'Triggered'].content}}"/>
					</div>
				</div>
-->
			</div>
		</div>
		
	</div>




<!--

	<div id="homepage-products" class="inline originUI-bgColorSecondary originUI-shadow" data-intro="Supported ad units" data-position="left">
		<ul class="originUI-list originUI-tileContent">
			<li ng:repeat="product in products|filter:searchOrigin" class="homepage-product originUI-borderColorSecondary" ng:click="loadGuideline(product, $index)" ng:class="(guidelines.OriginTemplate.alias == product.OriginTemplate.alias)?'active':''"  ng:animate="'originUI-fade'" ng:cloak>
				<div class="product-wrapper originUI-hover">
					<span class="product-name originUI-textColor">{{product.OriginTemplate.name}}</span>
					<img class="product-image" ng:src="{{product.OriginAds.content.img_thumbnail}}"/>
				</div>
			</li>
		</ul>
	</div><div id="homepage-guidelines" class="inline originUI-bgColor originUI-shadow">
		<div ng:show="guidelinesDisplay" ng:animate="'originUI-fade'">
			<h3 id="homepage-guidelinesHeader" class="originUI-tileHeader originUI-borderColor originUI-textColor">{{guidelines.OriginTemplate.name}} Ad Unit</h3>
			<ul id="guidelines-platforms" class="originUI-list" data-intro="Supported platforms" data-position="right">
				<li id="guidelines-platforms{{platform.name}}" class="guidelines-platformsIcon originUI-hover" ng:show="guidelines.OriginTemplate.config.dimensions.Initial[platform.name].width" ng:repeat="platform in platforms" ng:click="dimensionsShow(platform.name)" ng:class="(platform.name == platformShow)? 'active': ''">{{platform.name}}</li>
			</ul>
			
			<div class="originUI-tileContent" data-intro="Detailed specifications of unit" data-position="right">
				<div id="guidelines-summaryWrapper" class="">
					<img id="guidelines-summaryImage" class="inline" ng:src="{{guidelines.OriginAds.content.img_thumbnail}}"/>
					<p id="guidelines-summaryDescription" class="inline">{{guidelines.OriginTemplate.content.description}}</p>
				</div>
				
				<div id="guidelines-initial" class="originUI-borderColorSecondary">
					<h4 id="">Initial</h4>
					<div id="" class="guidelines-imageWrapper" style="width:{{guidelines.OriginTemplate.config.dimensions.Initial[platformShow].width}}px">
						<span class="guidelines-imageWidth">{{guidelines.OriginTemplate.config.dimensions.Initial[platformShow].width}}px</span>
						<span class="guidelines-imageHeight">{{guidelines.OriginTemplate.config.dimensions.Initial[platformShow].height}}px</span>
						<img id="guidelines-imageInitial" class="guidelines-image" ng:src="{{guidelinesInitial}}"/>
					</div>
				</div>
				<div id="guidelines-triggered" class="originUI-borderColorSecondary" ng:show="guidelines.OriginTemplate.config.dimensions.Triggered[platformShow].width > 0">
					<h4 id="">Triggered</h4>
					<div id="" class="guidelines-imageWrapper" style="width:{{guidelines.OriginTemplate.config.dimensions.Triggered[platformShow].width}}px">
						<span class="guidelines-imageWidth">{{guidelines.OriginTemplate.config.dimensions.Triggered[platformShow].width}}px</span>
						<span class="guidelines-imageHeight">{{guidelines.OriginTemplate.config.dimensions.Triggered[platformShow].height}}px</span>
						<img id="guidelines-imageTriggered" class="guidelines-image" ng:src="{{guidelinesTriggered}}"/>
					</div>
				</div>
			</div>
		</div>
	</div>
-->
</div>


<?php
	echo $this->Minify->script(array('homepage/homepageController', 'homepage/homepageDirectives'));
	echo $this->Minify->css(array('home'));