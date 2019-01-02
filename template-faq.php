<?php
	/**
	 * Template Name: FAQ Page
	 */

	get_header();

	if ( have_posts() ) {

		// Load posts loop.
		while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/content/faq' );
		}

	}

	get_footer();