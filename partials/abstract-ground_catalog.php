<article class="card">

	<a class="card__link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		<figure class="media">
			<?php if (has_post_thumbnail()) { ?>
				<img class="media__img media__img--zoom full-width" srcset="<?php ground_image('large'); ?> 1200w,
						<?php ground_image('medium_large'); ?> 768w,
						<?php ground_image('medium'); ?> 480w" src="<?php ground_image('small'); ?>">
			<?php } else { ?>
				<img class="media__img media__img--zoom full-width" src="<?php echo GROUND_NO_IMAGE_URL; ?>">
			<?php } ?>
		</figure>
	</a>

	<header class="card__header">
		<a class="card__link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
			<h2><?php the_title(); ?></h2>
		</a>
	</header>

	<div class="card__body">
		<?php ground_excerpt(100); ?>
	</div>

</article> <!-- End .card -->