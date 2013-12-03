<?php get_header(); ?>

	<section class="content">

		<h1><?php _e("Search results:", "groundtheme"); ?></h1>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

				<h2><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

					<?php
						if ( has_post_thumbnail() ) {
							the_post_thumbnail( 'thumb-medium', array( 'class' => 'thumb-post' ) );
						} else {
							echo '<img src="'.MY_THEME_FOLDER.'/img/no-photo.jpg" class="thumb-post" />';
						}
					?>

					<?php the_content( __('Read more...', 'groundtheme') ); ?>

			</article> <!-- End article -->

			<?php endwhile; ?>

				<?php if (function_exists('ground_basic_pagination')) { ?>
					<?php ground_basic_pagination( __('&laquo; Previuos', "groundtheme") , __('Next &raquo;', "groundtheme") ); ?>
				<?php } ?>

			<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

	</section> <!-- End .content -->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>