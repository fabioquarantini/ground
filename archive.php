<?php /* The template for displaying archive pages. */
get_header();
 ?>

	<section class="content">

		<?php if ( have_posts() ) : ?>

			<h1>
				<?php if ( is_category() ) { ?>

					<span><?php _e( "Posts categorized:", "groundtheme" ); ?></span> <?php single_cat_title(); ?>

				<?php } elseif ( is_tag() ) { ?>

					<span><?php _e( "Posts tagged:", "groundtheme" ); ?></span> <?php single_tag_title(); ?>

				<?php } elseif ( is_author() ) {
					global $post;
					$curauth = (get_query_var('author_name')) ? get_user_by( 'slug', get_query_var('author_name') ) : get_userdata( get_query_var('author') );
					$author_id = $post->post_author;
				?>
					<span><?php _e( "Posts by:", "groundtheme" ); ?></span> <?php echo $curauth->display_name; ?>

				<?php } elseif ( is_day() ) { ?>

					<span><?php _e( "Daily archives:", "groundtheme" ); ?></span> <?php the_time('l, F j, Y'); ?>

				<?php } elseif ( is_month() ) { ?>

					<span><?php _e( "Monthly archives:", "groundtheme" ); ?></span> <?php the_time('F Y'); ?>

				<?php } elseif ( is_year() ) { ?>

					<span><?php _e( "Yearly archives:", "groundtheme" ); ?></span> <?php the_time('Y'); ?>

				<?php } else {

					_e( "Archive", "groundtheme" );

				} ?>
			</h1>

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