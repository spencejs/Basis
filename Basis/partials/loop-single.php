<article itemscope itemtype="http://schema.org/Article" <?php post_class() ?> id="post-<?php the_ID(); ?>">
	<header role="heading">
		<h1 itemprop="name" class="entry-title"><?php the_title(); ?></h1>
		<?php get_template_part('partials/part', 'post_meta'); ?>
	</header>

	<div itemprop="articleBody">
		<?php the_content(); ?>
	</div>

	<footer role="complementary">
		<?php get_template_part('partials/part', 'footer_meta'); ?>
	</footer>

	<?php comments_template(); ?>
</article>