<?php
/**
 * @Packge     : Agenxe
 * @Version    : 1.0
 * @Author     : Themeholy
 * @Author URI : https://themeforest.net/user/themeholy
 *
 */

    // Block direct access
    if( ! defined( 'ABSPATH' ) ){
        exit();
    }

    if( class_exists( 'ReduxFramework' ) && defined('ELEMENTOR_VERSION') ) {
        if( is_page() || is_page_template('template-builder.php') ) {
            $agenxe_post_id = get_the_ID();

            // Get the page settings manager
            $agenxe_page_settings_manager = \Elementor\Core\Settings\Manager::get_settings_managers( 'page' );

            // Get the settings model for current post
            $agenxe_page_settings_model = $agenxe_page_settings_manager->get_model( $agenxe_post_id );

            // Retrieve the color we added before
            $agenxe_header_style = $agenxe_page_settings_model->get_settings( 'agenxe_header_style' );
            $agenxe_header_builder_option = $agenxe_page_settings_model->get_settings( 'agenxe_header_builder_option' );

            if( $agenxe_header_style == 'header_builder'  ) {

                if( !empty( $agenxe_header_builder_option ) ) {
                    $agenxeheader = get_post( $agenxe_header_builder_option );
                    echo '<header class="header">';
                        echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $agenxeheader->ID );
                    echo '</header>';
                }
            } else {
                // global options
                $agenxe_header_builder_trigger = agenxe_opt('agenxe_header_options');
                if( $agenxe_header_builder_trigger == '2' ) {
                    echo '<header>';
                    $agenxe_global_header_select = get_post( agenxe_opt( 'agenxe_header_select_options' ) );
                    $header_post = get_post( $agenxe_global_header_select );
                    echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $header_post->ID );
                    echo '</header>';
                } else {
                    // wordpress Header
                    agenxe_global_header_option();
                }
            }
        } else {
            $agenxe_header_options = agenxe_opt('agenxe_header_options');
            if( $agenxe_header_options == '1' ) {
                agenxe_global_header_option();
            } else {
                $agenxe_header_select_options = agenxe_opt('agenxe_header_select_options');
                $agenxeheader = get_post( $agenxe_header_select_options );
                echo '<header class="header">';
                    echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $agenxeheader->ID );
                echo '</header>';
            }
        }
    } else {
        agenxe_global_header_option();
    }