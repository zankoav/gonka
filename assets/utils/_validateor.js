export const Validator = {
    ERROR_EMPTY_FIELD: 'Error: the required field is empty',
    ERROR_EMPTY_FIELD_RU: 'Ошибка: Поле не может быть пустым',
    ERROR_NAME_MIN_LENGTH_RU: 'Ошибка: Минимальное количество символов - 3',
    ERROR_NAME_MIN_LENGTH_6_RU: 'Ошибка: Минимальное количество символов - 6',
    ERROR_EMAIL_FIELD: 'Error: email is not valid',
    ERROR_EMAIL_FIELD_RU: 'Ошибка: email записан не верно',
    ERROR_EMAIL_CONFIRM_FAILED_RU: 'Ошибка: email не совпадают',
    ERROR_PASSWORD_CONFIRM_FAILED_RU: 'Ошибка: пароли не совпадают не совпадают',
    ERROR_PHONE_FAILED_RU: 'Ошибка: не верный формат телефона',
    email: function (email) {
        let re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    },
    phone: function (phone) {
        let re = /^\+375 (17|29|33|44) [0-9]{3} [0-9]{2} [0-9]{2}$/;
        return re.test(phone);
    }
};