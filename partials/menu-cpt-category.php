<?php /* Cpt list category  */

$custom_category = "ground_catalog_taxonomy";
$custom_post_type = 'ground_catalog';
$get_post_type = get_post_type();

if( is_page_template( 'templates/template-' . $custom_post_type . '.php' ) ||  $custom_post_type == $get_post_type ) {

	$term_id = 0;

	//$parent = array_reverse(get_post_ancestors($post->ID));
	//$first_parent = get_page($parent[0]);
	//$child_id = $first_parent->ID;

	if( is_single() ) {

		$terms = get_the_terms( $post->ID , $custom_category );

		foreach ( $terms as $term ) {
			$term_id =  $term->term_id;
		}

	}

	$args = array(
		'orderby'			=> 'name',
		'show_count'		=> 0,
		'pad_counts'		=> 0,
		//'child_of'		=> $child_id,
		'hide_empty'		=> 1,
		'hierarchical'		=> 1,
		'taxonomy'			=> $custom_category,
		'current_category'	=> $term_id,
		'title_li'			=> ''
	);

?>

<ul class="menu-cpt-category">
	<?php wp_list_categories( $args ); ?>
</ul> <!-- End .menu-cpt-category -->

<?php } ?>