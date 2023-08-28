<?php
// Block direct access
if( !defined( 'ABSPATH' ) ){
    exit();
}
/**
 * @Packge     : Agenxe
 * @Version    : 1.0
 * @Author     : Themeholy
 * @Author URI : https://themeforest.net/user/themeholy
 *
 */

// Woocommerce Product Per Page

add_filter( 'loop_shop_per_page', 'agenxe_new_loop_shop_per_page', 20 );

function agenxe_new_loop_shop_per_page( $product_count ) {

    if( class_exists('ReduxFramework') ) { 

        $product_count = agenxe_opt( 'agenxe_woo_product_perpage' );

    }else{

        $product_count = 12;

    }

  return $product_count;

}



 // removing woocommerce default styles hook

add_filter( 'woocommerce_enqueue_styles', '__return_false' );



// removing woocommerce page title hook

add_filter('woocommerce_show_page_title','__return_false');



// wooocommerce product loop start filter

add_filter('woocommerce_product_loop_start','agenxe_woocommerce_product_loop_start');

function agenxe_woocommerce_product_loop_start( ) {

    echo '<div class="row">';

}



// wooocommerce product loop start filter

add_filter('woocommerce_product_loop_end','agenxe_woocommerce_product_loop_end');

function agenxe_woocommerce_product_loop_end( ) {

    echo '</div>';

}



// woocommerce format sale price

add_filter('woocommerce_format_sale_price','agenxe_woocommerce_format_sale_price',10,3);

function agenxe_woocommerce_format_sale_price( $price, $regular_price, $sale_price ) {

    $price = ' <ins>' . ( is_numeric( $sale_price ) ? wc_price( $sale_price ) : $sale_price ) . '</ins> <del>' . ( is_numeric( $regular_price ) ? wc_price( $regular_price ) : $regular_price ) . '</del>';

    return $price;

}



// woocommerce gravatar size

add_filter('woocommerce_review_gravatar_size','agenxe_woocommerce_review_gravatar_size');

function agenxe_woocommerce_review_gravatar_size() {

    return 65;

}





// product description heading remove

add_filter('woocommerce_product_description_heading','__return_false');



// product additional information remove

add_filter('woocommerce_product_additional_information_heading','__return_false');



// single product review title remove

add_filter('woocommerce_reviews_title','__return_false');



// woocommerce related product number

add_filter('woocommerce_output_related_products_args','agenxe_woocommerce_output_related_products_args',10,1);

function agenxe_woocommerce_output_related_products_args( $args ) {

    if( class_exists('ReduxFramework') ) {

        $args['posts_per_page'] = agenxe_opt('agenxe_woo_relproduct_num');

    } else {

        $args['posts_per_page'] = '3';

    }



    return $args;

}



// woocommerce upsell product number

add_filter('woocommerce_upsell_display_args','agenxe_woocommerce_upsell_display_args',10,1);

function agenxe_woocommerce_upsell_display_args( $args ) {

    if( class_exists('ReduxFramework') ) {

        $args['posts_per_page'] = agenxe_opt('agenxe_woo_upsellproduct_num');

    } else {

        $args['posts_per_page'] = '3';

    }

    return $args;

}



add_filter('woocommerce_ship_to_different_address_checked', '__return_true', 999);



// woocommerce cross sell product number

add_filter('woocommerce_cross_sells_total','woocommerce_cross_sells_total',10,1);

function woocommerce_cross_sells_total( $limit ) {

    if( class_exists('ReduxFramework') ) {

        $limit = agenxe_opt('agenxe_woo_crosssellproduct_num');

    } else {

        $limit = '3';

    }



    return $limit;

}



// Ajax Cart Count

add_filter( 'woocommerce_add_to_cart_fragments', 'agenxe_refresh_mini_cart_count');

function agenxe_refresh_mini_cart_count($fragments){

    ob_start();

    ?>

    <span class="badge cart-count"><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?></span>

    <?php

        $fragments['.cart-count'] = ob_get_clean();

    return $fragments;

}



// Checkout fields

add_filter( 'woocommerce_checkout_fields' , 'agenxe_override_checkout_fields' );

