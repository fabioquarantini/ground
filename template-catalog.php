<?php
/*
Template Name: Catolog template
Description: Custom template for browsing category in catalog.
*/
?>

<?php get_header(); ?>

	<h1><?php the_title(); ?></h1>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
			
			<?php the_content(); ?>

		</article> <!-- End article -->
				
	<?php endwhile; ?>
				
	<?php endif; ?>

	<?php

	$taxonomies = array( 
		//'post_tag',
		'custom_catalog_category',
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
	//print_r($terms);
	echo '<ul class="category-list catalog-category-list">';
	foreach ($terms as $term) {
		echo '<li><a href="'.get_term_link($term->slug, 'custom_catalog_category').'">'.$term->name .' '. $term->description . '</a></li>';
	}
	echo '</ul> <!-- End .catalog-category-list -->';

	?>

	<?php get_sidebar(); ?>

<?php get_footer(); ?>