<?php
/**
 * Product quantity inputs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/quantity-input.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 7.8.0
 */

defined( 'ABSPATH' ) || exit;

if ( $max_value && $min_value === $max_value ) {
    ?>
    <div class="quantity hidden">
        <input type="hidden" id="<?php echo esc_attr( $input_id ); ?>" class="qty" name="<?php echo esc_attr( $input_name ); ?>" value="<?php echo esc_attr( $min_value ); ?>" />
    </div>
    <?php
} else {
    /* translators: %s: Quantity. */
    $label = ! empty( $args['product_name'] ) ? sprintf( esc_html__( '%s quantity', 'agenxe' ), wp_strip_all_tags( $args['product_name'] ) ) : esc_html__( 'Quantity', 'agenxe' );
    ?>
        <?php do_action( 'woocommerce_before_quantity_input_field' ); ?>
        <label class="screen-reader-text" for="<?php echo esc_attr( $input_id ); ?>"><?php echo esc_attr( $label ); ?></label>
            <button class="quantity-minus qty-btn qut-btn">
                <?php if(is_cart()): ?>
                    <i class="far fa-minus"></i>
                <?php else: ?>
                    <i class="far fa-chevron-down"></i>
                <?php endif; ?>
            </button>
            <input
                type="number"
                id="<?php echo esc_attr( $input_id ); ?>"
                class="<?php echo esc_attr( 'qty-input' ); ?>"
                step="<?php echo esc_attr( $step ); ?>"
                min="<?php echo esc_attr( $min_value ); ?>"
                max="<?php echo esc_attr( 0 < $max_value ? $max_value : '' ); ?>"
                name="<?php echo esc_attr( $input_name ); ?>"
                value="<?php echo esc_attr( $input_value ); ?>"
                title="<?php echo esc_attr_x( 'Qty', 'Product quantity input tooltip', 'agenxe' ); ?>"
                size="4"
                inputmode="<?php echo esc_attr( $inputmode ); ?>" />
            
            <button class="quantity-plus qty-btn qut-btn">
                <?php if(is_cart()): ?>
                    <i class="far fa-plus"></i>
                <?php else: ?>
                    <i class="far fa-chevron-up"></i>
                <?php endif; ?>
            </button>
        <?php do_action( 'woocommerce_after_quantity_input_field' ); ?>
    <?php
}