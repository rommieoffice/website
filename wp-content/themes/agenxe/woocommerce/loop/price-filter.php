<?php
/**
 * Price filter widget
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/price-filter.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see      https://docs.woocommerce.com/document/template-structure/
 * @package  WooCommerce/Templates
 * @version  5.5.2
 */

defined( 'ABSPATH' ) || exit;

if ( ! isset( $min_price ) ) {
	$min_price = apply_filters( 'woocommerce_price_filter_widget_min_amount', $min_price );
}

if ( ! isset( $max_price ) ) {
	$max_price = apply_filters( 'woocommerce_price_filter_widget_max_amount', $max_price );
}

if ( ! isset( $step ) ) {
	$step = apply_filters( 'woocommerce_price_filter_widget_step', 10 );
}

global $wp;

$form_action = remove_query_arg( 'paged', add_query_arg( $wp->query_string, '', home_url( $wp->request ) ) );
?>