function agenxe_override_checkout_fields( $fields  ){

    unset($fields['billing']['billing_first_name']['label']);

    unset($fields['billing']['billing_last_name']['label']);

    unset($fields['billing']['billing_company']['label']);

    unset($fields['billing']['billing_phone']['label']);

    unset($fields['billing']['billing_email']['label']);

    unset($fields['billing']['billing_country']['label']);

    unset($fields['billing']['billing_state']['label']);

    unset($fields['billing']['billing_address_1']['label']);

    unset($fields['billing']['billing_city']['label']);

    unset($fields['billing']['billing_postcode']['label']);



    unset($fields['shipping']['shipping_first_name']['label']);

    unset($fields['shipping']['shipping_last_name']['label']);

    unset($fields['shipping']['shipping_company']['label']);

    unset($fields['shipping']['shipping_phone']['label']);

    unset($fields['shipping']['shipping_email']['label']);

    unset($fields['shipping']['shipping_country']['label']);

    unset($fields['shipping']['shipping_state']['label']);

    unset($fields['shipping']['shipping_address_1']['label']);

    unset($fields['shipping']['shipping_city']['label']);

    unset($fields['shipping']['shipping_postcode']['label']);





    $fields['billing']['billing_first_name']['class'] = array('col-lg-6');

    $fields['billing']['billing_first_name']['input_class'] = array('form-control');

    $fields['billing']['billing_first_name']['placeholder'] = esc_attr__('First Name', 'agenxe');

    $fields['billing']['billing_first_name']['priority'] = 1;



    $fields['billing']['billing_last_name']['class'] = array('col-lg-6');

    $fields['billing']['billing_last_name']['input_class'] = array('form-control');

    $fields['billing']['billing_last_name']['placeholder'] = esc_attr__('Last Name', 'agenxe');

    $fields['billing']['billing_last_name']['priority'] = 2;



    $fields['billing']['billing_company']['class'] = array('col-12');

    $fields['billing']['billing_company']['input_class'] = array('form-control');

    $fields['billing']['billing_company']['placeholder'] = esc_attr__('Company name (optional)', 'agenxe');

    $fields['billing']['billing_company']['priority'] = 3;



    $fields['billing']['billing_phone']['class'] = array('col-12');

    $fields['billing']['billing_phone']['input_class'] = array('form-control');

    $fields['billing']['billing_phone']['placeholder'] = esc_attr__('Phone', 'agenxe');

    $fields['billing']['billing_phone']['priority'] = 4;



    $fields['billing']['billing_email']['class'] = array('col-12');

    $fields['billing']['billing_email']['input_class'] = array('form-control');

    $fields['billing']['billing_email']['placeholder'] = esc_attr__('Email address', 'agenxe');

    $fields['billing']['billing_email']['priority'] = 5;



    $fields['billing']['billing_country']['class'] = array('col-lg-12');

    $fields['billing']['billing_country']['input_class'] = array('form-control');

    $fields['billing']['billing_country']['priority'] = 6;



    $fields['billing']['billing_state']['class'] = array('col-lg-12');

    $fields['billing']['billing_state']['input_class'] = array('form-control');

    $fields['billing']['billing_state']['priority'] = 7;



    $fields['billing']['billing_address_1']['class'] = array('col-12');

    $fields['billing']['billing_address_1']['input_class'] = array('form-control');

    $fields['billing']['billing_address_1']['priority'] = 8;



    $fields['billing']['billing_address_2']['class'] = array('col-12');

    $fields['billing']['billing_address_2']['input_class'] = array('form-control');

    $fields['billing']['billing_address_2']['priority'] = 9;



    $fields['billing']['billing_city']['class'] = array('col-lg-12');

    $fields['billing']['billing_city']['input_class'] = array('form-control');

    $fields['billing']['billing_city']['placeholder'] = esc_attr__('Town / City', 'agenxe');

    $fields['billing']['billing_city']['priority'] = 10;



    $fields['billing']['billing_postcode']['class'] = array('col-lg-12');

    $fields['billing']['billing_postcode']['input_class'] = array('form-control');

    $fields['billing']['billing_postcode']['placeholder'] = esc_attr__('Postcode', 'agenxe');

    $fields['billing']['billing_postcode']['priority'] = 11;



    $fields['shipping']['shipping_first_name']['class'] = array('col-lg-6');

    $fields['shipping']['shipping_first_name']['input_class'] = array('form-control');

    $fields['shipping']['shipping_first_name']['placeholder'] = esc_attr__('First Name', 'agenxe');

    $fields['shipping']['shipping_first_name']['priority'] = 1;



    $fields['shipping']['shipping_last_name']['class'] = array('col-lg-6');

    $fields['shipping']['shipping_last_name']['input_class'] = array('form-control');

    $fields['shipping']['shipping_last_name']['placeholder'] = esc_attr__('Last Name', 'agenxe');

    $fields['shipping']['shipping_last_name']['priority'] = 2;



    $fields['shipping']['shipping_company']['class'] = array('col-12');

    $fields['shipping']['shipping_company']['input_class'] = array('form-control');

    $fields['shipping']['shipping_company']['placeholder'] = esc_attr__('Company name (optional)', 'agenxe');

    $fields['shipping']['shipping_company']['priority'] = 3;



    $fields['shipping']['shipping_phone']['class'] = array('col-12');

    $fields['shipping']['shipping_phone']['input_class'] = array('form-control');

    $fields['shipping']['shipping_phone']['placeholder'] = esc_attr__('Phone', 'agenxe');

    $fields['shipping']['shipping_phone']['priority'] = 4;



    $fields['shipping']['shipping_email']['class'] = array('col-12');

    $fields['shipping']['shipping_email']['input_class'] = array('form-control');

    $fields['shipping']['shipping_email']['placeholder'] = esc_attr__('Email address', 'agenxe');

    $fields['shipping']['shipping_email']['priority'] = 5;



    $fields['shipping']['shipping_country']['class'] = array('col-lg-12');

    $fields['shipping']['shipping_country']['input_class'] = array('form-control');

    $fields['shipping']['shipping_country']['priority'] = 6;



    $fields['shipping']['shipping_state']['class'] = array('col-lg-12');

    $fields['shipping']['shipping_state']['input_class'] = array('form-control');

    $fields['shipping']['shipping_state']['priority'] = 7;



    $fields['shipping']['shipping_address_1']['class'] = array('col-12');

    $fields['shipping']['shipping_address_1']['input_class'] = array('form-control');

    $fields['shipping']['shipping_address_1']['priority'] = 8;



    $fields['shipping']['shipping_address_2']['class'] = array('col-12');

    $fields['shipping']['shipping_address_2']['input_class'] = array('form-control');

    $fields['shipping']['shipping_address_2']['priority'] = 9;



    $fields['shipping']['shipping_city']['class'] = array('col-lg-12');

    $fields['shipping']['shipping_city']['input_class'] = array('form-control');

    $fields['shipping']['shipping_city']['placeholder'] = esc_attr__('Town / City', 'agenxe');

    $fields['shipping']['shipping_city']['priority'] = 10;



    $fields['shipping']['shipping_postcode']['class'] = array('col-lg-12');

    $fields['shipping']['shipping_postcode']['input_class'] = array('form-control');

    $fields['shipping']['shipping_postcode']['placeholder'] = esc_attr__('Postcode', 'agenxe');

    $fields['shipping']['shipping_postcode']['priority'] = 11;



    $fields['order']['order_comments']['input_class']  = array('form-control');



    return $fields;

}



