<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script type="text/javascript">
	(function(window, $){
		var optionContainers = $('.options-container');
		$('#compressor')
			.bind('change.compressor', function(){
				optionContainers.hide();
				$('#options-' + this.value).fadeIn(200);
			})
			.trigger('change.compressor');	
		$('#code').focus();
	})(this, this.jQuery);
</script>
