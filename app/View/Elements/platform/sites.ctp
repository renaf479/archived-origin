	<div id="platformForm-status" class="">
		<div class="originUI-switch">
		    <input type="checkbox" name="editorStatusSwitch" class="originUI-switchInput" id="editorStatusSwitch" data-ng-model="editor.status">
		    <label class="originUI-switchLabel" for="editorStatusSwitch">
		    	<div class="originUI-switchInner">
		    		<div class="originUI-switchActive">
		    			<div class="originUI-switchText">Active</div>
				    </div>
				    <div class="originUI-switchInactive">
				    	<div class="originUI-switchText">Inactive</div>
					</div>
			    </div>
		    </label>
	    </div>
	</div>
	<ul class="originUI-list">
		<li class="originUI-listItem">
			<label class="platformForm-label inline">Name</label>
			<div class="platformForm-input inline originUI-field">
				<div class="originUI-fieldBracket"></div>
				<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="editor.name" ng:change="alias(editor.name)" placeholder="Name of Site" required/>
			</div>
		</li>
		<li class="originUI-listItem">
			<label class="platformForm-label inline">Alias</label>
			<div class="platformForm-input inline originUI-field">
				<div class="originUI-fieldBracket"></div>
				<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="editor.alias" placeholder="Template filename" required/>
			</div>
		</li>
		<li class="originUI-listItem">
			<label class="platformForm-label inline">Description</label>
			<div class="platformForm-input inline originUI-field">
				<div class="originUI-fieldBracket"></div>
				<textarea class="originUI-textarea originUI-bgColorSecondary" ng:model="editor.content.description" placeholder="Description of site" required></textarea>
			</div>
		</li>
	</ul>