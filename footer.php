<?php
	$ln               = Lang::current();
	$options          = SingletonOptions::getOptions();
	$address          = $options[ "address_" . $ln ];
	$email            = $options["email"];
	$phone            = $options["phone"];
	$vk_link          = $options["vk_link"];
	$fb_link          = $options["fb_link"];
	$linkedin_link    = $options["linkedin_link"];
	$logo             = $options['logo_light'];
	$footer_paragraph = $options[ 'footer_paragraph_' . $ln ];
	$footer_unp_title = $options[ 'footer_unp_title_' . $ln ];
?>
<footer class="footer">
    <div class="container">
        <div class="footer__row">
            <div class="footer__col">
                <h3 class="footer__title"><?= $footer_unp_title; ?></h3>
                <a class="footer__logo-link" href="/">
                    <img class="footer__logo-icon" src="<?= $logo; ?>">
                </a>
                <p class="footer__text"><?= $footer_paragraph; ?></p>
            </div>
            <div class="footer__col">
                <h3 class="footer__title"><?= Lang::get( 'Menu' ); ?></h3>

				<?php get_template_part( 'template-parts/menu/footer-menu' ) ?>

            </div>
            <div class="footer__col">
                <h3 class="footer__title"><?= Lang::get( 'Contacts' ); ?></h3>
                <div class="footer__item footer__item_location"><?= $address; ?></div>
                <a class="footer__item footer__item_email" href="mailto:<?= $email; ?>"><?= $email; ?></a>
                <a class="footer__item footer__item_phone" href="tel:<?= $phone; ?>"><?= $phone; ?></a>
                <div class="socials undefined">
                    <a class="socials__link" href="<?= $vk_link; ?>" target="_blank"><i class="fab fa-vk"></i></a>
                    <a class="socials__link" href="<?= $fb_link; ?>" target="_blank"><i
                                class="fab fa-facebook-f"></i></a>
                    <a class="socials__link" href="<?= $linkedin_link; ?>" target="_blank"><i
                                class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="footer__col">
                <h3 class="footer__title"><?= Lang::get( 'Links' ); ?></h3>
				<?php get_template_part( 'template-parts/menu/footer-menu-links' ) ?>
            </div>
        </div>
    </div>
</footer>
<footer class="footer__bottom">
    <div class="container">
        <div class="footer__bottom-inner">
            <div class="footer__pay-systems">
                <img src="/wp-content/themes/gonka/src/icons/master-card.5d5a59.png">
                <img src="/wp-content/themes/gonka/src/icons/visa.49832b.png">
            </div>
            <div class="footer__copy-right">&copy; <?= date( 'Y' ); ?> <?= Lang::get( 'All rights reserved.' ); ?></div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>