<section class="<?php if ( is_404() ) { echo 'error-404'; } else { echo 'no-results'; } ?> not-found">
	<h1 class="entry-title">
		<?php 
			if ( is_404() ) { _e( 'Page not available', 'azulsilver' ); }
			else if ( is_search() ) { printf( __( 'Nothing found for: <small>', 'azulsilver') . get_search_query() . '</small>' ); }
			else { _e( 'Nothing Found', 'azulsilver' );}
		?>
	</h1>
	
	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

		<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'azulsilver' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
					
			<?php elseif ( is_404() ) : ?>
					
					<p><?php _e( 'You seem to be lost. To find what you are looking for check out the most recent articles below or try a search:', 'azulsilver' ); ?></p>
					<?php get_search_form(); ?>
					
	<?php elseif ( is_search() ) : ?>

		<p><?php _e( 'Nothing matched your search terms. Check out the most recent articles below or try searching for something else:', 'azulsilver' ); ?></p>
		<?php get_search_form(); ?>

	<?php else : ?>

		<p><?php _e( 'It seems we cannot find what you are looking for. Perhaps searching can help.', 'azulsilver' ); ?></p>
		<?php get_search_form(); ?>

	<?php endif; ?>

    <?php
    if ( is_404() || is_search() ) {
        
        ?>
    <header class="page-header"><h1 class="page-title">Most recent posts:</h1></header>
    <?php

        $args = array(
            'posts_per_page' => 6
        );

        $latest_posts_query = new WP_Query( $args );
		
        if ( $latest_posts_query->have_posts() ) {
                while ( $latest_posts_query->have_posts() ) {

                    $latest_posts_query->the_post();

                    get_template_part( 'content', get_post_format() );

                }
        }
        wp_reset_postdata();

    }
    ?>
</section>