<div data-ng-controller="propertiesController" data-ng-init="propertiesInit()">
	<div id="properties-left" class="inline">
		<ul class="originUI-list">
			<li>
				<label class="properties-label inline">Name</label>
				<input type="text" class="properties-input inline" data-ng-model="originAdProperties.name" required input-text/>
			</li>
			<li>
				<label class="properties-label inline">Status</label>
				<input-switch class="properties-input inline originUI-switch" name="statusSwitch" active="Yes" inactive="No" data-ng-model="originAdProperties.status" data-ng-checked="originAdProperties.status === '1'"></input-switch>
			</li>
			<li>
				<label class="properties-label inline">Showcase</label>
				<input-switch class="properties-input inline originUI-switch" name="showcaseSwitch" active="Yes" inactive="No" data-ng-model="originAdProperties.showcase" data-ng-checked="originAdProperties.showcase === '1'"></input-switch>
			</li>
			<li>
				<label class="properties-label inline">Ad Type</label>
				<select class="properties-input inline originUI-select originUI-bgColorSecondary" data-ng-model="originAdProperties.config.type" data-ng-change="templateSelect('editor', editor.config.type)">
					<option style="display:none" value="">Select Type</option>
					<option value="default">Standard</option>
					<option value="expand">Expanding</option>
					<option value="overlay">Overlay</option>
					<option value="prestitial">Prestitial</option>
					<option value="interstitial">Interstitial</option>
				</select>
			</li>
			<li>
				<label class="properties-label inline">Placement</label>
				<select class="properties-input inline originUI-select originUI-bgColorSecondary" data-ng-model="originAdProperties.config.placement">
					<option style="display:none" value="">Select Placement</option>
					<option value="default">Standard (inline)</option>
					<option value="top">Top of the Page</option>
					<option value="bottom">Bottom of the Page</option>
				</select>
			</li>
			<li>
				<label class="properties-label inline">GA ID</label>
				<input type="text" class="properties-input inline" data-ng-model="originAdProperties.content.ga_id" required input-text/>
			</li>
		</ul>
	</div>
	<div id="properties-right" class="inline">
		<div id="properties-platform">
			<img class="platform-icon" data-ng-repeat="platform in fields.platforms" data-ng-click="propertiesPlatform(platform)" data-ng-src="/img/{{platform.name}}-26x26.png" data-ng-class="{'active': propertiesUI === platform.name}"/>
		</div>
		<div class="properties-platform" data-ng-repeat="platform in fields.platforms" data-ng-show="propertiesUI === platform.name">
			<div class="properties-dimensions inline">
				<h4>Dimensions</h4>
				<ul class="originUI-list">
					<li class="originUI-listItem" data-ng-repeat="dimension in fields.dimensions">
						<label class="properties-label inline">{{dimension.label}}</label>
						<input type="text" class="properties-input inline" data-ng-model="originAdProperties.config[platform.name][dimension.name][dimension.inputs]" input-text/>
					</li>
				</ul>
			</div>
			<div class="properties-animations inline">
				<div data-ng-show="fields.animations.length">
					<h4>Animations</h4>
					<ul class="originUI-list">
						<li class="originUI-listItem" data-ng-repeat="animation in fields.animations">
							<label class="properties-label inline">{{animation.label}}</label>
							<input type="text" class="properties-input inline" data-ng-if="animation.name !== 'selector'" data-ng-model="originAdProperties.config[platform.name].Animations[animation.name]" input-text/>
							
							
<!--
							<div class="properties-input originUI-field inline" data-ng-if="animation.name !== 'selector'">
								<div class="originUI-fieldBracket"></div>
								<input type="text" class="originUI-input originUI-bgColorSecondary" data-ng-model="originAdProperties.config[platform.name].Animations[animation.name]"/>
							</div>
-->
							<select class="properties-input originUI-select originUI-bgColorSecondary inline" data-ng-model="originAdProperties.config[platform.name].Animations.selector" data-ng-if="animation.name === 'selector'">
								<option style="display:none" value="">Select</option>
								<option value="initial">Initial</option>
								<option value="triggered">Triggered</option>
							</select>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	var propertiesController = function($scope, $rootScope) {
		$scope.propertiesInit = function() {			
			//console.log($scope);
			var fields	= {
					animations: [
						{
						label:	'Selector',
						name:	'selector'
						},
						{
						label:	'Start Position (px)',
						name:	'start'
						},
						{
						label:	'End Position (px)',
						name:	'end'
						},
						{
						label:	'Opening Duration (ms)',
						name:	'openDuration'
						},
						{
						label:	'Closing Duration (ms)',
						name:	'closeDuration'
						}
					],
					dimensions: [
						{
						label:	'Initial Width (px)',
						name:	'Initial', 
						inputs:	'width'
						},
						{
						label:	'Initial Height (px)',
						name:	'Initial', 
						inputs:	'height'
						},
						{
						label:	'Triggered Width (px)',
						name: 'Triggered', 
						inputs: 'width'
						},
						{
						label:	'Triggered Height (px)',
						name: 'Triggered', 
						inputs: 'height'
						}
					],
					platforms: [
						{name: 'Desktop'},
						{name: 'Tablet'},
						{name: 'Mobile'}
					]
				};
				editor 	= {
					config: {
						Desktop: {
							Initial: {},
							Triggered: {},
							Animations: {},
							status: true
						},
						Tablet: {
							Initial: {},
							Triggered: {},
							Animations: {},
							status: false
						},
						Mobile: {
							Initial: {},
							Triggered: {},
							Animations: {},
							status: false
						}
					}
				}
				
				$scope.fields = angular.copy(fields);
				$scope.propertiesPlatform({name: 'Desktop'});
		}
		
		//Switch properties view
		$scope.propertiesPlatform = function(model) {
			$scope.propertiesUI	= model.name;
		}
	}
</script>