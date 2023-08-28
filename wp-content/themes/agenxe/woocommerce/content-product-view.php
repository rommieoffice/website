<?php
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly
    }
    
    $GLOBALS['post'] = $args['prod'];
    wc_setup_product_data( $args['prod']);

    ?>
    <div <?php post_class() ?>>
        <div class="row">
            <div class="col-md-6">
            <?php
            /**
             * Hook: woocommerce_before_single_product_summary.
             *
             * @hooked woocommerce_show_product_sale_flash - 10
             * @hooked woocommerce_show_product_images - 20
             */
            do_action( 'agenxe_quickview_before_single_product_summary' );
            ?>
            </div>
            <div class="col-md-6">
                <div class="product-details-content position-relative">
                    <?php
                    /**
                     * Hook: woocommerce_single_product_summary.
                     *
                     * @hooked woocommerce_template_single_title - 5
                     * @hooked woocommerce_template_single_rating - 10
                     * @hooked woocommerce_template_single_price - 10
                     * @hooked woocommerce_template_single_excerpt - 20
                     * @hooked woocommerce_template_single_add_to_cart - 30
                     * @hooked woocommerce_template_single_meta - 40
                     * @hooked woocommerce_template_single_sharing - 50
                     * @hooked WC_Structured_Data::generate_product_data() - 60
                     */
                    do_action( 'agenxe_quickview_single_product_summary' );
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php

    wp_reset_postdata();
    wc_setup_product_data( $GLOBALS['post'] );