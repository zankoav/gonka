<?php
	/**
	 * Created by PhpStorm.
	 * User: alexandrzanko
	 * Date: 12/8/18
	 * Time: 8:27 PM
	 */

	add_action( 'after_setup_theme', function () {
		add_action( 'wp_ajax_registration_user', 'registrationUser' );
		add_action( 'wp_ajax_nopriv_registration_user', 'registrationUser' );
	} );

	add_filter( 'wp_mail_content_type', function ( $content_type ) {
		return "text/html";
	} );

	function contactForm() {

		if ( isset( $_POST['spam'] ) and ! empty( $_POST['spam'] ) ) {
			echo json_encode( [ 'status' => 2 ] );
			wp_die();
		}

		if ( isset( $_POST['name'], $_POST['email'], $_POST['message'] ) ) {
			$name    = $_POST['name'];
			$email   = $_POST['email'];
			$message = $_POST['message'];
			$toEmail = get_option( 'oops_theme_options' )['screen_contact_us_email'];
			$isSend  = wp_mail( $toEmail, 'Message from Oops',
				"<p><strong>Name: </strong>$name</p>" .
				"<p><strong>Email: </strong>$email</p>" .
				"<strong>Message: </strong>" .
				"<p>$message</p>"
			);
			if ( $isSend ) {
				echo json_encode( [ 'status' => 1 ] );
				wp_die();
			}
		}

		echo json_encode( [ 'status' => 0 ] );
		wp_die();
	}

	function registrationUser() {

		$name = esc_attr( wp_slash( trim( $_POST['name'] ) ) );

		$email = trim( $_POST['user_email'] );

		if ( email_exists( $email ) ) {
			echo json_encode(
				[ 'status' => 2 ]
			);
			wp_die();
		}

		$user_id = wp_create_user( $email, $_POST['user_password'], $email );

		if ( ! empty( $user_id ) ) {


			update_user_meta( $user_id, 'user_country', esc_attr( $_POST['country'] ), 1 );
			update_user_meta( $user_id, 'user_date', esc_attr( $_POST['user_date'] ), 1 );
			update_user_meta( $user_id, 'user_sex', esc_attr( $_POST['user_sex'] ), 1 );
			update_user_meta( $user_id, 'user_size', esc_attr( $_POST['user_size'] ), 1 );
			update_user_meta( $user_id, 'user_phone', esc_attr( $_POST['user_phone'] ), 1 );
			update_user_meta( $user_id, 'user_name', $name, 1 );
			update_user_meta( $user_id, 'user_surname', esc_attr( $_POST['surname'] ), 1 );

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
			wc_mail( $email, Lang::get( 'Confirm Email address' ), $html );


			echo json_encode(
				[ 'status' => 1,
					'code' => $code
					]
			);
			wp_die();
		}


		echo json_encode( [ 'status' => 0 ] );
		wp_die();
	}
