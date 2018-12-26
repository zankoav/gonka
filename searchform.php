<form class="search search_gonka" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" role="search">
    <input type="search" class="search__input" placeholder="<?=Lang::get('search'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
    <button class="search__button" type="submit"><i class="fas fa-search"></i></button>
</form>
