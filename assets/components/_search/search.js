import './search.scss';
import $ from 'jquery';

$('.header-top__search-button').on('click', function () {
    $(this).toggleClass('header-top__search-button_active');
    $('.header-top__search_mobile_fixed').slideToggle();
});