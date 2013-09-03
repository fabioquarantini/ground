<?php
/*
Template Name: Custom Page template
Description: Custom template for page.
*/
?>

<?php get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>
					
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
			
			<h1><?php the_title(); ?></h1>

			<?php the_content(); ?>

			<?php comments_template(); ?>

		</article> <!-- End article -->
				
	<?php endwhile; ?>

	<?php get_sidebar(); ?>

<?php get_footer(); ?>