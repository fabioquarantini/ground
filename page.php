<?php

/**
 * Pages
 *
 * @package Ground
 */

get_template_part('partials/header');
?>

<div class="container relative">

	<?php get_template_part('partials/breadcrumbs'); ?>

	<div class="grid grid-cols-12 gap-6">

		<div class="col-span-full">

			<?php
			while (have_posts()) :
				the_post();

				get_template_part('partials/content', 'page');

			endwhile;
			?>

		</div> <!-- End .row -->
	</div> <!-- End .container -->

	<?php
	get_template_part('partials/footer');
