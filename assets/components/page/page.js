import './page.scss';
import $ from 'jquery';
import {Validator} from "../../utils/_validateor";
import Inputmask from 'inputmask';

$('[name="user-sex"]').on('change', buttonPressed);

function buttonPressed() {
    let sexValue = $('[name="user-sex"]:checked').val();
    let html = changeSex(sexValue === 'male');
    $('[name="user_size"]').replaceWith(html);
}

function changeSex(isMan) {
    return isMan ?
        `<select name="user_size" id="reg_user_size" class="select-group">
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
                <option value="XXL">XXL</option>
            </select>` :
        `<select name="user_size" id="reg_user_size" class="select-group">
                <option value="XS">XS</option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
            </select>`;
}

$('.register [type="submit"]').on('click', function (event) {
    event.preventDefault();

    let data = isFormValid();
    if (data) {
        sendData(data);
    } else {
        console.log('error validation form');
    }
});

function sendData(data) {
    let $submit = $('[type="submit"]');
    $submit.html('Регистрация...').off('click',buttonPressed);

    data['action'] = 'registration_user';

    $.ajax(landing_ajax.url, {
        data: data,
        method: 'post',
        dataType: 'json',
        success: function (response) {
            $submit.html('Зарегистрироваться').off('click',buttonPressed)
            if(response.status == 2){
                alert('Пользователь с таким email уже существует. Авторизируйтесь.');
            }else if(response.status == 1){
                alert('Поздравляем с регистрацией! Для подтверждения аккаунта перейдите по ссылке отправленной вам в письме на почту');
            }else{
                alert('Ошибка соединения, попробуйте позже');
            }

        },
        error: function (x) {
            $submit.html('Зарегистрироваться').off('click',buttonPressed);
            alert('Ошибка соединения, попробуйте позже');
            console.log(x);
        }
    });
}

