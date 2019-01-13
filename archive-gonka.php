<?php get_header(); ?>

    <div class="gonki">
        <div class="container">
            <div class="breadcrumbs">
                <h2 class="breadcrumbs__title">Календарь</h2>
                <div class="breadcrumbs__nav"><a class="breadcrumbs__item breadcrumbs__link" href="#">Home</a><span
                            class="breadcrumbs__item">Календарь</span></div>
            </div>
            <div class="gonki__inner">
                <h1 class="title">Календарь</h1>
                <div class="gonki__tabs"><a class="gonki__tabs-item gonki__tabs-item_early gonki__tabs-item_active"
                                            href="#">Предстоящие</a><a class="gonki__tabs-item gonki__tabs-item_archive"
                                                                       href="#">Архив</a></div>
                <ul class="gonki__list gonki__list_early gonki__list_active">
                <?php
	                // задаем нужные нам критерии выборки данных из БД
	                $args = array(
		                'posts_per_page' => -1,
                        'post_type'=>'gonka',
                        'meta_query' => array(
				                'gonka_date' => array(
					                'key'     => 'gonka_start',
					                'value'   => date('d.m.Y'),
					                'compare' => '>=',
				                ),
			                ),
			                'orderby' => 'gonka_date',
			                'order'   => 'DESC',
	                );

	                $query = new WP_Query( $args );

	                // Цикл
	                if ( $query->have_posts() ) {
		                while ( $query->have_posts() ) :
			                $query->the_post(); ?>
                            <li class="gonki__item">
                                <div class="gonka-item">
                                    <img class="gonka-item__img" src="<?= wp_get_attachment_image_url(get_post_thumbnail_id(get_the_ID()), 'full')?>"
                                                             alt="gonka">
                                    <div class="gonka-item__content">
                                        <h2 class="gonka-item__title"><?= get_the_title();?></h2>
                                        <p class="gonka-item__description"><?= get_post_meta(get_the_ID(),'small_description',1)?></p>
                                        <footer class="gonka-item__footer"><a class="gonka-item__show-more" href="<?= get_permalink();?>"
                                                                              target="_blank">Подробнее</a></footer>
                                    </div>
                                </div>
                            </li>
		                <?php endwhile;
		                wp_reset_postdata();
	                }
                ?>
                </ul>
                <ul class="gonki__list gonki__list_archive">
	                <?php
		                // задаем нужные нам критерии выборки данных из БД
		                $args = array(
			                'posts_per_page' => -1,
			                'post_type'=>'gonka',
			                'meta_query' => array(
				                'gonka_date' => array(
					                'key'     => 'gonka_start',
					                'value'   => date('d.m.Y'),
					                'compare' => '<',
				                ),
			                ),
			                'orderby' => 'gonka_date',
			                'order'   => 'DESC',
		                );

		                $query = new WP_Query( $args );

		                // Цикл
		                if ( $query->have_posts() ) {
			                while ( $query->have_posts() ) :
				                $query->the_post(); ?>
                                <li class="gonki__item">
                                    <div class="gonka-item">
                                        <img class="gonka-item__img" src="<?= wp_get_attachment_image_url(get_post_thumbnail_id(get_the_ID()), 'full')?>"
                                             alt="gonka">
                                        <div class="gonka-item__content">
                                            <h2 class="gonka-item__title"><?= get_the_title();?></h2>
                                            <p class="gonka-item__description"><?= get_post_meta(get_the_ID(),'small_description',1)?></p>
                                            <footer class="gonka-item__footer"><a class="gonka-item__show-more" href="<?= get_permalink();?>"
                                                                                  target="_blank">Подробнее</a></footer>
                                        </div>
                                    </div>
                                </li>
			                <?php endwhile;
			                wp_reset_postdata();
		                }
	                ?>
                </ul>
            </div>
        </div>
    </div>

<?php get_footer(); ?>