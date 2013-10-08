<div id="ad-edit" data-ng-controller="creatorEditController" data-ng-init="init()" data-ng-cloak>
	<script type="text/javascript">
		var origin_ad 	= '<?php echo $origin_ad;?>';
		var components	= '<?php echo $components;?>';
	</script>
	<!-- Bar across top of page -->
	<div id="title-bar" class="originUI-borderColor originUI-noSelect">
		<div id="titlebar-exit" class="originUI-hover originUI-iconHover inline" data-ng-click="uiExit()">exit</div>
		<h1 id="titlebar-title" class="originUI-textColor inline">{{originAd.name}}</h1>
		<div id="titlebar-save" class="originUI-hover originUI-iconHover" data-ng-click="uiSave()">save</div>
	</div>
	<!-- Left panel -->
	<div id="panel" class="originUI-bgColor originUI-borderColor originUI-noSelect">
		<accordion id="">
			<accordion-group id="panel-assets" heading="Assets" class="panel-accordion" data-ng-class="{true:'active', false:''}[isOpen]" data-is-open="ui.panel === 'assets'">
				<ul class="originUI-list originUI-bgColorSecondary">
					<li class="originUI-listItem" data-asset="{{$index}}" data-ng-repeat="asset in assets" asset>
						<a href="javascript:void(0);" class="originUI-bgHover originUI-listItemLink">{{asset.name}}</a>
					</li>
					<li data-ng-hide="assets.length">No assets</li>
				</ul>
			</accordion-group>
			<accordion-group id="panel-components"  heading="Components" class="panel-accordion" data-ng-class="{true:'active', false:''}[isOpen]"  data-is-open="ui.panel === 'components'">
				<ul class="originUI-list originUI-bgColorSecondary">
					<li class="originUI-listItem" data-ng-repeat="component in components|filter:{status:1}">
						<a href="javascript:void(0)" class="originUI-bgHover originUI-listItemLink" data-ng-click="avgrundOpen('component-new', component)" back-img="{{component.config.img_icon}}">{{component.name}}</a>
					</li>
				</ul>
			</accordion-group>
			<accordion-group id="panel-layers" heading="Layers" class="panel-accordion" data-ng-class="{true:'active', false:''}[isOpen]"  data-is-open="ui.panel === 'layers'">
				<ul class="originUI-list originUI-bgColorSecondary" layers>
					<li class="originUI-listItem" data-ng-repeat="layer in layers|orderBy:'-order'">
						<a href="javascript:void(0)" class="originUI-bgHover originUI-listItemLink" data-ng-mouseover="workspaceFocus(layer.id)" data-ng-mouseleave="workspaceClear(layer.id)" data-ng-click="avgrundOpen('component', layer)" back-img="{{layer.img_icon}}" layer>{{layer.type}}-{{layer.id}}</a>
					</li>
					<li data-ng-hide="layers.length">No layers</li>
				</ul>
				<!-- <ul id="panel-layers" class="originUI-list originUI-bgColor" data-ng-model="layers" layer-sortable></ul> -->
			</accordion-group>
			<div id="panel-properties" class="panel-button originUI-bgHover" data-ng-click="avgrundOpen('properties')">Properties</div>
			<div id="panel-scripts" class="panel-button originUI-bgHover" data-ng-click="avgrundOpen('scripts')">Scripts</div>
		</accordion>
	</div>
	<!-- Workspace -->
	<div id="adEdit-workspace" class="originUI-bgColor originUI-bgTexture originUI-noSelect">
		<!-- Bar above workspace -->
		<div id="workspace-bar" class="originUI-bgColor originUI-borderColor">
			<div data-ng-if="false">
				<div id="schedule" class="inline">
					<div id="schedule-add" class="originUI-iconHover inline" data-ng-click="avgrundOpen('schedule')"></div>
					<!-- schedule.start_date+' thru '+schedule.end_date  -->
					<select id="schedule-select" class="originUI-select originUI-bgColorSecondary inline" data-ng-model="ui.scheduleId" data-ng-options="schedule.id as schedule|filterSchedule for schedule in originAdSchedule|filter:{type:ui.auto}">
					</select>
				</div>
				<div id="auto" class="inline">
					<!-- <input type="checkbox" data-ng-checked="ui.auto === 'auto'" data-ng-click="uiAuto()"/> -->
					<input-checkbox class="inline" name="autoInput" data-ng-model="ui.auto" data-ng-checked="ui.auto === 'auto'" data-ng-true-value='auto' data-ng-false-value='default'></input-checkbox>
					<label class="inline originUI-hover" data-ng-class="{disabled: ui.auto === 'default'}">Auto State</label>
				</div>
			</div>
			<div id="state" class="inline">
				<input-switch id="state-switch" class="originUI-switchDual" name="stateSwitch" active="Initial" inactive="Triggered" data-ng-model="ui.stateSwitch" data-ng-change="uiState()" data-ng-checked="ui.stateSwitch === true"></input-switch>
			</div>
			<div id="platform" class="inline">
				<img class="platform-icon" data-ng-repeat="platform in ['Desktop', 'Tablet', 'Mobile']" data-ng-click="uiPlatform(platform)" data-ng-src="/img/{{platform}}-26x26.png" data-ng-class="{'inactive': !originAd.config[platform].Initial.width, 'active': ui.platform === platform}"/>
			</div>
		</div>
		<!-- Workspace Actual -->
		<form id="workspace-container" workspace-upload="/assets/creator">
			<div id="workspace" workspace>
				<workspace-content class="workspace-content originUI-bgHover" data-ng-repeat="content in originAdSchedule[ui.schedule]['OriginAd'+ui.platform+ui.state+'Content']" data-ng-model="content" data-ng-dblclick="$parent.avgrundOpen('component', ngModel)"></workspace-content>
			</div>
		</form>
		<!-- Bar below workspace -->
		<div id="workspace-options" class="originUI-bgColorSecondary originUI-borderColor">
			<a href="javascript:void(0)" id="workspaceOptions-publish" class="workspaceOptions-button originUI-borderColorSecondary originUI-bgHover inline" data-ng-click="avgrundOpen('embed')">Publish</a>
			<a href="/demo/Origin/<?php echo $origin_ad_hash;?>" id="workspaceOptions-preview" class="workspaceOptions-button originUI-borderColorSecondary originUI-bgHover inline" target="_blank">Preview</a>
			<a href="/administrator/demo/create/{{originAd.id}}" id="workspaceOptions-demo" class="workspaceOptions-button originUI-borderColorSecondary originUI-bgHover inline" target="_blank">Demo</a>
		</div>
	</div>
	<div id="adEdit-workspaceAvgrund">
		<div id="{{avgrund.id}}" class="avgrund-popup originUI-bgColor originUI-shadow">
			<form id="{{avgrund.id}}-form" class="avgrund-form" name="avgrundForm" novalidate>
			<h3 class="originUI-tileHeader originUI-borderColor originUI-textColor">{{avgrund.header}}</h3>
				<div class="avgrund-content" data-ng-if="avgrund.name === 'component' || avgrund.name === 'component-new'">
					<?php echo $this->element('creator/component');?>
				</div>
				<div class="avgrund-content" data-ng-if="avgrund.name === 'embed'">
					<?php echo $this->element('creator/embed');?>
				</div>
				<div class="avgrund-content" data-ng-if="avgrund.name === 'properties'">
					<?php echo $this->element('creator/properties');?>
				</div>
				<div class="angrund-content" data-ng-if="angrund.name === 'schedule'">
					<?php echo $this->element('creator/schedule');?>
				</div>
				<div class="avgrund-content" data-ng-if="avgrund.name === 'scripts'">
					<textarea data-ng-model="originAdScripts.content_css" data-ui-codemirror="{mode:'htmlmixed',lineWrapping:true,theme:'night'}" data-ui-refresh='avgrund.codeMirror'></textarea>
				</div>
				<div id="workspaceAvgrund-buttons">
					<button id="workspaceAvgrund-cancel" class="originUI-bgHover originUI-button originUI-bgColorSecondary" data-ng-click="avgrundCancel()">{{avgrund.ui.cancel}}</button>
					<button id="workspaceAvgrund-submit" class="originUI-bgHover originUI-button originUI-bgColorSecondary" data-ng-click="avgrundSubmit(avgrund.name)" data-ng-disabled="avgrundForm.$invalid">{{avgrund.ui.submit}}</button>
					<div class="clear"></div>
				</div>
			</form>
		</div>
	</div>
	
	
	<!-- Modals -->
	
	<?php /*
	<script type="text/ng-template" id="modal">
		<form id="adList-{{modal.id}}" name="modalForm" class="originUI-bgColor originUI-shadow" novalidate>
			<h3 class="originUI-tileHeader originUI-borderColor originUI-textColor">{{modal.header}}</h3>
			<div id="{{modalScope.id}}" class="originUI-tileContent" data-ng-include src="modal.template">
			</div>
			<div class="originUI-tileFooter">
				<button id="" class="originUI-tileCancel originUI-bgHover originUI-button originUI-bgColorSecondary" data-ng-click="cancel()">{{modal.button.cancel}}</button>
				<button id="" class="originUI-tileSubmit originUI-bgHover originUI-button originUI-bgColorSecondary" data-ng-click="submit()" data-ng-disabled="modalForm.$invalid">{{modal.button.submit}}</button>
				<div class="clear"></div>
			</div>
		</form>
	</script>
	*/?>
	
	
	
	
	
	
	
