<div id="demo-reskin" back-img='{{demo.reskin_img}}' ng:style="reskin">
	<?php echo $this->element('bar');?>
	
	<div class="embedLeaderboard">
		<span class="originDemo-advertisement">advertisement</span>
		<adTag data-name="Leaderboard" id="embedLeaderboard" class="embedAd" ng:bind-html-unsafe="embedLeaderboard"></adTag>
		<img src="http://placehold.it/970x66" ng:show="!embedLeaderboard"/>
	</div>
	<div id="originDemo-feature" class="originUI-borderColor"></div>
	
	<div id="originDemo-wrapper" class="originUI-bgColor">
		
		<div id="originDemo-left"></div>
		<div id="originDemo-right">		
			<div class="embedSidebar">
				<span class="originDemo-advertisement">advertisement</span>
				<adTag data-name="Sidebar" id="embedSidebar" class="embedAd" ng:bind-html-unsafe="embedSidebar"></adTag>
				<img src="http://placehold.it/300x250" ng:show="!embedSidebar"/>
			</div>
		</div>
		<?php echo $this->element('footer');?>
	</div>
	<adTag data-name="Out of Page" id="embedOutOfPage" ng:bind-html-unsafe="embedOutOfPage"></adTag>
</div>
<?
	echo $this->Minify->css(array('origin', 'demo/originDemo'));