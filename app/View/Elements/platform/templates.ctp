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
				<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="editor.name" required/>
			</div>
		</li>
		<li class="originUI-listItem">
			<label class="platformForm-label inline">Description</label>
			<div class="platformForm-input inline originUI-field">
				<div class="originUI-fieldBracket"></div>
				<textarea class="originUI-textarea originUI-bgColorSecondary" ng:model="editor.content.description" required></textarea>
			</div>
		</li>
		<li class="originUI-listItem">
			<div id="adTemplate-storyboardUpload" class="originUI-upload originUI-icon originUiIcon-upload inline">
				<span class="originUI-uploadLabel">Upload Storyboard</span>
				<input type="file" name="files[]" id="adTemplate-upload-storyboard" class="originUI-uploadInput" ng:model="editor.content.file_storyboard" fileupload>
			</div>
			<div id="adTemplate-guidelineUpload" class="originUI-upload originUI-icon originUiIcon-upload inline">
				<span class="originUI-uploadLabel">Upload Guidelines</span>
				<input type="file" name="files[]" id="adTemplate-upload-guideline" class="originUI-uploadInput" ng:model="editor.content.file_guideline" fileupload>
			</div>
		</li>
		<li class="originUI-listItem">
			<label class="platformForm-label inline">Ad Type</label>
			<select class="platformForm-input inline originUI-select originUI-bgColorSecondary" data-ng-model="editor.config.type" data-ng-change="templateSelect('editor', editor.config.type)">
				<option style="display:none" value="">Select Type</option>
				<option value="default">Standard</option>
				<option value="expand">Expanding</option>
				<option value="overlay">Overlay</option>
				<option value="prestitial">Prestitial</option>
				<option value="interstitial">Interstitial</option>
				<!-- <option value="interstitial" data-ng-show="editor.alias === 'antemeridian' || editor.alias === 'postmeridian'">Interstitial</option> -->
			</select>
		</li>
		<li class="originUI-listItem">
			<label class="platformForm-label inline">Placement</label>
			<select class="platformForm-input inline originUI-select originUI-bgColorSecondary" data-ng-model="editor.config.placement">
				<option style="display:none" value="">Select Position</option>
				<option value="default">Standard (inline)</option>
				<option value="top">Top of the Page</option>
				<option value="bottom">Bottom of the Page</option>
			</select>
		</li>
	</ul>
	<div class="platformForm-templatePlatform" data-ng-repeat="platform in fields.platforms">
		<h3>{{platform.name}}</h3>
		<!-- Status Switch -->
		<div id="" class="templatePlatform-status">
			<div class="originUI-switch">
			    <input type="checkbox" name="editor{{platform.name}}ToggleSwitch" class="originUI-switchInput" id="editor{{platform.name}}ToggleSwitch" data-ng-model="editor.config[platform.name].status" data-ng-change="templatePlatform('editor', platform)">
			    <label class="originUI-switchLabel" for="editor{{platform.name}}ToggleSwitch">
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
		<div class="originUI-bgColorSecondary platformForm-templateDimensions" data-ng-show="editor.config[platform.name].status" data-ng-hide="!editor.config[platform.name].status" data-ng-animate="'originUI-fade'">
			<!-- Dimensions -->
			<h4>Dimensions</h4>
			<ul class="originUI-list">
				<li class="originUI-listItem" data-ng-repeat="dimension in fields.dimensions">
					<label class="platformForm-label inline">{{dimension.label}}</label>
					<div class="platformForm-input originUI-field inline">
						<div class="originUI-fieldBracket"></div>
						<input type="text" class="originUI-input originUI-bgColorSecondary" data-ng-model="editor.config[platform.name][input].width" placeholder="{{input}}"/>
					</div>
				</li>
			</ul>
			<!-- Animations -->
			<div data-ng-show="fields.animations.length">
				<h4>Animations</h4>
				<ul class="originUI-list">
					<li class="originUI-listItem" data-ng-repeat="animation in fields.animations">
						<label class="platformForm-label inline">{{animation.label}}</label>
						<div class="platformForm-input originUI-field inline" data-ng-if="animation.name !== 'selector'">
							<div class="originUI-fieldBracket"></div>
							<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="editor.config[platform.name].Animations[animation.name]"/>
						</div>
						<select class="originUI-select originUI-bgColorSecondary inline adSettings-input" data-ng-model="editor.config[platform.name].Animations.selector" data-ng-if="animation.name === 'selector'">
							<option style="display:none" value="">Select</option>
							<option value="initial">Initial</option>
							<option value="triggered">Triggered</option>
						</select>
					</li>
				</ul>
			</div>
		</div>
	</div>