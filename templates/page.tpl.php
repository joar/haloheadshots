<?php if ( ! $this->ajax ): ?>
<!DOCTYPE html><?php /* PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
*/?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title><?php echo $this->title ?></title>
		<link rel="stylesheet" href="http://css.wandborg.se/blueprint/src/reset.css" type="text/css" media="screen, projection" />
		<link rel="stylesheet" href="http://css.wandborg.se/blueprint/print.css" type="text/css" media="print" />
		<link rel="stylesheet" href="http://css.wandborg.se/blueprint/screen.css" type="text/css" media="screen, projection" />
		<link rel="stylesheet" href="http://css.wandborg.se/blueprint/plugins/buttons/screen.css" type="text/css" media="screen, projection" />
		<link rel="stylesheet" href="/css/main.css" type="text/css" media="screen" />
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
		<meta name="description" content="<?php echo $this->meta_description ? $this->meta_description : 'My name is Joar Wandborg, I am a web developer currently consulting as CIA DB Manager at Electrolux AB Sweden. I am born 1990.' ?>" />
		<meta name="keywords" content="<?php echo $this->meta_keywords ? $this->meta_keywords : 'joar wandborg, web developer, php programmer, php developer' ?>" />
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<script type="text/javascript" charset="UTF-8" src="/js/main.js"></script>
		<script type="text/javascript">
			/* urlParams from
			 * <http://stackoverflow.com/questions/901115/get-querystring-values-with-jquery/2880929#2880929>
			 */
			var urlParams = {};
			(function () {
			    var e,
			        a = /\+/g,  // Regex for replacing addition symbol with a space
			        r = /([^&=]+)=?([^&]*)/g,
			        d = function (s) { return decodeURIComponent(s.replace(a, " ")); },
			        q = window.location.search.substring(1);
	
			    while (e = r.exec(q))
			       urlParams[d(e[1])] = d(e[2]);
			})();
			
			/* Mixpanel */
			var mpq = [];
			mpq.push(["init", "57eda9eb9dd9fefc3d7a27edcd590903"]);
			mpq.push(['track', 'pageView', {
				url: window.location.pathname + window.location.search
			}]);
			if ( 'undefined' == typeof urlParams.p && 'undefined' != typeof urlParams.gt ) {
				mpq.push(['track', 'playerView', {
					gamertag: urlParams.gt
				}])
			}
			(function() {
				var mp = document.createElement("script"); mp.type = "text/javascript"; mp.async = true;
				mp.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + "//api.mixpanel.com/site_media/js/api/mixpanel.js";
				var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(mp, s);
			})();
			console.log( {"reachCallData": <?php global $result; echo json_encode( $result ); ?> });
			console.log( {"metadata": <?php global $metadata; echo json_encode( $metadata ); ?> });  
		</script>
	</head>
	<body>
		<div class="container navigationWrapper">
			<?php echo $this->navigation ?>
		</div>
		<div id="wrapper" class="container">
			<!-- This is SEO -->
			<h1 style="height: 0px; margin: 0px; display: block; color: #fff; overflow: hidden;"><?php echo $this->seo_h1 ? $this->seo_h1 : 'Joar Wandborg' ?></h1>
			<h2 style="height: 0px; margin: 0px; display: block; color: #fff; overflow: hidden;"><strong><em><?php echo $this->seo_h2 ? $this->seo_h2 : 'Halo Reach Headshots' ?></em></strong></h2>
			<!-- This is real content -->
			<?php echo $this->content ?>
		</div>
		<a href="#" class="switch-logViewer-hide">Hide</a>
		<div class="logViewer">
			<div class="logViewer-content">
				<?php foreach ( $this->logs as 	$key => $log ): ?>
					<h3><?php echo $key ?></h3>
					<?php tools::preint_r( $log ); ?>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="footer">
			<div class="container">
				<!-- Mixpanel Free -->
				<a class="ad-mixpanel" href="http://mixpanel.com/?from=partner"><img src="http://mixpanel.com/site_media/images/mixpanel_partner_logo.gif" alt="Real-time Web Analytics by Mixpanel" /></a>
				<p>
					<em><small>HHS by <a href="http://wandborg.se">Joar Wandborg</a></small></em>	
				</p>
			</div>
		</div>
		<script type="text/javascript">
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-8120528-4']);
		  _gaq.push(['_setDomainName', 'none']);
		  _gaq.push(['_setAllowLinker', true]);
		  _gaq.push(['_trackPageview']);

		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();
		</script>
	</body>
</html>
<?php else: ?>
<?php echo $page->content ?>
<?php endif; ?>