'use strict';


/*
<div id="homepage-detail" class="originUI-bgColor" >
			<a href="javascript:void(0)" id="homepageDetail-close" class="originUI-hover" ng:click="productExpand('close', '')">close</a>
			<div id="homepageDetail-left" class="inline">
				<h3 id="homepageDetail-title">{{product.OriginTemplate.name}} Ad Unit</h3>
				<p id="homepageDetail-description">{{product.OriginTemplate.content.description}}</p>
			</div>
			<div id="homepageDetail-right" class="inline">
				
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
			</div>
		</div>
*/