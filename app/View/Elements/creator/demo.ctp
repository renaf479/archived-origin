<div data-ng-controller="demoController" data-ng-init="demoInit()">
	<ul class="originUI-list">
		<li class="originUI-listItem demo-listItem" data-ng-repeat="demo in demos">
			<span class="demo-listItem originUI-listItemLink originUI-bgHover">
				<a href="/administrator/demo/edit/{{preview.OriginDemo.alias}}" class="demo-edit" target="_blank" data-ng-if="demo.OriginDemo.modify_date">edit</a>
				<a href="/demo/{{preview.OriginDemo.alias}}" class="demo-title" target="_blank">{{demo.OriginDemo.name}}</a>
				<span class="demo-remove" data-ng-if="demo.OriginDemo.modify_date" data-ng-click="remove(demo.OriginDemo)">remove</span>
				<timestamp class="demo-timestamp" date="{{demo.OriginDemo.modify_date}}" data-ng-if="demo.OriginDemo.modify_date"></timestamp>
			</span>
		</li>
	</ul>
</div>
<script type="text/javascript">
	var demoController = function($scope, Rest, Notification) {
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
		
		//Remove demo site
		$scope.remove = function(model) {
			var ask = confirm('Do you want to remove this demo page?');
			if(ask) {
				var post = {
					route:			'demoDelete',
					id:				model.id,
					origin_ad_id:	model.origin_ad_id
				}
				Rest.post(post).then(function(response) {
					Notification.alert('Demo page removed');
					$scope.demos = response;
				});
			} else {
				return false;
			}
		}
	}
</script>