<?php
$custom_taxonomy_name  = 'ground_catalog_taxonomy';
$custom_post_type_name = 'ground_catalog';

if ( is_page_template( 'templates/template-' . $custom_post_type_name . '.php' ) || get_post_type() === $custom_post_type_name ) {

	$current_term_id = 0;
	$child_of_id     = 0;

	// $parent = array_reverse(get_post_ancestors($post->ID));
	// $first_parent = get_page($parent[0]);
	// $child_of_id = $first_parent->ID;

	if ( is_single() ) {

		$terms_list = get_the_terms( $post->ID, $custom_taxonomy_name );

		foreach ( $terms_list as $term_item ) {
			$current_term_id = $term_item->term_id;
		}
	}

	$args = array(
		'orderby'          => 'name',
		'child_of'         => $child_of_id,
		'hierarchical'     => 1,
		'title_li'         => '',
		'taxonomy'         => $custom_taxonomy_name,
		'current_category' => $current_term_id,
		'bem_modifier'     => 'sub-taxonomies', // Custom property.
	); ?>

	<nav class="navigation navigation--<?php echo sanitize_html_class( $args['bem_modifier'] ); ?>">
		<ul class="navigation__list navigation__list--<?php echo sanitize_html_class( $args['bem_modifier'] ); ?>">
			<?php wp_list_categories( $args ); ?>
		</ul>
	</nav> <!-- End .navigation -->

<?php } ?>
