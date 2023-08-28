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
    exit;
}

// Cmb 2 Admin Script
add_action( 'admin_enqueue_scripts', 'agenxe_cmb2_admin_scripts' );
function agenxe_cmb2_admin_scripts( $screen ){

    // CMB2
	wp_enqueue_style( 'metafield-style', plugins_url( 'css/custom.metafield.css', __FILE__ ) , array(), '1.0' );
	
    wp_enqueue_script('agenxe-metafield-switch',plugins_url( 'js/switcher.metafield.js', __FILE__ ) , array('jquery'), '1.0', true );
    
    wp_enqueue_script( 'metafield-script', plugins_url( 'js/custom.metafield.js', __FILE__ ) , array('jquery'), '1.0', true );
    if( get_current_screen()->post_type == 'page' ) {
        wp_enqueue_script( 'page-metafieldconditional-script', plugins_url( 'js/page.metafieldconditional.js', __FILE__ ) , array('jquery'), '1.0', true );
    }

    if( $screen == 'profile.php' ) {
        wp_enqueue_script( 'cmb2-fontawesome-picker', plugins_url('js/fontawesome-iconpicker.min.js', __FILE__), array('jquery'), '1.0', true );
        wp_enqueue_script( 'cmb2-fontawesome-picker-init',plugins_url('js/fontawesome-picker-init.js', __FILE__), array('cmb2-fontawesome-picker'), '1.0', true );
        wp_enqueue_style( 'cmb2-fontawesome-css', get_theme_file_uri('/assets/css/font-awesome.min.css')  , array(), '1.0' );
        wp_enqueue_style( 'bootstrap-popovers',plugins_url('css/bootstrap-popovers.css', __FILE__), array('cmb2-fontawesome-css'), '1.0' );
        wp_enqueue_style( 'cmb2-fontawesome-picker',plugins_url('css/fontawesome-iconpicker.min.css', __FILE__) , array('bootstrap-popovers'), '1.0');
        wp_enqueue_style( 'cmb2-fontawesome-picker-fixes',plugins_url('css/cmb2-fixes.css', __FILE__), array('cmb2-fontawesome-picker'), '1.0');
    }
    
}

// Switch Field 
require_once ( AGENXE_PLUGIN_CMB2EXT_PATH.'switch_metafield.php');
require_once ( AGENXE_PLUGIN_CMB2EXT_PATH.'cmb2-fontawesome-picker.php');