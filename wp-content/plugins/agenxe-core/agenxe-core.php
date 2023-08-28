<?php
/**
 * 
 * Plugin Name: Agenxe Core
 * Description: This is a helper plugin of agenxe theme
 * Version:     1.0
 * Author:      Themeholy
 * Author URI:  https://themeforest.net/user/themeholy 
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Domain Path: /languages
 * Text Domain: agenxe
 * 
 */

// Blocking direct access

if( ! defined( 'ABSPATH' ) ) {

    exit();

}

// Define Constant

define( 'AGENXE_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

define( 'AGENXE_PLUGIN_INC_PATH', plugin_dir_path( __FILE__ ) . 'inc/' );
define( 'AGENXE_PLUGIN_CMB2EXT_PATH', plugin_dir_path( __FILE__ ) . 'cmb2-ext/' );

define( 'AGENXE_PLUGIN_WIDGET_PATH', plugin_dir_path( __FILE__ ) . 'inc/widgets/' );

define( 'AGENXE_PLUGDIRURI', plugin_dir_url( __FILE__ ) );

define( 'AGENXE_ADDONS', plugin_dir_path( __FILE__ ) .'addons/' );

define( 'AGENXE_ASSETS', plugin_dir_url( __FILE__ ) .'assets/' );

define( 'AGENXE_CORE_PLUGIN_TEMP', plugin_dir_path( __FILE__ ) .'agenxe-template/' );

// load textdomain

load_plugin_textdomain( 'agenxe', false, basename( dirname( __FILE__ ) ) . '/languages' );

//include file.

require_once AGENXE_PLUGIN_INC_PATH .'agenxecore-functions.php';
require_once AGENXE_PLUGIN_INC_PATH .'builder/builder.php';
require_once AGENXE_PLUGIN_INC_PATH . 'MCAPI.class.php';
require_once AGENXE_PLUGIN_INC_PATH .'agenxeajax.php';

require_once AGENXE_PLUGIN_CMB2EXT_PATH . 'cmb2ext-init.php';

//Widget

require_once AGENXE_PLUGIN_WIDGET_PATH . 'recent-post-widget.php';
require_once AGENXE_PLUGIN_WIDGET_PATH . 'search-form.php';
require_once AGENXE_PLUGIN_WIDGET_PATH . 'categories-lists.php';
require_once AGENXE_PLUGIN_WIDGET_PATH . 'about-us-widget.php';
// require_once AGENXE_PLUGIN_WIDGET_PATH . 'author-widget.php';
// require_once AGENXE_PLUGIN_WIDGET_PATH . 'offer-banner.php';

//addons

require_once AGENXE_ADDONS . 'addons.php';

// Register widget styles
add_action( 'elementor/editor/after_enqueue_scripts', 'widget_styles' );

function widget_styles() {

    wp_register_style( 'editor-style-1', plugins_url( 'assets/css/editor.css', __FILE__ ) );
    wp_enqueue_style( 'editor-style-1' );

}
