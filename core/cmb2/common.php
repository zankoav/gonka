<?php
	/**
	 * Created by PhpStorm.
	 * User: alexandrzanko
	 * Date: 12/17/18
	 * Time: 12:28 PM
	 */


	add_action( 'cmb2_admin_init', 'common_theme_options_metabox' );
	/**
	 * Hook in and register a metabox to handle a theme options page and adds a menu item.
	 */
	function common_theme_options_metabox() {

		/**
		 * Registers options page menu item and form.
		 */
		$cmb_options = new_cmb2_box( array(
			'id'           => THEME_NAME . '_theme_options_page',
			'title'        => esc_html__( 'Настройки темы', THEME_NAME ),
			'object_types' => array( 'options-page' ),

			/*
			 * The following parameters are specific to the options-page box
			 * Several of these parameters are passed along to add_menu_page()/add_submenu_page().
			 */

			'option_key' => THEME_NAME . '_theme_options',
			// The option key and admin menu page slug.
			'icon_url'   => 'dashicons-palmtree',
			// Menu icon. Only applicable if 'parent_slug' is left empty.
			// 'menu_title'      => esc_html__( 'Options', 'cmb2' ), // Falls back to 'title' (above).
			// 'parent_slug'     => 'themes.php', // Make options page a submenu item of the themes menu.
			// 'capability'      => 'manage_options', // Cap required to view options-page.
			// 'position'        => 1, // Menu position. Only applicable if 'parent_slug' is left empty.
			// 'admin_menu_hook' => 'network_admin_menu', // 'network_admin_menu' to add network-level options page.
			// 'display_cb'      => false, // Override the options-page form output (CMB2_Hookup::options_page_output()).
			// 'save_button'     => esc_html__( 'Save Theme Options', 'cmb2' ), // The text for the options-page save button. Defaults to 'Save'.
			// 'disable_settings_errors' => true, // On settings pages (not options-general.php sub-pages), allows disabling.
			// 'message_cb'      => 'yourprefix_options_page_message_callback',
			// 'tab_group'       => '', // Tab-group identifier, enables options page tab navigation.
			// 'tab_title'       => null, // Falls back to 'title' (above).
			// 'autoload'        => false, // Defaults to true, the options-page option will be autloaded.
		) );

		/**
		 * Options fields ids only need
		 * to be unique within this box.
		 * Prefix is not needed.
		 */
//logo

		$cmb_options->add_field( array(
			'name' => esc_html__( 'Логотип компании', THEME_NAME ),
			'id'   => 'bg_color',
			'type' => 'title',
		) );

		$cmb_options->add_field( array(
			'name' => esc_html__( 'Логотип', THEME_NAME ),
			'id'   => 'logo_light',
			'type' => 'file'
		) );

		$cmb_options->add_field( array(
			'name' => esc_html__( 'Ссылка на регистрацию', THEME_NAME ),
			'id'   => 'gonka_url',
			'type' => 'text_url'
		) );


// move line
		$cmb_options->add_field( array(
			'name' => esc_html__( 'Бегущая строка', THEME_NAME ),
			'id'   => 'move_line_op_title',
			'type' => 'title'
		) );

		$cmb_options->add_field( array(
			'name' => esc_html__( 'Включить строку', THEME_NAME ),
			'id'   => 'move_active',
			'type' => 'checkbox'
		) );

		$cmb_options->add_field( array(
			'name' => esc_html__( 'Скорость строки', THEME_NAME ),
			'id'   => 'move_speed',
			'description'   => 'Значение от 0 до 100 (не секунды)',
			'type' => 'text_small'
		) );

		$cmb_options->add_field( array(
			'name' => esc_html__( 'Текст RU', THEME_NAME ),
			'id'   => 'move_line_ru',
			'type' => 'textarea_small'
		) );

		$cmb_options->add_field( array(
			'name' => esc_html__( 'Текст EN', THEME_NAME ),
			'id'   => 'move_line_en',
			'type' => 'textarea_small'
		) );

//		Баннер
		$cmb_options->add_field( array(
			'name' => esc_html__( 'Баннер на главной странице', THEME_NAME ),
			'id'   => 'banner_admin_title',
			'type' => 'title'
		) );

		$cmb_options->add_field( array(
			'name' => esc_html__( 'Заголовок', THEME_NAME ),
			'id'   => 'banner_title_ru',
			'type' => 'text'
		) );

		$cmb_options->add_field( array(
			'name' => esc_html__( 'Заголовок EN', THEME_NAME ),
			'id'   => 'banner_title_en',
			'type' => 'text'
		) );

		$cmb_options->add_field( array(
			'name' => esc_html__( 'Картинка', THEME_NAME ),
			'id'   => 'banner_image',
			'type' => 'file'
		) );

		$cmb_options->add_field( array(
			'name' => esc_html__( 'Описание RU', THEME_NAME ),
			'id'   => 'banner_description_ru',
			'type' => 'textarea'
		) );

		$cmb_options->add_field( array(
			'name' => esc_html__( 'Описание EN', THEME_NAME ),
			'id'   => 'banner_description_en',
			'type' => 'textarea'
		) );

		$cmb_options->add_field( array(
			'name' => esc_html__( 'URL button', THEME_NAME ),
			'id'   => 'banner_button_url',
			'type' => 'text_url'
		) );

//КОНТАКТЫ

		$cmb_options->add_field( array(
			'name' => esc_html__( 'КОНТАКТЫ', THEME_NAME ),
			'id'   => 'contacts_option_title',
			'type' => 'title',
		) );
		$cmb_options->add_field( array(
			'name' => esc_html__( 'Адрес RU', THEME_NAME ),
			'id'   => 'address_ru',
			'type' => 'text',
		) );
		$cmb_options->add_field( array(
			'name' => esc_html__( 'Адрес EN', THEME_NAME ),
			'id'   => 'address_en',
			'type' => 'text',
		) );
		$cmb_options->add_field( array(
			'name' => esc_html__( 'Email', THEME_NAME ),
			'id'   => 'email',
			'type' => 'text_email',
		) );
		$cmb_options->add_field( array(
			'name'    => esc_html__( 'Телефон', THEME_NAME ),
			'id'      => 'phone',
			'type'    => 'text',
			'default' => '+375 29 987 65 43',
		) );
		$cmb_options->add_field( array(
			'name'    => esc_html__( 'VK', THEME_NAME ),
			'id'      => 'vk_link',
			'type'    => 'text_url',
			'default' => 'https://vk.com/',
		) );
		$cmb_options->add_field( array(
			'name'    => esc_html__( 'Facebook', THEME_NAME ),
			'id'      => 'fb_link',
			'type'    => 'text_url',
			'default' => 'https://facebook.com/',
		) );
		$cmb_options->add_field( array(
			'name'    => esc_html__( 'LinkedIn', THEME_NAME ),
			'id'      => 'linkedin_link',
			'type'    => 'text_url',
			'default' => 'https://linkedin.com/',
		) );


//Partners

		$cmb_options->add_field( array(
			'name' => esc_html__( 'Наши партнеры', THEME_NAME ),
			'id'   => 'partners_title',
			'type' => 'title'
		) );

		$partners = $cmb_options->add_field( array(
			'id'      => 'partners',
			'type'    => 'group',
			'options' => array(
				'group_title'   => __( 'Партнера {#}', THEME_NAME ),
				'add_button'    => __( 'Добавить Партнера', THEME_NAME ),
				'remove_button' => __( 'Удалить Партнера', THEME_NAME ),
				'sortable'      => true,
				'closed'        => true,
			),
		) );
		$cmb_options->add_group_field( $partners, array(
			'id'   => 'partner',
			'description' => 'Реккомендуемый размер 250x220',
			'type' => 'file'
		) );

//footer paragraph

		$cmb_options->add_field( array(
			'name' => esc_html__( 'Подвал', THEME_NAME ),
			'id'   => 'footer_paragraph_option_title',
			'description' => 'Столбец с логотипом',
			'type' => 'title',
		) );

		$cmb_options->add_field( array(
			'name' => esc_html__( 'Заголовок RU', THEME_NAME ),
			'id'   => 'footer_unp_title_ru',
			'type' => 'text'
		) );

		$cmb_options->add_field( array(
			'name' => esc_html__( 'Заголовок EN', THEME_NAME ),
			'id'   => 'footer_unp_title_en',
			'type' => 'text'
		) );

		$cmb_options->add_field( array(
			'name' => esc_html__( 'УНП RU', THEME_NAME ),
			'id'   => 'footer_paragraph_ru',
			'type' => 'textarea_small'
		) );

		$cmb_options->add_field( array(
			'name' => esc_html__( 'УНП EN', THEME_NAME ),
			'id'   => 'footer_paragraph_en',
			'type' => 'textarea_small'
		) );


	}

	add_action( 'cmb2_admin_init', 'yourprefix_register_demo_metabox' );
	/**
	 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
	 */
	function yourprefix_register_demo_metabox() {
		$prefix = 'gonka_';

		/**
		 * Sample metabox to demonstrate each field type included
		 */
		$cmb_demo = new_cmb2_box( array(
			'id'           => $prefix . 'metabox',
			'title'        => esc_html__( 'Заголовок', 'cmb2' ),
			'object_types' => [ 'post', 'page', 'gonka', 'faq' ], // Post type
			// 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
			// 'context'    => 'normal',
			// 'priority'   => 'high',
			// 'show_names' => true, // Show field names on the left
			// 'cmb_styles' => false, // false to disable the CMB stylesheet
			// 'closed'     => true, // true to keep the metabox closed by default
			// 'classes'    => 'extra-class', // Extra cmb2-wrap classes
			// 'classes_cb' => 'yourprefix_add_some_classes', // Add classes through a callback.

			/*
			 * The following parameter is any additional arguments passed as $callback_args
			 * to add_meta_box, if/when applicable.
			 *
			 * CMB2 does not use these arguments in the add_meta_box callback, however, these args
			 * are parsed for certain special properties, like determining Gutenberg/block-editor
			 * compatibility.
			 *
			 * Examples:
			 *
			 * - Make sure default editor is used as metabox is not compatible with block editor
			 *      [ '__block_editor_compatible_meta_box' => false/true ]
			 *
			 * - Or declare this box exists for backwards compatibility
			 *      [ '__back_compat_meta_box' => false ]
			 *
			 * More: https://wordpress.org/gutenberg/handbook/extensibility/meta-box/
			 */
			// 'mb_callback_args' => array( '__block_editor_compatible_meta_box' => false ),
		) );

		$cmb_demo->add_field( array(
			'name' => esc_html__( 'Заголовок RU', 'cmb2' ),
			'desc' => esc_html__( 'Основной заголовок страицы RU', 'cmb2' ),
			'id'   => $prefix . 'title_ru',
			'type' => 'text',
		) );

		$cmb_demo->add_field( array(
			'name' => esc_html__( 'Заголовок EN', 'cmb2' ),
			'desc' => esc_html__( 'Основной заголовок страицы EN', 'cmb2' ),
			'id'   => $prefix . 'title_en',
			'type' => 'text',
		) );


	}

	function gonka_list($field){

		$posts = get_posts([
			'post_type'=>'gonka',
			'numberposts' => -1
		]);

		$result = [];

		foreach( $posts as $post ){

			$result[$post->ID] = $post->post_title;
		}

		return $result;
	}

	function fresh_gonka_list(){

		$posts = get_posts([
			'posts_per_page' => -1,
			'post_type'=>'gonka',
			'meta_query' => array(
				'gonka_date' => array(
					'key'     => 'gonka_start',
					'value'   => date('Y.m.d'),
					'compare' => '>=',
				),
			),
			'orderby' => 'gonka_date',
			'order'   => 'DESC',
		]);

		$result = [];

		foreach( $posts as $post ){

			$result[$post->ID] = $post->post_title;
		}

		return $result;
	}
