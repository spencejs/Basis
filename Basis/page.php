<?php
get_header(); ?>

<section class="main-content">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
            <header>
                <h1><?php the_title(); ?></h1>
            </header>
    
            <?php the_content(); ?>
        </article>

    <?php endwhile; endif; ?>
    <?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>

</section>
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>