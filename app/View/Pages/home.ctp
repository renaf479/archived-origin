<div id="homepage-container" data-ng-controller="homepageController">
	<div id="homepage-left" class="originUI-tileLeft originUI-bgColorSecondary originUI-shadow">
		<h2 class="originUI-tileHeader originUI-borderColorSecondary">Products</h2>
		<ul id="product-list" class="originUI-list">
			<li class="originUI-listItem" data-ng-repeat="product in products|filter:searchOrigin" data-ng-click="loadProduct(product)" data-ng-class="{active: product.OriginTemplate.id === selected}">
				<a href="javascript:void(0)" class="originUI-hover">{{product.OriginTemplate.name}}</a>
			</li>
		</ul>
	</div><!--
	--><div id="homepage-right" class="originUI-tileRight originUI-bgColor originUI-shadow">
		<div id="about" data-ng-show="!product.OriginTemplate">
			<div id="about-header">
				<img src="/img/_sites/origin/header.png"/>
			</div>
			<p>Origin is a rich media ad creation and publishing suite. Custom built internally, it serves as our central hub that showcases our product line, intuitive ad creator and seamless demo creation tool.</p>
			<p>Origin has served over 150 million ad impressions per year, generating millions in saved expenses and collected serving fees. It is highly scalable platform, compatible with the multitude of site layouts in our network.</p>
		</div>
		<div data-ng-show="product.OriginTemplate">
			<div id="product-summary" class="originUI-borderColorSecondary">
				<h2 id="productSummary-title" class="originUI-textColor">{{product.OriginTemplate.name}}</h2>
				<a href="/demo/Origin/{{product.OriginAds.demoLink}}" id="productSummary-demo" target="_blank">Demo</a>
				<div id="productSummary-left" class="">
					<div id="productSummary-description" class="">{{product.OriginTemplate.content.description}}</div>
				</div>
				<div id="productSummary-right" class="">
					<div class="productSummary-dimensions inline" data-ng-repeat="platform in platforms" data-ng-class="{inactive: !product.OriginTemplate.config.dimensions.Initial[platform.name].width}">
						<h3 class="productSummary-platform" data-ng-class="platform.name">{{platform.name}}</h3>
						<p class="productSummary-na">N/A</p>
						<ul class="originUI-list">
							<li class="" data-ng-show="product.OriginTemplate.config.dimensions.Initial[platform.name].width">Initial: {{product.OriginTemplate.config.dimensions.Initial[platform.name].width}} x {{product.OriginTemplate.config[platform.name].Initial.height}}
							</li>
							<li class="" data-ng-show="product.OriginTemplate.config[platform.name].Triggered.width > 0">
								Triggered: {{product.OriginTemplate.config[platform.name].Triggered.width}} x {{product.OriginTemplate.config[platform.name].Triggered.height}}</li>
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
				<div data-ng-show="product.OriginTemplate.config.dimensions.Triggered.Desktop.width > 0">
					<h2 id="productPreview-title" class="originUI-textColor">{{preview}} State</h2>
					<a href="javascript:void(0)" id="productPreview-toggle" data-ng-click="previewToggle()" data-ng-class="{triggered: preview === 'Triggered'}">Toggle</a>
				</div>
				<div id="productPreview-image">
					<div id="productPreview-initial" class="" back-img="{{product.OriginTemplate.content.file_guideline}}" data-ng-show="preview === 'Initial'" data-ng-hide="preview !== 'Initial'"></div>
					<div id="productPreview-triggered" class="" back-img="{{product.OriginTemplate.content.file_guideline}}" data-ng-show="preview === 'Triggered'" data-ng-hide="preview !== 'Triggered'"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
	echo $this->Minify->script(array('homepage/homepageController', 'homepage/homepageDirectives', 'homepage/homepageServices'));
	echo $this->Minify->css(array('platform/homepage'));