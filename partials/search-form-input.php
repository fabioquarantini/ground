<form class="form relative" id="js-ajax-search" method="get" action="<?php echo home_url( '/' ); ?>">
	<input type="text" id="js-ajax-search-input" placeholder="<?php _e( 'Search products', 'ground' ); ?>" value="<?php the_search_query(); ?>" name="s" id="s" />
	<button class="absolute top-3 right-4" type="submit"><?php ground_icon( 'search', 'form__icon' ); ?></button>

	<div class="js-ajax-search-spinner animate-spin h-5 w-5 mr-3 absolute top-3 -right-8 bg-red-600"></div>
</form>
