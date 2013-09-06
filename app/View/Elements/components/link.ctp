<div id="editor-link" data-ng-controller="componentCtrl">
	<ul class="originUI-list">
		<li>
			<label id="editor-label" class="inline">URL</label>
			<input type="text" id="editor-input" class="inline" data-ng-model="editor.content.link" placeholder="http://" required input-text/>
		</li>
	</ul>
	<style type="text/css">
		#editor-label {
			width: 30px;	
		}
		
		#editor-input {
			width: 300px;
		}
	</style>
	<script type="text/javascript">
		var componentCtrl = function($scope, $rootScope) {
		
			$scope.$watch('editor.content.link', function(newVal, oldVal) {
				if(newVal) {
					$scope.editor.content.link 		= (!/^https?:\/\//.test($scope.editor.content.link))? 'http://' + $scope.editor.content.link: $scope.editor.content.link;
					$rootScope.editor.render 	= '<a href="'+$scope.editor.content.link+'" target="_blank" class="link">'+$scope.editor.content.link+'</a>';
				}
				
			});
/*
			var _scope 	= $scope.$parent;
			
			$rootScope.creatorModalSave = function() {				
				$scope.editor.content.link 		= (!/^https?:\/\//.test($scope.editor.content.link))? 'http://' + $scope.editor.content.link: $scope.editor.content.link;
				$scope.editor.render 	= '<a href="'+$scope.editor.content.link+'" target="_blank" class="link">'+$scope.editor.content.link+'</a>';
			
				_scope.creatorModalSaveContent($scope.editor);
			};
*/
		}
	</script>
</div>