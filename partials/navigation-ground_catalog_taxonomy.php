<?php // List custom post type taxonomy
$custom_taxonomy_name = "ground_catalog_taxonomy";
$custom_post_type_name = 'ground_catalog';

if ( is_page_template( 'templates/template-' . $custom_post_type_name . '.php' ) ||  $custom_post_type_name == get_post_type() ) {

	$term_id = 0;

	//$parent = array_reverse(get_post_ancestors($post->ID));
	//$first_parent = get_page($parent[0]);
	//$child_id = $first_parent->ID;

	if( is_single() ) {

		$terms = get_the_terms( $post->ID , $custom_taxonomy_name );

		foreach ( $terms as $term ) {
			$term_id =  $term->term_id;
		}

	}

	$args = array(
		'orderby'			=> 'name',
		//'child_of'		=> $child_id,
		'hierarchical'		=> 1,
		'title_li'			=> '',
		'taxonomy'			=> $custom_taxonomy_name,
		'current_category'	=> $term_id,
		'walker' => new Ground_Wp_List_Categories_Bem
	); ?>

	<nav class="navigation navigation--ground-catalog-taxonomy" role="navigation">
		<ul class="navigation__list">
			<?php wp_list_categories( $args ); ?>
		</ul>
	</nav> <!-- End .navigation -->

<?php } ?>
