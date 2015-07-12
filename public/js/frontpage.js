(function() {
  var winHeight;

  winHeight = $(window).height();

  $('.js-popup').click(function() {
    return $('#popup').fadeIn(100);
  });

  $('#popup .js-close').click(function() {
    return $('#popup').fadeOut(100);
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

}).call(this);

//# sourceMappingURL=frontpage.js.map