<div id = "post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <article class = "site-content">

        
        <?php if (is_single()) : ?>
                <h1 class = "entry-title"><?php the_title(); ?></h1>
        <?php else : ?>
                <h1 class = "entry-title"><a href = "<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
        <?php endif; ?> 
            <div class = "meta-posted-on">
                <?php azulsilver_metadata_posted_on_setup(); ?>
            </div>
            <?php
            if (has_post_thumbnail()){
            echo '<div class = "small-post-thumbnail">';
            echo the_post_thumbnail('index-thumb');
            echo '</div>';
            }
            ?>
                <?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'silverquantum' ), 'after' => '</div>' ) ); ?>
            <div class = "meta-posted-in">
                <?php azulsilver_metadata_posted_in_setup(); ?>
            </div>
    </article>
        <?php get_sidebar('post-content'); ?>
</div>