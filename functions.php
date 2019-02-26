<?php
	/**
	 * Created by PhpStorm.
	 * User: alexandrzanko
	 * Date: 12/4/18
	 * Time: 5:00 PM
	 */

	define( 'THEME_NAME', get_template() );
	define( 'BASE_URL', '/wp-content/themes/' . THEME_NAME );
	date_default_timezone_set( "Europe/Minsk" );

	require_once __DIR__ . '/utils/Lang.php';
	require_once __DIR__ . '/utils/Assets.php';
	require_once __DIR__ . '/utils/SingletonOptions.php';

	require_once __DIR__ . '/core/init_theme.php';
	require_once __DIR__ . '/core/customTypes/gonka.php';
	require_once __DIR__ . '/core/customTypes/faq.php';
	require_once __DIR__ . '/core/customTypes/participation.php';

	require_once __DIR__ . '/core/menu.php';
	require_once __DIR__ . '/core/woocommerce.php';
	require_once __DIR__ . '/core/hooks/hooks.php';

	require_once __DIR__ . '/core/styles.php';
	require_once __DIR__ . '/core/scripts.php';


	require_once __DIR__ . '/core/ajax.php';

	require_once __DIR__ . '/core/cmb2/common.php';
	require_once __DIR__ . '/core/cmb2/metaPostData.php';
	require_once __DIR__ . '/core/cmb2/media.php';
	require_once __DIR__ . '/core/cmb2/gonka.php';
	require_once __DIR__ . '/core/cmb2/faq.php';


	function betta_enqueue_datepicker() {
		// Load the datepicker script (pre-registered in WordPress).
		wp_enqueue_script( 'jquery-ui-datepicker' );

		// You need styling for the datepicker. For simplicity I've linked to Google's hosted jQuery UI CSS.
		wp_register_style( 'jquery-ui', '//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css' );
		wp_enqueue_style( 'jquery-ui' );
	}

	add_action( 'wp_enqueue_scripts', 'betta_enqueue_datepicker' );

	add_filter( 'the_title', function ( $title, $id ) {
		$titleLang = get_post_meta( $id, 'gonka_title_' . Lang::current(), 1 );
		if ( isset( $titleLang ) and ! empty( $titleLang ) ) {
			return $titleLang;
		} else {
			return $title;
		}
	}, 10, 2 );


	function my_custom_endpoints() {
		add_rewrite_endpoint( 'my-teams', EP_ROOT | EP_PAGES );
		add_rewrite_endpoint( 'my-applies', EP_ROOT | EP_PAGES );
//		add_rewrite_endpoint( 'profile', EP_ROOT | EP_PAGES );
	}

	add_action( 'init', 'my_custom_endpoints' );

	function my_custom_query_vars( $vars ) {
		$vars[] = 'betta-profile';

//		$vars[] = 'profile';

		return $vars;
	}

	add_filter( 'query_vars', 'my_custom_query_vars', 0 );

	function my_custom_flush_rewrite_rules() {
		flush_rewrite_rules();
	}

	add_action( 'wp_loaded', 'my_custom_flush_rewrite_rules' );

	function my_custom_my_account_menu_items( $items ) {
		$items = array(
			'dashboard'       => __( 'Профиль', 'woocommerce' ),
			//'edit-address'    => __( 'Addresses', 'woocommerce' ),
			//'payment-methods' => __( 'Payment Methods', 'woocommerce' ),
			'edit-account'    => __( 'Изменить пароль', 'woocommerce' ),
//			'my-teams'    => 'Мои команды',
			'my-applies'      => 'Мои регистрации',
			'customer-logout' => __( 'Выйти', 'woocommerce' ),
		);

		return $items;
	}

	add_filter( 'woocommerce_account_menu_items', 'my_custom_my_account_menu_items' );

	function my_custom_endpoint_applies() {
		include 'woocommerce/myaccount/my-applies.php';
	}

	function my_custom_endpoint_teams() {
		include 'woocommerce/myaccount/my-teams.php';
	}

	add_action( 'woocommerce_account_my-teams_endpoint', 'my_custom_endpoint_teams' );
	add_action( 'woocommerce_account_my-applies_endpoint', 'my_custom_endpoint_applies' );

