<!doctype html>
<html lang="ru">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="top-header">
    <div class="container">
        <div class="top-header__inner">
            <div class="top-header__contacts"><a class="top-header__info top-header__info_phone"
                                                 href="tel:1-555-644-5566"><i class="fas fa-mobile-alt"></i>1-555-644-5566</a><span
                        class="top-header__info top-header__info_location"><i class="fas fa-map-marker-alt"></i>Studio City, CA 91604</span>
            </div>
            <div class="top-header__search">
                <form class="search" action="/" method="get">
                    <input class="search__input" type="text" placeholder="Search...">
                    <button class="search__button" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
