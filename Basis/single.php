<?php get_header(); ?>

<section class="main-content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php get_template_part('loop', 'single'); ?>
<?php endwhile; endif; ?>
</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>