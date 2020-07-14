<?php
$current_id    = get_the_ID();
$parents       = get_post_ancestors( $current_id );
$top_parent_id = ( $parents ) ? $parents[ count( $parents ) - 1 ] : $current_id;
$children      = get_children( 'post_parent=' . $current_id );

if ( ! empty( $parents ) || ! empty( $children ) ) {

	$args = array(
		'depth'        => 0,
		'child_of'     => $top_parent_id,
		'sort_column'  => 'menu_order, post_title',
		'title_li'     => '',
		'bem_modifier' => 'sub-pages', // Custom property.
	);
	?>

	<nav class="navigation navigation--<?php echo sanitize_html_class( $args['bem_modifier'] ); ?>">
		<ul class="navigation__list navigation__list--<?php echo sanitize_html_class( $args['bem_modifier'] ); ?>">
			<?php wp_list_pages( $args ); ?>
		</ul>
	</nav> <!-- End .navigation -->

<?php } ?>
