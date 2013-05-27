'use strict';

var demoPublicApp = angular.module('demoPublicApp', [])
					.run(function($rootScope, $compile) {
						$rootScope.demo 			= angular.fromJson(_config);
						$rootScope.embedOptions 	= $rootScope.demo.OriginDemo.config.embedOptions;
						$rootScope.placements		= {};
						$rootScope.demo.template	= '/administrator/get/templates/'+$rootScope.demo.OriginDemo.config.templateAlias;
						
						$rootScope.reskin = {
							backgroundColor:	$rootScope.demo.OriginDemo.config.reskin_color,
							reskin_img:			$rootScope.demo.OriginDemo.config.reskin_img
						}
						
						$rootScope.demoAdTags = function() {
							var adTags	= angular.element(document.body).find('adTag');
							
							for(var i = 0; i < adTags.length; i++) {
								$rootScope.placements[i] = {
									id: 	angular.element(adTags[i]).attr('id'),
									name:	angular.element(adTags[i]).data('name')
								};
							}
							
							//$rootScope['embedLeaderboard']	= '<scri'+'pt>console.log("test");</scri'+'pt>';
							$rootScope[$rootScope.demo.OriginDemo.config.placement]	= $compile(decodeURIComponent(origin_embed.replace(/\+/g, ' ')))($rootScope);
						}
					});
