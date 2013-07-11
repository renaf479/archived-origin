<div id="homepage-container" ng:controller="homepageController">
	<div class="homepage-product inline" ng:repeat="product in products|filter:searchOrigin" ng:animate="'originUI-fade'" index="{{$index}}" ng:class="{expand: (productShow === product.OriginTemplate.id)}">
		<div product class="homepageProduct originUI-shadow originUI-borderColor">
			<img class="homepageProduct-image" ng:src="{{product.OriginAds.content.img_thumbnail}}"/>
			<span class="homepageProduct-title originUI-bgColor">{{product.OriginTemplate.name}}</span>
		</div>
		<div product-detail class="product-detail originUI-bgColor originUI-borderColor" ng:show="productShow === product.OriginTemplate.id">
			<a href="javascript:void(0)" class="productDetail-close originUI-hover" ng:click="productExpand('close', '')">close</a>
			<h2 class="productDetail-title originUI-header">{{product.OriginTemplate.name}} Ad Unit</h2>
			<div class="productDetail-left inline">
				{{product.OriginTemplate.content.description}}
				<img ng:src="{{product.OriginTemplate.content.file_storyboard}}" ng:show="product.OriginTemplate.content.file_storyboard"/>
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
</div>
<?php
	echo $this->Minify->script(array('homepage/homepageController', 'homepage/homepageDirectives', 'homepage/homepageServices'));
	echo $this->Minify->css(array('home'));