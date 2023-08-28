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
    // Header
    get_header();

    /**
    * 
    * Hook for Blog Start Wrapper
    *
    * Hook agenxe_blog_start_wrap
    *
    * @Hooked agenxe_blog_start_wrap_cb 10
    *  
    */
    do_action( 'agenxe_blog_start_wrap' );

    /**
    * 
    * Hook for Blog Column Start Wrapper
    *
    * Hook agenxe_blog_col_start_wrap
    *
    * @Hooked agenxe_blog_col_start_wrap_cb 10
    *  
    */
    do_action( 'agenxe_blog_col_start_wrap' );

    /**
    * 
    * Hook for Blog Content
    *
    * Hook agenxe_blog_content
    *
    * @Hooked agenxe_blog_content_cb 10
    *  
    */
    do_action( 'agenxe_blog_content' );

    /**
    * 
    * Hook for Blog Pagination
    *
    * Hook agenxe_blog_pagination
    *
    * @Hooked agenxe_blog_pagination_cb 10
    *  
    */
    do_action( 'agenxe_blog_pagination' ); 

    /**
    * 
    * Hook for Blog Column End Wrapper
    *
    * Hook agenxe_blog_col_end_wrap
    *
    * @Hooked agenxe_blog_col_end_wrap_cb 10
    *  
    */
    do_action( 'agenxe_blog_col_end_wrap' ); 

    /**
    * 
    * Hook for Blog Sidebar
    *
    * Hook agenxe_blog_sidebar
    *
    * @Hooked agenxe_blog_sidebar_cb 10
    *  
    */
    do_action( 'agenxe_blog_sidebar' );     
        
    /**
    * 
    * Hook for Blog End Wrapper
    *
    * Hook agenxe_blog_end_wrap
    *
    * @Hooked agenxe_blog_end_wrap_cb 10
    *  
    */
    do_action( 'agenxe_blog_end_wrap' );

    //footer
    get_footer();