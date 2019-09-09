<article class="item js-infinite-post">

	<header class="item__header">
		<h2 class="item__title" data-splitting data-scroll>
			<a class="item__link" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
		</h2>
		<span class="item__data item__data--date"><time datetime="<?php echo get_the_date( 'c' ); ?>"><?php echo get_the_date(); ?></time></span>
	</header>

	<a class="item__link" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
		<?php $image = get_field('image'); ?>
		<figure class="item__media media margin-bottom-1">
			<?php echo ground_print_image($image); ?>
		</figure>
	</a>

	<p class="item__body"><?php ground_excerpt( 100 ); ?></p>

</article> <!-- End .item -->
