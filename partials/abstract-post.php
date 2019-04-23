<article class="item js-infinite-post">

	<header class="item__header">
		<h2 class="item__title" data-splitting data-scroll>
			<a class="item__link" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
		</h2>
		<span class="item__data item__data--date"><time datetime="<?php echo get_the_date( 'c' ); ?>"><?php echo get_the_date(); ?></time></span>
	</header>

	<a class="item__link" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
		<figure class="media margin-bottom-1">
			<?php if ( has_post_thumbnail() ) {
				the_post_thumbnail( 'medium', array( 'class' => 'media__img' ) );
			} else { ?>
				<img class="media__img" src="<?php echo TEMPLATE_URL ?>/img/no-image.svg">
			<?php }?>
		</figure>
	</a>

	<p class="item__body"><?php ground_excerpt( 100 ); ?></p>

</article> <!-- End .item -->
