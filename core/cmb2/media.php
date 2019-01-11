<?php
	/**
	 * Created by PhpStorm.
	 * User: alexandrzanko
	 * Date: 1/10/19
	 * Time: 3:59 PM
	 */

	add_action( 'cmb2_admin_init', 'meida_page_metabox' );

	function meida_page_metabox(){
		$cmb = new_cmb2_box( array(
			'id'           => 'media-information',
			'title'        => 'Меди Информация',
			'object_types' => array( 'page' ), // post type
			'show_on'      => array( 'key' => 'page-template', 'value' => 'template-media.php' ),
			'context'      => 'normal', //  'normal', 'advanced', or 'side'
			'priority'     => 'high',  //  'high', 'core', 'default' or 'low'
			'show_names'   => true, // Show field names on the left
		) );

		$cmb->add_field(array(
			'name' => 'Фото',
			'id' => 'photo',
			'type' => 'file_list',
		));

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