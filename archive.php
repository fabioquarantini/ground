<?php get_template_part( 'partials/header' ); ?>

	<section class="archive" id="main-content" role="main">

		<?php if ( have_posts() ) : ?>

			<h1 class="archive__title">
				<?php if ( is_category() ) {

					single_cat_title();

				} elseif ( is_tag() ) {

					single_tag_title();

				} elseif ( is_author() ) { ?>

					<span class="archive__sub-title"><?php _e( "Author:", "ground" ); ?></span> <?php  get_the_author(); ?>

				<?php } elseif ( is_day() ) { ?>

					<span class="archive__sub-title"><?php _e( "Day:", "ground" ); ?></span> <?php the_time('l, F j, Y'); ?>

				<?php } elseif ( is_month() ) { ?>

					<span class="archive__sub-title"><?php _e( "Month:", "ground" ); ?></span> <?php the_time('F Y'); ?>

				<?php } elseif ( is_year() ) { ?>

					<span class="archive__sub-title"><?php _e( "Year:", "ground" ); ?></span> <?php the_time('Y'); ?>

				<?php } else {

					_e( "Archives", "ground" );

				} ?>
			</h1>

			<?php $term_description = term_description();

			if ( ! empty( $term_description ) ) { ?>

				<div class="archive__description"> <?php echo $term_description ?></div>

			<?php } ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'partials/content', 'abstract' ); ?>

			<?php endwhile; ?>

				<?php get_template_part( 'partials/pagination', 'numeric' ); ?>

			<?php else : ?>

				<?php get_template_part( 'partials/content', 'none' ); ?>

		<?php endif; ?>

	</section> <!-- End .archive -->

	<?php get_template_part( 'partials/sidebar', 'secondary' ); ?>

<?php get_template_part( 'partials/footer' ); ?>
