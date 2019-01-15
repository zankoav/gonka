import './header-bottom.scss';
import $ from 'jquery';

let $time = $('.header-bottom__registration-time');
let endSeconds = new Date($time.data('time')).getTime() / 1000;

const day = 86400,
    hour = 3600,
    minute = 60;

setInterval(function () {
    let startSeconds = new Date().getTime() / 1000;
    let diff = parseInt(endSeconds - startSeconds);
    let days = parseInt(diff / day);
    let hoursDif = diff % day;
    let hours = parseInt(hoursDif / hour);
    let diffMinutes = hoursDif % hour;
    let minutes = parseInt(diffMinutes / minute);
    let seconds = diffMinutes % minute;

    $time.html(`${days}/${hours}/${minutes}/${seconds}`);
}, 1000);

