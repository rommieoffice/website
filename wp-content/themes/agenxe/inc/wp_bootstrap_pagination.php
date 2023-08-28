<?php
// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}

/**
 *
 * @Packge      Agenxe
 * @Author      Themeholy
 * @Author URL  https://themeforest.net/user/themeholy
 * @version     1.0
 *
 */

function agenxe_pagination( $args = array() ) {

    $allowhtml = array(
        'p'         => array(
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
        'li'        => array(
            'class'     => array(),
        ),
    );
    
    $defaults = array(
        'range'           => 4,
        'custom_query'    => FALSE,
        'previous_string' => esc_html__( '&laquo;', 'agenxe' ),
        'next_string'     => esc_html__( '&raquo;', 'agenxe' ),
        'before_output'   => '',
        'after_output'    => ''
    );
    
    $args = wp_parse_args( 
        $args, 
        apply_filters( 'agenxe_pagination_defaults', $defaults )
    );
    
    $args['range'] = (int) $args['range'] - 1;
    if ( !$args['custom_query'] )
        $args['custom_query'] = $GLOBALS['wp_query'];
    $count = (int) $args['custom_query']->max_num_pages;
    $page  = intval( get_query_var( 'paged' ) );
    $ceil  = ceil( $args['range'] / 2 );
    
    if ( $count <= 1 )
        return FALSE;
    
    if ( !$page )
        $page = 1;
    
    if ( $count > $args['range'] ) {
        if ( $page <= $args['range'] ) {
            $min = 1;
            $max = $args['range'] + 1;
        } elseif ( $page >= ($count - $ceil) ) {
            $min = $count - $args['range'];
            $max = $count;
        } elseif ( $page >= $args['range'] && $page < ($count - $ceil) ) {
            $min = $page - $ceil;
            $max = $page + $ceil;
        }
    } else {
        $min = 1;
        $max = $count;
    }
    
    $echo = '';
    
    if ( !empty($min) && !empty($max) ) {
        for( $i = $min; $i <= $max; $i++ ) {
            
            $pagelinkval = (int)$i;
                
            if ( $page == $i ) {
                $echo .= '<li><a class="active">' . esc_html($pagelinkval) . '</a></li>';
            } else {
                $echo .= sprintf( '<li><a href="%s">%s</a></li>', esc_url( get_pagenum_link($i) ), esc_html($pagelinkval) );
            }
        }
    }
    
    if ( isset($echo) )
        return wp_kses( $args['before_output'] . $echo . $args['after_output'], $allowhtml );
}