	<div id="editor-background" name="editorBackground-form" data-ng-controller="componentCtrl" data-ng-init="init()">
		<div id="editorBackground-list" class="originUI-bgColorSecondary inline">
			<ul class="originUI-list">
				<li id="editorBackground-upload">
					<file-upload class="test" data-label="Upload" data-ng-model="editor.content.upload" data-upload="/assets/creator/{{originAd.id}}/">Upload</file-upload>
				</li>
				<li class="originUI-listItem" data-ng-repeat="asset in assets" data-ng-click="select(asset)">
					<a href="javascript:void(0)" class="originUI-hover">{{asset.name}}</a>
				</li>
			</ul>
		</div><!--
		--><div id="editorBackground-preview" class="inline originUI-bgColorTertiary" back-img="{{editor.content.image}}">
		</div>
	</div>
	<style type="text/css">
		#componentModal-editor {
			width: 100%;	
		}
		
		#editorBackground-upload {
			margin: 0;
		}
		
		#editor-background {
			height: inherit;
		}
		
		#editorBackground-list {
			width: 100px;
			height: inherit;
			overflow-y: auto;
			overflow-x: hidden;
			font-size: 12px;
		}
		
		#editorBackground-list .originUI-listItem {
			margin: 0;
			padding: 0;
		}
		
		#editorBackground-list .originUI-listItem > a {
			margin: 0;
			padding: 0;
			height: 26px;
			line-height: 26px;
			text-align: center;
		}
		
		#editorBackground-preview {
			background-repeat: no-repeat;
			background-position: center center;
			background-size: 450px auto;
			width: 470px;
			height: inherit;
		}
		
		#componentModal-config {
			display: none;
		}
	</style>
	<script type="text/javascript">
		var componentCtrl = function($scope, Rest) {
			console.log($scope.originAd.id);
			
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
			
			$scope.$watch('editor.content.upload', function(newVal) {
				if(newVal) {
					console.log(newVal);
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
