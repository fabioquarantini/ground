<?php // Text (Register block here: "inc/gutenberg.php")

if (!is_page_template('templates/template-ground-docs.php')) {
	$title = get_field('title');
	$content = get_field('content');
} ?>

<div class="container">
	<div class="row margin-top-2 margin-bottom-2">
		<div class="gr-12">

			<?php if ($title): ?>
				<h2><?php echo $title; ?></h2>
			<?php endif; ?>

			<?php if ($content): ?>
				<div><?php echo $content; ?></div>
			<?php endif; ?>

		</div>
	</div>
</div>