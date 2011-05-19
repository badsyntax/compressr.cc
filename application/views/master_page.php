<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>compressr.cc</title>
	<meta name="description" content="Easily compress your Javascript using Closure Compiler, YUI compressor or UglifyJS.">
	<meta name="author" content="richard.willis">
	<script type="text/javascript">
	document.documentElement.className += "js";
	// http://remysharp.com/2009/01/07/html5-enabling-script/
	</script>  
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Crushed" />
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
<!--[if lt IE 7 ]> <body class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <body class="ie7"> <![endif]-->
<!--[if IE 8 ]> <body class="ie8"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <body> <!--<![endif]-->
	<?php echo View::factory('header')?>

	<?php if ($errors){?>
		<?php echo View::factory('errors')?>
	<?php }?>

	<?php echo $content?>

	<?php echo View::factory('footer')?>
</body>
</html>
