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
    *
    * Hook for Footer Content
    *
    * Hook agenxe_footer_content
    *
    * @Hooked agenxe_footer_content_cb 10
    *
    */
    do_action( 'agenxe_footer_content' );


    /**
    *
    * Hook for Back to Top Button
    *
    * Hook agenxe_back_to_top
    *
    * @Hooked agenxe_back_to_top_cb 10
    *
    */
    do_action( 'agenxe_back_to_top' );

    /**
    *
    * agenxe grid lines
    *
    * Hook agenxe_grid_lines
    *
    * @Hooked agenxe_grid_lines_cb 10
    *
    */
    do_action( 'agenxe_grid_lines' );

    wp_footer();
    ?>
</body>
</html>