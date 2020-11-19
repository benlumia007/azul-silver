<?php get_header(); ?>
    <?php if (have_posts()) : ?>
		<div class="content-search">		
			<h2><?php printf( __( 'Search Results for: %s', 'azul-silver' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
		</div>
        <?php while(have_posts()) : the_post(); ?>
            <?php get_template_part('template-parts/content', 'search'); ?>
    <?php endwhile; ?>
    <?php else : ?>
            <?php get_template_part('template-parts/content', 'none'); ?>
    <?php endif; ?>
<?php get_footer(); ?>