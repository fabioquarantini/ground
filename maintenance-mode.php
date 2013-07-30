<?php if ( !defined('ABSPATH')) exit; 

$headers = array(
    'Content-Type'  => 'text/html; charset=utf-8',
    'Retry-After'   => '600',
    'Expires'       => 'Wed, 11 Jan 1984 05:00:00 GMT',
    'Last-Modified' => gmdate('D, d M Y H:i:s') . ' GMT',
    'Cache-Control' => 'no-cache, must-revalidate, max-age=0',
    'Pragma'        => 'no-cache',
);

header("HTTP/1.1 503 Service Unavailable", true, 503);

foreach($headers as $h => $k) {

    header("{$h}: {$k}", true);

}

?>

<?php get_header(); ?>
	<section id="content">
		<h1><?php _e("Maintenance mode", "groundtheme"); ?></h1>
	</section>
<?php get_footer(); ?>