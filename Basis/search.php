<?php get_header(); ?>

<section class="main-content">
<h1>Search for: <?php the_search_query(); ?></h1>

<?php if (have_posts()) : ?>

	<?php while (have_posts()) : the_post(); ?>
		<?php get_template_part('loop', 'list'); ?>
	<?php endwhile; ?>

	<?php get_template_part('part', 'pagination'); ?>

<?php else : ?>

	<?php get_template_part('part', 'not_found'); ?>

<?php endif; ?>
</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>