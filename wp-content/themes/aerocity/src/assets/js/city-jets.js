//city-jets page
if($('body').hasClass('page-template-template-city-jets')) {
    //quotes-slider
    let $quotesSlider = $('#quotes-slider');
    $quotesSlider.slick({
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 5,
        arrows: true,
        draggable: false,
        dots: false,
        prevArrow: $('.slider-control__prev'),
        nextArrow: $('.slider-control__next'),
        responsive: [
            {
                breakpoint: 1600,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 1100,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    //on init
    $('#quotes-slider .slick-active').first().addClass('slick-active__slide');

    //after change
    mouseHandler();
    $quotesSlider
        .on('afterChange', function(event, slick, currentSlide, nextSlide) {
            $('.slick-slide').find('.quotes-slider__person-info').removeAttr('style');

            $('#quotes-slider .slick-slide').removeClass('slick-active__slide');
            $('#quotes-slider .slick-active').first().addClass('slick-active__slide');
            clickHandler();
            mouseHandler();
        });

    clickHandler();
    $(window).resize(function() {
        if(window.innerWidth > 768) {
            clickHandler();
        }
    });

    function clickHandler() {
        if(window.innerWidth > 768) {
            $('#quotes-slider .slick-active').on('click', function H() {
                $('#quotes-slider .slick-slide').removeClass('slick-active__slide');
                $(this).addClass('slick-active__slide');
            });
        }
    }

    function mouseHandler() {
        if(window.innerWidth > 768) {
            $('#quotes-slider .slick-active').hover(function H() {
                $('#quotes-slider .slick-active').find('.quotes-slider__person-info').css({
                    'background-color': 'transparent',
                    'color': '#fff'
                });
                $(this).find('.quotes-slider__person-info').css({
                    'background-color': '#fff',
                    'color': '#000'
                });
            });

            $('#quotes-slider').mouseleave(function H() {
                if(!$(this).hasClass('slick-active__slide')) {
                    $(this).find('.quotes-slider__person-info').css({
                        'background-color': 'transparent',
                        'color': '#fff'
                    });

                    $('.slick-active__slide').find('.quotes-slider__person-info').css({
                        'background-color': '#fff',
                        'color': '#000'
                    });
                }
            });
        }
    }

    //init map draggable
    let elem = document.querySelector('#body_drag_347'),
        draggie = new Draggabilly(elem, {
            // options...
        });

    //init courses slider
    $('#courses-slider').slick({
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
        prevArrow: $('.courses-slider__control-prev'),
        nextArrow: $('.courses-slider__control-next')
    });
}