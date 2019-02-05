import './header-bottom.scss';
import $ from 'jquery';

let $time = $('.header-bottom__registration-time');

let endSeconds = parseInt($time.data('time'));

const day = 86400,
    hour = 3600,
    minute = 60;

setInterval(function () {

    // let startSeconds = new Date().getTime() / 1000;
    // let diff = parseInt(endSeconds - startSeconds);
    let days = parseInt(endSeconds / day);
    let hoursDif = endSeconds % day;
    let hours = parseInt(hoursDif / hour);
    let diffMinutes = hoursDif % hour;
    let minutes = parseInt(diffMinutes / minute);
    let seconds = diffMinutes % minute;

    if (days < 10) {
        days = '0' + days;
    }

    if (hours < 10) {
        hours = '0' + hours;
    }

    if (minutes < 10) {
        minutes = '0' + minutes;
    }

    if (seconds < 10) {
        seconds = '0' + seconds;
    }

    $time.html(`${days}д. | ${hours}ч. | ${minutes}м. | ${seconds}с.`);

    endSeconds--;

}, 1000);

