<form method="get" class="search-form" role="search" action="<?php echo home_url( '/' ); ?>">

	<label for="s"><?php _e("Search for:", "ground") ?></label>
	<input type="text" value="" name="s" id="s" />

	<input type="submit" class="search-submit" value="<?php _e("Search", "ground") ?>" />

</form> <!-- End .search-form -->