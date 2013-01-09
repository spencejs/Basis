
	<!--Show pagination links if applicable.-->
	<?php if ($wp_query->max_num_pages > 1) : ?>
	<nav class="post-nav">
		<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'basis' ) ); ?></div>
		<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'basis' ) ); ?></div>
	</nav>
	<?php endif; ?>