//	function profile_endpoint_content() {
//		include 'woocommerce/myaccount/profile.php';
//	}
//
//	add_action( 'woocommerce_account_profile_endpoint', 'profile_endpoint_content' );


	function getEarlyGonka( $isDiffTime = false ) {
// задаем нужные нам критерии выборки данных из БД

		$gonkaQuery = new WP_Query;
		$timeNow    = time( 'now' );

		$args = array(
			'posts_per_page' => 1,
			'post_type'      => 'gonka',
			'meta_query'     => array(
				array(
					'key'     => 'gonka_start',
					'value'   => $timeNow,
					'compare' => '>',
				),
			),
			'orderby'        => 'gonka_start',
			'order'          => 'ASC',
		);

		$gonkaArr = $gonkaQuery->query( $args );
		$gonka    = $gonkaArr[0];

		$time = get_post_meta( $gonka->ID, 'gonka_start', 1 );

		if ( $isDiffTime and ! empty( $time ) ) {
			return $time - $timeNow - ( 3 * 60 * 60 );
		}

		if ( ! empty( $time ) ) {
			return $time * 1000;
		}


		return '2030-01-20';
	}


	add_action( 'woocommerce_register_form_start', 'add_custom_registrations_fields' );
	function add_custom_registrations_fields() {
		get_template_part( 'template-parts/registration/registration' );
	}

	add_filter( 'woocommerce_save_account_details_required_fields', 'wc_save_account_details_required_fields' );
	function wc_save_account_details_required_fields( $required_fields ) {
		unset( $required_fields['account_first_name'] );
		unset( $required_fields['account_last_name'] );
		unset( $required_fields['account_display_name'] );
		unset( $required_fields['account_email'] );

		return $required_fields;
	}


	add_action( 'manage_users_columns', 'account_verification_status_column' );
	function account_verification_status_column( $column_headers ) {
		unset( $column_headers['posts'] );
		unset( $column_headers['name'] );

		$res = array_slice( $column_headers, 0, 2, true ) +
		       array( "lastname" => "Фамилия" ) +
		       array( "firstname" => "Имя" ) +
		       array_slice( $column_headers, 1, count( $column_headers ) - 1, true );

		return $res;
	}

	add_filter( 'manage_users_sortable_columns', 'make_verification_status_column_sortable' );
	function make_verification_status_column_sortable( $vars ) {
		$columns['firstname'] = 'Имя';
		$columns['lastname']  = 'Фамилия';

		return $columns;
	}

	add_filter( 'manage_users_custom_column', 'add_user_column_value', 10, 3 );
	function add_user_column_value( $value, $column_name, $user_id ) {
		if ( 'firstname' == $column_name ) {
			$name  = get_user_meta( $user_id, 'user_name', true );
			$value = $name;

		} else if ( 'lastname' == $column_name ) {
			$lastname = get_user_meta( $user_id, 'user_surname', true );
			$value    = $lastname;
		}

		return $value;
	}

	add_action( 'pre_user_query', 'yoursite_pre_user_search' );
	function yoursite_pre_user_search( $user_search ) {
		global $wpdb;
		if ( ! isset( $_GET['s'] ) ) {
			return;
		}

		//Enter Your Meta Fields To Query
		$search_array = array(
			"user_email",
			"user_name",
			"user_surname"
		);

		$user_search->query_from .= " INNER JOIN {$wpdb->usermeta} ON {$wpdb->users}.ID={$wpdb->usermeta}.user_id AND (";
		for ( $i = 0; $i < count( $search_array ); $i ++ ) {
			if ( $i > 0 ) {
				$user_search->query_from .= " OR ";
			}
			$user_search->query_from .= "{$wpdb->usermeta}.meta_key='" . $search_array[ $i ] . "'";
		}
		$user_search->query_from  .= ")";
		$custom_where             = $wpdb->prepare( "{$wpdb->usermeta}.meta_value LIKE '%s'", "%" . $_GET['s'] . "%" );
		$user_search->query_where = str_replace( 'WHERE 1=1 AND (', "WHERE 1=1 AND ({$custom_where} OR ", $user_search->query_where );

	}
