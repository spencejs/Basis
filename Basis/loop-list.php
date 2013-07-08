<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<?php the_post_thumbnail(); ?>
		<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<?php get_template_part('part', 'post_meta'); ?>
	</header>

	<?php the_excerpt(); ?>

	<footer>
		<?php get_template_part('part', 'footer_meta'); ?>
	</footer>
</article>