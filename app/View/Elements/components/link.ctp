<div id="editor-link" ng:controller="componentCtrl">
	<ul class="originUI-list">
		<li>
			<label id="editorLink-label" class="inline">URL</label>
			<input type="text" data-ng-model="editor.content.link" placeholder="http://" required input-text/>
		</li>
	</ul>
	
	<script type="text/javascript">
		var componentCtrl = function($scope, $rootScope) {
			var _scope 	= $scope.$parent;
			
			$rootScope.creatorModalSave = function() {				
				$scope.editor.content.link 		= (!/^https?:\/\//.test($scope.editor.content.link))? 'http://' + $scope.editor.content.link: $scope.editor.content.link;
				$scope.editor.render 	= '<a href="'+$scope.editor.content.link+'" target="_blank" class="link">'+$scope.editor.content.link+'</a>';
			
				_scope.creatorModalSaveContent($scope.editor);
			};
		}
	</script>
</div>