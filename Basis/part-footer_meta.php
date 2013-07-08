<?php $tag = get_the_tags(); if (!$tag) { } else { ?><p><?php the_tags(); ?></p><?php } ?>

<?php if(is_single){
	wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'basis'), 'after' => '</p></nav>' ));
}?>