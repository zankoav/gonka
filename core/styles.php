<?php
	/**
	 * Created by PhpStorm.
	 * User: alexandrzanko
	 * Date: 10/16/18
	 * Time: 4:30 PM
	 */

	add_action( 'template_redirect', function () {

		add_action( 'wp_enqueue_scripts', function () {

			wp_enqueue_style( 'commons', Assets::getCss('common'), false, null );

			wp_enqueue_style( 'home', Assets::getCss('home'), false, null );

			wp_enqueue_style( 'style', BASE_URL . '/style.css', false, null );

		} );
	} );
