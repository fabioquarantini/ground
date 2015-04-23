<?php
/*
Template Name: Catolog
Description: Custom template for browsing category in catalog. Use template-{name-of-custom-post-type}.php
*/
?>

<?php get_template_part( 'partials/header' ); ?>


	<div class="sidebar sidebar--primary">

		<?php get_template_part( 'partials/navigation', 'custom-taxonomy' ); ?>

	</div> <!-- End .sidebar- -primary -->

	<section class="catalog" id="main-content" role="main">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<h1 class="catalog__title"><?php the_title(); ?></h1>

			<?php the_content(); ?>

		<?php endwhile; else :

			get_template_part( 'partials/content', 'none' );

		endif;


		$args = array(
			'orderby'		=> 'name',
			'order'			=> 'ASC',
			'hide_empty'	=> true,
			'parent'		=> 0,
			'hierarchical'	=> true,
			'child_of'		=> 0
		);

		$taxonomies = get_terms( 'ground_catalog_taxonomy', $args );

		if ( !empty( $taxonomies ) && !is_wp_error( $taxonomies ) ) {

			foreach ( $taxonomies as $taxonomy ) {

				$taxonomySlug = $taxonomy->slug;
				$taxonomyName = $taxonomy->name;
				$taxonomyDescription = $taxonomy->description;

				include( locate_template( 'partials/content-taxonomy.php' ) );
			}
		}

		?>

	</section> <!-- End .catalog -->

<?php get_template_part( 'partials/footer' ); ?>
