<?php
	/**
	 * Login Form
	 *
	 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
	 *
	 * HOWEVER, on occasion WooCommerce will need to update template files and you
	 * (the theme developer) will need to copy the new files to your theme to
	 * maintain compatibility. We try to do this as little as possible, but it does
	 * happen. When this occurs the version of the template file will be bumped and
	 * the readme will list any important changes.
	 *
	 * @see     https://docs.woocommerce.com/document/template-structure/
	 * @package WooCommerce/Templates
	 * @version 3.5.0
	 */

	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Exit if accessed directly.
	}

	do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

<div class="u-columns col2-set" id="customer_login">

    <div class="u-column1 col-1">

		<?php endif; ?>

        <h2><?php esc_html_e( 'Login', 'woocommerce' ); ?></h2>

        <form class="woocommerce-form woocommerce-form-login login" method="post">

			<?php do_action( 'woocommerce_login_form_start' ); ?>

            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <label for="username"><?php esc_html_e( 'Username or email address', 'woocommerce' ); ?>&nbsp;<span
                            class="required">*</span></label>
                <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username"
                       id="username" autocomplete="username"
                       value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>"/><?php // @codingStandardsIgnoreLine ?>
            </p>
            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <label for="password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span
                            class="required">*</span></label>
                <input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password"
                       id="password" autocomplete="current-password"/>
            </p>

			<?php do_action( 'woocommerce_login_form' ); ?>

            <p class="form-row">
				<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
                <button type="submit" class="woocommerce-Button button" name="login"
                        value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>"><?php esc_html_e( 'Log in', 'woocommerce' ); ?></button>
                <label class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
                    <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme"
                           type="checkbox" id="rememberme" value="forever"/>
                    <span><?php esc_html_e( 'Remember me', 'woocommerce' ); ?></span>
                </label>
            </p>
            <p class="woocommerce-LostPassword lost_password">
                <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a>
            </p>

			<?php do_action( 'woocommerce_login_form_end' ); ?>

        </form>

		<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

    </div>

    <div class="u-column2 col-2">

        <h2><?php esc_html_e( 'Register', 'woocommerce' ); ?></h2>

        <form method="post"
              class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >

			<?php do_action( 'woocommerce_register_form_start' ); ?>

            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <label for="reg_username">Имя&nbsp;<span class="required">*</span></label>
                <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username"
                       id="reg_username"
                       autocomplete="username"
                       value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>"/>
                <span class="contacts__form-group-message"></span>
            </p>

            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <label for="reg_user_last_name">Фамилия&nbsp;<span class="required">*</span></label>
                <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="user-last_name"
                       id="reg_user_last_name" autocomplete="user-last_name"
                       value="<?php echo ( ! empty( $_POST['user-last_name'] ) ) ? esc_attr( wp_unslash( $_POST['user-last_name'] ) ) : ''; ?>"/>
                <span class="contacts__form-group-message"></span>
            </p>

            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <label for="reg_user_country" class="woocommerce-Input woocommerce-Input--text input-text">Страна<span
                            class="required">*</span></label>
                <select name="user_country" id="reg_user_country" class="select-group">
                    <option value="Беларусь">Беларусь</option>
                    <option value="Россия">Россия</option>
                    <option value="Польша">Польша</option>
                    <option value="Украина">Украина</option>
                </select>
                <span class="contacts__form-group-message"></span>
            </p>

            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <label for="reg_user_date">Дата рождения&nbsp;<span class="required">*</span></label>
                <input type="date" class="woocommerce-Input woocommerce-Input--date input-date" name="user-date"
                       id="reg_user_date"
                       autocomplete="user-date"
                       value="<?php echo ( ! empty( $_POST['user-date'] ) ) ? esc_attr( wp_unslash( $_POST['user-date'] ) ) : ''; ?>"/>
                <span class="contacts__form-group-message"></span>
            </p>

            <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <label>Пол&nbsp;<span class="required">*</span></label>

                <div class="radio-group-wrapp">
                    <div class="radio-group">
                        <label for="reg_user_sex_male">Мужчина</label>
                        <input type="radio" class="woocommerce-Input woocommerce-Input--radio input-radio"
                               name="user-sex"
                               id="reg_user_sex_male"
                               value="male"
                               checked="checked"
                        />
                    </div>
                    <div class="radio-group">
                        <label for="reg_user_sex_fmale">Женщина</label>
                        <input type="radio" class="woocommerce-Input woocommerce-Input--radio input-radio"
                               name="user-sex"
                               id="reg_user_sex_fmale"
                               value="fmale"/>
                    </div>
                </div>
                <span class="contacts__form-group-message"></span>
            </div>

            <p class="user_size-rgoup woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <label for="reg_user_size" class="woocommerce-Input woocommerce-Input--text input-text">Размер футболки
                    <span
                            class="required">*</span></label>
                <select name="user_size" id="reg_user_size" class="select-group">
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    <option value="XXL">XXL</option>
                </select>
                <span class="contacts__form-group-message"></span>
            </p>

            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <label for="reg_email">Электронная почта&nbsp;<span class="required">*</span></label>
                <input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email"
                       id="reg_email" autocomplete="email"
                       value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>"/><?php // @codingStandardsIgnoreLine ?>
                <span class="contacts__form-group-message"></span>
            </p>

            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <label for="reg_email_confirm">Подтверждение электронной почты&nbsp;<span
                            class="required">*</span></label>
                <input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email_confirm"
                       id="reg_email_confirm" autocomplete="email_confirm"
                       value="<?php echo ( ! empty( $_POST['email_confirm'] ) ) ? esc_attr( wp_unslash( $_POST['email_confirm'] ) ) : ''; ?>"/><?php // @codingStandardsIgnoreLine ?>
                <span class="contacts__form-group-message"></span>
            </p>

            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <label for="reg_phone">Телефон (Формат +375 XX XXX XX XX)&nbsp;<span
                            class="required">*</span></label>
                <input type="tel" pattern="+375 [0-9]{2} [0-9]{3} [0-9]{2} [0-9]{2}"
                       class="woocommerce-Input woocommerce-Input--text input-text" name="phone"
                       id="reg_phone" autocomplete="phone" required
                       value="<?php echo ( ! empty( $_POST['phone'] ) ) ? esc_attr( wp_unslash( $_POST['phone'] ) ) : ''; ?>"/><?php // @codingStandardsIgnoreLine ?>
                <span class="contacts__form-group-message"></span>
            </p>
            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <label for="reg_password">Пароль
                    &nbsp;<span class="required">*</span></label>
                <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password"
                       id="reg_password" autocomplete="new-password"/>
                <span class="contacts__form-group-message"></span>
            </p>

            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <label for="reg_password_confirm">Подтверждение пароля&nbsp;<span class="required">*</span></label>
                <input type="password" class="woocommerce-Input woocommerce-Input--text input-text"
                       name="password_confirm" id="reg_password_confirm" autocomplete="password_confirm"/>
                <span class="contacts__form-group-message"></span>
            </p>


			<?php do_action( 'woocommerce_register_form' ); ?>

            <p class="woocommerce-FormRow form-row">
				<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
                <button type="submit" class="woocommerce-Button button" name="register"
                        value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>">Зарегистрироваться
                </button>
            </p>

			<?php do_action( 'woocommerce_register_form_end' ); ?>

        </form>

    </div>

</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
