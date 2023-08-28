<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

echo '<div class="food-list-box">';
    echo '<div class="food-list-top d-sm-flex justify-content-between">';
        if( get_the_title() ){
            echo '<h3 class="food-list-title h4 mb-0"><a href="'.esc_url( get_the_permalink() ).'">'.esc_html( get_the_title() ).'</a></h3>';
        }
        if( $product->get_type() == 'simple' ) {
            $rprice = $product->get_price_html();
            echo '<span class="food-price text-md text-theme">'.$rprice.'</span>';
        }
    echo '</div>';
    if( ! empty( agenxe_meta( 'product_extra_info' ) ) ){
        echo '<p class="food-text text-xs mb-0">'.esc_html( agenxe_meta( 'product_extra_info' ) ).'</p>';
    }
echo '</div>';