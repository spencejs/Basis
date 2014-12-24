<?php
################################################################################
// Tweak and refine the Wordpress admin
################################################################################

// enqueue admin CSS and JS
add_action('admin_init', 'basis_admin_init');

function basis_admin_init() {

	wp_register_style('basis_admin_css', get_template_directory_uri() . '/includes/css/admin.css');
	wp_enqueue_style('basis_admin_css');

	wp_register_script('basis_admin_js', get_template_directory_uri() . ' /includes/js/admin-scripts.js');
	wp_enqueue_script('basis_admin_js');
}

// check to see if the tagline is set to default
// show an admin notice to update if it hasn't been changed
// you want to change this or remove it because it's used as the description in the RSS feed
if (get_option('blogdescription') === 'Just another WordPress site') {
	add_action('admin_notices', create_function('', "echo '<div class=\"error\"><p>" . sprintf(__('Please update your <a href="%s">site tagline</a>', 'basis'), admin_url('options-general.php')) . "</p></div>';"));
};

// check to see if htaccess is writable
// show an admin notice to update if it isn't
function basis_htaccess_writable() {
	if (!is_writable(get_home_path() . '.htaccess')) {
		add_action('admin_notices', create_function('', "echo '<div class=\"error\"><p>" . sprintf(__('Please make sure your <a href="%s">.htaccess</a> file is writeable ', 'basis'), admin_url('options-permalink.php')) . "</p></div>';"));
	};
}

add_action('admin_init', 'basis_htaccess_writable');

// set the post revisions to 5 unless the constant
// was set in wp-config.php to avoid DB bloat
if (!defined('WP_POST_REVISIONS')) define('WP_POST_REVISIONS', 5);

// allow more tags in TinyMCE including iframes
function basis_change_mce_options($options) {
	$ext = 'pre[id|name|class|style],iframe[align|longdesc|name|width|height|frameborder|scrolling|marginheight|marginwidth|src]';
	if (isset($initArray['extended_valid_elements'])) {
		$options['extended_valid_elements'] .= ',' . $ext;
	} else {
		$options['extended_valid_elements'] = $ext;
	}
	return $options;
}

add_filter('tiny_mce_before_init', 'basis_change_mce_options');

// tell the TinyMCE editor to use editor-style.css
// if you have issues with getting the editor to show your changes then use the following line:
// add_editor_style('editor-style.css?' . time());
function my_theme_add_editor_styles() {
	add_editor_style( 'editor-style.css' );
}
add_action( 'init', 'my_theme_add_editor_styles' );

// http://www.deluxeblogtips.com/2011/01/remove-dashboard-widgets-in-wordpress.html
function basis_remove_dashboard_widgets() {
	remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');
	remove_meta_box('dashboard_plugins', 'dashboard', 'normal');
	remove_meta_box('dashboard_primary', 'dashboard', 'normal');
	remove_meta_box('dashboard_secondary', 'dashboard', 'normal');
}

add_action('admin_init', 'basis_remove_dashboard_widgets');

//Add All Custom Post Types to At A Glance Widget
add_action('dashboard_glance_items', 'add_custom_post_counts');

function add_custom_post_counts() {
	$args=array(
		'_builtin' => false,
	);
	$output = 'objects'; // names or objects
	$post_types=get_post_types($args,$output);

	foreach ($post_types as $post_type) :
		$pt = $post_type->name;
		$pt_info = get_post_type_object($pt); // get a specific CPT's details
		$num_posts = wp_count_posts($pt); // retrieve number of posts associated with this CPT
		$num = number_format_i18n($num_posts->publish); // number of published posts for this CPT
		$text = _n( $pt_info->labels->singular_name, $pt_info->labels->name, intval($num_posts->publish) ); // singular/plural text label for CPT
		echo '<li class="page-count '.$pt_info->name.'-count"><a href="edit.php?post_type='.$pt.'">'.$num.' '.$text.'</a></li>';
	endforeach;
}

//Make Visual Editor Default
add_filter( 'wp_default_editor', create_function('', 'return "tinymce";') );

//Hide Links Panel in Admin
add_action( 'admin_menu', 'my_admin_menu' );

function my_admin_menu() {
	remove_menu_page('link-manager.php');
}
?>
