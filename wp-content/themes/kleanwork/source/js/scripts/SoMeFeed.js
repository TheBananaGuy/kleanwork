jQuery.ajaxSetup({
    type: "GET",
    cache: true
});

jQuery(window).load(function () {
    //start SoMe spinner
    soMeSpinner(true);

    //Gets SoMe feeds roughly 4 secs.
    getSoMeFeed();

});
jQuery(document).ready(function(){

    jQuery('.js-open-social').click(function (e) {
        var firstSocialClick = true;
        jQuery('body').addClass('overflow-hidden');
        jQuery('.js-some-closer').fadeToggle('3000');

        if (jQuery('.js-some-container').hasClass('inactive')) {
            jQuery('.js-some-container').removeClass('inactive');
            if (firstSocialClick) {
                var smbLazy = new Blazy({
                    offset: 1000, // Loads images 1000px before they're visible
                    container: ".some-elements__inner",
                    selector: ".b-lazy-some",
                    success: function (ele) {
                        //console.log('images loaded');
                    }
                 , error: function (ele, msg) {
                     if (msg === 'missing') {
                         // Data-src is missing
                         //console.log('Data-src is missing');
                     }
                     else if (msg === 'invalid') {
                         // Data-src is invalid
                         //console.log('Data-src is invalid');
                     }
                 }
                });

                setTimeout(function () {
                    smbLazy.revalidate();
                }, 100);
                firstSocialClick = false;
            }
        }
        else {
            jQuery('.js-some-container').addClass('inactive');
        }

    });

    jQuery('.js-some-close').click(function (e) {
        jQuery('body').removeClass('overflow-hidden');
        jQuery('.js-some-closer').fadeToggle('3000');
        jQuery('.js-some-container').addClass('inactive');
    });

    jQuery('.some-elements__inner').perfectScrollbar({ suppressScrollX: true });

    //var url = '/umbraco/API/{controller}/{action}';
    //var url = '/umbraco/surface/{controller}surface/{action}';


    function getSoMeFeed() {

        //    var action = url.replace('{controller}', 'SoMe').replace('{action}', 'SoMeIndex');
    //    var action = url.replace('{controller}', 'some').replace('{action}', 'getSoMe');

        var action = "/assets/build/scripts/somefeed." + rootId + ".js?rnd=" + new Date().getUTCHours();

        var _html = jQueryhtml;

        jQuery.ajax({
            url: action,
            dataType: "json",
            success: function (resp) {
                if (resp.SoMeFeeds) {
                    jQuery(resp.SoMeFeeds).each(function (index) {

                        jQuery(this).each(function (i) {

                            var soMe = jQuery(this)[i].SoMe;
                            var date = jQuery(this)[i].Date;
                            var text = jQuery(this)[i].Text;
                            if ((text + "") == "null") text = "";
                            var picture = jQuery(this)[i].Picture;
                            var video = jQuery(this)[i].Video;
                            var link = jQuery(this)[i].Link;
                            var linkText = link.substring(0, 50) + '...';

                            var feed = _html.replace('DATE', date).
                                replace('TEXT', text).
                                replace('CLASS', soMe).
                                replace('LINK', link).
                                replace('LINKTEXT', linkText);

                            if (picture != null && picture.length > 0) {
                                feed = feed.replace('PICTUREorVIDEO', picture);
                            } else if (video != null && video.length > 0) {
                                feed = feed.replace('PICTUREorVIDEO', video);
                            } else {
                                feed = feed.replace('PICTUREorVIDEO', "");
                            }

                            // Stop spinner
                            soMeSpinner(false);

                            jQuery('.js-some-elements').append(jQuery(feed));

                        });

                    });

                }

            },
            error: function (request, status, error, xhr) {

                var pTag = jQuery('.js-soMe-spinner');
                if (pTag != null && pTag.length > 0) {
                    jQuery('.js-soMe-spinner').remove();
                }

                var spinnerHtml = "<p class=\"js-soMe-spinner\">Vi oplever problemer med afhentning af sociale medier. Prøv igen senere.</p>";
                jQuery('.js-some-elements').append(jQuery(spinnerHtml));

            }
        });
    };

    var jQueryhtml =
            "<div class='some__feed'>" +
            "PICTUREorVIDEO" +
            "<div class='some__description'><span CLASS></span><p class='some__date'>DATE</p>" +
                "<p>TEXT</p>" +
                "<a href=\"LINK\">LINKTEXT<a/>" +
                "</div>" +
            "</div>";


    function soMeSpinner(isActive) {
        if (isActive) {
            var spinnerHtml = "<p class=\"js-soMe-spinner\">Der hentes data fra Facebook, Instagram og Twitter vent venligst...</p>";
            jQuery('.js-some-elements').append(jQuery(spinnerHtml));
        } else {

            var pTag = jQuery('.js-soMe-spinner');
            if (pTag != null && pTag.length > 0) {
                jQuery('.js-soMe-spinner').remove();
            }
        }
    };

})
