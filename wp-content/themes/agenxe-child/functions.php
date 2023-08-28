<?php
/**
 *
 * @Packge      Agenxe 
 * @Author      Themeholy
 * @Author URL  https://themeforest.net/user/themeholy 
 * @version     1.0
 *
 */

/**
 * Enqueue style of child theme
 */
function agenxe_child_enqueue_styles() {

    wp_enqueue_style( 'agenxe-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'agenxe-child-style', get_stylesheet_directory_uri() . '/style.css',array( 'agenxe-style' ),wp_get_theme()->get('Version'));
}
add_action( 'wp_enqueue_scripts', 'agenxe_child_enqueue_styles', 100000 );