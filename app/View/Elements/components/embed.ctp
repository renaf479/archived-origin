	<div id="editor-embed" data-ng-controller="componentCtrl" data-ng-init="init()">
		<textarea data-ng-model="editor.content.embed" ui-codemirror="{mode:'htmlmixed',lineNumbers:true,lineWrapping:true,theme:'night'}"></textarea>
	</div>
	<div id="editorEmbed-options">
		<label class="inline">Iframe content: </label>
		<input-switch class="originUI-switch inline" name="editorEmbedSwitch" active="Yes" inactive="No" data-ng-model="editor.content.iframe" data-ng-checked="editor.content.iframe === true"></input-switch>
	</div>
	<style type="text/css">
		#editor-embed {
			height: 190px;
		}
		
		.CodeMirror {
			height: inherit;
		}
		
		#editorEmbed-options {
			margin-top: 10px;
			line-height: 23px;
			padding: 0 10px;
		}
		
		#editorEmbed-options .originUI-switch {
			width: 75px;
			margin: 0 10px;
		}
	</style>
	<script type="text/javascript">
		var componentCtrl = function($scope) {
			/*
$scope.init = function() {
				$scope.editor.type = 'embed';	
			}
*/
			
			$scope.$watchCollection('[editor.content.embed, editor.content.iframe]', function(newVal) {
				if(newVal[0]) {
					$scope.editor.render	= ($scope.editor.content.iframe)? '<iframe class="embed" src="http://'+location.hostname+'/adIframe/%model%/%id%" frameborder="0" scrolling="no" collapse="iframe"></iframe>': '<div class="embed" collapse="content">'+$scope.editor.content.embed+'</div>';
				}
			});
		}
	</script>
