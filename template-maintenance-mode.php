<?php if ( !defined('ABSPATH')) exit;

$protocol = $_SERVER["SERVER_PROTOCOL"];

if ( 'HTTP/1.1' != $protocol && 'HTTP/1.0' != $protocol ) {
	$protocol = 'HTTP/1.0';
}

header( "$protocol 503 Service Unavailable", true, 503 );
header( 'Content-Type: text/html; charset=utf-8' );
header( 'Retry-After: 600' );

?>

<?php get_header(); ?>
<section class="content">
	<h1><?php _e("Maintenance mode", "groundtheme"); ?></h1>
</section>
<?php get_footer(); ?>