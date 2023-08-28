<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version  7.8.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' ); 
$allowhtml = array(
	'p'         => array(
		'class'     => array()
	),
	'span'      => array(
		'class'     => array(),
	),
	'a'         => array(
		'href'      => array(),
		'title'     => array(),
		'class'		=> array(),
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

<form class="woocommerce-cart-form cart-table table-responsive" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
	<?php do_action( 'woocommerce_before_cart_table' ); ?>

	<table class="shop_table cart_table shop_table_responsive responsive_table cart woocommerce-cart-form__contents table table-bordered" cellspacing="0">
		<thead>
			<tr>
				<th class="cart-col-image"><?php esc_html_e( 'Image', 'agenxe' ); ?></th>
				<th class="cart-col-productname"><?php esc_html_e( 'Product Name', 'agenxe' ); ?></th>
				<th class="cart-col-price"><?php esc_html_e( 'Price/Unit', 'agenxe' ); ?></th>
				<th class="cart-col-quantity"><?php esc_html_e( 'Quantity', 'agenxe' ); ?></th>
				<th class="cart-col-total"><?php esc_html_e( 'Total', 'agenxe' ); ?></th>
				<th class="cart-col-remove"><?php esc_html_e( 'Remove', 'agenxe' ); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php do_action( 'woocommerce_before_cart_contents' ); ?>

			<?php
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					?>
					<tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

						<td class="product-name" data-title="<?php esc_attr_e( 'Product', 'agenxe' ); ?>">
                            <?php
                                $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image( array('120','120') ), $cart_item, $cart_item_key );

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
						if ( $_product->is_sold_individually() ) {
							$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
						} else {
							$product_quantity = woocommerce_quantity_input(
								array(
									'input_name'   => "cart[{$cart_item_key}][qty]",
									'input_value'  => $cart_item['quantity'],
									'max_value'    => $_product->get_max_purchase_quantity(),
									'min_value'    => '0',
									'product_name' => $_product->get_name(),
								),
								$_product,
								false
							);
						}

						echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
						?>
						</td>

						<td class="product-subtotal" data-title="<?php esc_attr_e( 'Total', 'agenxe' ); ?>">
							<?php
                                echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
							?>
						</td>
						<td class="mini_cart_item" data-title="<?php esc_attr_e( 'Remove', 'agenxe' ); ?>">
							<?php
								// remove button
								echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
									'woocommerce_cart_item_remove_link',
									sprintf(
										'<a href="%s" class="remove ml-3" aria-label="%s" data-product_id="%s" data-product_sku="%s" data-cart_item_key="%s"><i class="fal fa-trash-alt"></i></a>',
										esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
										esc_html__( 'Remove this item', 'agenxe' ),
										esc_attr( $product_id ),
										esc_attr( $_product->get_sku() ),
										esc_attr( $cart_item_key )
									),
									$cart_item_key
								);
							?>
	                    </td>
					</tr>
					<?php
				}
			}
			?>

			<?php do_action( 'woocommerce_cart_contents' ); ?>

			<tr>
				<td colspan="6" class="actions">
                    <?php if ( wc_coupons_enabled() ) { ?>
                        <div class="th-cart-coupon">
                            <input type="text" name="coupon_code" class="form-control" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Enter Coupon Code', 'agenxe' ); ?>" />
                            <button type="submit" class="th-btn" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'agenxe' ); ?>"><?php esc_attr_e( 'Submit', 'agenxe' ); ?></button>
                            <?php do_action( 'woocommerce_cart_coupon' ); ?>
                        </div>
                    <?php } ?>
					<?php
						$agenxe_shop_page_url = get_permalink( wc_get_page_id( 'shop' ) );
					?>
					<button type="submit" class="th-btn" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'agenxe' ); ?>"><?php esc_html_e( ' Update cart', 'agenxe' ); ?></button>
					<a href="<?php echo esc_url( $agenxe_shop_page_url ); ?>" class="th-btn"><?php esc_html_e('Continue Shopping','agenxe'); ?></a>
                    

                    <?php do_action( 'woocommerce_cart_actions' ); ?>

                    <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>


                </td>
			</tr>

			<?php do_action( 'woocommerce_after_cart_contents' ); ?>
		</tbody>
	</table>
	<?php do_action( 'woocommerce_after_cart_table' ); ?>
</form>

<?php do_action( 'woocommerce_before_cart_collaterals' ); ?>

<?php
	/**
	 * Cart collaterals hook.
	 *
	 * @hooked woocommerce_cross_sell_display
	 * @hooked woocommerce_cart_totals - 10
	 */
	do_action( 'woocommerce_cart_collaterals' );
?>

<?php do_action( 'woocommerce_after_cart' ); ?>