<?php
/**
 * @Packge     : Agenxe
 * @Version    : 1.0
 * @Author     : Themeholy
 * @Author URI : https://themeforest.net/user/themeholy
 *
 */

// Block direct access
if ( ! defined('ABSPATH') ) {
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
    do_action( 'agenxe_blog_col_start_wrap' ); ?>

    <div class="row search-active">
        <?php
        if( have_posts() ) {
            while( have_posts() ) {
                the_post();
                if ( is_active_sidebar( 'agenxe-blog-sidebar' ) ) {
                    $column_class = 'col-md-6';
                }else{
                    $column_class = 'col-md-4';
                } ?>
                <div class="<?php echo esc_attr( $column_class ) ?> filter-item">
                    <div class="th-search">
                        <?php
                        if( has_post_thumbnail() ){ ?>
                            <div class="search-grid-img image-scale-hover">
                                <a href="<?php echo esc_url( get_the_permalink() ); ?>">
                                    <?php the_post_thumbnail( ); ?>
                                </a>
                            </div>
                        <?php } ?>
                        <div class="search-grid-content">
                            <?php 
                            if( get_the_title() ){ ?>
                                <!-- Post Title -->
                                <h4 class="search-grid-title fw-semibold"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( get_the_title( ) ) ?></a></h4>
                                <!-- End Post Title -->
                            <?php } ?>

                            <div class="search-grid-meta blog-meta">
                                <span><a href="<?php echo esc_url( agenxe_blog_date_permalink() ) ?>"><i class="fal fa-calendar-days"></i>
                                    <time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ) ?>"><?php echo esc_html( get_the_date() ) ?></time>
                                </a></span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            wp_reset_postdata();
        }else{
            get_template_part('templates/content','none');
        }?>
    </div>
    <?php

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