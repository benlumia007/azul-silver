<?php 
function azulsilver_scripts_setup(){
    wp_enqueue_style('azulsilver_style', get_stylesheet_uri());
    wp_enqueue_style( 'azulsilver_fontawesome', get_stylesheet_directory_uri() . '/extra/css/font-awesome.css', array(), '4.0.3' );
	
	if (is_singular() && comments_open() && get_option('thread_comments')){
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'azulsilver_scripts_setup');

function azulsilver_theme_setup(){
    //Content Width
    if (!isset($content_width)) {
        $content_width = 680;
    }
	
	//Custom Background
	add_theme_support('custom-background', array(
	'default-color'	=> '999999',
	)); 
	
	
    //Primary Navigation Section
    register_nav_menu('primary-navigation', __('Primary Navigation','azulsilver'));
    
    // Title Tag
    add_theme_support('title-tag');
    
    // Enable Post Thumbnails
    add_theme_support('post-thumbnails');
    add_image_size('large-thumb', 680, 200, true);
    add_image_size('index-thumb', 200, 200, true);
    
    // Add Automatic Feeds
    add_theme_support( 'automatic-feed-links' );
    
    // Enable Editor Styles
    add_editor_style();
	
	
}
add_action('after_setup_theme', 'azulsilver_theme_setup');

// Add Support for Custom Header Image.
require(get_template_directory() . '/include/custom-header.php');

// Template Tags for this theme
require(get_template_directory() . '/include/template-tags.php');

//Register Post Sidebar, Page Sidebar, and Custom Sidebar
function azulsilver_widget_sidebar_setup(){
    
    //Register Sidebar for Post Only
    register_sidebar(array(
       'name'           => __('Primary Sidebar', 'azulsilver'),
       'id'             => 'post-content',
       'description'    => ('Appear on Post Contents Only'),
       'before_widget'  => '<li id = "%1$s class = "%1$s">',
       'after_widget'   => '</li>',
       'before_title'   => '<h1 class = "widget-title">',
       'after_title'    => '</h1>',
    ));
    
}
add_action('widgets_init', 'azulsilver_widget_sidebar_setup');
?>