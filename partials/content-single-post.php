<article class="page page--post-single">

	<header class="page__header">
		<h1 class="page__title"><?php the_title(); ?></h1>
		<span class="page__data page__data--date"><time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time></span>
	</header>

	<div class="page__body">
		<figure class="media">
			<?php if (has_post_thumbnail()) { ?>
				<img class="media__img full-width" srcset="<?php ground_image('large'); ?> 1200w,
						<?php ground_image('medium_large'); ?> 768w,
						<?php ground_image('medium'); ?> 480w" src="<?php ground_image('small'); ?>">
			<?php } else { ?>
				<img class="media__img full-width" src="<?php echo GROUND_NO_IMAGE_URL; ?>">
			<?php } ?>
		</figure>
		<?php the_content(); ?>
	</div> <!-- End .page__body -->

	<footer class="page__footer">
		<span class="page__data page__data--category"><?php _e('Category', 'ground'); ?>: <?php the_category(', '); ?></span>
		<?php if (comments_open() && !post_password_required()) { ?>
			<span class="page__data page__data--comments"><?php _e('Comments', 'ground'); ?>: <?php comments_popup_link(); ?></span>
		<?php } ?>
		<?php
		if (has_tag()) {
		?>
			<?php the_tags('<span class="page__data page__data--tag">', '', '</span>'); ?><?php } ?>
	</footer> <!-- End .page__footer -->

	<?php
	if (comments_open() || get_comments_number()) {
		comments_template('/partials/comments.php');
	}
	?>

</article> <!-- End .page -->