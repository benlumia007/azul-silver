<?php get_header(); ?>
    <?php if (have_posts()) : ?>
			<h2 class = "content-archive">
			<?php 
				if (is_category()) {
					single_cat_title('Category: ', true);
				} elseif (is_tag()) {
					single_tag_title('Tag: ', true);
				} elseif (is_author()) {
					the_post();
						echo 'Author Archives: ' . get_the_author(); 
						rewind_posts();
				} elseif (is_day()) {
					echo 'Daily Archive: ' . get_the_date();
				} elseif (is_month()) {
					echo 'Monthly Archive: ' . get_the_date('F Y');
				} elseif (is_year()) {
					echo 'Yearly Archive: ' . get_the_date('Y');
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