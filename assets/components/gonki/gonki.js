import './gonki.scss';
import $ from 'jquery';

$('.gonki__tabs-item').on('click', function (event) {
    event.preventDefault();
    if (!$(this).hasClass('gonki__tabs-item_active')) {
        $('.gonki__tabs-item').removeClass('gonki__tabs-item_active');
        $('.gonki__list').removeClass('gonki__list_active');
        $(this).addClass('gonki__tabs-item_active');

        if ($(this).hasClass('gonki__tabs-item_early')) {
            $('.gonki__list_early').addClass('gonki__list_active');
        } else {
            $('.gonki__list_archive').addClass('gonki__list_active');
        }
    }
});