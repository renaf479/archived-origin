'use strict';

var originAdApp = angular.module('originAdApp', ['originAd.directives', 'originAd.services'])
					.run(function($rootScope, $timeout, OriginAdService, serviceTimer, serviceToggle) {
						$rootScope.hiddenView				= 'triggered';
						$rootScope.origin_ad 				= angular.fromJson(origin_ad);
						$rootScope.originAd_id				= 'originAd-'+$rootScope.origin_ad.OriginAd.id;
						$rootScope.originAd_config			= angular.fromJson($rootScope.origin_ad.OriginAd.config);
						$rootScope.originAd_configContent	= angular.fromJson($rootScope.origin_ad.OriginAd.content);
						$rootScope.originAd_content			= {};
						$rootScope.originParams				= (window.name)? angular.fromJson(decodeURIComponent(window.name)): {
							auto: 0,
							close: 0,
							hover: .1,
							hex: '#000000'
						}; //Retrieve embed code params or use defaults
						$rootScope.xdData = {
							auto:		{},
							callback:	'containerInit',
							id:			'originAd-'+$rootScope.origin_ad.OriginAd.id,
							template:	$rootScope.originAd_config.template,
							width: 		$rootScope.originAd_config.dimensions.Initial[origin_platform].width+'px',
							height:		$rootScope.originAd_config.dimensions.Initial[origin_platform].height+'px'
						};
						
						//$rootScope.timeout	= ($rootScope.originParams.close > 0)? $rootScope.originParams.close: $rootScope.originAd_config.animations.closeDuration;
						
						//CHANGE THIS TO BE SET BY ORIGIN SYSTEM
						$rootScope.timeout	= ($rootScope.originParams.close > 0)? $rootScope.originParams.close: '15';
						
						/**
						* Loads the content based on the current date
						*/
						var currentDate	= new Date();
						
						for(i in $rootScope.origin_ad.OriginAdSchedule) {
							var startDate	= new Date($rootScope.origin_ad.OriginAdSchedule[i].start_date),
								endDate		= new Date($rootScope.origin_ad.OriginAdSchedule[i].end_date),
								date,
								endDate		= endDate.setDate(endDate.getDate() + 1);
							
							if(currentDate >= startDate && currentDate <= endDate) {
								$rootScope.originAd_content = $rootScope.origin_ad.OriginSchedule[i];
								date = true;
							}
						}
						
						if(!date) {
							$rootScope.originAd_content = $rootScope.origin_ad.OriginAdSchedule[0];
						}
												
						/**
						* XD listener for override methods from Origin Ad Iframe
						*/
						XD.receiveMessage(function(message) {
							try {
								JSON.parse(message.data);
							} catch(e) {
								return false;
							}
							message		= JSON.parse(message.data);
							
							switch(message.originAdAction) {
								case 'analytics':
									OriginAdService.analyticsLog(message.type, message.data);
									break;
								case 'timeout':
									$rootScope.timeout = message.timeout + 5;
									break;
								case 'timeouthide':
									serviceTimer.cancel();
									//$rootScope.countdownCancel();
									break;
								case 'toggle':
									serviceToggle[$rootScope.xdDataToggle.callback]();
									break;
							}
						}, 'http://'+$rootScope.originParams.originDomain);						
					});