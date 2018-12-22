import './categories.scss';
import Swiper from 'swiper';
import $ from "jquery";

let menuProjects = null;
let activeMenu = $('[data-active-menu]').data('active-menu');
console.log(activeMenu);

if (screen.width < 768) {
    menuProjects = new Swiper('.categories-container', {
        initialSlide: activeMenu,
        centeredSlides: true,
        slidesPerView: 'auto',
        spaceBetween: 0,
        freeMode: true,
    });
}

$(window).resize(function () {
    menuProjects.destroy(false, true);
    menuProjects.init();
});

// $($('.swiper-menu__slide')[activeMenu]).addClass('swiper-menu__slide_active');