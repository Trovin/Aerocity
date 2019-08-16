import 'jquery-nice-select/js/jquery.nice-select';
import objectFitImages from 'object-fit-images';
import AOS from 'aos';

//init parallax animation on scroll
function parallaxImage(section) {
    $(window).scroll(function H() {
        let backgroundSize = section.css('backgroundSize'),
            sctollToSection = section.offset().top - 300,
            backgroundSizeY = backgroundSize.split(' ')[1],
            backgroundPositionY2 = ($(this).scrollTop() - sctollToSection) / 4;
        if(backgroundPositionY2 <= 0) {
            backgroundPositionY2 = 0;
        }
        let trueH = 0 + backgroundPositionY2;
        section.css('background-position-Y', trueH + 'px');
    });
}

if($('body').hasClass('home')) {
    parallaxImage($('.parallax-js--image'));
}

if($('body').hasClass('page-template-template-about')) {
    parallaxImage($('.parallax-js--image2'));
}

//init animation on scroll
AOS.init({
    disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
    startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
    initClassName: 'aos-init', // class applied after initialization
    animatedClassName: 'aos-animate', // class applied on animation
    useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
    disableMutationObserver: false, // disables automatic mutations' detections (advanced)
    debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
    throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)
    // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
    offset: 120, // offset (in px) from the original trigger point
    delay: 0, // values from 0 to 3000, with step 50ms
    duration: 400, // values from 0 to 3000, with step 50ms
    easing: 'ease', // default easing for AOS animations
    once: false, // whether animation should happen only once - while scrolling down
    mirror: false, // whether elements should animate out while scrolling past them
    anchorPlacement: 'top-bottom' // defines which position of the element regarding to window should trigger the animation

});

//init nice select
$('select').niceSelect();

$(document).bind('gform_post_render', function() {
    $('select').niceSelect();
});

//anchor links
let links = $('.anchor-link');
if(links.length > 0) {
    $('.anchor-link').click(function H(e){
        e.preventDefault();
        let scrollEl = $(this).attr('href');
        if($(scrollEl).length !== 0) {
            let destination = $(scrollEl).offset().top;
            $('html, body').animate({ scrollTop: destination }, 400);
            return false;
        }
    });
}

//support object-fit to IE
let someImages = document.querySelectorAll('img');
objectFitImages(someImages);


//map marker
$('.drag_element').on('hover', function H() {
    $(this).find('.pins_animation.ihotspot_pulse').hide();
});

$('.drag_element').on('mouseleave', function H() {
    $(this).find('.pins_animation.ihotspot_pulse').fadeIn(400);
});