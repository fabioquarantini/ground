<?php $format = '?paged=%#%';

if ( get_option('permalink_structure') ) {
	$format = 'page/%#%';
}

$total_pages = $wp_query->max_num_pages;

if ( $total_pages > 1 ) {

	echo '<ol class="pagination">';

	$current_page = max( 1, get_query_var('paged') );
	$args = array(
		'base'			=> get_pagenum_link(1) . '%_%',
		'format'		=> $format,
		'current'		=> $current_page,
		'total'			=> $total_pages,
		'type'			=> 'array',
		'prev_text'		=> __('Prev', 'ground'),
		'next_text'		=> __('Next', 'ground'),
	);

	$pagination_old = paginate_links($args);

	foreach( $pagination_old as $pagination_new) {

		$old_class = array("page-numbers", "next", "prev", "dots");
		$new_class = array("pagination__text", "pagination__text--next js-next-page", "pagination__text--prev", "pagination__text--dots");

		if (strpos( $pagination_new, 'current') !== false) {
			$is_active_pagination_item = " is-active";
		} else if (strpos( $pagination_new, 'prev') !== false) {
			$is_active_pagination_item = " pagination__item--prev";}
		else if (strpos( $pagination_new, 'next') !== false) {
			$is_active_pagination_item = " pagination__item--next";}
		else if (strpos( $pagination_new, 'dots') !== false) {
			$is_active_pagination_item = " pagination__item--dots";}
		else {
			$is_active_pagination_item = "";
		}

		$pagination_new = str_replace("current'", "' data-page='Page '", $pagination_new);
		$pagination_new = str_replace("dots", "", $pagination_new);
		$pagination_new = str_replace($old_class, $new_class, $pagination_new);

		echo '<li class="pagination__item' . $is_active_pagination_item . '">'.$pagination_new.'</li>';

	}

	echo '</ol>';
}

wp_reset_query(); ?>
