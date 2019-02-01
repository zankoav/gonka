<?php get_header(); ?>
    <?php if ( have_posts() ) {
        while ( have_posts() ) :
            the_post();

            $photos = get_post_meta(get_the_ID(),'photo',1);
            $map = get_post_meta(get_the_ID(),'map',1);
            $shema = get_post_meta(get_the_ID(),'shema',1);
            $videos = get_post_meta(get_the_ID(),'video_group',1);
        ?>

                <div class="container">
                    <div class="gonka__inner">
                        <h1 class="title"><?= get_the_title();?></h1>
                        <div class="accordion-mixed">
                            <div class="accordion-mixed__tab accordion-mixed__tab--active" data-mixed-tab="1"><?=Lang::get('REGULATION')?></div>
                            <div class="accordion-mixed__content accordion-mixed__content--active" data-mixed-conent="1">
                                <div class="accordion-mixed__content-inner">
                                    <div class="house-description">
                                        <div class="house-description__header">
                                            <img class="house-description__image" src="<?= wp_get_attachment_image_url(get_post_thumbnail_id( get_the_ID()), 'full')?>" alt="<?= get_the_title();?>">
                                            <main class="content">
                                                <div class="content__inner">
                                                    <?= wpautop(get_post_meta(get_the_ID(),'text_'.Lang::current(),1)); ?>
                                                </div>
                                            </main>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-mixed__tab" data-mixed-tab="2"><?=Lang::get('photo')?></div>
                            <div class="accordion-mixed__content" data-mixed-conent="2">
                                <div class="swiper-container accordion-mixed__content-inner house-media-library__container">
                                    <div class="swiper-wrapper house-media-library">

	                                    <?php foreach ( (array) $photos as $attachment_id => $attachment_url ) : ?>
                                            <div class="swiper-slide house-media-library__item">
                                                <a class="house-media-library__media-wrapper" rel="group" href="<?=$attachment_url;?>">
                                                    <img class="house-media-library__media" src="<?=$attachment_url;?>" alt="picture">
                                                </a>
                                            </div>
	                                    <?php endforeach; ?>
                                    </div>
                                    <div class="house-media-library__container">
                                        <div class="b-container house-media-library__container-wrapper">
                                            <div class="swiper-button-next house-media-library__button-next"></div>
                                            <div class="swiper-button-prev house-media-library__button-prev"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-mixed__tab" data-mixed-tab="3"><?=Lang::get('map')?></div>
                            <div class="accordion-mixed__content" data-mixed-conent="3">
                                <div class="map-zoom" id="map1">
                                    <img class="map-zoom__image" src="<?=$map;?>" alt="map" data-big="<?=$map;?>">
                                    <p class="map-zoom__title">Кликни</p>
                                </div>
                            </div>
                            <div class="accordion-mixed__tab" data-mixed-tab="4"><?=Lang::get('video')?></div>
                            <div class="accordion-mixed__content" data-mixed-conent="4">
                                <div class="video">
                                    <div class="video__list">
	                                    <?php foreach ( $videos as $video ) : ?>
                                            <div class="video__wrapper">
	                                            <?= wp_oembed_get( esc_url( $video['video'] ) ); ?>
                                            </div>
	                                    <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-mixed__tab" data-mixed-tab="5"><?=Lang::get('shema_delivery')?></div>
                            <div class="accordion-mixed__content" data-mixed-conent="5">
                                <div class="map-zoom" id="map2">
                                    <img class="map-zoom__image" src="<?=$shema?>" alt="map" data-big="<?=$shema?>">
                                    <p class="map-zoom__title"><?=Lang::get('click')?></p>
                                </div>
                            </div>
                            <?php if (get_post_meta(get_the_ID(),'results_link',1)) : ?>
                            <a class="accordion-mixed__tab" href="<?=get_post_meta(get_the_ID(),'results_link',1)?>"><?=Lang::get('results')?></a>
                            <?php endif; ?>
                            <footer class="house-booking"><a class="house-booking__button" href="<?=get_permalink(get_page_by_path('apply'))?>"><?=Lang::get('registration')?></a></footer>
                        </div>
                    </div>
                </div>

        <?php endwhile;
    } ?>
<?php get_footer(); ?>