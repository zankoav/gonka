<?php get_header();


$id = get_the_ID();
$link = get_permalink($id);
$tags =wp_get_post_tags($id);
$title = get_the_title();

$read_more = Lang::get('read more');
$by = Lang::get('by');
$ln =Lang::current();
$home =Lang::get('home');


$meta_data = get_post_meta($id );
$post_content = $meta_data["gonka_redactor_".$ln][0];

?>
	<div class="category">
		<div class="container">
			<div class="breadcrumbs">
				<h2 class="breadcrumbs__title"><?= $title;?></h2>
				<div class="breadcrumbs__nav">
					<a class="breadcrumbs__item breadcrumbs__link" href="/"><?=$home;?></a>
					<span class="breadcrumbs__item"><?= $title;?></span>
				</div>
			</div>
			<div class="category__row" id="blog-content">
				<div class="category__col" id="blog-news">
					<div class="single-big">
						<div class="single-big__content-image">

							<a href="<?= $link;?>">
								<img class="single-big__image" src="<?= get_the_post_thumbnail_url($id )?>" alt="Новость 1">
							</a>

							<div class="single-big__tags">
								<?php foreach ( $tags as $tag ) :
									$tag_link = get_term_link($tag->term_id);
									$tag_name = $tag->name; ?>
									<a class="button button_gonka button_gonka_tag" href="<?= $tag_link;?>" target="_blank"><?= $tag_name;?></a>
								<?php endforeach;?>
							</div>

						</div>
						<div class="single-big__content">
							<h1 class="single-big__title"><?= the_title();?></h1>
							<div class="single-big__from">
								<div class="single-big__date"><?= get_the_date();?></div>
								<div class="single-big__by"><?= $by;?></div>
								<div class="single-big__autor"><?= get_the_author();?></div>
							</div>
							<main class="content content_white">
								<div class="content__inner">

									<?= $post_content;?>

								</div>
							</main>
						</div>
					</div>
				</div>

				<?php get_template_part('template-parts/blog-sidebar')?>

			</div>
		</div>
	</div>
<?php get_footer(); ?>