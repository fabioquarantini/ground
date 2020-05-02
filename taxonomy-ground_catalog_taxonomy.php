<?php
/**
 * Taxonomy ground_catalog_taxonomy
 *
 * @package Ground
 */

get_template_part( 'partials/header' );
?>

	<div class="container">
		<div class="row">

			<?php get_template_part( 'partials/breadcrumbs' ); ?>

			<div class="gr-12 gr-3@md">
				<?php get_template_part( 'partials/sidebar', 'secondary' ); ?>
			</div>

			<div class="gr-12 gr-9@md">

				<section class="page page--catalog-archive">

					<header class="page__header">
						<h1 class="page__title"><?php single_cat_title(); ?></h1>
					</header>

					<div class="page__body">

						<?php
						the_archive_description();

						$queried_object = get_queried_object();
						$term_id        = $queried_object->term_id;
						$term_parent    = ( 0 === $term_parent ) ? $term_id : $queried_object->parent;

						$args = array(
							'child_of'     => $term_id,
							'hide_empty'   => 1,
							'hierarchical' => 0,
							'parent'       => $term_id,
							'taxonomy'     => 'ground_catalog_taxonomy',
						);

						$catalog_taxonomies = get_categories( $args );

						// Categories.
						if ( ! empty( $catalog_taxonomies ) && ! is_wp_error( $catalog_taxonomies ) ) :
							?>

							<div class="row">
								<?php
								foreach ( $catalog_taxonomies as $catalog_taxonomy ) :

									$taxonomy_slug        = $catalog_taxonomy->slug;
									$taxonomy_name        = $catalog_taxonomy->name;
									$taxonomy_description = $catalog_taxonomy->description;
									?>

									<div class="gr-12 gr-4@md">
										<?php include locate_template( 'partials/abstract-taxonomy-ground_catalog.php' ); ?>
									</div>

								<?php endforeach ?> <!-- End .row -->
							</div>

							<?php
						else : // Products.

							if ( have_posts() ) :
								?>
								<div class="row">
									<?php
									while ( have_posts() ) :
										the_post();
										?>
										<div class="gr-12 gr-4@md">
											<?php get_template_part( 'partials/abstract', 'ground_catalog' ); ?>
										</div>
									<?php endwhile; ?>
								</div> <!-- End .row -->
								<?php
								get_template_part( 'partials/pagination' );
							endif;

						endif;
						?>

					</div> <!-- End .page__body -->

				</section> <!-- End .page -->

			</div>

		</div> <!-- End .row -->
	</div> <!-- End .container -->

<?php
get_template_part( 'partials/footer' );
