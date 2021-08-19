<?php
/**
 * The main template file
 *
 * @package Ground
 */

get_template_part( 'partials/header' );
?>

	<div class="container mt-12">

		<?php get_template_part( 'partials/breadcrumbs' ); ?>

		<section class="page page--blog">

			<?php
			if ( have_posts() ) :

				if ( single_post_title( '', false ) ) :
					?>
					<header class="page__header">
						<h1 class="page__title"><?php single_post_title(); ?></h1>
					</header>
				<?php endif; ?>

				<div class="page__body grid grid-cols-2 lg:grid-cols-3 gap-6 js-infinite-container">

					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'partials/abstract', 'post' );

					endwhile;
					?>

				</div> <!-- End .page__body -->

				<?php get_template_part( 'partials/pagination' ); ?>

				<?php
			endif;
			?>

		</section> <!-- End .page -->

	</div> <!-- End .container -->

<?php
get_template_part( 'partials/footer' );
