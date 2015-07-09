<?php // Rename file with the name of custom post type category (taxonomy-name_of_custom_post_type_category.php)

get_template_part( 'partials/header' ); ?>

		<div class="sidebar sidebar--primary">

			<?php get_template_part( 'partials/navigation', 'custom-taxonomy' ); ?>

		</div> <!-- End .sidebar- -primary -->

		<section class="catalog" id="main-content" role="main">

			<h1 class="catalog__title"><?php single_cat_title(); ?></h1>
			<?php echo category_description();

			$queried_object = get_queried_object();
			$term_id = $queried_object->term_id;
			$term_parent = $queried_object->parent;

			if( $term_parent == 0 ) {
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

			if ( !empty($taxonomies) ) { // Show the category

			 foreach ( $taxonomies as $taxonomy ) {

					$taxonomySlug = $taxonomy->slug;
					$taxonomyName = $taxonomy->name;
					$taxonomyDescription = $taxonomy->description;

					include( locate_template( 'partials/content-taxonomy.php' ) );

				}

			} else { // show the products

				if (have_posts()) : while (have_posts()) : the_post();

					get_template_part( 'partials/content', 'abstract' );

				endwhile;

					get_template_part( 'partials/pagination', 'numeric' );

				else :

					get_template_part( 'partials/content', 'none' );

				endif;

			} ?>

		</section> <!-- End .catalog -->

<?php get_template_part( 'partials/footer' ); ?>
