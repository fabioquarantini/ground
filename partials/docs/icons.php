<div class="container docs__header margin-bottom-2">
	<div class="row">
		<div class="gr-12">
			<div class="docs__chapter"></div>
			<div class="docs__title">Icons</div>
		</div>
	</div>
</div>

<div class="container margin-bottom-3">
	<div class="row">
		<div class="gr-12">
			<pre>How to use: &#x3C;?php ground_icon(&#x27;shopping-cart&#x27;); ?&#x3E;</pre>
		</div>
		<div class="gr-12 margin-top-2 docs__icons">
			<?php
				$dir   = TEMPLATE_PATH . '/img/icons';
				$files = scandir( $dir );
			foreach ( $files as $file ) :

				if ( $file !== '..' && $file !== '.' && preg_match("/^[^\.].*$/", $file) ) : ?>

						<div class="docs__icon">
							<?php // include $dir . '/' . $file; ?>
							<?php ground_icon( strstr( $file, '.', true ) ); ?>
							<span class="color-secondary">
								<?php echo strstr( $file, '.', true ); ?>
							</span>
						</div>

					<?php
					endif;

				endforeach;
			?>
		</div>
	</div>
</div>
