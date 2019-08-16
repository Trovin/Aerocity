//contact page
formTab();
formSelect();

function formTab() {
    $('.form-tab__link').off('click');
    $('.form-tab__link').on('click', function H(e) {
        e.preventDefault();
        $('.form-tab__link').removeClass('form-tab__link_active');
        $(this).addClass('form-tab__link_active');

        let curentNum = $(this).attr('data-num'),
            activeEl = 'form-wrapper__item-' + curentNum;
        $('.form-wrapper__item').fadeOut(200);
        $('.' + activeEl).fadeIn(500);
    });
}

function formSelect() {
    $('.form-tabs__select-wrapper').off('change');
    $('.form-tabs__select-wrapper').on('change', 'select', function() {
        let val = $('.form-tabs__select-wrapper').find('.current').text(),
            newVal = val.toLocaleLowerCase();
        $('.form-wrapper__item').hide();
        $('.form-wrapper__item-' + newVal).fadeIn(400);
    });
}