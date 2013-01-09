<?php

// admin CSS and JS
add_action('admin_init', 'basis_admin_init');

function basis_admin_init() {
	$home_url = site_url();
	$theme_name = next(explode('/themes/', get_template_directory()));
	
	wp_register_style('basis_admin_css', "$home_url/wp-content/themes/$theme_name/includes/css/admin.css");
	wp_enqueue_style('basis_admin_css');
	
	wp_register_script('basis_admin_js', "$home_url/wp-content/themes/$theme_name/includes/js/scripts.js");
	wp_enqueue_script('basis_admin_js');

}

// check to see if the tagline is set to default
// show an admin notice to update if it hasn't been changed
// you want to change this or remove it because it's used as the description in the RSS feed
if (get_option('blogdescription') === 'Just another WordPress site') { 
	add_action('admin_notices', create_function('', "echo '<div class=\"error\"><p>" . sprintf(__('Please update your <a href="%s">site tagline</a>', 'basis'), admin_url('options-general.php')) . "</p></div>';"));
};

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

// http://www.deluxeblogtips.com/2011/01/remove-dashboard-widgets-in-wordpress.html
function basis_remove_dashboard_widgets() {
	remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');
	remove_meta_box('dashboard_plugins', 'dashboard', 'normal');
	remove_meta_box('dashboard_primary', 'dashboard', 'normal');
	remove_meta_box('dashboard_secondary', 'dashboard', 'normal');
}

add_action('admin_init', 'basis_remove_dashboard_widgets');

// customize admin footer text
function custom_admin_footer() {
	echo 'Website Design by Josiah at <a href="http://bowlerhatcreative.com/" title="Visit BowlerHatCreative.com for more information">BowlerHat Creative</a>';
} 
add_filter('admin_footer_text', 'custom_admin_footer');

//Make Visual Editor Default
add_filter( 'wp_default_editor', create_function('', 'return "tinymce";') );
?>
