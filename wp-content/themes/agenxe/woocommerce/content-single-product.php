<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
    <div class="row">
		<?php 
            if( class_exists('ReduxFramework') ) {
                $agenxe_woo_singlepage_sidebar = agenxe_opt('agenxe_woo_singlepage_sidebar');
                if( $agenxe_woo_singlepage_sidebar == '2' && is_active_sidebar('agenxe-woo-sidebar') ) {
                    echo '<div class="col-lg-8 col-xl-8 order-last">';
                } elseif( $agenxe_woo_singlepage_sidebar == '3' && is_active_sidebar('agenxe-woo-sidebar') ) {
                    echo '<div class="col-lg-8 col-xl-8">';
                } else {
                    echo '<div class="col-lg-12">';
                }
            } else {
            	if(is_active_sidebar('agenxe-woo-sidebar')){
            		echo '<div class="col-lg-8">';
            	}else{
            		echo '<div class="col-lg-12">';
            	}
                
            }

				echo '<div class="row gx-60">';
					echo '<div class="col-lg-6">';
						// echo '<div class="product-big-img">';
							/**
							 * Hook: woocommerce_before_single_product_summary.
							 *
							 * @hooked woocommerce_show_product_sale_flash - 10
							 * @hooked woocommerce_show_product_images - 20
							 */
							do_action( 'woocommerce_before_single_product_summary' );

						// echo '</div>';
					echo '</div>';
					echo '<div class="col-lg-6 align-self-center">';
						echo '<div class="product-about">';

							/**
							 * Hook: woocommerce_single_product_summary.
							 *
							 * @hooked woocommerce_template_single_title - 5
							 * @hooked agenxe_woocommerce_single_product_price_rating - 30
							 * @hooked woocommerce_template_single_excerpt - 40
							 * @hooked agenxe_woocommerce_single_product_availability - 50
							 * @hooked woocommerce_template_single_meta - 40
							 * @hooked woocommerce_template_single_sharing - 50
							 * @hooked WC_Structured_Data::generate_product_data() - 60
							 */
							do_action( 'woocommerce_single_product_summary' );
							
						echo '</div>';
					echo '</div>';
				echo '</div>';


		        /**
		         * Hook: woocommerce_after_single_product_summary.
		         *
		         * @hooked woocommerce_output_product_data_tabs - 10
		         * @hooked woocommerce_upsell_display - 15
		         * @hooked woocommerce_output_related_products - 20
		         */
		        do_action( 'woocommerce_after_single_product_summary' );

			echo '</div>';

            /**
             * Hook: agenxe_woocommerce_single_product_sidebar.
             *
             * @hooked agenxe_woocommerce_single_product_sidebar_cb - 10
             */
            do_action( 'agenxe_woocommerce_single_product_sidebar' );
        ?>
        
    </div>
    
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>