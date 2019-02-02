import './registration.scss';
import $ from 'jquery';
import Inputmask from "inputmask";


$('.registration-form__group-submit-js-1').on('click', function (event) {
    event.preventDefault();

    if (!$(this).hasClass('registration-form__group-submit_active')) {
        $('.registration-form__group-submit-js-1').removeClass('registration-form__group-submit_active');
        $(this).addClass('registration-form__group-submit_active');
        $('.registration-form__command').toggleClass('registration-form__command_active');
    }
});

$('.registration-form__group-submit-js-2').on('click', function (event) {
    event.preventDefault();

    if (!$(this).hasClass('registration-form__group-submit_active')) {
        $('.registration-form__group-submit-js-2').removeClass('registration-form__group-submit_active');
        $(this).addClass('registration-form__group-submit_active');
        $('.registration-form__command-select').toggleClass('registration-form__command-select_active');
    }
});

let reg_phone = document.getElementById('reg_phone');
if (reg_phone) {
    // Inputmask({regex: String.raw`^\+375 (17|25|29|33|44) [0-9]{3} [0-9]{2} [0-9]{2}$`}).mask(reg_phone);
}
