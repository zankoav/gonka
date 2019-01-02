<?php get_header(); ?>

    <div class="category">
        <div class="container">
            <div class="breadcrumbs">
                <h2 class="breadcrumbs__title">Blog</h2>
                <div class="breadcrumbs__nav"><a class="breadcrumbs__item breadcrumbs__link" href="#">Home</a><span class="breadcrumbs__item">Blog</span></div>
            </div>
            <div class="category__row" id="blog-content">
                <div class="category__col" id="blog-news">
                    <ul class="single-big-list">
	                    <?php if ( have_posts() ) {
		                    while ( have_posts() ) {
			                    the_post();
			                    get_template_part('template-parts/content/single-news');
		                    }
	                    }
	                    ?>
                    </ul>
                </div>
                <div class="category__col" id="blog-sidebar">
                    <div class="category__sidebar-inner">
                        <div class="widjet">
                            <h3 class="widjet__title">Resent Posts</h3>
                            <ul class="widjet-recent-posts">
                                <li class="widjet-recent-posts__item">
                                    <p class="widjet-recent-posts__item-date">20.10.2019</p><a href="#">Lorem ipsum dolor sit amet, consectetur. Lorem ipsum dolor sit amet, consectetur</a>
                                </li>
                                <li class="widjet-recent-posts__item">
                                    <p class="widjet-recent-posts__item-date">20.10.2019</p><a href="#">Lorem ipsum dolor sit amet, consectetur amet, consectetur.</a>
                                </li>
                                <li class="widjet-recent-posts__item">
                                    <p class="widjet-recent-posts__item-date">20.10.2019</p><a href="#">Lorem ipsum dolor sit amet, consectetur.</a>
                                </li>
                                <li class="widjet-recent-posts__item">
                                    <p class="widjet-recent-posts__item-date">20.10.2019</p><a href="#">Lorem ipsum dolor sit amet, consectetur dolor sit amet, consectetur.</a>
                                </li>
                                <li class="widjet-recent-posts__item">
                                    <p class="widjet-recent-posts__item-date">20.10.2019</p><a href="#">Lorem ipsum dolor sit amet, consectetur.</a>
                                </li>
                            </ul>
                        </div>
                        <div class="widjet">
                            <h3 class="widjet__title">Tags</h3>
                            <div class="widjet-tags"><a class="widjet-tags__item" href="#">Tag1</a><a class="widjet-tags__item" href="#">Tag2</a><a class="widjet-tags__item" href="#">Tag3</a><a class="widjet-tags__item" href="#">Tag4</a><a class="widjet-tags__item" href="#">Tag5</a></div>
                        </div>
                        <div class="widjet">
                            <h3 class="widjet__title">Socials</h3>
                            <div class="socials socials_widjet"><a class="socials__link" href="#" target="_blank"><i class="fab fa-vk"></i></a><a class="socials__link" href="#" target="_blank"><i class="fab fa-facebook-f"></i></a><a class="socials__link" href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>