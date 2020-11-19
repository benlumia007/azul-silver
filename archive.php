<?php get_header(); ?>
    <?php if (have_posts()) : ?>
			<h2 class = "content-archive">
			<?php 
				if (is_category()) {
					printf(__('Category: ','azulsilver'));
					echo single_cat_title(); 
				} elseif (is_tag()) {
					printf(__('Tag: ', 'azulsilver'));
					echo single_tag_title(); 
				} elseif (is_author()) {
					printf(__('Author Archives: ', 'azulsilver'));
					echo get_the_author(); 
				} elseif (is_day()) {
					printf(__('Daily Archives: ', 'azulsilver'));
					echo get_the_date();
				} elseif (is_month()) {
					printf(__('Monthly Archives: ', 'azulsilver'));
					echo get_the_date('F Y');
				} elseif (is_year()) {
					printf(__('Yearly Archives: ', 'azulsilver'));
					echo get_the_date('Y');
				}else {
					echo 'Archives: ';
				}
			?>
			</h2>
        <?php while(have_posts()) : the_post(); ?>
            <?php get_template_part('content', 'archive'); ?>
    <?php endwhile; ?>
    <?php else : ?>
            <?php get_template_part('content', 'none'); ?>
    <?php endif; ?>
<?php get_footer(); ?>