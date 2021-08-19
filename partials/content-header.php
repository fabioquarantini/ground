<?php get_template_part( 'partials/meassage', 'alert' ); ?>

<header class="header header-simple w-full z-30 bg-white dark:bg-black">

	<div class="bg-white dark:bg-black h-16 w-full z-30 lg:hidden">
		<a class="js-back absolute mt-5 left-4 header__back cursor-pointer"> <span> <?php ground_icon( 'chevron-left', 'text-black dark:text-white' ); ?> </span> <?php _e( 'Indietro', 'ground' ); ?> </a>

		<div class="header__navicon container flex items-center justify-between py-2 bg-white dark:bg-black">
			<?php get_template_part( 'partials/navicon', 'primary' ); ?>

			<div class="inline-block header__logo">
				<?php get_template_part( 'partials/logo', 'primary' ); ?>
			</div>
			<div class="flex justify-end items-center">
				<button class="js-toggle js-cursor-hover hidden mr-12 lg:block" data-toggle-target=".search html" data-toggle-class-name="is-search-open">
					<?php ground_icon( 'search', 'icon--filled text-black dark:text-white' ); ?>
				</button>
				<?php if ( ! function_exists( 'is_woocommerce_activated' ) ) : ?>
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

	</div>

	<div class="js-menu-body header__body fixed left-0 pb-72 h-full w-screen z-40 bg-white dark:bg-black overflow-y-scroll lg:pt-0 lg:mt-0 lg:relative lg:top-auto lg:left-auto lg:bottom-auto lg:right-auto lg:bg-transparent lg:overflow-y-visible lg:w-full lg:pb-0">
		<div class="js-menu-container header__container relative">
			<div class="container hidden lg:relative lg:flex lg:justify-between lg:items-center lg:h-16 xl:justify-end xl:space-x-6">
				<?php if ( has_nav_menu( 'header-secondary' ) ) : ?>
				<div class="xl:border-r xl:border-gray-200 xl:pr-6">
					<?php get_template_part( 'partials/navigation', 'header-secondary' ); ?>
				</div>
				<?php endif; ?>
				<div class="pl-6 lg:items-center lg:space-x-6 lg:pl-0 lg:flex lg:justify-end xl:justify-start">
					<div class="hidden lg:inline-block ">
						<?php get_template_part( 'partials/company', 'info-contacts' ); ?>
					</div>

					<?php if ( ! function_exists( 'is_woocommerce_activated' ) ) : ?>
					<ul class=" relative z-0 lg:flex lg:items-center lg:space-x-5 lg:justify-end lg:m-0">
						<li class="text-lg lg:border-l lg:border-gray-200 lg:pl-6 lg:text-base"><a class="inline-block lg:py-auto" href="<?php echo get_permalink( wc_get_page_id( 'myaccount' ) ); ?>"><?php _e( 'Account', 'ground' ); ?><span class="hidden ml-2 lg:inline-block"><?php ground_icon( 'user', 'icon--filled text-black dark:text-white' ); ?></span></a></li>
						<li class="hidden minicart-wrapper py-4 lg:inline-block"><?php get_template_part( 'partials/woocommerce/shopping-cart' ); ?> </li>
					</ul>
					<?php endif; ?>
				</div>

			</div>

			<div class="flex flex-col-reverse lg:block">

				<div class="container lg:relative lg:flex lg:justify-between lg:items-center lg:h-16">

					<div class="hidden lg:inline-block mr-8">
						<?php get_template_part( 'partials/logo', 'primary' ); ?>
					</div>

					<div class="relative lg:flex lg:justify-end lg:items-center">

						<?php get_template_part( 'partials/navigation', 'header-primary' ); ?>

						<button class="hidden js-toggle lg:block" data-toggle-target="#js-search-form html" data-toggle-class-name="is-search-open">
							<?php ground_icon( 'search', 'icon--filled text-black dark:text-white' ); ?>
						</button>

						<div class="block lg:hidden">
							<?php get_template_part( 'partials/navigation', 'header-secondary' ); ?>
						</div>

						<div class="block lg:hidden">
							<?php get_template_part( 'partials/company', 'info-contacts' ); ?>
						</div>

					</div>
				</div>
			</div>

		</div>
	</div>

</header> <!-- End header -->


