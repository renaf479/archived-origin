<div id="editor-toggle" ng:controller="componentCtrl">
	<div class="originUI-modalLeft">
		<ul class="originUI-list">
			<li>
				<label class="inline">Toggle on</label>
				<input-switch class="originUI-switchDual" name="editorToggleTypeSwitch" active="Click" inactive="Hover" data-ng-model="editor.content.event"></input-switch>
				
<!--
				<div id="editorToggle-type" class="inline">
					<div class="originUI-switch">
					    <input type="checkbox" name="editorToggleTypeSwitch" class="originUI-switchInput" id="editorToggleTypeSwitch" ng:model="editor.content.event" ng:checked="editor.content.event">
					    <label class="originUI-switchLabel" for="editorToggleTypeSwitch">
					    	<div class="originUI-switchInner">
					    		<div class="originUI-switchActive">
					    			<div class="originUI-switchText">Click</div>
							    </div>
							    <div class="originUI-switchInactive">
							    	<div class="originUI-switchText">Hover</div>
								</div>
						    </div>
					    </label>
				    </div>
				</div>
-->
			</li>
			<li>
				<label class="inline">Hover Intent</label>
				<input-switch class="originUI-switch" name="editorToggleHoverIntentSwitch" active="Yes" inactive="No" data-ng-model="editor.content.hoverIntent"></input-switch>
<!--
				<div id="editorToggle-hoverIntent" class="inline">
					<div class="originUI-switch">
					    <input type="checkbox" name="editorToggleHoverIntentSwitch" class="originUI-switchInput" id="editorToggleHoverIntentSwitch" ng:model="editor.content.hoverIntent" ng:checked="editor.content.hoverIntent">
					    <label class="originUI-switchLabel" for="editorToggleHoverIntentSwitch">
					    	<div class="originUI-switchInner">
					    		<div class="originUI-switchActive">
					    			<div class="originUI-switchText">Yes</div>
							    </div>
							    <div class="originUI-switchInactive">
							    	<div class="originUI-switchText">No</div>
								</div>
						    </div>
					    </label>
				    </div>
				</div>
-->
			</li>
		</ul>
	</div>
<!--
	<div class="originUI-modalRight" ng:show="test == 'false'">
		<div id="background-upload" class="originUI-upload">
			<span class="originUI-uploadLabel">Upload Background</span>
			<input type="file" name="files[]" id="editorBackground-upload" class="originUI-uploadInput" ng:model="editor.content.bgUpload" fileupload>
		</div>
		<strong>Select Image</strong>
		<ul id="" class="originUI-bgColor">
			<li class="originUIList-item" data-asset="{{$index}}" ng:repeat="asset in library" ng:click="backgroundSelect(asset)">
				<a href="javascript:void(0);" class="originUI-hover">{{asset.name}}</a>
			</li>
		</ul>
	</div>
-->
	<div class="clear"></div>
	
	<script type="text/javascript">
		var componentCtrl = function($scope, $rootScope) {
/*
			var _scope 	= $scope.$parent,
				toggleEvent,
				hoverIntent;
			
			if($scope.editor.content.event === undefined) {
				$scope.editor.content.event = true;
			}
			
			if($scope.editor.content.hoverIntent === undefined) {
				$scope.editor.content.hoverIntent = false;
			}
			
			//When hover intent is enabled, always switch trigger to hover
			$scope.$watch('editor.content.hoverIntent', function(newValue, oldValue) {
				if(newValue) {
					$scope.editor.content.event = false;
				}
			});
			
			//When switch trigger is click, always set hover intent to false
			$scope.$watch('editor.content.event', function(newValue, oldValue) {
				if(newValue) {
					$scope.editor.content.hoverIntent = false;
				}
			});
			
			$rootScope.creatorModalSave = function() {
				toggleEvent 			= ($scope.editor.content.event)? 'click': 'hover';
				toggleEvent				= ($scope.editor.content.hoverIntent)? 'hoverIntent': toggleEvent;
				$scope.editor.render 	= '<a href="javascript:void(0)" class="cta toggle" toggle="'+toggleEvent+'"></a>';
				_scope.creatorModalSaveContent($scope.editor);
			};
*/
		}
	

	</script>
</div>