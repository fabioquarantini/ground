<article class="page page--catalog-single">

	<header class="page__header">
		<h1 class="page__title"><?php the_title(); ?></h1>
	</header>

	<div class="page__body">
		<figure class="media margin-bottom-1">
			<?php if ( has_post_thumbnail() ) { ?>
				<img class="media__img full-width" srcset="<?php ground_image( 'large' ); ?> 1200w,
						<?php ground_image( 'medium_large' ); ?> 768w,
						<?php ground_image( 'medium' ); ?> 480w" src="<?php ground_image( 'small' ); ?>">
			<?php } else { ?>
				<img class="media__img full-width" src="<?php echo GROUND_TEMPLATE_URL; ?>/img/no-image.svg">
			<?php } ?>
		</figure>

		<?php the_content(); ?>
	</div> <!-- End .page__body -->

</article> <!-- End .page -->
