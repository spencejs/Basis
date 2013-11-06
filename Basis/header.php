<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo('charset'); ?>" />
		<title><?php wp_title( '|', true, 'right' ); ?> <?php bloginfo('name'); ?></title>

		<!-- Conditional for Single Pages -->
		<?php if (is_single()) {
			if (have_posts()) : while (have_posts()) : the_post(); ?>
				<meta name="description" content="<?php $excerpt = strip_tags(get_the_excerpt()); echo $excerpt; ?>"/>
				<link rel="canonical" href="<?php the_permalink(); ?>"

				<!-- Facebook Open Graph Meta for Single Posts -->
				<meta property="og:image" content="<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' ); echo $thumb['0']; ?> "/>
				<meta property="og:description" content="<?php $excerpt = strip_tags(get_the_excerpt()); echo $excerpt; ?>"/>
				<?php if ( has_post_thumbnail() ) { 
					$thumb_id = get_post_thumbnail_id();
					$thumb_url = wp_get_attachment_image_src($thumb_id,'medium', true); ?>
					<meta property="og:image" content="<?php echo $thumb_url[0]; ?>" />
				<?php } ?>
			<?php endwhile; endif; ?>
		<?php } else { ?>
			<meta name="description" content="<?php bloginfo('description'); ?>" />
		<?php } ?>

		<!-- Facebook OpenGraph Meta -->
		<meta property="og:type" content="<?php if(is_single()){ echo 'article'; } else {echo 'blog';} ?>"/>
		<meta property="og:site_name" content="<?php bloginfo('name'); ?>"/>
		<meta property="og:title" content="<?php wp_title(); ?>"/>

		<!-- Set icons if they exist -->
		<?php if ( file_exists(TEMPLATEPATH .'/favicon.ico') ) : ?>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<?php endif; ?>
		<?php if ( file_exists(TEMPLATEPATH .'/apple-touch-icon.png') ) : ?>
			<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon.png">
			<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/apple-touch-icon.png" />
		<?php endif; ?>
		<meta name="msapplication-TileColor" content="#ee372e">
		<?php if ( file_exists(TEMPLATEPATH .'/win8-tile-icon.png') ) : ?>
			<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/win8-tile-icon.png">
		<?php endif; ?>

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>

		<header class="header" role="banner">
			<div class="logo"><a href="<?php echo home_url('/');?>/"><?php bloginfo('name'); ?></a></div>
			<nav class="main-nav" role="navigation">
				<h3 class="menu-toggle"><?php _e('Menu', 'basis'); ?></h3>
				<?php wp_nav_menu(array('theme_location' => 'primary_navigation')); ?>
			</nav>
		</header>
