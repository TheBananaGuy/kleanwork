$(window).load(function () {
    var isRetina = window.devicePixelRatio > 1;
    var viewport = $('body').innerWidth();
    var divideby = 200;
    if (viewport < 1000) divideby = 100;

    // trying to set a proper width for images, taking into account hidpi screens
    $("img.b-lazy, img.slick-lazy").each(function () {
        var $t = $(this);
        var dataAttr = "data-src";
        if ($t.hasClass("slick-lazy")) dataAttr = "data-lazy";
        var src = $t.attr(dataAttr);
        if (src !== undefined && src.indexOf("rnd=") > 0 && src.indexOf("width=") < 0) {
            var tagWidth = $t.attr("width");
            var tagHeight = $t.attr("height");
            var currentWidth = $t.width();
            if (tagWidth == undefined || currentWidth > viewport || tagWidth > viewport) {
                if (currentWidth > viewport || tagWidth > viewport) currentWidth = viewport;
                $(this).width(currentWidth);
                var newHeight = Math.floor((currentWidth / tagWidth) * tagHeight);
                $(this).css("maxHeight", newHeight);
                currentWidth = Math.ceil(currentWidth / divideby) * divideby;
            }
            var newSrc = src + "&width=" + currentWidth;
            if (isRetina && $t.hasClass("b-lazy")) newSrc += "|" + src + "&width=" + (currentWidth * 2);
            $t.attr(dataAttr, newSrc);
        }
    });

    var bLazy = new Blazy({
        offset: 1000, // Loads images 1000px before they're visible
        breakpoints: [{
            width: 341, // max-width
            src: 'data-src-palm-small'
        },
          {
              width: 680, // max-width
              src: 'data-src-palm'
          },
          {
              width: 960, // max-width
              src: 'data-src-lap'
          },
          {
              width: 1280, // max-width
              src: 'data-src-desk'
          },
          {
              width: 1920, // max-width
              src: 'data-src-desk-large'
          }],

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
        bLazy.revalidate();
    }, 100);

    $('div[data-slick]').slick({
        'slidesToShow': 1,
        'slidesToScroll': 1,
        'autoplay': false,
        'infinite': true,
        'arrows': true,
        'lazyLoad': 'ondemand',
        'adaptiveHeight': true,
        'prevArrow': '<div class="slick-arrow slick-arrow--back"><i class="icon-right-open"></i></div>',
        'nextArrow': '<div class="slick-arrow slick-arrow--forward"><i class="icon-right-open"></i></div>'
    });

    //TODO: script to load background images after load, should take into account scrolling
    $(".b-lazy-bg").each(function () {
        var s = $(this).attr("data-src");
        if (viewport > 0) {
            if (isRetina) viewport = viewport * 2;
            var width = Math.ceil(viewport / divideby) * divideby;
            if (s.indexOf("rnd=") > 0 && s.indexOf("width=") < 0) s += "&width=" + width;
        }
        $(this).attr("style", "background-image: url(" + s.replace(/ /g, /%20/) + ");");
    });

    // load tracking scripts after other scripts, add font
    var el = document.createElement("script");
    el.src = "/assets/build/scripts/tracking.js";
    document.body.appendChild(el);
    el = document.createElement("link");
    el.rel = "stylesheet";
    el.href = "https://cloud.typography.com/6939534/6190552/css/fonts.css";
    document.body.appendChild(el);
});