<?php

/********** Enqueue Scripts and styles. **********/
function azul_silver_scripts_setup(){
    wp_enqueue_style('azul-silver-style', get_stylesheet_uri());
	
	// Enable Font Awesome
	wp_enqueue_style('azul-silver-font-awesome', get_stylesheet_directory_uri() . '/extras/font-awesome/css/font-awesome.css', '1202205', true);
        
        wp_enqueue_script('azul-silver-hide-search', get_template_directory_uri() . '/js/hide-search.js', array('jquery'), '04062015', true);
	
	if (is_singular() && comments_open() && get_option('thread_comments'))
            wp_enqueue_script( 'comment-reply' );
    
}
add_action('wp_enqueue_scripts', 'azul_silver_scripts_setup');

/********** WordPress Features - Theme Defaults **********/
if (!function_exists('azul_silver_theme_setup')){
    function azul_silver_theme_setup(){
		// Setup Content Width value based on the theme's design and stylesheet.
		global $content_width;
		if (!isset($content_width)) {
                    $content_width = 650;
                }

        // Title Tag
		add_theme_support('title-tag');
		
		// Load Theme Textdomain
		load_theme_textdomain( 'azul-silver', get_template_directory() . '/languages' );
		
		// Support Search Form in HTML5 format
		add_theme_support( 'html5', array( 'search-form' ) );
		
                // Register Navigation Menu
                register_nav_menus(array(
                    'primary-navigation' => __('Primary Navigation', 'azul-silver'),
                    'social'             => __('Social Menu', 'azul-silver'),
                ));
		
		// This theme styles the visual editor with editor-styles.css to mach the theme style.
		add_editor_style();

		// Adds RSS feed links to <head> for post and comments.
		add_theme_support('automatic-feed-links');
			
		// This theme does support custom background color.
		add_theme_support('custom-background', array(
			'default-color'	=> 'cccccc',
			)); 
			
		// Enable Featured Image
		add_theme_support('post-thumbnails');
		add_image_size('azul-silver-small-thumbnail', 150, 150, true);
		add_image_size('azul-silver-medium-thumbnail', 650, 150, true);
    }
    add_action('after_setup_theme', 'azul_silver_theme_setup');
}

// Add Support for Custom Header Image.
require(get_template_directory() . '/page-templates/custom-header.php');

//Register Post Sidebar, Page Sidebar, and Custom Sidebar
function azul_silver_widget_sidebar_setup(){
    
    //Register Sidebar for Post Only
    register_sidebar(array(
       'name'           => __('Primary Sidebar', 'azul-silver'),
       'id'             => 'post-content',
       'description'    => __('Appears on Posts Only', 'azul-silver'),
       'before_widget'  => '<aside id="%1$s" class="widget %2$s">',
       'after_widget'   => '</aside>',
       'before_title'   => '<h1 class="widget-title">',
       'after_title'    => '</h1>',
    ));
	
    //Register Sidebar for Page Only
    register_sidebar(array(
       'name'           => __('Secondary Sidebar', 'azul-silver'),
       'id'             => 'page-content',
       'description'    => __('Appears on Pages Only', 'azul-silver'),
       'before_widget'  => '<aside id="%1$s" class="widget %2$s">',
       'after_widget'   => '</aside>',
       'before_title'   => '<h1 class="widget-title">',
       'after_title'    => '</h1>',
    ));
	
    //Register Sidebar for Page Only
    register_sidebar(array(
       'name'           => __('Custom Sidebar', 'azul-silver'),
       'id'             => 'custom-content',
       'description'    => __('Appear on Custom Pages Only', 'azul-silver'),
       'before_widget'  => '<aside id="%1$s" class="widget %2$s">',
       'after_widget'   => '</aside>',
       'before_title'   => '<h1 class="widget-title">',
       'after_title'    => '</h1>',
    ));
    
}
add_action('widgets_init', 'azul_silver_widget_sidebar_setup');

function azul_silver_metadata_posted_on_setup(){
    // This function will call and output The Date and Author
    printf( __( '<i class="fa fa-calendar"></i>&nbsp;&nbsp;%2$s &nbsp;&nbsp;&nbsp; <i class="fa fa-user"></i>&nbsp;&nbsp;%3$s', 'azul-silver' ), 'meta-prep meta-prep-author',
    sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
        get_permalink(),
        esc_attr( get_the_time() ),
        get_the_date('m/d/Y')),
    sprintf( '<a class="url fn n" href="%1$s" title="%2$s">%3$s</a>',
    get_author_posts_url( get_the_author_meta( 'ID' ) ),
    esc_attr( sprintf( __( 'View all posts by %s', 'azul-silver' ), get_the_author() ) ),
    get_the_author()
    ));

    // This function will only display when sticky post is enabled!
    if (is_sticky()){
        echo '&nbsp;&nbsp;&nbsp; <i class="fa fa-thumb-tack sticky"></i>&nbsp;&nbsp;Sticky Post', 'azul-silver';
    } 
    
    if (has_post_thumbnail()){
        echo '&nbsp;&nbsp;&nbsp; <i class="fa fa-bookmark"></i>&nbsp;&nbsp; Featured Image', 'azul-silver';
    }

    // This function will call and output Comments
    printf('&nbsp;&nbsp;&nbsp; <i class="fa fa-comments"></i>&nbsp;&nbsp;', 'azul-silver'); 
    if (comments_open()) {
        comments_popup_link('Add Comment','1 Comment','% Comments');
    }
    else {
        _e('Comments Closed', 'azul-silver');
    }
}

function azul_silver_metadata_posted_in_setup() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list=get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
			$posted_in=__( '<i class="fa fa-archive"></i>&nbsp;&nbsp; %1$s &nbsp;&nbsp;&nbsp;<i class="fa fa-tags"></i>&nbsp; %2$s', 'azul-silver' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
			$posted_in=__( '<i class="fa fa-archive"></i> %1$s', 'azul-silver' );
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

function azul_silver_paging_navigation() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}

	$paged       =get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link=html_entity_decode( get_pagenum_link() );
	$query_args  =array();
	$url_parts   =explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link=remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link=trailingslashit( $pagenum_link ) . '%_%';

	$format =$GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$links=paginate_links( array(
		'base'     => $pagenum_link,
		'format'   => $format,
		'total'    => $GLOBALS['wp_query']->max_num_pages,
		'current'  => $paged,
		'mid_size' => 2,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_text' => __( 'Previous', 'azul-silver' ),
		'next_text' => __( 'Next', 'azul-silver' ),
                'type'      => 'list',
	) );

	if ( $links ) :

	?>
	<nav class="navigation paging-navigation" role="navigation">
			<?php echo $links; ?>
	</nav><!-- .navigation -->
	<?php
	endif;
}

function azul_silver_social_menu(){
    if(has_nav_menu('social')){
        wp_nav_menu(array(
            'theme_location'    =>  'social',
            'container'         =>  'div',
            'container_id'      => 'menu-social',
            'container_class'     => 'menu-social',
            'menu_id'           => 'menu-social-items',
            'menu_class'        => 'menu-items',
            'depth'             => 1,
            'link_before'       => '<span class="screen-reader-text cf">',
            'link_after'        => '</span>',
            'fallback_cb'       => '',
        ));
    };
}