add_filter( 'woocommerce_default_address_fields', 'agenxe_override_default_locale_fields' );

function agenxe_override_default_locale_fields( $fields ) {

    $fields['state']['priority'] = 7;

    $fields['address_1']['priority'] = 8;

    $fields['address_2']['priority'] = 9;

    return $fields;

}



add_filter( 'woocommerce_billing_fields' , 'agenxe_custom_billing_fields' );

function agenxe_custom_billing_fields( $fields ) {



    // Billing Fields

    unset($fields['billing_city']['label']);

    unset($fields['billing_postcode']['label']);



    $fields['billing_first_name']['class'] = array('col-lg-6');

    $fields['billing_first_name']['input_class'] = array('form-control');

    $fields['billing_first_name']['placeholder'] = esc_attr__('First Name', 'agenxe');

    $fields['billing_first_name']['priority'] = 1;

    $fields['billing_first_name']['label_class'] = array('d-none');



    $fields['billing_last_name']['class'] = array('col-lg-6');

    $fields['billing_last_name']['input_class'] = array('form-control');

    $fields['billing_last_name']['placeholder'] = esc_attr__('Last Name', 'agenxe');

    $fields['billing_last_name']['priority'] = 2;

    $fields['billing_last_name']['label_class'] = array('d-none');



    $fields['billing_company']['class'] = array('col-12');

    $fields['billing_company']['input_class'] = array('form-control');

    $fields['billing_company']['placeholder'] = esc_attr__('Company name (optional)', 'agenxe');

    $fields['billing_company']['priority'] = 3;

    $fields['billing_company']['label_class'] = array('d-none');



    $fields['billing_phone']['class'] = array('col-12');

    $fields['billing_phone']['input_class'] = array('form-control');

    $fields['billing_phone']['placeholder'] = esc_attr__('Phone', 'agenxe');

    $fields['billing_phone']['priority'] = 4;

    $fields['billing_phone']['label_class'] = array('d-none');



    $fields['billing_email']['class'] = array('col-12');

    $fields['billing_email']['input_class'] = array('form-control');

    $fields['billing_email']['placeholder'] = esc_attr__('Email address', 'agenxe');

    $fields['billing_email']['priority'] = 5;

    $fields['billing_email']['label_class'] = array('d-none');



    $fields['billing_country']['class'] = array('col-lg-6');

    $fields['billing_country']['input_class'] = array('form-control');

    $fields['billing_country']['priority'] = 6;

    $fields['billing_country']['label_class'] = array('d-none');



    $fields['billing_state']['class'] = array('col-lg-6');

    $fields['billing_state']['input_class'] = array('form-control');

    $fields['billing_state']['priority'] = 7;

    $fields['billing_state']['label_class'] = array('d-none');



    $fields['billing_address_1']['class'] = array('col-12');

    $fields['billing_address_1']['input_class'] = array('form-control');

    $fields['billing_address_1']['priority'] = 8;

    $fields['billing_address_1']['label_class'] = array('d-none');



    $fields['billing_address_2']['class'] = array('col-12');

    $fields['billing_address_2']['input_class'] = array('form-control');

    $fields['billing_address_2']['priority'] = 9;



    $fields['billing_city']['class'] = array('col-lg-6');

    $fields['billing_city']['input_class'] = array('form-control');

    $fields['billing_city']['placeholder'] = esc_attr__('Town / City', 'agenxe');

    $fields['billing_city']['priority'] = 10;

    $fields['billing_city']['label_class'] = array('d-none');



    $fields['billing_postcode']['class'] = array('col-lg-6');

    $fields['billing_postcode']['input_class'] = array('form-control');

    $fields['billing_postcode']['placeholder'] = esc_attr__('Postcode', 'agenxe');

    $fields['billing_postcode']['priority'] = 11;

    $fields['billing_postcode']['label_class'] = array('d-none');



    return $fields;

}



