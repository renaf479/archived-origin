	<input type="hidden" data-ng-model="editor.id"/>
	<input type="hidden" name="uploadDir" value="/img/components/"/>
	<ul class="originUI-list">
		<li class="originUI-listItem">
			<label class="platformForm-label inline">Name</label>
			<div class="platformForm-input inline originUI-field">
				<div class="originUI-fieldBracket"></div>
				<input type="text" class="originUI-input originUI-bgColorSecondary" data-ng-model="editor.name" data-ng-change="alias(editor.name)" placeholder="Name of Component" required/>
			</div>
		</li>
		<li class="originUI-listItem">
			<label class="platformForm-label inline">Alias</label>
			<div class="platformForm-input inline originUI-field">
				<div class="originUI-fieldBracket"></div>
				<input type="text" class="originUI-input originUI-bgColorSecondary" data-ng-model="editor.alias" placeholder="Template Filename" required/>
			</div>
		</li>
		<li class="originUI-listItem">
			<label class="platformForm-label inline">Description</label>
			<div class="platformForm-input inline originUI-field">
				<div class="originUI-fieldBracket"></div>
				<textarea class="originUI-textarea originUI-bgColorSecondary" data-ng-model="editor.content.description" placeholder="Description of component"></textarea>
			</div>
		</li>
		<li class="originUI-listItem">
			<label class="platformForm-label inline">Group</label>
			<div class="platformForm-input originUI-field inline">
				<select class="originUI-select originUI-bgColorSecondary" data-ng-model="editor.group" data-ng-options="group.alias as group.name for group in groups|orderBy:'name'">
					<option style="display:none" value="">Select Group</option>
				</select>
			</div>
		</li>
		<li class="originUI-listItem">
			<div id="adComponent-iconUpload" class="originUI-upload originUI-icon originUiIcon-upload">
				<span class="originUI-uploadLabel">Component Icon</span>
				<input type="file" name="files[]" id="componentAdd-upload-icon" class="originUI-uploadInput" data-ng-model="editor.config.img_icon" fileupload>
			</div>
		</li>
	</ul>
	