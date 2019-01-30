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

	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Exit if accessed directly
	}

	$bettaUser = Betta\User::getCurrent();

    if (isset($_POST['user_about'])) {
        update_user_meta($bettaUser->getId(), 'user_about', $_POST['user_about']);
        $bettaUser->reloadMeta();
        wc_add_notice('Профиль обновлён.');
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
        font-family: Exo\ 2,sans-serif;
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

    .registration-form .registration-form__textarea {
        border-radius: 0 !important;
    }
</style>
<div class="my-profile">
    <?php wc_print_notices(); ?>
    <form method="post" class="registration__form">
    <div class="my-profile__group">
        <span class="my-profile__title">Имя:</span>
        <span class="my-profile__value"><?= $bettaUser->getFirstName() ?></span>
    </div>
    <div class="my-profile__group">
        <span class="my-profile__title">Фамилия:</span>
        <span class="my-profile__value"><?= $bettaUser->getLastName() ?></span>
    </div>
    <div class="my-profile__group">
        <span class="my-profile__title">Email:</span>
        <span class="my-profile__value"><?= $bettaUser->getEmail() ?></span>
    </div>
    <div class="my-profile__group">
        <span class="my-profile__title">Возраст:</span>
        <span class="my-profile__value"><?= $bettaUser->getAge() ?> (<?= $bettaUser->getBirthday() ?>)</span>
    </div>
    <div class="my-profile__group">
        <span class="my-profile__title">Номер телефона:</span>
        <span class="my-profile__value"><?= $bettaUser->getPhone() ?></span>
    </div>
    <div class="my-profile__group">
        <span class="my-profile__title">Размер футболки:</span>
        <span class="my-profile__value"><?= $bettaUser->getSize() ?></span>
    </div>
    <div class="my-profile__group">
        <span class="my-profile__title">Страна:</span>
        <span class="my-profile__value"><?= $bettaUser->getCountry() ?></span>
    </div>
    <div class="my-profile__group">
        <span class="my-profile__title">Пол:</span>
        <span class="my-profile__value"><?= $bettaUser->getGender() === 'female' ? 'жен' : 'муж' ?></span>
    </div>
    <div class="my-profile__group">
        <span class="my-profile__title">О себе:</span>
        <p class="my-profile__value my-profile__value_full-width"><textarea class="registration-form__textarea" cols="30" rows="5" name="user_about"><?= $bettaUser->getAbout() ?></textarea></p>
    </div>
        <input type="submit" class="registration-form__group-submit" value="Сохранить">
    </form>
</div>