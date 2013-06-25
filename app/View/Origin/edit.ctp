<div id="ad-edit" ng:controller="creatorController" ng:cloak>
	<input id="originAd_id" type="hidden" value="<?php echo $origin_ad['OriginAd']['id'];?>"/>
	<form id="creator-panel-left" class="originUI-bgColor">
		<input type="hidden" name="uploadDir" value="/assets/creator/<?php echo $this->params['originAd_id'];?>/"/>
		<div id="display-wrapper" ng:click="creatorToggle('view')" data-intro="Toggle between the initial and triggered states of the unit" data-position="bottom" ng:show="workspace.ad.OriginAd.config.dimensions.Triggered[ui.platform].height > 0">
			<div id="display-icon" class="inline" ng:class="{true: 'display-initial', false: 'display-triggered'}[ui.view=='Initial']"></div>
			<div id="display" class="inline">
				<div class="originUI-switch">
				    <input type="checkbox" name="displaySwitch" class="originUI-switchInput" id="displaySwitch" checked="checked">
				    <label class="originUI-switchLabel" for="displaySwitch">
				    	<div class="originUI-switchInner">
				    		<div class="originUI-switchActive">
				    			<div class="originUI-switchText">Initial<br/>State</div>
						    </div>
						    <div class="originUI-switchInactive">
						    	<div class="originUI-switchText">Triggered<br/>State</div>
							</div>
					    </div>
				    </label>
			    </div> 
			</div>
		</div>
		<div id="layer-wrapper" ng:click="creatorToggle('layer')">
			<div id="layer-switch" class="inline" ng:class="{true: 'layer-layers', false: 'layer-library'}[ui.layer=='Layers']">
				<div class="originUI-switch">
				    <input type="checkbox" name="layerSwitch" class="originUI-switchInput" id="layerSwitch" checked="checked">
				    <label class="originUI-switchLabel" for="displaySwitch">
				    	<div class="originUI-switchInner">
				    		<div class="originUI-switchActive">
				    			<div class="originUI-switchText">Layers</div>
						    </div>
						    <div class="originUI-switchInactive">
						    	<div class="originUI-switchText">Library</div>
							</div>
					    </div>
				    </label>
			    </div> 
			</div>
		</div>
		<div ng:class="(workspace.ad.OriginAd.config.dimensions.Triggered[ui.platform].height > 0)? '': 'layer-expand'">
			<div id="layers" style="display:none" ng:show="ui.layer=='Layers'" ng:animate="'originUI-fade'">
				<ul id="layers-list" class="content-list originUI-list" ng:model="layers" layer-sortable></ul>
			</div>
			<div id="library" ng:show="ui.layer=='Library'" ng:animate="'originUI-fade'" style="display:none">
				<ul id="library-list" class="content-list originUI-list">
					<li class="content-item asset originUIList-item" data-asset="{{$index}}" ng:repeat="asset in library" asset>
						<a href="javascript:void(0);" class="content-label inline originUI-hover">{{asset.name}}</a>
						<!-- <span class="content-edit inline">handle</span> -->
					</li>
					<li id="library-instructions" ng:show="!library.length">
						Drag and drop assets here to upload or click the button below.
					</li>
					<li>
						<div id="library-upload" class="originUI-upload originUI-icon originUiIcon-upload originUI-bgColorSecondary">
							<span class="originUI-uploadLabel">Upload Assets</span>
							<input type="file" name="files[]" id="templateAdd-upload-template" class="originUI-uploadInput" multiple="multiple" panel-upload>
						</div>
					</li>
				</ul>
			</div>
		</div>	
		<div id="options-wrapper" data-intro="Ad creator options" data-position="top" class="originUI-borderColor originUI-bgColorSecondary">
			<span id="options" class="dropdown-toggle originUI-borderColor originUI-hover">Options</span>
			<ul class="dropdown-menu originUI-bgColorSecondary originUI-borderColor">
				<li>
					<a href="javascript:void(0)" id="option-embed" class="option originUI-hover" ng:click="embedModalOpen()">Create Embed</a>
				</li>
				<li>
					<a href="/administrator/demo/create/<?php echo $this->params['originAd_id'];?>" id="option-demo" class="option originUI-hover" target="_blank">View Demo</a>
				</li>
				<li>
					<a href="javascript:void(0)" id="option-settings" class="option originUI-hover" ng:click="settingsModalOpen()">Settings</a>
				</li>
				<li>
					<a href="javascript:void(0)" id="option-exit" class="option originUI-hover" ng:click="creatorSaveExit()">Save &amp; Exit</a>
				</li>
			</ul>
		</div><!--
		--><div id="platforms-wrapper" class="originUI-borderColor originUI-bgColorSecondary" data-intro="Select between supported platforms" data-position="top">
			<span id="platforms" class="dropdown-toggle originUI-hover platforms-{{ui.platform}}">{{ui.platform}}</span>
			<ul class="dropdown-menu originUI-bgColorSecondary originUI-borderColor">
				<li class="dropdown-item">
					<a href="javascript:void(0)" id="platform-desktop" class="platform originUI-hover" ng:click="platformSwitch('Desktop')" ng:class="(workspace.ad.OriginAd.config.dimensions.Initial.Desktop.width)? 'active': 'inactive'">Desktop</a>
				</li>
				<li class="dropdown-item">
					<a href="javascript:void(0)" id="platform-tablet" class="platform originUI-hover" ng:click="platformSwitch('Tablet')" ng:class="(workspace.ad.OriginAd.config.dimensions.Initial.Tablet.width)? 'active': 'inactive'">Tablet</a>
				</li>
				<li class="dropdown-item">
					<a href="javascript:void(0)" id="platform-mobile" class="platform originUI-hover" ng:click="platformSwitch('Mobile')" ng:class="(workspace.ad.OriginAd.config.dimensions.Initial.Mobile.width)? 'active': 'inactive'">Mobile</a>
				</li>
			</ul>
		</div><!--
		--><!--
