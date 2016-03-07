<?php //  Basic pagination

$total_pages = $wp_query->max_num_pages;

if ($total_pages > 1) : ?>

	<ul class="pagination-basic">
	<?php if (get_previous_posts_link()) { ?>
		<li class="pagination-basic__item pagination-basic__item--previuos"><?php previous_posts_link( __('&laquo; Previuos', 'ground') ); ?></li>
	<?php }

	if (get_next_posts_link()) { ?>
		<li class="pagination-basic__item pagination-basic__item--next"><?php next_posts_link( __('Next &raquo;', 'ground') ); ?></li>
	<?php } ?>
	</ul>

<?php endif;

wp_reset_query(); ?>
