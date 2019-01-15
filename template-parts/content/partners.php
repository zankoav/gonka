<?php

	$options  = SingletonOptions::getOptions();
	$partners = $options['partners'];
?>

<h2 class="title"><?= Lang::get( 'partners' ) ?></h2>
<div class="partners">
	<?php if ( ! empty( $partners ) ):
		foreach ( $partners as $partner ):?>
            <div class="partners__item">
                <img class="partners__item-image" src="<?= $partner['partner']; ?>">
            </div>
		<?php endforeach;
	endif;
	?>
</div>