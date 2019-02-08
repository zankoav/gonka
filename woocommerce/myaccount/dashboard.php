<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.6.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

$bettaUser = Betta\User::getCurrent();

if (isset($_POST['firstName'])) {

    $errors = [];

    foreach (['firstName', 'lastName', 'bDate', 'phone', 'gender', 'user_size', 'user_country'] as $requiredField) {
        $_POST[$requiredField] = trim($_POST[$requiredField]);

        if (empty($_POST[$requiredField])) {
            $errors[$requiredField] = 'Это поле обязательное';
        }
    }

    if (!is_numeric($_POST['phone'])) {
        $errors['phone'] = 'Вводите только цифры';
    }

    if (!in_array($_POST['gender'], ['male', 'female'])) {
        $errors['gender'] = 'Выберите пол';
    }

    if (!in_array($_POST['user_country'], ['Беларусь', 'Россия', 'Польша', 'Украина'])) {
        $errors['user_country'] = 'Выберите страну';
    }

    if ($_POST['gender'] == 'male' && $_POST['user_size'] == 'XS') {
        $errors['user_size'] = 'Нет таких размеров для мужчик';
    }

    if ($_POST['gender'] == 'female' && $_POST['user_size'] == 'XXL') {
        $errors['user_size'] = 'Нет таких размеров для женщин';
    }

    if (!$errors) {
        update_user_meta( $bettaUser->getId(), 'user_country', esc_attr( $_POST['user_country'] ) );
        update_user_meta( $bettaUser->getId(), 'user_date', esc_attr( $_POST['bDate'] ) );
        update_user_meta( $bettaUser->getId(), 'user_sex', esc_attr( $_POST['gender'] ) );
        update_user_meta( $bettaUser->getId(), 'user_size', esc_attr( $_POST['user_size'] ) );
        update_user_meta( $bettaUser->getId(), 'user_phone', esc_attr( $_POST['phone'] ) );
        update_user_meta( $bettaUser->getId(), 'user_name', esc_attr( $_POST['firstName']) );
        update_user_meta( $bettaUser->getId(), 'user_surname', esc_attr( $_POST['lastName'] ) );

        $bettaUser->reloadMeta();
        wc_add_notice('Профиль обновлён.');
    }
}
?>

<style>
    .registration-form__group-submit {
        padding: .75rem 2rem !important;
        background: #e8471e;
        border: none !important;
        border-radius: 0 !important;
        color: #fff !important;
        font-size: 16px !important;
        font-family: Exo\ 2, sans-serif;
        font-weight: 700;
        text-transform: uppercase;
        -webkit-transition: .4s;
        -o-transition: .4s;
        transition: .4s;
        cursor: pointer;
    }

    .registration-form button {
        margin-top: 2rem;
    }

    .registration-form__group-submit:hover {
        background: #b43a1a;
    }

    .my-profile input, .my-profile select {
        border-radius: 0 !important;
    }

    .my-profile__title {
        padding: 10px 0;
    }

    .my-profile__value {
        padding: 10px;
    }

    .account-content .woocommerce .my-profile__group {
        display: block !important;
    }

    .account-content .woocommerce .my-profile__group input[type=radio] {
        display: inline;
        width: 20px;
        margin-left: 20px;
        cursor: pointer;
    }

    .account-content .woocommerce .my-profile__group .radio-label {
        cursor: pointer;
        margin-right: 20px;
        text-transform: uppercase;
        text-decoration: underline;
    }

