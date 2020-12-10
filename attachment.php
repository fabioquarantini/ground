<?php
/**
 * Redirect attachment URL's to parent post URL
 *
 * @package Ground
 */

wp_safe_redirect( get_permalink( $post->post_parent ), 301 );
exit;
