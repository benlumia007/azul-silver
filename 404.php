<?php get_header(); ?>
<div class = "site-content">
    <article id = "post-<?php the_ID(); ?>" <?php post_class(); ?>>
    	<h1 class = "entry-title"><?php _e('Page Not Found', 'azulsilver'); ?></h1>
    		<div class="entry-content">
    			<p><?php _e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.','azulsilver'); ?>
    				<?php get_search_form(); ?>
    			</p>
    		</div>
    </article>
</div>
<?php get_sidebar(); ?>
<?php wp_footer(); ?>
<?php get_footer(); ?>