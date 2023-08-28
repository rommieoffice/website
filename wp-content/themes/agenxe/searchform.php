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
?>

<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-form">
    <input name="s" required value="<?php echo esc_html( get_search_query() ); ?>" type="search" placeholder="<?php echo esc_attr__( 'Search...', 'agenxe' ); ?>">
    <button type="submit"><i class="far fa-search"></i></button>
</form>