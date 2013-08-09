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

var originXd = (function() {
	XD.receiveMessage(function(message) {
		try {
			JSON.parse(message.data);
		} catch(e) {
			return false;
		}
		message		= JSON.parse(message.data);
		if(message.callback) response[message.callback](message);
	}, 'http://'+document.getElementById('origin-xd').getAttribute('data-domain'));

	var response = {
		containerInit: function(data) {
			var originAd				= document.getElementById(data.id),
				originAdParams			= JSON.parse(decodeURIComponent(originAd.name));
				originAd.width			= data.width;
				originAd.height			= data.height;
				originAd.style.backgroundColor	= data.hex;
				
			//If ad triggered state is an overlay, add iframe and detect duplicate
			if(data.type === 'overlay' && document.getElementById('originAd-'+originAdParams.id+'-overlay') === null) {
				var adOverlay 				= document.createElement('iframe');
					adOverlay.name			= originAd.name;
					adOverlay.id			= 'originAd-'+originAdParams.id+'-overlay';
					adOverlay.frameBorder	= 0;
					adOverlay.width			= 0;
					adOverlay.height		= 0;
					adOverlay.scrolling 	= 'no';
					adOverlay.style.position= 'fixed';
					adOverlay.style.top 	= 0;
					adOverlay.style.left	= 0;
					adOverlay.style.zIndex	= 10000000;
					adOverlay.setAttribute('data-src', originAdParams.src+'/triggered');
					
					//originScript.parentNode.insertBefore(adOverlay, originScript);
					document.body.appendChild(adOverlay);
			}
			
			//Template-specific code
			switch(data.template) {
				case 'antemeridian':
					originAd.style.position	= 'fixed';
					originAd.style.width	= '100%';
					originAd.style.height	= '100%';
					originAd.style.top 		= 0;
					originAd.style.left		= 0;
					originAd.style.zIndex	= 10000000;
					break;
				case 'ascension':
					originAd.style.width 	= '100%';
					break;
				case 'rift':
					originAd.style.bottom	= 0;
					originAd.style.position	= 'fixed';
					break;
					
					
					
				case 'aurora':
					/*
					var auroraBody				= document.getElementsByClassName(data.selector)[0];
					auroraBody.style.zIndex		= 2;
					auroraBody.style.position	= 'relative';
					*/
					
					var originCss 			= document.createElement('style');
						originCss.id		= 'originCss';
						originCss.type 		= 'text/css';
						originCss.media		= 'screen';
						originCssAurora		= '.'+data.selector+'{z-index: 2; position: relative}';
						if(originCss.styleSheet) {
							originCss.styleSheet.cssText = originCssAurora;
						} else {
							originCss.appendChild(document.createTextNode(originCssAurora));
						}
						document.body.appendChild(originCss);
					
					
					document.body.style.overflowX	= 'hidden';
					
					originAd.style.position		= 'absolute';
					originAd.style.top 			= 0;
					//originAd.style.left 		= '50%';
					//originAd.style.marginLeft	= -(originAd.clientWidth/2)+'px';
					originAd.width 				= '100%';
					originAd.style.zIndex		= 1;
					break;
				case 'horizon':
					var originCss 			= document.createElement('style');
						originCss.id		= 'originCss';
						originCss.type 		= 'text/css';
						originCss.media		= 'screen';
						originCssHorizon	= 'body{background-position: 50% '+originAd.height+' !important;}';
						if(originCss.styleSheet) {
							originCss.styleSheet.cssText = originCssHorizon;
						} else {
							originCss.appendChild(document.createTextNode(originCssHorizon));
						}
						document.body.appendChild(originCss);
					break;
				case 'postmeridian':
					//Prep listener code
					document.body.addEventListener('click', function(event) {response.postMeridian(event, data)}, false);
					break;
				default:
				break;
			}
		},
		postMeridian: function(e, data) {
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
				var originAdOverlay		= document.getElementById(data.idTriggered);
					originAdOverlay.src	= originAdOverlay.getAttribute('data-src');
					originAdOverlay.setAttribute('data-continue', target.href);
			}
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
		},
		toggleexpand: function(data) {	
			switch(data.type) {
				case 'ascension':
					if(document.getElementById('originCss')) { 
						document.getElementById('originCss').parentNode.removeChild(document.getElementById('originCss'));
					}
					anim(document.getElementById(data.id), {height:data.resizeHeight}, data.duration, 'ease-out');
					break;
				default:
					anim(document.getElementById(data.id), {height:data.resizeHeight,width:data.resizeWidth}, data.duration, 'ease-out');
					break;
			}
		},
		toggleoverlay: function(data) {
			var originAdOverlay	= document.getElementById(data.idTriggered);
			/**
			* Overlay toggle functionality works by setting a pre-made triggered iframe view
			* to display and vice-versa to hide.
			*/
			switch(data.action) {
				case 'continue':
					window.location = originAdOverlay.getAttribute('data-continue');
					break;
				case 'close':
					originAdOverlay.width	= '0';
					originAdOverlay.height	= '0';
					originAdOverlay.setAttribute('src', 'about:blank');
					break;
				case 'open':
					originAdOverlay.src	= originAdOverlay.getAttribute('data-src');
					break;
			}
		}
	}
})();


