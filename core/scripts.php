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
			} else if ( is_page_template( 'template-about-us.php' ) ) {
				wp_enqueue_script( 'about', Assets::getJs( 'about' ), false, null, true );
			} else if ( is_page_template( 'template-contacts.php' ) ) {
				wp_enqueue_script( 'contacts', Assets::getJs( 'contacts' ), false, null, true );
			} else if ( is_page_template( 'template-projects.php' ) ) {
				wp_enqueue_script( 'projects', Assets::getJs( 'projects' ), false, null, true );
			} else if ( is_page_template( 'template-services.php' ) ) {
				wp_enqueue_script( 'services', Assets::getJs( 'services' ), false, null, true );
			}

			wp_enqueue_script( 'home', Assets::getJs( 'home' ), false, null, true );

		} );
	} );