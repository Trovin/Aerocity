//modal action
$('.btn_updates').on('click', function H() {
    $('.modal').fadeIn(350);
    $('body').addClass('disabled-scroll');
});

$('#close-modal').on('click', function H() {
    $('.modal').fadeOut(350);
    $('body').removeClass('disabled-scroll');
});

//partner modal action
$('.partner-item').on('click', function H() {
    $('.modal-partnership').hide();
    let attr = $(this).attr('data-partner-modal'),
        currentModal = '.modal-partnership_' + attr;
    $(currentModal).fadeIn(400);
    $('body').addClass('disabled-scroll');
});

$('.modal-partnership').on('click', function(evt) {
    evt.stopPropagation();
});

$('.partner-item__nav_close').on('click', function H(evt) {
    evt.stopPropagation();
    $('body').removeClass('disabled-scroll');
    $('.modal-partnership').fadeOut(200);
});

//team modal action
$('.about-team__item').on('click', function H() {
    $('.modal-team').hide();
    let attr = $(this).attr('data-team-modal'),
        currentModal = '.modal-team_' + attr;
    $(currentModal).fadeIn(400);
    $('body').addClass('disabled-scroll');
});

$('.modal-team').on('click', function(evt) {
    evt.stopPropagation();
});

$('.team-item__nav-close').on('click', function H(evt) {
    evt.stopPropagation();
    $('body').removeClass('disabled-scroll');
    $('.modal-team').fadeOut(200);
});