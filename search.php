<?php
/**
 * Search results pages
 *
 * @package Ground
 */

get_template_part( 'partials/header' );
?>

	<div class="container">

		<?php get_template_part( 'partials/breadcrumbs' ); ?>

		<section class="page page--search">

			<header class="page__header">
				<h1 class="page__title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'ground' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header>

			<div class="page__body">

				<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();

						get_template_part( 'partials/abstract', 'post' );

				endwhile;

					get_template_part( 'partials/pagination' );

				else :
					?>

					<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'ground' ); ?></p>

				<?php endif; ?>

			</div> <!-- End .page__body -->

		</section> <!-- End .page -->

	</div> <!-- End .container -->

<?php
get_template_part( 'partials/footer' );
