<div class="search">
	<div class="search__bg js-toggle" data-toggle-target=".search" data-toggle-class-name="is-search-open"></div>
	<div class="search__content">
		<form class="form form--search" id="js-ajax-search" method="get" action="<?php echo home_url( '/' ); ?>">
			<label class="form__label" for="s"><?php _e('What are you looking for?', 'ground') ?></label>
			<input class="form__input" type="text" id="js-ajax-search-input" placeholder="<?php _e('Search products', 'ground') ?>" value="<?php the_search_query(); ?>" name="s" id="s" />
			<button class="form__button" type="submit"><i class="form__icon icon-magnifying-glass"></i></button>
			<div class="search__spinner spinner js-ajax-search-spinner"></div>
		</form> <!-- End .form -->
		<i class="search__close icon-close js-toggle" data-toggle-target=".search" data-toggle-class-name="is-search-open"></i>
		<div class="search__result" id="js-ajax-search-result"></div>
	</div>
</div>