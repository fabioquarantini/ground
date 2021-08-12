<div id="js-search-form" class="search <?php echo GROUND_HEADER_TYPE == 'megaMenu' ? 'lg:mt-32' : ''; ?>">
	<div class="search__bg container">
		<div class="<?php echo GROUND_HEADER_TYPE == 'megaMenu' ? 'hidden' : ''; ?>">
			<h4 class="text-lg"><?php _e( 'What are you looking for?', 'ground' ); ?></h4>
			<?php get_template_part( 'partials/search', 'form-input' ); ?>
		</div>

		<a class="search__close js-toggle" href="#" data-toggle-target=".search html" data-toggle-class-name="is-search-open">
			<?php ground_icon( 'close' ); ?>
		</a>
		<div class="search__result grid grid-cols-12 gap-6" id="js-ajax-search-result"></div>
	</div>
</div>
