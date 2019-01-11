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
require_once __DIR__ . '/core/menu.php';
require_once __DIR__ . '/core/woocommerce.php';
require_once __DIR__ . '/core/hooks/hooks.php';

require_once __DIR__ . '/core/styles.php';
require_once __DIR__ . '/core/scripts.php';

require_once __DIR__ . '/core/cmb2/common.php';
require_once __DIR__ . '/core/cmb2/metaPostData.php';
require_once __DIR__ . '/core/cmb2/media.php';
require_once __DIR__ . '/core/cmb2/gonka.php';



add_filter( 'the_title', function ( $title, $id ) {
	$titleLang = get_post_meta( $id, 'gonka_title_' . Lang::current(), 1 );
	if ( isset( $titleLang ) and ! empty( $titleLang ) ) {
		return $titleLang;
	} else {
		return $title;
	}
}, 10, 2 );
