<?php
	/**
	 * Template Name: Home Page
	 */

	get_header();

	if ( have_posts() ) {

		// Load posts loop.
		while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/content/home' );
		}

	}

	get_footer();