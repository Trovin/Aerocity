//city-jets page
if($('body').hasClass('page-template-template-about')) {
    //quotes-slider
    let $tinelineSlider = $('#timeline-slider');
    $tinelineSlider.slick({
        infinite: true,
        slidesToShow: 6,
        slidesToScroll: 1,
        variableWidth: true,
        arrows: true,
        draggable: false,
        dots: false,
        prevArrow: $('.timeline-slider__control-prev'),
        nextArrow: $('.timeline-slider__control-next')
    });
}