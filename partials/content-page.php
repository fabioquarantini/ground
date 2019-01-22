<article class="page">

	<header class="page__header">
		<h1 class="page__title" data-splitting><?php the_title(); ?></h1>
	</header>

	<div class="page__body">
		<?php if ( has_post_thumbnail() ) { ?>
			<figure class="media">
				<?php the_post_thumbnail( 'medium', array( 'class' => 'media__img' ) ); ?>
			</figure>
		<?php } ?>
		<?php the_content(); ?>
	</div> <!-- End .page__body -->

	<?php if ( comments_open() || get_comments_number() ) {
		comments_template('/partials/comments.php');
	} ?>

</article> <!-- End .page -->
