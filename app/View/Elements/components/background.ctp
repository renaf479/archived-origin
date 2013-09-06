<div id="editor-background" data-ng-controller="componentCtrl">
	<form id="editorBackground-form" name="editorBackground-form" class="">
		<input type="hidden" name="uploadDir" value="/assets/creator/{{workspace.ad.OriginAd.id}}/"/>
		<div class="originUI-bgColorSecondary inline">
			<ul id="editorBackground-list" class="originUI-list">
				<li class="originUI-listItem" data-ng-repeat="asset in assets" data-ng-click="select(asset)">
					<a href="javascript:void(0)" class="originUI-hover">{{asset.name}}</a>
				</li>
			</ul>
		</div><!--
		--><div class="inline">
			<div id="editorBackground-preview" back-img="{{editor.content.image}}"></div>
		</div>
<!--
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
-->
	</form>
	<style type="text/css">
		#editor-background {
			height: 200px;
		}
		
		#editorBackground-list {
			width: 150px;
			overflow: hidden;
		}
		
		#editorBackground-preview {
			background-repeat: no-repeat;
			background-position: center center;
			background-size: 400px auto;
			width: 420px;
			height: 200px;
		}
		
		#componentModal-config {
			display: none;
		}
	</style>
	<script type="text/javascript">
		var componentCtrl = function($scope) {
			$scope.select = function(model) {
				$scope.editor.content.image  = '/assets/creator/'+$scope.originAd.id+'/'+model.name;
			}
			
			$scope.$watch('editor.content.image', function(newVal) {
				if(newVal){
					$scope.editor.config.height	= $scope.editor.config.width = '100%';
					$scope.editor.render		= '<img src="'+$scope.editor.content.image+'" class="background"/>';
					$scope.editor.order 		= '-1';
				}
			});
		
/*
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
*/
		}
	</script>
</div>