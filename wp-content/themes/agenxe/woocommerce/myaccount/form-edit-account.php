<?php
/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_edit_account_form' ); ?>

<form class="woocommerce-EditAccountForm edit-account" action="" method="post" <?php do_action( 'woocommerce_edit_account_form_tag' ); ?> >

	<?php do_action( 'woocommerce_edit_account_form_start' ); ?>
    <div class="row">
        <p class="col-sm-6 mb-30">
            <input type="text" class="form-control border" name="account_first_name" id="account_first_name" autocomplete="given-name" value="<?php echo esc_attr( $user->first_name ); ?>" placeholder="<?php echo esc_attr__('First Name', 'agenxe')  ?>"/>
        </p>
        <p class="col-sm-6 mb-30">
            <input type="text" class="form-control border" name="account_last_name" id="account_last_name" autocomplete="family-name" value="<?php echo esc_attr( $user->last_name ); ?>" placeholder="<?php echo esc_attr__('Last Name', 'agenxe')  ?>"/>
        </p>

        <p class="col-sm-6 mb-30">
            <input type="text" class="form-control border" name="account_display_name" id="account_display_name" value="<?php echo esc_attr( $user->display_name ); ?>" placeholder="<?php echo esc_attr__('Display Name', 'agenxe')  ?>"/>
        </p>
        <p class="col-sm-6 mb-30">
            <input type="email" class="form-control border" name="account_email" id="account_email" autocomplete="email" value="<?php echo esc_attr( $user->user_email ); ?>" placeholder="<?php echo esc_attr__('Your Email', 'agenxe')  ?>"/>
        </p>
    </div>

	<fieldset class="row">
		<h6 class="col-12 mb-3"><?php esc_html_e( 'Password Change', 'agenxe' ); ?></h6>

		<p class="col-12 mb-30">
			<input type="password" class="form-control border" name="password_current" id="password_current" autocomplete="off" placeholder="<?php echo esc_attr('Current Password', 'agenxe') ?>"/>
		</p>
		<p class="col-12 mb-30">
			<input type="password" class="form-control border" name="password_1" id="password_1" autocomplete="off" placeholder="<?php echo esc_attr('New Password', 'agenxe') ?>"/>
		</p>
		<p class="col-12 mb-4">
			<input type="password" class="form-control border" name="password_2" id="password_2" autocomplete="off" placeholder="<?php echo esc_attr('Confirm Password', 'agenxe') ?>"/>
		</p>
	</fieldset>

	<?php do_action( 'woocommerce_edit_account_form' ); ?>

	<p>
		<?php wp_nonce_field( 'save_account_details', 'save-account-details-nonce' ); ?>
		<button type="submit" class="th-btn mt-3" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'agenxe' ); ?>"><?php esc_html_e( 'Save changes', 'agenxe' ); ?></button>
		<input type="hidden" name="action" value="save_account_details" />
	</p>

	<?php do_action( 'woocommerce_edit_account_form_end' ); ?>
</form>

<?php do_action( 'woocommerce_after_edit_account_form' ); ?>
