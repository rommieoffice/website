<?php
/**
 * @Packge     : Agenxe
 * @Version    : 1.0
 * @Author     : Themeholy
 * @Author URI : https://themeforest.net/user/themeholy
 *
 */

    // Block direct access
    if( ! defined( 'ABSPATH' ) ){
        exit();
    }

    agenxe_setPostViews( get_the_ID() );

    ?>
    <div <?php post_class(); ?>>
    <?php
        if( class_exists('ReduxFramework') ) {
            $agenxe_post_details_title_position = agenxe_opt('agenxe_post_details_title_position');
        } else {
            $agenxe_post_details_title_position = 'header';
        }

        $allowhtml = array(
            'p'         => array(
                'class'     => array()
            ),
            'span'      => array(),
            'a'         => array(
                'href'      => array(),
                'title'     => array()
            ),
            'br'        => array(),
            'em'        => array(),
            'strong'    => array(),
            'b'         => array(),
        );
        // Blog Post Thumbnail
        do_action( 'agenxe_blog_post_thumb' );
        
        echo '<div class="blog-content">';

            // Blog Post Meta
            do_action( 'agenxe_blog_post_meta' );

            if( $agenxe_post_details_title_position != 'header' ) {
                echo '<h2 class="blog-title">'.wp_kses( get_the_title(), $allowhtml ).'</h2>';
            }

            if( get_the_content() ){

                the_content();
                // Link Pages
                agenxe_link_pages();
            }  

        echo '</div>';

        if( class_exists('ReduxFramework') ) {
            $agenxe_post_details_share_options = agenxe_opt('agenxe_post_details_share_options');
            $agenxe_display_post_tags = agenxe_opt('agenxe_display_post_tags');
            $agenxe_author_options = agenxe_opt('agenxe_post_details_author_desc_trigger');
        } else {
            $agenxe_post_details_share_options = false;
            $agenxe_display_post_tags = false;
            $agenxe_author_options = false;
        }
        
        $agenxe_post_tag = get_the_tags();
        
        if( ! empty( $agenxe_display_post_tags ) || ( ! empty($agenxe_post_details_share_options )) ){
            echo '<div class="share-links clearfix">';
                echo '<div class="row justify-content-between">';
                    if( is_array( $agenxe_post_tag ) && ! empty( $agenxe_post_tag ) ){
                        if( count( $agenxe_post_tag ) > 1 ){
                            $tag_text = __( 'Related Tags:', 'agenxe' );
                        }else{
                            $tag_text = __( 'Related Tag:', 'agenxe' );
                        }
                        if($agenxe_display_post_tags){
                            echo '<div class="col-sm-auto">';
                                echo '<span class="share-links-title">'.$tag_text.'</span>';
                                echo '<div class="tagcloud">';
                                    foreach( $agenxe_post_tag as $tags ){
                                        echo '<a href="'.esc_url( get_tag_link( $tags->term_id ) ).'">'.esc_html( $tags->name ).'</a>';
                                    }
                                echo '</div>';
                            echo '</div>';
                        }
                    }

                    /**
                    *
                    * Hook for Blog Details Share Options
                    *
                    * Hook agenxe_blog_details_share_options
                    *
                    * @Hooked agenxe_blog_details_share_options_cb 10
                    *
                    */
                    do_action( 'agenxe_blog_details_share_options' );

                    /**
                    *
                    * Hook for Blog Navigation
                    *
                    * Hook agenxe_blog_details_author_bio
                    *
                    * @Hooked agenxe_blog_details_author_bio_cb 10
                    *
                    */
                    do_action( 'agenxe_blog_details_author_bio' );

                echo '</div>';

            echo '</div>';

                
        }  
        /**
        *
        * Hook for Blog Details Comments
        *
        * Hook agenxe_blog_details_comments
        *
        * @Hooked agenxe_blog_details_comments_cb 10
        *
        */
        do_action( 'agenxe_blog_details_comments' );

    echo '</div>'; 
