<?php

	$videos = get_post_meta( get_the_ID(), 'video_group', 1 );

	$photos = get_post_meta( get_the_ID(), 'photo', 1 );
?>

<div class="media">
    <div class="container">
        <div class="breadcrumbs">
            <h2 class="breadcrumbs__title">Медиа</h2>
            <div class="breadcrumbs__nav"><a class="breadcrumbs__item breadcrumbs__link" href="#">Home</a><span
                        class="breadcrumbs__item">Медиа</span></div>
        </div>
        <h2 class="title"><?= Lang::get( 'video' ); ?></h2>
        <div class="swiper-container media-video__container">
            <div class="swiper-wrapper media-video-library">
				<?php foreach ( $videos as $video ) : ?>
                    <div class="swiper-slide media-video-library__item">
						<?= wp_oembed_get( esc_url( $video['video'] ) ); ?>
                    </div>
				<?php endforeach; ?>
            </div>
            <div class="media-video__pagination"></div>
        </div>
        <h2 class="title"><?= Lang::get( 'photo' ); ?></h2>
        <div class="swiper-container accordion-mixed__content-inner house-media-library__container media-library__container">
            <div class="swiper-wrapper house-media-library">
				<?php foreach ( (array) $photos as $attachment_id => $attachment_url ) : ?>
                    <div class="swiper-slide house-media-library__item">
                        <a class="house-media-library__media-wrapper"
                           rel="group"
                           href="<?=$attachment_url;?>"><img
                                    class="house-media-library__media"
                                    src="<?=$attachment_url;?>"
                                    alt="picture">
                        </a>
                    </div>
				<?php endforeach; ?>
            </div>
            <div class="house-media-library__container">
                <div class="b-container house-media-library__container-wrapper">
                    <div class="swiper-button-next media-library__button-next"></div>
                    <div class="swiper-button-prev media-library__button-prev"></div>
                </div>
            </div>
        </div>
    </div>
</div>