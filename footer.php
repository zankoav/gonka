<?php
$ln            = Lang::current();
$options       = SingletonOptions::getOptions();
$vk_link       = $options["vk_link"];
$address       = $options[ "address_" . $ln ];
$email         = $options["email"];
$phone         = $options["phone"];
$fb_link       = $options["fb_link"];
$linkedin_link = $options["linkedin_link"];
$logo = $options['logo_light'];
$footer_paragraph = $options['footer_paragraph'];
?>
<footer class="footer">
	<div class="container">
		<div class="footer__row">
			<div class="footer__col">
				<h3 class="footer__title">Betta Sport</h3>
				<a class="footer__logo-link" href="/">
					<img class="footer__logo-icon" src="<?= $logo;?>">
				</a>
				<p class="footer__text"><?= $footer_paragraph;?></p>
			</div>
			<div class="footer__col">
				<h3 class="footer__title">Меню</h3>

				<?php get_template_part( 'template-parts/menu/footer-menu' ) ?>

			</div>
			<div class="footer__col">
				<h3 class="footer__title">Контакты</h3>
				<div class="footer__item footer__item_location"><?= $address; ?></div>
				<a class="footer__item footer__item_email" href="mailto:<?= $email; ?>"><?= $email; ?></a>
				<a class="footer__item footer__item_phone" href="tel:<?= $phone; ?>"><?= $phone; ?></a>
				<div class="socials undefined">
					<a class="socials__link" href="<?= $vk_link; ?>" target="_blank"><i class="fab fa-vk"></i></a>
					<a class="socials__link" href="<?= $fb_link; ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
					<a class="socials__link" href="<?= $linkedin_link; ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
				</div>
			</div>
			<div class="footer__col">
				<h3 class="footer__title">Ссылки</h3>

				<?php get_template_part( 'template-parts/menu/footer-menu-links' ) ?>
<!--				<ul class="footer__menu">-->
<!--					<li class="footer__menu-item"><a href="#">Новости</a></li>-->
<!--					<li class="footer__menu-item footer__menu-item_active"><a href="#">Контакты</a></li>-->
<!--					<li class="footer__menu-item"><a href="#">Партнеры</a></li>-->
<!--					<li class="footer__menu-item"><a href="#">FAQ?</a></li>-->
<!--				</ul>-->

			</div>
		</div>
	</div>
</footer>
<footer class="footer__bottom">
	<div class="container">
		<div class="footer__bottom-inner">
			<div class="footer__pay-systems"><img src="/wp-content/themes/gonka/src/icons/master-card.5d5a59.png"><img
					src="/wp-content/themes/gonka/src/icons/visa.49832b.png"></div>
			<div class="footer__copy-right">&copy; <?= date('Y');?> Все права защищены.</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>