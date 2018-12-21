<?php
	/**
	 * Created by PhpStorm.
	 * User: alexandrzanko
	 * Date: 10/16/18
	 * Time: 4:30 PM
	 */

	add_action( 'template_redirect', function () {

		add_action( 'wp_enqueue_scripts', function () {

			wp_enqueue_script( 'commons', Assets::getJs('common'), false, null, true );

			wp_enqueue_script( 'home', Assets::getJs('home'), false, null, true );

		} );
	} );