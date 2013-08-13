//CrossDomain script
var XD=function(){var e,g,h=1,f,d=this;return{postMessage:function(c,b,a){b&&(a=a||parent,d.postMessage?a.postMessage(c,b.replace(/([^:]+:\/\/[^\/]+).*/,"$1")):b&&(a.location=b.replace(/#.*$/,"")+"#"+ +new Date+h++ +"&"+c))},receiveMessage:function(c,b){if(d.postMessage)if(c&&(f=function(a){if("string"===typeof b&&a.origin!==b||"[object Function]"===Object.prototype.toString.call(b)&&!1===b(a.origin))return!1;c(a)}),d.addEventListener)d[c?"addEventListener":"removeEventListener"]("message",f,!1);
else d[c?"attachEvent":"detachEvent"]("onmessage",f);else e&&clearInterval(e),e=null,c&&(e=setInterval(function(){var a=document.location.hash,b=/^#?\d+&/;a!==g&&b.test(a)&&(g=a,c({data:a.replace(b,"")}))},100))}}}();

//Anim
var anim=function(h){h=function(a,e,f,b){var g,d,c=[],j=function(a){if(a=c.shift())a[1]?h.apply(this,a).anim(j):0<a[0]?setTimeout(j,1E3*a[0]):(a[0](),j())};a.charAt&&(a=document.getElementById(a));if(0<a||!a)e={},f=0,j(c=[[a||0]]);q(e,{padding:0,margin:0,border:"Width"},[l,m,n,p]);q(e,{borderRadius:"Radius"},[l+p,l+m,n+m,n+p]);++r;for(g in e)d=e[g],!d.to&&0!==d.to&&(d=e[g]={to:d}),h.defs(d,a,g,b);h.iter(e,1E3*f,j);return{anim:function(){c.push([].slice.call(arguments));return this}}};var l="Top",
m="Right",n="Bottom",p="Left",r=1,q=function(a,e,f,b,g,d,c){for(b in a)if(b in e){c=a[b];for(g=0;d=f[g];g++)a[b.replace(e[b],"")+d+(e[b]||"")]={to:0===c.to?c.to:c.to||c,fr:c.fr,e:c.e};delete a[b]}},s=window.webkitRequestAnimationFrame||window.requestAnimationFrame||window.mozRequestAnimationFrame||window.msRequestAnimationFrame||window.oRequestAnimationFrame;h.defs=function(a,e,f,b,g){g=e.style;a.a=f;a.n=e;a.s=f in g?g:e;a.e=a.e||b;a.fr=a.fr||(0===a.fr?0:a.s==e?e[f]:(window.getComputedStyle?getComputedStyle(e,
null):e.currentStyle)[f]);a.u=(/\d(\D+)$/.exec(a.to)||/\d(\D+)$/.exec(a.fr)||[0,0])[1];a.fn=/color/i.test(f)?h.fx.color:h.fx[f]||h.fx._;a.mx="anim_"+f;e[a.mx]=a.mxv=r;e[a.mx]!=a.mxv&&(a.mxv=null)};h.iter=function(a,e,f){var b,g,d,c,h,k=+new Date+e;b=function(l){g=k-(l||(new Date).getTime());if(50>g){for(d in a)d=a[d],d.p=1,d.fn(d,d.n,d.to,d.fr,d.a,d.e);f&&f()}else{g/=e;for(d in a){d=a[d];if(d.n[d.mx]!=d.mxv)return;h=d.e;c=g;"lin"==h?c=1-c:"ease"==h?(c=2*(0.5-c),c=1-(c*c*c-3*c+2)/4):"ease-in"==h?(c=
1-c,c*=c*c):c=1-c*c*c;d.p=c;d.fn(d,d.n,d.to,d.fr,d.a,d.e)}s?s(b):setTimeout(b,20,0)}};b()};h.fx={_:function(a,e,f,b,g){b=parseFloat(b)||0;f=parseFloat(f)||0;a.s[g]=(1<=a.p?f:a.p*(f-b)+b)+a.u},width:function(a,e,f,b,g,d){0<=a._fr||(a._fr=!isNaN(b=parseFloat(b))?b:"width"==g?e.clientWidth:e.clientHeight);h.fx._(a,e,f,a._fr,g,d)},opacity:function(a,e,f,b,g){if(isNaN(b=b||a._fr))b=e.style,b.zoom=1,b=a._fr=(/alpha\(opacity=(\d+)\b/i.exec(b.filter)||{})[1]/100||1;b*=1;f=a.p*(f-b)+b;e=e.style;g in e?e[g]=
f:e.filter=1<=f?"":"alpha("+g+"="+Math.round(100*f)+")"},color:function(a,e,f,b,g,d,c,j){a.ok||(f=a.to=h.toRGBA(f),b=a.fr=h.toRGBA(b),0==f[3]&&(f=[].concat(b),f[3]=0),0==b[3]&&(b=[].concat(f),b[3]=0),a.ok=1);j=[0,0,0,a.p*(f[3]-b[3])+1*b[3]];for(c=2;0<=c;c--)j[c]=Math.round(a.p*(f[c]-b[c])+1*b[c]);(1<=j[3]||h.rgbaIE)&&j.pop();try{a.s[g]=(3<j.length?"rgba(":"rgb(")+j.join(",")+")"}catch(k){h.rgbaIE=1}}};h.fx.height=h.fx.width;h.RGBA=/#(.)(.)(.)\b|#(..)(..)(..)\b|(\d+)%,(\d+)%,(\d+)%(?:,([\d\.]+))?|(\d+),(\d+),(\d+)(?:,([\d\.]+))?\b/;
h.toRGBA=function(a,e){e=[0,0,0,0];a.replace(/\s/g,"").replace(h.RGBA,function(a,b,g,d,c,h,k,l,m,n,p,q,r,s,t){k=[b+b||c,g+g||h,d+d||k];b=[l,m,n];for(a=0;3>a;a++)k[a]=parseInt(k[a],16),b[a]=Math.round(2.55*b[a]);e=[k[0]||b[0]||q||0,k[1]||b[1]||r||0,k[2]||b[2]||s||0,p||t||1]});return e};return h}();

var originAdOverlay, originScript, originParams, originXd;
var _originAdPrefix	= 'originAd-';

/**
* Origin ad response handler
*/
var originXd = (function() {
	var originAd;

	//Cross Domain listener for Origin ad unit
	XD.receiveMessage(function(message) {
		try {
			JSON.parse(message.data);
		} catch(e) {
			return false;
		}
		message		= JSON.parse(message.data);
		if(message.callback) response[message.callback](message);
	}, 'http://'+document.location.hostname);
	
	var response = {
		//Function to handle creation and management of overlay elements
		_overlay: function(element, display) {
			switch(display) {
				case 'create':
					originAdOverlay 				= document.createElement('iframe');
					originAdOverlay.name			= originAd.name;
					originAdOverlay.id				= 'originAd-'+element.id+'-overlay';
					originAdOverlay.frameBorder		= 0;
					originAdOverlay.width			= 0;
					originAdOverlay.height			= 0;
					originAdOverlay.scrolling 		= 'no';
					originAdOverlay.style.position	= 'fixed';
					originAdOverlay.style.top 		= 0;
					originAdOverlay.style.left		= 0;
					originAdOverlay.style.zIndex	= 10000000;
					originAdOverlay.setAttribute('data-src', element.src+'/triggered');
					
					document.body.appendChild(originAdOverlay);
					break;
				case 'hide':
					element.width	= '0';
					element.height	= '0';
					break;
				case 'show':
					element.width			= '100%';
					element.height			= '100%';
					element.style.top 		= 0;
					element.style.left		= 0;
					element.style.zIndex	= 10000000;
					element.style.position	= 'fixed';
					break;
			}
		},
		//Finish Origin ad unit rendering with data (dimensions, type)
		adInit: function(data) {
			originAd		= document.getElementById(_originAdPrefix+data.id);
			originAdParams	= JSON.parse(decodeURIComponent(originAd.name));
			
			//HEX???...
			
			//Appends special ad unit templates based on placement
			switch(data.config.placement) {
				default:
				case 'default':
					originAd.height	= data.config.height;
					originAd.width	= data.config.width;
					break;
				case 'top':
					originAd.height	= data.config.height;
					originAd.width	= '100%';
					break;
				case 'bottom':
					originAd.height	= data.config.height;
					originAd.width	= '100%';
					originAd.style.bottom	= 0;
					originAd.style.position	= 'fixed';
			}
			
			//Ad type specific functions
			switch(data.config.type) {
				default:
				case 'default':
					break;
				case 'expand':
					break;
				case 'overlay':
					this._overlay(originAdParams, 'create');
					break;
				case 'prestitial':
					//Rename iframe
					originAd.id	= 'originAd-'+data.id+'-overlay';
					this._overlay(originAd, 'show');
					break;
				case 'interstitial':
					var that 	= this;
					this._overlay(originAdParams, 'create');
					//document.body.addEventListener('click', function(event) {response.interstitial(event, data)}, false);
					document.body.addEventListener('click', function(e) {
						var target		= e.target? e.target: e.srcElement;						
							
						if(target) tag 	= target.tagName;
						if(target && !/^(a)$/i.test(tag)) {
							target = target.parentNode;
							if(target) tag = target.tagName;
						}
						
						if(target.tagName === 'A' && (/^(http:|https:|mailto:)/i.test(target.href) && (target.href.search('#')<=0)) && (/^(_self|_top)/i.test(target.target) || target.target === '')) {
							if(e.preventDefault) {
								e.preventDefault();
							} else {
								event.returnValue = false;
							}
							
							var interstitial		= document.getElementById(_originAdPrefix+data.id+'-overlay');
								interstitial.setAttribute('data-continue', target.href);
								interstitial.src	= interstitial.getAttribute('data-src');
							that._overlay(interstitial, 'show');
						}
					}, false);					
					break;
			}
			
		},
/*
		containerInit: function(data) {
			originAd			= document.getElementById(data.id),
			originAdParams		= JSON.parse(decodeURIComponent(originAd.name));
			originAd.width		= data.width;
			originAd.height		= data.height;
			originAd.style.backgroundColor	= data.hex;
			
			//Add special dimensions for units
			switch(data.placement) {
				default:
				case 'default':
					break;
				case 'top':
					originAd.width 	= '100%';
					break;
				case 'bottom':
					originAd.width 				= '100%';
					originAd.style.bottom		= 0;
					originAd.style.position		= 'fixed';
					break;
			}
			
			switch(data.type) {
				default:
				case 'default':
					break;
				case 'expand':
					break;
				case 'overlay':
					if(document.getElementById('originAd-'+originAdParams.id+'-overlay') === null) this.overlayInit(originAdParams);
					break;
				case 'prestitial':
					this._overlay(originAd, 'show');
					break;
				case 'interstitial':
					document.body.addEventListener('click', function(event) {response.interstitial(event, data)}, false);
					break;
			}
		},
*/
/*
		interstitial: function(e, data) {
			var target		= e.target? e.target: e.srcElement;						
			
			if(target) tag 	= target.tagName;
			if(target && !/^(a)$/i.test(tag)) {
				target = target.parentNode;
				if(target) tag = target.tagName;
			}
			
			if(target.tagName === 'A' && (/^(http:|https:|mailto:)/i.test(target.href) && (target.href.search('#')<=0)) && (/^(_self|_top)/i.test(target.target) || target.target === '')) {
				if(e.preventDefault) {
					e.preventDefault();
				} else {
					event.returnValue = false;
				}
				
				
				console.log('open interstitial');
				var originAdOverlay			= document.getElementById(data.idTriggered);
					originAdOverlay.width	= '100%';
					originAdOverlay.height	= '100%';
					originAdOverlay.src		= originAdOverlay.getAttribute('data-src');
					originAdOverlay.setAttribute('data-continue', target.href);
			}
*/
			/*
	
				} else {
					//WHY IS THIS HERE TWICE?
					if(e.preventDefault) {
						e.preventDefault();
					} else {
						event.returnValue = false;
					}
				}
			*/	
		toggleexpand: function(data) {
			console.log(data);
			if(data.resizeHeight) {
			}
			
			
			switch(data.placement) {
				case 'top':
					break;
				case 'bottom':
					break;
			}
			
/*
			var ad 			= document.getElementById(data.id);
		
			switch() {
				case 'top':
					if(document.getElementById('originCss')) { 
						document.getElementById('originCss').parentNode.removeChild(document.getElementById('originCss'));
					}
					anim(document.getElementById(data.id), {height:data.resizeHeight}, data.duration, 'ease-out');
					break;
				default:
					anim(document.getElementById(data.id), {height:data.resizeHeight,width:data.resizeWidth}, data.duration, 'ease-out');
					break;
			}
*/
		},
		toggleoverlay: function(data) {
			switch(data.type) {
				case 'initial':
					var overlay	= document.getElementById(_originAdPrefix+data.id);
					break;
				default:
				case 'triggered':
					var overlay	= document.getElementById(_originAdPrefix+data.id+'-overlay');
					break;
			}
			/**
			* Overlay toggle functionality works by setting a pre-made triggered iframe view
			* to display and vice-versa to hide.
			*/
			switch(data.action) {
				case 'continue':
					window.location = overlay.getAttribute('data-continue');
					break;
				case 'close':
					overlay.setAttribute('src', 'about:blank');
					this._overlay(overlay, 'hide');
					break;
				case 'open':
					overlay.src	= overlay.getAttribute('data-src');
					this._overlay(overlay, 'show');
					break;
				 case 'remove':
				 	break;
			}
		}
	}
})();

/**
* Origin Ad initialization
*/
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
		//Initial template rendering - Handles the initial iframe creation + positioning	
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
				
				//Ad placement setup
				switch(originParams.placement) {
					default:
						originScript.parentNode.insertBefore(ad, originScript);
						break;
					case 'top':
						originDOM.body.insertBefore(ad, originDOM.body.firstChild);
						break;
					case 'bottom':
						document.body.appendChild(ad);
						break;
				}
		}

		//Code to render an Origin ad unit
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
				'placement':data.placement,
				//'adtype':	data.adtype,
				'dcopt':	data.dcopt,
				'dfp':		data.dfp,
				'id':		data.id,
				'src':		'http://'+document.location.hostname+'/ad/'+data.id+'/'+platform,
				'originDomain':document.location.hostname,
				'xdSource':	document.location.href
			};
			
			originScript 	= document.getElementById('originEmbed-'+originParams.id);
			//originXd		= (data.debug === 'true')? 'http://'+data.domain+'/js/ad/origin-xd.js':'http://'+data.domain+'/min-js?f=/js/ad/origin-xd.js';
			
			if(top === self) {				
				//xd();
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
					
					//xd();
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