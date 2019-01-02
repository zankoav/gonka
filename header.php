<?php
    $point = (int) WC()->cart->get_cart_contents_count();
	$login = Lang::get('login');
    if(is_user_logged_in()){
	    $current_user = wp_get_current_user();
	    $login     = $current_user->user_firstname ? $current_user->user_firstname : $current_user->user_email;
    }

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body>

<?php if ( is_page_template( 'template-home.php' ) ): ?>
    <header class="header">
        <header class="header-top">
            <div class="container">
                <div class="header-top__inner">
                    <div class="header-top__menu"><a class="header-top__menu-button"><span></span><span></span><span></span></a>
                        <ul class="menu menu_gonka-top">
                            <li class="menu__item menu__item_active"><a href="#">Новости</a></li>
                            <li class="menu__item"><a href="#">Партнеры</a></li>
                        </ul>
                    </div>
                    <div class="header-top__langs">
                        <div class="langs"><a class="langs__current" href="#" data-current-lang="ru">RU<i class="fas fa-angle-down"></i></a>
                            <ul class="langs__list">
                                <li class="langs__item"><a href="#" data-lang="ru">RU</a></li>
                                <li class="langs__item"><a href="#" data-lang="en">EN</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="header-top__cart">
                        <!--+shopping-cart(false,'100.00')-->
                    </div>
                    <div class="header-bottom__profile"><a class="profile" href="#"><img class="profile__icon" src="/wp-content/themes/gonka/src/icons/profile.d7e3d5.svg" alt="profile">
                            <div class="profile__default"><span class="profile__link profile__link_login">Личный кабинет</span></div></a>
                    </div>
                    <div class="header-top__search"><a class="header-top__search-button"><i class="fas fa-search"></i></a>
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
                    <div class="header-bottom__logo"><a class="logo " href="/"><img class="logo__icon" src="/wp-content/themes/gonka/src/icons/BettaWT.65743c.svg" alt="logo"></a>
                    </div>
                    <div class="header-bottom__menu">
                        <div class="header-bottom__registration"><a class="header-bottom__registration-link" href="#"><img class="header-bottom__registration-image" src="/wp-content/themes/gonka/src/icons/registration.9cba10.svg"><span class="header-bottom__registration-title">Регистрация</span></a>
                            <div class="header-bottom__time" href="#"><img class="header-bottom__registration-image" src="/wp-content/themes/gonka/src/icons/time.a8efc5.svg"><span class="header-bottom__registration-title">48:30:20</span></div>
                        </div>
                        <div class="categories-container swiper-container">
                            <ul class="categories swiper-wrapper">
                                <li class="categories__item swiper-slide"><a href="#">Положение</a></li>
                                <li class="categories__item swiper-slide categories__item_active" data-active-menu="1"><a href="#">Кубок</a></li>
                                <li class="categories__item swiper-slide"><a href="#">Гонки</a></li>
                                <li class="categories__item swiper-slide"><a href="#">Медиа</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <marquee class="header-bottom__line" scrollamount="15">Бегущая строка cлева направо</marquee>
        <div class="header__slider">
            <div class="main-slider">
                <div class="main-slider__parallax" style="background-image:url(/wp-content/themes/gonka/src/icons/javelin.81aeb3.jpg)" data-swiper-parallax="-23%"></div>
                <div class="container">
                    <div class="main-slider__title" data-swiper-parallax="-300">Гонки на выживание</div>
                    <div class="main-slider__subtitle" data-swiper-parallax="-200">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident, repellendus!
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos nam officiis pariatur?
                        Lorem ipsum dolor sit amet, consectetur adipisicing.
                    </div><a class="button button_gonka" href="#" target="_blank">Подробнее</a>
                </div>
            </div>
        </div>
    </header>
<?php else: ?>
    <header class="header">
        <header class="header-top">
            <div class="container">
                <div class="header-top__inner">
                    <div class="header-top__menu"><a class="header-top__menu-button"><span></span><span></span><span></span></a>
                        <ul class="menu menu_gonka-top">
                            <li class="menu__item menu__item_active"><a href="#">Новости</a></li>
                            <li class="menu__item"><a href="#">Партнеры</a></li>
                        </ul>
                    </div>
                    <div class="header-top__langs">
                        <div class="langs"><a class="langs__current" href="#" data-current-lang="ru">RU<i class="fas fa-angle-down"></i></a>
                            <ul class="langs__list">
                                <li class="langs__item"><a href="#" data-lang="ru">RU</a></li>
                                <li class="langs__item"><a href="#" data-lang="en">EN</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="header-top__cart">
                        <!--+shopping-cart(false,'100.00')-->
                    </div>
                    <div class="header-bottom__profile"><a class="profile" href="#"><img class="profile__icon" src="/wp-content/themes/gonka/src/icons/profile.d7e3d5.svg" alt="profile">
                            <div class="profile__default"><span class="profile__link profile__link_login">Личный кабинет</span></div></a>
                    </div>
                    <div class="header-top__search"><a class="header-top__search-button"><i class="fas fa-search"></i></a>
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
                    <div class="header-bottom__logo"><a class="logo " href="/"><img class="logo__icon" src="/wp-content/themes/gonka/src/icons/BettaWT.65743c.svg" alt="logo"></a>
                    </div>
                    <div class="header-bottom__menu">
                        <div class="header-bottom__registration"><a class="header-bottom__registration-link" href="#"><img class="header-bottom__registration-image" src="/wp-content/themes/gonka/src/icons/registration.9cba10.svg"><span class="header-bottom__registration-title">Регистрация</span></a>
                            <div class="header-bottom__time" href="#"><img class="header-bottom__registration-image" src="/wp-content/themes/gonka/src/icons/time.a8efc5.svg"><span class="header-bottom__registration-title">48:30:20</span></div>
                        </div>
                        <div class="categories-container swiper-container">
                            <ul class="categories swiper-wrapper">
                                <li class="categories__item swiper-slide"><a href="#">Положение</a></li>
                                <li class="categories__item swiper-slide categories__item_active" data-active-menu="1"><a href="#">Кубок</a></li>
                                <li class="categories__item swiper-slide"><a href="#">Гонки</a></li>
                                <li class="categories__item swiper-slide"><a href="#">Медиа</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <marquee class="header-bottom__line" scrollamount="15">Бегущая строка cлева направо</marquee>
    </header>
<?php endif; ?>
