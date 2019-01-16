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

		wp_redirect( '/my-account/?q=' );
		exit;
	}

//	check whether we get the activation message
	function my_init() {
		if ( isset( $_GET['p'] ) ) {
			$data = unserialize( base64_decode( $_GET['p'] ) );
			$code = get_user_meta( $data['id'], 'activation_code', true );
			// check whether the code given is the same as ours
			if ( $code == $data['code'] ) {
				// update the db on the activation process
				update_user_meta( $data['id'], 'is_activated', 1 );
				wc_add_notice( Lang::get( "Congratulations: Your account is activated!" ) );
			} else {
				wc_add_notice( Lang::get( "Error: your account is not activated." ) );
			}
		}

		if ( isset( $_GET['q'] ) ) {
			wc_add_notice( Lang::get( "Attention: please Confirm your email address." ) );
		}

		if ( isset( $_GET['u'] ) ) {
			my_user_register( $_GET['u'] );
			wc_add_notice( Lang::get( "Attention: An email with the activation code was sent again. Check your email." ) );
		}
	}

	// when user login, we will check whether this guy email is verify
	function wp_authenticate_user( $userdata ) {
		$isActivated = get_user_meta( $userdata->ID, 'is_activated', true );
		if ( ! $isActivated ) {
			$userdata = new WP_Error(
				'betta_confirmation_error',
				Lang::get( "Attention: Your account is inactive." ) .
				'<a href="/my-account/?u=' . $userdata->ID . '">' . Lang::get( 'Send_again' ) . $userdata->user_email . '</a>'
			);
		}

		return $userdata;
	}

	function my_user_register( $user_id ) {
		// get user data
		$user_info = get_userdata( $user_id );
		// create md5 code to verify later
		$code = md5( time() );
		// make it into a code to send it to user via email
		$string = array( 'id' => $user_id, 'code' => $code );
		// create the activation code and activation status
		update_user_meta( $user_id, 'is_activated', 0 );
		update_user_meta( $user_id, 'activation_code', $code );
		// create the url
		$url = get_site_url() . '/my-account/?p=' . base64_encode( serialize( $string ) );
		// basically we will edit here to make this nicer
		$html = '<span>' . Lang::get( 'Click here to confirm your email address' ) . '</span><br/><br/> <a href="' . $url . '">' . $url . '</a>';
		// send an email out to user
//		wp_mail( $user_info->user_email, 'Подтверждение Email-адреса', $html, $headers = "Content-Type: text/html\r\n" );
		wc_mail( $user_info->user_email, Lang::get( 'Confirm Email address' ), $html );
	}

	add_action( 'init', 'my_init' );
	add_filter( 'woocommerce_registration_redirect', 'wc_registration_redirect' );
	add_filter( 'wp_authenticate_user', 'wp_authenticate_user', 10, 2 );
	add_action( 'user_register', 'my_user_register', 10, 2 );


	function wc_ninja_remove_password_strength() {
		if ( wp_script_is( 'wc-password-strength-meter', 'enqueued' ) ) {
			wp_dequeue_script( 'wc-password-strength-meter' );
		}
	}
	add_action( 'wp_print_scripts', 'wc_ninja_remove_password_strength', 100 );