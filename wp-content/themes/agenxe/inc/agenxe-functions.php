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
    exit;
}

 // theme option callback
function agenxe_opt( $id = null, $url = null ){
    global $agenxe_opt;

    if( $id && $url ){

        if( isset( $agenxe_opt[$id][$url] ) && $agenxe_opt[$id][$url] ){
            return $agenxe_opt[$id][$url];
        }
    }else{
        if( isset( $agenxe_opt[$id] )  && $agenxe_opt[$id] ){
            return $agenxe_opt[$id];
        }
    }
}


// theme logo
function agenxe_theme_logo() {
    // escaping allow html
    $allowhtml = array(
        'a'    => array(
            'href' => array()
        ),
        'span' => array(),
        'i'    => array(
            'class' => array()
        )
    );
    $siteUrl = home_url('/');
    if( has_custom_logo() ) {
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $siteLogo = '';
        $siteLogo .= '<a class="logo" href="'.esc_url( $siteUrl ).'">';
        $siteLogo .= agenxe_img_tag( array(
            "class" => "img-fluid",
            "url"   => esc_url( wp_get_attachment_image_url( $custom_logo_id, 'full') )
        ) );
        $siteLogo .= '</a>';

        return $siteLogo;
    } elseif( !agenxe_opt('agenxe_text_title') && agenxe_opt('agenxe_site_logo', 'url' )  ){

        $siteLogo = '<img class="img-fluid" src="'.esc_url( agenxe_opt('agenxe_site_logo', 'url' ) ).'" alt="'.esc_attr__( 'logo', 'agenxe' ).'" />';
        return '<a class="logo" href="'.esc_url( $siteUrl ).'">'.$siteLogo.'</a>';


    }elseif( agenxe_opt('agenxe_text_title') ){
        return '<h2 class="mb-0"><a class="logo" href="'.esc_url( $siteUrl ).'">'.wp_kses( agenxe_opt('agenxe_text_title'), $allowhtml ).'</a></h2>';
    }else{
        return '<h2 class="mb-0"><a class="logo" href="'.esc_url( $siteUrl ).'">'.esc_html( get_bloginfo('name') ).'</a></h2>';
    }
}

// custom meta id callback
function agenxe_meta( $id = '' ){
    $value = get_post_meta( get_the_ID(), '_agenxe_'.$id, true );
    return $value;
}


// Blog Date Permalink
function agenxe_blog_date_permalink() {
    $year  = get_the_time('Y');
    $month_link = get_the_time('m');
    $day   = get_the_time('d');
    $link = get_day_link( $year, $month_link, $day);
    return $link;
}

//audio format iframe match
function agenxe_iframe_match() {
    $audio_content = agenxe_embedded_media( array('audio', 'iframe') );
    $iframe_match = preg_match("/\iframe\b/i",$audio_content, $match);
    return $iframe_match;
}


//Post embedded media
function agenxe_embedded_media( $type = array() ){
    $content = do_shortcode( apply_filters( 'the_content', get_the_content() ) );
    $embed   = get_media_embedded_in_content( $content, $type );


    if( in_array( 'audio' , $type) ){
        if( count( $embed ) > 0 ){
            $output = str_replace( '?visual=true', '?visual=false', $embed[0] );
        }else{
           $output = '';
        }

    }else{
        if( count( $embed ) > 0 ){
            $output = $embed[0];
        }else{
           $output = '';
        }
    }
    return $output;
}


// WP post link pages
function agenxe_link_pages(){
    wp_link_pages( array(
        'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'agenxe' ) . '</span>',
        'after'       => '</div>',
        'link_before' => '<span>',
        'link_after'  => '</span>',
        'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'agenxe' ) . ' </span>%',
        'separator'   => '<span class="screen-reader-text">, </span>',
    ) );
}


// Data Background image attr
function agenxe_data_bg_attr( $imgUrl = '' ){
    return 'data-bg-img="'.esc_url( $imgUrl ).'"';
}

