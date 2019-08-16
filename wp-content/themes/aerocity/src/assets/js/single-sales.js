//single-sales page
if($('body').hasClass('single-sales')) {
    $('#sales-slider').slick({
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
        prevArrow: $('.sales-slider__control-prev'),
        nextArrow: $('.sales-slider__control-next')
    });
}