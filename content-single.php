<article class = "site-content">
   
    <?php
        if (has_post_thumbnail()){
            echo '<div class = "single-post-thumbnail">';
            echo the_post_thumbnail('large-thumb');
            echo '</div>';
        }
    ?>
    
    
    <?php if (is_single()) : ?>
            <h1 class = "entry-title"><?php the_title(); ?></h1>
    <?php else : ?>
            <h1 class = "entry-title"><a href = "<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
    <?php endif; ?> 
        <div class = "meta-posted-on">
            <?php azulsilver_metadata_posted_on_setup(); ?>
        </div>
            <?php the_content(); ?>
        <div class = "meta-posted-in">
            <?php azulsilver_metadata_posted_in_setup(); ?>
        </div>
            <?php comments_template(); ?>
</article>
<?php get_sidebar('post-content'); ?>