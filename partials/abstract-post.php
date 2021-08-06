<article class="item js-infinite-post">
	<header class="item__header">
		<h2 class="item__title">
			<a class="item__link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
		</h2>
		<span class="item__data item__data--date"><time datetime="<?php echo get_the_date( 'c' ); ?>"><?php echo get_the_date(); ?></time></span>
	</header>

	<a class="item__link margin-bottom-1" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">

		<img class="" 
		<?php
		if ( has_post_thumbnail() ) {
			?>
						 srcset="<?php ground_image( '1-1-small' ); ?> 480w,
						<?php ground_image( '1-1-medium' ); ?> 900w,
						<?php ground_image( '1-1-large' ); ?> 1200w" sizes="(min-width: 1200px) 1200px,
						(min-width: 768px) 900px,
						100vh" src="<?php ground_image( '1-1-large' ); ?>" 
																	 <?php
		} else {
			?>
																			 src="<?php echo GROUND_NO_IMAGE_URL; ?>" <?php } ?> alt="" loading="lazy">

		<!-- <figure class="item__media media aspect-w-1 aspect-h-1">
			<img class="media__img cover"
				<?php if ( has_post_thumbnail() ) { ?>
					srcset="<?php ground_image( '1-1-small' ); ?> 480w,
							<?php ground_image( '1-1-medium' ); ?> 900w,
							<?php ground_image( '1-1-large' ); ?> 1200w"
					sizes="(min-width: 1200px) 1200px,
							(min-width: 768px) 900px,
							100vh"
					src="<?php ground_image( '1-1-large' ); ?>"
				<?php } else { ?>
					src="<?php echo GROUND_NO_IMAGE_URL; ?>"
				<?php } ?>
			alt=""
			loading="lazy">
		</figure> -->

	</a>
	<p class="item__body"><?php ground_excerpt( 100 ); ?></p>

</article> <!-- End .item -->
