<?php
/**
 * Order Customer Details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details-customer.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 5.6.0
 */

defined( 'ABSPATH' ) || exit;

$show_shipping = ! wc_ship_to_billing_address_only() && $order->needs_shipping_address();

$allowhtml = array(
    'p'         => array(
        'class'     => array()
    ),
    'span'      => array(
        'class'     => array(),
    ),
    'a'         => array(
        'href'      => array(),
        'title'     => array()
    ),
    'br'        => array(),
    'em'        => array(),
    'strong'    => array(),
    'b'         => array(),
    'img'       => array(
        'class'     => array(),
        'alt'       => array(),
        'src'       => array(),
        'width'     => array(),
        'height'    => array(),
        'srcset'    => array(),
    ),
);
?>
<section class="woocommerce-customer-details">
    <section class="woocommerce-columns woocommerce-columns--2 woocommerce-columns--addresses col2-set addresses row">
        <?php if ( $show_shipping ) : ?>
            <div class="woocommerce-column woocommerce-column--1 woocommerce-column--billing-address col-sm-6">
        <?php else: ?>
            <div class="woocommerce-column woocommerce-column--1 woocommerce-column--billing-address col-12">
        <?php endif; ?>
            <h2 class="woocommerce-column__title"><?php esc_html_e( 'Billing address', 'agenxe' ); ?></h2>
            <address>
                <?php echo wp_kses( $order->get_formatted_billing_address( esc_html__( 'N/A', 'agenxe' ) ), $allowhtml ); ?>

                <?php if ( $order->get_billing_phone() ) : ?>
                    <p class="woocommerce-customer-details--phone"><?php echo esc_html( $order->get_billing_phone() ); ?></p>
                <?php endif; ?>

                <?php if ( $order->get_billing_email() ) : ?>
                    <p class="woocommerce-customer-details--email"><?php echo esc_html( $order->get_billing_email() ); ?></p>
                <?php endif; ?>
            </address>
        </div>

	<?php if ( $show_shipping ) : ?>

		<div class="woocommerce-column woocommerce-column--2 woocommerce-column--shipping-address col-sm-6">
			<h2 class="woocommerce-column__title"><?php esc_html_e( 'Shipping address', 'agenxe' ); ?></h2>
			<address>
				<?php echo wp_kses( $order->get_formatted_shipping_address( esc_html__( 'N/A', 'agenxe' ) ), $allowhtml ); ?>
			</address>
		</div><!-- /.col-2 -->

	<?php endif; ?>
    </section><!-- /.col2-set -->

	<?php do_action( 'woocommerce_order_details_after_customer_details', $order ); ?>

</section>