add_filter( 'woocommerce_shipping_fields' , 'agenxe_custom_shipping_fields' );

function agenxe_custom_shipping_fields( $fields ) {



    // Shipping Fields



    $fields['shipping_first_name']['class'] = array('col-lg-6');

    $fields['shipping_first_name']['input_class'] = array('form-control');

    $fields['shipping_first_name']['placeholder'] = esc_attr__('First Name', 'agenxe');

    $fields['shipping_first_name']['priority'] = 1;

    $fields['shipping_first_name']['label_class'] = array('d-none');



    $fields['shipping_last_name']['class'] = array('col-lg-6');

    $fields['shipping_last_name']['input_class'] = array('form-control');

    $fields['shipping_last_name']['placeholder'] = esc_attr__('Last Name', 'agenxe');

    $fields['shipping_last_name']['priority'] = 2;

    $fields['shipping_last_name']['label_class'] = array('d-none');



    $fields['shipping_company']['class'] = array('col-12');

    $fields['shipping_company']['input_class'] = array('form-control');

    $fields['shipping_company']['placeholder'] = esc_attr__('Company name (optional)', 'agenxe');

    $fields['shipping_company']['priority'] = 3;

    $fields['shipping_company']['label_class'] = array('d-none');



    $fields['shipping_phone']['class'] = array('col-12');

    $fields['shipping_phone']['input_class'] = array('form-control');

    $fields['shipping_phone']['placeholder'] = esc_attr__('Phone', 'agenxe');

    $fields['shipping_phone']['priority'] = 4;

    $fields['shipping_phone']['label_class'] = array('d-none');



    $fields['shipping_email']['class'] = array('col-12');

    $fields['shipping_email']['input_class'] = array('form-control');

    $fields['shipping_email']['placeholder'] = esc_attr__('Email address', 'agenxe');

    $fields['shipping_email']['priority'] = 5;

    $fields['shipping_email']['label_class'] = array('d-none');



    $fields['shipping_country']['class'] = array('col-lg-6');

    $fields['shipping_country']['input_class'] = array('form-control');

    $fields['shipping_country']['priority'] = 6;

    $fields['shipping_country']['label_class'] = array('d-none');



    $fields['shipping_state']['class'] = array('col-lg-6');

    $fields['shipping_state']['input_class'] = array('form-control');

    $fields['shipping_state']['priority'] = 7;

    $fields['shipping_state']['label_class'] = array('d-none');



    $fields['shipping_address_1']['class'] = array('col-12');

    $fields['shipping_address_1']['input_class'] = array('form-control');

    $fields['shipping_address_1']['priority'] = 8;

    $fields['shipping_address_1']['label_class'] = array('d-none');



    $fields['shipping_address_2']['class'] = array('col-12');

    $fields['shipping_address_2']['input_class'] = array('form-control');

    $fields['shipping_address_2']['priority'] = 9;



    $fields['shipping_city']['class'] = array('col-lg-6');

    $fields['shipping_city']['input_class'] = array('form-control');

    $fields['shipping_city']['placeholder'] = esc_attr__('Town / City', 'agenxe');

    $fields['shipping_city']['priority'] = 10;

    $fields['shipping_city']['label_class'] = array('d-none');



    $fields['shipping_postcode']['class'] = array('col-lg-6');

    $fields['shipping_postcode']['input_class'] = array('form-control');

    $fields['shipping_postcode']['placeholder'] = esc_attr__('Postcode', 'agenxe');

    $fields['shipping_postcode']['priority'] = 11;

    $fields['shipping_postcode']['label_class'] = array('d-none');



    return $fields;

}



