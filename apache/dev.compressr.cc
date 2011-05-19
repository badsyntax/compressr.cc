<VirtualHost *:80>

	DocumentRoot	/var/www/dev.compressr.cc
	ServerName	dev.compressr.cc

	# Access logs
	CustomLog	/var/log/apache2/compressr-dev.cc-alogs combined

	# Error logs
	ErrorLog	/var/log/apache2/compressr-dev.cc-elogs

	# Directory Index
	DirectoryIndex index.php

	# Set environment to production
	SetEnv KOHANA_ENV development

	# Protect hidden files from being viewed
	<Files .*>
		Order Deny,Allow
		Deny From All
	</Files>
	
	# Turn on URL rewriting	
	RewriteEngine On

	# Protect application and system files from being viewed
	RewriteRule ^(?:application|modules|system)\b.* /index.php/$0 [L]

	# Serve files that exist
	RewriteCond %{DOCUMENT_ROOT}%{REQUEST_FILENAME} !-f
	RewriteCond %{DOCUMENT_ROOT}%{REQUEST_FILENAME} !-d

	# Media folders	
	RewriteRule  ^/(js|css)/([a-z\.]+)$	/application/media/$1/$2 [L]

	# Rewrite all other URLs to index.php/URL
	RewriteRule .* /index.php/$0 [PT]

	# Secure the dev area
	<DirectoryMatch "/var/www/dev.compressr.cc">
		AuthType Basic
		AuthName "Restricted Area"
		AuthUserFile /etc/apache2/users
		Require valid-user
	</DirectoryMatch>

	# The configuration from here is taken from the HTML5 Boilerplate http://html5boilerplate.com/

	<IfModule mod_setenvif.c>
		<IfModule mod_headers.c>
			BrowserMatch MSIE ie
			Header set X-UA-Compatible "IE=Edge,chrome=1" env=ie
		</IfModule>
	</IfModule>

	<FilesMatch "\.(ttf|otf|eot|woff|font.css)$">
		<IfModule mod_headers.c>
			Header set Access-Control-Allow-Origin "*"
		</IfModule>
	</FilesMatch>

	# video
	AddType video/ogg  ogg ogv
	AddType video/mp4  mp4
	AddType video/webm webm

	# Proper svg serving. Required for svg webfonts on iPad
	AddType image/svg+xml		      svg svgz

	# webfonts
	AddType application/vnd.ms-fontobject eot
	AddType font/ttf		      ttf
	AddType font/otf		      otf
	AddType font/x-woff		      woff

	AddType text/cache-manifest	      manifest

	# gzip compression.
	<IfModule mod_deflate.c>

		# html, xml, css, and js:
		AddOutputFilterByType DEFLATE text/html text/plain text/xml text/css application/x-javascript text/javascript application/javascript application/json

		# webfonts and svg:
		<FilesMatch "\.(ttf|otf|eot|svg)$" >
			SetOutputFilter DEFLATE
		</FilesMatch>
	</IfModule>

	<IfModule mod_expires.c>
		Header set cache-control: public
		ExpiresActive on

		# Perhaps better to whitelist expires rules? Perhaps.
		ExpiresDefault				"access plus 1 month"

		# cache.manifest needs re-reqeusts in FF 3.6 (thx Remy ~Introducing HTML5)
		ExpiresByType text/cache-manifest	"access plus 0 seconds"

		# your document html 
		ExpiresByType text/html			 "access"

		# rss feed
		ExpiresByType application/rss+xml	"access plus 1 hour"

		# favicon (cannot be renamed)
		ExpiresByType image/vnd.microsoft.icon	"access plus 1 week"

		# media: images, video, audio
		ExpiresByType image/png			"access plus 1 month"
		ExpiresByType image/jpg			"access plus 1 month"
		ExpiresByType image/jpeg		"access plus 1 month"
		ExpiresByType video/ogg			"access plus 1 month"
		ExpiresByType audio/ogg			"access plus 1 month"
		ExpiresByType video/mp4			"access plus 1 month"

		# webfonts
		ExpiresByType font/ttf			"access plus 1 month"
		ExpiresByType font/woff			"access plus 1 month"
		ExpiresByType image/svg+xml		"access plus 1 month"

		# css and javascript
		ExpiresByType text/css			"access plus 1 month"
		ExpiresByType application/javascript	"access plus 1 month"
		ExpiresByType text/javascript		"access plus 1 month"
	</IfModule>

	FileETag None

	Options -MultiViews

	# use utf-8 encoding for anything served text/plain or text/html
	AddDefaultCharset utf-8

	# force utf-8 for a number of file formats
	AddCharset utf-8 .html .css .js .xml .json .rss

</VirtualHost>
