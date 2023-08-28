<?php
/**
 * Output a single payment method
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/payment-method.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$allowhtml = array(
	'p'         => array(
		'class'     => array()
	),
	'span'      => array(),
	'a'         => array(
		'href'      => array(),
		'title'     => array(),
		'class'     => array(),
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
<li class="wc_payment_method payment_method_<?php echo esc_attr( $gateway->id ); ?>">
    <span class="custom-checkbox">
		<input id="payment_method_<?php echo esc_attr( $gateway->id ); ?>" type="radio" class="input-radio" name="payment_method" value="<?php echo esc_attr( $gateway->id ); ?>" <?php checked( $gateway->chosen, true ); ?> data-order_button_text="<?php echo esc_attr( $gateway->order_button_text ); ?>" />
        <label for="payment_method_<?php echo esc_attr( $gateway->id ); ?>">
            <?php echo esc_html( $gateway->get_title() ); /* phpcs:ignore WordPress.XSS.EscapeOutput.OutputNotEscaped */ ?> <?php echo wp_kses( $gateway->get_icon(), $allowhtml ); /* phpcs:ignore WordPress.XSS.EscapeOutput.OutputNotEscaped */ ?>
            <span class="checkmark"></span>
        </label>
    </span>

	<?php if ( $gateway->has_fields() || $gateway->get_description() ) : ?>
		<div class="payment_box payment_method_<?php echo esc_attr( $gateway->id ); ?>">
			<?php $gateway->payment_fields(); ?>
		</div>
	<?php endif; ?>
</li>
