import './accordion-mixed.scss';
import './../_house-booking/house-booking';
import './../_house-description/house-description';
import {initMediaSwiper} from './../_house-media-library/house-media-library';
import $ from "jquery";
import './../../utils/jquery.zoom.min';

import './../../../node_modules/fancybox/dist/css/jquery.fancybox.css';
import fancybox from 'fancybox';
fancybox($);

$(document).ready(function() {
    $('.house-media-library__media-wrapper').fancybox();
});

$("[data-mixed-tab]").click(function () {

    let idTab = $(this).data("mixed-tab");

    if ($(window).width() >= 768) {
        if($(this).hasClass('accordion-mixed__tab--active')){
            return;
        }
        $("[data-mixed-tab]").removeClass('accordion-mixed__tab--active');
        $(`[data-mixed-tab=${idTab}]`).addClass('accordion-mixed__tab--active');
        $("[data-mixed-conent]").removeClass('accordion-mixed__content--active');
        $(`[data-mixed-conent=${idTab}]`).addClass('accordion-mixed__content--active');
    } else {



        if($(this).hasClass('accordion-mixed__tab--active')){
            $(this).removeClass('accordion-mixed__tab--active');
            $(".accordion-mixed__content--active").slideUp(function () {
                $(this).removeClass("accordion-mixed__content--active").removeAttr('style');
            });
        }else{

            $("[data-mixed-tab]").removeClass('accordion-mixed__tab--active');
            $(`[data-mixed-tab=${idTab}]`).addClass('accordion-mixed__tab--active');

            $(".accordion-mixed__content--active").slideUp(function () {
                $(this).removeClass("accordion-mixed__content--active").removeAttr('style');
            });

            $(`[data-mixed-conent=${idTab}]`).slideDown(function () {
                if(idTab === 2){
                    initMediaSwiper();
                }
                $(this).addClass("accordion-mixed__content--active").removeAttr('style');
            });
        }
    }
});


$('#map1').zoom({
    on:'click'
});

$('#map2').zoom({
    on:'click'
});
