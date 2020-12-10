<?php
/**
 * Template Name: Catalog
 *
 * @package Ground
 */

get_template_part( 'partials/header' ); ?>

	<div class="container">
		<div class="row">

			<?php get_template_part( 'partials/breadcrumbs' ); ?>

			<div class="gr-12 gr-3@md">
				<?php get_template_part( 'partials/sidebar', 'secondary' ); ?>
			</div>

			<div class="gr-12 gr-9@md">

				<section class="page page--catalog">

					<?php
					while ( have_posts() ) :
							the_post();
						?>

						<header class="page__header">
							<h1 class="page__title" data-splitting data-scroll><?php the_title(); ?></h1>
						</header>

						<div class="page__body">

							<?php if ( has_post_thumbnail() ) : ?>
								<figure class="media">
									<img class="media__img full-width"
										srcset="<?php ground_image( 'large' ); ?> 1200w,
											<?php ground_image( 'medium_large' ); ?> 768w,
											<?php ground_image( 'medium' ); ?> 480w"
										src="<?php ground_image( 'small' ); ?>">
								</figure>
							<?php endif ?>

							<?php the_content(); ?>

							<?php
							$taxonomies_args = array(
								'orderby'      => 'name',
								'order'        => 'ASC',
								'hide_empty'   => true,
								'parent'       => 0,
								'hierarchical' => true,
								'child_of'     => 0,
							);

							$catalog_taxonomies = get_terms( 'ground_catalog_taxonomy', $taxonomies_args );

							// Categories.
							if ( ! empty( $catalog_taxonomies ) && ! is_wp_error( $catalog_taxonomies ) ) :
								?>

								<div class="row">
									<?php
									foreach ( $catalog_taxonomies as $catalog_taxonomy ) {
										?>

										<div class="gr-12 gr-4@md">
											<?php
											$args = array(
												'slug'        => $catalog_taxonomy->slug,
												'name'        => $catalog_taxonomy->name,
												'description' => $catalog_taxonomy->description,
											);
											get_template_part( 'partials/abstract', 'taxonomy-ground_catalog', $args );
											?>
										</div>

									<?php } ?>
								</div> <!-- End .row -->

								<?php
							else : // Products.

								$catalog_args = array(
									'post_type'      => 'ground_catalog',
									'order'          => 'ASC',
									'orderby'        => 'menu_order',
									'paged'          => $paged,
									'posts_per_page' => 10,
								);

								$query = new WP_Query( $catalog_args );
								if ( $query->have_posts() ) :
									?>
									<div class="row">
										<?php
										while ( $query->have_posts() ) :
											$query->the_post();
											?>
											<div class="gr-12 gr-4@md">
												<?php get_template_part( 'partials/abstract', 'ground_catalog' ); ?>
											</div>
										<?php endwhile; ?>
									</div> <!-- End .row -->
									<?php
									get_template_part( 'partials/pagination' );
									wp_reset_postdata();
								endif;

							endif;
							?>

						</div> <!-- End .page__body -->

						<?php
					endwhile;
					?>

				</section> <!-- End .page -->

			</div>
		</div> <!-- End .row -->
	</div> <!-- End .container -->

<?php
get_template_part( 'partials/footer' );
