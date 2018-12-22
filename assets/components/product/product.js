import './product.scss';
import './../../../node_modules/fancybox/dist/css/jquery.fancybox.css';
import $ from 'jquery';
import fancybox from 'fancybox';
fancybox($);

$(document).ready(function() {
    $('.product__fancybox').fancybox();
});