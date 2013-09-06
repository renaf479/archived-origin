<div id="ad-edit" data-ng-controller="creatorEditController" data-ng-init="init()" data-ng-cloak>
	<script type="text/javascript">
		var origin_ad 	= '<?php echo $origin_ad;?>';
		var components	= '<?php echo $components;?>';
	</script>
	<!-- Bar across top of page -->
	<div id="title-bar" class="originUI-borderColor">
		<div id="titlebar-exit" class="originUI-hover originUI-iconHover inline" data-ng-click="creatorSaveExit()">exit</div>
		<h1 id="titlebar-title" class="originUI-textColor inline">{{originAd.name}}</h1>
	</div>
	<!-- Left panel -->
	<div id="panel" class="originUI-bgColorSecondary originUI-borderColor">
		<accordion id="">
			<accordion-group id="panel-assets" heading="Assets" class="panel-accordion" data-ng-class="{true:'active', false:''}[isOpen]">
				<ul class="originUI-list originUI-bgColor">
					<li class="originUI-listItem" data-asset="{{$index}}" data-ng-repeat="asset in assets" asset>
						<a href="javascript:void(0);" class="originUI-hover originUI-listItemLink">{{asset.name}}</a>
					</li>
				</ul>
			</accordion-group>
			<accordion-group id="panel-components"  heading="Components" class="panel-accordion" data-ng-class="{true:'active', false:''}[isOpen]">
				<ul class="originUI-list originUI-bgColor">
					<li class="originUI-listItem" data-ng-repeat="component in components">
						<a href="javascript:void(0)" class="originUI-hover originUI-listItemLink" data-ng-click="modalOpen('component-add', component)" back-img="{{component.config.img_icon}}">{{component.name}}</a>
					</li>
				</ul>
			</accordion-group>
			<accordion-group id="panel-layers" heading="Layers" class="panel-accordion" data-ng-class="{true:'active', false:''}[isOpen]">
				<ul class="originUI-list originUI-bgColor" layers>
					<li class="originUI-listItem" data-ng-repeat="layer in layers|orderBy:'-order'">
						<a href="javascript:void(0)" class="originUI-hover originUI-listItemLink" data-ng-mouseover="workspaceFocus(layer.id)" data-ng-mouseleave="workspaceClear(layer.id)" data-ng-dblclick="modalOpen('component-load', layer)" back-img="{{layer.img_icon}}" layer>{{layer.type}}-{{layer.id}}</a>
					</li>
				</ul>
				<!-- <ul id="panel-layers" class="originUI-list originUI-bgColor" data-ng-model="layers" layer-sortable></ul> -->
			</accordion-group>
			<div id="panel-properties" class="panel-button originUI-hover" data-ng-click="avgrundOpen('properties')">Properties</div>
			<div id="panel-scripts" class="panel-button originUI-hover" data-ng-click="avgrundOpen('scripts')">Scripts</div>
		</accordion>
	</div>
	<!-- Bar above workspace -->
	<div id="workspace-bar" class="originUI-bgColorSecondary originUI-borderColor">
		<div id="state">
			<input-switch class="originUI-switchDual" name="stateSwitch" active="Initial" inactive="Triggered" data-ng-model="ui.stateSwitch" data-ng-change="uiState()"></input-switch>
		</div>
		<div id="platform">
			<img class="platform-icon" data-ng-repeat="platform in ['Desktop', 'Tablet', 'Mobile']" data-ng-click="uiPlatform(platform)" data-ng-src="/img/{{platform}}-26x26.png" data-ng-class="{'inactive': !originAd.config[platform].Initial.width, 'active': ui.platform === platform}"/>
		</div>
	</div>
	<!-- Workspace -->
	<div id="adEdit-workspace" class="originUI-bgColor originUI-bgTexture">
		<div id="workspace" workspace>
			<workspace-content class="workspace-content" data-ng-repeat="content in originAdSchedule[ui.schedule]['OriginAd'+ui.platform+ui.state+'Content']" data-ng-model="content" data-ng-dblclick="$parent.modalOpen('component-load', ngModel)"></workspace-content>
		</div>
	</div>
	<div id="adEdit-workspaceAvgrund">
		<div id="{{avgrund.name}}" class="avgrund-popup originUI-bgColor originUI-shadow">
			<h3 class="originUI-tileHeader originUI-borderColor originUI-textColor">{{avgrund.header}}</h3>
			<form id="{{avgrund.name}}-form" name="avgrundForm" novalidate>
				<div data-ng-if="avgrund.name === 'properties'">
					<?php echo $this->element('creator/properties');?>
				</div>
				<div data-ng-if="avgrund.name === 'scripts'">
					script edit...
				</div>
				<div id="workspaceAvgrund-buttons">
					<button id="workspaceAvgrund-cancel" class="originUI-hover originUI-button originUI-bgColorSecondary" data-ng-click="avgrundCancel()">Cancel</button>
					<button id="workspaceAvgrund-submit" class="originUI-hover originUI-button originUI-bgColorSecondary" data-ng-click="avgrundSubmit(avgrund.name)" data-ng-disabled="avgrundForm.$invalid">Save</button>
					<div class="clear"></div>
				</div>
			</form>
		</div>
	</div>
	<!-- Bar below workspace -->
	<div id="workspace-options" class="originUI-bgColorSecondary originUI-borderColor">
		<a href="javascript:void(0)" id="workspaceOptions-publish" class="workspaceOptions-button originUI-borderColorSecondary originUI-hover inline" data-ng-click="">Publish</a>
		<a href="/demo/Origin/<?php echo $origin_ad_hash;?>" id="workspaceOptions-preview" class="workspaceOptions-button originUI-borderColorSecondary originUI-hover inline" target="_blank">Preview</a>
		<a href="/administrator/demo/create/{{originAd.id}}" id="workspaceOptions-demo" class="workspaceOptions-button originUI-borderColorSecondary originUI-hover inline" target="_blank">Demo</a>
	</div>
	
	<!-- Modals -->
	<div modal="modalComponent" close="modalClose('modalComponent')" options="modalOption">
		<form id="{{modal.id}}" class="originUI-bgColor {{modal.class}}" name="form" novalidate>
			<h3 class="originUI-tileHeader originUI-borderColor originUI-textColor" back-img="{{modal.thumbnail}}">{{modal.title}}</h3>
			<a href="javascript:void(0)" id="{{modal.id}}-remove" class="originUI-hover" data-ng-click="modalSubmit('{{modal.callback.remove}}')" data-ng-if="modal.remove">remove</a>
			<div id="{{modal.id}}-content" class="originUI-modalContent">
				<div data-ng-include src="modal.content"></div>
			</div>
			<div id="{{modal.id}}-config" data-ng-if="modal.config">
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
			<div class="originUI-tileFooter">
				<button class="originUI-tileFooterLeft originUI-hover" data-ng-click="modalClose('{{modal.callback.close}}')">Cancel</button>
				<button class="originUI-tileFooterRight originUI-hover" data-ng-click="modalSubmit('{{modal.callback.submit}}')" data-ng-disabled="form.$invalid">{{modal.submit}}</button>
			</div>
		</form>
	</div>
</div>

<?php
	echo $this->Minify->css(array('creator/edit', 'plugins/codemirror/night', 'plugins/jquery-ui.min'));
	echo $this->Minify->script(array('plugins/avgrund', 'plugins/angular/bootstrap', 'plugins/codemirror/codemirror', 'plugins/codemirror/xml', 'plugins/codemirror/javascript', 'plugins/codemirror/css', 'plugins/codemirror/htmlmixed', 'plugins/jquery-ui.min', 'plugins/jquery-touch', 'plugins/jquery.kinetic.min', 'creator/edit/creatorEditController', 'creator/edit/creatorEditDirectives', 'creator/editor/creatorDirectives'));
	
?>