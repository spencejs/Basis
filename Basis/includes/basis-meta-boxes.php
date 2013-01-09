<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit: 
 * @link http://www.deluxeblogtips.com/2010/04/how-to-create-meta-box-wordpress-post.html
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = 'basis_';

global $meta_boxes;

$meta_boxes = array();

// Post box
$meta_boxes[] = array(
	'id'		=> 'postinfo',
	'title'		=> 'Post Into',
	'pages'		=> array( 'post'),

	'fields'	=> array(
		array(
			'name'	=> 'Illustration Image',
			'id'	=> "{$prefix}illustration",
			'type'	=> 'plupload_image',
			'max_file_uploads' => 1,
			'desc'	=> 'Recommended Dimensions - width: 570px, height: 250px'
		),
		array(
			'name'	=> 'Illustration By',
			'id'	=> "{$prefix}illustrationby",
			'type'	=> 'text',
			'desc'	=> 'Give Credit To The Illustrator'
		),
		array(
			'name'	=> 'User Email Address',
			'id'	=> "{$prefix}email",
			'type'	=> 'text',
			'desc'	=> 'Collected from User'
		),
		array(
			'name'	=> 'User Name',
			'id'	=> "your_name",
			'type'	=> 'text',
			'desc'	=> 'Collected from User'
		),
	)
);

/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function YOUR_PREFIX_register_meta_boxes()
{
	global $meta_boxes;

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( class_exists( 'RW_Meta_Box' ) )
	{
		foreach ( $meta_boxes as $meta_box )
		{
			new RW_Meta_Box( $meta_box );
		}
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded
//  before (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'YOUR_PREFIX_register_meta_boxes' );