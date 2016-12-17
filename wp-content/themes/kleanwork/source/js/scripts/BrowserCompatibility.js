

jQuery(document).ready(function () {

    CheckBrowserVideoCompatibility();




function CheckBrowserVideoCompatibility() {

    var banners = [jQuery('.js-top-banner'), jQuery('.js-video-band')];

    if (banners.length > 0) {

        jQuery(banners).each(function (k, v) {

            var videoElement = jQuery(v).find('.js-band-banner-video');
/*            
            if (videoElement == null || videoElement.length <= 0) {
                Display("", videoElement);
                return;
            }
*/
            var picshw = jQuery(v).find('.js-show-picture-banner');
            if (picshw != null && picshw.length > 0) {
                Display("", picshw);
                return;
            }

            var pic = jQuery(v).find('.js-banner-picture');
            if (pic == null || pic.length <= 0) {
                Display("", pic);
                return;
            }

            var vid = document.createElement('video');

            var vidMp4Type = "video/mp4";
            var codMp4Type = "avc1.4D401E, mp4a.40.2";
            var vidWebmType = "video/webm";
            var codWebmType = "vp8.0, vorbis";

            isSuppMp4 = vid.canPlayType(vidMp4Type + ';codecs="' + codMp4Type + '"');
            isSuppWebm = vid.canPlayType(vidWebmType + ';codecs="' + codWebmType + '"');

            if (isSuppMp4 == false && isSuppWebm == false) {
                Display("", pic);
                return;
            }

            Display("show", videoElement);

        });
    }

}

function Display(supported, element) {
    if (supported.length == 0) {
        jQuery(element).removeClass('hide');
    } else {
        jQuery(element).removeClass('hide');
    }
}

});