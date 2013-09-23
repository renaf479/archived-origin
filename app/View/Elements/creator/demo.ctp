<div data-ng-controller="demoController" data-ng-init="demoInit()">
	<div id="demo-list" class="originUI-bgColorSecondary inline">
		<ul class="originUI-list">
			<li class="" data-ng-repeat="demo in demos" data-ng-click="select(demo)">{{demo.OriginDemo.name}}</li>
		</ul>
	</div><!--
	--><div id="demo-preview" class="inline">
		<img id="demoPreview-image" data-ng-src="/img/_sites/{{preview.OriginDemo.config.templateAlias}}/_preview.jpg"/>
		<a href="/demo/{{preview.OriginDemo.alias}}" class="demoPreview-button originUI-button inline originUI-bgColorSecondary originUI-bgHover" target="_blank">View</a><!--
		--><a href="/administrator/demo/edit/{{preview.OriginDemo.alias}}" class="demoPreview-button originUI-button inline originUI-bgColorSecondary originUI-bgHover" target="_blank" data-ng-if="!preview.OriginDemo.default">Edit</a><!--
		--><a href="javascript:void(0)" class="demoPreview-button originUI-button inline originUI-bgColorSecondary originUI-bgHover" data-ng-if="originAdmin">Remove</a>
	</div>
		
<!--
		<ul id="modalDemo-demos" class="originUI-list">
			<li class="modalDemo-demo originUI-hover originUI-listHover" data-ng-repeat="demo in demos">
				<a href="/administrator/demo/edit/{{demo.OriginDemo.alias}}" class="inline originUI-hover modalDemo-demoEdit" target="_blank" data-ng-hide="demo.OriginDemo.name === 'Origin Demo Page (default)'">Edit</a>
				<a href="/demo/{{demo.OriginDemo.alias}}" class="inline modalDemo-demoLink" target="_blank">{{demo.OriginDemo.name}}</a>
				<a href="javascript:void(0)" class="inline originUI-hover modalDemo-demoRemove originUI-superAdmin" data-ng-click="adDemoRemove(demo)" data-ng-hide="demo.OriginDemo.name === 'Origin Demo Page (default)'">remove</a>
			</li>
		</ul>
-->
	<p class="originUI-filterEmpty" data-ng-hide="demos.length">No demo pages</p>
</div>
<script type="text/javascript">
	var demoController = function($scope, Rest) {
		//Init
		$scope.demoInit = function() {
			//console.log($scope.originAd);
			Rest.get('demo/'+$scope.originAd.id).then(function(response) {
				$scope.demos 	= response;
				$scope.preview 	= $scope.demos[0];
				
				//console.log($scope.preview.OriginDemo.config);
				//console.log($scope.demos);
			});
		}
		
		
		$scope.select = function(model) {
			console.log(model);
		}
	}
</script>