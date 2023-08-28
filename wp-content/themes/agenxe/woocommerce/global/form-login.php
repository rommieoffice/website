<?php
/**
 * Login form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     7.0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( is_user_logged_in() ) {
	return;
}

?>
<form class="woocommerce-form woocommerce-form-login login" method="post">
	<div class="row">
		<div class="col-lg-4">
		

			<?php do_action( 'woocommerce_login_form_start' ); ?>
			<div class="form-group">
				<input placeholder="<?php esc_html_e( 'Username or email', 'agenxe' ); ?>" type="text" class="form-control" name="username" id="username" autocomplete="username" />
			</div>
			<div class="form-group">
				<input placeholder="<?php esc_html_e( 'Password', 'agenxe' ); ?>" class="form-control" type="password" name="password" id="password" autocomplete="current-password" />
			</div>
			<div class="clear"></div>

			<?php do_action( 'woocommerce_login_form' ); ?>

		    <div class="form-group">
				<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" />
	            <label for="rememberme" class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
					<?php esc_html_e( 'Remember me', 'agenxe' ); ?>
	                <span class="checkmark"></span>
	            </label>
		    </div>
			<div class="form-group mb-0">
				<button type="submit" class="woocommerce-button button woocommerce-form-login__submit th-btn" name="login" value="<?php esc_attr_e( 'Login', 'agenxe' ); ?>"><?php esc_html_e( 'Login', 'agenxe' ); ?></button>
		        <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
				<input type="hidden" name="redirect" value="<?php echo esc_url( $redirect ) ?>" />
				<p class="lost_password fs-xs mt-2 mb-0">
					<a class="btn-inline text-reset" href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'agenxe' ); ?></a>
				</p>
			</div>

			<div class="clear"></div>

			<?php do_action( 'woocommerce_login_form_end' ); ?>
		</div>
	</div>
</form>