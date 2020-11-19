<?php
/*
================================================================================================
Azul Silver - functions.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files 
for a theme (the other being template-tags.php). This file is used to maintain the main 
functionality and features for this theme. The second file is the template-tags.php that contains 
the extra functions and features.

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
 1.0 - Content Width
 2.0 - Enqueue Styles and Scripts
 3.0 - Theme Setup
 4.0 - Register Sidebars
 5.0 - Required Files
================================================================================================
*/

/*
================================================================================================
 1.0 - Content Width
================================================================================================
*/
function azul_silver_content_width_setup() {
    $GLOBALS['content_width'] = apply_filters('azul_silver_content_width_setup', 680);
}
add_action('after_setup_theme', 'azul_silver_content_width_setup', 0);

/*
================================================================================================
 2.0 - Enqueue Styles and Scripts
================================================================================================
*/
function azul_silver_enqueue_scripts_setup() {
    // Enable and activate the main stylehseet for Azul Silver.
    wp_enqueue_style('azul-silver-style', get_stylesheet_uri());
    
    // Enable and Activate Font Awesome for Azul Silver.
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/extras/font-awesome/css/font-awesome.css', '20160601', true);
    
    // Enable and activate Google Font (Sanchez) for Azul Silver.
    wp_enqueue_style('azul-silver-google-font', '//fonts.googleapis.com/css?family=Sanchez:400,400italic');
    
    // Enable and Activate Navigation JavaScript for Azul Silver.
    wp_enqueue_script('azul-silver-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '20160601', true);
	wp_localize_script('azul-silver-navigation', 'screenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . __('expand child menu', 'azul-silver') . '</span>',
		'collapse' => '<span class="screen-reader-text">' . __('collapse child menu', 'azul-silver') . '</span>',
	));
    
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'azul_silver_enqueue_scripts_setup');

/*
================================================================================================
 3.0 - Theme Setup
================================================================================================
*/
function azul_silver_theme_setup() {
    // Enable and activate add theme support (title tag) for Azul Silver.
    add_theme_support('title-tag');
    
    // Enable and activate Load Theme Text Domain for Azul Silver.
    load_theme_textdomain('azul-silver');
    
    // Enable and activate add theme support (automatica feed links) for Azul Silver.
    add_theme_support('automatic-feed-links');
    
    // Enable and activate add theme support (html5) for Azul Silver.
    add_theme_support('html5', array(
        'comment-list',
        'comment-form',
        'search-form', 
        'caption'
    ));
    
    // Enable and activate custom background for Azul Silver.
    add_theme_support('custom-background', array(
        'default'      => '999999',
    ));
    
    // Enable and activate Feature Images for Azul Silver.
    add_theme_support('post-thumbnails');
    add_image_size('azul-silver-banner', 680, 211, true);
    
    // Enable and activate Navigation for Azul Silver.
    register_nav_menus(array(
    'primary-navigation' => esc_html__('Primary Navigation', 'azul-silver'),
    ));
    
    register_default_headers(array(
        'header-image' => array(
        'url'           => '%s/images/header-image.png',
        'thumbnail_url' => '%s/images/header-image.png',
        'description'   => __( 'Header Image', 'azul-silver' )
        ),
    ));
}
add_action('after_setup_theme', 'azul_silver_theme_setup');

/*
================================================================================================
 4.0 - Register Sidebars
================================================================================================
*/
function azul_silver_register_sidebars_setup() {
    register_sidebar(array(
        'name'          => __('Primary Sidebar', 'azul-silver'),
        'id'            => 'primary',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));    

    register_sidebar(array(
        'name'          => __('Secondary Sidebar', 'azul-silver'),
        'id'            => 'secondary',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));  
    
    register_sidebar(array(
        'name'          => __('Custom Sidebar', 'azul-silver'),
        'id'            => 'custom',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));  
}
add_action('widgets_init', 'azul_silver_register_sidebars_setup');


/*
================================================================================================
 5.0 - Required Files
================================================================================================
*/
require_once(get_template_directory() . '/includes/custom-header.php');
require_once(get_template_directory() . '/includes/customizer.php');
require_once(get_template_directory() . '/includes/template-tags.php');