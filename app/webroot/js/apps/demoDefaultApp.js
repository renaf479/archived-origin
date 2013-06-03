'use strict';

var demoDefaultApp = angular.module('demoDefaultApp', [])
					.run(function($rootScope, $compile) {
						var placement;
						$rootScope.origin_ad 	= angular.fromJson(_config);
						$rootScope.embedOptions = {
							auto: 	0,
							close:	0,
							hover:	0,
							id:		$rootScope.origin_ad.OriginAd.id,
							type:	$rootScope.origin_ad.OriginAd.type
						};
						
						//Guess placement based on type
						switch($rootScope.origin_ad.OriginAd.type) {
							case 'eclipse':
							case 'singularity':
								placement	= 'embedLeaderboard';
								break;
							case 'nova':
								placement	= 'embedSidebar';
								break;
							case 'antemeridian':
							case 'horizon':
							case 'postmeridian':
								placement	= 'embedOutOfPage';
								break;
						}
						
						$rootScope[placement]	= $compile(decodeURIComponent(origin_embed.replace(/\+/g, ' ')))($rootScope);
					});
