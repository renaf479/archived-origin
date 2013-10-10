<div id="editor-toggle" data-ng-controller="componentCtrl" data-ng-init="init()">
	<ul class="originUI-list">
		<li>
			<label class="editor-label inline">Toggle on</label>
			<input-switch class="editor-switch originUI-switchDual inline" name="editorToggleTypeSwitch" active="Click" inactive="Hover" data-ng-model="editor.content.event" data-ng-checked="editor.content.event === true"></input-switch>
		</li>
		<li data-ng-show="!editor.content.event">
			<label class="editor-label inline">Hover Intent</label>
			<input-switch class="editor-switch originUI-switch inline" name="editorToggleHoverIntentSwitch" active="Yes" inactive="No" data-ng-model="editor.content.hoverIntent" data-ng-checked="editor.content.hoverIntent === true"></input-switch>
		</li>
	</ul>
	<style type="text/css">
		.editor-label {
			width: 100px;	
		}
		
		.editor-switch {
			width: 150px;
		}
	</style>
	<script type="text/javascript">
		var componentCtrl = function($scope, $rootScope) {
		
			$scope.init = function() {
				if(typeof $rootScope.editor.content.event === 'undefined') $rootScope.editor.content.event = true;
			}
			
			$scope.$watchCollection('[editor.content.event, editor.content.hoverIntent]', function(newVal, oldVal) {
				toggleEvent 				= ($scope.editor.content.event)? 'click': 'hover';
				toggleEvent					= ($scope.editor.content.hoverIntent && !$scope.editor.content.event)? 'hoverIntent': toggleEvent;
				$rootScope.editor.render 	= '<a href="javascript:void(0)" class="cta toggle" toggle="'+toggleEvent+'"></a>';
			});
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