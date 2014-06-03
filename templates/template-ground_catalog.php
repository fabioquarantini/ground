<?php
/*
Template Name: Catolog template
Description: Custom template for browsing category in catalog. Use template-{name-of-custom-post-type}.php
*/
?>

<?php get_header(); ?>

	<section id="main-content" class="content" role="main">

		<h1><?php the_title(); ?></h1>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

				<?php the_content(); ?>

			</article> <!-- End article -->

		<?php endwhile; ?>

			<?php

			$taxonomies = array(
				'ground_catalog_taxonomy',
			);

			$args = array(
				'orderby'		=> 'name',
				'order'			=> 'ASC',
				'hide_empty'	=> true,
				'exclude'		=> array(),
				'exclude_tree'	=> array(),
				'include'		=> array(),
				'number'		=> '',
				'fields'		=> 'all',
				'slug'			=> '',
				'parent'		=> 0,
				'hierarchical'	=> true,
				'child_of'		=> 0,
				'get'			=> '',
				'name__like'	=> '',
				'pad_counts'	=> false,
				'offset'		=> '',
				'search'		=> '',
				'cache_domain'	=> 'core'
			);

			$terms = get_terms( $taxonomies, $args );

			?>


			<ul class="catalog-category-list">
			<?php foreach ($terms as $term) {
				echo '<li><a href="'.get_term_link($term->slug, 'ground_catalog_taxonomy').'">'.$term->name .' '. $term->description . '</a></li>';
			} ?>
			</ul> <!-- End .catalog-category-list -->

		<?php else : ?>

			<?php get_template_part( 'partials/content', 'none' ); ?>

		<?php endif; ?>

	</section>

	<?php get_sidebar(); ?>

<?php get_footer(); ?>