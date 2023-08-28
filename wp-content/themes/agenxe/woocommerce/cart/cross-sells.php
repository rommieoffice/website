<?php
/**
 * Cross-sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cross-sells.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 4.4.0
 */

defined( 'ABSPATH' ) || exit;

$agenxe_woo_crosssellproduct_display = agenxe_opt('agenxe_woo_crosssellproduct_display');

if ( $cross_sells && $agenxe_woo_crosssellproduct_display ) : ?>

	<div class="cross-sells th-product-wrapper link-inherit th-product-layout1 mt-60">
        <div class="section-title mb-30">
		    <h2><?php esc_html_e( 'You may be interested in', 'agenxe' ); ?></h2>
        </div>
        <?php
            woocommerce_product_loop_start(); 

            if( class_exists('ReduxFramework') ) {
                $agenxe_woo_crosssell_product_col = agenxe_opt('agenxe_woo_crosssell_product_col');
            } else{
                $agenxe_woo_crosssell_product_col = '4';
            }
        ?>

			<?php foreach ( $cross_sells as $cross_sell ) : ?>
                <div class="col-lg-<?php echo esc_attr($agenxe_woo_crosssell_product_col); ?> col-sm-6">
				<?php
					$post_object = get_post( $cross_sell->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.OverrideProhibited, Squiz.PHP.DisallowMultipleAssignments.Found

					wc_get_template_part( 'content', 'product' );
				?>
                </div>
			<?php endforeach; ?>

		<?php woocommerce_product_loop_end(); ?>

	</div>
	<?php
endif;

wp_reset_postdata();