	<div id="embed-widget" data-ng-controller="embedController" data-ng-init="embedInit()">
		<div id="embedWidget-config" class="inline">
			<ul class="originUI-list">
				<li>
					<label class="">Auto Open</label>
					<input-switch class="originUI-switch" name="toggleAutoSwitch" active="Yes" inactive="No" data-ng-model="embedOptions.auto" data-ng-checked="embedOptions.auto === true"></input-switch>
				</li>
				<li data-ng-class="{disabled: !embedOptions.auto}">
					<label class="">Auto Close</label>
					<input-switch class="originUI-switch" name="toggleCloseSwitch" active="Yes" inactive="No" data-ng-model="embedOptions.close" data-ng-checked="embedOptions.close === true" data-ng-disabled="!embedOptions.auto"></input-switch>
				</li>
				<li>
					<label class="">Tablet Unit</label>
					<input-switch class="originUI-switch" name="toggleTabletSwitch" active="Yes" inactive="No" data-ng-model="embedOptions.tablet" data-ng-checked="embedOptions.tablet === true"></input-switch>
				</li>
				<li>
					<label class="">Mobile Unit</label>
					<input-switch class="originUI-switch" name="toggleMobileSwitch" active="Yes" inactive="No" data-ng-model="embedOptions.mobile" data-ng-checked="embedOptions.mobile === true"></input-switch>
				</li>
			</ul>
		</div>
		<div id="embedWidget-codemirror" class="inline">
			<textarea data-ng-model="embed" data-ui-codemirror="{mode:'htmlmixed',lineWrapping:true,theme:'night',readOnly:true}" data-ui-refresh=true><?php //echo $this->element('origin_embed');?></textarea>
		</div>
	</div>
	<style type="text/css">
		#embed-widget {
			width: inherit;
			height: inherit;
		}
		
		#embedWidget-config {
			width: 150px;
		}
		
		#embedWidget-codemirror {
			width: 300px;
			height: 200px;
			font-size: 11px;
		}
	</style>
	<script type="text/javascript">
		var embedController = function($scope, $compile, $interpolate, Rest) {
			var embed;
			
			function _refresh() {
				$scope.embed = $interpolate(embed)($scope);
			}
			
			$scope.embedInit = function() {
				$scope.embedOptions = {
					id: $scope.originAd.id,
					placement: $scope.originAd.config.placement,
					auto: false,
					close: false,
					tablet: false,
					mobile: false
				};
			
				Rest.get('element/origin_embed').then(function(response) {
					embed = response;
					_refresh();
				});
			}
			
			$scope.$watchCollection('[embedOptions.auto, embedOptions.close, embedOptions.tablet, embedOptions.mobile]', function(newVal) {
				if(newVal && embed) {
					//Special condition for auto/close
					if(!$scope.embedOptions.auto) {
						$scope.embedOptions.close = false;
					}
					_refresh();
				}
			});
			
		}
	</script>