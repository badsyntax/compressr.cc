<footer></footer>
<script type="text/javascript" src="/js/script.js"></script>
<script type="text/javascript">
(function(){
	Compressr.init({
		environment: '<?php echo Kohana::$environment === Kohana::DEVELOPMENT ? 'development' : 'production'?>',
		paths: {"base":"\/admin"},
		param: {},
		route: {
			controller: 'main',
			action: 'index'
		}
	});
})(this.jQuery);
</script>
