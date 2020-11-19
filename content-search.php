    <div id="site-content">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>   
				<div><small class="metadata-posted-on"><?php azulsilver_metadata_posted_on_setup(); ?></small></div>
					<div class="small-post-thumbnail">
					<?php the_post_thumbnail('small-thumbnail'); ?>
					</div>
					<?php the_excerpt(); ?>
				<small class="metadata-posted-in"><?php azulsilver_metadata_posted_in_setup(); ?></small>
        </article>
    </div>
<?php get_sidebar(); ?>