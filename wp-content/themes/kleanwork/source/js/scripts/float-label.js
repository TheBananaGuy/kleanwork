/*
 * Interaction design based on:
 * http://dribbble.com/shots/1254439--GIF-Mobile-Form-Interaction?list=users
 */
jQuery(document).ready(function() {


  // Test for placeholder support
  jQuery.support.placeholder = (function(){
      var i = document.createElement('input');
      return 'placeholder' in i;
  })();



  // Hide labels by default if placeholders are supported
  if(jQuery.support.placeholder) {
    // Caching input/text labels
    var inputs = jQuery('.js-float').find('input, textarea');

    inputs.each(function(){
      var jQuerythis = jQuery(this),
        jQueryparent = jQuerythis.parent();

      if ( !jQuery.trim( jQuerythis.val() ) ) {
        jQueryparent.addClass('float--label-hidden');
      } else {
        jQueryparent.addClass('float--label-defocus');
      }
    });

    // Code for adding/removing classes here
    inputs.on('keyup blur change focus', function(event){



      // Cache our selectors
      var jQuerythis = jQuery(this),
        jQueryparent = jQuerythis.parent();

      if (event.type == 'keyup' || event.type == 'blur') {
        if( jQuerythis.val() == '' ) {
          jQueryparent.addClass('float--label-hidden');
        } else {
          jQueryparent.removeClass('float--label-hidden');
        }
      }


      else if (event.type == 'focus') {
        if ( jQuery.trim( jQuerythis.val() ) ) {
            jQueryparent.removeClass('float--label-defocus');
        }
      }
    });
  }
  jQuery('.js-bubble').on('click', function(){
    jQuery(this).find('.bubble__content').toggleClass('is-hidden');
  });

  jQuery('.js-toggle-this').on('click', function(){
    jQuery(this).toggleClass('is-hidden');
  });



  // Show hint on focus/unfocus
  function ToggleHint(input, hint) {
    var hintText = ((hint) ? hint : '');
    var hasHint = false;
    var hintElem = input.siblings('.hint');

    if(hintElem.length > 0) {
      hintElem.toggleClass('is-hidden');
    }
    else {
      if(hintText.length > 0) {
        input.parent('.js-float').append('<label class="hint">'+ hint +'</label>')
      }
    }
  }

  jQuery('.js-float input, .js-float textarea').on('focus', function(){
    var hint = jQuery(this).data('hint');
    ToggleHint(jQuery(this), hint);
  });

  jQuery('.js-float input, .js-float textarea').on('focusout', function(){
    ToggleHint(jQuery(this));
  });

});