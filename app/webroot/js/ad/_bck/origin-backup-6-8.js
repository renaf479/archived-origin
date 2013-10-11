/*
var scripts	= document.getElementsByTagName('script');
for(var i=0; i < scripts.length; i++) {
	var src	= scripts[i].getAttribute('src').split('&');
	var url	= src[0];
	var args = src[1];
	
	if(/originId/i.test(args)) {
		var pair	= args.split('=');
		var originId= pair[1];
	}
}

var originScript	= document.getElementById('originEmbed-'+originId);
var originParams 	= {
	'init':		originScript.getAttribute('data-init'),
	'auto':		originScript.getAttribute('data-auto'),
	'close':	originScript.getAttribute('data-close'),
	'hover':	originScript.getAttribute('data-hover'),
	'bg':		originScript.getAttribute('data-bg'),
	'type':		originScript.getAttribute('data-template'),
	'dcopt':	originScript.getAttribute('data-dcopt'),
	'id':		originScript.getAttribute('data-id'),
	'src':		'http://'+originScript.getAttribute('data-domain')+'/ad/'+originScript.getAttribute('data-id')+'/Desktop',
	'originDomain':originScript.getAttribute('data-domain'),
	'xdSource':	document.location.href
};
var originXd	= (originScript.getAttribute('data-debug') === 'true')? 'http://'+originParams.originDomain+'/js/ad/origin-xd.js':'http://'+originParams.originDomain+'/min-js?f=/js/ad/origin-xd.js';
*/
var originScript;
var originParams;
var originXd;

var origin = (function() {

	function template() {
		var ad 				= document.createElement('iframe');
			ad.name			= encodeURIComponent(JSON.stringify(originParams));
			ad.id			= 'originAd-'+originParams.id;
			ad.frameBorder	= 0;
			ad.width		= 0;
			ad.height		= 0;
			ad.scrolling 	= 'no';
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
				case 'horizon':
					//originScript.parentNode.insertBefore(ad, originScript);
					document.body.insertBefore(ad, document.body.firstChild)
					//document.body.appendChild(originCSS);
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
		if(!window.top.originXdFlag) {
			var originScriptXd		= document.createElement('script');
				originScriptXd.id	= 'origin-xd';
				originScriptXd.src	= originXd;
				originScriptXd.setAttribute('data-domain', originParams.originDomain);
				document.getElementsByTagName('head')[0].appendChild(originScriptXd);
		
			window.top.originXdFlag 	= true;		
		}
	}

	return {
		init: function(data) {
			originScript = document.getElementById('originEmbed-'+data.id);
			originParams = {
				'auto':		data.auto,
				'close':	data.close,
				'hover':	data.hover,
				'type':		data.template,
				'dcopt':	data.dcopt,
				'id':		data.id,
				'src':		'http://'+data.domain+'/ad/'+data.id+'/Desktop',
				'originDomain':data.domain,
				'xdSource':	document.location.href
			};
			originXd	= (data.debug === 'true')? 'http://'+data.domain+'/js/ad/origin-xd.js':'http://'+data.domain+'/min-js?f=/js/ad/origin-xd.js';
		
			if(top === self) {				
				xd();
				template();
			} else if(originParams.dcopt === 'true') {
				var iframe					= document.createElement('iframe');
					iframe.name 			= encodeURIComponent(JSON.stringify(originParams));
					iframe.src				= 'http://'+document.referrer.split('/')[2]+'/' + 'emcOriginIframe/emcOriginIframe.html';
					iframe.style.display	= 'none';
					document.body.appendChild(iframe);
			} else {
				window.name 		= encodeURIComponent(JSON.stringify(originParams));
				window.location 	= 'http://'+document.referrer.split('/')[2]+'/' + 'emcOriginIframe/emcOriginIframe.html';
			}
		}
	}
})();


console.log(origin);

//if(originParams.init === 'true') origin.init();