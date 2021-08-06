<?php
global $user_identity;
$commenter     = wp_get_current_commenter();
$req           = get_option( 'require_name_email' );
$aria_req      = ( $req ? " aria-required='true'" : '' );
$required_text = sprintf( ' ' . __( 'Required fields are marked %s' ), '<span class="required">*</span>' );
$fields        = array(
	'author' => '<div class="form__group"><label class="form__label ' . ( $req ? 'required' : '' ) . '" for="author">' . __( 'Name', 'ground' ) . '</label><input class="form__input" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',
	'email'  => '<div class="form__group"><label class="form__label ' . ( $req ? 'required' : '' ) . '" for="email">' . __( 'Email', 'ground' ) . '</label> <input class="form__input" id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>',
	'url'    => '<div class="form__group"><label class="form__label" for="url">' . __( 'Website', 'ground' ) . '</label>' . '<input class="form__input" id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div>',
);

$comments_args = array(
	'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
	'comment_field'        => '<div class="form__group"><label class="form__label" for="comment">' . _x( 'Comment', 'noun' ) . '</label><textarea class="form__textarea" required="required" id="comment" name="comment" cols="45" rows="8"></textarea></div>',
	'must_log_in'          => '<div class="message message--fill has-warning">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink() ) ) ) . '</div>',
	'logged_in_as'         => '<p>' . sprintf( __( '<a href="%1$s" aria-label="%2$s">Logged in as %3$s</a>. <a href="%4$s">Log out?</a>' ), get_edit_user_link(), esc_attr( sprintf( __( 'Logged in as %s. Edit your profile.' ), $user_identity ) ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post->ID ) ) ) ) . '</p>',
	'comment_notes_before' => '<p>' . __( 'Your email address will not be published.' ) . ( $req ? $required_text : '' ) . '</p>',
	'comment_notes_after'  => '<p>' . sprintf( __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s' ), ' <code>' . allowed_tags() . '</code>' ) . '</p>',
	'class_form'           => 'form form--comment',
	'class_submit'         => 'form__button button',
	'title_reply'          => __( 'Leave a Reply' ),
	'title_reply_to'       => __( 'Leave a Reply to %s' ),
	'title_reply_before'   => '<h3 id="reply-title">',
	'title_reply_after'    => '</h3>',
	'cancel_reply_before'  => ' <small>',
	'cancel_reply_after'   => '</small>',
	'cancel_reply_link'    => __( 'Cancel reply' ),
	'label_submit'         => __( 'Post Comment' ),
	'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
	'submit_field'         => '<div class="form__group">%1$s %2$s</div>',
);

comment_form( $comments_args );
