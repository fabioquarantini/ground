<?php
/**
 * Email Addresses
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-addresses.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates\Emails
 * @version 3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$text_align = is_rtl() ? 'right' : 'left';
$address    = $order->get_formatted_billing_address();
$shipping   = $order->get_formatted_shipping_address();

?>

<?php if ( ! wc_ship_to_billing_address_only() && $order->needs_shipping_address() && $shipping ) : ?>
	<h2><?php esc_html_e( 'Shipping address', 'woocommerce' ); ?></h2>
	<address class="address"><?php echo wp_kses_post( $shipping ); ?></address>
	<br><br>

	<?php // this order meta checks if order is marked as a invoice
	$is_invoice = get_post_meta( $order->get_order_number(), '_billing_invoice', true );

	if( empty( $is_invoice ) )
		return;

	$invoice_customer_type = get_post_meta( $order->get_order_number(), '_billing_customer_type', true );
	$invoice_company = get_post_meta( $order->get_order_number(), '_billing_company', true );
	$invoice_vat = get_post_meta( $order->get_order_number(), '_billing_vat', true );
	$invoice_fiscal_code = get_post_meta( $order->get_order_number(), '_billing_fiscal_code', true );
	$invoice_pec = get_post_meta( $order->get_order_number(), '_billing_pec', true );
	$invoice_sdi = get_post_meta( $order->get_order_number(), '_billing_sdi', true ); ?>

	<h2>Dati fatturazione</h2>
	<address class="address">
		<?php echo '
			<strong>' . __( 'Tipologia cliente' , 'ground' ) . ':</strong> ' . $invoice_customer_type .' <br>
			<strong>' . __( 'Nome della società' , 'ground' ) . ':</strong> ' . $invoice_company .' <br>
			<strong>' . __( 'P.IVA' , 'ground' ) . ':</strong> ' . $invoice_vat .' <br>
			<strong>' . __( 'Codice fiscale' , 'ground' ) . ':</strong> ' . $invoice_fiscal_code .' <br>
			<strong>' . __( 'Pec' , 'ground' ) . ':</strong> ' . $invoice_pec .' <br>
			<strong>' . __( 'Codice destinatario (SDI)' , 'ground' ) . ':</strong> ' . $invoice_sdi;
		?>
	</address>
	<br><br>

<?php endif; ?>