// removing archive product hooks

remove_action('woocommerce_before_main_content','woocommerce_output_content_wrapper',10);

remove_action('woocommerce_after_main_content','woocommerce_output_content_wrapper_end',10);

remove_action('woocommerce_after_shop_loop','woocommerce_pagination',10);

remove_action('woocommerce_before_main_content','woocommerce_breadcrumb',20);

remove_action('woocommerce_before_shop_loop','woocommerce_result_count',20);

remove_action('woocommerce_before_shop_loop','woocommerce_catalog_ordering',30);

remove_action('woocommerce_sidebar','woocommerce_get_sidebar',10);



// removing content product hooks

remove_action('woocommerce_before_shop_loop_item','woocommerce_template_loop_product_link_open',10);

remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_product_link_close',5);

remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_add_to_cart',10);

remove_action('woocommerce_before_shop_loop_item_title','woocommerce_show_product_loop_sale_flash',10);

remove_action('woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_thumbnail',10);

remove_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title',10);

remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating',5);

remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_price',10);



// removing single product hooks

remove_action('woocommerce_before_single_product_summary','woocommerce_show_product_sale_flash',10);

remove_action('woocommerce_before_single_product_summary','woocommerce_show_product_images',20);

remove_action('woocommerce_single_product_summary','woocommerce_template_single_title',5);

remove_action('woocommerce_single_product_summary','woocommerce_template_single_rating',10);

