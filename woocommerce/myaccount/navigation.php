<?php

/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if (!defined('ABSPATH')) {
	exit;
}

do_action('woocommerce_before_account_navigation');
?>

<div class="lg:flex">

	<div class="w-full lg:w-3/12">

		<nav class="navigation navigation--account woocommerce-MyAccount-navigation">
			<ul class="navigation__list">
				<?php foreach (wc_get_account_menu_items() as $endpoint => $label) : ?>
					<li class="navigation__item navigation__item--<?php echo $endpoint; ?> <?php echo wc_get_account_menu_item_classes($endpoint); ?>">
						<a class="navigation__link" href="<?php echo esc_url(wc_get_account_endpoint_url($endpoint)); ?>"><?php echo esc_html($label); ?></a>
					</li>
				<?php endforeach; ?>
			</ul>
		</nav> <!-- End .navigation -->

	</div>

	<?php // .row is closed in myaccount/my-account.php 
	?>

	<?php do_action('woocommerce_after_account_navigation'); ?>