<div id="ad-list" data-ng-controller="adListController" data-ng-init="init()" data-ng-cloak>
	<div id="ad-header">
		<h2 class="originUI-header">Ad Manager</h2>
		<a href="javascript:void(0)" id="ad-create" class="originUI-shadow originUI-borderColor originUI-bgColor" data-ng-click="modal('create')">Create New Ad</a>
	</div>
	<div data-intro="Ad Listing" data-position="right">
		<div class="ad-wrapper inline" data-ng-repeat="ad in filteredAds = (ads|filter:searchOrigin)" data-ng-animate="'originUI-fade'" data-ng-class="{'originUI-expand': (adShow === ad.OriginAd.id)}">
			<div id="OriginAd-{{ad.OriginAd.id}}" class="ad-tile originUI-bgColor originUI-shadow originUI-borderColor originUI-expandItem" ad data-ng-click="adExpand(ad.OriginAd)">
				<img src="/img/logo-small.png" class="adTile-watermark"/>
				<span class="adTile-id originUI-hover">{{ad.OriginAd.id}}</span>
				<span class="adTile-template">{{ad.OriginAd.type}}</span>
				<span class="adTile-name originUI-borderColor">{{ad.OriginAd.name}}</span>
				<span class="adTile-showcase originUI-superAdmin" data-ng-show="ad.OriginAd.showcase">showcase</span>
				<div class="adTile-meta">
					<span class="adTile-create">Created {{ad.OriginAd.create_date}} by {{ad.OriginAd.create_by}}</span>
					<span class="adTile-modify">Last Modified {{ad.OriginAd.modify_date}} by {{ad.OriginAd.modify_by}}</span>
				</div>
			</div>
			<div class="ad-expand originUI-expandWrapper originUI-bgColor originUI-borderColor originUI-bgTexture" data-ng-show="adShow === ad.OriginAd.id" data-ng-hide="adShow !== ad.OriginAd.id">
				<a href="javascript:void(0)" class="originUI-expandClose originUI-hover" data-ng-click="adClose(ad.OriginAd)">close</a>
				
				<div class="originUI-superAdmin">
					<a href="javascript:void(0)" class="adExpand-showcase originUI-hover" data-ng-click="adShowcase(ad.OriginAd)" data-ng-class="(ad.OriginAd.showcase == 1)? 'showcase': ''">showcase</a>
					<a href="javascript:void(0)" class="adExpand-remove originUI-hover" data-ng-click="adRemove(ad.OriginAd)">remove</a>
				</div>
				
				<h3 class="adExpand-name">{{ad.OriginAd.name}}</h3>
				<div class="adExpand-meta">
					<span class="inline">Modified {{ad.OriginAd.modify_date}} by {{ad.OriginAd.modify_by}}</span> | 
					<span class="inline">Created {{ad.OriginAd.create_date}} by {{ad.OriginAd.create_by}}</span>
				</div>
				<div class="adExpand-left originUI-borderColor inline">
					<a href="/administrator/Origin/ad/edit/{{ad.OriginAd.id}}" class="adExpand-creator adExpand-button originUI-bgColor originUI-shadow originUI-borderColor originUI-bgHover">
						<div class="adExpand-itemMeta">
							<div class="adExpand-itemTitle">Edit</div>
						</div>		
					</a>
					<a href="javascript:void(0)" class="adExpand-embed adExpand-button originUI-bgColor originUI-shadow originUI-borderColor originUI-tileHover originUI-hover" data-ng-click="modal('embed')">
						<div class="adExpand-itemMeta">
							<div class="adExpand-itemTitle">Publish</div>
						</div>		
					</a>
					<a href="javascript:void(0)" class="adExpand-demo adExpand-button originUI-bgColor originUI-shadow originUI-borderColor originUI-tileHover originUI-hover" data-ng-click="modal('demo')">
						<div class="adExpand-itemMeta">
							<div class="adExpand-itemTitle">Ad Demo Pages</div>
						</div>		
					</a>
					<a href="javascript:void(0)" class="adExpand-metrics adExpand-button originUI-bgColor originUI-shadow originUI-borderColor originUI-tileHover originUI-hover" data-ng-click="adMetricsOpen(ad.OriginAd)">
						<div class="adExpand-itemMeta">
							<div class="adExpand-itemTitle">Metrics</div>
						</div>		
					</a>
				</div>
				<div class="adExpand-right inline">
					<img class="adExpand-image" data-ng-src="{{ad.OriginAd.backgroundImage}}"/>
				</div>
			</div>
		</div>
	</div>
	<p class="originUI-filterEmpty" data-ng-hide="filteredAds.length || !ads.length">No results</p>
	
	<!-- Modal -->
	<script type="text/ng-template" id="modal">
		<form id="adList-{{modalScope.id}}" name="modalForm" class="originUI-bgColor originUI-shadow" novalidate>
			<h3 class="originUI-tileHeader originUI-borderColor originUI-textColor">{{modalScope.header}}</h3>
			<div id="{{modalScope.id}}" class="originUI-tileContent" data-ng-class="{'modalExpand': originAdmin}" data-ng-include src="modalScope.template">
			</div>
			<div class="originUI-tileFooter">
				<button id="" class="originUI-tileCancel originUI-bgHover originUI-button originUI-bgColorSecondary" data-ng-click="cancel()">{{modalScope.button.cancel}}</button>
				<button id="" class="originUI-tileSubmit originUI-bgHover originUI-button originUI-bgColorSecondary" data-ng-click="submit()" data-ng-disabled="modalForm.$invalid">{{modalScope.button.submit}}</button>
				<div class="clear"></div>
			</div>
		</form>
	</script>
