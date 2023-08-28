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

if ( ! is_active_sidebar( 'agenxe-blog-sidebar' ) ) {
    return;
}
?>

<div class="col-xxl-3 col-lg-4">
    <aside class="sidebar-area">
	    <?php dynamic_sidebar( 'agenxe-blog-sidebar' ); ?>
	</aside>
</div>