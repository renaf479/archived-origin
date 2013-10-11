<script type="text/javascript" id="originEmbed-{{embedOptions.id}}">		
	(function() {
		var originOptions = {
			auto: 	'{{embedOptions.auto}}',
			close: 	'{{embedOptions.close}}',
			id:		'{{embedOptions.id}}',
			platforms:{'desktop': true, 'tablet': {{embedOptions.tablet}}, 'mobile': {{embedOptions.mobile}}},
			placement:'{{embedOptions.placement}}'
		};
		if(window.origin) {
			if(typeof origin == 'function') {
				new origin(originOptions);
			} else {
				origin.push(originOptions);
			}
		} else {
			origin = [originOptions];
			s = document.createElement('script');
			s.type='text/javascript';
			s.async=true;
			s.id='origin-ad';
			s.src='http://<?php echo $_SERVER['HTTP_HOST'];?>/js/ad/origin-ad.js';
			document.head.appendChild(s);
		}
	})();
</script>
<?php 
/*
10.14.13
<script type="text/javascript" id="originEmbed-{{embedOptions.id}}">		
	(function() {
		var originOptions = {
			auto: 	'{{embedOptions.auto}}',
			close: 	'{{embedOptions.close}}',
			id:		'{{embedOptions.id}}',
			platforms:{'desktop': true, 'tablet': {{embedOptions.tablet}}, 'mobile': {{embedOptions.mobile}}},
			placement:'{{embedOptions.placement}}'
			//domain:	'<?php echo $_SERVER['HTTP_HOST'];?>'
		};
		if(window.origin) {
			if(typeof origin == 'function') {
				new origin(originOptions);
			} else {
				origin.push(originOptions);
			}
		} else {
			origin = [originOptions];
			s = document.createElement('script');
			s.type='text/javascript';
			s.async=true;
			s.id='origin-ad';
			s.src='http://<?php echo $_SERVER['HTTP_HOST'];?>/js/ad/origin-ad.js';
			document.head.appendChild(s);
			//s.src='http://<?php echo $_SERVER['HTTP_HOST'];?>/min-js?f=/js/ad/origin-ad.js';
			//s1 = document.getElementsByTagName('script')[0];
			//s1.parentNode.insertBefore(s, s1);
		}
	})();
</script>





6.23.13
<script type="text/javascript" id="originEmbed-{{embedOptions.id}}">		
	(function() {
		var originOptions = {
			auto: 	'{{embedOptions.auto}}',
			close: 	'{{embedOptions.close}}',
			dcopt: 	'{{embedOptions.dcopt}}',
			dfp:	{},
			id:		'{{embedOptions.id}}',
			template:'{{embedOptions.type}}',
			domain:	'<?php echo $_SERVER['HTTP_HOST'];?>'
		};
		if(window.origin) {
			if(typeof origin == 'function') {
				new origin(originOptions);
			} else {
				origin.push(originOptions);
			}
		} else {
			origin = [originOptions];
			s = document.createElement('script');
			s.type='text/javascript';
			s.async=true;
			s.src='http://<?php echo $_SERVER['HTTP_HOST'];?>/min-js?f=/js/ad/origin.js';
			s1 = document.getElementsByTagName('script')[0];
			s1.parentNode.insertBefore(s, s1);
		}
	})();
</script>










function async(callback) {
		var o = document.createElement('script'); o.type = 'text/javascript'; o.src = 'http://<?php echo $_SERVER['HTTP_HOST'];?>/js/ad/origin.js'; o.id = 'originEmbed-{{embedOptions.id}}'; o.async = true;
		var s = document.getElementsByTagName('script')[document.getElementsByTagName('script').length - 1];
		s.parentNode.insertBefore(o, s);
		o.addEventListener('load', function(e) {callback(null, e);}, false);
	}
	async(function() {
		origin.init({
			auto: 	'{{embedOptions.auto}}',
			close: 	'{{embedOptions.close}}',
			hover: 	'{{embedOptions.hover}}',
			dcopt: 	'{{embedOptions.dcopt}}',
			id:		'{{embedOptions.id}}',
			template:'{{embedOptions.type}}',
			domain:	'<?php echo $_SERVER['HTTP_HOST'];?>'
		});
	});



<script type="text/javascript" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/min-js?f=/js/ad/origin.js" data-auto="{{embedOptions.auto}}" data-close="{{embedOptions.close}}" data-hover="{{embedOptions.hover}}" data-dcopt="{{embedOptions.dcopt}}" data-id="{{embedOptions.id}}" data-template="{{embedOptions.type}}" data-init="true" data-domain="<?php echo $_SERVER['HTTP_HOST'];?>"></script>
*/
?>