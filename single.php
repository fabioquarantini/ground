<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
			
			<h1><?php the_title(); ?></h1>
						
				<p>
					<span><?php _e('Comments:','groundtheme');
					if( comments_open() && !post_password_required() ) {
						comments_popup_link( __('No comments yet', 'groundtheme'), __('1 comment', 'groundtheme'), __('% comments', 'groundtheme'), __('comments-link', 'groundtheme'), __('Comments are off for this post','groundtheme') );
					} else {
						_e('Commments close','groundtheme');
					} 
					?></span>
					<span><?php the_time(get_option('date_format')); ?></span>
					<span><?php the_author_posts_link(); ?></span>
					<span><?php _e('Category:','groundtheme'); the_category(', '); ?></span>
					<span><?php _e('Tags:','groundtheme');  the_tags(); ?></span>
					<?php edit_post_link(); ?>
				</p>

				<?php 
					if ( has_post_thumbnail() ) {
						the_post_thumbnail( 'thumb-600-150', array( 'class' => 'thumb-post' ) );
					} else {
						echo '<img src="'.MY_THEME_FOLDER.'/img/no-photo.jpg" class="thumb-post" />';
					}
				?>
						
				<?php the_content(); ?>

				<?php 
				$args = array(
					'before'			=> '<ol class="post-pagination">' . __("Pages:", "groundtheme"),
					'after'				=> '</ol>',
					'link_before'		=> '',
					'link_after'		=> '',
					'next_or_number'	=> 'number',
					'nextpagelink'		=> __("Next page", "groundtheme"),
					'previouspagelink'	=> __("Previous page", "groundtheme"),
					'pagelink'			=> '%',
					'echo'				=> 1
				);

				wp_link_pages($args);
				?> 

				<?php comments_template(); ?>
				
		</article> <!-- End article -->

		<div class="author-box">
			<h2>Author info</h2>
			<?php echo get_avatar( get_the_author_meta('email'), '80' ); ?>
			<?php the_author_meta( "display_name" ); ?>
			<?php the_author_meta( "user_description" ); ?>
		</div> <!-- End .author-box -->
				
		<?php endwhile; ?>

			<?php ground_thumb_post_pagination( __("Next article &raquo;", "groundtheme") , __("&laquo; Previus article", "groundtheme") ); ?>

		<?php else : ?>
			
			<article id="post-<?php the_ID(); ?>" <?php post_class('post-not-found'); ?>>
				<h1><?php _e("Post not found!", "groundtheme"); ?></h1>
			</article> <!-- End .post-not-found -->
				
	<?php endif; ?>

	<?php get_sidebar(); ?>

<?php get_footer(); ?>