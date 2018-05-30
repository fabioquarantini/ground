<article class="item js-infinite-post">

	<header class="item__header">
		<h2 class="item__title">
			<a class="item__link" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
		</h2>
	</header>

	<a class="item__link" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
		<figure class="media">
			<?php if ( has_post_thumbnail() ) {
				the_post_thumbnail( 'medium', array( 'class' => 'media__img' ) );
			} else { ?>
				<img class="media__img" src="<?php echo TEMPLATE_URL ?>/img/no-image.svg">
			<?php }?>
		</figure>
	</a>

	<p class="item__body"><?php ground_excerpt( 100 ); ?></p>

	<footer class="item__footer">
		<span class="item__comments"><?php if( comments_open() && !post_password_required() ) {
			comments_popup_link( __('No comments yet', 'ground'), __('1 comment', 'ground'), __('% comments', 'ground'), __('comments-link', 'ground'), __('Comments are off for this post','ground') );
		} ?></span> -
		<time class="item__date" datetime="<?php echo get_the_date( 'c' ); ?>"><?php echo get_the_date(); ?></time> -
		<span class="item__author"><?php the_author_posts_link(); ?></span> -
		<span class="item__category"><?php the_category(', '); ?></span>
		<?php if ( has_tag() ) { ?> - <?php the_tags('<span class="item__tag">', ',', '</span>' ); ?><?php } ?>
	</footer> <!-- End .item__footer -->

</article> <!-- End .item -->
