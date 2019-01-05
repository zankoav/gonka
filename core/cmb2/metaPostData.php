<?php

add_action( 'cmb2_admin_init', 'add_redactors_to_post' );
function add_redactors_to_post() {
	$prefix = 'gonka_';

	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'redactors',
		'title'         => esc_html__( 'Контент', 'cmb2' ),
		'object_types'  => [ 'post' ], // Post type
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

//short description

	$cmb_demo->add_field( array(
		'name'       => esc_html__( 'Краткое описание RU', 'cmb2' ),
		'desc'       => esc_html__( 'Отображается на странице новостей RU', 'cmb2' ),
		'id'         => $prefix . 'description_ru',
		'type'       => 'textarea_small',
	) );
	$cmb_demo->add_field( array(
		'name'       => esc_html__( 'Краткое описание EN', 'cmb2' ),
		'desc'       => esc_html__( 'Отображается на странице новостей EN', 'cmb2' ),
		'id'         => $prefix . 'description_en',
		'type'       => 'textarea_small',
	) );


//main content

	$cmb_demo->add_field( array(
		'name'       => esc_html__( 'Основной контент', 'cmb2' ),
		'id'         => $prefix . 'title_post',
		'type'       => 'title',
	) );

	$cmb_demo->add_field( array(
		'name'       => esc_html__( 'Редактор RU', 'cmb2' ),
		'id'         => $prefix . 'redactor_ru',
		'type'       => 'wysiwyg',
	) );

	$cmb_demo->add_field( array(
		'name'       => esc_html__( 'Редактор EN', 'cmb2' ),
		'id'         => $prefix . 'redactor_en',
		'type'       => 'wysiwyg',
	) );


}
