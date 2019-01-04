<?php
$point = (int) WC()->cart->get_cart_contents_count();
$ln    = Lang::current();
$login = Lang::get( 'login' );
if ( is_user_logged_in() ) {
	$current_user = wp_get_current_user();
	$login        = $current_user->user_firstname ? $current_user->user_firstname : $current_user->user_email;
}


$options = SingletonOptions::getOptions();
$logo = $options['logo_light'];
$move_line = $options["move_line"];
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
					<div class="header-top__menu">
						<a class="header-top__menu-button"><span></span><span></span><span></span></a>

						<?php get_template_part('template-parts/menu/top-menu')?>

					</div>

					<div class="header-top__langs">
						<div class="langs">
							<a class="langs__current" href="#" data-current-lang="<?= Lang::BASE_LANG===$ln? 'ru' : 'en'?>">

								<?= Lang::BASE_LANG===$ln? 'RU' : 'EN'?>

								<i class="fas fa-angle-down"></i>
							</a>
							<ul class="langs__list">
								<li class="langs__item"><a href="#" data-lang="ru">RU</a></li>
								<li class="langs__item"><a href="#" data-lang="en">EN</a></li>
							</ul>
						</div>
					</div>
					<div class="header-top__cart">
						<!--+shopping-cart(false,'100.00')-->
					</div>

					<div class="header-bottom__profile">
						<a class="profile" href="<?= get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">
							<img class="profile__icon" src="/wp-content/themes/gonka/src/icons/profile.d7e3d5.svg" alt="profile">
							<div class="profile__default">
								<span class="profile__link profile__link_login">
									<?= $login;?>
								</span>
							</div>
						</a>
					</div>

					<div class="header-top__search">
						<a class="header-top__search-button"><i class="fas fa-search"></i></a>
						<div class="header-top__search_mobile_fixed">

							<?php get_search_form();?>

						</div>
					</div>

				</div>
			</div>
		</header>
		<header class="header-bottom">
			<div class="container">
				<div class="header-bottom__inner">
					<div class="header-bottom__logo">
						<a class="logo " href="/">
							<img class="logo__icon"  src="<?= $logo;?>" alt="logo">
						</a>
					</div>
					<div class="header-bottom__menu">
						<div class="header-bottom__registration">
							<a class="header-bottom__registration-link" href="#">
								<img class="header-bottom__registration-image" src="/wp-content/themes/gonka/src/icons/registration.9cba10.svg">
								<span class="header-bottom__registration-title">Регистрация</span>
							</a>
							<div class="header-bottom__time" href="#">
								<img class="header-bottom__registration-image" src="/wp-content/themes/gonka/src/icons/time.a8efc5.svg">
								<span class="header-bottom__registration-title">48:30:20</span></div>
						</div>
						<div class="categories-container swiper-container">

							<?php get_template_part('template-parts/menu/main-menu')?>

						</div>
					</div>
				</div>
			</div>
		</header>
		<marquee class="header-bottom__line" scrollamount="15"><?= $move_line;?></marquee>
		<div class="header__slider">
			<div class="main-slider">
				<div class="main-slider__parallax"
				     style="background-image:url(/wp-content/themes/gonka/src/icons/javelin.81aeb3.jpg)"
				     data-swiper-parallax="-23%"></div>
				<div class="container">
					<div class="main-slider__title" data-swiper-parallax="-300">Гонки на выживание</div>
					<div class="main-slider__subtitle" data-swiper-parallax="-200">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident, repellendus!
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos nam officiis pariatur?
						Lorem ipsum dolor sit amet, consectetur adipisicing.
					</div>
					<a class="button button_gonka" href="#" target="_blank">Подробнее</a>
				</div>
			</div>
		</div>
	</header>
<?php else: ?>
	<header class="header">
		<header class="header-top">
			<div class="container">
				<div class="header-top__inner">
					<div class="header-top__menu">
						<a class="header-top__menu-button"><span></span><span></span><span></span></a>


						<?php get_template_part('template-parts/menu/top-menu')?>

					</div>
					<div class="header-top__langs">
						<div class="langs">
							<a class="langs__current" href="#" data-current-lang="<?= Lang::BASE_LANG===$ln? 'ru' : 'en'?>">
								<?= Lang::BASE_LANG===$ln? 'RU' : 'EN'?>
								<i class="fas fa-angle-down"></i>
							</a>
							<ul class="langs__list">
								<li class="langs__item"><a href="#" data-lang="ru">RU</a></li>
								<li class="langs__item"><a href="#" data-lang="en">EN</a></li>
							</ul>
						</div>
					</div>
					<div class="header-top__cart">
						<!--+shopping-cart(false,'100.00')-->
					</div>
					<div class="header-bottom__profile">
						<a class="profile" href="<?= get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">
							<img class="profile__icon" src="/wp-content/themes/gonka/src/icons/profile.d7e3d5.svg" alt="profile">
							<div class="profile__default">
								<span class="profile__link profile__link_login"><?= $login;?></span>
							</div>
						</a>
					</div>
					<div class="header-top__search">
						<a class="header-top__search-button"><i class="fas fa-search"></i></a>
						<div class="header-top__search_mobile_fixed">

							<?php get_search_form();?>

						</div>
					</div>
				</div>
			</div>
		</header>
		<header class="header-bottom">
			<div class="container">
				<div class="header-bottom__inner">
					<div class="header-bottom__logo">
						<a class="logo " href="/">
							<img class="logo__icon" src="<?= $logo;?>" alt="logo">
						</a>
					</div>
					<div class="header-bottom__menu">
						<div class="header-bottom__registration">
							<a class="header-bottom__registration-link" href="#">
								<img class="header-bottom__registration-image" src="/wp-content/themes/gonka/src/icons/registration.9cba10.svg">
								<span class="header-bottom__registration-title">Регистрация</span>
							</a>
							<div class="header-bottom__time" href="#">
								<img class="header-bottom__registration-image" src="/wp-content/themes/gonka/src/icons/time.a8efc5.svg">
								<span class="header-bottom__registration-title">48:30:20</span>
							</div>
						</div>
						<div class="categories-container swiper-container">

							<?php get_template_part('template-parts/menu/main-menu')?>

						</div>
					</div>
				</div>
			</div>
		</header>
		<marquee class="header-bottom__line" scrollamount="15"><?= $move_line;?></marquee>
	</header>
<?php endif; ?>
