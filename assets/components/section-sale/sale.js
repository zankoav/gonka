import './sale.scss';
import Swiper from 'swiper';

let saleSwiper = new Swiper('.sale__swiper', {
    slidesPerView: 1,
    spaceBetween: 10,
    // Responsive breakpoints
    breakpointsInverse: true,
    navigation: {
        nextEl: '.sale__button_next',
        prevEl: '.sale__button_prev',
    },
    breakpoints: {
        // when window width is >= 768px
        768: {
            slidesPerView: 2,
            spaceBetween: 30
        },
        // when window width is >= 1024px
        1024: {
            slidesPerView: 3,
            spaceBetween: 40
        }
    }
});