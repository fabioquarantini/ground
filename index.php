<?php get_header(); ?>

<section class="content" role="main">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'partials/content', 'abstract' ); ?>

	<?php endwhile; ?>

		<?php get_template_part( 'partials/pagination', 'numeric' ); ?>

	<?php else : ?>

		<?php get_template_part( 'partials/content', 'none' ); ?>

	<?php endif; ?>

</section> <!-- End .content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>