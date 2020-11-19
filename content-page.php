<article class = "site-content">
    <?php if (!is_single()) : ?>
            <h1 class = "entry-title"><?php the_title(); ?></h1>
    <?php else : ?>
            <h1 class = "entry-title"><a href = "<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
    <?php endif; ?> 
            <?php the_content(); ?>
            <?php comments_template(); ?>
</article>
<?php get_sidebar('post-content'); ?>