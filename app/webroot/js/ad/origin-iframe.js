var originIframe = (function() {
	
	return {
		init: function(type) {
			var embed		= document.createElement('script'),
				originParams= JSON.parse(decodeURIComponent(window.name));
				
				embed.id	= 'originEmbed-'+originParams.id;
				embed.type	= 'text/javascript';
				embed.src	= 'http://'+originParams.originDomain+'/min-js?f=/js/ad/origin.js';
				
			switch(originParams.dcopt) {
				default:
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
					dcopt: 	originParams.dcopt,
					id:		originParams.id,
					template:originParams.type,
					domain:	originParams.originDomain
				});
			}, false);
		}
	}
})();