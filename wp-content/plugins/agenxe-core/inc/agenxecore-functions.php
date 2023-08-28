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

/**

 * Admin Custom Login Logo

 */

function agenxe_custom_login_logo() {

    $logo = ! empty( agenxe_opt( 'agenxe_admin_login_logo', 'url' ) ) ? agenxe_opt( 'agenxe_admin_login_logo', 'url' ) : '' ;

    if( isset( $logo ) && ! empty( $logo ) ){

        echo '<style type="text/css">body.login div#login h1 a { background-image:url('.esc_url( $logo ).'); }</style>';
    }
}

add_action( 'login_enqueue_scripts', 'agenxe_custom_login_logo' );

/**
* Admin Custom css
*/

add_action( 'admin_enqueue_scripts', 'agenxe_admin_styles' );

function agenxe_admin_styles() {

  if ( ! empty( $agenxe_admin_custom_css ) ) {
        $agenxe_admin_custom_css = str_replace(array("\r\n", "\r", "\n", "\t", '    '), '', $agenxe_admin_custom_css);
        echo '<style rel="stylesheet" id="agenxe-admin-custom-css" >';
            echo esc_html( $agenxe_admin_custom_css );
        echo '</style>';
    }
}

// share button code

 function agenxe_social_sharing_buttons( ) {

    // Get page URL

    $URL        = get_permalink();
    $Sitetitle  = get_bloginfo('name');
    // Get page title

    $Title  = str_replace( ' ', '%20', get_the_title());

    // Construct sharing URL without using any script

    $twitterURL     = 'https://twitter.com/share?text='.esc_html( $Title ).'&url='.esc_url( $URL );
    $facebookURL    = 'https://www.facebook.com/sharer/sharer.php?u='.esc_url( $URL );
    $pinterest   = 'http://pinterest.com/pin/create/link/?url='.esc_url( $URL ).'&media='.esc_url(get_the_post_thumbnail_url()).'&description='.wp_kses_post(get_the_title());
    $linkedin       = 'https://www.linkedin.com/shareArticle?mini=true&url='.esc_url( $URL ).'&title='.esc_html( $Title );
    // Add sharing button at the end of page/page content

    $content = '';

    $content .= ' <a href="'.esc_url( $facebookURL ).'" target="_blank"><i class="fab fa-facebook-f"></i></a>';
    $content .= '  <a href="'. esc_url( $twitterURL ) .'" target="_blank"><i class="fab fa-twitter"></i></a>';
    $content .= '  <a href="'.esc_url( $linkedin ).'" target="_blank"><i class="fab fa-linkedin-in"></i></a>';
    $content .= '  <a href="'.esc_url( $pinterest ).'" target="_blank"><i class="fa-brands fa-pinterest-p"></i></a>';


    return $content;

};


//Post Reading Time Count

function agenxe_estimated_reading_time() {
    global $post;
    // get the content
    $the_content = $post->post_content;
    // count the number of words
    $words = str_word_count( strip_tags( $the_content ) );
    // rounding off and deviding per 100 words per minute
    $minute = floor( $words / 100 );
    // rounding off to get the seconds
    $second = floor( $words % 100 / ( 100 / 60 ) );
    // calculate the amount of time needed to read
    $estimate = $minute . esc_html__(' Min', 'agenxe') . ( $minute == 1 ? '' : 's' ) . esc_html__(' Read', 'agenxe');
    // create output
    $output = $estimate;
    // return the estimate
    return $output;
}



//add SVG to allowed file uploads

function agenxe_mime_types( $mimes ) {

    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svgz+xml';
    $mimes['exe'] = 'program/exe';
    $mimes['dwg'] = 'image/vnd.dwg';
    return $mimes;
}

add_filter('upload_mimes', 'agenxe_mime_types');



function agenxe_wp_check_filetype_and_ext( $data, $file, $filename, $mimes ) {

    $wp_filetype = wp_check_filetype( $filename, $mimes );
    $ext         = $wp_filetype['ext'];
    $type        = $wp_filetype['type'];
    $proper_filename = $data['proper_filename'];

    return compact( 'ext', 'type', 'proper_filename' );

}

add_filter( 'wp_check_filetype_and_ext', 'agenxe_wp_check_filetype_and_ext', 10, 4 );


// if ( ! function_exists( 'etlms_course_categories' ) ) {
//     function etlms_course_categories() {
//         $course_categories      = array();
//         $course_categories_term = tutils()->get_course_categories_term();
//         foreach ( $course_categories_term as $term ) {
//             $course_categories[ $term->term_id ] = $term->name;
//         }

//         return $course_categories;
//     }
// }

// if ( ! function_exists( 'etlms_course_authors' ) ) {
//     function etlms_course_authors() {
//         $course_authors = array();
//         $authors        = get_users( array( 'role__in' => array( 'author', tutor()->instructor_role ) ) );
//         foreach ( $authors as $author ) {
//             $course_authors[ $author->ID ] = $author->display_name;
//         }

//         return $course_authors;
//     }
// }


// Event Post Type

// add_action( 'init','agenxe_event', 0 );

