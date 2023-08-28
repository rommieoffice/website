<?php
/**
 * @Packge     : Agenxe
 * @Version    : 1.0
 * @Author     : Themeholy
 * @Author URI : https://themeforest.net/user/themeholy
 *
 */

// Block direct access
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

/**
 *
 * Define constant 
 *
 */

// Base URI
if ( ! defined( 'AGENXE_DIR_URI' ) ) {
    define('AGENXE_DIR_URI', get_parent_theme_file_uri().'/' );
}

// Assist URI
if ( ! defined( 'AGENXE_DIR_ASSIST_URI' ) ) {
    define( 'AGENXE_DIR_ASSIST_URI', get_theme_file_uri('/assets/') );
}


// Css File URI
if ( ! defined( 'AGENXE_DIR_CSS_URI' ) ) {
    define( 'AGENXE_DIR_CSS_URI', get_theme_file_uri('/assets/css/') );
}

// Js File URI
if (!defined('AGENXE_DIR_JS_URI')) {
    define('AGENXE_DIR_JS_URI', get_theme_file_uri('/assets/js/'));
}


// Base Directory
if (!defined('AGENXE_DIR_PATH')) {
    define('AGENXE_DIR_PATH', get_parent_theme_file_path() . '/');
}

//Inc Folder Directory
if (!defined('AGENXE_DIR_PATH_INC')) {
    define('AGENXE_DIR_PATH_INC', AGENXE_DIR_PATH . 'inc/');
}

//AGENXE framework Folder Directory
if (!defined('AGENXE_DIR_PATH_FRAM')) {
    define('AGENXE_DIR_PATH_FRAM', AGENXE_DIR_PATH_INC . 'agenxe-framework/');
}

//Hooks Folder Directory
if (!defined('AGENXE_DIR_PATH_HOOKS')) {
    define('AGENXE_DIR_PATH_HOOKS', AGENXE_DIR_PATH_INC . 'hooks/');
}

//Demo Data Folder Directory Path
if( !defined( 'AGENXE_DEMO_DIR_PATH' ) ){
    define( 'AGENXE_DEMO_DIR_PATH', AGENXE_DIR_PATH_INC.'demo-data/' );
}
    
//Demo Data Folder Directory URI
if( !defined( 'AGENXE_DEMO_DIR_URI' ) ){
    define( 'AGENXE_DEMO_DIR_URI', AGENXE_DIR_URI.'inc/demo-data/' );
}