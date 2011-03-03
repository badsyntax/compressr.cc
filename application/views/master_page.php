<!doctype html>
<html>
<head>
	<title><?php echo $title?></title>
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/cGss'>
	<link href='http://fonts.googleapis.com/css?family=Gruppo' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Philosopher' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Crushed' rel='stylesheet' type='text/css'>
	<style type="text/css">
		html, body, div, span, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, abbr, address, cite, code, del, dfn, em, img, ins, kbd, q, samp, small, strong, sub, sup, var, b, i, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, figcaption, figure, footer, header, hgroup, menu, nav, section, summary, time, mark, audio, video {
			margin: 0;
			padding: 0;
			border: 0;
			font-size: 100%;
			font: inherit;
			vertical-align: baseline;
		}
		article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section {
			display: block;
		}
		blockquote, q { quotes: none; }
		blockquote:before, blockquote:after, q:before, q:after { content: ''; content: none; }
		body {
			text-align: center;
			font: bold 12px helvetica,arial,freesans,clean,sans-serif;
		}
		ul, ol {
			margin-left: 2em;
		}
		h1, h2, h3, h4 {
			font-family: 'Droid Sans', 'Gruppo', 'Ubuntu', arial, serif;
		}
		h1 {
			font-family: 'Crushed', arial, serif;
			font-size: 356%;
			margin: .5em 0 .5em 0;
		}
		h2 {
			font-weight: normal;
			font-size: 1.2em;
			padding-bottom: .4em;
		}
		fieldset {
			border: 0;
		}
		label {
			font-weight: normal;
		}
		.field {
			display: block;
		}
		button {
			overflow: visible;
			white-space: nowrap;
			padding: .5em;
			cursor: pointer;
			border: 1px solid #bbb;
			-moz-border-radius: 4px;
			-webkit-border-radius: 4px;
			border-radius: 4px;
			-moz-box-shadow: #bbb 0 1px 4px;
			-webkit-box-shadow: #bbb 0 1px 4px;
			box-shadow: #bbb 0 1px 4px;
			color: #333;
			-moz-text-shadow: 1px 1px 0 #FFFFFF;
			-webkit-text-shadow: 1px 1px 0 #FFFFFF;
			text-shadow: 1px 1px 0 #FFFFFF;
			background: #f4f4f4; /* for non-css3 browsers */
			font-weight: bold;
			font-size: 14px;
			filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#ddd');
			background: -webkit-gradient(linear, left top, left bottom, from(#fff), to(#ddd));
			background: -moz-linear-gradient(top,  #fff,  #ddd);
			/* For Internet Explorer 5.5 - 7 */
			filter: progid:DXImageTransform.Microsoft.gradient(startColorStr=#FFFFFFFF, endColorStr=#DDDDDDFF);
			/* For Internet Explorer 8 */
			-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#FF0000FF, endColorstr=#FFFFFFFF)";
		}
		.form-errors {
			margin-bottom: 2em;
		}
		.options-container {
		}


		#wrapper {
			width: 600px;
			margin: 1em auto;
			border: 1px solid #eee;
			padding: 1em;
		}

		#option-list {
			margin: 0;
		}
		#option-list li {
			list-style: none;
			margin-bottom: 1.6em;
		}
		#option-list li:last-child {
			margin: 0;
		}
		#option-list textarea {
			width: 98%;
			height: 18em;
			border: 1px solid #ccc;
			-moz-box-shadow: 0 0 3px #888;
			-webkit-box-shadow: 0 0 3px#888;
			box-shadow: 0 0 3px #888;
		}


	</style>
</head>
<body>
	<?php echo $content?>
	<?php echo View::factory('footer')?>
</body>
</html>
