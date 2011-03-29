<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>compressr.cc</title>
	<meta name="description" content="Easily compress your Javascript using Closure Compiler, YUI compressor or UglifyJS.">
	<meta name="author" content="richard.willis">
	<script type="text/javascript">document.documentElement.className += "js";</script>  
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans|Crushed" />
	<link rel="stylesheet" type="text/css" href="/css/styles.css" />
<?php if (Kohana::$environment === Kohana::PRODUCTION){?>
	<script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-1636725-33']);
		_gaq.push(['_trackPageview']);
		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>
	<?php }?>
</head>
<body>
	<?php echo View::factory('header')?>

	<?php if ($errors){?>
		<?php echo View::factory('errors')?>
	<?php }?>

	<?php echo $content?>

	<?php echo View::factory('footer')?>
</body>
</html>
