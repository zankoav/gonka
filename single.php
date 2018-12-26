<?php get_header(); ?>
    <div class="container">
        <main class="content content_gonka">
            <div class="content__inner">
				<?php if ( have_posts() ) {
					while ( have_posts() ) :
						the_post(); ?>
                        <h1><?php the_title(); ?></h1>
						<?php the_content(); ?>
					<?php endwhile;
				} ?>
            </div>
        </main>
    </div>
<?php get_footer(); ?>