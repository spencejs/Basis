<?php
################################################################################
// Add Theme Sidebar
################################################################################
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
	  	'name' => __( 'Primary Widget Area', 'basis' ),
		'id' => 'primary-widget-area',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
	));
}
?>