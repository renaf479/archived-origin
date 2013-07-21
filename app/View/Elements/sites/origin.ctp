
	<div id="bar" class="originAurora">
		<div id="logo"></div>
	</div>
	<div id="demo-reskin" back-img='{{demo.reskin_img}}' ng:style="reskin">
		<div id="wrapper" class="originAurora">
			<div class="embedLeaderboard">
				<span class="advertisementLabel">advertisement</span>
				<adTag data-name="Leaderboard" id="embedLeaderboard" class="embedAd" ng:bind-html-unsafe="embedLeaderboard"></adTag>
				<img src="http://placehold.it/970x66" ng:show="!embedLeaderboard"/>
			</div>
			
			<div id="left">
				<img id="header" src="/img/_sites/origin/header.png"/>
				<div class="article even">
					<img class="article-thumbnail" src="/img/_sites/origin/placeholder-article-1.jpg"/>
					<div class="article-blurb">
						<h2 class="article-title">About Origin</h2>
						<p>Origin has served over 150 million ad impressions per year, generating millions in saved expenses and collected serving fees. It is highly scalable platform, compatible with the multitude of site layouts in our network.</p>
					</div>
				</div>
				<div class="article odd">
					<img class="article-thumbnail" src="/img/_sites/origin/placeholder-article-2.jpg"/>
					<div class="article-blurb">
						<h2 class="article-title">Origin Branding</h2>
						<p>Origin is a rich media ad creation and publishing suite. Custom built internally, it serves as our central hub that showcases our product line, intuitive ad creator and seamless demo creation tool. </p>
					</div>
				</div>
				<div class="article even">
					<img class="article-thumbnail" src="/img/_sites/origin/placeholder-article-3.jpg"/>
					<div class="article-blurb">
						<h2 class="article-title">Origin Technology</h2>
						<p>Origin is built with the CakePHP primarily for the MVC framework. We implemented custom routing based on our Akamai caching setup, RESTful API and custom templates. Origin utilizes AngularJS as the main Javascript framework.</p>
					</div>
				</div>
				<div class="article odd">
					<img class="article-thumbnail" src="/img/_sites/origin/placeholder-article-4.jpg">
					<div class="article-blurb">
						<h2 class="article-title">Origin Ads</h2>
						<p>Each Origin ad unit has the option of displaying a unique creative targeted to Desktop, Tablet or Mobile platforms. The creative delivered are catered to each individual platform, optimizing the load bandwidth required.</p>
					</div>
				</div>
				<div class="clear"></div>
			</div><!--
			--><div id="right">
				<div class="embedSidebar">
					<span class="advertisementLabel">advertisement</span>
					<adTag data-name="Sidebar" id="embedSidebar" class="embedAd" ng:bind-html-unsafe="embedSidebar"></adTag>
					<img src="http://placehold.it/300x600" ng:show="!embedSidebar"/>
				</div>
			</div>
		
		</div>
		<?php echo $this->element('footer');?>
		
		<adTag data-name="Out of Page" id="embedOutOfPage" ng:bind-html-unsafe="embedOutOfPage"></adTag>
	</div>
<?
	echo $this->Minify->css(array('demo/origin'));