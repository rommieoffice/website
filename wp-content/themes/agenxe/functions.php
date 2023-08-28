<?php
/**
 * @Packge     : Agenxe
 * @Version    : 1.0
 * @Author     : Themeholy
 * @Author URI : https://themeforest.net/user/themeholy
 *
 */

// Block direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Include File
 *
 */

// Constants
require_once get_parent_theme_file_path() . '/inc/agenxe-constants.php';

//theme setup
require_once AGENXE_DIR_PATH_INC . 'theme-setup.php';

//essential scripts
require_once AGENXE_DIR_PATH_INC . 'essential-scripts.php';

// Woo Hooks
require_once AGENXE_DIR_PATH_INC . 'woo-hooks/agenxe-woo-hooks.php';

// Woo Hooks Functions
require_once AGENXE_DIR_PATH_INC . 'woo-hooks/agenxe-woo-hooks-functions.php';

// plugin activation
require_once AGENXE_DIR_PATH_FRAM . 'plugins-activation/agenxe-active-plugins.php';

// theme dynamic css
require_once AGENXE_DIR_PATH_INC . 'agenxe-commoncss.php';

// meta options
require_once AGENXE_DIR_PATH_FRAM . 'agenxe-meta/agenxe-config.php';

// page breadcrumbs
require_once AGENXE_DIR_PATH_INC . 'agenxe-breadcrumbs.php';

// sidebar register
require_once AGENXE_DIR_PATH_INC . 'agenxe-widgets-reg.php';

//essential functions
require_once AGENXE_DIR_PATH_INC . 'agenxe-functions.php';

// helper function
require_once AGENXE_DIR_PATH_INC . 'wp-html-helper.php';

// Demo Data
require_once AGENXE_DEMO_DIR_PATH . 'demo-import.php';

// pagination
require_once AGENXE_DIR_PATH_INC . 'wp_bootstrap_pagination.php';

// agenxe options
require_once AGENXE_DIR_PATH_FRAM . 'agenxe-options/agenxe-options.php';

// hooks
require_once AGENXE_DIR_PATH_HOOKS . 'hooks.php';

// hooks funtion
require_once AGENXE_DIR_PATH_HOOKS . 'hooks-functions.php';



