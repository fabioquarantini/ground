<div class="search">
	<div class="search__bg js-toggle" data-toggle-target=".search html" data-toggle-class-name="is-search-open"></div>
	<div class="search__content">
		<h4 class="text-lg"><?php _e( 'What are you looking for?', 'ground' ); ?></h4>
		<?php get_template_part( 'partials/search', 'form-input' ); ?>

		<a class="search__close js-toggle js-magnet js-cursor-hover" href="#" data-toggle-target=".search html" data-toggle-class-name="is-search-open">
			<?php ground_icon( 'close' ); ?>
		</a>

		<?php get_template_part( 'partials/search', 'result' ); ?>
	</div>
</div>
