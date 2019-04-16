<?php
/*
Template Name: Catalog
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

					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

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

							<?php $taxonomies_args = array(
								'orderby'		=> 'name',
								'order'			=> 'ASC',
								'hide_empty'	=> true,
								'parent'		=> 0,
								'hierarchical'	=> true,
								'child_of'		=> 0
							);

							$taxonomies = get_terms( 'ground_catalog_taxonomy', $taxonomies_args );

							// Categories
							if ( !empty( $taxonomies ) && !is_wp_error( $taxonomies ) ) : ?>

								<div class="row">
									<?php foreach ( $taxonomies as $taxonomy ) {

										$taxonomy_slug = $taxonomy->slug;
										$taxonomy_name = $taxonomy->name;
										$taxonomy_description = $taxonomy->description; ?>

										<div class="gr-12 gr-4@md">
											<?php include( locate_template( 'partials/abstract-taxonomy-ground_catalog.php' ) ); ?>
										</div>

									<?php } ?>
								</div> <!-- End .row -->

							<?php // Products
							else :

								$catalog_args = array(
									'post_type' 		=> 'ground_catalog',
									'order'				=> 'ASC',
									'orderby'			=> 'menu_order',
									'paged'				=> $paged,
									'posts_per_page'	=> 10
								);

								$wp_query = new WP_Query();
								$wp_query->query($catalog_args);

								if ( $wp_query->have_posts() ) { ?>
									<div class="row">
										<?php while ( $wp_query->have_posts() ) {
											$wp_query->the_post(); ?>
											<div class="gr-12 gr-4@md">
												<?php get_template_part( 'partials/abstract', 'ground_catalog' ); ?>
											</div>
										<?php } ?>
									</div> <!-- End .row -->
									<?php get_template_part( 'partials/pagination' );
									wp_reset_query();
								}

							endif; ?>

						</div> <!-- End .page__body -->

					<?php endwhile; endif; ?>

				</section> <!-- End .page -->

			</div>
		</div> <!-- End .row -->
	</div> <!-- End .container -->

<?php get_template_part( 'partials/footer' ); ?>
