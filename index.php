<?php get_template_part( 'partials/header' ); ?>

	<?php get_template_part( 'partials/slider', 'primary' ); ?>

	<section class="page">

		<header class="page__header">
			<h1 class="page__title"><?php single_post_title(); ?></h1>
		</header>

		<div class="page__body">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post();

				get_template_part( 'partials/abstract', 'post' );

			endwhile;

				get_template_part( 'partials/pagination' );

			endif; ?>
		</div> <!-- End .page__body -->

	</section> <!-- End .page -->

<?php get_template_part( 'partials/footer' ); ?>
