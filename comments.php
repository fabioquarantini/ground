<?php

if ( post_password_required() ) {
	return;
}

if ( have_comments() ) { ?>

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

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { ?>

		<nav class="navigation-comment" role="navigation">
			<ul>
				<li><?php previous_comments_link( __( '&larr; Older Comments', 'ground' ) ); ?></li>
				<li><?php next_comments_link( __( 'Newer Comments &rarr;', 'ground' ) ); ?></li>
			</ul>
		</nav>  <!-- End .navigation-comment -->

	<?php } ?>

	<?php if ( ! comments_open() && get_comments_number() ) { ?>

		<p class="no-comments"><?php _e( 'Comments are closed.' , 'ground' ); ?></p>

	<?php }

}


$comments_args = array(
	//'comment_notes_after' => '',
	//'comment_notes_before' => '',
);

comment_form( $comments_args );

?>