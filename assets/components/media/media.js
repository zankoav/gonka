import './media.scss';
import './../_house-media-library/house-media-library.scss';
import $ from "jquery";
import './../../../node_modules/fancybox/dist/css/jquery.fancybox.css';
import fancybox from 'fancybox';

fancybox($);
import Swiper from "swiper";

$(document).ready(function () {
    $('.house-media-library__media-wrapper').fancybox();
});


if ($(window).width() < 768) {
    let slider = new Swiper('.media-library__container', {
        spaceBetween: 10,
        navigation: {
            nextEl: '.media-library__button-next',
            prevEl: '.media-library__button-prev',
        },
    });
}


var swiper = new Swiper('.media-video__container', {
    slidesPerView: 3,
    spaceBetween: 8,
    pagination: {
        el: '.media-video__pagination',
        clickable: true,
    },
    breakpoints: {
        // when window width is <= 320px
        320: {
            slidesPerView: 1,
        },
        // when window width is <= 480px
        768: {
            slidesPerView: 2
        }
    }
});
