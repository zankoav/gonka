<?php
add_action( 'init', 'faq_post_types' );
function faq_post_types(){
  register_post_type('faq', array(
    'label'  => null,
    'labels' => array(
      'name'               => 'Faq', // основное название для типа записи
      'singular_name'      => 'Faq', // название для одной записи этого типа
      'add_new'            => 'Добавить Faq', // для добавления новой записи
      'add_new_item'       => 'Добавление Faq', // заголовка у вновь создаваемой записи в админ-панели.
      'edit_item'          => 'Редактирование Faq', // для редактирования типа записи
      'new_item'           => 'Новая Faq', // текст новой записи
      'view_item'          => 'Смотреть Faq', // для просмотра записи этого типа.
      'search_items'       => 'Искать Faq', // для поиска по этим типам записи
      'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
      'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
      'parent_item_colon'  => '', // для родителей (у древовидных типов)
      'menu_name'          => 'FAQ', // название меню
    ),
    'description'         => '',
    'public'              => false,
    'publicly_queryable'  => true,
	  // зависит от public
    'exclude_from_search' => true,
	  // зависит от public
    'show_ui'             => true,
	  // зависит от public
    'show_in_menu'        => null,
	  // показывать ли в меню адмнки
    'show_in_admin_bar'   => null,
	  // по умолчанию значение show_in_menu
    'show_in_nav_menus'   => false,
	  // зависит от public
    'show_in_rest'        => null,
	  // добавить в REST API. C WP 4.7
//    'rest_base'           => null, // $post_type. C WP 4.7
//    'menu_position'       => null,
//    'menu_icon'           => null,
    'menu_icon'           => 'dashicons-lightbulb',
	  //'capability_type'   => 'post',
	  //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
	  //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
	  //'hierarchical'        => false,
    'supports'            => array( 'title' ),
	  // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
	  //'taxonomies'          => array(),
    'has_archive'         => false,
    'rewrite'             => false,
    'query_var'           => true,
  ) );
}
