<?php // Text image (Register block here: "inc/gutenberg.php")

if (!is_page_template('templates/template-ground-docs.php')) {
	$title = get_field('title');
	$content = get_field('content');
	$button = get_field('button');
	$image = get_field('image');
	$image_size = '16-9-small';
} ?>

<div class="container position-relative">
	<div class="row">
		<div class="gr-6@md gr-12">
			<?php if ($image): ?>
				<div class="ratio-1-1">
					<?php echo wp_get_attachment_image( $image, $image_size, "", ["class" => "cover"] ); ?>
				</div>
			<?php endif; ?>
		</div>

		<div class="gr-6@md gr-12">

			<div class="centered-vertical@md">

				<?php if ($title): ?>
					<h2><?php echo $title; ?></h2>
				<?php endif; ?>

				<?php if ($content): ?>
					<div><?php echo $content; ?></div>
				<?php endif; ?>

				<?php if ($button): ?>
					<a class="button button--pill margin-top-1" href="<?php echo $button['url']; ?>"><?php echo $button['title']; ?></a>
				<?php endif; ?>

			</div>

		</div>

	</div>
</div>