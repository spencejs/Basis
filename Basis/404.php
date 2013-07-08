<?php get_header(); ?>

<main role="main">

	<h1><?php _e('Sorry, there is nothing here.', 'basis'); ?></h1>
	<p><?php _e( 'The page you requested could not be found. Perhaps searching will help.', 'basis' ); ?></p>
	<?php get_search_form(); ?>	

</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>