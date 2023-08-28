<?php
// Block direct access
if( !defined( 'ABSPATH' ) ){
    exit();
}
/**
 * @Packge     : Agenxe
 * @Version    : 1.0
 * @Author     : Themeholy
 * @Author URI : https://themeforest.net/user/themeholy
 *
 */

// enqueue css
function agenxe_common_custom_css(){
	wp_enqueue_style( 'agenxe-color-schemes', get_template_directory_uri().'/assets/css/color.schemes.css' );

    $CustomCssOpt  = agenxe_opt( 'agenxe_css_editor' );
	if( $CustomCssOpt ){
		$CustomCssOpt = $CustomCssOpt;
	}else{
		$CustomCssOpt = '';
	}

    $customcss = "";
    
    if( get_header_image() ){
        $agenxe_header_bg =  get_header_image();
    }else{
        if( agenxe_meta( 'page_breadcrumb_settings' ) == 'page' ){
            if( ! empty( agenxe_meta( 'breadcumb_image' ) ) ){
                $agenxe_header_bg = agenxe_meta( 'breadcumb_image' );
            }
        }
    }
    
    if( !empty( $agenxe_header_bg ) ){
        $customcss .= ".breadcumb-wrapper{
            background-image:url('{$agenxe_header_bg}')!important;
        }";
    }
    
	// theme color
	$agenxethemecolor = agenxe_opt('agenxe_theme_color');

    list($r, $g, $b) = sscanf( $agenxethemecolor, "#%02x%02x%02x");

    $agenxe_real_color = $r.','.$g.','.$b;
	if( !empty( $agenxethemecolor ) ) {
		$customcss .= ":root {
		  --theme-color: rgb({$agenxe_real_color});
		}";
	}

	if( !empty( $CustomCssOpt ) ){
		$customcss .= $CustomCssOpt;
	}

    wp_add_inline_style( 'agenxe-color-schemes', $customcss );
}
add_action( 'wp_enqueue_scripts', 'agenxe_common_custom_css', 100 );