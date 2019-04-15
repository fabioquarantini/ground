<article class="item js-infinite-post">

	<header class="item__header">
		<h2 class="item__title" data-splitting data-scroll>
			<a class="item__link" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
		</h2>
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

	<footer class="item__footer">
		<span class="item__data item__data--date"><?php _e('Date', 'ground') ?>: <time datetime="<?php echo get_the_date( 'c' ); ?>"><?php echo get_the_date(); ?></time></span>
		<span class="item__data item__data--author"><?php _e('Author', 'ground') ?>: <?php the_author_posts_link(); ?></span>
		<span class="item__data item__data--category"><?php _e('Category', 'ground') ?>: <?php the_category(', '); ?></span>
		<?php if ( has_tag() ) { ?> <?php the_tags('<span class="item__data item__data--tag">' . __('Tag', 'ground') . ': ', ', ', '</span>' ); ?><?php } ?>
		<?php if( comments_open() && !post_password_required() ) { ?>
			<span class="item__data item__data--comments"><?php _e('Comments', 'ground') ?>: <?php comments_popup_link(); ?></span>
		<?php } ?>
	</footer> <!-- End .item__footer -->

</article> <!-- End .item -->
