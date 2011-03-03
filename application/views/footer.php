<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script type="text/javascript">
	(function(window, $){
	
		var optionContainers = $('.options-container');

		$('#choose-compressor')
			.bind('change.compressor', function(){
				optionContainers.hide();
				$('#options-' + this.value).show();
			})
			.trigger('change.compressor');	

	})(this, this.jQuery);
</script>
