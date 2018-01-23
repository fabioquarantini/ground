<?php
$current_id = $post->ID;
$parent = array_reverse( get_post_ancestors($current_id) );
$children = get_pages("child_of=' . $current_id . '");
$count_parent = count($parent);
$count_children = count($children);

if( $count_parent > 0 ) {
	$first_parent = get_page($parent[0]);
	$current_id = $first_parent->ID;
}

$args = array(
	'depth'				=> 0,
	'child_of'			=> $current_id,
	'sort_column'		=> 'menu_order, post_title',
	'title_li'			=> '',
	'walker'			=> new Ground_Wp_List_Pages_Bem,
	'current_submenu'	=> true // Show only current submenu (Custom property and works with Walker)
);

if( $count_parent != 0 || $count_children != 0 ) { ?>

	<nav class="navigation-container navigation-container--page-hierarchy">
		<ul class="navigation navigation--page-hierarchy">
			<?php wp_list_pages( $args ); ?>
		</ul> <!-- End .navigation -->
	</nav> <!-- End .navigation-container -->

<?php } ?>
