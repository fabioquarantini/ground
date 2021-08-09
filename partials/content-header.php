<header class="header fixed top-0 shadow-lg w-full z-30 bg-white">

	<div class="fixed bg-white h-16 w-full top-0 block z-30 lg:hidden">
		<a class="js-back fixed top-4 left-4 header__back cursor-pointer"> <span> <?php ground_icon( 'chevron-left', 'text-black' ); ?> </span> <?php _e( 'Indietro', 'ground' ); ?> </a>

		<div class="container flex items-center justify-between py-2 bg-white">
			<div class="inline-block header__logo">
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

			<div class="flex justify-end">
				<button class="js-toggle js-cursor-hover header__search block mr-8" data-toggle-target=".search html" data-toggle-class-name="is-search-open">
					<?php ground_icon( 'search', 'text-black' ); ?>
				</button>

				<svg class="js-toggle js-navicon navicon h-12 w-12 cursor-pointer block" data-toggle-target="html" data-toggle-class-name="is-navigation-open" viewBox="0 0 100 100" width="80">
					<path class="navicon__line top" d="m 30,33 h 40 c 0,0 9.044436,-0.654587 9.044436,-8.508902 0,-7.854315 -8.024349,-11.958003 -14.89975,-10.85914 -6.875401,1.098863 -13.637059,4.171617 -13.637059,16.368042 v 40"></path>
					<path class="navicon__line middle" d="m 30,50 h 40"></path>
					<path class="navicon__line bottom" d="m 30,67 h 40 c 12.796276,0 15.357889,-11.717785 15.357889,-26.851538 0,-15.133752 -4.786586,-27.274118 -16.667516,-27.274118 -11.88093,0 -18.499247,6.994427 -18.435284,17.125656 l 0.252538,40"></path>
				</svg>
			</div>
		</div>
	</div>

	<div class="js-menu-body container header__body grid auto-rows-min fixed left-0 h-full w-full z-40 mt-16 bg-white overflow-y-auto lg:pt-0 lg:mt-0
 lg:relative lg:top-auto lg:left-auto lg:bottom-auto lg:right-auto lg:bg-transparent lg:overflow-y-visible">
		<div class="js-menu-container header__container relative">
			<div class="hidden lg:relative lg:flex lg:justify-between lg:items-center lg:h-16">
				<?php echo GROUND_HEADER_TEXT; ?>

				<ul class="block m-0 space-x-0 lg:space-x-5">
					<li class="hover:text-primary cursor-pointer js-toggle block text-lg py-4 border-b border-white border-opacity-20 lg:text-base lg:py-0 lg:border-0" data-toggle-target="#modal-languages" data-toggle-class-name="hidden"><span class="mr-2"><?php ground_icon( 'globe-alt', 'icon--filled' ); ?></span><?php _e( 'Language', 'ground' ); ?></li>
				</ul>
			</div>

			<div class="flex flex-col-reverse space-x-0 lg:block">

				<div class="lg:relative lg:flex lg:justify-between lg:items-center lg:h-16">
					<div class="lg:flex lg:items-center lg:justify-start lg:space-x-3">
						<div class="hidden lg:inline-block">
							<?php if ( GROUND_LOGO_URL_PRIMARY || GROUND_LOGO_SOURCE_PRIMARY ) { ?>
							<a class="js-cursor-hide" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>">
								<?php
								if ( GROUND_LOGO_TYPE_PRIMARY && GROUND_LOGO_SOURCE_PRIMARY ) {
									echo GROUND_LOGO_SOURCE_PRIMARY;
								} elseif ( GROUND_LOGO_URL_PRIMARY ) {
									?>
									<img class="w-20 h-auto" src="<?php echo esc_url( GROUND_LOGO_URL_PRIMARY['sizes']['medium'] ); ?>" alt="<?php echo esc_attr( GROUND_LOGO_URL_PRIMARY['alt'] ); ?>" />
								<?php } ?>
							</a> <!-- End logo -->
							<?php } else { ?>
								<a class="border border-dashed border-primary p-2" target="_blank" href="<?php echo admin_url( 'admin.php?page=theme-general-settings', 'http' ); ?>">Upload your logo</a>
							<?php } ?>
						</div>
						<?php get_template_part( 'partials/navigation', 'secondary' ); ?>


						<button class="js-toggle js-cursor-hover hidden mr-12 lg:display-block" data-toggle-target=".search html" data-toggle-class-name="is-search-open">
							<?php ground_icon( 'search', 'icon--filled' ); ?>
						</button> <!-- End .header__search -->
					</div>


					<ul class="flex items-center mt-6 justify-start space-x-5 lg:justify-end lg:m-0">
						<li class="text-lg py-4 border-r-2 border-gray-400 border-opacity-20 pr-6 lg:text-base"><a class="navigation__link"href="<?php echo get_permalink( wc_get_page_id( 'myaccount' ) ); ?>"><?php _e( 'Account', 'ground' ); ?><span class="ml-2"><?php ground_icon( 'user', 'icon--filled' ); ?></span></a></li>
						<li class="minicart-wrapper"><?php get_template_part( 'partials/woocommerce/minicart' ); ?> </li>
					</ul>
				</div>

				<?php if ( class_exists( 'WooCommerce' ) && ! is_checkout() ) : ?>
				<div class="lg:flex lg:items-center lg:justify-between lg:h-16">
					<div class="<?php echo GROUND_HEADER_ALL_PRODUCTS ? 'hidden lg:flex lg:justify-end lg:m-0 lg:space-x-5' : ''; ?>">
						<?php get_template_part( 'partials/navigation', 'primary' ); ?>
					</div>

					<?php if ( GROUND_HEADER_ALL_PRODUCTS ) { ?>
						<div class="lg:flex lg:justify-end lg:m-0 lg:space-x-5">
							<a class="hidden lg:inline-block hover:text-primary cursor-pointer js-toggle" data-toggle-target="#modal-languages" data-toggle-class-name="hidden"><span class="mr-2"><?php ground_icon( 'menu-left', 'icon--filled' ); ?></span><?php _e( 'All products', 'ground' ); ?></a>
							<?php get_template_part( 'partials/navigation', 'all-products' ); ?>
						</div>
					<?php } ?>
				</div>
				<?php endif; ?>

			</div>

		</div>
	</div>
</header> <!-- End header -->
