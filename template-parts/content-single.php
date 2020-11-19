<div id="site-content">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="medium-post-thumbnail">
	<?php the_post_thumbnail('azul-silver-medium-thumbnail'); ?>
	</div>
        <h1 class="entry-title"><?php the_title(); ?></h1>     
			<small class="metadata-posted-on"><?php azul_silver_metadata_posted_on_setup(); ?></small>
				<?php the_content(); ?>
			<small class="metadata-posted-in"><?php azul_silver_metadata_posted_in_setup(); ?></small>
				<?php comments_template(); ?>
    </article>
</div>
<?php get_sidebar('post-content'); ?>