<?php 
if ( post_password_required() )
	return;
?>

<div id = "comments" class = "comments-area">
	<?php if ( have_comments() ) : ?>
		<h2 class = "comments-title">
			<?php
				printf( _n( '1 Comment on "%2$s"', '%1$s Comments on "%2$s"', get_comments_number(), 'azulsilver' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>
		<ol class="comment-list">
			<?php wp_list_comments(); ?>
		</ol>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		
		<nav id="comment-nav-below" class="navigation" role="navigation">
			<h1 class="assistive-text section-heading"><?php _e( 'Comment navigation', 'azulsilver' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'azulsilver' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'azulsilver' ) ); ?></div>
		</nav>
		<?php endif; ?>
	<?php endif; ?>
</div>
<?php comment_form(); ?>