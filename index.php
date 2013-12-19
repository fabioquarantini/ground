<?php get_header(); ?>

	<section class="content">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

				<h1><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>

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
						the_post_thumbnail( 'thumb-medium', array( 'class' => 'thumb-post' ) );
					} else {
						echo '<img src="'.MY_THEME_FOLDER.'/img/no-photo.jpg" class="thumb-post" />';
					}
				?>

				<?php the_content( __('Read more...', 'groundtheme') ); ?>

				<p><?php ground_excerpt( 100, __('Read more', 'groundtheme'), '...'); ?></p>

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