 <article id="main-content" <?php post_class('article'); ?> role="main">

	<h1 class="article__title"><?php the_title(); ?></h1>

		<p class="article__details">

			<span class="article__comments"><?php	if( comments_open() && !post_password_required() ) {

				comments_popup_link( __('No comments yet', 'ground'), __('1 comment', 'ground'), __('% comments', 'ground'), __('comments-link', 'ground'), __('Comments are off for this post','ground') );

			} else {

				_e('Commments close','ground');

			}
			?></span>
			<span class="article__date"><?php the_time( get_option('date_format') ); ?></span>
			<span class="article__author"><?php the_author_posts_link(); ?></span>
			<span class="article__category"><?php _e('Category:','ground'); the_category(', '); ?></span>
			<?php if ( has_tag() ) { ?>
				<span class="article__tag"><?php the_tags(); ?></span>
			<?php }
			edit_post_link(); ?>
		</p>

		<?php if ( has_post_thumbnail() ) {

			the_post_thumbnail( 'thumb-medium', array( 'class' => 'article__img' ) );

		}

		the_content();

		if ( comments_open() || '0' != get_comments_number() ) {

			comments_template('/partials/comments.php');

		} ?>

</article> <!-- End .article -->
