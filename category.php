<?php get_header();

$home         = Lang::get( 'home' );
$blog         = Lang::get( 'blog' );
?>

	<div class="category">
		<div class="container">
			<div class="breadcrumbs">
				<h2 class="breadcrumbs__title"><?= $blog; ?></h2>
				<div class="breadcrumbs__nav">
					<a class="breadcrumbs__item breadcrumbs__link" href="/"><?= $home; ?></a>
					<span class="breadcrumbs__item"><?= $blog; ?></span>
				</div>
			</div>
			<div class="category__row" id="blog-content">
				<div class="category__col" id="blog-news">
					<ul class="single-big-list">

						<?php if ( have_posts() ) {
							while ( have_posts() ) {
								the_post();
								get_template_part( 'template-parts/content/single-news' );
							}
						}
						?>
					</ul>

				</div>

				<?php get_template_part('template-parts/blog-sidebar')?>

			</div>
		</div>
	</div>

<?php get_footer(); ?>