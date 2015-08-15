(function() {
  var isRetinaDisplay, replaceImages, retina, winHeight;

  winHeight = $(window).height();

  $('.js-kontakt').click(function() {
    return $('#kontakt').fadeIn(100);
  });

  $('.js-imprint').click(function() {
    return $('#imprint').fadeIn(100);
  });

  $('.overlay .js-close').click(function() {
    return $('.overlay').fadeOut(100);
  });

  $('.js-toggleNav').click(function() {
    $('#mobile-nav').fadeIn();
    return $(this).fadeOut();
  });

  $('.js-closeNav').click(function() {
    $('#mobile-nav').fadeOut();
    return $('.js-toggleNav').fadeIn();
  });

  $('.js-arrow').click(function() {
    return $("html, body").animate({
      scrollTop: winHeight
    }, 1500, 'easeInOutQuad');
  });

  $(window).scroll(function() {
    if ($(window).scrollTop() > winHeight - 1) {
      $('nav').fadeIn();
      return $('.mobile-nav-toggle').find('.bar').css('background-color', 'white');
    } else {
      $('nav').fadeOut();
      return $('.mobile-nav-toggle').find('.bar').css('background-color', '#777777');
    }
  });

  isRetinaDisplay = function() {
    var mq;
    if (window.matchMedia) {
      mq = window.matchMedia("only screen and (min--moz-device-pixel-ratio: 1.3), only screen and (-o-min-device-pixel-ratio: 2.6/2), only screen and (-webkit-min-device-pixel-ratio: 1.3), only screen  and (min-device-pixel-ratio: 1.3), only screen and (min-resolution: 1.3dppx)");
      return mq && mq.matches || (window.devicePixelRatio > 1);
    }
  };

  replaceImages = function(retina) {
    var images, width;
    width = $('.container1280').width();
    switch (width) {
      case 1280:
        if (!retina) {
          images = $('.js-resize');
          return $.each(images, function() {
            var extension, file, filename;
            file = $(this).data('file');
            filename = file.substr(0, file.length - 4);
            extension = file.substr(file.length - 3);
            return $(this).attr('src', '/uploads/' + filename + '_1280.' + extension);
          });
        }
        break;
      case 960:
        if (retina) {
          images = $('.js-resize');
          return $.each(images, function() {
            var filename;
            filename = $(this).data('file');
            filename = filename.substring(0, filename.length - 4);
            return $(this).attr('src', '/resizer/' + filename + '/1920');
          });
        } else {
          images = $('.js-resize');
          return $.each(images, function() {
            var filename;
            filename = $(this).data('file');
            filename = filename.substring(0, filename.length - 4);
            return $(this).attr('src', '/resizer/' + filename + '/960');
          });
        }
        break;
      case 640:
        if (retina) {
          images = $('.js-resize');
          return $.each(images, function() {
            var filename;
            filename = $(this).data('file');
            filename = filename.substring(0, filename.length - 4);
            return $(this).attr('src', '/resizer/' + filename + '/1280');
          });
        } else {
          images = $('.js-resize');
          return $.each(images, function() {
            var filename;
            filename = $(this).data('file');
            filename = filename.substring(0, filename.length - 4);
            return $(this).attr('src', '/resizer/' + filename + '/640');
          });
        }
        break;
      default:
        if (retina) {
          images = $('.js-resize');
          return $.each(images, function() {
            var filename;
            filename = $(this).data('file');
            filename = filename.substring(0, filename.length - 4);
            return $(this).attr('src', '/resizer/' + filename + '/800');
          });
        } else {
          images = $('.js-resize');
          return $.each(images, function() {
            var filename;
            filename = $(this).data('file');
            filename = filename.substring(0, filename.length - 4);
            return $(this).attr('src', '/resizer/' + filename + '/400');
          });
        }
    }
  };

  retina = isRetinaDisplay();

  replaceImages(retina);

}).call(this);

//# sourceMappingURL=frontpage.js.map