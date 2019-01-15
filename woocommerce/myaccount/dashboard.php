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

	$userId = get_current_user_id();
	$user   = get_userdata( $userId );
?>


<div class="my-profile">
    <div class="my-profile__group">
        <span class="my-profile__title">Имя:</span>
        <span class="my-profile__value"><?= $user->first_name; ?></span>
    </div>
    <div class="my-profile__group">
        <span class="my-profile__title">Email:</span>
        <span class="my-profile__value"><?= $user->user_email; ?></span>
    </div>
    <div class="my-profile__group">
        <span class="my-profile__title">Возраст:</span>
        <span class="my-profile__value">18</span>
    </div>
    <div class="my-profile__group">
        <span class="my-profile__title">Пол:</span>
        <span class="my-profile__value">мужчина</span>
    </div>
    <div class="my-profile__group">
        <span class="my-profile__title">О себе:</span>
        <p class="my-profile__value my-profile__value_full-width">Текст о себе</p>
    </div>
</div>