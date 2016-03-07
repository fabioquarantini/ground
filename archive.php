<?php get_template_part( 'partials/header' ); ?>

	<section class="archive" id="main-content" role="main">

		<?php if ( have_posts() ) :

			the_archive_title( '<h1 class="archive__title">', '</h1>' );
			the_archive_description( '<div class="archive__description">', '</div>' );

			while ( have_posts() ) : the_post();

				get_template_part( 'partials/content', 'abstract' );

			endwhile;

				get_template_part( 'partials/pagination', 'numeric' );

			else :

				get_template_part( 'partials/content', 'none' );

		endif; ?>

	</section> <!-- End .archive -->

	<?php get_template_part( 'partials/sidebar', 'secondary' );

get_template_part( 'partials/footer' ); ?>
