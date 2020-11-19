<article id = "post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if (is_sticky() && is_home() && is_paged()) : ?>
		<?php _e('Featured Post', 'azulsilver'); ?>
	<?php endif; ?>
		<?php the_post_thumbnail(); ?>
			<?php if (is_single()) : ?>
				<h1 class = "entry-title"><?php the_title(); ?></h1>
				
			<?php else : ?>
				<h1 class = "entry-title"><a href = "<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			<?php endif; ?>
				<?php if(is_search()) : ?>
						<?php the_excerpt(); ?>
				<?php else : ?>
					<div class = "entry-content">
						<div class = "entry-metadata-posted-on">
							<?php azulsilver_metadata_posted_on_setup(); ?> |
				<?php if ( comments_open()) : ?> 
					<?php comments_popup_link('Add Comment','1 Comment','% Comments'); ?>
				<?php else : ?>
					<?php if (!comments_open() && get_comments_number() )?>
						<?php _e('Comments Closed', 'azulsilver'); ?>
				<?php endif; ?> | 
			<?php edit_post_link(); ?>
						</div>
							<?php the_content(); ?>
							<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'azulsilver' ), 'after' => '</div>' ) ); ?>
						<div class = "entry-metadata-posted-in">
							<?php azulsilver_metadata_posted_in_setup(); ?>
						</div>
					</div>
				<?php endif; ?>
</article>