</style>
<div class="my-profile">
    <?php wc_print_notices(); ?>
    <form method="post" class="registration__form">
        <div class="my-profile__group">
            <span class="my-profile__title">Email:</span>
            <span class="my-profile__value"><?= $bettaUser->getEmail() ?></span>
        </div>
        <div class="my-profile__group">
            <span class="my-profile__title">Имя:</span>
            <input type="text" name="firstName" value="<?= isset($_POST['firstName']) ? $_POST['firstName'] : $bettaUser->getFirstName() ?>">
            <?php if ($errors['firstName']): ?>
                <span style="color: #e8471e;font-size: 12px;display: block;margin-top:4px;">Ошибка: <?= $errors['firstName'] ?></span>
            <?php endif ?>
        </div>
        <div class="my-profile__group">
            <span class="my-profile__title">Фамилия:</span>
            <input type="text" name="lastName" value="<?= isset($_POST['lastName']) ? $_POST['lastName'] : $bettaUser->getLastName() ?>">
            <?php if ($errors['lastName']): ?>
                <span style="color: #e8471e;font-size: 12px;display: block;margin-top:4px;">Ошибка: <?= $errors['lastName'] ?></span>
            <?php endif ?>
        </div>
        <div class="my-profile__group">
            <span class="my-profile__title">Возраст:</span>
            <input type="date" name="bDate" value="<?= isset($_POST['bDate']) ? $_POST['bDate'] : $bettaUser->getBirthday() ?>">
            <?php if ($errors['bDate']): ?>
                <span style="color: #e8471e;font-size: 12px;display: block;margin-top:4px;">Ошибка: <?= $errors['bDate'] ?></span>
            <?php endif ?>
        </div>
        <div class="my-profile__group">
            <span class="my-profile__title">Номер телефона:</span>
            <input type="text" name="phone" value="<?= isset($_POST['phone']) ? $_POST['phone'] : $bettaUser->getPhone() ?>">
            <?php if ($errors['phone']): ?>
                <span style="color: #e8471e;font-size: 12px;display: block;margin-top:4px;">Ошибка: <?= $errors['phone'] ?></span>
            <?php endif ?>
        </div>
        <div class="my-profile__group">
            <?php $gender = isset($_POST['gender']) ? $_POST['gender'] : $bettaUser->getGender(); ?>
            <span class="my-profile__title">Пол:</span>
            <input type="radio" name="gender" value="male" style="display: inline"
                   id="gender_male" <?= $gender == 'male' ? 'checked="checked"' : '' ?> > <label
                    class="radio-label" for="gender_male">муж</label>
            <input type="radio" name="gender" value="female" style="display: inline"
                   id="gender_female" <?= $gender == 'female' ? 'checked="checked"' : '' ?>> <label
                    class="radio-label" for="gender_female">жен</label>
            <?php if ($errors['gender']): ?>
                <span style="color: #e8471e;font-size: 12px;display: block;margin-top:4px;">Ошибка: <?= $errors['gender'] ?></span>
            <?php endif ?>
        </div>
        <div class="my-profile__group">
            <span class="my-profile__title">Размер футболки:</span>
            <?php $size = isset($_POST['user_size']) ? $_POST['user_size'] : $bettaUser->getSize(); ?>
            <select name="user_size" id="user_size" class="select-group">
                <option value="XS" <?= $size == 'XS' ? 'selected="selected"' : '' ?> >XS</option>
                <option value="S" <?= $size == 'S' ? 'selected="selected"' : '' ?>>S</option>
                <option value="M" <?= $size == 'M' ? 'selected="selected"' : '' ?>>M</option>
                <option value="L" <?= $size == 'L' ? 'selected="selected"' : '' ?>>L</option>
                <option value="XL" <?= $size == 'XL' ? 'selected="selected"' : '' ?>>XL</option>
                <option value="XXL" <?= $size == 'XXL' ? 'selected="selected"' : '' ?>>XXL</option>
            </select>
            <?php if ($errors['user_size']): ?>
                <span style="color: #e8471e;font-size: 12px;display: block;margin-top:4px;">Ошибка: <?= $errors['user_size'] ?></span>
            <?php endif ?>
        </div>
        <div class="my-profile__group">
            <span class="my-profile__title">Страна:</span>
            <?php $userCountry = isset($_POST['user_country']) ? $_POST['user_country'] : $bettaUser->getSize(); ?>
            <select name="user_country" id="user_country" class="select-group">
                <option value="Беларусь" <?= $userCountry == 'Беларусь' ? 'selected="selected"' : '' ?>>
                    Беларусь
                </option>
                <option value="Россия" <?= $userCountry == 'Россия' ? 'selected="selected"' : '' ?>>Россия
                </option>
                <option value="Польша" <?= $userCountry == 'Польша' ? 'selected="selected"' : '' ?>>Польша
                </option>
                <option value="Украина" <?= $userCountry == 'Украина' ? 'selected="selected"' : '' ?>>
                    Украина
                </option>
            </select>
            <?php if ($errors['user_country']): ?>
                <span style="color: #e8471e;font-size: 12px;display: block;margin-top:4px;">Ошибка: <?= $errors['user_country'] ?></span>
            <?php endif ?>
        </div>
        <input type="submit" class="registration-form__group-submit" value="Сохранить">
    </form>
</div>

<script language="JavaScript">
    let size = '<?= $bettaUser->getSize() ?>';

    let userSizeControl = jQuery('#user_size');

    jQuery(function () {
        updateSizes();
        jQuery('input[type=radio][name=gender]').change(updateSizes);
    });

    function updateSizes() {
        let gender = jQuery('input[name=gender]:checked');

        if (gender.val() === 'male') {
            if (userSizeControl.val() === 'XS') {
                userSizeControl.find('option[value=S]').attr('selected', 'selected');
            }

            userSizeControl.find('option[value=XS]').hide();
            userSizeControl.find('option[value=XXL]').show();
        }

        if (gender.val() === 'female') {
            if (userSizeControl.val() === 'XXL') {
                userSizeControl.find('option[value=XL]').attr('selected', 'selected');
            }

            userSizeControl.find('option[value=XXL]').hide();
            userSizeControl.find('option[value=XS]').show();
        }
    }
</script>