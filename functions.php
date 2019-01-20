<?php
	/**
	 * Created by PhpStorm.
	 * User: alexandrzanko
	 * Date: 12/4/18
	 * Time: 5:00 PM
	 */

	define( 'THEME_NAME', get_template() );
	define( 'BASE_URL', '/wp-content/themes/' . THEME_NAME );

	require_once __DIR__ . '/utils/Lang.php';
	require_once __DIR__ . '/utils/Assets.php';
	require_once __DIR__ . '/utils/SingletonOptions.php';

	require_once __DIR__ . '/core/init_theme.php';
	require_once __DIR__ . '/core/customTypes/gonka.php';
	require_once __DIR__ . '/core/customTypes/faq.php';
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


	add_filter( 'the_title', function ( $title, $id ) {
		$titleLang = get_post_meta( $id, 'gonka_title_' . Lang::current(), 1 );
		if ( isset( $titleLang ) and ! empty( $titleLang ) ) {
			return $titleLang;
		} else {
			return $title;
		}
	}, 10, 2 );



	function my_custom_endpoints() {
		add_rewrite_endpoint( 'my-commands', EP_ROOT | EP_PAGES );
//		add_rewrite_endpoint( 'profile', EP_ROOT | EP_PAGES );
	}

	add_action( 'init', 'my_custom_endpoints' );

	function my_custom_query_vars( $vars ) {
		$vars[] = 'my-commands';
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
			'edit-account'    => __( 'Изменить профиль', 'woocommerce' ),
			'my-commands'    => 'Мои команды',
			'customer-logout' => __( 'Выйти', 'woocommerce' ),
		);

		return $items;
	}

	add_filter( 'woocommerce_account_menu_items', 'my_custom_my_account_menu_items' );

	function my_custom_endpoint_content() {
		include 'woocommerce/myaccount/my-commands.php';
	}

	add_action( 'woocommerce_account_my-commands_endpoint', 'my_custom_endpoint_content' );

//	function profile_endpoint_content() {
//		include 'woocommerce/myaccount/profile.php';
//	}
//
//	add_action( 'woocommerce_account_profile_endpoint', 'profile_endpoint_content' );


	function getEarlyGonka(){
// задаем нужные нам критерии выборки данных из БД

		$gonkaQuery = new WP_Query;


		$args = array(
			'posts_per_page' => 1,
			'post_type'=>'gonka',
			'meta_query' => array(
				'gonka_date' => array(
					'key'     => 'gonka_start',
					'value'   => date('Y.m.d'),
					'compare' => '>',
				),
			),
			'orderby' => 'gonka_date',
			'order'   => 'ASC',
		);

		$gonkaArr = $gonkaQuery->query($args);
		$gonka = $gonkaArr[0];

		$time = get_post_meta($gonka->ID, 'gonka_start', 1);

		if(!empty($time)){
            return $time;
        }


	    return '2030-01-20';
    }


	add_action( 'woocommerce_register_form_start', 'add_custom_registrations_fields' );
	function add_custom_registrations_fields(){
		get_template_part( 'template-parts/registration/registration' );
	}
?>