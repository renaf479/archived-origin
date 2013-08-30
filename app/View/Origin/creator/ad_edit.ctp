<div id="ad-edit" data-ng-controller="creatorEditController" data-ng-init="init()" data-ng-cloak>
	<script type="text/javascript">

		var origin_ad = '<?php echo $origin_ad;?>';
	</script>
	<div id="title-bar" class="originUI-bgColor originUI-borderColor">
		<h1 id="titlebar-title" class="originUI-textColor">{{originAd.name}}</h1>
	</div>
	
	<?php
	/**
	* Panel
	*/
	?>
	<div id="panel" class="originUI-bgColorSecondary originUI-borderColor">
		
		<accordion id="">
			<accordion-group heading="Assets" class="panel-accordion">
			</accordion-group>
			<accordion-group heading="Components" class="panel-accordion">
				<ul class="originUI-list">
					<li data-ng-repeat="component in components">{{component.OriginComponent.name}}</li>
				</ul>
			</accordion-group>
			<accordion-group heading="Layers" class="panel-accordion">
			</accordion-group>
			<accordion-group heading="Properties" class="panel-accordion">
			</accordion-group>
			<accordion-group heading="Scripts" class="panel-accordion">
			</accordion-group>
		</accordion>
		
		
		
		
	</div>
	<div id="workspace-bar" class="originUI-bgColorSecondary originUI-borderColor">
	
	</div>
	<div id="adEdit-workspace" class="originUI-bgColor originUI-bgTexture">
		<div id="workspace" workspace>
			<workspace-content data-ng-repeat="content in originAdSchedule[ui.schedule]['OriginAd'+ui.platform+ui.state+'Content']" data-ng-model="content" double-click="creatorModalOpen('content', '', content)"></workspace-content>
		</div>
	</div>
</div>

<?php
	echo $this->Minify->css(array('creator/edit', 'plugins/codemirror/night', 'plugins/jquery-ui.min'));
	echo $this->Minify->script(array('plugins/angular/bootstrap', 'plugins/codemirror/codemirror', 'plugins/codemirror/xml', 'plugins/codemirror/javascript', 'plugins/codemirror/css', 'plugins/codemirror/htmlmixed', 'plugins/jquery-ui.min', 'plugins/jquery-touch', 'plugins/jquery.kinetic.min', 'creator/edit/creatorEditController', 'creator/editor/creatorDirectives'));
	
?>