<?php
/**
 * The Template for displaying dropdown wishlist products.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/ti-wishlist-product-counter.php.
 *
 * @version           2.3.1
 * @package           TInvWishlist\Template
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
wp_enqueue_script( 'tinvwl' );

?>

<a class="cart1 mr-15" href="<?php echo esc_url( tinv_url_wishlist_default() ); ?>">
	<?php if ( $show_counter ) : ?>
    <span class="wishlist_products_counter_number cart-count badge"></span>
    <?php endif; ?>
    <i class="fal fa-heart"></i>
</a>