<?php
	/**
	 * Created by PhpStorm.
	 * User: alexandrzanko
	 * Date: 1/22/19
	 * Time: 12:42 PM
	 */
	add_action( 'init', 'participation_post_types' );
	function participation_post_types(){
		register_post_type('participation', array(
			'label'  => null,
			'labels' => array(
				'name'               => 'Формат Участия', // основное название для типа записи
				'singular_name'      => 'Формат Участия', // название для одной записи этого типа
				'add_new'            => 'Добавить Формат', // для добавления новой записи
				'add_new_item'       => 'Добавление Формата', // заголовка у вновь создаваемой записи в админ-панели.
				'edit_item'          => 'Редактирование Формат', // для редактирования типа записи
				'new_item'           => 'Новый Формат', // текст новой записи
				'view_item'          => 'Смотреть Формат', // для просмотра записи этого типа.
				'search_items'       => 'Искать Формат', // для поиска по этим типам записи
				'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
				'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
				'parent_item_colon'  => '', // для родителей (у древовидных типов)
				'menu_name'          => 'Форматы', // название меню
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
			'menu_icon'           => 'dashicons-welcome-write-blog',
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

add_action('init', 'participation_type_taxonomy');
function participation_type_taxonomy(){
	// список параметров: http://wp-kama.ru/function/get_taxonomy_labels
	register_taxonomy('participation-format', array('participation'), array(
		'label'                 => 'Категория Форматов', // определяется параметром $labels->name
		'labels'                => array(
			'name'              => 'Категория Форматов',
			'singular_name'     => 'Категория',
			'search_items'      => 'Поиск Категории',
			'all_items'         => 'Все Категории',
			'view_item '        => 'Посмотреть Категорию',
			'parent_item'       => 'Родительская Категория',
			'parent_item_colon' => 'Родительская Категория:',
			'edit_item'         => 'Редактировать Категорию',
			'update_item'       => 'Обновить Категорию',
			'add_new_item'      => 'Добавить новую Категорию',
			'menu_name'         => 'Категория Форматов',
		),
		'description'           => '', // описание таксономии
		'public'                => false,
		'publicly_queryable'    => null, // равен аргументу public
		'show_in_nav_menus'     => true, // равен аргументу public
		'show_ui'               => true, // равен аргументу public
		'show_in_menu'          => true, // равен аргументу show_ui
		'show_tagcloud'         => true, // равен аргументу show_ui
		'show_in_rest'          => null, // добавить в REST API
		'rest_base'             => null, // $taxonomy
		'hierarchical'          => true,
		'update_count_callback' => '',
		'rewrite'               => true,
		//'query_var'             => $taxonomy, // название параметра запроса
		'capabilities'          => array(),
		'meta_box_cb'           => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
		'show_admin_column'     => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
		'_builtin'              => false,
		'show_in_quick_edit'    => null, // по умолчанию значение show_ui
	) );
}