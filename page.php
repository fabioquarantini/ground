<?php

/**
 * Pages
 *
 * @package Ground
 */

get_template_part( 'partials/header' );
?>

<div class="container relative">

	<?php get_template_part( 'partials/breadcrumbs' ); ?>

	<div class="relative mt-12">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'partials/content', 'page' );

		endwhile;
		?>

	</div>

<?php
get_template_part( 'partials/footer' );
