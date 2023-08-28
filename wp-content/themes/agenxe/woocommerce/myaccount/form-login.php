<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 7.0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

do_action( 'woocommerce_before_customer_login_form' ); ?>
<div class="row justify-content-center">
    <div class="col-xl-6 col-lg-8">
        <!-- Login Register -->
        <div class="login-register-wrapper login-form login-register-form">
            <!-- Tab Buttons -->
            <div class="tab-btn mb-20">
                <ul class="nav nav-tabs login-tab" role="tablist">
                    <li class="nav-item" data-tab-select="login"><button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" role="tab" aria-controls="login" aria-selected="true"><?php esc_html_e( 'Log In','agenxe'); ?></button></li>
                    <?php
                        if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) :
                    ?>
                    <li class="nav-item" data-tab-select="register"><button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register" role="tab" aria-controls="register" aria-selected="false"><?php esc_html_e( 'Register', 'agenxe' ); ?></button></li>
                    <?php
                        endif;
                    ?>
                </ul>
            </div>
            <!-- End Tab Buttons -->

            <!-- Tab Content -->
            <div class="tab-content">
                <div class="tab-pane fade show active" data-tab="login" id="login" aria-labelledby="login-tab">
                    <!-- Login Form -->
                    <?php
                        echo '<form method="post" class="woocommerce-form woocommerce-form-login login">';
                            do_action( 'woocommerce_login_form_start' );
                            echo '<p class="form-row form-group">';
                                $username_value = ! empty( $_POST['username'] ) ? wp_unslash( $_POST['username'] ) : '';
                                echo '<input name="username" value="'.esc_attr( $username_value ).'" class="form-control border" type="text" placeholder="'.esc_attr__('User Name','agenxe').'">';
                            echo '</p>';
                            echo '<p class="form-row form-group">';
                                echo '<input class="form-control border" name="password" type="password" placeholder="'.esc_attr__('Password','agenxe').'">';
                            echo '</p>';

                            do_action( 'woocommerce_login_form' );

                            echo '<p class="custom-checkbox notice">';
								echo '<input id="remember" value="forever" name="rememberme" type="checkbox">';
                                echo '<label for="remember">';
									echo esc_html__( 'Remember me', 'agenxe' );
                                    echo '<span class="checkmark"></span>';
                                echo '</label>';
                            echo '</p>';

                            echo '<p class="form-row form-group">';
                                wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' );
                                echo '<button type="submit" value="'.esc_attr__( 'Log in', 'agenxe' ).'" name="login" class="th-btn w-100">'.esc_html__('Login','agenxe').'</button>';
                            echo '</p>';

                            echo '<p class="mb-0"><a href="'.esc_url( wp_lostpassword_url() ).'" class="btn-inline">'.esc_html__('Forgot Your Password?','agenxe').'</a></p>';

                            do_action( 'woocommerce_login_form_end' );
                        echo '</form>';
                    ?>
                    <!-- End Login Form -->
                </div>

                <?php
                    if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) :
                ?>
                <div class="tab-pane fade" data-tab="register" id="register" aria-labelledby="register-tab">
                    <!-- Register Form -->
                    <?php
                        echo '<!-- Register Form -->';
                        echo '<form method="post" class="woocommerce-form woocommerce-form-register register">';
                            do_action( 'woocommerce_register_form_start' );
                            if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) {
                                echo '<p class="form-row form-group">';
                                    $resgisterusername = ( ! empty( $_POST['username'] ) ) ? wp_unslash( $_POST['username'] ) : '';
                                    echo '<input name="username" value="'.esc_attr( $resgisterusername ).'" class="form-control border" type="text" placeholder="'.esc_attr__('User Name','agenxe').'">';
                                echo '</p>';
                            }

                            echo '<p class="form-row form-group">';
                                $registeremail = ( ! empty( $_POST['email'] ) ) ? wp_unslash( $_POST['email'] ) : '';
                                echo '<input name="email" value="'.esc_attr($registeremail).'" class="form-control border" type="email" placeholder="'.esc_attr__('Email','agenxe').'">';
                            echo '</p>';
                            if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ){
                                echo '<p class="form-row form-group">';
                                    echo '<input name="password" class="form-control border" type="password" placeholder="'.esc_attr__('Password','agenxe').'">';
                                echo '</p>';
                            } else {
                                echo '<p class="form-row form-group">';
                                    esc_html_e( 'A password will be sent to your email address.', 'agenxe' );
                                echo '</p>';
                            }

                            do_action( 'woocommerce_register_form' );

                            echo '<p class="form-row form-group mt-40">';
                                echo wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' );
                                echo '<button type="submit" value="'.esc_attr__( 'Register', 'agenxe' ).'" name="register" class="th-btn w-100">'.esc_html__( 'Register', 'agenxe' ).'</button>';
                            echo '</p>';

                            do_action( 'woocommerce_register_form_end' );

                        echo '</form>';
                        echo '<!-- End Register Form -->';
                    ?>
                    <!-- End Register Form -->
                </div>
                <?php
                    endif;
                ?>
            </div>
            <!-- End Tab Content -->
        </div>
        <!-- End Login Register -->
    </div>
</div>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>