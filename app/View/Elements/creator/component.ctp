	<a href="javascript:void(0)" id="componentModal-remove" class="originUI-hover originUI-iconHover" data-ng-click="avgrundSubmit('component-remove')" data-ng-if="avgrund.remove">remove</a>
	<div data-ng-include src="avgrund.content" id="componentModal-editor" class="inline" data-ng-if="avgrund"></div><!--
	--><div id="componentModal-config" class="inline originUI-bgColorSecondary">
		<h4 id="componentModal-header">Properties</h4>
		<ul class="originUI-list">
			<li>
				<label>X Position</label>
				<input type="text" data-ng-model="editor.config.left" required config="left" input-text/>
			</li>
			<li>
				<label>Y Position</label>
				<input type="text" data-ng-model="editor.config.top" required config="top" input-text/>
			</li>
			<li>
				<label>Width</label>
				<input type="text" data-ng-model="editor.config.width" required config="width" input-text/>
			</li>
			<li>
				<label>Height</label>
				<input type="text" data-ng-model="editor.config.height" required config="height" input-text/>
			</li>
		</ul>
	</div>