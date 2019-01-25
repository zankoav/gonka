<li class="single">
    <div class="single__content">
        <div class="single__image-bg" style="background-image:url('<?= get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>')"></div>
        <div class="single__from">
            <div class="single__date"><?= get_the_date( 'd.m.y' ); ?></div>
            <div class="single__by"><?= Lang::get( 'by' ); ?></div>
            <div class="single__autor">betta</div>
        </div>
        <h3 class="single__title"><?= get_post_meta( get_the_ID(), 'gonka_title_' . Lang::current(), 1 ); ?></h3>
        <div class="single__button">
            <a class="button button_gonka" href="<?= get_the_permalink(); ?>" target="_blank">
                <?= Lang::get( 'read more' ); ?></a>
        </div>
    </div>
</li>
