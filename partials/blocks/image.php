<?php // Image (Register block here: "inc/gutenberg.php")
$image      = get_field( 'image' );
$image_size = '16-9-small';
?>

<?php if ( $image ) : ?>
	<div class="container">
		<div class="row">
			<div class="gr-12">
				<?php echo wp_get_attachment_image( $image, $image_size, '', array( 'class' => 'full-width' ) ); ?>
			</div>
		</div>
	</div>
<?php endif; ?>
