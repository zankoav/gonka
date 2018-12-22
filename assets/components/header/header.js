import './header.scss';
import $ from 'jquery';


$('.header__menu-button').on('click', function(){
    $(this).toggleClass('header__menu-button_active');
    $('.header__menu-inner').toggleClass('header__menu-inner_active');
});