function isFormValid() {

    let $name = $('.register [name="username"]');
    let $surname = $('.register [name="user-last_name"]');
    let $country = $('.register [name="user_country"]');
    let $user_date = $('.register [name="user-date"]');
    let $user_sex = $('.register [name="user-sex"]:checked');
    let $user_size = $('.register [name="user_size"]');
    let $user_email = $('.register [name="email"]');
    let $user_email_confirm = $('.register [name="email_confirm"]');
    let $user_phone = $('.register [name="phone"]');
    let $user_password = $('.register [name="password"]');
    let $user_password_confirm = $('.register [name="password_confirm"]');


    let name = $name.val();
    let surname = $surname.val();
    let country = $country.val();
    let user_date = $user_date.val();
    let user_sex = $user_sex.val();
    let user_size = $user_size.val();
    let user_email = $user_email.val();
    let user_email_confirm = $user_email_confirm.val();
    let user_phone = $user_phone.val();
    let user_password = $user_password.val();
    let user_password_confirm = $user_password_confirm.val();

    

    if (name.length === 0) {
        let $parent = $name.parent();
        $parent.find('.contacts__form-group-message').html(Validator.ERROR_EMPTY_FIELD_RU);
        return;
    } else if (name.length <= 3) {
        let $parent = $name.parent();
        $parent.find('.contacts__form-group-message').html(Validator.ERROR_NAME_MIN_LENGTH_RU);
        return;
    } else {
        let $parent = $name.parent();
        $parent.find('.contacts__form-group-message').html('');
    }

    if (surname.length === 0) {
        let $parent = $surname.parent();
        $parent.find('.contacts__form-group-message').html(Validator.ERROR_EMPTY_FIELD_RU);
        return;
    } else if (surname.length <= 3) {
        let $parent = $surname.parent();
        $parent.find('.contacts__form-group-message').html(Validator.ERROR_NAME_MIN_LENGTH_RU);
        return;
    } else {
        let $parent = $surname.parent();
        $parent.find('.contacts__form-group-message').html('');
    }

    if (user_date.length === 0) {
        let $parent = $user_date.parent();
        $parent.find('.contacts__form-group-message').html(Validator.ERROR_EMPTY_FIELD_RU);
        return;
    } else {
        let $parent = $user_date.parent();
        $parent.find('.contacts__form-group-message').html('');
    }

    if (user_email.length === 0) {
        let $parent = $user_email.parent();
        $parent.find('.contacts__form-group-message').html(Validator.ERROR_EMPTY_FIELD_RU);
        return;
    }else if (!Validator.email(user_email)) {
        let $parent = $user_email.parent();
        $parent.find('.contacts__form-group-message').html(Validator.ERROR_EMAIL_FIELD_RU);
        return;
    } else {
        let $parent = $user_email.parent();
        $parent.find('.contacts__form-group-message').html('');
    }

    if (user_email_confirm.length === 0) {
        let $parent = $user_email_confirm.parent();
        $parent.find('.contacts__form-group-message').html(Validator.ERROR_EMPTY_FIELD_RU);
        return;
    }else if (!Validator.email(user_email_confirm)) {
        let $parent = $user_email_confirm.parent();
        $parent.find('.contacts__form-group-message').html(Validator.ERROR_EMAIL_FIELD_RU);
        return;
    }else if (user_email_confirm !== user_email) {
        let $parent = $user_email_confirm.parent();
        $parent.find('.contacts__form-group-message').html(Validator.ERROR_EMAIL_CONFIRM_FAILED_RU);
        return;
    } else {
        let $parent = $user_email_confirm.parent();
        $parent.find('.contacts__form-group-message').html('');
    }

    if (user_phone.length === 0) {
        let $parent = $user_phone.parent();
        $parent.find('.contacts__form-group-message').html(Validator.ERROR_EMPTY_FIELD_RU);
        return;
    }else if (!Validator.numbers(user_phone)) {
        let $parent = $user_phone.parent();
        $parent.find('.contacts__form-group-message').html(Validator.ERROR_PHONE_ONLY_NUMBERS_FAILED_RU);
        return;
    } else {
        let $parent = $user_phone.parent();
        $parent.find('.contacts__form-group-message').html('');
    }


    if (user_password.length === 0) {
        let $parent = $user_password.parent();
        $parent.find('.contacts__form-group-message').html(Validator.ERROR_EMPTY_FIELD_RU);
        return;
    }else if (user_password.length <= 5) {
        let $parent = $user_password.parent();
        $parent.find('.contacts__form-group-message').html(Validator.ERROR_NAME_MIN_LENGTH_6_RU);
        return;
    } else {
        let $parent = $user_password.parent();
        $parent.find('.contacts__form-group-message').html('');
    }

    if (user_password_confirm.length === 0) {
        let $parent = $user_password_confirm.parent();
        $parent.find('.contacts__form-group-message').html(Validator.ERROR_EMPTY_FIELD_RU);
        return;
    }else if (user_password_confirm !== user_password) {
        let $parent = $user_password_confirm.parent();
        $parent.find('.contacts__form-group-message').html(Validator.ERROR_PASSWORD_CONFIRM_FAILED_RU);
        return;
    } else {
        let $parent = $user_password_confirm.parent();
        $parent.find('.contacts__form-group-message').html('');
    }



    let data = {
        name: name,
        surname: surname,
        country: country,
        user_date: user_date,
        user_sex: user_sex,
        user_size: user_size,
        user_email: user_email,
        user_email_confirm: user_email_confirm,
        user_phone: user_phone,
        user_password: user_password,
        user_password_confirm: user_password_confirm
    };

    return data;
}

let reg_phone = document.getElementById('reg_phone');
if(reg_phone){
    // Inputmask({ regex: String.raw`^\+375 (17|25|29|33|44) [0-9]{3} [0-9]{2} [0-9]{2}$`}).mask(reg_phone);
}
