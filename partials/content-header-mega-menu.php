<div class="container bg-black text-center text-white py-2 xl:hidden">
	<?php echo GROUND_HEADER_TEXT; ?>
</div>

<header class="header header-mega-menu w-full z-30 bg-white dark:bg-black">

	<div class="bg-white dark:bg-black h-16 w-full z-30 lg:hidden">
		<a class="js-back absolute mt-5 left-4 header__back cursor-pointer"> <span> <?php ground_icon( 'chevron-left', 'text-black dark:text-white' ); ?> </span> <?php _e( 'Indietro', 'ground' ); ?> </a>

		<div class="header__navicon container flex items-center justify-between py-2 bg-white dark:bg-black">
			<svg class="js-toggle js-navicon navicon h-12 w-12 -ml-4 cursor-pointer block" data-toggle-target="html" data-toggle-class-name="is-navigation-open" viewBox="0 0 100 100" width="80">
				<path class="navicon__line top" d="m 30,33 h 40 c 0,0 9.044436,-0.654587 9.044436,-8.508902 0,-7.854315 -8.024349,-11.958003 -14.89975,-10.85914 -6.875401,1.098863 -13.637059,4.171617 -13.637059,16.368042 v 40"></path>
				<path class="navicon__line middle" d="m 30,50 h 40"></path>
				<path class="navicon__line bottom" d="m 30,67 h 40 c 12.796276,0 15.357889,-11.717785 15.357889,-26.851538 0,-15.133752 -4.786586,-27.274118 -16.667516,-27.274118 -11.88093,0 -18.499247,6.994427 -18.435284,17.125656 l 0.252538,40"></path>
			</svg>

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

			<?php if ( class_exists( 'WooCommerce' ) && ! is_checkout() ) : ?>
				<?php
				$count = WC()->cart->get_cart_contents_count();
				$class = '';

				if ( $count === 0 ) {
					$class = 'is-empty ';
				} else {
					$class = 'is-full js-toggle';
				}
				?>

			<div class="header__cart relative lg:hidden">
				<a class="flex justify-start items-center" href="<?php echo wc_get_page_permalink( 'cart' ); ?>">
					<?php ground_icon( 'shopping-cart', 'minicart__icon text-black dark:text-white' ); ?>
					<div class="absolute -right-4 -top-2 bg-red-500 rounded-full w-6 h-6 flex items-center justify-center text-white font-bold">
						<?php echo WC()->cart->get_cart_contents_count(); ?>
					</div>
				</a>
			</div>
			<?php endif; ?>

		</div>
	</div>

	<div class="js-menu-body header__body grid auto-rows-min fixed left-0 h-full w-full z-40 bg-white dark:bg-black overflow-y-auto lg:pt-0 lg:mt-0
 lg:relative lg:top-auto lg:left-auto lg:bottom-auto lg:right-auto lg:bg-transparent lg:overflow-y-visible">
		<div class="js-menu-container header__container relative">
			<div class="container hidden lg:relative lg:flex lg:justify-between lg:items-center lg:h-16">
				<div class="hidden xl:flex">
					<?php echo GROUND_HEADER_TEXT; ?>
				</div>
				<ul class="block m-0 space-x-0 lg:space-x-5">
					<li class="js-toggle cursor-pointer text-lg lg:text-base lg:py-0" data-toggle-target="#modal-languages" data-toggle-class-name="hidden"><a><span class="mr-2"><?php ground_icon( 'globe-alt', 'icon--filled text-black dark:text-white' ); ?></span><?php _e( 'Language', 'ground' ); ?></a></li>
				</ul>
			</div>

			<div class="flex flex-col-reverse lg:block">

				<div class="container lg:relative lg:flex lg:justify-between lg:items-center lg:h-16">
					<div class="lg:flex lg:items-center lg:justify-start lg:space-x-3">
						<div class="hidden lg:inline-block mr-8">
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
						<div class="relative">
							<?php get_template_part( 'partials/search', 'form-input' ); ?>
						</div>
					</div>

					<?php if ( class_exists( 'WooCommerce' ) && ! is_checkout() ) : ?>
					<ul class="flex items-center mt-6 justify-start space-x-5 lg:justify-end lg:m-0">
						<li class="text-lg lg:text-base"><a class="navigation__link"href="<?php echo get_permalink( wc_get_page_id( 'myaccount' ) ); ?>"><?php _e( 'Account', 'ground' ); ?><span class="ml-2"><?php ground_icon( 'user', 'icon--filled text-black dark:text-white' ); ?></span></a></li>
						<li class="hidden minicart-wrapper lg:inline-block"><?php get_template_part( 'partials/woocommerce/minicart' ); ?> </li>
					</ul>
					<?php endif; ?>
				</div>


				<div class="container lg:relative lg:flex lg:items-center lg:justify-between lg:h-16">
					<div class="<?php echo GROUND_HEADER_ALL_PRODUCTS ? 'hidden lg:flex' : ''; ?>">
						<?php get_template_part( 'partials/navigation', 'primary' ); ?>
					</div>
					<?php if ( class_exists( 'WooCommerce' ) && ! is_checkout() ) : ?>
						<?php if ( GROUND_HEADER_ALL_PRODUCTS ) { ?>
							<div class="header__all-products">
								<a class="js-button-all-products js-toggle hidden cursor-pointer lg:flex lg:justify-end lg:items-center lg:text-lg" data-toggle-target="html" data-toggle-class-name="is-all-products-open">
									<div class="mr-2 flex justify-end items-center"> <?php ground_icon( 'menu-left', 'icon--filled text-black dark:text-white' ); ?></div>
									<div> <?php _e( 'All products', 'ground' ); ?></div>
								</a>
								<div class="hidden lg:flex">
									<?php get_template_part( 'partials/panel', 'all-products' ); ?>
								</div>
								<div class="lg:hidden">
									<?php get_template_part( 'partials/navigation', 'all-products' ); ?>
								</div>
							</div>
						<?php } ?>
					<?php endif; ?>
				</div>

			</div>

		</div>
	</div>

</header> <!-- End header -->






