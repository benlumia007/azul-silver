<?php get_header(); ?>
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('content', 'page'); ?>
        <?php endwhile; ?>
					<div class = "content-navigation">
				<?php azulsilver_content_nav(); ?>
			</div>
    <?php else: ?>
            <?php get_template_part('content', 'none'); ?>
    <?php endif; ?>    
<?php get_footer(); ?>