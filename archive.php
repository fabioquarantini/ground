<?php /* The template for displaying archive pages. */
get_header();
 ?>

	<section id="main-content" class="content" role="main">

		<?php if ( have_posts() ) : ?>

			<h1>
				<?php if ( is_category() ) {

					single_cat_title();

				} elseif ( is_tag() ) {

					single_tag_title();

				} elseif ( is_author() ) { ?>

					<span><?php _e( "Author:", "ground" ); ?></span> <?php  get_the_author(); ?>

				<?php } elseif ( is_day() ) { ?>

					<span><?php _e( "Day:", "ground" ); ?></span> <?php the_time('l, F j, Y'); ?>

				<?php } elseif ( is_month() ) { ?>

					<span><?php _e( "Month:", "ground" ); ?></span> <?php the_time('F Y'); ?>

				<?php } elseif ( is_year() ) { ?>

					<span><?php _e( "Year:", "ground" ); ?></span> <?php the_time('Y'); ?>

				<?php } else {

					_e( "Archives", "ground" );

				} ?>
			</h1>

			<?php $term_description = term_description();

			if ( ! empty( $term_description ) ) { ?>

				<div class="taxonomy-description"> <?php echo $term_description ?></div>

			<?php } ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'partials/content', 'abstract' ); ?>

			<?php endwhile; ?>

				<?php get_template_part( 'partials/pagination', 'numeric' ); ?>

			<?php else : ?>

				<?php get_template_part( 'partials/content', 'none' ); ?>

		<?php endif; ?>

	</section> <!-- End .content -->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>