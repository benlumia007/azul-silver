<?php
/*
================================================================================================
Azul Silver - content-none.php
================================================================================================
This is the most generic template file in a WordPress theme and is one required files to display
404 and Search as well as recent posts.

@package        Azul Silver WordPress Theme
@copyright      Copyright (C) 2016. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (http://lumiathemes.com/)
================================================================================================
*/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="archive-header">
        <h2 class="content-archive">
            <?php if (is_404()) {
                _e('Page Not Available', 'azul-silver');
            } else if (is_search()) {
                printf(__('Nothing found for: <small>', 'azul-silver') . get_search_query() . '</small>');
            } else {
                _e('Nothing Found', 'azul-silver');
            }
            ?>
        </h2>
    </header>
    <div class="entry-content">
        <?php if (is_home() && current_user_can('publish_posts')) : ?>
            <p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'azul-silver' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
        <?php elseif (is_404()) : ?>
            <p><?php printf(__( "You tried going to %s, which doesn't exist, so that means I probably broke something.", 'azul-silver'), '<code>' . home_url( esc_url( $_SERVER['REQUEST_URI'] ) ) . '</code>' ); ?></p>
            <?php get_search_form(); ?>
        <?php elseif (is_search()) : ?>
            <p><?php _e( 'Nothing matched your search terms. Check out the most recent articles below or try searching for something else:', 'azul-silver' ); ?></p>
            <?php get_search_form(); ?>
        <?php else : ?>
            <p><?php _e( 'It seems we cannot find what you are looking for. Perhaps searching can help.', 'azul-silver' ); ?></p>
            <?php get_search_form(); ?>
        <?php endif; ?>
    </div>
</article>

<div class="recent-posts">
    <?php if (is_404() || is_search()) { ?>
        <h3 class="recent-posts"><?php _e('Most Recent Posts', 'azul-silver'); ?></h3>
            <ul>
                <?php
                    $args = array('numberposts' => '10');
                    $recent_posts = wp_get_recent_posts($args);
                        foreach ($recent_posts as $recent) {
                            echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li>';
                        }
                ?>
            </ul>
    <?php
    }
    ?>
</div>