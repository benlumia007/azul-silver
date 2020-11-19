<?php
function azulsilver_custom_header_setup() {
	$args = array(
		// Text color and image (empty to use none).
		'default-text-color'     => 'FFFFFF',
		'default-image'          => '',

		// Set height and width, with a maximum value for the width.
		'height'                 => 200,
		'width'                  => 960,
		'max-width'				 =>	2000,

		// Support flexible height and width.
		'flex-height'            => true,
		'flex-width'             => true,

		// Random image rotation off by default.
		'random-default'         => false,

		// Callbacks for styling the header and the admin preview.
		'wp-head-callback'       => 'azulsilver_header_style',
		'admin-head-callback'    => 'azulsilver_admin_header_style',
	);
	add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 'azulsilver_custom_header_setup' );

function azulsilver_header_style() {
	$text_color = get_header_textcolor();
	
	if ($text_color == get_theme_support('custom-header', 'default-text-color'))
		return;
	
	// If we get this far, we have custom styles.
?>
	<style type="text/css" id="azulsilver-header-css">
	<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px 1px 1px 1px); /* IE7 */
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text, use that.
		else :
	?>
		.site-header h1 a,
		.site-header h2 {
			color: #<?php echo $text_color; ?>;
		}
	<?php endif; ?>
	</style>
 <?php } ?>