<?php /*
	<div modal="modalComponent" close="modalClose('modalComponent')" options="modalOption">
		<form id="{{modal.id}}" class="originUI-bgColor {{modal.class}}" name="form" novalidate>
			<h3 class="originUI-tileHeader originUI-borderColor originUI-textColor" back-img="{{modal.thumbnail}}">{{modal.title}}</h3>
			<?php echo $this->element('creator/componentModal');?>
			<div class="originUI-tileFooter">
				<button class="originUI-tileFooterLeft originUI-bgHover" data-ng-click="modalClose('{{modal.callback.close}}')">Cancel</button>
				<button class="originUI-tileFooterRight originUI-bgHover" data-ng-click="modalSubmit('{{modal.callback.submit}}')" data-ng-disabled="form.$invalid">{{modal.submit}}</button>
			</div>
<!--
			
			<div class="originUI-tileFooter">
				<button id="workspaceAvgrund-cancel" class="originUI-bgHover originUI-button originUI-bgColorSecondary" data-ng-click="avgrundCancel()">{{avgrund.ui.cancel}}</button>
				<button id="workspaceAvgrund-submit" class="originUI-bgHover originUI-button originUI-bgColorSecondary" data-ng-click="avgrundSubmit(avgrund.name)" data-ng-disabled="avgrundForm.$invalid">{{avgrund.ui.submit}}</button>
				<div class="clear"></div>
			</div>
			
			
-->
*/?>
		</form>
	</div>
</div>