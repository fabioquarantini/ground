<form class="form form--search" method="get" action="<?php echo home_url( '/' ); ?>">
	<label class="form__label" for="s"><?php _e('Search for:', 'ground') ?></label>
	<input class="form__input" type="text" placeholder="<?php _e('Enter keywords', 'ground') ?>" value="<?php the_search_query(); ?>" name="s" id="s" />
	<button class="form__button button button--primary" type="submit"><?php _e('Search', 'ground') ?></button>
</form> <!-- End .form -->
