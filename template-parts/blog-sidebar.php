<?php
$options       = SingletonOptions::getOptions();
$vk_link       = $options["vk_link"];
$fb_link       = $options["fb_link"];
$linkedin_link = $options["linkedin_link"];

$args = array(
	'numberposts'      => 10,
	'offset'           => 0,
	'category'         => 0,
	'orderby'          => 'post_date',
	'order'            => 'DESC',
	'post_type'        => 'post',
	'post_status'      => 'publish',
	'suppress_filters' => true
);

$recent_posts = wp_get_recent_posts( $args, ARRAY_A );

$tags_list = get_tags();

$resent_posts = Lang::get( 'resent posts' );
$tags         = Lang::get( 'tags' );
?>


<div class="category__col" id="blog-sidebar">
	<div class="category__sidebar-inner">

		<div class="widjet">
			<h3 class="widjet__title"><?= $resent_posts; ?></h3>
			<ul class="widjet-recent-posts">

				<?php foreach ( $recent_posts as $post ) :
					//var_dump($post);
					$post_date = get_the_date('d.m.Y',$post['ID'] );
					$post_title = $post['post_title'];
					$post_link = get_permalink( $post['ID'] );
					?>
					<li class="widjet-recent-posts__item">
						<p class="widjet-recent-posts__item-date"><?= $post_date; ?></p>
						<a href="<?= $post_link; ?>"><?= $post_title; ?></a>
					</li>
				<?php endforeach; ?>

			</ul>
		</div>

		<div class="widjet">
			<h3 class="widjet__title"><?= $tags; ?></h3>
			<div class="widjet-tags">

				<?php foreach ( $tags_list as $tag ) :
					$tag_name = $tag->name;
					$tag_link = get_tag_link( $tag->term_id);
					?>
					<a class="widjet-tags__item" href="<?= $tag_link; ?>"><?= $tag_name; ?></a>
				<?php endforeach; ?>

			</div>
		</div>

		<div class="widjet">
			<h3 class="widjet__title"><?= Lang::get('Socials');?></h3>
			<div class="socials socials_widjet">

				<a class="socials__link" href="<?= $vk_link; ?>"><i class="fab fa-vk"></i></a>
				<a class="socials__link" href="<?= $fb_link; ?>"><i class="fab fa-facebook-f"></i></a>
				<a class="socials__link" href="<?= $linkedin_link; ?>"><i
						class="fab fa-linkedin-in"></i></a>

			</div>
		</div>

	</div>
</div>
