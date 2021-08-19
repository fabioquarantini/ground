<?php if ( GROUND_HEADER_TEXT ) : ?>
<div class="message-alert message-alert--primary <?php echo GROUND_HEADER_TEXT ? 'bg-black py-2' : ''; ?> text-center text-white">
	<div class="container">
		<?php echo GROUND_HEADER_TEXT; ?>
	</div>
</div>
<?php endif; ?>
