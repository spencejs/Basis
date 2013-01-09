<?php

################################################################################
// Enqueue Scripts
################################################################################

function init_scripts() {
    wp_deregister_script( 'jquery' );
    wp_deregister_script( 'comment-reply' );
    // Register Scripts
    wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js');
    wp_register_script( 'comment-reply', home_url() . '/wp-includes/js/comment-reply.js?ver=20090102');
    wp_register_script( 'jquery-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js');
    wp_register_script( 'jquery-plugins', get_template_directory_uri() . '/js/plugins.js');
    wp_register_script( 'jquery-scripts', get_template_directory_uri() . '/js/script.js');
    // Queue Scripts
    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js', '', '1.7.2', true);
    wp_enqueue_script('jquery-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', 'jquery', '', true);
    wp_enqueue_script('jquery-plugins', get_template_directory_uri() . '/js/plugins.js', 'jquery', '', true);
    wp_enqueue_script('jquery-scripts', get_template_directory_uri() . '/js/script.js', 'jquery', '', true);
	//Queue Comment Reply if Threaded Comments Are Enabled
    if ( get_option( 'thread_comments' ) && is_single()) wp_enqueue_script( 'comment-reply',  home_url() . '/wp-includes/js/comment-reply.js?ver=20090102', 'jquery', '', true );
}

function header_scripts() { ?>
	
	<!--[if lt IE 8]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/ie6/warning.js"></script>
		<script>window.onload=function(){e("<?php echo get_template_directory_uri(); ?>/js/ie6/")}</script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/respond.min.js"></script>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<?php
	if (of_get_option('example_text_mini')) : 
		echo of_get_option('example_text_mini');
	endif;
}

add_action('wp_enqueue_scripts', 'init_scripts', 0);
add_action('wp_head', 'header_scripts', 10);