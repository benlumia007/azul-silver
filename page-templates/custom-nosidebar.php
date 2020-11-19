<?php
/*
 *  Template Name: No Sidebar
 */
?>
<?php get_header(); ?>
    <?php if (have_posts()) : ?>
        <?php while(have_posts()) : the_post(); ?>
            <?php get_template_part('content', 'full-width'); ?>
    <?php endwhile; ?>
		<div class="post-navigation">
			<?php azul_silver_paging_navigation(); ?>
		</div>
    <?php else : ?>
            <?php get_template_part('content', 'none'); ?>
    <?php endif; ?>
<?php get_footer(); ?>