<?php
	/**
	 * Created by PhpStorm.
	 * User: alexandrzanko
	 * Date: 10/16/18
	 * Time: 4:30 PM
	 */

	add_action( 'template_redirect', function () {

		add_action( 'wp_enqueue_scripts', function () {

			wp_enqueue_style( 'commons', Assets::getCss( 'common' ), false, null );

			if ( is_page_template( 'template-home.php' ) ) {
				wp_enqueue_style( 'home', Assets::getCss( 'home' ), false, null );
			} else if ( is_post_type_archive(['gonka']) ) {
				wp_enqueue_style( 'gonki', Assets::getCss( 'gonki' ), false, null );
			} else if ( is_page_template( 'template-faq.php' ) ) {
				wp_enqueue_style( 'faq', Assets::getCss( 'faq' ), false, null );
			} else if ( is_page_template( 'template-media.php' ) ) {
				wp_enqueue_style( 'media-css', Assets::getCss( 'media' ), false, null );
			} else if ( is_page_template( 'template-registration.php' ) ) {
				wp_enqueue_style( 'registration-css', Assets::getCss( 'registration' ), false, null );
			} else if ( is_singular( 'gonka' ) ) {
				wp_enqueue_style( 'gonka', Assets::getCss( 'gonka' ), false, null );
			} else if ( is_singular( 'post' ) ) {
				wp_enqueue_style( 'single', Assets::getCss( 'single' ), false, null );
			}else if ( is_archive() ) {
				wp_enqueue_style( 'category', Assets::getCss( 'category' ), false, null );
			}

			wp_enqueue_style( 'style', BASE_URL . '/style.css', false, null );

		} );
	} );
