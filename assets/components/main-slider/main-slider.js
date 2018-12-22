import './main-slider.scss';
import Swiper from 'swiper';
let swiper = new Swiper('.main-slider', {
    speed: 600,
    parallax: true,
    pagination: {
        el: '.main-slider__pagination',
        clickable: true,
    }
});
