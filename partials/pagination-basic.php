<?php /*  Basic pagination */

$total_pages = $wp_query->max_num_pages;

if ($total_pages > 1) : ?>

	<ul class="pagination">
	<?php if (get_previous_posts_link()) { ?>
		<li class="pagination-previuos"><?php previous_posts_link( __('&laquo; Previuos', "groundtheme") ); ?></li>
	<?php }

	if (get_next_posts_link()) { ?>
		<li class="pagination-next"><?php next_posts_link( __('Next &raquo;', "groundtheme") ); ?></li>
	<?php } ?>
	</ul>

<?php endif;

wp_reset_query();
?>