<?php 

$curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
get_header(); ?>

	<section id="content">

		<h1>
			<?php if (is_category()) { ?>
				
				<span><?php _e("Posts categorized:", "groundtheme"); ?></span> <?php single_cat_title(); ?>
			
			<?php } elseif (is_tag()) { ?> 

				<span><?php _e("Posts tagged:", "groundtheme"); ?></span> <?php single_tag_title(); ?>

			<?php } elseif (is_author()) { 
				global $post;
				$author_id = $post->post_author;
			?>
				<span><?php _e("Posts by:", "groundtheme"); ?></span> <?php echo $curauth->display_name; ?>

			<?php } elseif (is_day()) { ?>

				<span><?php _e("Daily archives:", "groundtheme"); ?></span> <?php the_time('l, F j, Y'); ?>

			<?php } elseif (is_month()) { ?>

				<span><?php _e("Monthly archives:", "groundtheme"); ?></span> <?php the_time('F Y'); ?>

			<?php } elseif (is_year()) { ?>

				<span><?php _e("Yearly archives:", "groundtheme"); ?></span> <?php the_time('Y'); ?>

			<?php } elseif (is_year()) { 

				_e("Archive", "groundtheme");

			} ?>
		</h1>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
			
				<h2><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						
					<?php 
						if ( has_post_thumbnail() ) {
							the_post_thumbnail( 'thumb-600-150', array( 'class' => 'thumb-post' ) );
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
				
				<article id="post-<?php the_ID(); ?>" <?php post_class('post-not-found'); ?>>
					<h1><?php _e("Post not found!", "groundtheme"); ?></h1>
				</article> <!-- End .post-not-found -->
						
		<?php endif; ?>
			
	</section> <!-- end #content -->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>