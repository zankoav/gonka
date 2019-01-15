<?php
$id = get_the_ID();
$link = get_permalink($id);
$tags =wp_get_post_tags($id);

$read_more = Lang::get('read more');
$by = Lang::get('by');
$ln =Lang::current();


$meta_data = get_post_meta($id );
$post_content = $meta_data["gonka_redactor_".$ln][0];
$post_description = $meta_data["gonka_description_".$ln][0];

?>
<li class="single-big">
	<div class="single-big__content-image">
		<a href="<?= $link;?>">
			<img class="single-big__image" src="<?= get_the_post_thumbnail_url($id )?>" alt="Новость 1">
		</a>

		<div class="single-big__tags">
			<?php foreach ( $tags as $tag ) :
				$tag_link = get_term_link($tag->term_id);
				$tag_name = $tag->name; ?>
			<a class="button button_gonka button_gonka_tag" href="<?= $tag_link;?>"><?= $tag_name;?></a>
			<?php endforeach;?>
		</div>

	</div>
	<div class="single-big__content">
		<a href="<?= $link;?>"><h3 class="single-big__title"><?= the_title();?></h3></a>
		<div class="single-big__from">
			<div class="single-big__date"><?= get_the_date();?></div>
			<div class="single-big__by"><?= $by;?></div>
			<div class="single-big__autor"><?= get_the_author();?></div>
		</div>
		<p class="single-big__description">
			<?= $post_description;?>
		</p>
		<div class="single-big__button">
			<a class="button button_gonka" href="<?= $link;?>"><?= $read_more;?></a>
		</div>
	</div>
</li>