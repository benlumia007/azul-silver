<?php
/*
================================================================================================
Silver Quantum - custom-header.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the requirements to set
custom header image and styling for the header. 

@package        Silver Quantum WordPress Theme
@copyright      Copyright (C) 2016. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (http://luminathemes.com/)
================================================================================================
*/

/*
================================================================================================
Table of Content
================================================================================================
1.0 - Custom Header Setup
2.0 - Custom Header CSS 
================================================================================================
*/

/*
================================================================================================
1.0 - Custom Header Setup 
================================================================================================
*/
function silver_quantum_custom_header_setup() {
    $args = array(
        // Text color and image (empty to use none).
        'default-text-color'     => 'ffffff',
        'default-image'          => get_template_directory_uri() . '/images/header-image.png',

        // Set height and width, with a maximum value for the width.
        'height'                 => 317,
        'width'                  => 1024,
        'max-width'             =>  2000,

        // Support flexible height and width.
        'flex-height'            => false,
        'flex-width'             => false,

        // Random image rotation off by default.
        'random-default'         => false,

        // Callbacks for styling the header and the admin preview.
        'wp-head-callback'       => 'silver_quantum_header_style',
    );
    add_theme_support( 'custom-header', $args );
}
add_action('after_setup_theme', 'silver_quantum_custom_header_setup');


/*
================================================================================================
2.0 - Custom Header CSS 
================================================================================================
*/
function silver_quantum_header_style() {
	$text_color = get_header_textcolor();
	
	if ($text_color == get_theme_support('custom-header', 'default-text-color')) {
            return;
        }
?>
	<style type="text/css">
        .site-title a,
        .site-description {
            color: #<?php echo $text_color; ?>;
        }
	</style>
<?php } ?>