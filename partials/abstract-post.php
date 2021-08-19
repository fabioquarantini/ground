<article class="item js-infinite-post">
	

	<a class="item__link margin-bottom-1" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">

		<img class="item__media" 
		<?php
		if ( has_post_thumbnail() ) {
			?>
						 srcset="<?php ground_image( '4-3-small' ); ?> 480w,
						<?php ground_image( '4-3-medium' ); ?> 900w,
						<?php ground_image( '4-3-large' ); ?> 1200w" sizes="(min-width: 1200px) 1200px,
						(min-width: 768px) 900px,
						100vh" src="<?php ground_image( '4-3-large' ); ?>" 
																	 <?php
		} else {
			?>
																			 src="<?php echo GROUND_NO_IMAGE_URL; ?>" <?php } ?> alt="" loading="lazy">


	</a>

	<header class="item__header">
		<h2 class="item__title">
			<a class="item__link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
		</h2>
		<span class="item__data item__data--date"><time datetime="<?php echo get_the_date( 'c' ); ?>"><?php echo get_the_date(); ?></time></span>
	</header>


	<div class="item__body">
		<p><?php ground_excerpt( 9999 ); ?></p>
	</div>

</article> <!-- End .item -->
