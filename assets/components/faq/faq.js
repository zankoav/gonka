import './faq.scss';
import $ from 'jquery';

$('.faq__title').on('click', function (event) {
    event.preventDefault();
    $(this).toggleClass('faq__title_active');
    let $parent = $(this).parent();
    $parent.find('.content').slideToggle();
});