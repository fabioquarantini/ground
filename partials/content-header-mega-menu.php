<div class="xl:hidden">
	<?php get_template_part( 'partials/message', 'alert' ); ?>
</div>



<header class="header header-mega-menu w-full z-30 bg-white dark:bg-black">

	<div class="bg-white dark:bg-black h-16 w-full z-30 lg:hidden">
		<a class="js-back absolute mt-5 left-4 header__back cursor-pointer"> <span> <?php ground_icon( 'chevron-left', 'text-black dark:text-white' ); ?> </span> <?php _e( 'Indietro', 'ground' ); ?> </a>

		<div class="header__bar-mobile container py-2 bg-white dark:bg-black grid grid-cols-12 items-center lg:flex lg:items-center lg:justify-between">
			<div class="col-span-4">
				<?php get_template_part( 'partials/navicon', 'primary' ); ?>
			</div>
			<div class="col-span-4 flex justify-center header__logo">
				<?php get_template_part( 'partials/logo', 'primary' ); ?>
			</div>
			<div class="header__cart relative py-4 col-span-4 flex justify-end items-center lg:hidden">
				<?php get_template_part( 'partials/woocommerce/shopping-cart' ); ?>
			</div>
		</div>

	</div>

	<div class="js-menu-body header__body fixed left-0 pb-72 h-full w-screen z-40 bg-white dark:bg-black overflow-y-scroll lg:pt-0 lg:mt-0 lg:relative lg:top-auto lg:left-auto lg:bottom-auto lg:right-auto lg:bg-transparent lg:overflow-y-visible lg:w-full lg:pb-0">
		<div class="js-menu-container header__container relative">
			<div class="container hidden lg:relative lg:flex lg:justify-between lg:items-center lg:h-16">
				<div class="hidden xl:flex">
					<?php echo GROUND_HEADER_TEXT; ?>
				</div>
				<div class="hidden lg:inline-block">
					<?php get_template_part( 'partials/company', 'info-contacts' ); ?>
				</div>
			</div>

			<div class="flex flex-col-reverse lg:block">

				<div class="container lg:relative lg:flex lg:justify-between lg:items-center lg:h-16">
					<div class="relative z-1 lg:flex lg:items-center lg:justify-start lg:space-x-3">
						<div class="hidden lg:inline-block mr-8">
							<?php get_template_part( 'partials/logo', 'primary' ); ?>
						</div>

						<?php get_template_part( 'partials/navigation', 'header-secondary' ); ?>
						<div id="js-search-desktop" class="relative">
							<?php get_template_part( 'partials/search', 'form-input' ); ?>
						</div>
					</div>

					<ul class="relative z-0 border-b border-gray-200 lg:border-none lg:flex lg:items-center lg:space-x-5 lg:justify-end lg:m-0">
						<li class="text-lg lg:text-base"><a class="inline-block py-4 lg:py-auto" href="<?php echo get_permalink( wc_get_page_id( 'myaccount' ) ); ?>"><?php _e( 'Account', 'ground' ); ?><span class="hidden ml-2 lg:inline-block"><?php ground_icon( 'user', 'icon--filled text-black dark:text-white' ); ?></span></a></li>
						<li class="hidden minicart-wrapper lg:inline-block"><?php get_template_part( 'partials/woocommerce/shopping-cart' ); ?> </li>
					</ul>

					<div class="block lg:hidden">
						<?php get_template_part( 'partials/company', 'info-contacts' ); ?>
					</div>
				</div>



				<div class="container lg:relative lg:flex lg:items-center lg:justify-between lg:h-16">
					<div class="<?php echo has_nav_menu( 'panel-primary' ) ? 'hidden lg:flex' : ''; ?>">
						<?php get_template_part( 'partials/navigation', 'header-primary' ); ?>
					</div>

					<?php if ( has_nav_menu( 'panel-primary' ) ) { ?>
						<div class="header__panel">
							<a class="js-toggle hidden cursor-pointer lg:flex lg:justify-end lg:items-center lg:text-lg" data-toggle-target="#panel-primary html" data-toggle-class-name="is-overlay-panel-open">
								<div class="mr-2 flex justify-end items-center"> <?php ground_icon( 'menu-left', 'icon--filled text-black dark:text-white' ); ?></div>
								<div> <?php _e( 'All products', 'ground' ); ?></div>
							</a>
							<div class="hidden lg:flex">
								<?php get_template_part( 'partials/panel', 'primary' ); ?>
							</div>
							<div class="lg:hidden">
								<?php get_template_part( 'partials/navigation', 'panel-primary' ); ?>
							</div>
						</div>
					<?php } ?>
				</div>

			</div>

		</div>
	</div>

</header> <!-- End header -->

<div id="js-search-mobile" class="pt-3 h-16 bg-white lg:hidden" ></div>

