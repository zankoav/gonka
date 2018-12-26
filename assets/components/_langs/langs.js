import './langs.scss';
import $ from 'jquery';
import './../../utils/_cookies';

const LANG_KEY = 'lang';

$('.langs__item a').on('click', function (event) {
    event.preventDefault();
    let lang = $(this).data('lang');
    let currentLang = $('.langs__current').data('current-lang');

    if (lang !== currentLang) {
        setCookie(LANG_KEY, lang);
        window.location.reload(true);
    }else{
        $('.langs').toggleClass('langs_active');
    }
});

$('.langs__current').on('click', function (event) {
    event.preventDefault();
    $('.langs').toggleClass('langs_active');
});