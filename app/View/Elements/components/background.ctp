	<div id="editor-background" name="editorBackground-form" data-ng-controller="componentCtrl" data-ng-init="init()">
		<input type="hidden" name="uploadDir" value="/assets/creator/{{workspace.ad.OriginAd.id}}/"/>
		<div id="editorBackground-list" class="originUI-bgColorSecondary inline">
			<ul class="originUI-list">
				<li class="originUI-listItem" data-ng-repeat="asset in assets" data-ng-click="select(asset)">
					<a href="javascript:void(0)" class="originUI-hover">{{asset.name}}</a>
				</li>
			</ul>
		</div><!--
		--><div class="inline">
			<div id="editorBackground-preview" back-img="{{editor.content.image}}"></div>
		</div>
	</div>
	<style type="text/css">
		#componentModal-editor {
			width: 100%;	
		}
		
		#editorBackground-list {
			width: 100px;
			height: 100%;
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
		var componentCtrl = function($scope, Rest) {
			
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
