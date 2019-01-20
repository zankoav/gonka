<?php
	/**
	 * Created by PhpStorm.
	 * User: alexandrzanko
	 * Date: 10/16/18
	 * Time: 4:30 PM
	 */

	add_action( 'template_redirect', function () {

		add_action( 'wp_enqueue_scripts', function () {

			wp_enqueue_script( 'commons', Assets::getJs( 'common' ), false, null, true );

			if ( is_page_template( 'template-home.php' ) ) {
				wp_enqueue_script( 'home', Assets::getJs( 'home' ), false, null, true );
			} else if ( is_singular( 'gonka' ) ) {
				wp_enqueue_script( 'gonka', Assets::getJs( 'gonka' ), false, null, true );
			}if ( is_singular( 'post' ) ) {
				wp_enqueue_script( 'single', Assets::getJs( 'single' ), false, null, true );
			} else if ( is_page_template( 'template-faq.php' ) ) {
				wp_enqueue_script( 'faq', Assets::getJs( 'faq' ), false, null, true );
			}else if ( is_page_template( 'template-media.php' ) ) {
				wp_enqueue_script( 'media', Assets::getJs( 'media' ), false, null, true );
			}else if ( is_page_template( 'template-registration.php' ) ) {
				wp_enqueue_script( 'registration', Assets::getJs( 'registration' ), false, null, true );
			}else if ( is_post_type_archive(['gonka']) ) {
				wp_enqueue_script( 'gonki', Assets::getJs( 'gonki' ), false, null, true );
			}else if ( is_archive() ) {
				wp_enqueue_script( 'category', Assets::getJs( 'category' ), false, null, true );
			}else if ( is_page() ) {
				wp_enqueue_script( 'page', Assets::getJs( 'page' ), false, null, true );
			}


			wp_localize_script( 'commons', 'landing_ajax',
				array(
					'url' => admin_url( 'admin-ajax.php' )
				)
			);
		} );
	} );