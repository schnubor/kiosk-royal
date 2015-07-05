# General
winHeight = $(window).height()

# Popup
$('.js-popup').click ->
    $('#popup').fadeIn(100)

$('#popup .js-close').click ->
    $('#popup').fadeOut(100)

# Arrow
$('.js-arrow').click ->
    $("html, body").animate
        scrollTop: winHeight
    , 1500, 'easeInOutQuad'

# Arrow
$(window).scroll ->
    if($(window).scrollTop() > winHeight-1)
        $('nav').fadeIn()
    else
        $('nav').fadeOut()
