<form method="get" class="search-form" role="search" action="<?php echo home_url( '/' ); ?>">

	<label class="search-form__label" for="s"><?php _e('Search for:', 'ground') ?></label>
	<input class="search-form__input" type="text" placeholder="<?php _e('Enter keywords', 'ground') ?>" value="<?php echo get_search_query(); ?>" name="s" id="s" />

	<input class="search-form__button" type="submit" value="<?php _e('Search', 'ground') ?>" />

</form> <!-- End .search-form -->
