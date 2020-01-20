<?php $format = '?paged=%#%';

if ( get_option('permalink_structure') ) {
	$format = 'page/%#%';
}

$total_pages = $wp_query->max_num_pages;

if ( $total_pages > 1 ) {

	$url_params_regex = '/\?.*?$/';
	preg_match($url_params_regex, get_pagenum_link(), $url_params);
	$base = !empty($url_params[0]) ? preg_replace($url_params_regex, '', get_pagenum_link()).'%_%/'.$url_params[0] : get_pagenum_link().'%_%';

	echo '<ol class="pagination js-pagination">';

	$current_page = max( 1, get_query_var('paged') );
	$args = array(
		'base'			=> $base,
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
		$new_class = array("pagination__text", "pagination__text--next js-infinite-next-page", "pagination__text--prev", "pagination__text--dots");

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

<div class="js-infinite-status display-none">
	<div class="infinite-scroll-request">
		<div class="spinner centered-horizontal margin-top-1 margin-bottom-1"></div>
	</div>
</div>
