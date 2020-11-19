<?php get_header(); ?>
    <?php if (have_posts()) : ?>
		<div class = "content-search">		
			<h2>Search Results for: <?php the_search_query(); ?></h2>
		</div>
        <?php while(have_posts()) : the_post(); ?>
            <?php get_template_part('content', 'search'); ?>
    <?php endwhile; ?>
    <?php else : ?>
            <?php get_template_part('content', 'none'); ?>
    <?php endif; ?>
<?php get_footer(); ?>