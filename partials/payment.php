<?php
$repeater = GROUND_FOOTER_REPEATER
?>

 <div class="container my-12 lg:my-24">

	<div class="text-center mb-24 grid grid-cols-12 gap-6 lg:items-center">
			<?php if ( $repeater ) : ?>
			<div class="col-span-full lg:col-span-2">
				<div class="grid grid-cols-4 gap-6 lg:grid-cols-2">
					<?php

					foreach ( $repeater as $row ) :
						$select   = $row['select'];
						$checkbox = $row['checkbox'];
						$svg      = $row['svg'];
						?>

						<?php if ( ! $checkbox ) { ?>
							<figure class="col-span-1 aspect-w-1 aspect-h-1 rounded-full bg-gray-100 flex justify-center mb-4">
								<img class="object-contain p-6" src="<?php echo GROUND_TEMPLATE_URL . '/img/getway-icons/' . $select . '.svg'; ?>"/>
							</figure>
						<?php } else { ?>
							<div class="col-span-1 aspect-w-1 aspect-h-1 rounded-full bg-gray-100 flex justify-center mb-4">
								<div class="flex items-center justify-center"><?php echo $svg; ?></div>
							</div>
						<?php } ?>

					<?php endforeach; ?>
				</div>
			</div>
			<?php endif; ?>

			<div class="col-span-full lg:col-span-4 lg:text-left lg:pl-6">
				<div class="text-2xl lg:text-3xl font-bold mb-4 ">
					<?php _e( 'Types of payments', 'ground' ); ?>
				</div>
				<div class="text-base lg:text-xl text-gray-500">
					<?php _e( 'Maximum security during the purchase: all information is encrypted and transmitted without risk.', 'ground' ); ?>
				</div>
			</div>

			<div class="col-start-5 col-span-4 lg:col-start-auto lg:col-span-2 ">
				<div class="w-full aspect-w-1 aspect-h-1">
					<div class="rounded-full text-black bg-gray-100 flex items-center justify-center mb-4">
						<?php ground_icon( 'faster', 'icon--faster' ); ?>
					</div>
				</div>
			</div>

			<div class="col-span-full lg:col-span-4 lg:text-left lg:pl-6">
				<div class="text-2xl lg:text-3xl font-bold mb-4">
					<?php _e( 'Fast shipping for all orders', 'ground' ); ?>
				</div>
				<div class="text-base lg:text-xl text-gray-500">
					<?php _e( 'We will take care to guarantee you the best possible service', 'ground' ); ?>
				</div>
			</div>

	</div>

</div>



