<div class="container">
    <h1 class="title"><?php the_title();?></h1>
    <main class="content content_gonka">
        <div class="content__inner">

<?php
if (strpos($wp->request, 'my-account') === 0 ) {
    wc_print_notice('Для регистрации на старт необходимо подать заявку и оплатить стартовый взнос. Сумма стартового взноса к оплате считается на день оплаты. Все неоплаченные регистрации будут сброшены перед повышением цен.', 'notice');
}
?>


            <?php the_content();?>
        </div>
    </main>
</div>