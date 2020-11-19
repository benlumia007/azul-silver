<?php get_header(); ?>
        <article class = "site-content">
        	<?php if (have_posts()) : ?>
            	<?php while (have_posts()) : the_post(); ?>
						<?php get_template_part('content', 'page', get_post_format()); ?>								
                <?php endwhile; ?>
            <?php else : ?>
            	<?php if (current_user_can('edit_posts')) : ?>
                    <h1 class = "entry-title"><?php _e('No Post to Display', 'azulsilver'); ?></h1>
                        <div class = "entry-content">
                            <?php printf(__('Ready to publish your first post? <a href = "%s">Get Started Here</a>', 'azulsilver'), admin_url('post-new.php')); ?>
                        </div>
                <?php else : ?>
                	<h1 class = "entry-title"><?php _e('Nothing Found', 'azulsilver'); ?></h1>
                    	<div class = "entry-content">
                        	<?php _e('Apologies, but no results were found. Perhaps searching will help find a related post.', 'azulsilver'); ?>
                            <p><?php get_search_form(); ?></p>
                        </div>
                <?php endif; ?>
            <?php endif; ?>
        </article>
        <aside class = "site-sidebar">
        	<?php dynamic_sidebar('page-content'); ?>
        </aside>	
<?php get_footer(); ?>