//sub-menu actions
$('.modal-icon').on('click', function H() {
    let icon = $('.modal-icon'),
        menu = $('.modal-menu');

    $(this).toggleClass('modal-icon_active');
    $('html').toggleClass('disabled-scroll');
    $('body').toggleClass('disabled-scroll');
    $(this).find('.modal-icon__image').toggleClass('modal-icon__image_active');

    if(icon.hasClass('modal-icon_active')) {
        menu.fadeIn(200);
        menu.addClass('modal-menu_active');
    }
    if(!icon.hasClass('modal-icon_active')) {
        menu.fadeOut(800);
        menu.removeClass('modal-menu_active');
    }

    $('.modal-menu__images').toggleClass('modal-menu__images_active');
    $('.modal-nav').toggleClass('modal-nav_active');
    $('.social-nav_header').toggleClass('social-nav_active');
});