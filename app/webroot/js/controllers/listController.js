$j(function() {	
	var fixed = $j('#adList-right');
	
    $j(window).scroll(function () {
        if($j(this).scrollTop() > 10) {
            fixed.addClass('originUI-fixed');
        } else {
            fixed.removeClass('originUI-fixed');
        }
    });
});

var listController = function($scope, $filter, Origin) {
	$scope.ads			= {};
	$scope.demos		= {};
	$scope.editor		= {};
	$scope.editor.content = {}
	$scope.templates	= {};
	$scope.users		= {};
	$scope.embedOptions = {
		'auto':		0,
		/* 'bg':		'#000000', WHY IS THIS EVEN AN OPTION? */
		'close':	0,
		'hover':	0
	};
	
	Origin.get('templates').then(function(response) {
		$scope.templates		= response;
		//$scope.originCreator.form		= $scope.originCreator.templates[$scope.originCreator.index];
		
		Origin.get('ads').then(function(response) {
			$scope.ads 		= response.origin_ads;
			$scope.module	= $scope.ads[0].OriginAd;
			//console.log($scope.originCreator.list.origin_ads[0].Creator);
			
			$scope.refreshDemo();
			
		});
	});
	
	$scope.adCreate = function() {
		$scope.editor.advance 		= false;
		$scope.editor.content 		= {};
		$scope.editor.content.ga_id = 'UA-12310597-73';
		$scope.editor.content.img_thumbnail='';
		$scope.editor.header		= 'Create New Ad';
		$scope.editor.statusSwitch	= true;
		//$scope.editor.template 		= $scope.templates[0];
		$scope.editor.type			= 'create';
		$scope.$parent.originModalOpen();
		//$scope.editorModal = angular.copy(model.OriginTemplate);
	}
	
	$scope.adCreateSave = function() {
		$scope.editor.route				= 'adCreate';
		$scope.editor.status			= ($scope.editor.statusSwitch)? 1: 0;
		//$scope.editor.content.ga_id		= $scope.editor.ga_id;
		$scope.editor.type 				= $scope.editor.template.OriginTemplate.alias;
		$scope.editor.config			= $scope.editor.template.OriginTemplate.config;
		$scope.editor.config.template	= $scope.editor.template.OriginTemplate.alias;
		
		$scope.$parent.originModalClose();
		
		delete $scope.editor.advance;
		delete $scope.editor.ga_id;
		delete $scope.editor.header;
		delete $scope.editor.statusSwitch;
		delete $scope.editor.template;
		//delete $scope.editor.type;
				
		Origin.post($scope.editor).then(function(response) {
			window.location		= '/administrator/Origin/ad/edit/'+response;
		});
	}
	
	$scope.embedCreate = function() {
		$scope.editor = {
			header:	'Generate Embed Code',
			type:	'embed'
		}
		
		$scope.embedOptions.id		= $scope.module.id;
		$scope.embedOptions.type	= $scope.module.config.template;
		$scope.embedOptions.dcopt	= ($scope.module.config.type === 'outofpage')? 'true': 'false';
		$scope.$parent.originModalOpen();
	}
	
	$scope.loadModule = function(model) {
		//console.log(model);
		$scope.module 						= model.OriginAd;
		$scope.refreshDemo();
	}
	
	$scope.refreshDemo = function() {
		Origin.get('demo/'+$scope.module.id).then(function(response) {
			$scope.demos 	= response;
			//console.log($scope.originCreator.list.origin_ads[0].Creator);
		});
	}
	
	$scope.templateLoad = function() {
		$scope.editor.config= $scope.editor.template.OriginTemplate.config;
	}
	
	$scope.templateToggle = function() {
		switch($scope.editor.advance) {
			case false:
				$scope.editor.advance = true;
				break;
			case true:
				$scope.editor.advance = false;
				break;
		}
	}
	
	$scope.demoRemove = function(data) {
		var ask = confirm('Do you want to delete this demo page?');
		if(ask){
			data.OriginDemo.route		= 'demoDelete';
			
			Origin.post(data.OriginDemo).then(function(response) {
				$scope.$parent.notificationOpen('Demo page deleted', 'alert');
				$j('#actions-wrapper').fadeOut(200);
				
				$scope.demos 	= response;		
			});
		} else {
			return false;
		}
	}
	
	$scope.adRemove = function() {
		var ask = confirm('Do you want to delete this ad unit?');
		if(ask){
			$scope.module.route			= 'adDelete';
			
			Origin.post($scope.module).then(function(response) {
				$scope.$parent.notificationOpen('Ad Deleted', 'alert');
				$j('#actions-wrapper').fadeOut(200);
				
				$scope.ads 		= response.origin_ads;
				$scope.module	= $scope.ads[0].OriginAd;
				//console.log($scope.originCreator.list.origin_ads[0].Creator);
				
				$scope.refreshDemo();
				
			});
		} else {
			return false;
		}
	}
	
	$scope.adShowcase = function() {
		$scope.module.route		= 'adShowcase';
		switch($scope.module.showcase) {
			case '0':
				$scope.module.showcase	= '1';
				break;
			case '1':
				$scope.module.showcase	= '0';
				break;
		}
		
		Origin.post($scope.module).then(function(response) {
			$scope.$parent.notificationOpen('Showcase updated', 'alert');
			$j('#actions-wrapper').fadeOut(200);
			//$scope.ads 		= response.origin_ads;
			//$scope.module	= $scope.ads[0].OriginAd;
		});
	}
}