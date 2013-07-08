<?php get_header(); ?>

<main role="main">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php get_template_part('loop', 'single'); ?>
	<?php endwhile; endif; ?>
</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>