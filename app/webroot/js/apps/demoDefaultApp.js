'use strict';

var demoDefaultApp = angular.module('demoDefaultApp', [])
					.run(function($rootScope, $compile) {
						var placement;
						$rootScope.origin_ad 	= angular.fromJson(decodeURIComponent(_config));
						$rootScope.embedOptions = {
							auto: 	'false',
							close:	'false',
							hex:	'#000000',
							dcopt:	'false',
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
						
						var originEmbed	= decodeURIComponent(origin_embed.replace(/\+/g, ' '));
							originEmbed = originEmbed.replace(/{{embedOptions.id}}/g, $rootScope.embedOptions.id);
							originEmbed = originEmbed.replace(/{{embedOptions.auto}}/g, $rootScope.embedOptions.auto);
							originEmbed = originEmbed.replace(/{{embedOptions.close}}/g, $rootScope.embedOptions.close);
							originEmbed = originEmbed.replace(/{{embedOptions.hex}}/g, $rootScope.embedOptions.hex);
							originEmbed = originEmbed.replace(/{{embedOptions.dcopt}}/g, $rootScope.embedOptions.dcopt);
							originEmbed = originEmbed.replace(/{{embedOptions.type}}/g, $rootScope.embedOptions.type);
						
						$rootScope[placement]	= originEmbed;
					});
