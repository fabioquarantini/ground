<!-- TODO: Update BEM class -->
<?php if ( post_password_required() ) {
	return;
} ?>
<div class="comments">

	<?php if ( have_comments() ) { ?>

		<?php $comment_template = function($comment, $args, $depth) { ?>

			<li class="comments__item">

				<!-- TODO: Update BEM class -->
				<article class="comments__body comments__body--<?php comment_ID() ?> <?php empty( $args['has_children'] ) ? '' : 'comments__body--parent' ?>" id="comment-<?php comment_ID() ?>">

					<?php if ( $args['avatar_size'] != 0 ) {
						echo get_avatar( $comment, $args['avatar_size'], '', false, array( 'class' => array( 'comments__img' ) ) );
					} ?>

					<span class="comments__author"><?php echo get_comment_author(); ?></span>
					<time class="comments__date" datetime="<?php echo get_comment_date('c'); ?>"><?php printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time() ); ?></time>
					<a class="comments__edit" href="<?php echo get_edit_comment_link(); ?>"><?php _e( '(Edit)' ) ?></a>

					<?php if ( $comment->comment_approved == '0' ) : ?>
						<?php _e( 'Your comment is awaiting moderation.' ); ?>
					<?php endif; ?>

					<div class="comments__content">
						<?php comment_text(); ?>
					</div>

					<div class="comments__reply">
						<?php $reply_link = get_comment_reply_link( array_merge( $args, array(
							'add_below' => 'comment',
							'depth' => $depth,
							'max_depth' => $args['max_depth']
						) ) );
						echo str_replace("comment-reply-link", "comments__reply-link", $reply_link); ?>
					</div>

				</article>

			<?php // Don't close <li> ?>

		<?php };

		$args = array(
			'max_depth'			=> '',
			'style'				=> 'ol',
			'callback'			=> $comment_template,
			'type'				=> 'comment',
			//'reply_text'		=> __( 'Reply', 'ground' ),
			//'login_text'		=> __( 'Log in to Reply', 'ground' ),
			'per_page'			=> '',
			'avatar_size'		=> 74,
		); ?>

		<h2 class="comments__title"><?php _e( 'Comments' , 'ground' ); ?></h2>

		<ol class="comments__list">
			<?php wp_list_comments( $args ); ?>
		</ol> <!-- End .comments-list -->

	<?php } ?>

	<?php get_template_part( 'partials/comments', 'form' ); ?>

</div> <!-- .comments -->
