
	<!--Show pagination links if applicable.-->
	<?php if ($wp_query->max_num_pages > 1) :
		global $paged;
		if(empty($paged)) $paged = 1;
		if ( ($wp_query->max_num_pages > 2) && ($paged != $wp_query->max_num_pages) ) $both_links = 'both-links'; ?>
		<nav class="post-nav <?php echo $both_links; ?>">
			<h1 class="screen-reader-text"><?php _e('Posts Navigation', 'basis'); ?></h1>
			<?php next_posts_link( __( '&larr; Older posts', 'basis' ) ); ?>
			<?php previous_posts_link( __( 'Newer posts &rarr;', 'basis' ) ); ?>
		</nav>
	<?php endif; ?>