<div id="demo-reskin" back-img='{{demo.reskin_img}}' ng:style="reskin">
	<div id="header"></div>
	<div id="wrapper">
		<div class="embedLeaderboard">
			<adTag data-name="Leaderboard" id="embedLeaderboard" ng:bind-html-unsafe="embedLeaderboard"></adTag>
			<img src="http://placehold.it/970x66" ng:show="!embedLeaderboard"/>
		</div>
		<div id="content">
			<div class="embedSidebar">
				<adTag data-name="Sidebar" id="embedSidebar" ng:bind-html-unsafe="embedSidebar"></adTag>
				<img src="http://placehold.it/300x250" ng:show="!embedSidebar"/>
			</div>	
		</div>
	</div>
	<adTag data-name="Out of Page" id="embedOutOfPage" ng:bind-html-unsafe="embedOutOfPage"></adTag>
</div>
<?
	echo $this->Minify->css(array('demo/thefashionspot'));