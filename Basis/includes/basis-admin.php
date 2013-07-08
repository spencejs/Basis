<?php
################################################################################
// Tweak and refine the Wordpress admin
################################################################################

// enqueue admin CSS and JS
add_action('admin_init', 'basis_admin_init');

function basis_admin_init() {
	$home_url = site_url();
	$theme_name = next(explode('/themes/', get_template_directory()));
	
	wp_register_style('basis_admin_css', "$home_url/wp-content/themes/$theme_name/includes/css/admin.css");
	wp_enqueue_style('basis_admin_css');
	
	wp_register_script('basis_admin_js', "$home_url/wp-content/themes/$theme_name/includes/js/admin-scripts.js");
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

//Make Visual Editor Default
add_filter( 'wp_default_editor', create_function('', 'return "tinymce";') );
?>
