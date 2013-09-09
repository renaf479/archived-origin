	<div id="embed-widget" data-ng-controller="embedController">
		<textarea data-ng-model="embedOptions.embed" data-ui-codemirror="{mode:'htmlmixed',lineNumbers:true,lineWrapping:true,theme:'night',readOnly:true,onLoad:embedInit}" data-ui-refresh='avgrund.codeMirror'><?php //echo $this->element('origin_embed');?></textarea>
		<div id="embedModal-config">
			<div class="originUI-modalLeft">
				<ul class="originUI-list">
					<li>
						<label class="inline">Auto Open</label>
						<input-switch class="originUI-switch inline" name="toggleAutoSwitch" active="Yes" inactive="No" data-ng-model="embedOptions.auto" data-ng-checked="embedOptions.auto === true"></input-switch>
					</li>
					<li>
						<label class="inline">Auto Close</label>
						<input-switch class="originUI-switch inline" name="toggleCloseSwitch" active="Yes" inactive="No" data-ng-model="embedOptions.close" data-ng-checked="embedOptions.close === true"></input-switch>
					</li>
				</ul>
			</div>
			<div class="originUI-modalRight">
				<ul class="originUI-list">
					<li>
						<label class="inline">Tablet Unit</label>
						<input-switch class="originUI-switch inline" name="toggleTabletSwitch" active="Yes" inactive="No" data-ng-model="embedOptions.tablet" data-ng-checked="embedOptions.tablet === true"></input-switch>
					</li>
					<li>
						<label class="inline">Mobile Unit</label>
						<input-switch class="originUI-switch inline" name="toggleMobileSwitch" active="Yes" inactive="No" data-ng-model="embedOptions.mobile" data-ng-checked="embedOptions.mobile === true"></input-switch>
					</li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<style type="text/css">
		#embed-widget {
			width: inherit;
			height: inherit;
		}
	</style>
	<script type="text/javascript">
		var embedController = function($scope, $compile, $interpolate, Rest) {
			
			$scope.embedInit = function() {
				$scope.embedOptions = {
					id: $scope.originAd.id,
					placement: $scope.originAd.config.placement,
					auto: false,
					close: false,
					tablet: false,
					mobile: false
				};
			
				//console.log($scope.embedOptions.embed);
				//console.log($interpolate($scope.embedOptions.embed)($scope));
			
				Rest.get('element/origin_embed').then(function(response) {
					//$rootScope.render	= $interpolate(response)($rootScope);
					$scope.embedOptions.embed = $interpolate(response)($scope);
				});
				
				
			}
			
			$scope.$watch('embedOptions.auto', function(newVal) {
				if(newVal) {
					$scope.embedOptions.placement = 'test';
					$interpolate($scope.embedOptions.embed)($scope);
				}
			})
			
			
/*
			$scope.$watchCollection('[embedOptions.auto, embedOptions.close, embedOptions.tablet, embedOptions.mobile]', function(newVal) {

				if(newVal) {
					//console.log($scope.embedOptions);
					$interpolate($scope.embedOptions.embed)($scope);
					
					//var test = $compile($scope.embedOptions.embed)($scope);
					console.log($scope.embedOptions.embed);
					
					
				}
			})
*/
			
			//$scope.embedOptions.embed = 'test';
			//console.log($scope.embedOptions);
		}
	</script>