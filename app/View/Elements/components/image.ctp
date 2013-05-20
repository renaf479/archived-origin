<div id="editor-image" ng:controller="componentCtrl">
	<form id="editorImage-form" name="editorImage-form" class="">
		<input type="hidden" name="uploadDir" value="/assets/creator/{{workspace.ad.OriginAd.id}}/"/>
		<div class="originUI-modalLeft">
			<strong>Select Image</strong>
			<ul id="editorImage-list" class="originUI-bgColor originUI-borderColor">
				<li class="originUIList-item" data-asset="{{$index}}" ng:repeat="asset in library" ng:click="imageSelect(asset)">
					<a href="javascript:void(0);" class="originUI-hover">{{asset.name}}</a>
				</li>
			</ul>
		</div>
		<div class="originUI-modalRight">
			<div id="background-upload" class="originUI-upload">
				<span class="originUI-uploadLabel">Upload Background</span>
				<input type="file" name="files[]" id="editorImage-upload" class="originUI-uploadInput" ng:model="editor.content.imgUpload" fileupload>
			</div>
			<div id="editorImage-preview" class="originUI-borderColorSecondary originUI-bgColor" ng:class="{'originUI-placeholder': editor.content.image == undefined}" back-img='{{editor.content.image}}'></div>
		</div>
		<div class="clear"></div>
	</form>
	
	<script type="text/javascript">
		var componentCtrl = function($scope, $rootScope) {
			var _scope 	= $scope.$parent;
			
			$scope.$watch('editor.content.imgUpload', function(newValue, oldValue) {
				if(newValue) {
					$scope.editor.content.image = newValue;
					//Calculate image dimensions
					var img = new Image();
					img.src = newValue;
					img.onload = function() {
						$scope.editor.config.height	= img.height+'px';
						$scope.editor.config.width 	= img.width+'px';
						$scope.$apply();
					}
				}
			}, true);
			
			$scope.imageSelect = function(model) {
				$scope.editor.config.height	= model.height+'px';
				$scope.editor.config.width 	= model.width+'px';
				$scope.editor.content.image = '/assets/creator/'+$scope.workspace.ad.OriginAd.id+'/'+model.name;
			}
			
			$rootScope.creatorModalSave = function() {				
				$scope.editor.render		= '<img src="'+$scope.editor.content.image+'" class="image"/>';
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
				_scope.editor.render		= '<img src="'+$scope.$parent.editor.content.image+'" class="image"/>';
				$scope.editor.content.upload= '';
				console.log(_scope.editor);
			}
		}
*/
	</script>
</div>