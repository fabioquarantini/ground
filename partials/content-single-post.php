<article class="page page--post-single">

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
		<span class="page__data page__data--date"><?php _e('Date', 'ground') ?>: <time datetime="<?php echo get_the_date( 'c' ); ?>"><?php echo get_the_date(); ?></time></span>
		<span class="page__data page__data--author"><?php _e('Author', 'ground') ?>: <?php the_author_posts_link(); ?></span>
		<span class="page__data page__data--category"><?php _e('Category', 'ground') ?>: <?php the_category(', '); ?></span>
		<?php if ( has_tag() ) { ?> <?php the_tags('<span class="page__data page__data--tag">' . __('Tag', 'ground') . ': ', ', ', '</span>' ); ?><?php } ?>
		<?php if( comments_open() && !post_password_required() ) { ?>
			<span class="page__data page__data--comments"><?php _e('Comments', 'ground') ?>: <?php comments_popup_link(); ?></span>
		<?php } ?>
	</footer> <!-- End .page__footer -->

	<?php if ( comments_open() || get_comments_number() ) {
		comments_template('/partials/comments.php');
	} ?>

</article> <!-- End .page -->
