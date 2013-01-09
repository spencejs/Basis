<?php

locate_template(array('includes/basis-activation.php'), true, true);	// activation
locate_template(array('includes/basis-enqueue.php'), true, true);	// activation
locate_template(array('includes/basis-sidebars.php'), true, true);	// sidebars
locate_template(array('includes/basis-admin.php'), true, true);		// admin additions/mods
locate_template(array('includes/basis-options.php'), true, true);	// theme options menu
locate_template(array('includes/basis-cleanup.php'), true, true);	// code cleanup/removal
locate_template(array('includes/basis-htaccess.php'), true, true);	// h5bp htaccess
locate_template(array('includes/basis-custom.php'), true, true);		// custom functions
locate_template(array('includes/basis-meta-boxes.php'), true, true);		// Meta Boxes

// Load the Options Panel
if ( !function_exists( 'optionsframework_init' ) ) {
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/includes/options-framework/' );
	locate_template(array('includes/options-framework/options-framework.php'), true, true);
}

// tell the TinyMCE editor to use editor-style.css
// if you have issues with getting the editor to show your changes then use the following line:
// add_editor_style('editor-style.css?' . time());
add_editor_style('editor-style.css');

if ( ! isset( $content_width ) ) $content_width = 1000;

//Post Thumbnails
add_theme_support('post-thumbnails');
set_post_thumbnail_size( 150, 120, true ); // Normal post thumbnails
add_image_size( 'custom-thumbnail-size', 260, 174, true ); // Custom thumbnail size

// Custom Menus
add_theme_support('menus');
register_nav_menus(array(
	'primary_navigation' => __('Primary Navigation', 'roots'),
	'utility_navigation' => __('Utility Navigation', 'roots')
));
?>