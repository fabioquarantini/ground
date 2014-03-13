<?php /* Rename file with the name of custom post type category (taxonomy-name_of_custom_post_type_category.php) */

get_header(); ?>

	<h1><?php single_cat_title(); ?></h1>
	<?php echo category_description(); ?>

	<?php

	$queried_object = get_queried_object();
	$term_id = $queried_object->term_id;
	$term_parent = $queried_object->parent;

	if( $term_parent == 0 ) {
		$term_parent = $term_id;
	}

	$args = array(
		'child_of'		=> $term_id,
		'hide_empty'	=> 0,
		'hierarchical'	=> 0,
		//'parent'		=> 0,
		'taxonomy'		=> 'ground_catalog_taxonomy'
	);

	$categories = get_categories($args);


	if (!empty($categories)) { // Show the category  ?>

		<ul class="category-list catalog-category-list">
		<?php foreach ($categories as $category) {
			echo '<li><a href="'.get_term_link($category->slug, 'ground_catalog_taxonomy').'">'. $category->name . ' ' . $category->description .'</a></li>';
		} ?>
		</ul> <!-- End .catalog-category-list -->

	<?php } else { // show the products ?>

		<section class="content">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<?php get_template_part( 'partials/content', 'abstract' ); ?>

				<?php endwhile; ?>

					<?php get_template_part( 'partials/pagination', 'numeric' ); ?>

				<?php else : ?>

					<?php get_template_part( 'partials/content', 'none' ); ?>

			<?php endif; ?>

		</section> <!-- End .content -->

	<?php }	?>

	<?php get_sidebar(); ?>

<?php get_footer(); ?>