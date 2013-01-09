<form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
	<input type="text" value="" name="s" id="s" placeholder="<?php _e('Search', 'basis'); ?> <?php bloginfo('name'); ?>">
	<input type="submit" id="searchsubmit" value="<?php _e('Search', 'basis'); ?>" class="button">
</form>