remove_action('woocommerce_single_product_summary','woocommerce_template_single_price',10);

remove_action('woocommerce_single_product_summary','woocommerce_template_single_excerpt',20);

remove_action('woocommerce_single_product_summary','woocommerce_template_single_add_to_cart',30);

remove_action('woocommerce_single_product_summary','woocommerce_template_single_meta',40);

remove_action('woocommerce_single_product_summary','woocommerce_template_single_sharing',50);



// removing review hook

remove_action('woocommerce_review_before_comment_meta','woocommerce_review_display_rating',10);

remove_action('woocommerce_review_meta','woocommerce_review_display_meta',10,1);



// removing cart hook

remove_action('woocommerce_proceed_to_checkout','woocommerce_button_proceed_to_checkout',20);

remove_action('woocommerce_cart_collaterals','woocommerce_cross_sell_display',10);

remove_action('woocommerce_cart_is_empty','wc_empty_cart_message',10);

remove_action('woocommerce_widget_shopping_cart_total','woocommerce_widget_shopping_cart_subtotal',10);

remove_action('woocommerce_widget_shopping_cart_buttons','woocommerce_widget_shopping_cart_button_view_cart',10);

remove_action('woocommerce_widget_shopping_cart_buttons','woocommerce_widget_shopping_cart_proceed_to_checkout',20);



// removing checkout hook

remove_action('woocommerce_before_checkout_form','woocommerce_checkout_login_form',10);

remove_action('woocommerce_before_checkout_form','woocommerce_checkout_coupon_form',10);





// Shop column start wrapper hook

add_action('woocommerce_before_main_content','agenxe_shop_col_start_cb');



// Shop column end wrapper hook

add_action('woocommerce_after_main_content','agenxe_shop_col_end_cb',10);



// shop main content hook

add_action('agenxe_shop_main_content','agenxe_shop_main_content_cb',10);



// shop main content end hook

add_action('agenxe_shop_main_content_end','agenxe_shop_main_content_end_cb',10);



// agenxe woocommerce pagination hook

add_action('woocommerce_after_shop_loop','agenxe_woocommerce_pagination',10);



// agenxe woocommerce filter wrapper hook

add_action('woocommerce_before_shop_loop','agenxe_woocommerce_filter_wrapper',20);



// agenxe woocommerce product content wrapper

add_action('agenxe_woocommerce_product_content', 'agenxe_woocommerce_tab_content_wrapper_start', 10 );

add_action('agenxe_woocommerce_product_content', 'agenxe_grid_tab_content_cb', 10 );

add_action('agenxe_woocommerce_product_content', 'agenxe_list_tab_content_cb', 20 );

add_action('agenxe_woocommerce_product_content', 'agenxe_woocommerce_tab_content_wrapper_end', 30 );



// agenxe woocommerce get sidebar

add_action('woocommerce_sidebar','agenxe_woocommerce_get_sidebar',10);



/*

*   Content Product Hook

*/



// agenxe shop loop product thumbnail hook

add_action( 'woocommerce_before_shop_loop_item', 'agenxe_loop_product_thumbnail', 10 );



// agenxe shop loop hozrizontal product thumbnail hook

add_action( 'woocommerce_before_shop_horizontal_loop_item', 'agenxe_loop_horiontal_product_thumbnail', 10 );



// agenxe shop loop horizontal product summary hook

add_action('agenxe_woocommerce_shop_three_loop_product_summary','agenxe_woocommerce_shop_three_loop_product_summary_cb',10);



/*

*   Single Product Hook

*/

// single product before summary

add_action('woocommerce_before_single_product_summary', 'agenxe_woocommerce_before_single_product_summary',10);



// single product title

add_action('woocommerce_single_product_summary', 'agenxe_woocommerce_single_product_title', 30 );



// single product price and rating

add_action('woocommerce_single_product_summary', 'agenxe_woocommerce_single_product_price_rating', 20 );



// single product excerpt

add_action('woocommerce_single_product_summary', 'agenxe_woocommerce_single_product_excerpt', 40 );



// single product availability

add_action( 'woocommerce_single_product_summary', 'agenxe_woocommerce_single_product_availability', 50 );



