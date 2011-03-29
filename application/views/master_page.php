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