<?php
/*	
	<div modal="modalDemo" close="adDemoClose()" options="originModalOptions">
		<form id="modal-demo" class="originUI-bgColorSecondary originUI-modal">
			<h3 id="modalDemo-header" class="originUI-tileHeader originUI-borderColor originUI-textColor">Ad Demo Pages</h3>
			<div class="originUI-modalContent">
				<div class="nano" nanoscroller>
					<div class="nano-content">
						<ul id="modalDemo-demos" class="originUI-list">
							<li class="modalDemo-demo originUI-hover originUI-listHover" data-ng-repeat="demo in demos">
								<a href="/administrator/demo/edit/{{demo.OriginDemo.alias}}" class="inline originUI-hover modalDemo-demoEdit" target="_blank" data-ng-hide="demo.OriginDemo.name === 'Origin Demo Page (default)'">Edit</a><!--
								--><a href="/demo/{{demo.OriginDemo.alias}}" class="inline modalDemo-demoLink" target="_blank">{{demo.OriginDemo.name}}</a><!--
								--><a href="javascript:void(0)" class="inline originUI-hover modalDemo-demoRemove originUI-superAdmin" data-ng-click="adDemoRemove(demo)" data-ng-hide="demo.OriginDemo.name === 'Origin Demo Page (default)'">remove</a>
							</li>
						</ul>
						<p class="originUI-filterEmpty" data-ng-hide="demos.length">No demo pages</p>
					</div>
				</div>
			</div>
			<div class="originUI-tileFooter">
				<div class="originUI-tileFooterLeft originUI-hover" data-ng-click="adDemoClose()">Close</div>
				<a href="/administrator/demo/create/{{demos.id}}" target="_blank" class="originUI-tileFooterRight originUI-hover">Create New Ad Demo</a>
			</div>
		</form>
	</div>
*/
?>
<?php
	echo $this->Minify->css(array('creator/adList', 'plugins/codemirror', 'plugins/codemirror/night'));
	echo $this->Minify->script(array('plugins/angular/ui/ui-codemirror', 'plugins/codemirror/codemirror', 'plugins/codemirror/xml', 'plugins/codemirror/javascript', 'plugins/codemirror/css', 'plugins/codemirror/htmlmixed', 'creator/list/adListController', 'creator/list/adListDirectives', 'creator/list/adListServices'));	
?>