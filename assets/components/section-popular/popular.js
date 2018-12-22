import './popular.scss';
import $ from 'jquery';
import Swiper from 'swiper';



popularSlider();


function popularSlider(){

    if ($(window).width() < 768) {

        $($('.product_banner').parent()).remove();

        let saleSwiper = new Swiper('.popular__swiper', {
            slidesPerView: 1,
            spaceBetween: 10,
            // Responsive breakpoints
            breakpointsInverse: true,
            navigation: {
                nextEl: '.popular__button_next',
                prevEl: '.popular__button_prev',
            }
        });

    }
}
