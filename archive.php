<?php get_header(); ?>
    <?php if (have_posts()) : ?>
			<h2 class="content-archive">
			<?php 
				if (is_category()) {
					printf(__('Category: ','azul-silver'));
					echo single_cat_title(); 
				} elseif (is_tag()) {
					printf(__('Tag: ', 'azul-silver'));
					echo single_tag_title(); 
				} elseif (is_author()) {
					printf(__('Author Archives: ', 'azul-silver'));
					echo get_the_author(); 
				} elseif (is_day()) {
					printf(__('Daily Archives: ', 'azul-silver'));
					echo get_the_date();
				} elseif (is_month()) {
					printf(__('Monthly Archives: ', 'azul-silver'));
					echo get_the_date('F Y');
				} elseif (is_year()) {
					printf(__('Yearly Archives: ', 'azul-silver'));
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