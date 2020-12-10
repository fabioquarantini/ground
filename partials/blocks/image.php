<?php // Image (Register block here: "inc/gutenberg.php")

if (!is_page_template('templates/template-ground-docs.php')) {
	$image = get_field('image');
	$image_size = '16-9-small';
} ?>

<?php if ($image): ?>
	<div class="container container--fluid">
		<div class="row">
			<div class="gr-12">
				<?php echo wp_get_attachment_image( $image, $image_size, "", ["class" => "full-width"] ); ?>
			</div>
		</div>
	</div>
<?php endif; ?>
