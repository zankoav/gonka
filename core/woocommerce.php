<?php
	/**
	 * Created by PhpStorm.
	 * User: alexandrzanko
	 * Date: 12/24/18
	 * Time: 9:40 PM
	 */

	add_theme_support( 'woocommerce' );

	add_filter( 'woocommerce_enqueue_styles', '__return_false' );