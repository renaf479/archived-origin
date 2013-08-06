<div id="homepage-container" data:ng:controller="homepageController">
	<div id="homepage-left" class="originUI-tileLeft originUI-bgColorSecondary originUI-shadow">
		<h2 class="originUI-tileHeader originUI-borderColorSecondary">Products</h2>
		<ul id="product-list" class="originUI-list">
			<li class="originUI-listItem" data:ng:repeat="product in products|filter:searchOrigin" data:ng:click="loadProduct(product)" data:ng:class="{active: product.OriginTemplate.id === selected}">
				<a href="javascript:void(0)" class="originUI-hover">{{product.OriginTemplate.name}}</a>
			</li>
		</ul>
	</div><!--
	--><div id="homepage-right" class="originUI-tileRight originUI-bgColor originUI-shadow">
		<div id="product-summary" class="originUI-borderColorSecondary">
			<h2 id="productSummary-title" class="originUI-textColor">{{product.OriginTemplate.name}}</h2>
			<a href="/demo/Origin/{{product.OriginAds.demoLink}}" id="productSummary-demo" target="_blank">Demo</a>
			<div id="productSummary-left" class="">
				<div id="productSummary-description" class="">{{product.OriginTemplate.content.description}}</div>
			</div>
			<div id="productSummary-right" class="">
				<div class="productSummary-dimensions inline" data:ng:repeat="platform in platforms" data:ng:class="{inactive: !product.OriginTemplate.config.dimensions.Initial[platform.name].width}">
					<h3 class="productSummary-platform" data:ng:class="platform.name">{{platform.name}}</h3>
					<p class="productSummary-na">N/A</p>
					<ul class="originUI-list">
						<li class="" data:ng:show="product.OriginTemplate.config.dimensions.Initial[platform.name].width">Initial: {{product.OriginTemplate.config.dimensions.Initial[platform.name].width}} x {{product.OriginTemplate.config.dimensions.Initial[platform.name].height}}
						</li>
						<li class="" data:ng:show="product.OriginTemplate.config.dimensions.Triggered[platform.name].width > 0">
							Triggered: {{product.OriginTemplate.config.dimensions.Triggered[platform.name].width}} x {{product.OriginTemplate.config.dimensions.Triggered[platform.name].height}}</li>
					</ul>
				</div>
<!--
				<h3>Desktop</h3>
				<ul class="originUI-list">
					<li>Initial: {{product.OriginTemplate.config.dimensions.Initial.Desktop.width}} x {{product.OriginTemplate.config.dimensions.Initial.Desktop.height}}</li>
					<li>Triggered: {{product.OriginTemplate.config.dimensions.Triggered.Desktop.width}} x {{product.OriginTemplate.config.dimensions.Triggered.Desktop.height}}</li>
				</ul>
-->
			</div>
		</div>
		<div id="product-preview">
			<div data:ng:show="product.OriginTemplate.config.dimensions.Triggered.Desktop.width > 0">
				<h2 id="productPreview-title" class="originUI-textColor">{{preview}} State</h2>
				<a href="javascript:void(0)" id="productPreview-toggle" data:ng:click="previewToggle()" data:ng:class="{triggered: preview === 'Triggered'}">Toggle</a>
			</div>
			<div id="productPreview-image">
				<div id="productPreview-initial" class="" back-img="{{product.OriginTemplate.content.file_guideline}}" data:ng:show="preview === 'Initial'" data:ng:hide="preview !== 'Initial'"></div>
				<div id="productPreview-triggered" class="" back-img="{{product.OriginTemplate.content.file_guideline}}" data:ng:show="preview === 'Triggered'" data:ng:hide="preview !== 'Triggered'"></div>
			</div>
		</div>
	</div>
<!--
	<div class="homepage-product inline" ng:repeat="product in products|filter:searchOrigin" ng:animate="'originUI-fade'" index="{{$index}}" ng:class="{expand: (productShow === product.OriginTemplate.id)}">
		<div product class="homepageProduct originUI-shadow originUI-borderColor">
			<img class="homepageProduct-image" ng:src="{{product.OriginAds.content.img_thumbnail}}"/>
			<span class="homepageProduct-title originUI-bgColor">{{product.OriginTemplate.name}}</span>
		</div>
		<div product-detail class="product-detail originUI-bgColor originUI-borderColor originUI-bgTexture" ng:show="productShow === product.OriginTemplate.id">
			<a href="javascript:void(0)" class="productDetail-close originUI-hover" ng:click="productExpand('close', '')">close</a>
			<h2 class="productDetail-title originUI-header">{{product.OriginTemplate.name}} Ad Unit</h2>
			<div class="productDetail-left inline">
				<img id="formCreate-storyboard" class="originUI-borderColor" ng:src="{{product.OriginTemplate.content.file_storyboard}}" ng:show="product.OriginTemplate.content.file_storyboard"/>
				<p id="formCreate-description">{{product.OriginTemplate.content.description}}</p>
			</div>
			<div class="productDetail-right inline nano" nanoscroller>
				<div class="nano-content">
					<div class="productDetail-image" product-image="{{product[platformShow+'Initial'].content}}">
						<img class="productDetail-imageSource"/>
						<span class="productDetail-imageDimensions">Initial - {{product.OriginTemplate.config.dimensions.Initial[platformShow].width}}px by {{product.OriginTemplate.config.dimensions.Initial[platformShow].height}}px</span>
					</div>
					<div class="productDetail-image" product-image="{{product[platformShow+'Triggered'].content}}">
						<img class="productDetail-imageSource"/>
						<span class="productDetail-imageDimensions">Triggered - {{product.OriginTemplate.config.dimensions.Triggered[platformShow].width}}px by {{product.OriginTemplate.config.dimensions.Triggered[platformShow].height}}px</span>
					</div>
				</div>
			</div>
		</div>
	</div>
-->
</div>
<?php
	echo $this->Minify->script(array('homepage/homepageController', 'homepage/homepageDirectives', 'homepage/homepageServices'));
	echo $this->Minify->css(array('platform/homepage'));