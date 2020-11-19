<?php
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

<?php // You can start editing here -- including this comment! ?>

<?php if ( have_comments() ) : ?>
    <h1 class="comments-title">
            <?php
                    printf( _nx( 'One Comment', '%1$s Comments', get_comments_number(), 'comments title', 'azulsilver' ),
                            number_format_i18n( get_comments_number() ));
            ?>
    </h1>

    <ol class="comment-list">
            <?php
                    wp_list_comments( array(
                            'style'      => 'ol',
                            'short_ping' => true,
                            'avatar_size' => 50,
                    ) );
            ?>
    </ol><!-- .comment-list -->

    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
    <nav id="comment-nav-below" class="comment-navigation cf" role="navigation">
            <div class="comment-previous"><?php previous_comments_link( __( '<i class="fa fa-arrow-circle-o-left"></i> Older Comments', 'azulsilver' ) ); ?></div>
            <div class="comment-next"><?php next_comments_link( __( 'Newer Comments <i class="fa fa-arrow-circle-o-right"></i>', 'azulsilver' ) ); ?></div>
    </nav>
    <?php endif; ?>

<?php endif; ?>
<?php comment_form(); ?>

</div>