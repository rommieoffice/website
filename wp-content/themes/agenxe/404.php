<?php
/**
 * @Packge     : Agenxe
 * @Version    : 1.0
 * @Author     : Themeholy
 * @Author URI : https://themeforest.net/user/themeholy
 *
 */

    // Block direct access
    if( !defined( 'ABSPATH' ) ){
        exit();
    }

    if( class_exists( 'ReduxFramework' ) ) {
        $agenxe404title     = agenxe_opt( 'agenxe_error_title' );
        $agenxe404description  = agenxe_opt( 'agenxe_error_description' );
        $agenxe404btntext      = agenxe_opt( 'agenxe_error_btn_text' );
    } else {
        $agenxe404title     = __( 'Oops! Page Not Found!', 'agenxe' );
        $agenxe404description  = __( 'The page you are looking for does not exist. It might have been moved or deleted.', 'agenxe' );
        $agenxe404btntext      = __( ' Back To Home', 'agenxe');

    }

    // get header //
    get_header(); 
    ?>

    <section class="space">
        <div class="container">
            <div class="error-img">
                <?php if(!empty(agenxe_opt('agenxe_error_img', 'url' ) )): ?>
                    <img src="<?php echo esc_url( agenxe_opt('agenxe_error_img', 'url' ) ) ?>" alt="<?php echo esc_attr__('404 image', 'agenxe'); ?>">
                <?php else: ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/error.svg" alt="<?php echo esc_attr__('404 image', 'agenxe'); ?>">
                <?php endif; ?>
            </div>
            <div class="error-content">
                <h2 class="error-title mb-45"><?php echo esc_html( $agenxe404title ); ?></h2>
                <p class="error-text"><?php echo esc_html( $agenxe404description ); ?></p>
                <?php if(!empty(agenxe_opt('agenxe_error_btn_img', 'url' ) )): ?>
                    <a href="<?php echo esc_url( home_url('/') ); ?>" class="th-btn cta-btn error-btn" data-bg-src="<?php echo esc_url( agenxe_opt('agenxe_error_btn_img', 'url' ) ) ?>"><?php echo esc_html( $agenxe404btntext ); ?><i class="fas fa-arrow-up-right ms-2"></i></a>
                <?php else: ?>
                    <a href="<?php echo esc_url( home_url('/') ); ?>" class="th-btn cta-btn error-btn" data-bg-src="<?php echo get_template_directory_uri(); ?>/assets/img/feature-bg1.png"><?php echo esc_html( $agenxe404btntext ); ?><i class="fas fa-arrow-up-right ms-2"></i></a>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <ul class="grid_lines d-none d-md-flex justify-content-between">
        <li class="grid_line"></li>
        <li class="grid_line"></li>
        <li class="grid_line"></li>
    </ul>
    
    <?php
    //footer
    get_footer();