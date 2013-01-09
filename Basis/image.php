<?php get_header(); ?>

<section class="main-content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    
    <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h2 class="entry-title"><?php the_title(); ?></h2>
				<?php get_template_part('part', 'post_meta'); ?>
            </header>
			<div class="entry-content">
           		<p><a href="<?php echo wp_get_attachment_url($post->ID); ?>"><?php echo wp_get_attachment_image( $post->ID, 'medium' ); ?></a></p>
				<?php the_content(); ?>
			</div>
		<footer>
				<?php previous_image_link() ?> | <?php next_image_link() ?>
			<p><?php the_tags(); ?></p>
		</footer>
		<?php comments_template(); ?>	
	</article>

<?php endwhile; else: ?>

	<?php get_template_part('part', 'not_found'); ?>

<?php endif; ?>
<?php edit_post_link('Edit this entry.','',''); ?>
</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>