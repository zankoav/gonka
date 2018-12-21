import './top-header.scss';
import $ from 'jquery';
import './../../utils/_cookies';

let $currentLang = $('[data-current-lang]');

$('[data-lang]').on('click', function () {
    let lang = $(this).data("lang");

    if($currentLang.data('current-lang') !== lang){
        setCookie("lang", lang);
        window.location.reload(true);
    }
});

