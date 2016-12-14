jQuery(document).ready(function($) {
	$('.js-newsletter-form').validate({
		rules: {
			email: {
				required: true,
				email: true
			}
		},
		messages: {
			email: {
				required: $('.js-newsletter-form').data('required-email'),
				email: 	  $('.js-newsletter-form').data('invalid-email')
			}
		}
	});

	$('.js-newsletter-form input').keydown(function() {
		$('.js-newsletter-form').validate().resetForm();
	})

	if($('.js-form').data('lang') === 'daDK') {

		// Custom error messages
		jQuery.extend(jQuery.validator.messages, {
			required: "Dette felt er påkrævet.",
			remote: "Ret venligst dette felt.",
			email: "Angiv venligst en gyldig email adresse.",
			url: "Angiv venligst en gyldig URL.",
			date: "Angiv venligst en gyldig dato.",
			dateISO: "Angiv venligst en gyldig dato (ISO).",
			number: "Angiv venligst et gyldigt tal.",
			digits: "Kun tal er tilladt i dette felt.",
			equalTo: "Gentag venligst værdien fra tidligere.",
			accept: "Please enter a value with a valid extension.",
			maxlength: jQuery.validator.format("Dette felt må ikke indeholde mere end {0} tegn."),
			minlength: jQuery.validator.format("Dette felt skal minimum indeholde {0} tegn."),
			rangelength: jQuery.validator.format("Angiv venligst en værdi mellem {0} og {1} tegn."),
			range: jQuery.validator.format("Angiv venligst en værdi mellem {0} og {1}."),
			max: jQuery.validator.format("Angiv venligst en værdi der er mindre eller lig med {0}."),
			min: jQuery.validator.format("Angiv venligst en værdi der er større eller lig med  {0}.")
		});
	}



	jQuery.validator.addMethod("accept", function(value, element, param) {
		return value.match(new RegExp("^" + param + "$"));
	}, "Please insert a valid value");





	$('.js-form').validate({
		ignore: '.ignore',
		debug: true,

		rules: {
		}, // end rules

		submitHandler: function(form) {
		    var action = $(form).attr('action');
		    var redirectUrl = $(form).attr("data-redirect");

		    var dataJSON = $(form).serializeFormJSON();
		    var dataJSONStringified = JSON.stringify(dataJSON);

		    $.ajax({
		        method: "POST",
		        url: action,
                dataType: "text",
                contentType: "application/json; charset=utf-8",
                data: dataJSONStringified
		    }).done(function (data) {
		        document.location = redirectUrl;
	        });
		}
	});





// ------------- check for valid and insert valid checkmark
// ------------------------------------------------------------------

	$('.js-base-validation input').on('change blur', function() {
		if( $(this).attr('type') !== 'radio' || $(this).attr('type') !== 'checkbox') {

			consoleLog('is not radio or checkbox');

			$(this).valid();

			if($(this).hasClass('valid')) {
				consoleLog('has valid class');

				$(this).parents('.float')
			.removeClass('float--label-hidden float--error')
			.addClass('float--label-defocus float--success');

				$(this).parents('.float').addClass('valid');
				consoleLog($(this).parents('float'));
			}
			else {
				$(this).parents('.float').removeClass('valid');
			}
			
		}
		else {
			// do something for checkboxes and radios
		}
		
	});

});

(function ($) {
    $.fn.serializeFormJSON = function () {

        var o = {};
        var a = this.serializeArray();
        $.each(a, function () {
            if (o[this.name]) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        return o;
    };
})(jQuery);