var originIframe = (function() {
	
	return {
		init: function(type) {
			var embed		= document.createElement('script'),
				originParams= JSON.parse(decodeURIComponent(window.name));
				
				embed.id	= 'originEmbed-'+originParams.id;
				embed.type	= 'text/javascript';
				embed.src	= 'http://'+originParams.originDomain+'/min-js?f=/js/ad/origin.js';
				
			switch(originParams.dcopt) {
				case 'false':
					frameElement.parentNode.insertBefore(embed, frameElement);
					frameElement.style.display = 'none';
					break;
				case 'true':
					window.top.document.body.appendChild(embed);
					break;
			}
			
			
			window.top.document.getElementById('originEmbed-'+originParams.id).addEventListener('load', function() {
				new window.top.origin({
					auto: 	originParams.auto,
					close: 	originParams.close,
					//hover: 	originParams.hover,
					hex:	originParams.hex,
					dcopt: 	originParams.dcopt,
					id:		originParams.id,
					template:originParams.type,
					domain:	originParams.originDomain
				});
			}, false);
			
			
			
/*
			(function() {
				var originOptions = {
					auto: 	originParams.auto,
					close: 	originParams.close,
					hover: 	originParams.hover,
					dcopt: 	originParams.dcopt,
					id:		originParams.id,
					template:originParams.type,
					domain:	originParams.originDomain
				};
				if(window.origin) {
					if(typeof origin == 'function') {
						new origin(originOptions);
					} else {
						origin.push(originOptions);
					}
				} else {
					window.top.origin = [originOptions];
					s = document.createElement('script');
					s.type='text/javascript';
					s.async=true;
					s.src='http://local.evolveorigin/js/ad/origin.js';
					s.id = 'originEmbed-'+originOptions.id;
					//s1 = document.getElementsByTagName('script')[0];
					s1 = frameElement;
					s1.parentNode.insertBefore(s, s1);
				}
			})();
*/
		}
	}
})();