$(function() {

	var menuLength = $('div.js-header-menu').find('div.js-menu-band').length;
    /*
	$('div.js-header-menu').find('div.js-menu-band').each(function() {
		var thisIndex = $('div.js-menu-band').index($(this));
		//alert(thisIndex / (menuLength - 1));
		$(this).css('background-color', 'rgba(0,0,0,' + thisIndex / (menuLength - 1) + ')');
	});
	*/
	$('.js-open-menu').on('click', function() {
		$('div.js-header-menu').slideToggle(550);
		$(this).toggleClass('open');
	});

	// Make the header smaller when scrolled down the page
	checkTopPage();

	$(window).on('scroll', function() {
	 	checkTopPage();
	});

	function checkTopPage() {
		var scrollPosition = $(window).scrollTop();

		if(scrollPosition === 0) {
			$('#header-container').removeClass('scrolled');
			$('#pseudo-header').removeClass('scrolled');
		}
		else {
			$('#header-container').addClass('scrolled');
			$('#pseudo-header').addClass('scrolled');
		}
	}

	$('.vid').on('canplay', function() {
		$(this).css('opacity', 1);
	});


});