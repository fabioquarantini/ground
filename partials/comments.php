<?php

if ( post_password_required() ) {
	return;
}

?>

<?php if ( have_comments() ) { ?>

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

	<ol class="comments-list">
		<?php wp_list_comments( $args, $comments ); ?>
	</ol> <!-- End .comments-list -->

<?php }

if (  ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) { ?>

	<p class="comments-close"><?php _e( 'Comments are closed.' , 'ground' ); ?></p> <!-- End .no-comments -->

<?php }


$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );

$fields = array(

	'author'	=> '<p class="comments-form-author"><label for="author" ' . ( $req ? 'class="required"' : '' ) . '>' . __( 'Name', 'ground' ) . '</label><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
	'email'	=> '<p class="comments-form-email"><label for="email" ' . ( $req ? 'class="required"' : '' ) . '>' . __( 'Email', 'ground' ) . '</label> <input id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
	'url'	=> '<p class="comments-form-url"><label for="url">' . __( 'Website', 'ground' ) . '</label>' . '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',

);

$comments_args = array(

	'comment_field'	=> '<p class="comments-form-comment"><label for="comment">' . __( 'Comment', 'ground' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
	'fields'	=> apply_filters( 'comment_form_default_fields', $fields ),
	//'comment_notes_before'	=> '',
	//'comment_notes_after'	=> '',
	'label_submit'	=> __( 'Post Comment' , 'ground'),

);

comment_form( $comments_args );

?>
