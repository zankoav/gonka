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
		$cmb_options->add_field( array(
			'name'    => esc_html__( 'Логотип компании', THEME_NAME ),
			'id'      => 'bg_color',
			'type'    => 'title',
		) );


		$cmb_options->add_field( array(
			'name'    => esc_html__( 'Логотип Картинка', THEME_NAME ),
			'id'      => 'logo_light',
			'type'    => 'file',
		) );

	}