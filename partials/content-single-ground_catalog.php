<article class="page page--catalog-single">

	<header class="page__header">
		<h1 class="page__title" data-splitting data-scroll><?php the_title(); ?></h1>
	</header>

	<div class="page__body">
		<figure class="media margin-bottom-1">
			<?php if ( has_post_thumbnail() ) { ?>
				<?php the_post_thumbnail( 'medium', array( 'class' => 'media__img full-width' ) ); ?>
			<?php } else { ?>
				<img class="media__img full-width" src="<?php echo TEMPLATE_URL ?>/img/no-image.svg">
			<?php }?>
		</figure>

		<?php the_content(); ?>
	</div> <!-- End .page__body -->

</article> <!-- End .page -->