function agenxe_event(){

    $labels = array(

        'name'               => esc_html__( 'Events', 'post Category general name', 'agenxe' ),
        'singular_name'      => esc_html__( 'Event', 'post Category singular name', 'agenxe' ),
        'menu_name'          => esc_html__( 'Events', 'admin menu', 'agenxe' ),
        'name_admin_bar'     => esc_html__( 'Event', 'add new on admin bar', 'agenxe' ),
        'add_new'            => esc_html__( 'Add New', 'Event', 'agenxe' ),
        'add_new_item'       => esc_html__( 'Add New Event', 'agenxe' ),
        'new_item'           => esc_html__( 'New Event', 'agenxe' ),
        'edit_item'          => esc_html__( 'Edit Event', 'agenxe' ),
        'view_item'          => esc_html__( 'View Event', 'agenxe' ),
        'all_items'          => esc_html__( 'All Events', 'agenxe' ),
        'search_items'       => esc_html__( 'Search Events', 'agenxe' ),
        'parent_item_colon'  => esc_html__( 'Parent Events:', 'agenxe' ),
        'not_found'          => esc_html__( 'No Events found.', 'agenxe' ),
        'not_found_in_trash' => esc_html__( 'No Events found in Trash.', 'agenxe' ),
    );



    $args = array(

        'labels'             => $labels,
        'description'        => esc_html__( 'Description.', 'agenxe' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'show_in_rest'       => true,
        'menu_icon'          => 'dashicons-list-view',
        'supports'           => array( 'title', 'thumbnail', 'editor', 'elementor' ),
        'rewrite'            => array( 'slug' => 'events' ),
        'menu_position' => 10,
    );

    register_post_type( 'agenxe_event', $args );


    $labels = array(

        'name'                       => esc_html__( 'Categories', 'taxonomy general name', 'agenxe' ),
        'singular_name'              => esc_html__( 'Category', 'taxonomy singular name', 'agenxe' ),
        'search_items'               => esc_html__( 'Search Categorys', 'agenxe' ),
        'popular_items'              => esc_html__( 'Popular Categorys', 'agenxe' ),
        'all_items'                  => esc_html__( 'All Categorys', 'agenxe' ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => esc_html__( 'Edit Category', 'agenxe' ),
        'update_item'                => esc_html__( 'Update Category', 'agenxe' ),
        'add_new_item'               => esc_html__( 'Add New Category', 'agenxe' ),
        'new_item_name'              => esc_html__( 'New Category Name', 'agenxe' ),
        'separate_items_with_commas' => esc_html__( 'Separate Categorys with commas', 'agenxe' ),
        'add_or_remove_items'        => esc_html__( 'Add or remove Categorys', 'agenxe' ),
        'choose_from_most_used'      => esc_html__( 'Choose from the most used Categorys', 'agenxe' ),
        'not_found'                  => esc_html__( 'No Categorys found.', 'agenxe' ),
        'menu_name'                  => esc_html__( 'Categories', 'agenxe' ),
    );



    $args = array(

        'hierarchical'          => true,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'show_in_rest'          => true,
        'rewrite'               => array( 'slug' => 'event-category' ),
    );

    register_taxonomy( 'event_category', 'agenxe_event', $args );



    // Add new taxonomy, NOT hierarchical (like tags)

    $labels = array(

        'name'                       => esc_html__( 'Tags', 'taxonomy general name', 'agenxe' ),
        'singular_name'              => esc_html__( 'Tag', 'taxonomy singular name', 'agenxe' ),
        'search_items'               => esc_html__( 'Search Tags', 'agenxe' ),
        'popular_items'              => esc_html__( 'Popular Tags', 'agenxe' ),
        'all_items'                  => esc_html__( 'All Tags', 'agenxe' ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => esc_html__( 'Edit Tag', 'agenxe' ),
        'update_item'                => esc_html__( 'Update Tag', 'agenxe' ),
        'add_new_item'               => esc_html__( 'Add New Tag', 'agenxe' ),
        'new_item_name'              => esc_html__( 'New Tag Name', 'agenxe' ),
        'separate_items_with_commas' => esc_html__( 'Separate Tags with commas', 'agenxe' ),
        'add_or_remove_items'        => esc_html__( 'Add or remove Tags', 'agenxe' ),
        'choose_from_most_used'      => esc_html__( 'Choose from the most used Tags', 'agenxe' ),
        'not_found'                  => esc_html__( 'No Tags found.', 'agenxe' ),
        'menu_name'                  => esc_html__( 'Tags', 'agenxe' ),

    );

    $args = array(

        'hierarchical'          => false,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'show_in_rest'          => true,
        'rewrite'               => array( 'slug' => 'event-tag' ),
    );

    register_taxonomy( 'event_tag', 'agenxe_event', $args );
}

/**
 * Single Template
 */

// add_filter( 'single_template', 'agenxe_core_template_redirect' );

if( ! function_exists( 'agenxe_core_template_redirect' ) ){

    function agenxe_core_template_redirect( $single_template ){
        global $post;

        if( $post ){

            if( $post->post_type == 'agenxe_event' ){

                $single_template = AGENXE_CORE_PLUGIN_TEMP . 'single-agenxe_event.php';

            }
        }

        return $single_template;
    }

}


/**
 * Archive Template
 */

// add_filter( 'archive_template', 'agenxe_core_template_archive' );

if( ! function_exists( 'agenxe_core_template_archive' ) ){

    function agenxe_core_template_archive( $archive_template ){

        global $post;


        if( $post ){

            if( $post->post_type == 'agenxe_event' ){

                $archive_template = AGENXE_CORE_PLUGIN_TEMP . 'archive-agenxe_event.php';
            }
        }

        return $archive_template;
    }

}



// Add Image Size
add_image_size( 'agenxe_80X80', 80, 80, true );
add_image_size( 'agenxe_414X354', 414, 354, true );
add_image_size( 'agenxe_235X244', 235, 244, true );

remove_filter( 'render_block', 'wp_render_layout_support_flag', 10, 2 );
remove_filter( 'render_block', 'gutenberg_render_layout_support_flag', 10, 2 );
