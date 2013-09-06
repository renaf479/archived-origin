<div id="editor-dfp-link" data-ng-controller="componentCtrl">
	<select id="" class="originUI-select originUI-bgColorSecondary" data-ng-model="editor.content.placeholder" data-ng-change="update()" required>
		<option style="display:none" value="">Select DFP link placeholder</option>
		<option value="dfp-1">DFP Placeholder 1</option>
		<option value="dfp-2">DFP Placeholder 2</option>
		<option value="dfp-3">DFP Placeholder 3</option>
	</select>

	<script type="text/javascript">
		var componentCtrl = function($scope, $rootScope) {
			$scope.update = function() {
				$rootScope.editor.render = '<a dfp="'+$scope.editor.content.placeholder+'" target="_blank" class="link">DFP Placeholder '+$scope.editor.content.placeholder+'</a>';
			}
		
		
/*
			var _scope 	= $scope.$parent;
			
			$rootScope.creatorModalSave = function() {				
				//$scope.editor.content.link 		= (!/^https?:\/\//.test($scope.editor.content.link))? 'http://' + $scope.editor.content.link: $scope.editor.content.link;
				$scope.editor.render 	= '<a dfp="'+$scope.editor.content.placeholder+'" target="_blank" class="link">DFP Placeholder '+$scope.editor.content.placeholder+'</a>';
				
				_scope.creatorModalSaveContent($scope.editor);
			}
*/
		}
	</script>
</div>