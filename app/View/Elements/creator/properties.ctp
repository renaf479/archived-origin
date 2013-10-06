<div data-ng-controller="propertiesController" data-ng-init="propertiesInit()">
	<div id="properties-left" class="inline">
		<ul class="originUI-list">
			<li>
				<label class="properties-label inline">Name</label>
				<input type="text" class="properties-input inline" data-ng-model="originAdProperties.name" required input-text/>
			</li>
			<li>
				<label class="properties-label inline">Status</label>
				<input-switch class="properties-input inline originUI-switch" name="statusSwitch" active="Active" inactive="Inactive" data-ng-model="originAdProperties.status" data-ng-checked="originAdProperties.status === '1'"></input-switch>
			</li>
			<li data-ng-if="originAdmin">
				<label class="properties-label inline">Showcase</label>
				<input-switch class="properties-input inline originUI-switch" name="showcaseSwitch" active="Yes" inactive="No" data-ng-model="originAdProperties.showcase" data-ng-checked="originAdProperties.showcase === '1'"></input-switch>
			</li>
			<li>
				<label class="properties-label inline">Load Preset</label>
				<select id="properties-template" class="properties-input inline originUI-select originUI-bgColorSecondary" data-ng-model="originAdProperties.template_id" data-ng-options="template.OriginTemplate.id as template.OriginTemplate.name for template in originAdTemplates|filter:{OriginTemplate.status:'1'}" data-ng-change="propertiesTemplate(originAdProperties.template_id)">
					<option style="display:none" value="">Load Template Pre-set</option>
				</select>
			</li>
			<li data-ng-if="originAdmin">
				<label class="properties-label inline">Ad Type</label>
				<select class="properties-input inline originUI-select originUI-bgColorSecondary" data-ng-model="originAdProperties.config.type" data-ng-change="templateSelect(originAdProperties.config.type)">
					<option style="display:none" value="">Select Type</option>
					<option value="default">Standard</option>
					<option value="expand">Expanding</option>
					<option value="overlay">Overlay</option>
					<option value="prestitial">Prestitial</option>
					<option value="interstitial">Interstitial</option>
				</select>
			</li>
			<li data-ng-if="originAdmin">
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
				<input type="text" class="properties-input inline" data-ng-model="originAdProperties.content.ga_id" input-text/>
			</li>
			<li>
				<label class="properties-label inline">BG Color</label>
				<input type="text" class="properties-input inline" data-ng-model="originAdProperties.content.hex" maxlength="7" input-text hex/>
			</li>
		</ul>
	</div>
	<div id="properties-right" class="inline" data-ng-class="{'propertiesExpand': originAdmin}">
		<div id="properties-platform" data-ng-if="originAdmin">
			<img class="platform-icon originUI-iconHover" data-ng-repeat="platform in fields.platforms" data-ng-click="propertiesPlatform(platform)" data-ng-src="/img/{{platform.name}}-26x26.png" data-ng-class="{'active': propertiesUI === platform.name}"/>
		</div>
		<div id="properties-summary" data-ng-if="!originAdmin">
			<img id="propertiesSummary-storyboard" data-ng-src="{{originAdProperties.summary.file_storyboard}}" data-ng-if="originAdProperties.summary.file_storyboard"/>
			<div id="propertiesSummary-description">
				{{originAdProperties.summary.description}}
			</div>
		</div>
		<div class="properties-platform" data-ng-repeat="platform in fields.platforms" data-ng-show="propertiesUI === platform.name">
			<div class="properties-dimensions inline" data-ng-if="originAdmin">
				<h4>Dimensions</h4>
				<ul class="originUI-list">
					<li class="originUI-listItem" data-ng-repeat="dimension in fields.dimensions">
						<label class="properties-label inline">{{dimension.label}}</label>
						<input type="text" class="properties-input inline" data-ng-model="originAdProperties.config[platform.name][dimension.name][dimension.inputs]" input-text/>
					</li>
				</ul>
			</div>
			<div class="properties-animations inline" data-ng-if="originAdmin">
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
	var propertiesController = function($scope, $rootScope, Rest) {
		var fields;
		$scope.propertiesInit = function() {		
			//Load template listing
			Rest.get('templates').then(function(response) {
				$scope.originAdTemplates = response;
			});
			
			fields	= {
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
			$scope.fields 							= angular.copy(fields);
			
			$scope.propertiesPlatform({name: 'Desktop'});
			
			//Check to see if we're creating a new entry
			if(!$rootScope.originAdProperties) {
				$rootScope.originAdProperties 		 	= {};
				$rootScope.originAdProperties.config 	= angular.copy(editor.config);
				$rootScope.originAdProperties = {
					content: {
						ga_id: 	'UA-12310597-73',
						hex:	'#000000'
					},
					status: '1',
				}
			} else {
				//$rootScope.originAdProperties.config 	= angular.copy(editor.config);
			}
			
			//console.log($scope.originAdProperties.config);
		}
		
		/**
		* Selecting type
		*/
		$scope.templateSelect = function(model) {
			//Load up default editor
			$scope.fields = angular.copy(fields);
			
			switch(model) {
				case 'default':
					$scope.fields.dimensions	= [
						{
						label:	'Unit Width (px)',
						name:	'Initial', 
						inputs:	'width'
						},
						{
						label:	'Unit Height (px)',
						name:	'Initial', 
						inputs:	'height'
						}
					];
					$scope.fields.animations 	= [];
					break;
				case 'interstitial':
				case 'prestitial':
					$scope.fields.dimensions	= [
						{
						label:	'Unit Width (px)',
						name:	'Initial', 
						inputs:	'width'
						},
						{
						label:	'Unit Height (px)',
						name:	'Initial', 
						inputs:	'height'
						}
					];
					$scope.fields.animations 	= [
						{
						label:	'Close Timer (sec)',
						name:	'timer'
						}
					];
					break;
			}
		}
		
		//Switch properties view
		$scope.propertiesPlatform = function(model) {
			$scope.propertiesUI	= model.name;
		}
		
		//Load template data
		$scope.propertiesTemplate = function(model) {
			//Find associated key value pair
			angular.forEach($scope.originAdTemplates, function(value, key) {
				if(value.OriginTemplate.id === model) {
					//Load it into properties
					$scope.templateSelect(value.OriginTemplate.config.type);
					$rootScope.originAdProperties.summary	= value.OriginTemplate.content;
					$rootScope.originAdProperties.config 	= value.OriginTemplate.config;
				}
			});
		}
	}
</script>