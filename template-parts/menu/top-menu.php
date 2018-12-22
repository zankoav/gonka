<?php
	/**
	 * Created by PhpStorm.
	 * User: alexandrzanko
	 * Date: 12/22/18
	 * Time: 11:51 PM
	 */


	wp_nav_menu( array(
		'theme_location'  => 'top-menu',
		'menu'            => 'Top',
		'container'       => '',
		'menu_class'      => 'menu menu_gonka-top',
		'echo'            => true,
		'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'depth'           => 0
	) );
?>

<!--<ul class="menu menu_gonka-top">-->
<!--    <li class="menu__item menu__item_active"><a href="#">Новости</a></li>-->
<!--    <li class="menu__item"><a href="#">Контакты</a></li>-->
<!--    <li class="menu__item"><a href="#">Партнеры</a></li>-->
<!--</ul>-->
