<?php
// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( );
}
/**
 * @Packge    : agenxe
 * @version   : 1.0
 * @Author    : Themeholy
 * @Author URI: https://themeforest.net/user/themeholy
 */

// demo import file
function agenxe_import_files() {

	$demoImg = '<img src="'. AGENXE_DEMO_DIR_URI  .'screen-image.png" alt="'.esc_attr__('Demo Preview Imgae','agenxe').'" />';

    return array(
        array(
            'import_file_name'             => esc_html__('Agenxe Demo','agenxe'),
            'local_import_file'            =>  AGENXE_DEMO_DIR_PATH  . 'agenxe-demo.xml',
            'local_import_widget_file'     =>  AGENXE_DEMO_DIR_PATH  . 'agenxe-widgets-demo.json',
            'local_import_redux'           => array(
                array(
                    'file_path'   =>  AGENXE_DEMO_DIR_PATH . 'redux_options_demo.json',
                    'option_name' => 'agenxe_opt',
                ),
            ),
            'import_notice' => $demoImg,
        ),
    );
}
add_filter( 'pt-ocdi/import_files', 'agenxe_import_files' );

// demo import setup
function agenxe_after_import_setup() {
	// Assign menus to their locations.

	$primary_menu  		= get_term_by( 'name', 'Main Menu', 'nav_menu' );
	$footer_menu  		= get_term_by( 'name', 'Footer Menu', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
			'primary-menu'   	=> $primary_menu->term_id,
			'footer-menu'   	=> $footer_menu->term_id,
		)
	);

	// Assign front page and posts page (blog page).
	$front_page_id 	= get_page_by_title( 'Home' );
	$blog_page_id  	= get_page_by_title( 'Blog' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );

    
}
add_action( 'pt-ocdi/after_import', 'agenxe_after_import_setup' );


//disable the branding notice after successful demo import
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

//change the location, title and other parameters of the plugin page
function agenxe_import_plugin_page_setup( $default_settings ) {
	$default_settings['parent_slug'] = 'themes.php';
	$default_settings['page_title']  = esc_html__( 'Agenxe Demo Import' , 'agenxe' );
	$default_settings['menu_title']  = esc_html__( 'Import Demo Data' , 'agenxe' );
	$default_settings['capability']  = 'import';
	$default_settings['menu_slug']   = 'agenxe-demo-import';

	return $default_settings;
}
add_filter( 'pt-ocdi/plugin_page_setup', 'agenxe_import_plugin_page_setup' );

// Enqueue scripts
function agenxe_demo_import_custom_scripts(){
	if( isset( $_GET['page'] ) && $_GET['page'] == 'agenxe-demo-import' ){
		// style
		wp_enqueue_style( 'agenxe-demo-import', AGENXE_DEMO_DIR_URI.'css/agenxe.demo.import.css', array(), '1.0', false );
	}
}
add_action( 'admin_enqueue_scripts', 'agenxe_demo_import_custom_scripts' );