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

    if( defined( 'CMB2_LOADED' )  ){
        if( !empty( agenxe_meta('page_breadcrumb_area') ) ) {
            $agenxe_page_breadcrumb_area  = agenxe_meta('page_breadcrumb_area');
        } else {
            $agenxe_page_breadcrumb_area = '1';
        }
    }else{
        $agenxe_page_breadcrumb_area = '1';
    }
    
    $allowhtml = array(
        'p'         => array(
            'class'     => array()
        ),
        'span'      => array(
            'class'     => array(),
        ),
        'a'         => array(
            'href'      => array(),
            'title'     => array()
        ),
        'br'        => array(),
        'em'        => array(),
        'strong'    => array(),
        'b'         => array(),
        'sub'       => array(),
        'sup'       => array(),
    );
    
    if(  is_page() || is_page_template( 'template-builder.php' )  ) {
        if( $agenxe_page_breadcrumb_area == '1' ) {
            echo '<!-- Page title 2 -->';
            echo '<div class="breadcumb-wrapper" id="breadcumbwrap"  data-overlay="black" data-opacity="8">';
                echo '<div class="container">';
                    echo '<div class="row">';
                        echo '<div class="breadcumb-content text-center">';
                            if( defined('CMB2_LOADED') || class_exists('ReduxFramework') ) {
                                if( !empty( agenxe_meta('page_breadcrumb_settings') ) ) {
                                    if( agenxe_meta('page_breadcrumb_settings') == 'page' ) {
                                        $agenxe_page_title_switcher = agenxe_meta('page_title');
                                    } else {
                                        $agenxe_page_title_switcher = agenxe_opt('agenxe_page_title_switcher');
                                    }
                                } else {
                                    $agenxe_page_title_switcher = '1';
                                }
                            } else {
                                $agenxe_page_title_switcher = '1';
                            }

                            if( $agenxe_page_title_switcher ){
                                if( class_exists( 'ReduxFramework' ) ){
                                    $agenxe_page_title_tag    = agenxe_opt('agenxe_page_title_tag');
                                }else{
                                    $agenxe_page_title_tag    = 'h1';
                                }

                                if( defined( 'CMB2_LOADED' )  ){
                                    if( !empty( agenxe_meta('page_title_settings') ) ) {
                                        $agenxe_custom_title = agenxe_meta('page_title_settings');
                                    } else {
                                        $agenxe_custom_title = 'default';
                                    }
                                }else{
                                    $agenxe_custom_title = 'default';
                                }

                                if( $agenxe_custom_title == 'default' ) {
                                    echo agenxe_heading_tag(
                                        array(
                                            "tag"   => esc_attr( $agenxe_page_title_tag ),
                                            "text"  => esc_html( get_the_title( ) ),
                                            'class' => 'breadcumb-title'
                                        )
                                    );
                                } else {
                                    echo agenxe_heading_tag(
                                        array(
                                            "tag"   => esc_attr( $agenxe_page_title_tag ),
                                            "text"  => esc_html( agenxe_meta('custom_page_title') ),
                                            'class' => 'breadcumb-title'
                                        )
                                    );
                                }

                            }
                            if( defined('CMB2_LOADED') || class_exists('ReduxFramework') ) {

                                if( agenxe_meta('page_breadcrumb_settings') == 'page' ) {
                                    $agenxe_breadcrumb_switcher = agenxe_meta('page_breadcrumb_trigger');
                                } else {
                                    $agenxe_breadcrumb_switcher = agenxe_opt('agenxe_enable_breadcrumb');
                                }

                            } else {
                                $agenxe_breadcrumb_switcher = '1';
                            }

                            if( $agenxe_breadcrumb_switcher == '1' && (  is_page() || is_page_template( 'template-builder.php' ) )) {
                                    agenxe_breadcrumbs(
                                        array(
                                            'breadcrumbs_classes' => '',
                                        )
                                    );
                            }
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
            echo '<!-- End of Page title -->';
            
        }
    } else {
        echo '<!-- Page title 3 -->';
         if( class_exists( 'ReduxFramework' ) ){
            if (class_exists( 'woocommerce' ) && is_shop()){
            $breadcumb_bg_class = 'custom-woo-class';
            }elseif(is_404()){
                $breadcumb_bg_class = 'custom-error-class';
            }elseif(is_search()){
                $breadcumb_bg_class = 'custom-search-class';
            }elseif(is_archive()){
                $breadcumb_bg_class = 'custom-archive-class';
            }else{
                $breadcumb_bg_class = '';
            }
        }else{
            $breadcumb_bg_class = '';
        }
        echo '<div class="breadcumb-wrapper '. esc_attr($breadcumb_bg_class).'"  data-overlay="black" data-opacity="7">';
            echo '<div class="container z-index-common">';
                    echo '<div class="breadcumb-content text-center">';
                        if( class_exists( 'ReduxFramework' )  ){
                            $agenxe_page_title_switcher  = agenxe_opt('agenxe_page_title_switcher');
                        }else{
                            $agenxe_page_title_switcher = '1';
                        }

                        if( $agenxe_page_title_switcher ){
                            if( class_exists( 'ReduxFramework' ) ){
                                $agenxe_page_title_tag    = agenxe_opt('agenxe_page_title_tag');
                            }else{
                                $agenxe_page_title_tag    = 'h1';
                            }
                            if( class_exists('woocommerce') && is_shop() ) {
                                echo agenxe_heading_tag(
                                    array(
                                        "tag"   => esc_attr( $agenxe_page_title_tag ),
                                        "text"  => wp_kses( woocommerce_page_title( false ), $allowhtml ),
                                        'class' => 'breadcumb-title'
                                    )
                                );
                            }elseif ( is_archive() ){
                                echo agenxe_heading_tag(
                                    array(
                                        "tag"   => esc_attr( $agenxe_page_title_tag ),
                                        "text"  => wp_kses( get_the_archive_title(), $allowhtml ),
                                        'class' => 'breadcumb-title'
                                    )
                                );
                            }elseif ( is_home() ){
                                $agenxe_blog_page_title_setting = agenxe_opt('agenxe_blog_page_title_setting');
                                $agenxe_blog_page_title_switcher = agenxe_opt('agenxe_blog_page_title_switcher');
                                $agenxe_blog_page_custom_title = agenxe_opt('agenxe_blog_page_custom_title');
                                if( class_exists('ReduxFramework') ){
                                    if( $agenxe_blog_page_title_switcher ){
                                        echo agenxe_heading_tag(
                                            array(
                                                "tag"   => esc_attr( $agenxe_page_title_tag ),
                                                "text"  => !empty( $agenxe_blog_page_custom_title ) && $agenxe_blog_page_title_setting == 'custom' ? esc_html( $agenxe_blog_page_custom_title) : esc_html__( 'Latest News', 'agenxe' ),
                                                'class' => 'breadcumb-title'
                                            )
                                        );
                                    }
                                }else{
                                    echo agenxe_heading_tag(
                                        array(
                                            "tag"   => "h1",
                                            "text"  => esc_html__( 'Latest News', 'agenxe' ),
                                            'class' => 'breadcumb-title',
                                        )
                                    );
                                }
                            }elseif( is_search() ){
                                echo agenxe_heading_tag(
                                    array(
                                        "tag"   => esc_attr( $agenxe_page_title_tag ),
                                        "text"  => esc_html__( 'Search Result', 'agenxe' ),
                                        'class' => 'breadcumb-title'
                                    )
                                );
                            }elseif( is_404() ){
                                echo agenxe_heading_tag(
                                    array(
                                        "tag"   => esc_attr( $agenxe_page_title_tag ),
                                        "text"  => esc_html__( 'Error Page', 'agenxe' ),
                                        'class' => 'breadcumb-title'
                                    )
                                );
                            }elseif( is_singular( 'product' ) ){
                                $posttitle_position  = agenxe_opt('agenxe_product_details_title_position');
                                $postTitlePos = false;
                                if( class_exists( 'ReduxFramework' ) ){
                                    if( $posttitle_position && $posttitle_position != 'header' ){
                                        $postTitlePos = true;
                                    }
                                }else{
                                    $postTitlePos = false;
                                }

                                if( $postTitlePos != true ){
                                    echo agenxe_heading_tag(
                                        array(
                                            "tag"   => esc_attr( $agenxe_page_title_tag ),
                                            "text"  => wp_kses( get_the_title( ), $allowhtml ),
                                            'class' => 'breadcumb-title'
                                        )
                                    );
                                } else {
                                    if( class_exists( 'ReduxFramework' ) ){
                                        $agenxe_post_details_custom_title  = agenxe_opt('agenxe_product_details_custom_title');
                                    }else{
                                        $agenxe_post_details_custom_title = __( 'Shop Details','agenxe' );
                                    }

                                    if( !empty( $agenxe_post_details_custom_title ) ) {
                                        echo agenxe_heading_tag(
                                            array(
                                                "tag"   => esc_attr( $agenxe_page_title_tag ),
                                                "text"  => wp_kses( $agenxe_post_details_custom_title, $allowhtml ),
                                                'class' => 'breadcumb-title'
                                            )
                                        );
                                    }
                                }
                            }else{
                                $posttitle_position  = agenxe_opt('agenxe_post_details_title_position');
                                $postTitlePos = false;
                                if( is_single() ){
                                    if( class_exists( 'ReduxFramework' ) ){
                                        if( $posttitle_position && $posttitle_position != 'header' ){
                                            $postTitlePos = true;
                                        }
                                    }else{
                                        $postTitlePos = false;
                                    }
                                }
                                if( is_singular( 'product' ) ){
                                    $posttitle_position  = agenxe_opt('agenxe_product_details_title_position');
                                    $postTitlePos = false;
                                    if( class_exists( 'ReduxFramework' ) ){
                                        if( $posttitle_position && $posttitle_position != 'header' ){
                                            $postTitlePos = true;
                                        }
                                    }else{
                                        $postTitlePos = false;
                                    }
                                }

                                if( $postTitlePos != true ){
                                    echo agenxe_heading_tag(
                                        array(
                                            "tag"   => esc_attr( $agenxe_page_title_tag ),
                                            "text"  => wp_kses( get_the_title( ), $allowhtml ),
                                            'class' => 'breadcumb-title'
                                        )
                                    );
                                } else {
                                    if( class_exists( 'ReduxFramework' ) ){
                                        $agenxe_post_details_custom_title  = agenxe_opt('agenxe_post_details_custom_title');
                                    }else{
                                        $agenxe_post_details_custom_title = __( 'Blog Details','agenxe' );
                                    }

                                    if( !empty( $agenxe_post_details_custom_title ) ) {
                                        echo agenxe_heading_tag(
                                            array(
                                                "tag"   => esc_attr( $agenxe_page_title_tag ),
                                                "text"  => wp_kses( $agenxe_post_details_custom_title, $allowhtml ),
                                                'class' => 'breadcumb-title'
                                            )
                                        );
                                    }
                                }
                            }
                        }
                        if( class_exists('ReduxFramework') ) {
                            $agenxe_breadcrumb_switcher = agenxe_opt( 'agenxe_enable_breadcrumb' );
                        } else {
                            $agenxe_breadcrumb_switcher = '1';
                        }
                        if( $agenxe_breadcrumb_switcher == '1' ) {
                            if(agenxe_breadcrumbs()){
                            echo '<div>';
                                agenxe_breadcrumbs(
                                    array(
                                        'breadcrumbs_classes' => 'nav',
                                    )
                                );
                            echo '</div>';
                            }
                        }
                    echo '</div>';
            echo '</div>';
        echo '</div>';
        echo '<!-- End of Page title -->';
    }