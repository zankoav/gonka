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

			if(is_page_template('template-home.php')){
				wp_enqueue_style( 'home', Assets::getCss('home'), false, null );
			}else if(is_page_template('template-about-us.php')){
				wp_enqueue_style( 'about-us', Assets::getCss('about'), false, null );
			}else if(is_page_template('template-contacts.php')){
				wp_enqueue_style( 'contacts', Assets::getCss('contacts'), false, null );
			}else if(is_page_template('template-projects.php')){
				wp_enqueue_style( 'projects', Assets::getCss('projects'), false, null );
			}else if(is_page_template('template-services.php')){
				wp_enqueue_style( 'services', Assets::getCss('services'), false, null );
			}

			wp_enqueue_style( 'style', BASE_URL . '/style.css', false, null );

		} );
	} );