// image alt tag
function agenxe_image_alt( $url = '' ){
    if( $url != '' ){
        // attachment id by url
        $attachmentid = attachment_url_to_postid( esc_url( $url ) );
       // attachment alt tag
        $image_alt = get_post_meta( esc_html( $attachmentid ) , '_wp_attachment_image_alt', true );
        if( $image_alt ){
            return $image_alt ;
        }else{
            $filename = pathinfo( esc_url( $url ) );
            $alt = str_replace( '-', ' ', $filename['filename'] );
            return $alt;
        }
    }else{
       return;
    }
}


// Flat Content wysiwyg output with meta key and post id

function agenxe_get_textareahtml_output( $content ) {
    global $wp_embed;

    $content = $wp_embed->autoembed( $content );
    $content = $wp_embed->run_shortcode( $content );
    $content = wpautop( $content );
    $content = do_shortcode( $content );

    return $content;
}

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */

function agenxe_pingback_header() {
    if ( is_singular() && pings_open() ) {
        echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
    }
}
add_action( 'wp_head', 'agenxe_pingback_header' );


// Excerpt More
function agenxe_excerpt_more( $more ) {
    return '...';
}

add_filter( 'excerpt_more', 'agenxe_excerpt_more' );


// agenxe comment template callback
function agenxe_comment_callback( $comment, $args, $depth ) {
        $add_below = 'comment';
    ?>
    <li <?php comment_class( array('th-comment-item') ); ?>>
        <div id="comment-<?php comment_ID() ?>" class="th-post-comment">
            <?php
                if( get_avatar( $comment, 100 )  ) :
            ?>
            <!-- Author Image -->
            <div class="comment-avater">
                <?php
                    if ( $args['avatar_size'] != 0 ) {
                        echo get_avatar( $comment, 110 );
                    }
                ?>
            </div>
            <!-- Author Image -->
            <?php endif; ?>
            <!-- Comment Content -->
            <div class="comment-content">
                <h3 class="name"><?php echo esc_html( ucwords( get_comment_author() ) ); ?></h3>
                <span class="commented-on"><i class="fal fa-calendar-alt"></i><?php printf( esc_html__('%1$s', 'agenxe'), get_comment_date() ); ?></span>

                <p class="text"><?php echo get_comment_text(); ?></p>
                
                <div class="reply_and_edit">
                    <?php
                        $reply_text = wp_kses_post( '<i class="fas fa-reply"></i> Reply', 'agenxe' );

                        $edit_reply_text = wp_kses_post( '<i class="fas fa-pencil-alt"></i> Edit', 'agenxe' );

                        comment_reply_link(array_merge( $args, array( 'add_below' => $add_below, 'depth' => 3, 'max_depth' => 5, 'reply_text' => $reply_text ) ) );
                    ?>  
                </div>
                <?php if ( $comment->comment_approved == '0' ) : ?>
                <p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'agenxe' ); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <!-- Comment Content -->
<?php
}

//body class
add_filter( 'body_class', 'agenxe_body_class' );
function agenxe_body_class( $classes ) {
    if( class_exists('ReduxFramework') ) {
        $agenxe_blog_single_sidebar = agenxe_opt('agenxe_blog_single_sidebar');
        if( ($agenxe_blog_single_sidebar != '2' && $agenxe_blog_single_sidebar != '3' ) || ! is_active_sidebar('agenxe-blog-sidebar') ) {
            $classes[] = 'no-sidebar';
        }
        $new_class = is_page() ? agenxe_meta('custom_body_class') : null;

        if ( $new_class ) {
            $classes[] = $new_class;
        }
    } else {
        if( !is_active_sidebar('agenxe-blog-sidebar') ) {
            $classes[] = 'no-sidebar';
        }
    }
    $classes[] = 'dark-theme';
    return $classes;
}


