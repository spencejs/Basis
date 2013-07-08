<form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url('/'); ?>">
	<input type="text" value="" name="s" id="s" class="search-input" placeholder="<?php _e('Search', 'basis'); ?> <?php bloginfo('name'); ?>">
	<input type="submit" id="searchsubmit" class="search-submit" value="<?php _e('Search', 'basis'); ?>" class="button">
</form>