	<div id="editor-background" data-ng-controller="componentCtrl" data-ng-init="init()">
		<div id="editorBackground-list" class="originUI-bgColorSecondary inline">
			<ul class="originUI-list">
				<li id="editorBackground-upload">
					<file-upload class="test" data-label="Upload" data-upload="/assets/creator/{{originAd.id}}/" data-callback="update()">Upload</file-upload>
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
		var componentCtrl = function($scope, $rootScope, Rest) {
			
			$scope.init = function() {
			}
			
			$scope.select = function(model) {
				$rootScope.editor.content.image  = '/assets/creator/'+$scope.originAd.id+'/'+model.name;
			}
			
			$scope.$watch('editor.content.image', function(newVal) {
				if(newVal){
					$rootScope.editor.config.height	= $rootScope.editor.config.width = '100%';
					$rootScope.editor.render		= '<img src="'+$rootScope.editor.content.image+'" class="background"/>';
					$rootScope.editor.order 		= '-1';
				}
			});
			
			$scope.update = function() {
				Rest.get('library/'+$scope.originAd.id).then(function(response) {
					$rootScope.assets	= response.files;
				});
			}
		}
	</script>
