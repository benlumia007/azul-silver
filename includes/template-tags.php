<?php
/*
================================================================================================
Azul Silver - template-tags.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files 
for a theme (the other being functions.php). This file is used to maintain the main functionality 
and features for this theme. The main file is the functions.php that contains the main functions 
and features for this theme.

@package        Azul Silver WordPress Theme
@copyright      Copyright (C) 2016. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (http://lumiathemes.com/)
================================================================================================
*/

/*
================================================================================================
Table of Content
================================================================================================
 1.0 - Entry Posted On
 2.0 - Entry Comments and Taxonomies
================================================================================================
*/

/*
================================================================================================
 1.0 - Entry Posted On
================================================================================================
*/
function azul_silver_entry_posted_on() {
    printf(('Published <b>%2$s</b> / by <b>%3$s</b>'), 'meta-prep meta-prep-author', 
    sprintf('<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
        esc_url(get_permalink()),
        esc_attr(get_the_time()),
        get_the_date(get_option('date_format'))),
    sprintf('<a href="%1$s" title="%2$s">%3$s</a>',
    esc_url(get_author_posts_url(get_the_author_meta('ID'))),
    esc_attr(sprintf(__('View all posts by %s', 'azul-silver'), get_the_author())), 
    get_the_author()
    ));

    if ( !is_page() && !post_password_required() && (comments_open() || get_comments_number())) {
        echo ' / <span class="comments-link"><b>';
            comments_popup_link( sprintf( __( 'Leave a Comment', 'azul-silver')));
        echo '</b></span>';
    }
}

/*
================================================================================================
 2.0 - Entry Comments and Taxonomies
================================================================================================
*/
function azul_silver_entry_taxonomies() {
    $cat_list = get_the_term_list(get_the_ID(), 'category', '<span class="cat-list">', __(' | ', 'azul-silver'), '</span>');
    $tag_list = get_the_term_list(get_the_ID(), 'post_tag', '<span class="tag-list">', __(' | ', 'azul-silver'), '</span>');
    
    if ($cat_list) {
        printf('<div class="cat-link"><i class="fa fa-folder-open-o"></i> <b>%1$s</b> <span class="cat-list">%2$s</span></div>', esc_html__('Posted In ', 'azul-silver'), $cat_list);
    }
    
    if ($tag_list) {
        printf('<div class="tag-link"><i class="fa fa-folder-open-o"></i> <b>%1$s</b> <span class="tag-list">%2$s</span></div>', esc_html__('Tagged In ', 'azul-silver'), $tag_list);
    }
    
}