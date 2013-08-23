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
			<div id="adTemplate-storyboardUpload" class="originUI-upload originUI-icon originUiIcon-upload">
				<span class="originUI-uploadLabel">Upload Storyboard</span>
				<input type="file" name="files[]" id="adTemplate-upload-storyboard" class="originUI-uploadInput" ng:model="editor.content.file_storyboard" fileupload>
			</div>
		</li>
		<li class="originUI-listItem">
			<div id="adTemplate-guidelineUpload" class="originUI-upload originUI-icon originUiIcon-upload">
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
		<tabset id="adSettings-dimensions">
			<?php 
				$platforms	= array('Desktop', 'Tablet', 'Mobile');
				foreach($platforms as $key=>$platform) {
			?>
			<tab heading="<?php echo $platform;?>">
				<div id="adSettings-platform">
					<label class="inline adSettings-label">Enabled</label>
					<div id="" class="inline adSettings-input">
						<div class="originUI-switch">
						    <input type="checkbox" name="editor.<?php echo $platform;?>ToggleSwitch" class="originUI-switchInput" id="editor<?php echo $platform;?>ToggleSwitch" data-ng-model="editor.config.<?php echo $platform;?>.status" data-ng-change="templatePlatform('editor', '<?php echo $platform;?>')">
						    <label class="originUI-switchLabel" for="editor.<?php echo $platform;?>ToggleSwitch">
						    	<div class="originUI-switchInner">
						    		<div class="originUI-switchActive">
						    			<div class="originUI-switchText">Yes</div>
								    </div>
								    <div class="originUI-switchInactive">
								    	<div class="originUI-switchText">No</div>
									</div>
							    </div>
						    </label>
					    </div>
					</div>
				</div>
				<ul class="originUI-list" data-ng-show="editor.config.<?php echo $platform;?>.status" data-ng-hide="!editor.config.<?php echo $platform;?>.status" data-ng-animate="'originUI-fade'">
					<li class="originUI-listItem">
						<label class="inline adSettings-label">{{editor.templateType.initialWidth}}</label>
						<div class="originUI-field inline adSettings-input">
							<div class="originUI-fieldBracket"></div>
							<input type="text" class="originUI-input originUI-bgColorSecondary" data-ng-model="editor.config.<?php echo $platform;?>.Initial.width"/>
						</div>
					</li>
					<li class="originUI-listItem">
						<label class="inline adSettings-label">{{editor.templateType.initialHeight}}</label>
						<div class="originUI-field inline adSettings-input">
							<div class="originUI-fieldBracket"></div>
							<input type="text" class="originUI-input originUI-bgColorSecondary" data-ng-model="editor.config.<?php echo $platform;?>.Initial.height"/>
						</div>
					</li>
					<li data-ng-hide="editor.templateType.hide.indexOf('triggered') >= 0">
						<label class="inline adSettings-label">Triggered Width</label>
						<div class="originUI-field inline adSettings-input">
							<div class="originUI-fieldBracket"></div>
							<input type="text" class="originUI-input originUI-bgColorSecondary" data-ng-model="editor.config.<?php echo $platform;?>.Triggered.width"/>
						</div>
					</li>
					<li data-ng-hide="editor.templateType.hide.indexOf('triggered') >= 0">
						<label class="inline adSettings-label">Triggered Height</label>
						<div class="originUI-field inline adSettings-input">
							<div class="originUI-fieldBracket"></div>
							<input type="text" class="originUI-input originUI-bgColorSecondary" data-ng-model="editor.config.<?php echo $platform;?>.Triggered.height"/>
						</div>
					</li>
					<li id="adTemplate-configSelector" data-ng-hide="editor.templateType.hide.indexOf('animation') >= 0">
						<label class="originUI-label inline adSettings-label">Selector</label>
						<select class="originUI-select originUI-bgColorSecondary inline adSettings-input" data-ng-model="editor.config.<?php echo $platform;?>.Animations.selector">
							<option style="display:none" value="">Select</option>
							<option value="initial">Initial</option>
							<option value="triggered">Triggered</option>
						</select>
					</li>
					<li data-ng-hide="editor.templateType.hide.indexOf('animation') >= 0">
						<label class="originUI-label inline adSettings-label">Animation Start</label>
						<div class="originUI-field inline adSettings-input">
							<div class="originUI-fieldBracket"></div>
							<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="editor.config.<?php echo $platform;?>.Animations.start"/>
						</div>
					</li>
					<li data-ng-hide="editor.templateType.hide.indexOf('animation') >= 0">
						<label class="originUI-label inline adSettings-label">Animation End</label>
						<div class="originUI-field inline adSettings-input">
							<div class="originUI-fieldBracket"></div>
							<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="editor.config.<?php echo $platform;?>.Animations.end"/>
						</div>
					</li>
					<li data-ng-hide="editor.templateType.hide.indexOf('animation') >= 0">
						<label class="originUI-label inline adSettings-label">Opening Duration</label>
						<div class="originUI-field inline adSettings-input">
							<div class="originUI-fieldBracket"></div>
							<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="editor.config.<?php echo $platform;?>.Animations.openDuration"/>
						</div>
					</li>
					<li data-ng-hide="editor.templateType.hide.indexOf('animation') >= 0">
						<label class="originUI-label inline adSettings-label">Closing Duration</label>
						<div class="originUI-field inline adSettings-input">
							<div class="originUI-fieldBracket"></div>
							<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="editor.config.<?php echo $platform;?>.Animations.closeDuration"/>
						</div>
					</li>
					<li data-ng-hide="editor.templateType.hide.indexOf('timer') >= 0">
						<label class="originUI-label inline adSettings-label">Close Timer</label>
						<div class="originUI-field inline adSettings-input">
							<div class="originUI-fieldBracket"></div>
							<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="editor.config.<?php echo $platform;?>.Animations.timer"/>
						</div>
					</li>
				</ul>
			</tab>
			<?php } ?>
		</tabset>
	