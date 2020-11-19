<?php get_header(); ?>
       <?php if (current_user_can('edit_posts')) : ?>
        <h1 class = "entry-title"><?php _e('No Post to Display', 'azulsilver'); ?></h1>
                <p><?php printf(__('Ready to publish your first post? <a href = "%s">Get Started Here</a>', 'azulsilver'), admin_url('post-new.php')); ?></p>
    <?php else : ?>
            <h1 class = "entry-title"><?php _e('Nothing Found', 'azulsilver'); ?></h1>
                <p><?php _e('Apologies, but no results were found. Perhaps searching will help find a related post.', 'azulsilver'); ?></p>
                <p><?php get_search_form(); ?></p>
    <?php endif; ?>  
<?php get_footer(); ?>