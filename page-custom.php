<?php
/*
Template Name: Custom Page template
Description: Custom template for page.
*/
?>

<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
			
			<h1><?php the_title(); ?></h1>

			<?php the_content(); ?>

			<?php comments_template(); ?>

		</article> <!-- End article -->
				
	<?php endwhile; ?>

	<?php else : ?>
			
		<article id="post-<?php the_ID(); ?>" <?php post_class('post-not-found'); ?>>
			<h1><?php _e("Post not found!", "groundtheme"); ?></h1>
		</article> <!-- End .post-not-found -->
				
	<?php endif; ?>

	<?php get_sidebar(); ?>

<?php get_footer(); ?>