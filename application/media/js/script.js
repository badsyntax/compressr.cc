/**
 * Compressr by badsyntax.co
 */
this.Compressr = (function(window, $){

	var config, elem = { 
		codeTextarea:		$('#codetext'),
		form:			$('#compressor-form'),
		select:			$('#compressor'),
		options:		$('#compressor-options'), 
		optionContainers:	$('#compressor-options').find('.options-container'),
		msgContainer:		$('#message-container'),
		selectAll:		$('#code-select-all'),
		clearCode:		$('#code-clear')
	}, msg = {
		error: 'There was an error processing the request, please try again.', 	
		sizes: 'Total size: %s. Saved %s.' 
	};

	function sprintf(text){

		var data = Array.prototype.slice.call(arguments, 1), 
			c = -1;

		return text ? text.replace(/(%s)/g, function(match, value, test){
			return (data[++c] !== undefined) ? data[c] : match;
		}) : '';
	}

	function bytes(bytes) {

		var
			units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'],
			mod = 1000,
			power = (bytes > 0) ? Math.floor(Math.log(bytes) / Math.log(mod)) : 0
		;

		return sprintf('%s %s', bytes / Math.pow(mod, power), units[power]);
	}

	function cacheImages(images){

		$.each(images, function(key, val){
			var img = $('<img />').attr('src', val);
		});
	}
		
	function scrollTop(topElem){

		var offset = topElem.offset();

		$(window).scrollTop(offset.top - 14);
	}

	function bindCodeToolHandlers(){

		elem.selectAll.click(function(event){
			event.preventDefault();
			try {
				elem.codeTextarea[0].select();
				elem.codeTextarea[0].focus();
			} catch(e){ }
		});

		elem.clearCode.click(function(event){
			event.preventDefault();
			elem.codeTextarea.val('')[0].focus();
		});
	}

	function bindFormSubmitHandler(){

		function enableTextarea(){
			elem.codeTextarea
				.removeClass('loading')
				.removeAttr('disabled');
		}

		function disableTextarea(){
			elem.codeTextarea
				.addClass('loading')
				.attr('disabled', 'disabled');
		}

		function successHandler(data){

			enableTextarea();

			if (!data){
				showmsg('error', [msg.error]);
				return;
			}

			var code = $.trim(data.codetext);

			// Fail! 
			if (code && code !== 'undefined') { 
				elem.codeTextarea.val(code); 
			}
			if ($(data.errors).length) { 
				showmsg('error', data.errors); 
			}
			if ($(data.compressor_errors).length) { 
				showmsg('error', data.compressor_errors); 
			}

			// Success!
			if (!$(data.errors).length && !$(data.compressor_errors).length) {
				showSizes(data.sizes);
				elem.selectAll.trigger('click');
			} else {
				elem.codeTextarea[0].focus();
			}
		}

		function errorHandler(){
			enableTextarea();
			showmsg('error', [msg.error]);
		}

		function formSubmitHandler(event){
			event.preventDefault();
			$.ajax({
				url: this.action,
				type: 'POST',
				dataType: 'json',
				data: $(this).serialize()
			})
			.success(successHandler)
			.error(errorHandler);
			
			disableTextarea();
		}

		elem.form.submit(formSubmitHandler);
	}

	function bindOptionsHandler(){
		elem.select
		.bind('change.compressor', function(){
			//elem.optionContainers.hide();
			//$('#options-' + this.value).show();
		})
		.trigger('change.compressor');	
	}

	function getPanels(){

		if (elem.msgContainer.length) { return; }

		$.ajax({
			url: '/view/messages',
			type: 'GET',
			dataType: 'HTML'
		})
		.success(function(data){
			elem.msgContainer = $(data).hide();
			elem.msgContainer.insertAfter('header');
		});
	}

	function showmsg(type, messages){

		var classes = [ 'message-error', 'message-info' ],
			list = elem.msgContainer
				.hide()
				.removeClass(classes.join(' '))
				.addClass('message-'+type)
				.find('ul').empty();
	
		$.each(messages, function(key, val){
			list.append('<li>' + val + '</li>');
		});

		elem.msgContainer.find('.close').one('click', function(){
			elem.msgContainer.fadeOut();
			return false;
		});

		scrollTop(elem.msgContainer.fadeIn(200));
	}

	function showSizes(sizes){
		showmsg('info', [ 
			sprintf(msg.sizes, bytes(sizes.bytes.out_size), bytes((sizes.bytes.in_size - sizes.bytes.out_size)))
		]);
	}

	function init(config){

		cacheImages([
			'/img/ajax-loader.gif',
			'/img/apply.gif',
			'/img/error.png'
		]);
		
		bindOptionsHandler();
		bindFormSubmitHandler();
		bindCodeToolHandlers();
		
		elem.codeTextarea.focus();

		window.setTimeout(getPanels, 360);
	}
	
	return {
		init: init
	};

})(this, this.jQuery);
