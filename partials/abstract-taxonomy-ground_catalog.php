<article class="card">

	<?php if ( array_key_exists( 'slug', $args ) ) { ?>
		<a class="card__link" href="<?php echo get_term_link( $args['slug'], 'ground_catalog_taxonomy' ); ?>">
	<?php } ?>
		<figure class="media">
			<?php // TODO: ACF category thumbnail ?>
			<img class="media__img media__img--zoom full-width" src="<?php echo TEMPLATE_URL; ?>/img/no-image.svg" alt="<?php if ( array_key_exists( 'name', $args ) ) { echo $args['name']; } ?>" />
		</figure>
	<?php if ( array_key_exists( 'slug', $args ) ) { ?>
		</a>
	<?php } ?>

	<header class="card__header">
		<?php if ( array_key_exists( 'slug', $args ) ) { ?>
			<a class="card__link" href="<?php echo get_term_link( $args['slug'], 'ground_catalog_taxonomy' ); ?>">
		<?php } ?>
			<?php if ( array_key_exists( 'name', $args ) ) { ?>
				<h2><?php echo $args['name']; ?></h2>
			<?php } ?>
		<?php if ( array_key_exists( 'slug', $args ) ) { ?>
			</a>
		<?php } ?>
	</header>

	<?php if ( array_key_exists( 'description', $args ) ) { ?>
		<div class="card__body">
			<p><?php echo $args['description']; ?></p>
		</div>
	<?php } ?>

</article> <!-- End .card -->
