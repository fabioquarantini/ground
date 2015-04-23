<?php // The template for displaying 404 pages (Not Found).

get_template_part( 'partials/header' ); ?>

<section class="error" id="main-content" role="main">

	<h1 class="error__title"><?php _e( 'Not found', 'ground' ); ?></h1>
	<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'ground' ); ?></p>
	<p><?php get_search_form(); ?></p>

</section> <!-- End .error -->

<?php get_template_part( 'partials/footer' ); ?>
