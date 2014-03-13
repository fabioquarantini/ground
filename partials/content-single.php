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

				the_post_thumbnail( 'thumb-medium', array( 'class' => 'thumb-post' ) );

			} else {

				echo '<img src="'.MY_THEME_FOLDER.'/img/no-photo.jpg" class="thumb-post" />';

			}
		?>

		<?php the_content(); ?>

		<?php if ( comments_open() || get_comments_number() ) {
			comments_template();
		}?>

</article> <!-- End article -->