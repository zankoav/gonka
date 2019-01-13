<?php
	/**
	 * Created by PhpStorm.
	 * User: alexandrzanko
	 * Date: 1/10/19
	 * Time: 3:59 PM
	 */

	add_action( 'cmb2_admin_init', 'gonka_options' );
	/**
	 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
	 */
	function gonka_options() {

		/**
		 * Sample metabox to demonstrate each field type included
		 */
		$cmb = new_cmb2_box( array(
			'id'           => 'gonka_options',
			'title'        => esc_html__( 'Настройки страницы', 'cmb2' ),
			'object_types' => [ 'gonka' ], // Post type
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

		$cmb->add_field( array(
			'name' => 'Дата начала гонки',
			'id'   => 'gonka_start',
			'type' => 'text_date',
			// 'timezone_meta_key' => 'wiki_test_timezone',
			 'date_format' => 'd.m.Y',
		) );

		$cmb->add_field( array(
			'name' => 'Короткое описание',
			'id'   => 'small_description',
			'type' => 'textarea_small',
		) );

		$cmb->add_field( array(
			'name' => 'Фото',
			'id'   => 'photo',
			'type' => 'file_list',
		) );

		$cmb->add_field( array(
			'name' => 'Карта',
			'id'   => 'map',
			'type' => 'file',
		) );

		$cmb->add_field( array(
			'name' => 'Схема проезда',
			'id'   => 'shema',
			'type' => 'file',
		) );

		$video_field_id = $cmb->add_field( array(
			'id'          => 'video_group',
			'type'        => 'group',
			'description' => __( 'Вы можете добавить видео с YouTube', 'cmb2' ),
			// 'repeatable'  => false, // use false if you want non-repeatable group
			'options'     => array(
				'group_title'   => __( 'Видео {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
				'add_button'    => __( 'Добавит Видео', 'cmb2' ),
				'remove_button' => __( 'Удалить Видео', 'cmb2' ),
				'sortable'      => true, // beta
				'closed'        => true, // true to have the groups closed by default
			),
		) );

		$cmb->add_group_field( $video_field_id, array(
			'name' => 'oEmbed',
			'desc' => 'Enter a youtube, twitter, or instagram URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.',
			'id'   => 'video',
			'type' => 'oembed',
		) );
	}

	add_action( 'cmb2_admin_init', 'gonka_seo' );
	/**
	 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
	 */
	function gonka_seo() {

		$cmb = new_cmb2_box( array(
			'id'           => 'gonka_options',
			'title'        => esc_html__( 'Текст Гонки', 'cmb2' ),
			'object_types' => [ 'gonka' ], // Post type
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

		$cmb->add_field( array(
			'name'    => 'Текст Гонки RU',
			'id'      => 'text_ru',
			'type'    => 'wysiwyg',
			'options' => array(),
		) );

		$cmb->add_field( array(
			'name'    => 'Текст Гонки EN',
			'id'      => 'text_en',
			'type'    => 'wysiwyg',
			'options' => array(),
		) );

	}