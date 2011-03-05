<!doctype html>
<html>
<head>
	<title><?php echo $title?></title>
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans|Crushed" />
	<link rel="stylesheet" type="text/css" href="/css/styles.css" />
</head>
<body>
	<?php echo $content?>
	<?php echo View::factory('footer')?>
</body>
</html>
