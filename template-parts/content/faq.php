<?php
	$query        = new WP_Query( array( 'post_type' => 'faq', 'post_per_page' => -1 ) );
	$faqs     = $query->get_posts();
?>


<div class="page">
	<div class="container">
		<div class="page__inner">
			<h1 class="title">Популярные вопросы</h1>
			<div class="faqs">
                <?php foreach ($faqs as $faq): ?>
				<div class="faq"><a class="faq__title" href="#"><?= get_post_meta($faq->ID, 'gonka_title_'.Lang::current(),1)?></a>
					<main class="content content_white">
						<div class="content__inner">
							<?= wpautop(get_post_meta($faq->ID, 'text_'.Lang::current(),1));?>
						</div>
					</main>
				</div>
                <?php endforeach;?>
			</div>
		</div>
	</div>
</div>