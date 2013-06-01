<div id="ad-list" ng:controller="listController" class="">
	<h2 class="originUI-header">Ad Manager</h2>
	<div id="adList-left" class="inline">
		<div class="adList-item originUI-bgColor originUI-shadow originUI-borderColor inline" ng:repeat="ad in ads|filter:searchOrigin" ng:class="{'adList-itemActive': ad.OriginAd.id == module.id}" ng:animate="'originUI-fade'">		
			<div class="adList-itemMeta">
				<div class="adList-itemId">{{ad.OriginAd.id}}</div>
				<div class="adList-itemName originUI-borderColor">{{ad.OriginAd.name}}</div>
				<div class="adList-itemDetails">
					<div class="adList-itemModify">Last Modified {{ad.OriginAd.modify_date}} by {{ad.OriginAd.modify_by}}</div>
					<div class="adList-itemCreate">Created {{ad.OriginAd.create_date}} by {{ad.OriginAd.create_by}}</div>
				</div>
				<div class="adList-itemType">{{ad.OriginAd.config.template}}</div>
			</div>
			<a href="/administrator/Origin/ad/edit/{{ad.OriginAd.id}}" class="adList-itemLink"></a>
			<img class="adList-itemImage" ng:src="{{ad.OriginAd.content.img_thumbnail}}"/>
			<div class="adList-itemLookUp" ng:click="loadModule(ad)"></div>
		</div>
	</div><!--
	--><div id="adList-right" class="inline">
		<a href="javascript:void(0)" id="adList-create" class="originUI-shadow" ng:click="adCreate()">Create New Ad</a>
		<div id="adList-module" class="originUI-bgColor originUI-shadow">
			<h3 id="adList-moduleHeader" class="originUI-tileHeader originUI-borderColor originUI-textColor">Ad Details</h3>
			<a href="javascript:void(0)" id="adList-moduleRemove" class="originUI-hover originUI-superAdmin" ng:click="adRemove()">remove</a>
			<div class="originUI-tileContent">
				<a href="/administrator/Origin/ad/edit/{{module.id}}" id="adList-moduleAdHeader" class="inline">{{module.name}}</a>
				<a href="javascript:void(0)" id="adList-moduleAdShowcase" ng:click="adShowcase()" class="inline originUI-hover originUI-superAdmin" ng:class="(module.showcase == 1)? 'showcase': ''">showcase</a>
				<img id="adList-moduleAdThumbnail" ng:src="{{module.content.img_thumbnail}}" ng:show="module.content.img_thumbnail"/>
				<span class="adList-moduleAdDetails">Last Modified {{module.modify_date}} by {{module.modify_by}}</span>
				<span class="adList-moduleAdDetails">Created {{module.create_date}} by {{module.create_by}}</span>
				<!-- <h4>Metrics</h4> -->
				<h4 id="adList-moduleEmbedHeader" class="originUI-borderColorSecondary" ng:click="embedCreate()">Generate Embed</h4>
				<a href="/administrator/demo/create/{{module.id}}" id="adList-moduleDemoHeader" class="originUI-borderColorSecondary" target="_blank">Demo Creator</a>
				<ul id="adList-moduleDemoList" class="originUI-list">
					<!-- <li class="originUI-listItem"><a href="/demo/Origin/{{module.id}}" -->
					<li class="adList-moduleDemoListItem originUI-hover originUI-listHover" ng:repeat="demo in demos">
						<a href="/administrator/demo/edit/{{demo.OriginDemo.alias}}" class="inline originUI-hover adList-moduleDemoListEdit" target="_blank">Edit</a><!--
						--><a href="/demo/{{demo.OriginDemo.alias}}" class="inline adList-moduleDemoListLink" target="_blank">{{demo.OriginDemo.name}}</a><!--
						--><a href="javascript:void(0)" class="inline originUI-hover adList-moduleDemoListDelete originUI-superAdmin" ng:click="demoRemove(demo)">delete</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	
	
	<div modal="originModal" close="$parent.originModalClose()" options="$parent.originModalOptions">
		<form id="adList-modal" name="adListModal" class="originUI-bgColorSecondary originUI-modal adList-modal{{editor.type}}" novalidate>
			<input type="hidden" name="uploadDir" value="/assets/creator/tmp/"/>
			<h3 id="adList-modalHeader" class="originUI-tileHeader originUI-borderColor originUI-textColor">{{editor.header}}</h3>
			<div id="adSettings-modal" class="originUI-modalContent" ng:class="{'adList-moduleAdvance': editor.advance==true}">
				<div ng:show="editor.type=='create'">
					<div class="originUI-modalLeft"><?php echo $this->element('form_setting', array('view'=>'left'));?></div>
					<div class="originUI-modalRight"><?php echo $this->element('form_setting', array('view'=>'right'));?></div>
					<div class="clear"></div>
				</div>
				<div ng:show="editor.type=='embed'"><?php echo $this->element('form_embed');?></div>	
			</div>
			<div class="originUI-tileFooter">
				<div class="originUI-tileFooterLeft originUI-hover" ng:click="$parent.originModalClose()">Cancel</div>
				<button class="originUI-tileFooterRight originUI-hover" ng:click="adCreateSave()" ng:show="editor.type=='create'" ng-disabled="adListModal.$invalid">Save</button>
<!-- 				<button class="originUI-tileFooterRight" ng:click="embedEmail()" ng:show="editor.type=='embed'" ng-disabled="adList-modal.$invalid">Email</button> -->
			</div>
		</form>
	</div>
</div>
<?php
	echo $this->Minify->script(array('controllers/listController'));
?>