// single product add to cart button

add_action('woocommerce_single_product_summary','agenxe_woocommerce_single_add_to_cart_button',60);



// single product meta hook

add_action('woocommerce_single_product_summary','agenxe_woocommerce_single_meta',80);



// single product sidebar

add_action('agenxe_woocommerce_single_product_sidebar','agenxe_woocommerce_single_product_sidebar_cb');



/*

* Single product quick view

*/

add_action('agenxe_quickview_before_single_product_summary','agenxe_woocommerce_before_single_product_summary',10);



// single product price and rating

add_action('agenxe_quickview_single_product_summary','agenxe_woocommerce_single_product_price_rating',20);



// single product title

add_action('agenxe_quickview_single_product_summary','agenxe_woocommerce_quickview_single_product_title',30);



// single product excerpt

add_action('agenxe_quickview_single_product_summary','agenxe_woocommerce_single_product_excerpt',40);



// single product add to cart button

add_action('agenxe_quickview_single_product_summary','agenxe_woocommerce_single_add_to_cart_button',60);





/*

*   Single product Review Hook

*/



// single product reviewer name

add_action('woocommerce_review_before_comment_meta','agenxe_woocommerce_reviewer_meta',10,1);



/*

*   cart hook

*/



// cart proceed to checkout button hook

add_action('woocommerce_proceed_to_checkout','agenxe_woocommerce_button_proceed_to_checkout',20);



// cross sell products

add_action('woocommerce_after_cart','agenxe_woocommerce_cross_sell_display',10);



// mini cart view cart button

add_action('woocommerce_widget_shopping_cart_buttons','agenxe_minicart_view_cart_button',10);



// mini cart checkout button

add_action('woocommerce_widget_shopping_cart_buttons','agenxe_minicart_checkout_button',20);



/*

*   checkout hook

*/



// agenxe woocommerce checkout login form

add_action('woocommerce_before_checkout_form','agenxe_woocommerce_before_checkout_form',10);





// product compare button remove

add_filter( 'filter_wooscp_button_archive', function() {

    return '0';

} );

add_filter( 'filter_wooscp_button_single', function() {

    return '0';

} );



add_filter( 'wooscp_button_html', 'agenxe_wooscp_button_html', 10, 2 );

function agenxe_wooscp_button_html( $output , $prodid ) {

    return $output = '<a href="#" class="icon-btn wooscp-btn wooscp-btn-' . esc_attr( $prodid ) . ' ' . get_option( '_wooscp_button_class' ) . '" data-id="' . esc_attr( $prodid ) . '"><i class="fal fa-layer-group"></i></a>';

}



// Compare Button Text Added

add_filter( 'wooscp_button_text_added', 'agenxe_woo_compare_btn_text_added', 10, 2 );

function agenxe_woo_compare_btn_text_added( ){

    return $output = '<i class="fal fa-layer-group"></i>';

}



add_filter( 'wooscp_button_text', 'agenxe_compare_btn_text', 10, 2 );

function agenxe_compare_btn_text(){

    return $output = '<i class="fal fa-layer-group"></i>';

}



// Quick View

add_filter( 'woosq_button_position', function() {

    return '0';

} );



add_filter( 'woosq_button_html', 'agenxe_woosq_button_html', 10, 2 );

function agenxe_woosq_button_html( $output , $prodid ) {

    return $output = '<a href="#" class="icon-btn woosq-btn woosq-btn-' . esc_attr( $prodid ) . ' ' . get_option( 'woosq_button_class' ) . '" data-id="' . esc_attr( $prodid ) . '" data-effect="mfp-3d-unfold"><i class="far fa-eye"></i></a>';

}



// Product Description Add Filter

add_filter( 'woocommerce_short_description', 'woocommerce_new_short_description', 10, 2 );

function woocommerce_new_short_description( $short_description ){

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

        'ul'        => array(

            'class'     => array(),

        ),

        'li'        => array(

            'class'     => array(),

        ),

        'div'        => array(

            'class'     => array(),

        ),

    );

    echo wp_kses( $short_description, $allowhtml );

}