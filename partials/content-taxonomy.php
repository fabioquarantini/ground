<article id="post-<?php the_ID(); ?>" <?php post_class('catalog-taxonomy-item'); ?> >
	<a class="catalog-taxonomy-item__link" href="<?php echo get_term_link($taxonomySlug, 'ground_catalog_taxonomy') ?>">
		<h2 class="catalog-taxonomy-item__title"><?php echo $taxonomyName ?></h2>
		<?php if ($taxonomyDescription): ?>
			<p class="catalog-taxonomy-item__description"><?php echo $taxonomyDescription ?></p>
		<?php endif ?>
	</a>
</article> <!-- End .catalog-taxonomy-item -->
