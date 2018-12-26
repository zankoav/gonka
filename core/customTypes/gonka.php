<?php
add_action( 'init', 'register_post_types' );
function register_post_types(){
  register_post_type('gonka', array(
    'label'  => null,
    'labels' => array(
      'name'               => 'Гонка', // основное название для типа записи
      'singular_name'      => 'Гонка', // название для одной записи этого типа
      'add_new'            => 'Добавить Гонку', // для добавления новой записи
      'add_new_item'       => 'Добавление Гонки', // заголовка у вновь создаваемой записи в админ-панели.
      'edit_item'          => 'Редактирование Гонку', // для редактирования типа записи
      'new_item'           => 'Новая Гонка', // текст новой записи
      'view_item'          => 'Смотреть Гонку', // для просмотра записи этого типа.
      'search_items'       => 'Искать Гонку', // для поиска по этим типам записи
      'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
      'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
      'parent_item_colon'  => '', // для родителей (у древовидных типов)
      'menu_name'          => 'Гонки', // название меню
    ),
    'description'         => '',
    'public'              => true,
    'publicly_queryable'  => null, // зависит от public
    'exclude_from_search' => null, // зависит от public
    'show_ui'             => null, // зависит от public
    'show_in_menu'        => null, // показывать ли в меню адмнки
    'show_in_admin_bar'   => null, // по умолчанию значение show_in_menu
    'show_in_nav_menus'   => null, // зависит от public
    'show_in_rest'        => null, // добавить в REST API. C WP 4.7
//    'rest_base'           => null, // $post_type. C WP 4.7
//    'menu_position'       => null,
//    'menu_icon'           => null,
    //'capability_type'   => 'post',
    //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
    //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
    //'hierarchical'        => false,
    'supports'            => array('title','editor','thumbnail'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
    //'taxonomies'          => array(),
    'has_archive'         => true,
    'rewrite'             => true,
    'query_var'           => true,
  ) );
}

// хук для регистрации
//add_action('init', 'work_type_taxonomy');
function work_type_taxonomy(){
  // список параметров: http://wp-kama.ru/function/get_taxonomy_labels
  register_taxonomy('portfolio', array('work'), array(
    'label'                 => 'work type', // определяется параметром $labels->name
    'labels'                => array(
      'name'              => 'work types',
      'singular_name'     => 'work type',
      'search_items'      => 'Search work types',
      'all_items'         => 'All work types',
      'view_item '        => 'View work type',
      'parent_item'       => 'Parent work type',
      'parent_item_colon' => 'Parent work type:',
      'edit_item'         => 'Edit work type',
      'update_item'       => 'Update work type',
      'add_new_item'      => 'Add New work type',
      'new_item_name'     => 'New work type Name',
      'menu_name'         => 'work type',
    ),
    'description'           => '', // описание таксономии
    'public'                => true,
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