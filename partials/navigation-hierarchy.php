<?php // Selective page hierarchy

$id = $post->ID;
$parent = array_reverse( get_post_ancestors($id) );
$children = get_pages("child_of=$id");
$count_parent = count($parent);
$count_children = count($children);

if( $count_parent > 0 ) {
	$first_parent = get_page($parent[0]);
	$id = $first_parent->ID;
}

$walker_hierarchy = new Ground_Selective_Page_Hierarchy();

$args = array(
	'depth'			=> 0,
	'show_date'		=> '',
	'date_format'	=> get_option('date_format'),
	'child_of'		=> $id,
	'exclude'		=> '',
	'include'		=> '',
	'title_li'		=> '',
	'echo'			=> 1,
	'authors'		=> '',
	'sort_column'	=> 'menu_order, post_title',
	'link_before'	=> '',
	'link_after'	=> '',
	'walker'		=> $walker_hierarchy,
	'post_type'		=> 'page',
	'post_status'	=> 'publish'
);

?>

<?php if( $count_parent != 0 || $count_children != 0 ) { ?>
	<nav class="navigation navigation--hierarchy" role="navigation">
		<ul class="navigation-hierarchy">
			<?php wp_list_pages($args); ?>
		</ul> <!-- End .navigation-hierarchy -->
	</nav> <!-- End .navigation- -hierarchy -->
<?php } ?>
