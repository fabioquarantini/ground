<article class="page page--post">

	<header class="page__header">
		<h1 class="page__title" data-splitting data-scroll><?php the_title(); ?></h1>
	</header>

	<div class="page__body">
		<?php if ( has_post_thumbnail() ) { ?>
			<figure class="media">
				<?php the_post_thumbnail( 'medium', array( 'class' => 'media__img' ) ); ?>
			</figure>
		<?php } ?>
		<?php the_content(); ?>
	</div> <!-- End .page__body -->

	<footer class="page__footer">
		<?php if( comments_open() && !post_password_required() ) { ?>
			<span class="page__comments"><?php comments_popup_link( __('No comments yet', 'ground'), __('1 comment', 'ground'), __('% comments', 'ground'), __('comments-link', 'ground'), __('Comments are off for this post','ground') ); ?></span> -
		<?php } ?>
		<time class="page__date" datetime="<?php echo get_the_date( 'c' ); ?>"><?php echo get_the_date(); ?></time> -
		<span class="page__author"><?php the_author_posts_link(); ?></span> -
		<span class="page__category"><?php the_category(', '); ?></span>
		<?php if ( has_tag() ) { ?> - <?php the_tags('<span class="page__tag">', ',', '</span>' ); ?><?php } ?>
	</footer>

	<?php if ( comments_open() || get_comments_number() ) {
		comments_template('/partials/comments.php');
	} ?>

</article> <!-- End .page -->
