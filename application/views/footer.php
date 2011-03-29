<footer>
<?php echo View::factory('navigation')?>
</footer>
<script type="text/javascript" src="/js/script.js"></script>
<script type="text/javascript">
(function(){
	Compressr.init({
		environment: '<?php echo Kohana::$environment === Kohana::DEVELOPMENT ? 'development' : 'production'?>'
	});
})();
</script>
