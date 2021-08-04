<?php

/**
 * Pagination
 *
 * @package Ground
 */

$format        = '?paged=%#%';
$protocol      = isset($_SERVER['HTTPS']) && 'on' === $_SERVER['HTTPS'] ? 'https' : 'http';
$host          = isset($_SERVER['HTTP_HOST']) ? sanitize_text_field(wp_unslash($_SERVER['HTTP_HOST'])) : '';
$uri           = isset($_SERVER['REQUEST_URI']) ? sanitize_text_field(wp_unslash($_SERVER['REQUEST_URI'])) : '';
$url           = $protocol . '://' . $host . $uri;
$url_last_char = substr($url, -1);

if (get_option('permalink_structure')) {
	if ('/' === $url_last_char || strpos($url, '/page/')) {
		$format = 'page/%#%';
	} else {
		$format = '/page/%#%';
	}
}

$total_pages = $wp_query->max_num_pages;

if ($total_pages > 1) {

	$url_params_regex = '/\?.*?$/';
	preg_match($url_params_regex, get_pagenum_link(), $url_params);
	$base = !empty($url_params[0]) ? preg_replace($url_params_regex, '', get_pagenum_link()) . '%_%/' . $url_params[0] : get_pagenum_link() . '%_%';

	echo '<ol class="pagination js-pagination">';

	$current_page = max(1, get_query_var('paged'));
	$args         = array(
		'base'      => $base,
		'format'    => $format,
		'current'   => $current_page,
		'total'     => $total_pages,
		'type'      => 'array',
		'prev_text' => __('Prev', 'ground'),
		'next_text' => __('Next', 'ground'),
	);

	$pagination_old = paginate_links($args);

	foreach ($pagination_old as $pagination_new) {

		$old_class = array('page-numbers', 'next', 'prev', 'dots');
		$new_class = array('pagination__text', 'pagination__text--next js-infinite-next-page', 'pagination__text--prev', 'pagination__text--dots');

		if (strpos($pagination_new, 'current') !== false) {
			$is_active_pagination_item = ' is-active';
		} elseif (strpos($pagination_new, 'prev') !== false) {
			$is_active_pagination_item = ' pagination__item--prev';
		} elseif (strpos($pagination_new, 'next') !== false) {
			$is_active_pagination_item = ' pagination__item--next';
		} elseif (strpos($pagination_new, 'dots') !== false) {
			$is_active_pagination_item = ' pagination__item--dots';
		} else {
			$is_active_pagination_item = '';
		}

		$pagination_new = str_replace("current'", "' data-page='Page '", $pagination_new);
		$pagination_new = str_replace('dots', '', $pagination_new);
		$pagination_new = str_replace($old_class, $new_class, $pagination_new);

		echo '<li class="pagination__item' . $is_active_pagination_item . '">' . $pagination_new . '</li>';
	}

	echo '</ol>';
}

wp_reset_postdata(); ?>

<div class="js-infinite-status">
	<div class="infinite-scroll-request overflow-hidden flex justify-center my-9">
		<?php ground_icon('spinner', 'animate-spin text-primary h-12'); ?>
	</div>
</div>