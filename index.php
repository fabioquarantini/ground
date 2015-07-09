<?php get_template_part( 'partials/header' ); ?>

	<section class="blog" id="main-content" role="main">

		<h1 class="blog__title"><?php single_post_title(); ?></h1>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post();

			get_template_part( 'partials/content', 'abstract' );

		endwhile;

			get_template_part( 'partials/pagination', 'numeric' );

		else :

			get_template_part( 'partials/content', 'none' );

		endif; ?>

	</section> <!-- End .blog -->

	<?php get_template_part( 'partials/sidebar', 'secondary' );

get_template_part( 'partials/footer' ); ?>
