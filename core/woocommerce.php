<?php
	/**
	 * Created by PhpStorm.
	 * User: alexandrzanko
	 * Date: 12/24/18
	 * Time: 9:40 PM
	 */

	add_theme_support( 'woocommerce' );

//	add_filter( 'woocommerce_enqueue_styles', '__return_false' );


	// this is just to prevent the user log in automatically after register
	function wc_registration_redirect( $redirect_to ) {
		wp_logout();
		wp_redirect( '/my-account/?q=');
		exit;
	}
// when user login, we will check whether this guy email is verify
	function wp_authenticate_user( $userdata ) {
		$isActivated = get_user_meta($userdata->ID, 'is_activated', true);
		if ( !$isActivated ) {
			$userdata = new WP_Error(
				'inkfool_confirmation_error',
				__( '<strong>Внимание:</strong> Ваш аккаунт неактивен. Пожалуйста, перейдите по ссылке в письме, высланном Вам на почту. <a href="/my-account/?u='.$userdata->ID.'">Выслать снова.</a>', 'inkfool' )
			);
		}
		return $userdata;
	}
// when a user register we need to send them an email to verify their account
	function my_user_register($user_id) {
		// get user data
		$user_info = get_userdata($user_id);
		// create md5 code to verify later
		$code = md5(time());
		// make it into a code to send it to user via email
		$string = array('id'=>$user_id, 'code'=>$code);
		// create the activation code and activation status
		update_user_meta($user_id, 'is_activated', 0);
		update_user_meta($user_id, 'activationcode', $code);
		// create the url
		$url = get_site_url(). '/my-account/?p=' .base64_encode( serialize($string));
		// basically we will edit here to make this nicer
		$html = 'Для подтверждения email-адреса перейдите по ссылке<br/><br/> <a href="'.$url.'">'.$url.'</a>';
		// send an email out to user
		wc_mail($user_info->user_email, __('Подтверждение Email-адреса'), $html);
	}
// we need this to handle all the getty hacks i made
	function my_init(){
		// check whether we get the activation message
		if(isset($_GET['p'])){
			$data = unserialize(base64_decode($_GET['p']));
			$code = get_user_meta($data['id'], 'activationcode', true);
			// check whether the code given is the same as ours
			if($code == $data['code']){
				// update the db on the activation process
				update_user_meta($data['id'], 'is_activated', 1);
				wc_add_notice( __( '<strong>Поздравляем:</strong> Ваш аккаунт активирован! ', 'inkfool' )  );
			}else{
				wc_add_notice( __( '<strong>Ошибка:</strong> Ваш аккаунт не активирован. ', 'inkfool' )  );
			}
		}
		if(isset($_GET['q'])){
			wc_add_notice( __( '<strong>Внимание:</strong> Подтвердите Ваш email-адрес.', 'inkfool' ) );
		}
		if(isset($_GET['u'])){
			my_user_register($_GET['u']);
			wc_add_notice( __( '<strong>Внимание:</strong> Письмо с кодом активации выслано повторно. Проверьте Ваш email.', 'inkfool' ) );
		}
	}
// hooks handler
	add_action( 'init', 'my_init' );
	add_filter('woocommerce_registration_redirect', 'wc_registration_redirect');
	add_filter('wp_authenticate_user', 'wp_authenticate_user',10,2);
	add_action('user_register', 'my_user_register',10,2);

	// end confirm