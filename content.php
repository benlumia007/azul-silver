    <section id = "site-content">
        <article class = "<?php if (is_sticky()) { ?> sticky <?php } ?>" id = "post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h1 class = "entry-title"><a href = "<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>   
				<div class = "metadata-posted-on"><small><?php azulsilver_metadata_posted_on_setup(); ?></small></div>
					<div class = "small-post-thumbnail">
					<?php the_post_thumbnail('small-thumbnail'); ?>
					</div>
					<?php the_content(); ?>
						<?php wp_link_pages(); ?>
				<div class = "metadata-posted-in"><small><?php azulsilver_metadata_posted_in_setup(); ?></small></div>
        </article>
    </section>
<?php get_sidebar('post-content'); ?>