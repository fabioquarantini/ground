<form class="form search__form relative <?php echo GROUND_HEADER_TYPE == 'megaMenu' ? 'container' : ''; ?>" id="js-ajax-search" method="get" action="<?php echo home_url( '/' ); ?>">
	<div class="flex items-center">
		<input class="flex-shrink" type="text" id="js-ajax-search-input" placeholder="<?php _e( 'Search products', 'ground' ); ?>" value="<?php the_search_query(); ?>" name="s" id="s" />
		<button class="search__button" type="submit"><?php ground_icon( 'search', 'form__icon' ); ?></button>

		<div class="js-ajax-search-spinner search__spinner spinner"></div>
	</div>
</form>
