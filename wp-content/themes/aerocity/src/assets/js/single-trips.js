//single-trips page
if($('body').hasClass('single-trips')) {
    $('#trip-slider').slick({
        infinite: true,
        slidesToShow: 1,
        variableWidth: true,
        slidesToScroll: 1,
        arrows: true,
        draggable: false,
        dots: false,
        centerMode: true,
        prevArrow: $('.trip-slider__control-prev'),
        nextArrow: $('.trip-slider__control-next'),
        responsive: [
            {
                breakpoint: 961,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    variableWidth: false
                }
            },
            {
                breakpoint: 520,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    variableWidth: false,
                    centerMode: false
                }
            }
        ]
    });
}