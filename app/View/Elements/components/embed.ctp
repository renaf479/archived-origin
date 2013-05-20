<div id="editor-embed" ng:controller="componentCtrl">
	<textarea ng:model="editor.content.embed" ui:codemirror></textarea>
	
	<div id="editorEmbed-options">
		<div class="inline">Iframe content</div>
		<div id="editorEmbed-iframe" class="inline">
			<div class="originUI-switch">
			    <input type="checkbox" name="editorEmbedSwitch" class="originUI-switchInput" id="editorEmbedSwitch" ng:model="editor.content.iframe">
			    <label class="originUI-switchLabel" for="editorEmbedSwitch">
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
	</div>
	
	<script type="text/javascript">
		var componentCtrl = function($scope, $rootScope) {
			var _scope 	= $scope.$parent;
			
			$rootScope.creatorModalSave = function() {				
				$scope.editor.render	= ($scope.editor.content.iframe)? '<iframe class="embed" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/ad/iframe/%model%/%id%" frameborder="0" scrolling="no" collapseIframe></iframe>': '<div class="embed" collapse>'+$scope.editor.content.embed+'</div>';
				
				_scope.creatorModalSaveContent($scope.editor);
			}
		}
	
/*
		var componentCtrl = function($scope) {
			var _scope = angular.element($j('#ad-edit')).scope();
			
				_scope.$watch('editor.content', function() {
					//_scope.editor.render = '<div class="embed" collapse>'+$scope.editor.content.embed+'</div>';
					if($scope.editor.content.iframe !== true) {
						_scope.editor.render = '<div class="embed" collapse>'+$scope.editor.content.embed+'</div>';
					} else {
						_scope.editor.render = '<iframe class="embed" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/ad/iframe/%model%/%id%" frameborder="0" scrolling="no" collapseIframe></iframe>';
					}
				}, true);
		}
*/
	</script>
</div>