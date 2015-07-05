(function() {
  var winHeight;

  winHeight = $(window).height();

  $('.js-popup').click(function() {
    return $('#popup').fadeIn(100);
  });

  $('#popup .js-close').click(function() {
    return $('#popup').fadeOut(100);
  });

  $('.js-arrow').click(function() {
    return $("html, body").animate({
      scrollTop: winHeight
    }, 1500, 'easeInOutQuad');
  });

  $(window).scroll(function() {
    if ($(window).scrollTop() > winHeight - 1) {
      return $('nav').fadeIn();
    } else {
      return $('nav').fadeOut();
    }
  });

}).call(this);

//# sourceMappingURL=frontpage.js.map