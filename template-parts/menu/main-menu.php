<?php
	/**
	 * Created by PhpStorm.
	 * User: alexandrzanko
	 * Date: 12/22/18
	 * Time: 11:51 PM
	 */


	wp_nav_menu( array(
		'theme_location'  => 'main-menu',
		'menu'            => 'Main',
		'container'       => '',
		'menu_class'      => 'categories swiper-wrapper',
		'echo'            => true,
		'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'depth'           => 0
	) );
?>