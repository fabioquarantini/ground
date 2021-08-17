<footer class="relative py-16">
	<div class="container">
		<div class="lg:grid lg:grid-cols-4 lg:gap-6">
			<div class="header__logo mb-12">
				<?php if ( GROUND_LOGO_URL_PRIMARY || GROUND_LOGO_SOURCE_PRIMARY ) { ?>
				<a class="js-cursor-hide" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>">
					<?php
					if ( GROUND_LOGO_TYPE_PRIMARY && GROUND_LOGO_SOURCE_PRIMARY ) {
						echo GROUND_LOGO_SOURCE_PRIMARY;
					} elseif ( GROUND_LOGO_URL_PRIMARY ) {
						?>
						<img class="w-20 h-auto" src="<?php echo esc_url( GROUND_LOGO_URL_PRIMARY['sizes']['medium'] ); ?>" alt="<?php echo esc_attr( GROUND_LOGO_URL_PRIMARY['alt'] ); ?>" />
					<?php } ?>
				</a>
				<?php } else { ?>
					<a class="border border-dashed border-primary p-2" target="_blank" href="<?php echo admin_url( 'admin.php?page=theme-general-settings', 'http' ); ?>">Upload your logo</a>
				<?php } ?>
			</div>
			<div class="mb-12">
				<?php get_template_part( 'partials/navigation-footer', 'primary' ); ?>
			</div>
			<div class="mb-12">
				<?php get_template_part( 'partials/navigation-footer', 'secondary' ); ?>
			</div>
			<div class="mb-12">
				<?php get_template_part( 'partials/navigation-footer', 'tertiary' ); ?>
			</div>
		</div>
	</div>

	<div class="container mt-12 lg:flex lg:items-center lg:justify-start lg:pt-16 lg:space-x-9">
		<div class="mb-6 lg:mb-0">
			<p><?php echo GROUND_COMPANY_NAME ? GROUND_COMPANY_NAME . '-' : null; ?>  <?php echo GROUND_COMPANY_ADDRESS ? GROUND_COMPANY_ADDRESS : null; ?> - <?php echo GROUND_COMPANY_CAP ? GROUND_COMPANY_CAP : null; ?> <?php echo GROUND_COMPANY_CITY ? GROUND_COMPANY_CITY : null; ?> (<?php echo GROUND_COMPANY_PROVINCE ? GROUND_COMPANY_PROVINCE : null; ?>) - <?php echo GROUND_COMPANY_COUNTRY ? GROUND_COMPANY_COUNTRY : null; ?> - P.IVA: <?php echo GROUND_COMPANY_PIVA ? GROUND_COMPANY_PIVA : null; ?> - C.F.: <?php echo GROUND_COMPANY_CF ? GROUND_COMPANY_CF : null; ?> </p>
		</div>
		<?php if ( GROUND_SOCIAL_LINKEDIN_URL || GROUND_SOCIAL_FACEBOOK_URL || GROUND_SOCIAL_INSTAGRAM_URL || GROUND_SOCIAL_YOUTUBE_URL ) : ?>
		<div class="lg:border-l border-gray-400">

			<div class="flex items-center lg:justify-center lg:space-x-6">

				<p class="lg:pl-6 pr-3"><?php _e( 'Seguici sui social network', 'ground' ); ?></p>

				<div class="flex space-x-3">
					<?php if ( GROUND_SOCIAL_LINKEDIN_URL ) : ?>
					<span class="inline-block">
						<a class="h-10 w-10 rounded-full text-white bg-blue-600 hover:text-white flex items-center" href="<?php echo GROUND_SOCIAL_LINKEDIN_URL; ?>">
							<?php ground_icon( 'linkedin', 'mx-auto' ); ?>
						</a>
					</span>
					<?php endif; ?>

					<?php if ( GROUND_SOCIAL_FACEBOOK_URL ) : ?>
					<span class="inline-block">
						<a class="h-10 w-10 rounded-full text-white bg-blue-500 hover:text-white flex items-center" href="<?php echo GROUND_SOCIAL_FACEBOOK_URL; ?>">
							<?php ground_icon( 'facebook', 'mx-auto' ); ?>
						</a>
					</span>
					<?php endif; ?>

					<?php if ( GROUND_SOCIAL_INSTAGRAM_URL ) : ?>
					<span class="inline-block">
						<a class="h-10 w-10 rounded-full text-white bg-pink-500 p-2 hover:text-white flex items-center" href="<?php echo GROUND_SOCIAL_INSTAGRAM_URL; ?>">
							<?php ground_icon( 'instagram', 'mx-auto' ); ?>
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
