<?php
	/**
	 * Created by PhpStorm.
	 * User: alexandrzanko
	 * Date: 1/5/19
	 * Time: 12:36 PM
	 */


	add_action('recent_post_home_page_template','recent_post', 10, 1);

	function recent_post($count){
		$args = array(
			'posts_per_page'      => $count,
			'orderby'          => 'post_date',
			'order'            => 'DESC',
			'post_type'        => 'post',
			'post_status'      => 'publish'
		);

		$query = new WP_Query( $args );

		while ( $query->have_posts() ) {
			$query->the_post();

			get_template_part( 'template-parts/content/recent-single-new' );
		}

		wp_reset_postdata();

//		$recent_posts = wp_get_recent_posts( $args, ARRAY_A );

//		foreach ( $recent_posts as $post ){
//					$post_date = get_the_date('d.m.Y',$post['ID'] );
//					$post_title = get_post_meta($post['ID'], 'gonka_'.Lang::current(), 1);
//					$post_link = get_permalink( $post['ID'] );
//
//
//
//		}
	}
