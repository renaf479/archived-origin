var originScript, originParams, originXd;
    
(function() {
	var originParams,
		originDOM	= document;
	
	if(window.origin) {
		if(typeof origin !== 'function') {
			originParams = origin;
		} else {
			return
		}
	}
	
	window.origin = function(originParams) {
		function template() {
			var ad 				= document.createElement('iframe');
				ad.name			= encodeURIComponent(JSON.stringify(originParams));
				ad.id			= 'originAd-'+originParams.id;
				ad.frameBorder	= 0;
				ad.width		= 0;
				ad.height		= 0;
				ad.scrolling 	= 'no';
				//ad.style.backgroundColor = originParams.hex;
				ad.name			= encodeURIComponent(JSON.stringify(originParams));
				ad.src			= originParams.src;
				
			var adOverlay 				= document.createElement('iframe');
				adOverlay.name			= encodeURIComponent(JSON.stringify(originParams));
				adOverlay.id			= 'originAd-'+originParams.id+'-overlay';
				adOverlay.frameBorder	= 0;
				adOverlay.width			= 0;
				adOverlay.height		= 0;
				adOverlay.scrolling 	= 'no';
				adOverlay.style.position= 'fixed';
				adOverlay.style.top 	= 0;
				adOverlay.style.left	= 0;
				adOverlay.style.zIndex	= 10000000;
				adOverlay.name			= encodeURIComponent(JSON.stringify(originParams));
				adOverlay.setAttribute('data-src', originParams.src+'/triggered');
				
				switch(originParams.type) {
					case 'ascension':
					case 'horizon':
						originDOM.body.insertBefore(ad, originDOM.body.firstChild);
						break;
					case 'postmeridian':
					case 'nova':
						originScript.parentNode.insertBefore(ad, originScript);
						originScript.parentNode.insertBefore(adOverlay, originScript);
						break;
					default:
						originScript.parentNode.insertBefore(ad, originScript);
						break;
				}
		}
		
		/**
		* Adds Origin's XD listener script - Used to toggle the unit states
		*/
		function xd() {
			if(!document.getElementById('origin-xd')) {
				var originScriptXd		= originDOM.createElement('script');
					originScriptXd.id	= 'origin-xd';
					originScriptXd.src	= originXd;
					originScriptXd.setAttribute('data-domain', originParams.originDomain);
					originDOM.getElementsByTagName('head')[0].appendChild(originScriptXd);
			}
		}
	
		/**
		* Code to render an Origin ad unit
		*/
		function init(data) {			
			var mobile = (/iphone|ipod|ipad|android/i.test(navigator.userAgent.toLowerCase())),
				platform = 'Desktop';
			if(mobile) {
				if(data.platforms.mobile && (((navigator.userAgent.search('Android') > -1) && (navigator.userAgent.search('Mobile') > -1)) || ((navigator.userAgent.search('iPhone') > -1) || (navigator.userAgent.search('iPod') > -1)))) {
					platform = 'Mobile';
				} else if(data.platforms.tablet && (((navigator.userAgent.search('Android') > -1) && !(navigator.userAgent.search('Mobile') > -1)) || (navigator.userAgent.search('iPad') > -1))) {
					platform = 'Tablet';
				}
			}
			
			originParams = {
				'auto':		data.auto,
				'close':	data.close,
				'type':		data.template,
				'dcopt':	data.dcopt,
				'dfp':		data.dfp,
				'id':		data.id,
				'src':		'http://'+data.domain+'/ad/'+data.id+'/'+platform,
				'originDomain':data.domain,
				'xdSource':	document.location.href
			};
			
			originScript 	= document.getElementById('originEmbed-'+originParams.id);
			originXd		= (data.debug === 'true')? 'http://'+data.domain+'/js/ad/origin-xd.js':'http://'+data.domain+'/min-js?f=/js/ad/origin-xd.js';
			if(top === self) {				
				xd();
				template();
			} else {
				//Is iframe in same domain?
				var sameOrigin;
				try {
				    sameOrigin = window.parent.location.host == window.location.host;
				} catch (e) {
				    sameOrigin = false;
				}
				
				if(sameOrigin) {
					//Friendly iframe method
					originDOM					= window.parent.document;
					originScript 				= frameElement;
					
					if(originParams.dcopt !== 'true') {
						frameElement.style.display 	= 'none';
					}
					
					xd();
					template();
				} else {
					//Iframe buster method
					if(originParams.dcopt === 'true') {
						var iframe					= document.createElement('iframe');
							iframe.name 			= encodeURIComponent(JSON.stringify(originParams));
							iframe.src				= 'http://'+document.referrer.split('/')[2]+'/' + 'emcOriginIframe/origin-iframe.html';
							iframe.style.display	= 'none';
							document.body.appendChild(iframe);
					} else {
						window.name 		= encodeURIComponent(JSON.stringify(originParams));
						window.location 	= 'http://'+document.referrer.split('/')[2]+'/' + 'emcOriginIframe/origin-iframe.html';
					}	
				}
				
			}
		};
		return init(originParams);
	}
	if(originParams) {
		while(originParams.length) {
			new origin(originParams.shift());
		}
	}
})();

//if(originParams.init === 'true') origin.init();