<div id="ad-list" ng:controller="adListController">
	<div id="ad-header">
		<h2 class="originUI-header">Ad Manager</h2>
		<a href="javascript:void(0)" id="ad-create" class="originUI-shadow originUI-borderColor originUI-bgColor" ng:click="adCreateOpen()">Create New Ad</a>
	</div>
	<div>
		<div class="ad-wrapper inline" ng:repeat="ad in filteredAds = (ads|filter:searchOrigin)" ng:animate="'originUI-fade'" ng:class="{'originUI-expand': (adShow === ad.OriginAd.id)}">
			<div id="OriginAd-{{ad.OriginAd.id}}" class="ad-tile originUI-bgColor originUI-shadow originUI-borderColor originUI-expandItem" ad ng:click="adExpand(ad.OriginAd)">
				<img src="/img/logo-small.png" class="adTile-watermark"/>
				<span class="adTile-id">{{ad.OriginAd.id}}</span>
				<span class="adTile-template">{{ad.OriginAd.type}}</span>
				<span class="adTile-name originUI-borderColor">{{ad.OriginAd.name}}</span>
				<div class="adTile-meta">
					<span class="adTile-create">Created {{ad.OriginAd.create_date}} by {{ad.OriginAd.create_by}}</span>
					<span class="adTile-modify">Last Modified {{ad.OriginAd.modify_date}} by {{ad.OriginAd.modify_by}}</span>
				</div>
			</div>
			<div class="ad-expand originUI-expandWrapper originUI-bgColor originUI-borderColor originUI-bgTexture" ng:show="adShow === ad.OriginAd.id" ng:hide="adShow !== ad.OriginAd.id">
				<a href="javascript:void(0)" class="originUI-expandClose originUI-hover" ng:click="adClose(ad.OriginAd)">close</a>
				<h3 class="adExpand-name">{{ad.OriginAd.name}}</h3>
				
				<div class="adExpand-left inline">
					<a href="/administrator/Origin/ad/edit/{{ad.OriginAd.id}}" class="adExpand-creator originUI-bgColorSecondary originUI-shadow originUI-borderColor">
						<div class="adExpand-itemMeta">
							<div class="adExpand-itemTitle">Ad Creator</div>
						</div>		
					</a>
					<a href="javascript:void(0)" class="adExpand-embed originUI-bgColorSecondary originUI-shadow originUI-borderColor" ng:click="adEmbedOpen(ad.OriginAd)">
						<div class="adExpand-itemMeta">
							<div class="adExpand-itemTitle">Embed Code Creator</div>
						</div>		
					</a>
					<a href="javascript:void(0)" class="adExpand-demo originUI-bgColorSecondary originUI-shadow originUI-borderColor">
						<div class="adExpand-itemMeta">
							<div class="adExpand-itemTitle">Ad Demo Creator</div>
						</div>		
					</a>
	<!--
					<a href="javascript:void(0)" target="blank" class="adExpand-metrics originUI-bgColorSecondary originUI-shadow originUI-borderColor">
						<div class="adExpand-itemMeta">
							<div class="adExpand-itemTitle originUI-borderColor">Ad Metrics</div>
						</div>		
					</a>
	-->
				</div>
				<?php 
				/*
				<div class="adExpand-center inline originUI-borderColor">
					<a href="/administrator/demo/create/{{ad.OriginAd.id}}" target="blank" class="adExpand-demo originUI-bgColorSecondary originUI-shadow originUI-borderColor">
						<div class="adExpand-itemMeta">
							<div class="adExpand-itemTitle originUI-borderColor">Demo Creator</div>
							<div class="adExpand-itemDescription">Create a demo page</div>
						</div>		
					</a>
					<ul class="originUI-list">
						<li class="originUI-hover originUI-listHover" ng:repeat="demo in demos">
							<a href="/administrator/demo/edit/{{demo.OriginDemo.alias}}" class="inline originUI-hover adList-moduleDemoListEdit" target="_blank">Edit</a><!--
							--><a href="/demo/{{demo.OriginDemo.alias}}" class="inline adList-moduleDemoListLink" target="_blank">{{demo.OriginDemo.name}}</a><!--
							--><a href="javascript:void(0)" class="inline originUI-hover adList-moduleDemoListDelete originUI-superAdmin" ng:click="demoRemove(demo)">delete</a>
						</li>
					</ul>
					<p class="originUI-filterEmpty" ng:hide="demos.length">No demo pages</p>
				</div>
				*/
				?>
				<div class="adExpand-right originUI-borderColor inline">
					<img class="adExpand-image" ng:src="{{backgroundImage}}"/>
				</div>
			</div>
		</div>
	</div>
	<p class="originUI-filterEmpty" ng:hide="filteredAds.length || !ads.length">No results</p>
	
	
	
	<div modal="modalEmbed" close="adEmbedClose()" options="originModalOptions">
		<form id="modal-embed" class="originUI-bgColorSecondary originUI-modal">
			<h3 id="embedModal-header" class="originUI-tileHeader originUI-borderColor originUI-textColor">Ad Embed Code</h3>
			<div class="originUI-modalContent">
				<iframe src="/administrator/Origin/ad/embed/{{adEmbedParams.id}}/{{adEmbedParams.type}}" frameborder="0" scrolling="no" width="100%" height="100%"></iframe>
			</div>
			<div class="originUI-tileFooter">
				<div class="originUI-tileFooterLeft originUI-hover" ng:click="adEmbedClose()">Close</div>
				<div class="originUI-tileFooterRight originUI-hover" ng:click="adEmbedEmail()">Email Code</div>
			</div>
		</form>
	</div>
	
	<div modal="modalEmbed" close="adEmbedClose()" options="originModalOptions">
		<form id="modal-embed" class="originUI-bgColorSecondary originUI-modal">
			<h3 id="embedModal-header" class="originUI-tileHeader originUI-borderColor originUI-textColor">Ad Embed Code</h3>
			<div class="originUI-modalContent">
				<iframe src="/administrator/Origin/ad/embed/{{adEmbedParams.id}}/{{adEmbedParams.type}}" frameborder="0" scrolling="no" width="100%" height="100%"></iframe>
			</div>
			<div class="originUI-tileFooter">
				<div class="originUI-tileFooterLeft originUI-hover" ng:click="adEmbedClose()">Close</div>
				<div class="originUI-tileFooterRight originUI-hover" ng:click="adEmbedEmail()">Email Code</div>
			</div>
		</form>
	</div>
	
	<div modal="modalCreate" close="adCreateClose()" options="originModalOptions">
		<form id="modal-create" name="adCreateModal" class="originUI-bgColorSecondary originUI-modal" novalidate>
			<input type="hidden" name="uploadDir" value="/assets/creator/tmp/"/>
			<h3 id="adCreate-modalHeader" class="originUI-tileHeader originUI-borderColor originUI-textColor">Create Ad Unit</h3>
			<div id="adCreate-modal" class="originUI-modalContent" ng:class="{'adList-moduleAdvance': editor.advance==true}">
				<div class="originUI-modalLeft"><?php echo $this->element('form_setting', array('view'=>'left'));?></div>
				<div class="originUI-modalRight"><?php echo $this->element('form_setting', array('view'=>'right'));?></div>
				<div class="clear"></div>
			</div>
			<div class="originUI-tileFooter">
				<div class="originUI-tileFooterLeft originUI-hover" ng:click="adCreateClose()">Close</div>
				<button class="originUI-tileFooterRight originUI-hover" ng:click="adCreateSave()" ng-disabled="adCreateModal.$invalid">Create</button>
			</div>
		</form>
	</div>
	
	
	
</div>
<?php
	echo $this->Minify->script(array('adList/adListController', 'adList/adListDirectives', 'adList/adListServices'));
	echo $this->Minify->css(array('platform/adList'));
?>