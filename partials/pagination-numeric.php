<?php // Numeric pagination

$format = '?paged=%#%';

if ( get_option('permalink_structure') ) {
	$format = 'page/%#%';
}

$total_pages = $wp_query->max_num_pages;

if ( $total_pages > 1 ) {

	$current_page = max( 1, get_query_var('paged') );
	$args = array(
		'base'			=> get_pagenum_link(1) . '%_%',
		'format'		=> $format,
		'current'		=> $current_page,
		'total'			=> $total_pages,
		'type'			=> 'list',
		'prev_text'		=> __('&laquo; Previuos', "ground"),
		'next_text'		=> __('Next &raquo;', "ground"),
	);

	echo paginate_links($args);

}

wp_reset_query();

?>
