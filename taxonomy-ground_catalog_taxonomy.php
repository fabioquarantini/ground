<?php get_template_part( 'partials/header' ); ?>

	<div class="gr-12 gr-9@md push-3@md">

		<section class="page page--catalog-archive">

			<header class="page__header">
				<h1 class="page__title"><?php single_cat_title(); ?></h1>
			</header>

			<div class="page__body">

				<?php echo category_description();

				$queried_object = get_queried_object();
				$term_id = $queried_object->term_id;
				$term_parent = $queried_object->parent;

				if ( $term_parent == 0 ) {
					$term_parent = $term_id;
				}

				$args = array(
					'child_of'		=> $term_id,
					'hide_empty'	=> 1,
					'hierarchical'	=> 0,
					//'parent'		=> 0,
					'taxonomy'		=> 'ground_catalog_taxonomy'
				);

				$taxonomies = get_categories($args);

				// Show categories
				if ( !empty( $taxonomies ) && !is_wp_error( $taxonomies ) ) :

					foreach ( $taxonomies as $taxonomy ) {

						$taxonomy_slug = $taxonomy->slug;
						$taxonomy_name = $taxonomy->name;
						$taxonomy_description = $taxonomy->description; ?>

						<div class="gr-12 gr-4@md">
							<?php include( locate_template( 'partials/abstract-taxonomy-ground_catalog.php' ) ); ?>
						</div>

					<?php }

				// Show products
				else :

					if (have_posts()) : while (have_posts()) : the_post();

						get_template_part( 'partials/abstract', 'ground_catalog' );

					endwhile;

						get_template_part( 'partials/pagination' );

					endif;

				endif; ?>

			</div> <!-- End .page__body -->

		</section> <!-- End .page -->

	</div>

	<div class="gr-12 gr-3@md pull-9@md">

		<?php get_template_part( 'partials/sidebar', 'secondary' ); ?>

	</div>

<?php get_template_part( 'partials/footer' ); ?>
