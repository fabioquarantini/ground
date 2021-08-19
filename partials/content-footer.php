<footer class="relative pt-16 bg-gray-100 lg:bg-transparent">
	<div class="container">
		<div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
			<?php $locations = get_nav_menu_locations(); ?>

			<?php if ( isset( $locations['footer-primary'] ) ) : ?>
			<div class="mb-12">
				<?php $titleFooterPrimary = wp_get_nav_menu_object( $locations['footer-primary'] ); ?>
				<h3 class="text-xl font-bold mb-4"> <?php echo $titleFooterPrimary->name; ?> </h3>
				<?php get_template_part( 'partials/navigation-footer', 'primary' ); ?>
			</div>
			<?php endif; ?>

			<?php if ( isset( $locations['footer-secondary'] ) ) : ?>
			<div class="mb-12">
				<?php $titleFooterSecondary = wp_get_nav_menu_object( $locations['footer-secondary'] ); ?>
				<h3 class="text-xl font-bold mb-4"> <?php echo $titleFooterSecondary->name; ?> </h3>
				<?php get_template_part( 'partials/navigation-footer', 'secondary' ); ?>
			</div>
			<?php endif; ?>

			<?php if ( isset( $locations['footer-tertiary'] ) ) : ?>
			<div class="mb-12">
				<?php $titleFooterTertiary = wp_get_nav_menu_object( $locations['footer-tertiary'] ); ?>
				<h3 class="text-xl font-bold mb-4"> <?php echo $titleFooterTertiary->name; ?> </h3>
				<?php get_template_part( 'partials/navigation-footer', 'tertiary' ); ?>
			</div>
			<?php endif; ?>

			<?php if ( GROUND_COMPANY_OPENING_HOURS || GROUND_COMPANY_CLOSING_TIME ) : ?>
			<div class="mb-12">
				<?php if ( GROUND_COMPANY_OPENING_HOURS ) : ?>
				<div class="mb-4">
					<h3 class="text-xl font-bold mb-4"><?php _e( 'Opening Hours', 'ground' ); ?></h3>
					<?php echo GROUND_COMPANY_OPENING_HOURS; ?>
				</div>
				<?php endif; ?>
				<?php if ( GROUND_COMPANY_CLOSING_TIME ) : ?>
				<div>
					<h3 class="text-xl font-bold mt-6 lg:mt-8 mb-4"><?php _e( 'Closing Time', 'ground' ); ?></h3>
					<?php echo GROUND_COMPANY_CLOSING_TIME; ?>
				</div>
				<?php endif; ?>
			</div>
			<?php endif; ?>
		</div>
	</div>

	<div class="container mt-6 lg:flex lg:items-center lg:justify-start py-9 lg:pt-9 lg:space-x-9 bg-black lg:bg-transparent lg:border-gray-200 lg:border-t">
		<div class="mb-6 lg:mb-0">
			<p class="text-center text-white lg:text-left lg:text-black text-sm lg:text-base">
			<?php
			_e( 'All rights reserved - © copyright', 'ground' );
			echo date( 'Y' );
			echo ( '  ' );
			?>
			<?php echo GROUND_COMPANY_NAME ? GROUND_COMPANY_NAME . ' - ' : null; ?>
			<?php echo GROUND_COMPANY_ADDRESS ? GROUND_COMPANY_ADDRESS . ' - ' : null; ?>
			<?php echo GROUND_COMPANY_CAP ? GROUND_COMPANY_CAP : null; ?> <?php echo GROUND_COMPANY_CITY ? GROUND_COMPANY_CITY : null; ?>
			<?php echo GROUND_COMPANY_PROVINCE ? ( '( ' . GROUND_COMPANY_PROVINCE . ' )' ) : null; ?>
			<?php echo GROUND_COMPANY_COUNTRY ? GROUND_COMPANY_COUNTRY : null; ?>
			<?php echo GROUND_COMPANY_PIVA ? ' - P.IVA:' . GROUND_COMPANY_PIVA : null; ?>
			<?php echo GROUND_COMPANY_CF ? ' - C.F.:' . GROUND_COMPANY_CF : null; ?> </p>
		</div>
		<?php if ( GROUND_SOCIAL_LINKEDIN_URL || GROUND_SOCIAL_FACEBOOK_URL || GROUND_SOCIAL_INSTAGRAM_URL || GROUND_SOCIAL_YOUTUBE_URL ) : ?>
		<div class="lg:border-l border-gray-200">

			<div class="lg:flex items-center justify-center lg:space-x-6">

				<p class="pr-3 text-white text-center mb-2 text-sm lg:text-base lg:pl-6 lg:text-left lg:text-black lg:mb-0"><?php _e( 'Seguici sui social network', 'ground' ); ?></p>

				<div class="flex justify-center lg:justify-start space-x-3">
					<?php if ( GROUND_SOCIAL_LINKEDIN_URL ) : ?>
					<span class="inline-block">
						<a class="h-10 w-10 rounded-full text-white bg-blue-600 hover:text-white flex items-center" href="<?php echo GROUND_SOCIAL_LINKEDIN_URL; ?>">
							<?php ground_icon( 'linkedin', 'mx-auto h-3' ); ?>
						</a>
					</span>
					<?php endif; ?>

					<?php if ( GROUND_SOCIAL_FACEBOOK_URL ) : ?>
					<span class="inline-block">
						<a class="h-10 w-10 rounded-full text-white bg-blue-500 hover:text-white flex items-center" href="<?php echo GROUND_SOCIAL_FACEBOOK_URL; ?>">
							<?php ground_icon( 'facebook', 'mx-auto h-4' ); ?>
						</a>
					</span>
					<?php endif; ?>

					<?php if ( GROUND_SOCIAL_INSTAGRAM_URL ) : ?>
					<span class="inline-block">
						<a class="h-10 w-10 rounded-full text-white bg-pink-500 p-2 hover:text-white flex items-center" href="<?php echo GROUND_SOCIAL_INSTAGRAM_URL; ?>">
							<?php ground_icon( 'instagram', 'mx-auto h-4' ); ?>
						</a>
					</span>
					<?php endif; ?>

					<?php if ( GROUND_SOCIAL_YOUTUBE_URL ) : ?>
					<span class="inline-block">
						<a class="h-10 w-10 rounded-full text-white bg-red-500 p-2 hover:text-white flex items-center" href="<?php echo GROUND_SOCIAL_YOUTUBE_URL; ?>">
							<?php ground_icon( 'youtube', 'mx-auto' ); ?>
						</a>
					</span>
					<?php endif; ?>


				</div>

			</div>

		</div>
		<?php endif; ?>

	</div>

</footer>
