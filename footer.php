<footer class="footer">
    <div class="container">
        <div class="footer__row">
            <div class="footer__col">
                <h3 class="footer__title">Betta club</h3><a class="footer__logo-link" href="/"><img class="footer__logo-icon" src="/wp-content/themes/gonka/src/icons/logo.5b210d.svg"></a>
                <p class="footer__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusamus architecto culpa, dignissimos ex, illum.</p>
            </div>
            <div class="footer__col">
                <h3 class="footer__title">Меню</h3>
	            <?php get_template_part( 'template-parts/menu/footer-menu' ); ?>
            </div>
            <div class="footer__col">
                <h3 class="footer__title">Контакты</h3>
                <div class="footer__item footer__item_location">Минск, ул. Карла Маркса 10</div><a class="footer__item footer__item_email" href="mailto:info@gifty">info@example.com</a><a class="footer__item footer__item_phone" href="tel:+375 29 222 83 38">+375 29 222 83 38</a>
                <div class="socials undefined"><a class="socials__link" href="#" target="_blank"><i class="fab fa-vk"></i></a><a class="socials__link" href="#" target="_blank"><i class="fab fa-facebook-f"></i></a><a class="socials__link" href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a></div>
            </div>
            <div class="footer__col">
                <h3 class="footer__title">Ссылки</h3>
	            <?php get_template_part( 'template-parts/menu/footer-menu-links' ); ?>
            </div>
        </div>
    </div>
</footer>
<footer class="footer__bottom">
    <div class="container">
        <div class="footer__bottom-inner">
            <div class="footer__pay-systems"><img src="/wp-content/themes/gonka/src/icons/master-card.5d5a59.png"><img src="/wp-content/themes/gonka/src/icons/visa.49832b.png"></div>
            <div class="footer__copy-right">&copy; 2019 Все права защищены.</div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>