<div id="schedules-wrapper" class="originUI-borderColor originUI-bgColorSecondary" data-intro="Select dates" data-position="right">
			<span id="schedules" class="dropdown-toggle originUI-hover"></span>
			<ul class="dropdown-menu originUI-bgColorSecondary originUI-borderColor">
				<li class="dropdown-item">
					<a href="javascript:void(0)" id="schedule-add" class="schedule originUI-hover" ng:click="">Add New Schedule</a>
				</li>
			</ul>
		</div>
-->
	</form>
	<div id="creator-panel-top" class="originUI-bgColor originUI-borderColor">
		<div id="components-wrapper" class="inline" data-intro="Add components (images, video, etc) to unit" data-position="bottom">
			<div ng:repeat="(groupName, group) in workspace.components" class="inline component-menu originUI-borderColor">
				<a href="javascript:void(0)" id="" class="dropdown-toggle">{{groupName}}</a>
				<ul class="dropdown-menu originUI-bgColorSecondary originUI-borderColor">
					<li ng:repeat="component in group|filter:{status: '1'}" class="dropdown-item">
						<a href="javascript:void(0)" ng:click="creatorModalOpen('component', component)" class="component originUI-hover" back-img='{{component.config.img_icon}}'>{{component.name}}</a>
					</li>
				</ul>
			</div>
		</div>
		<div id="actions-wrapper" class="none">
			<span id="workspace-undo" class="inline" ng:click="workspaceUndo()">Undo</span><!--
			--><span id="workspace-save" class="inline" ng:click="workspaceUpdate()">Save</span>
		</div>
	</div>
	
	
	
	
	<div id="creator-panel-workspace" class="originUI-bgColorSecondary originUI-bgTexture originUI-borderColor">
		<span id="workspace-platform">{{ui.platform}}</span>
		<div id="workspace" ng:style="workspaceTemplateConfig()" workspace>
			<div id="{{ui.view|lowercase}}">
				<workspace-content ng:repeat="content in workspace.ad.OriginAdSchedule[ui.schedule][ui.content]" ng:model="content" double-click="creatorModalOpen('content', '', content)"></workspace-content>
			</div>
		</div>
		
		<div id="workspace-cssEditor" class="">
			<a href="javascript:void(0)" id="cssEditor-button" class="originUI-bgColor originUI-borderColor">CSS</a>
			<div id="cssEditor-editor" class="originUI-bgColor originUI-borderColor">
				<textarea ng:model="css" ui:codemirror="cssCMOptions"></textarea>
			</div>
		</div>
	</div>
	
	<div modal="creatorModal" close="creatorModalClose()" options="creatorModalOptions">
		<form id="creator-modal" class="originUI-bgColorSecondary originUI-modal" ng:class="workspace.modal.alias" novalidate>
			<h3 id="creatorModal-header" class="originUI-tileHeader originUI-borderColor originUI-textColor" back-img='{{workspace.modal.image}}'>{{workspace.modal.title}}</h3>
			
			<a href="javascript:void(0)" id="creatorModal-remove" class="originUI-hover" ng:click="creatorModalRemove(editor)" ng:show="editor.remove">remove</a>
			<div id="creatorModal-content" class="originUI-modalContent">
				<div ng:include src="editor.template" ng:animate="'originUI-fade'"></div>
			</div>
			
			<div id="creatorModal-config">
				<ul class="originUI-list">
					<li>
						<label>X Position</label>
						<div class="originUI-field">
							<div class="originUI-fieldBracket"></div>
							<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="editor.config.left" config="left"/>
						</div>
					</li>
					<li>
						<label>Y Position</label>
						<div class="originUI-field">
							<div class="originUI-fieldBracket"></div>
							<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="editor.config.top" config="top"/>
						</div>
					</li>
					<li>
						<label>Width</label>
						<div class="originUI-field">
							<div class="originUI-fieldBracket"></div>
							<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="editor.config.width" config="width"/>
						</div>
					</li>
					<li>
						<label>Height</label>
						<div class="originUI-field">
							<div class="originUI-fieldBracket"></div>
							<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="editor.config.height" config="height"/>
						</div>
					</li>
