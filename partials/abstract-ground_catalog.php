<article class="card card--rounded">

	<a class="card__link" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
		<figure class="media media--zoom">
			<?php if ( has_post_thumbnail() ) {
				the_post_thumbnail( 'medium', array( 'class' => 'media__img full-width' ) );
			} else { ?>
				<img class="media__img full-width" src="<?php echo TEMPLATE_URL ?>/img/no-image.svg">
			<?php }?>
		</figure>
	</a>

	<header class="card__header">
		<a class="card__link" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
			<h2><?php the_title(); ?></h2>
		</a>
	</header>

	<div class="card__body">
		<?php ground_excerpt( 100 ); ?>
	</div>

</article> <!-- End .card -->
