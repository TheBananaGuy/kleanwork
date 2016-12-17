jQuery(function() {

	var menuLength = jQuery('div.js-header-menu').find('div.js-menu-band').length;
    /*
	jQuery('div.js-header-menu').find('div.js-menu-band').each(function() {
		var thisIndex = jQuery('div.js-menu-band').index(jQuery(this));
		//alert(thisIndex / (menuLength - 1));
		jQuery(this).css('background-color', 'rgba(0,0,0,' + thisIndex / (menuLength - 1) + ')');
	});
	*/
	jQuery('.js-open-menu').on('click', function() {
		jQuery('div.js-header-menu').slideToggle(550);
		jQuery(this).toggleClass('open');
	});

	// Make the header smaller when scrolled down the page
	checkTopPage();

	jQuery(window).on('scroll', function() {
	 	checkTopPage();
	});

	function checkTopPage() {
		var scrollPosition = jQuery(window).scrollTop();

		if(scrollPosition === 0) {
			jQuery('#header-container').removeClass('scrolled');
			jQuery('#pseudo-header').removeClass('scrolled');
		}
		else {
			jQuery('#header-container').addClass('scrolled');
			jQuery('#pseudo-header').addClass('scrolled');
		}
	}

	jQuery('.vid').on('canplay', function() {
		jQuery(this).css('opacity', 1);
	});


});
console.log("BITCH WORK!");