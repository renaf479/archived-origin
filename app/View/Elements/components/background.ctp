<div id="editor-background" ng:controller="componentCtrl">
	<form id="editorBackground-form" name="editorBackground-form" class="">
		<input type="hidden" name="uploadDir" value="/assets/creator/{{workspace.ad.OriginAd.id}}/"/>
		<div class="originUI-modalLeft">
			<strong>Select Image</strong>
			<ul id="editorBackground-list" class="originUI-bgColor">
				<li class="originUIList-item" data-asset="{{$index}}" ng:repeat="asset in library" ng:click="backgroundSelect(asset)">
					<a href="javascript:void(0);" class="originUI-hover">{{asset.name}}</a>
				</li>
			</ul>
		</div>
		<div class="originUI-modalRight">
			<div id="background-upload" class="originUI-upload">
				<span class="originUI-uploadLabel">Upload Background</span>
				<input type="file" name="files[]" id="editorBackground-upload" class="originUI-uploadInput" ng:model="editor.content.bgUpload" fileupload>
			</div>
			<div id="editorBackground-preview" class="originUI-borderColorSecondary originUI-bgColor" ng:class="{'originUI-placeholder': editor.content.image == undefined}" back-img='{{editor.content.image}}'></div>
		</div>
		<div class="clear"></div>
	</form>
	
	<script type="text/javascript">
		var componentCtrl = function($scope, $rootScope) {
			var _scope 	= $scope.$parent;
			
			$scope.$watch('editor.content.bgUpload', function(newValue, oldValue) {
				if(newValue) {
					$scope.editor.content.image = newValue;
				}
			}, true);
			
			$scope.backgroundSelect = function(model) {
				$scope.editor.content.image = '/assets/creator/'+$scope.workspace.ad.OriginAd.id+'/'+model.name;
			}
			
			$rootScope.creatorModalSave = function() {				
			
				$scope.editor.config.height	= $scope.editor.config.width = '100%';
				$scope.editor.render		= '<img src="'+$scope.editor.content.image+'" class="background"/>';
				$scope.editor.order 		= '-1';
				
				_scope.creatorModalSaveContent($scope.editor);
			}
		}
/*
		var componentCtrl = function($scope) {
			//var _scope = angular.element($j('#ad-edit')).scope();
			var _scope = $scope.$parent;
			
			$scope.$watch('editor.content.upload', function(newValue, oldValue) {
				if(newValue) {
					_scope.editor.content.image = newValue;
					generateRender();
				}
			}, true);
			
			$scope.backgroundSelect = function(model) {
				_scope.editor.content.image = '/assets/creator/'+_scope.workspace.ad.OriginAd.id+'/'+model.name;
				generateRender();
			}
			
			function generateRender() {
				_scope.editor.config.height	= _scope.editor.config.width = '100%';
				_scope.editor.render		= '<img src="'+$scope.$parent.editor.content.image+'" class="background"/>';
				_scope.editor.order 		= '-1';
				$scope.editor.content.upload= '';
			}
		}
*/
	</script>
</div>