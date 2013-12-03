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


	if (!empty($categories)) {  // show the category

		echo '<ul class="category-list catalog-category-list">';
		foreach ($categories as $category) {
			echo '<li><a href="'.get_term_link($category->slug, 'ground_catalog_taxonomy').'">'. $category->name . ' ' . $category->description .'</a></li>';
		}
		echo '</ul> <!-- End .catalog-category-list -->';

	} else { // show the products ?>

		<section class="content">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

					<h2><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

						<?php
							if ( has_post_thumbnail() ) {
								the_post_thumbnail( 'thumb-medium', array( 'class' => 'thumb-post' ) );
							} else {
								echo '<img src="'.MY_THEME_FOLDER.'/img/no-photo.jpg" class="thumb-post" />';
							}
						?>

						<?php the_content( __('Read more...', 'groundtheme') ); ?>

				</article> <!-- End article -->

				<?php endwhile; ?>

					<?php if (function_exists('ground_basic_pagination')) { ?>
						<?php ground_basic_pagination( __('&laquo; Previuos', "groundtheme") , __('Next &raquo;', "groundtheme") ); ?>
					<?php } ?>

				<?php else : ?>

					<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; ?>

		</section> <!-- End .content -->

	<?php }	?>

	<?php get_sidebar(); ?>

<?php get_footer(); ?>