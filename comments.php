<?php /* The template for displaying comments. */

if ( post_password_required() ) {
	return;
}

if ( have_comments() ) : ?>

	<?php
	$args = array(
		'walker'			=> null,
		'max_depth'			=> '',
		'style'				=> 'ol',
		'callback'			=> null,
		'end-callback'		=> null,
		'type'				=> 'comment',
		'reply_text'		=> __( 'Reply', 'ground' ),
		'login_text'		=> __( 'Log in to Reply', 'ground' ),
		'page'				=> '',
		'per_page'			=> '',
		'avatar_size'		=> 74,
		'reverse_top_level'	=> null,
		'reverse_children'	=> '',
		'format'			=> 'html5',
		'short_ping'		=> false
	);
	?>

	<ol class="comment-list">
		<?php wp_list_comments( $args, $comments ); ?>
	</ol> <!-- End .comment-list -->

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav class="navigation-comment" role="navigation">
			<ul>
				<li><?php previous_comments_link( __( '&larr; Older Comments', 'ground' ) ); ?></li>
				<li><?php next_comments_link( __( 'Newer Comments &rarr;', 'ground' ) ); ?></li>
			</ul>
		</nav>  <!-- End .navigation-comment -->
	<?php endif; ?>

	<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="no-comments"><?php _e( 'Comments are closed.' , 'ground' ); ?></p>
	<?php endif; ?>


<?php endif; ?>

<?php

$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );

$fields =  array(

	'author'	=> '<p class="comment-form-author"><label for="author">' . __( 'Name', 'ground' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) . '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
	'email'		=> '<p class="comment-form-email"><label for="email">' . __( 'Email', 'ground' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) . '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
	'url'		=> '<p class="comment-form-url"><label for="url">' . __( 'Website', 'ground' ) . '</label>' . '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',

);

$comments_args = array(

	'comment_field'			=> '<p class="comment-form-comment"><label for="comment">' . __( 'Comment', 'ground' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
	'fields'				=> apply_filters( 'comment_form_default_fields', $fields ),
	'comment_notes_before'	=> '',
	'comment_notes_after'	=> '',
	'label_submit'			=> __( 'Post Comment' , 'ground'),

);

comment_form( $comments_args );

?>