<?php get_header(); ?>
<div class="container">
    <main class="content content_gonka">
        <div class="content__inner">
			<?php if ( have_posts() ) {
				while ( have_posts() ) {
					the_post();
					get_template_part('template-parts/content/single-news');
				}
			}
			?>
        </div>
    </main>
</div>
<?php get_footer(); ?>