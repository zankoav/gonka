import './header-top.scss';
import $ from 'jquery';

$('.header-top__menu-button').on('click', function () {
    $(this).toggleClass('header-top__menu-button_active');
});