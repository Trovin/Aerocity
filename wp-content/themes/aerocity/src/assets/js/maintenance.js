//maintenance page
if($('body').hasClass('page-template-template-maintenance')) {
    $('#expertise-slider').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        draggable: false,
        dots: true,
        customPaging(slider, i) {
            let thumb = $(slider.$slides[i]).data('title');
            return '<span class="dot-inner">' + thumb + '</span>';
        },
        prevArrow: $('.expertise-slider__control-prev'),
        nextArrow: $('.expertise-slider__control-next')
    });
}