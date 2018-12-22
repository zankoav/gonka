<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php if ( is_page_template( 'template-home.php' ) ): ?>
    <header class="header header_main">
        <header class="header-top">
            <div class="container">
                <div class="header-top__inner">
                    <div class="header-top__menu"><a
                                class="header-top__menu-button"><span></span><span></span><span></span></a>
						<?php get_template_part( 'template-parts/menu/top-menu' ); ?>
                    </div>
                    <div class="header-top__langs">
                        <div class="langs"><a class="langs__current" href="#" data-current-lang="ru">RU<i
                                        class="fas fa-angle-down"></i></a>
                            <ul class="langs__list">
                                <li class="langs__item"><a href="#" data-lang="ru">RU</a></li>
                                <li class="langs__item"><a href="#" data-lang="en">EN</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="header-top__cart"><a class="shopping-cart" href="#">
                            <div class="shopping-cart__basket"><img class="shopping-cart__icon"
                                                                    src="/wp-content/themes/gonka/src/icons/shopping-cart.3ba73f.svg"><span
                                        class="shopping-cart__point">1</span></div>
                        </a>
                    </div>
                    <div class="header-top__search"><a class="header-top__search-button"><i
                                    class="fas fa-search"></i></a>
                        <div class="header-top__search_mobile_fixed">
                            <form class="search search_gonka" action="/" method="get">
                                <input class="search__input" type="text" placeholder="Поиск...">
                                <button class="search__button" type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <header class="header-bottom">
            <div class="container">
                <div class="header-bottom__inner">
                    <div class="header-bottom__profile">
                        <div class="profile "><img class="profile__icon"
                                                   src="/wp-content/themes/gonka/src/icons/profile.d7e3d5.svg"
                                                   alt="profile"><a class="profile__default" href="#"><span
                                        class="profile__link profile__link_login">Вход / Регистрация</span></a>
                        </div>
                    </div>
                    <div class="header-bottom__logo"><a class="header-bottom__logo-link" href="/"><img
                                    class="header-bottom__logo-icon"
                                    src="/wp-content/themes/gonka/src/icons/logo.5b210d.svg" alt="logo"></a></div>
                    <div class="header-bottom__socials">
                        <div class="socials undefined"><a class="socials__link" href="#" target="_blank"><i
                                        class="fab fa-vk"></i></a><a class="socials__link" href="#" target="_blank"><i
                                        class="fab fa-facebook-f"></i></a><a class="socials__link" href="#"
                                                                             target="_blank"><i
                                        class="fab fa-linkedin-in"></i></a></div>
                    </div>
                </div>
            </div>
        </header>
        <div class="header__categories">
            <div class="container">
                <div class="categories-container swiper-container">
					<?php get_template_part( 'template-parts/menu/main-menu' ); ?>
                </div>
            </div>
        </div>
        <div class="header__slider">
            <div class="swiper-container main-slider">
                <div class="main-slider__parallax"
                     style="background-image:url(/wp-content/themes/gonka/src/icons/javelin.81aeb3.jpg)"
                     data-swiper-parallax="-23%"></div>
                <div class="swiper-wrapper">
                    <div class="swiper-slide main-slider__slide">
                        <div class="container">
                            <div class="main-slider__title" data-swiper-parallax="-300">Гонки на выживание</div>
                            <div class="main-slider__subtitle" data-swiper-parallax="-200">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident, repellendus!
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos nam officiis
                                pariatur?
                                Lorem ipsum dolor sit amet, consectetur adipisicing.
                            </div>
                            <a class="button button_gonka" href="#" target="_blank">Подробнее</a>
                        </div>
                    </div>
                    <div class="swiper-slide main-slider__slide">
                        <div class="container">
                            <div class="main-slider__title" data-swiper-parallax="-300">Гонки на выживание</div>
                            <div class="main-slider__subtitle" data-swiper-parallax="-200">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident, repellendus!
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos nam officiis
                                pariatur?
                                Lorem ipsum dolor sit amet, consectetur adipisicing.
                            </div>
                            <a class="button button_gonka" href="#" target="_blank">Подробнее</a>
                        </div>
                    </div>
                    <div class="swiper-slide main-slider__slide">
                        <div class="container">
                            <div class="main-slider__title" data-swiper-parallax="-300">Гонки на выживание</div>
                            <div class="main-slider__subtitle" data-swiper-parallax="-200">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident, repellendus!
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos nam officiis
                                pariatur?
                                Lorem ipsum dolor sit amet, consectetur adipisicing.
                            </div>
                            <a class="button button_gonka" href="#" target="_blank">Подробнее</a>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination swiper-pagination-white main-slider__pagination"></div>
            </div>
        </div>
    </header>
<?php else: ?>
    <header class="header ">
        <header class="header-top">
            <div class="container">
                <div class="header-top__inner">
                    <div class="header-top__menu"><a
                                class="header-top__menu-button"><span></span><span></span><span></span></a>
						<?php get_template_part( 'template-parts/menu/top-menu' ); ?>
                    </div>
                    <div class="header-top__langs">
                        <div class="langs"><a class="langs__current" href="#" data-current-lang="ru">RU<i
                                        class="fas fa-angle-down"></i></a>
                            <ul class="langs__list">
                                <li class="langs__item"><a href="#" data-lang="ru">RU</a></li>
                                <li class="langs__item"><a href="#" data-lang="en">EN</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="header-top__cart"><a class="shopping-cart" href="#">
                            <div class="shopping-cart__basket"><img class="shopping-cart__icon"
                                                                    src="/wp-content/themes/gonka/src/icons/shopping-cart.3ba73f.svg"><span
                                        class="shopping-cart__point">1</span></div>
                        </a>
                    </div>
                    <div class="header-top__search"><a class="header-top__search-button"><i
                                    class="fas fa-search"></i></a>
                        <div class="header-top__search_mobile_fixed">
                            <form class="search search_gonka" action="/" method="get">
                                <input class="search__input" type="text" placeholder="Поиск...">
                                <button class="search__button" type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <header class="header-bottom">
            <div class="container">
                <div class="header-bottom__inner">
                    <div class="header-bottom__profile">
                        <div class="profile "><img class="profile__icon"
                                                   src="/wp-content/themes/gonka/src/icons/profile.d7e3d5.svg"
                                                   alt="profile"><a class="profile__default" href="#"><span
                                        class="profile__link profile__link_login">Вход / Регистрация</span></a>
                        </div>
                    </div>
                    <div class="header-bottom__logo"><a class="header-bottom__logo-link" href="/"><img
                                    class="header-bottom__logo-icon"
                                    src="/wp-content/themes/gonka/src/icons/logo.5b210d.svg" alt="logo"></a></div>
                    <div class="header-bottom__socials">
                        <div class="socials undefined"><a class="socials__link" href="#" target="_blank"><i
                                        class="fab fa-vk"></i></a><a class="socials__link" href="#" target="_blank"><i
                                        class="fab fa-facebook-f"></i></a><a class="socials__link" href="#"
                                                                             target="_blank"><i
                                        class="fab fa-linkedin-in"></i></a></div>
                    </div>
                </div>
            </div>
        </header>
        <div class="header__categories">
            <div class="container">
                <div class="categories-container swiper-container">
					<?php get_template_part( 'template-parts/menu/main-menu' ); ?>
                </div>
            </div>
        </div>
    </header>
<?php endif; ?>
