import './house-media-library.scss';
import Swiper from "swiper";

let slider;

export function initMediaSwiper() {

    if (slider) {
        return;
    }

    slider = new Swiper('.house-media-library__container', {
        slidesPerView: 'auto',
        centeredSlides: true,
        spaceBetween: 10,
        navigation: {
            nextEl: '.house-media-library__button-next',
            prevEl: '.house-media-library__button-prev',
        },
    });
}
