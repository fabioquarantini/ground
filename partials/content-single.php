 <article id="main-content" <?php post_class(); ?> role="main">

	<h1><?php the_title(); ?></h1>

		<p>
			<span><?php _e('Comments:','ground');
			if( comments_open() && !post_password_required() ) {
				comments_popup_link( __('No comments yet', 'ground'), __('1 comment', 'ground'), __('% comments', 'ground'), __('comments-link', 'ground'), __('Comments are off for this post','ground') );
			} else {
				_e('Commments close','ground');
			}
			?></span>
			<span><?php the_time(get_option('date_format')); ?></span>
			<span><?php the_author_posts_link(); ?></span>
			<span><?php _e('Category:','ground'); the_category(', '); ?></span>
			<span><?php _e('Tags:','ground');  the_tags(); ?></span>
			<?php edit_post_link(); ?>
		</p>

		<?php
			if ( has_post_thumbnail() ) {

				the_post_thumbnail( 'thumb-medium', array( 'class' => 'thumb-post' ) );

			} else {

				echo '<img src="'.MY_THEME_FOLDER.'/img/no-photo.jpg" class="thumb-post" alt="'. get_bloginfo('name') .'" />';

			}
		?>

		<?php the_content(); ?>

		<?php if ( comments_open() || get_comments_number() ) {

			comments_template();

		} ?>

</article> <!-- End article -->