<!--
					<li>
						<label>Z-index</label>
						<div class="originUI-field">
							<div class="originUI-fieldBracket"></div>
							<input type="text" class="originUI-input originUI-bgColorSecondary" ng:model="editor.config.zIndex"/>
						</div>
					</li>
-->
				</ul>
			</div>
			<div class="originUI-tileFooter">
				<div class="originUI-tileFooterLeft originUI-hover" ng:click="creatorModalClose()">Cancel</div>
				<div class="originUI-tileFooterRight originUI-hover" ng:click="creatorModalSave()">Save</div>
			</div>
		</form>
	</div>


	<div modal="settingsModal" close="settingsModalClose()" options="creatorModalOptions">
		<form id="settings-modal" class="originUI-bgColorSecondary originUI-modal">
			<input type="hidden" name="uploadDir" value="/assets/creator/<?php echo $this->params['originAd_id'];?>/"/>
			<input type="hidden" ng:model="editor.config.template"/>
			<h3 id="settingsModal-header" class="originUI-tileHeader originUI-borderColor originUI-textColor">Settings</h3>
			<div class="originUI-modalContent">
				<div class="originUI-modalLeft"><?php echo $this->element('form_setting', array('view'=>'left'));?></div>
				<div class="originUI-modalRight">
					<select id="settingsModal-template" class="originUI-select originUI-bgColorSecondary" ng:model="editor.template" ng:options="template.OriginTemplate.name for template in templates|filter:{OriginTemplate.status: '1'}" ng:change="templateLoad()">
						<option style="display:none" value="">Load Template</option>
					</select>
					<?php echo $this->element('form_template', array('view'=>'right', 'editor' => 'editor'));?>
				</div>
				<div class="clear"></div>
			</div>
			<div class="originUI-tileFooter">
				<div class="originUI-tileFooterLeft originUI-hover" ng:click="settingsModalClose()">Cancel</div>
				<div class="originUI-tileFooterRight originUI-hover" ng:click="settingsModalSave()">Save</div>
			</div>
		</form>
	</div>
	<div modal="embedModal" close="embedModalClose()" options="creatorModalOptions">
		<form id="embed-modal" class="originUI-bgColorSecondary originUI-modal">
			<h3 id="embedModal-header" class="originUI-tileHeader originUI-borderColor originUI-textColor">Ad Embed Code</h3>
			
			<div class="originUI-modalContent">
				<?php echo $this->element('form_embed');?>
			</div>
			<div class="originUI-tileFooter">
				<div class="originUI-tileFooterLeft originUI-hover" ng:click="embedModalClose()">Close</div>
				<div class="originUI-tileFooterRight originUI-hover" ng:click="embedModalEmail()">Email Code</div>
			</div>
		</form>
	</div>
	
	
	
	
	
	
	
	
	
	
	
	<!--
<div modal="scheduleModal" close="scheduleModalClose()" options="scheduleModalOptions">
		<form id="schedule-add" class="originUI-bgColorSecondary">
			<h3 id="scheduleAdd-header" class="originUiModal-header">Add Schedule</h3>
			
			<div class="originUiModal-content">
			</div>
			<div class="originUiModal-footer">
				<div class="originUiModalFooter-left" ng:click="scheduleModalClose()">Cancel</div>
				<div class="originUiModalFooter-right" ng:click="scheduleSave()">Save</div>
			</div>
		</form>
	</div>
-->
</div>

<?php
	echo $this->Minify->css(array('creator', 'codemirror/night', 'jquery-ui.min'));
	echo $this->Minify->script(array('codemirror/codemirror', 'codemirror/xml', 'codemirror/javascript', 'codemirror/css', 'codemirror/htmlmixed', 'jquery/jquery-ui.min', 'jquery/jquery-touch', 'controllers/creatorController'));