//home page
if($('body').hasClass('home')) {
    //exploring-slider
    $('#exploring-slider').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        variableWidth: true,
        arrows: false,
        dots: false
    });

    //stories-slider
    let $slick = $('#stories-slider');
    $slick.slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        draggable: false,
        dots: true,
        customPaging(slider, i) {
            let thumb = $(slider.$slides[i]).data('title');
            return '<span class="dot-inner">' + thumb + '</span>';
        }
    });

    let time = 7,
        isPause,
        tick,
        percentTime,
        $bar = $('.slider-progress .progress');

    function startProgressbar() {
        resetProgressbar();
        percentTime = 0;
        isPause = false;
        tick = setInterval(interval, 10);
    }

    function interval() {
        percentTime += 1 / (time+0.1);
        $bar.css({
            width: percentTime+"%"
        });
        if(percentTime >= 100)
        {
            $slick.slick('slickNext');
            startProgressbar();
        }
    }

    function resetProgressbar() {
        $bar.css({
            width: 0+'%'
        });
        clearTimeout(tick);
    }

    startProgressbar();

    $('#stories-slider').on('beforeChange', function(){
        resetProgressbar();
        startProgressbar();
    });
}