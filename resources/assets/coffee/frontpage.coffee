# General
winHeight = $(window).height()

# Popups
$('.js-kontakt').click ->
    $('#kontakt').fadeIn(100)

$('.js-imprint').click ->
    $('#imprint').fadeIn(100)

$('.overlay .js-close').click ->
    $('.overlay').fadeOut(100)

# Mobile Nav
$('.js-toggleNav').click ->
    $('#mobile-nav').fadeIn()
    $(this).fadeOut()

$('.js-closeNav').click ->
    $('#mobile-nav').fadeOut()
    $('.js-toggleNav').fadeIn()

# Arrow
$('.js-arrow').click ->
    $("html, body").animate
        scrollTop: winHeight
    , 1500, 'easeInOutQuad'

# Arrow
$(window).scroll ->
    if($(window).scrollTop() > winHeight-1)
        # show nav
        $('nav').fadeIn()
        # change background color of mobile nav
        $('.mobile-nav-toggle').find('.bar').css('background-color', '#999999')
    else
        $('nav').fadeOut()
        $('.mobile-nav-toggle').find('.bar').css('background-color', '#999999')

# Image sizes
isRetinaDisplay = ->
    if window.matchMedia
        mq = window.matchMedia("only screen and (min--moz-device-pixel-ratio: 1.3), only screen and (-o-min-device-pixel-ratio: 2.6/2), only screen and (-webkit-min-device-pixel-ratio: 1.3), only screen  and (min-device-pixel-ratio: 1.3), only screen and (min-resolution: 1.3dppx)")
        return (mq && mq.matches || (window.devicePixelRatio > 1))

replaceImages = (retina) ->
    width = $('.container1280').width()
    switch width
        when 1280
            if not retina
                images = $('.js-resize')
                $.each images, ->
                    file = $(this).data('file')
                    filename = file.substr(0, file.length - 4)
                    extension = file.substr(file.length - 3)
                    $(this).attr('src', '/uploads/'+filename+'_1280.'+extension)
        when 960
            if retina
                images = $('.js-resize')
                $.each images, ->
                    file = $(this).data('file')
                    filename = file.substr(0, file.length - 4)
                    extension = file.substr(file.length - 3)
                    $(this).attr('src', '/uploads/'+filename+'_1920.'+extension)
            else
                images = $('.js-resize')
                $.each images, ->
                    file = $(this).data('file')
                    filename = file.substr(0, file.length - 4)
                    extension = file.substr(file.length - 3)
                    $(this).attr('src', '/uploads/'+filename+'_1280.'+extension)
        when 640
            if retina
                images = $('.js-resize')
                $.each images, ->
                    file = $(this).data('file')
                    filename = file.substr(0, file.length - 4)
                    extension = file.substr(file.length - 3)
                    $(this).attr('src', '/uploads/'+filename+'_1280.'+extension)
            else
                images = $('.js-resize')
                $.each images, ->
                    file = $(this).data('file')
                    filename = file.substr(0, file.length - 4)
                    extension = file.substr(file.length - 3)
                    $(this).attr('src', '/uploads/'+filename+'_640.'+extension)
        else
            if retina
                images = $('.js-resize')
                $.each images, ->
                    file = $(this).data('file')
                    filename = file.substr(0, file.length - 4)
                    extension = file.substr(file.length - 3)
                    $(this).attr('src', '/uploads/'+filename+'_640.'+extension)
            else
                images = $('.js-resize')
                $.each images, ->
                    file = $(this).data('file')
                    filename = file.substr(0, file.length - 4)
                    extension = file.substr(file.length - 3)
                    $(this).attr('src', '/uploads/'+filename+'_640.'+extension)

retina = isRetinaDisplay()
replaceImages(retina)
