<?php
//Include various functions files
locate_template(array('includes/basis-activation.php'), true, true);	// activation
locate_template(array('includes/basis-enqueue.php'), true, true);	// activation
locate_template(array('includes/basis-sidebars.php'), true, true);	// sidebars
locate_template(array('includes/basis-admin.php'), true, true);		// admin additions/mods
locate_template(array('includes/customizer-boilerplate/customizer.php'), true, true);	// customizer options
locate_template(array('includes/basis-cleanup.php'), true, true);	// code cleanup/removal
locate_template(array('includes/basis-custom.php'), true, true);		// custom functions
locate_template(array('includes/basis-meta-boxes.php'), true, true);		// Meta Boxes

//Set Content Width
if ( ! isset( $content_width ) ) $content_width = 700;

//Wordpress Title
add_theme_support( 'title-tag' );

//Post Thumbnails
add_theme_support('post-thumbnails');
set_post_thumbnail_size( 150, 120, true ); // Normal post thumbnails
add_image_size( 'custom-thumbnail-size', 260, 175, true ); // Custom thumbnail size

// Custom Menus
add_theme_support('menus');
register_nav_menus(array(
	'primary_navigation' => __('Primary Navigation', 'roots'),
	'utility_navigation' => __('Utility Navigation', 'roots')
));
?>