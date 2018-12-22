<?php

	add_action( 'after_setup_theme', 'btk_theme_init' );

	function btk_theme_init() {
		/**
		 * add title tag auto
		 */
		add_theme_support( 'title-tag' );

		/**
		 * add thumbnails for all post types
		 */
		add_theme_support( 'post-thumbnails' );

		/**
		 * add custom-logo in customizer
		 */
		add_theme_support( 'custom-logo' );

		add_theme_support( 'menus' );

		register_nav_menu( 'top-menu', 'Top Menu' );
		register_nav_menu( 'main-menu', 'Main Menu' );

		/**
		 * add html5 support
		 */
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

	}