function agenxe_footer_global_option(){

    // Agenxe Widget Enable Disable
    if( class_exists( 'ReduxFramework' ) ){
        $agenxe_footer_cta_enable = agenxe_opt( 'agenxe_footer_cta_enable' );
        $agenxe_footer_widget_enable = agenxe_opt( 'agenxe_footerwidget_enable' );
        $agenxe_footer_bottom_active = agenxe_opt( 'agenxe_disable_footer_bottom' );
    }else{
        $agenxe_footer_cta_enable = '';
        $agenxe_footer_widget_enable = '';
        $agenxe_footer_bottom_active = '1';
    }
    $allowhtml = array(
        'p'         => array(
            'class'     => array()
        ),
        'i'         => array(
            'class'     => array()
        ),
        'span'      => array(
            'class'     => array(),
        ),
        'a'         => array(
            'href'      => array(),
            'title'     => array(),
            'class'     => array(),
        ),
        'br'        => array(),
        'em'        => array(),
        'strong'    => array(),
        'b'         => array(),
    );
    if( $agenxe_footer_widget_enable == '1' || $agenxe_footer_bottom_active == '1' ){
        echo '<!---footer-wrapper start-->';
        echo '<footer class="footer-wrapper footer-layout1" data-bg-src="'.esc_url( agenxe_opt('agenxe_footer_background', 'background-image' ) ).'">';
            if( $agenxe_footer_cta_enable == '1' ){
                echo '<div class="cta-area-1">';
                    echo '<div class="container">';
                        echo '<div class="row align-items-center justify-content-between">';
                            echo '<div class="col-lg-auto">';
                                echo '<div class="title-area mb-lg-0 text-lg-start text-center">';
                                    echo '<h2 class="sec-title mb-0 cta-title">'.wp_kses_post(agenxe_opt('agenxe_cta_title' )).'</h2>';
                                echo '</div>';
                            echo '</div>';
                            echo '<div class="col-lg-auto text-center">';
                                echo '<a href="'.esc_url(agenxe_opt('agenxe_cta_btn_url' )).'" class="th-btn th_btn">'.wp_kses_post(agenxe_opt('agenxe_cta_btn_text' )).'</a>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }
            if( $agenxe_footer_widget_enable == '1' ){
                if( ( is_active_sidebar( 'agenxe-footer-1' ) || is_active_sidebar( 'agenxe-footer-2' ) || is_active_sidebar( 'agenxe-footer-3' ) )) {
                    echo '<div class="widget-area">';
                        echo '<div class="container">';
                                echo '<div class="row justify-content-between">';
                                    if( is_active_sidebar( 'agenxe-footer-1' )){
                                    dynamic_sidebar( 'agenxe-footer-1' ); 
                                    }
                                    if( is_active_sidebar( 'agenxe-footer-2' )){
                                    dynamic_sidebar( 'agenxe-footer-2' ); 
                                    }
                                    if( is_active_sidebar( 'agenxe-footer-3' )){
                                    dynamic_sidebar( 'agenxe-footer-3' ); 
                                    } 
                                    if( is_active_sidebar( 'agenxe-footer-4' )){
                                    dynamic_sidebar( 'agenxe-footer-4' ); 
                                    }  
                                echo '</div>';
                        echo '</div>';
                    echo '</div>';
                }
            }

            if( $agenxe_footer_bottom_active == '1' ){
                $class = has_nav_menu( 'footer-menu' ) ? 'justify-content-between align-items-center' : 'justify-content-center';
                echo '<div class="container">';
                    echo '<div class="copyright-wrap">';
                        echo '<div class="row '.$class.'">';
                            echo '<div class="col-md-6">';
                                    echo '<p class="copyright-text">'.wp_kses( agenxe_opt( 'agenxe_copyright_text' ), $allowhtml ).'</p>';
                            echo '</div>';
                            if( has_nav_menu( 'footer-menu' ) ) {
                            echo '<div class="col-md-6 text-end d-none d-md-block">';
                                echo '<div class="footer-links">';
                                    wp_nav_menu( array(
                                        "theme_location"    => 'footer-menu',
                                        "container"         => '',
                                        "menu_class"        => ''
                                    ) ); 

                                echo '</div>';
                            echo '</div>';
                            }
                         echo '</div>';
                    echo '</div>';
                echo '</div>';
            }

        echo '</footer>';
        echo '<!---footer-wrapper end-->';
    }
}

// Social link
function agenxe_social_icon(){
    $agenxe_social_icon = agenxe_opt( 'agenxe_social_links' );
    if( ! empty( $agenxe_social_icon ) && isset( $agenxe_social_icon ) ){
        foreach( $agenxe_social_icon as $social_icon ){
                echo '<a href="'.esc_url( $social_icon['url'] ).'"><i class="'.esc_attr( $social_icon['title'] ).'"></i>'.esc_attr( $social_icon['description'] ).'</a>';
        }
    }
}


// global header
function agenxe_global_header_option() {

    if( class_exists( 'ReduxFramework' ) ){ ?>
        <header class="th-header header-layout1 prebuilt">
        <?php

        echo agenxe_header_cart_offcanvas();
        echo agenxe_mobile_menu();
        echo agenxe_search_box();

        ?>
            <div class="sticky-wrapper">
                <!-- Main Menu Area -->
                <div class="menu-area">
                    <div class="container th-container">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-auto">
                                <div class="header-logo">
                                    <?php echo agenxe_theme_logo(); ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <nav class="main-menu d-none d-lg-inline-block">
                                    <?php 
                                        wp_nav_menu( array(
                                            "theme_location"    => 'primary-menu',
                                            "container"         => '',
                                            "menu_class"        => ''
                                        ) ); 
                                    ?>
                                </nav>
                                <button type="button" class="th-menu-toggle d-block d-lg-none"><i class="far fa-bars"></i></button>
                            </div>
                            <div class="col-auto d-none d-lg-block">
                                <div class="header-button">
                                    <?php if(!empty(agenxe_opt( 'agenxe_header_search_switcher' )) ): ?>
                                        <button type="button" class="simple-icon searchBoxToggler"><i class="far fa-search"></i></button>
                                    <?php endif; ?> 
                                    <?php if(!empty(agenxe_opt( 'agenxe_header_cart_switcher' )) ): 
                                            if( class_exists( 'woocommerce' ) ):
                                                global $woocommerce;
                                                if( ! empty( $woocommerce->cart->cart_contents_count ) ){
                                                    $count = $woocommerce->cart->cart_contents_count;
                                                }else{
                                                    $count = "0";
                                                }
                                        ?>
                                        <button type="button" class="simple-icon sideMenuToggler">
                                            <i class="far fa-shopping-cart"></i>
                                            <span class="badge"><?php echo esc_html( $count ) ?></span>
                                        </button>
                                    <?php endif; endif; ?> 
                                    <?php 
                                        if(!empty(agenxe_opt( 'agenxe_btn_switcher' )) && !empty(agenxe_opt( 'agenxe_btn_text' )) ): 
                                        ?>
                                            <a href="<?php echo esc_url(agenxe_opt( 'agenxe_btn_url' )) ?>" class="th-btn th_btn"><?php echo wp_kses_post(agenxe_opt( 'agenxe_btn_text' )) ?></a>
                                    <?php endif; ?> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    <?php
    }else{
        echo agenxe_global_header();
    }
}

if( ! function_exists( 'agenxe_header_menu_topbar' ) ){
    function agenxe_header_menu_topbar(){
        if( class_exists( 'ReduxFramework' ) ){
            $agenxe_header_topbar_switcher  = agenxe_opt( 'agenxe_header_topbar_switcher' );
            $agenxe_show_social_icon        = agenxe_opt( 'agenxe_header_topbar_social_icon_switcher' );
        }else{
            $agenxe_header_topbar_switcher  = '';
            $agenxe_show_social_icon        = '';
        }

        if( $agenxe_header_topbar_switcher ){
            $allowhtml = array(
                'a'    => array(
                    'href' => array(),
                    'class' => array()
                ),
                'u'    => array(
                    'class' => array()
                ),
                'span' => array(
                    'class' => array()
                ),
                'i'    => array(
                    'class' => array()
                )
            );
            $phone     = agenxe_opt( 'agenxe_topbar_phone' );
            $email     = agenxe_opt( 'agenxe_topbar_email' );

            $email          = is_email( $email );

            $replace        = array(' ','-',' - ');
            $replace_phoone = array(' ','-',' - ', '(', ')');
            $with           = array('','','');

            $phoneurl       = str_replace( $replace_phoone, $with, $phone );
            $emailurl       = str_replace( $replace, $with, $email );

            $phone_icon     = agenxe_opt( 'agenxe_topbar_phone_icon' );
            $email_icon     = agenxe_opt( 'agenxe_topbar_email_icon' );

            ?>
            <div class="header-top">
                <div class="container">
                    <div class="row justify-content-center justify-content-lg-between align-items-center gy-2">
                        <div class="col-auto d-none d-lg-block">
                            <div class="header-links">
                                <ul>
                                    <li><?php echo wp_kses_post($phone_icon); ?><a href="<?php echo esc_attr( 'tel:'.$phoneurl ) ?>"><?php echo esc_html( $phone ); ?></a></li>
                                    <li><?php echo wp_kses_post($email_icon); ?><a href="<?php echo esc_attr('mailto:' . $emailurl); ?>"><?php echo esc_html( $email ); ?></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="header-right">
                                <?php if(!empty(agenxe_opt( 'agenxe_header_lang_switcher' )) ): ?>
                                <div class="langauge lang-dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false"><?php echo esc_html__( 'Language', 'agenxe' );?></a>
				                        <div class="list dropdown-menu" aria-labelledby="dropdownMenuLink1">
				                            <?php  echo do_shortcode('[gtranslate]'); ?>
				                        </div>
                                </div>
                                <?php endif; ?>
                                <?php  if($agenxe_show_social_icon ): ?>
                                <div class="header-social">
                                    <?php echo agenxe_social_icon(); ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         
        <?php
        }
    }
}

// agenxe woocommerce breadcrumb
function agenxe_woo_breadcrumb( $args ) {
    return array(
        'delimiter'   => '',
        'wrap_before' => '<ul class="breadcumb-menu">',
        'wrap_after'  => '</ul>',
        'before'      => '<li>',
        'after'       => '</li>',
        'home'        => _x( 'Home', 'breadcrumb', 'agenxe' ),
    );
}

add_filter( 'woocommerce_breadcrumb_defaults', 'agenxe_woo_breadcrumb' );

function agenxe_custom_search_form( $class ) {
    echo '<!-- Search Form -->';

    echo '<form role="search" method="get" action="'.esc_url( home_url( '/' ) ).'" class="'.esc_attr( $class ).'">';
        echo '<label class="searchIcon">';
            echo agenxe_img_tag( array(
                "url"   => esc_url( get_theme_file_uri( '/assets/img/search-2.svg' ) ),
                "class" => "svg"
            ) );
            echo '<input value="'.esc_html( get_search_query() ).'" name="s" required type="search" placeholder="'.esc_attr__('What are you looking for?', 'agenxe').'">';
        echo '</label>';
    echo '</form>';
    echo '<!-- End Search Form -->';
}



//Fire the wp_body_open action.
if ( ! function_exists( 'wp_body_open' ) ) {
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
}

//Remove Tag-Clouds inline style
add_filter( 'wp_generate_tag_cloud', 'agenxe_remove_tagcloud_inline_style',10,1 );
function agenxe_remove_tagcloud_inline_style( $input ){
   return preg_replace('/ style=("|\')(.*?)("|\')/','',$input );
}

/* This code filters the Categories archive widget to include the post count inside the link */
add_filter( 'wp_list_categories', 'agenxe_cat_count_span' );
function agenxe_cat_count_span( $links ) {
    $links = str_replace('</a> (', '</a> <span class="category-number">', $links);
    $links = str_replace(')', '</span>', $links);
    return $links;
}

/* This code filters the Archive widget to include the post count inside the link */
add_filter( 'get_archives_link', 'agenxe_archive_count_span' );
function agenxe_archive_count_span( $links ) {
    $links = str_replace('</a>&nbsp;(', '</a> <span class="category-number">', $links);
    $links = str_replace(')', '</span>', $links);
    return $links;
}

//header search box
if(! function_exists('agenxe_search_box')){
    function agenxe_search_box(){
        echo '<div class="popup-search-box d-none d-lg-block">';
            echo '<button class="searchClose"><i class="fal fa-times"></i></button>';
            echo '<form role="search" method="get" action="'.esc_url( home_url( '/' ) ).'">';
                echo '<input value="'.esc_html( get_search_query() ).'" name="s" required type="search" placeholder="'.esc_attr__('What are you looking for?', 'agenxe').'">';
                echo '<button type="submit"><i class="fal fa-search"></i></button>';
            echo '</form>';
        echo '</div>';
    }
}


// Agenxe Default Header
if( ! function_exists( 'agenxe_global_header' ) ){
    function agenxe_global_header(){ ?>

        <!--Mobile menu & Search box-->
        <?php 
        echo agenxe_search_box(); 
        echo agenxe_mobile_menu(); 
        
        ?>

        <!--======== Header ========-->
        <header class="th-header header-layout1 unittest-header">
            <div class="sticky-wrapper">
                <div class="sticky-active">
                    <div class="menu-area">
                        <div class="container">
                            <div class="row gx-20 align-items-center justify-content-between">

                                <div class="col-auto">
                                    <div class="header-logo">
                                       <?php echo agenxe_theme_logo(); ?>
                                    </div>
                                </div>

                                <div class="col-auto">
                                    <?php
                                    if( has_nav_menu( 'primary-menu' ) ) { ?>
                                        <nav class="main-menu d-none d-lg-inline-block">
                                            <?php
                                            wp_nav_menu( array(
                                                "theme_location"    => 'primary-menu',
                                                "container"         => '',
                                                "menu_class"        => ''
                                            ) ); ?>
                                        </nav>
                                    <?php } ?>                                   
                                    </nav>
                                    <button type="button" class="th-menu-toggle d-inline-block d-lg-none"><i class="far fa-bars"></i></button>
                                </div>
                                <div class="col-auto d-none d-xl-block">
                                    <div class="header-button">
                                        <button type="button" class="icon-btn searchBoxToggler"><i class="far fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="menu-bg"></div>
                </div>
            </div>
        </header>
    <?php
    }
}


//header Offcanvas
if( ! function_exists( 'agenxe_header_offcanvas' ) ){
    function agenxe_header_offcanvas(){
        ?>
    <div class="sidemenu-wrapper d-none d-lg-block">
        <div class="sidemenu-content">
            <button class="closeButton sideMenuCls"><i class="far fa-times"></i></button>
             <?php 
                if(is_active_sidebar('agenxe-offcanvas')){
                    dynamic_sidebar( 'agenxe-offcanvas' );
                }else{
                    echo '<h4 class="text-white">No Widget Added </h4>';
                    echo '<p class="text-white">Please add some widget in Offcanvs Sidebar</p>';
                }
            ?>
        </div>
    </div>
    
<?php
    }
}

//header Cart Offcanvas
if( ! function_exists( 'agenxe_header_cart_offcanvas' ) ){
    function agenxe_header_cart_offcanvas(){
        ?>
    <div class="sidemenu-wrapper shopping-cart d-none d-lg-block">
        <div class="sidemenu-content">
        <button class="closeButton sideMenuCls style2"><i class="far fa-times"></i></button>
            <div class="widget woocommerce widget_shopping_cart style2">
                <h3 class="widget_title style2"><?php echo esc_html__( 'Shopping cart', 'agenxe' ); ?></h3>
                <div class="widget_shopping_cart_content">
                     <?php // echo woocommerce_mini_cart(); ?>
                    
                </div>
            </div>
        </div>
    </div>

<?php
    }
}

// mobile logo
function agenxe_mobile_logo() {
    $logo_url = agenxe_opt('agenxe_mobile_logo', 'url' );
    $mobile_menu = '';
    if( !empty($logo_url )){
        $mobile_menu = '<div class="mobile-logo"><a href="'.home_url('/').'"><img src="'.esc_url($logo_url).'" alt="'.esc_attr__( 'logo', 'agenxe' ).'"></a></div>';
    }else{
        $mobile_menu .= '<div class="mobile-logo">';
        $mobile_menu .= agenxe_theme_logo();
        $mobile_menu .= '</div>';
    }

    return $mobile_menu;
 }

//header Mobile Menu
if( ! function_exists( 'agenxe_mobile_menu' ) ){
    function agenxe_mobile_menu(){
    ?>
    <div class="th-menu-wrapper">
        <div class="th-menu-area text-center">
            <button class="th-menu-toggle"><i class="fal fa-times"></i></button>
            <?php  if( class_exists('ReduxFramework') ):?>
                <?php 
                    if(!empty(agenxe_opt('agenxe_menu_menu_show') )){
                        echo agenxe_mobile_logo(); 
                    }
                ?>
            <?php else: ?>
                <div class="mobile-logo">
                    <?php echo agenxe_theme_logo(); ?>
                </div>
            <?php endif; ?>
            <div class="th-mobile-menu">
                <?php 
                    if( has_nav_menu( 'primary-menu' ) ){
                        wp_nav_menu( array(
                            "theme_location"    => 'primary-menu',
                            "container"         => '',
                            "menu_class"        => ''
                        ) );
                    }
                ?>
            </div>
        </div>
    </div>

<?php
    }
}



// Blog post views function
function agenxe_setPostViews( $postID ) {
    $count_key  = 'post_views_count';
    $count      = get_post_meta( $postID, $count_key, true );
    if( $count == '' ){
        $count = 0;
        delete_post_meta( $postID, $count_key );
        add_post_meta( $postID, $count_key, '0' );
    }else{
        $count++;
        update_post_meta( $postID, $count_key, $count );
    }
}

function agenxe_getPostViews( $postID ){
    $count_key  = 'post_views_count';
    $count      = get_post_meta( $postID, $count_key, true );
    if( $count == '' ){
        delete_post_meta( $postID, $count_key );
        add_post_meta( $postID, $count_key, '0' );
        return __( '0', 'agenxe' );
    }
    return $count;
}


// Add Extra Class On Comment Reply Button
function agenxe_custom_comment_reply_link( $content ) {
    $extra_classes = 'reply-btn';
    return preg_replace( '/comment-reply-link/', 'comment-reply-link ' . $extra_classes, $content);
}

add_filter('comment_reply_link', 'agenxe_custom_comment_reply_link', 99);

// Add Extra Class On Edit Comment Link
function agenxe_custom_edit_comment_link( $content ) {
    $extra_classes = 'reply-btn';
    return preg_replace( '/comment-edit-link/', 'comment-edit-link ' . $extra_classes, $content);
}

add_filter('edit_comment_link', 'agenxe_custom_edit_comment_link', 99);


function agenxe_post_classes( $classes, $class, $post_id ) {
    if ( get_post_type() === 'post' ) {
        $classes[] = "th-blog blog-single has-post-thumbnail";
    }elseif( get_post_type() === 'product' ){
        // Return Class
    }elseif( get_post_type() === 'page' ){
        $classes[] = "page--item";
    }
    
    return $classes;
}
add_filter( 'post_class', 'agenxe_post_classes', 10, 3 );

// Contact form 7
add_filter('wpcf7_autop_or_not', '__return_false');