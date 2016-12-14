$.ajaxSetup({
    type: "GET",
    cache: true
});

$(window).load(function () {
    //start SoMe spinner
    soMeSpinner(true);

    //Gets SoMe feeds roughly 4 secs.
    getSoMeFeed();

});

$('.js-open-social').click(function (e) {
    var firstSocialClick = true;
    $('body').addClass('overflow-hidden');
    $('.js-some-closer').fadeToggle('3000');

    if ($('.js-some-container').hasClass('inactive')) {
        $('.js-some-container').removeClass('inactive');
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
        $('.js-some-container').addClass('inactive');
    }

});

$('.js-some-close').click(function (e) {
    $('body').removeClass('overflow-hidden');
    $('.js-some-closer').fadeToggle('3000');
    $('.js-some-container').addClass('inactive');
});

$('.some-elements__inner').perfectScrollbar({ suppressScrollX: true });

//var url = '/umbraco/API/{controller}/{action}';
//var url = '/umbraco/surface/{controller}surface/{action}';


function getSoMeFeed() {

    //    var action = url.replace('{controller}', 'SoMe').replace('{action}', 'SoMeIndex');
//    var action = url.replace('{controller}', 'some').replace('{action}', 'getSoMe');

    var action = "/assets/build/scripts/somefeed." + rootId + ".js?rnd=" + new Date().getUTCHours();

    var _html = $html;

    $.ajax({
        url: action,
        dataType: "json",
        success: function (resp) {
            if (resp.SoMeFeeds) {
                $(resp.SoMeFeeds).each(function (index) {

                    $(this).each(function (i) {

                        var soMe = $(this)[i].SoMe;
                        var date = $(this)[i].Date;
                        var text = $(this)[i].Text;
                        if ((text + "") == "null") text = "";
                        var picture = $(this)[i].Picture;
                        var video = $(this)[i].Video;
                        var link = $(this)[i].Link;
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

                        $('.js-some-elements').append($(feed));

                    });

                });

            }

        },
        error: function (request, status, error, xhr) {

            var pTag = $('.js-soMe-spinner');
            if (pTag != null && pTag.length > 0) {
                $('.js-soMe-spinner').remove();
            }

            var spinnerHtml = "<p class=\"js-soMe-spinner\">Vi oplever problemer med afhentning af sociale medier. Prøv igen senere.</p>";
            $('.js-some-elements').append($(spinnerHtml));

        }
    });
};

var $html =
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
        $('.js-some-elements').append($(spinnerHtml));
    } else {

        var pTag = $('.js-soMe-spinner');
        if (pTag != null && pTag.length > 0) {
            $('.js-soMe-spinner').remove();
        }
    }
};