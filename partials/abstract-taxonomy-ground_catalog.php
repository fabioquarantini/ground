<article class="card card--rounded">

	<a class="card__link" href="<?php echo get_term_link($taxonomy_slug, 'ground_catalog_taxonomy') ?>">
		<figure class="media">
			<?php //TODO: ACF category thumbnail ?>
			<img class="media__img media__img--zoom full-width" src=" http://via.placeholder.com/200x150" />
		</figure>
	</a>

	<header class="card__header">
		<a class="card__link" href="<?php echo get_term_link($taxonomy_slug, 'ground_catalog_taxonomy') ?>">
			<h2><?php echo $taxonomy_name ?></h2>
		</a>
	</header>

	<?php if ($taxonomy_description) { ?>
		<div class="card__body">
			<p><?php echo $taxonomy_description ?></p>
		</div>
	<?php } ?>

</article> <!-- End .card -->
