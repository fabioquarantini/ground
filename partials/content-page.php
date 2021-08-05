<article class="page">

	<header class="page__header">
		<h1 class="page__title"><?php the_title(); ?></h1>
	</header>

	<div class="page__body">
		<?php if (has_post_thumbnail()) { ?>
			<figure class="media">
				<img class="media__img full-width" srcset="<?php ground_image('large') ?> 1200w,
						<?php ground_image('medium_large') ?> 768w,
						<?php ground_image('medium') ?> 480w" src="<?php ground_image('small') ?>">
			</figure>
		<?php } ?>
		<div class="relative">
			<?php the_content(); ?>
		</div>
	</div> <!-- End .page__body -->

	<?php if (comments_open() || get_comments_number()) {
		comments_template('/partials/comments.php');
	} ?>

</article> <!-- End .page -->