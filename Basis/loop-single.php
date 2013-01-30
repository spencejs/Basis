		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<?php get_template_part('part', 'post_meta'); ?>
				<?php the_content(); ?>
			</header>
			<footer>
				<?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'basis'), 'after' => '</p></nav>' )); ?>
				<p><?php the_tags(); ?></p>
			</footer>
			<?php comments_template(); ?>	
		</article>