<?php get_header();

	if ( have_posts() ) {

		// Load posts loop.
		while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/content/content' );
		}

	}else{
		get_template_part( 'template-parts/content/empty' );
    }

	get_footer();