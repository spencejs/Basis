<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>

	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<title><?php wp_title( '|', true, 'right' ); ?> <?php bloginfo('name'); ?></title>
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
        <?php if (is_single()) { 
			if (have_posts()) : while (have_posts()) : the_post(); ?>
				<meta name="description" content='<?php $excerpt = strip_tags(get_the_excerpt()); echo $excerpt; ?>'/>
            <?php endwhile; endif; ?>
		<?php } else { ?>
			<meta name="description" content="<?php bloginfo('description'); ?>" />
		<?php } ?>
        <?php if ( file_exists(TEMPLATEPATH .'/favicon.ico') ) : ?>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<?php endif; ?>
		<?php if ( file_exists(TEMPLATEPATH .'/apple-touch-icon.png') ) : ?>
			<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon.png">
		<?php endif; ?>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<?php wp_head(); ?>
	</head>
	
	<body <?php body_class(); ?>>
        <div class="wrap">
		<header class="header" role="banner">
			<h1><a href="<?php echo home_url('/');?>/"><?php bloginfo('name'); ?></a></h1>
         	<nav class="main-nav" role="navigation">
				<?php wp_nav_menu(array('theme_location' => 'primary_navigation')); ?>
			</nav>
       	</header>
        
        <div class="content clearfix">