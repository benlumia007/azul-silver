<?php
// Azul Silver Main Casading Style Sheet
function azulsilver_scripts_setup() {
	wp_enqueue_style('style', get_stylesheet_uri());

	  	if (is_singular() && comments_open() && get_option( 'thread_comments' ))
		wp_enqueue_script( 'comment-reply' );
}
add_action('wp_enqueue_scripts', 'azulsilver_scripts_setup');

// Azul Silver Main Setup
function azulsilver_theme_setup() {
  //Primary Navigation Section
  register_nav_menu('primary-navigation', __('Primary Navigation','azulsilver'));
}
add_action('after_setup_theme', 'azulsilver_theme_setup');

if(!isset($content_width))
	$content_width = 700;


// This theme support custom header
require(get_template_directory() . '/include/custom-header.php');

add_theme_support('title-tag');
add_theme_support('post-thumbnails');

add_editor_style();

add_theme_support('automatic-feed-links');

add_theme_support('custom-background');

function azulsilver_widget_sidebar_setup() {
	register_sidebar(array(
		'name'				=> 	__('Primary Sidebar', 'azulsilver'),
		'id'				=> 'post-content',
		'description'		=> ('Appear on Post Contents Only'),
		'before_widget'		=> '<li id = "%1$s" class = "%1$s">',
		'after_widget'	    => '</li>',
		'before_title'		=> '<h2 class = "widget-title">',
		'after_title'		=> '</h2>',
	));
	
	register_sidebar(array(
	'name'				=> 	__('Secondary Sidebar', 'azulsilver'),
	'id'				=> 'page-content',
	'description'		=> ('Appear on Page Contents Only'),
	'before_widget'		=> '<li id = "%1$s" class = "%1$s">',
	'after_widget'	    => '</li>',
	'before_title'		=> '<h2 class = "widget-title">',
	'after_title'		=> '</h2>',
	));
	
		register_sidebar(array(
	'name'				=> 	__('Custom Sidebar', 'azulsilver'),
	'id'				=> 'custom-content',
	'description'		=> ('Appear on Custom Contents Only'),
	'before_widget'		=> '<li id = "%1$s" class = "%1$s">',
	'after_widget'	    => '</li>',
	'before_title'		=> '<h2 class = "widget-title">',
	'after_title'		=> '</h2>',
	));
}
add_action('widgets_init', 'azulsilver_widget_sidebar_setup');

function azulsilver_metadata_posted_on_setup() {
printf( __( 'Posted on %2$s by %3$s', 'azulsilver' ), 'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date('m/d/Y')
		),
		sprintf( '<a class="url fn n" href="%1$s" title="%2$s">%3$s</a>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'azulsilver' ), get_the_author() ) ),
			get_the_author()
		)
	);
	
}

function azulsilver_metadata_posted_in_setup() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = __( 'This entry was posted under %1$s. Tag: %2$s.', 'azulsilver' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( 'This entry was posted in %1$s.', 'azulsilver' );
	}
	// Prints the string, replacing the placeholders.
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}
?>