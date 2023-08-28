<?php
/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.2.0
 */

defined( 'ABSPATH' ) || exit;

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
	'img'		=> array(
		'class'		=> array(),
		'alt'		=> array(),
		'src'		=> array(),
		'width'		=> array(),
		'height'	=> array(),
		'srcset'	=> array(),
	),
);

?>
<table class="shop_table woocommerce-checkout-review-order-table cart_table mb-20">
	<thead>
		<tr>
			<th class="cart-col-image"><?php esc_html_e( 'Image', 'agenxe' ); ?></th>
			<th class="cart-col-productname"><?php esc_html_e( 'Product Name', 'agenxe' ); ?></th>
			<th class="cart-col-price"><?php esc_html_e( 'Price', 'agenxe' ); ?></th>
			<th class="cart-col-quantity"><?php esc_html_e( 'Quantity', 'agenxe' ); ?></th>
			<th class="cart-col-total"><?php esc_html_e( 'Total', 'agenxe' ); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php
		do_action( 'woocommerce_review_order_before_cart_contents' );

		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				?>
				<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
					<td class="product-name" data-title="<?php esc_attr_e( 'Product', 'agenxe' ); ?>">
						<?php
							$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image( array('95','95') ), $cart_item, $cart_item_key );
							$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
							if ( ! $product_permalink ) {
								echo wp_kses( $thumbnail, $allowhtml ); // PHPCS: XSS ok.
							} else {
								printf( '<a class="cart-productimage" href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
							}

							do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

							// Meta data.
							echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

							// Backorder notification.
							if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
								echo wp_kses( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'agenxe' ) . '</p>', $product_id ), $allowhtml );
							}
						?>
					</td>
					<td data-title="<?php esc_attr_e( 'Name', 'agenxe' ); ?>">
						<?php
							if ( ! $product_permalink ) {
								echo wp_kses( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;', $allowhtml );
							} else {
								echo wp_kses( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a class="cart-productname" href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ), $allowhtml );
							}
						?>
					</td>
					<td class="product-price" data-title="<?php esc_attr_e( 'Price', 'agenxe' ); ?>">
						<?php
							echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
						?>
					</td>

					<td class="product-quantity" data-title="<?php esc_attr_e( 'Quantity', 'agenxe' ); ?>">
					<?php
						echo '<strong class="product-quantity">'.esc_html( $cart_item['quantity'] ).'</strong>';
					?>
					</td>

					<td class="product-subtotal" data-title="<?php esc_attr_e( 'Total', 'agenxe' ); ?>">
						<?php
							echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
						?>
					</td>
				</tr>
				
				<?php
			}
		}

		do_action( 'woocommerce_review_order_after_cart_contents' );
		?>
	</tbody>
	<tfoot class="checkout-ordertable">
		<tr class="cart-subtotal">
			<th><?php esc_html_e( 'Subtotal', 'agenxe' ); ?></th>
			<td data-title="<?php echo esc_attr__( 'Subtotal', 'agenxe' );?>" colspan="6"><?php wc_cart_totals_subtotal_html(); ?></td>
		</tr>
		<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
			<tr class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
				<th><?php wc_cart_totals_coupon_label( $coupon ); ?></th>
				<td colspan="6"><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
			</tr>
		<?php endforeach; ?>
		
		<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>
			
			<?php do_action( 'woocommerce_review_order_before_shipping' ); ?>
			
			<?php wc_cart_totals_shipping_html(); ?>
			
			<?php do_action( 'woocommerce_review_order_after_shipping' ); ?>
			
		<?php endif; ?>

		<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
			<tr class="fee">
				<th><?php echo esc_html( $fee->name ); ?></th>
				<td colspan="6"><?php wc_cart_totals_fee_html( $fee ); ?></td>
			</tr>
		<?php endforeach; ?>

		<?php if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) : ?>
			<?php if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
				<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited ?>
					<tr class="tax-rate tax-rate-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
						<th><?php echo esc_html( $tax->label ); ?></th>
						<td colspan="6"><?php echo wp_kses( $tax->formatted_amount, $allowhtml ); ?></td>
					</tr>
				<?php endforeach; ?>
			<?php else : ?>
				<tr class="tax-total">
					<th><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></th>
					<td colspan="6"><?php wc_cart_totals_taxes_total_html(); ?></td>
				</tr>
			<?php endif; ?>
		<?php endif; ?>

		<?php do_action( 'woocommerce_review_order_before_order_total' ); ?>

		<tr class="order-total">
			<th><?php esc_html_e( 'Total', 'agenxe' ); ?></th>
			<td data-title="<?php echo esc_attr__( 'Total', 'agenxe' );?>" colspan="6"><?php wc_cart_totals_order_total_html(); ?></td>
		</tr>

		<?php do_action( 'woocommerce_review_order_after_order_total' ); ?>
	</tfoot>
</table>