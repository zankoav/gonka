<?php
	/**
	 * Created by PhpStorm.
	 * User: alexandrzanko
	 * Date: 1/10/19
	 * Time: 3:59 PM
	 */

	add_action( 'cmb2_admin_init', 'faq_page_metabox' );

	function faq_page_metabox(){
		$cmb = new_cmb2_box( array(
			'id'           => 'faq-information',
			'title'        => 'Faq Текст',
			'object_types' => array( 'faq' ),
		) );

		$cmb->add_field( array(
			'name'    => 'Текст Faq RU',
			'id'      => 'text_ru',
			'type'    => 'wysiwyg',
			'options' => array(),
		) );

		$cmb->add_field( array(
			'name'    => 'Текст Faq EN',
			'id'      => 'text_en',
			'type'    => 'wysiwyg',
			'options' => array(),
		) );
	}