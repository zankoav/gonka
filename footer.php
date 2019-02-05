<?php
	$ln               = Lang::current();
	$options          = SingletonOptions::getOptions();
	$address          = $options[ "address_" . $ln ];
	$email            = $options["email"];
	$phone            = $options["phone"];
	$vk_link          = $options["vk_link"];
	$fb_link          = $options["fb_link"];
	$instagram_link   = $options["instagram_link"];
	$logo             = $options['logo_light'];
	$footer_paragraph = $options[ 'footer_paragraph_' . $ln ];
	$footer_unp_title = $options[ 'footer_unp_title_' . $ln ];
	$payment_img      = $options['footer_payment'];
?>
<footer class="footer">
    <div class="container">
        <div class="footer__row">
            <div class="footer__col">
                <!--                <h3 class="footer__title">--><? //= $footer_unp_title; ?><!--</h3>-->
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
                    <a class="socials__link" href="<?= $instagram_link; ?>" target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
            <div class="footer__col">
                <!--                <h3 class="footer__title">--><? //= Lang::get( 'Links' ); ?><!--</h3>-->
				<?php get_template_part( 'template-parts/menu/footer-menu-links' ) ?>
            </div>
        </div>
    </div>
</footer>
<footer class="footer__bottom">
    <div class="container">
        <div class="footer__bottom-inner">
            <div class="footer__pay-systems">
                <img src="<?= $payment_img; ?>" alt="pay systems">
            </div>
            <div class="footer__copy-right">&copy; <?= date( 'Y' ); ?> <?= Lang::get( 'All rights reserved.' ); ?></div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>