<?php

/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

 /**
 * Only return default value if we don't have a post ID (in the 'post' query variable)
 *
 * @param  bool  $default On/Off (true/false)
 * @return mixed          Returns true or '', the blank default
 */
function agenxe_set_checkbox_default_for_new_post( $default ) {
	return isset( $_GET['post'] ) ? '' : ( $default ? (string) $default : '' );
}

add_action( 'cmb2_admin_init', 'agenxe_register_metabox' );

/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */

function agenxe_register_metabox() {

	$prefix = '_agenxe_';

	$prefixpage = '_agenxepage_';
	
	$agenxe_post_meta = new_cmb2_box( array(
		'id'            => $prefixpage . 'blog_post_control',
		'title'         => esc_html__( 'Post Thumb Controller', 'agenxe' ),
		'object_types'  => array( 'post' ), // Post type
		'closed'        => true
	) );

    $agenxe_post_meta->add_field( array(
        'name' => esc_html__( 'Post Format Video', 'agenxe' ),
        'desc' => esc_html__( 'Use This Field When Post Format Video', 'agenxe' ),
        'id'   => $prefix . 'post_format_video',
        'type' => 'text_url',
    ) );

	$agenxe_post_meta->add_field( array(
		'name' => esc_html__( 'Post Format Audio', 'agenxe' ),
		'desc' => esc_html__( 'Use This Field When Post Format Audio', 'agenxe' ),
		'id'   => $prefix . 'post_format_audio',
        'type' => 'oembed',
    ) );
	$agenxe_post_meta->add_field( array(
		'name' => esc_html__( 'Post Thumbnail For Slider', 'agenxe' ),
		'desc' => esc_html__( 'Use This Field When You Want A Slider In Post Thumbnail', 'agenxe' ),
		'id'   => $prefix . 'post_format_slider',
        'type' => 'file_list',
    ) );
	
	$agenxe_page_meta = new_cmb2_box( array(
		'id'            => $prefixpage . 'page_meta_section',
		'title'         => esc_html__( 'Page Meta', 'agenxe' ),
		'object_types'  => array( 'page', 'agenxe_event' ), // Post type
        'closed'        => true
    ) );

    $agenxe_page_meta->add_field( array(
		'name' => esc_html__( 'Page Breadcrumb Area', 'agenxe' ),
		'desc' => esc_html__( 'check to display page breadcrumb area.', 'agenxe' ),
		'id'   => $prefix . 'page_breadcrumb_area',
        'type' => 'select',
        'default' => '1',
        'options'   => array(
            '1'   => esc_html__('Show','agenxe'),
            '2'     => esc_html__('Hide','agenxe'),
        )
    ) );


    $agenxe_page_meta->add_field( array(
		'name' => esc_html__( 'Page Breadcrumb Settings', 'agenxe' ),
		'id'   => $prefix . 'page_breadcrumb_settings',
        'type' => 'select',
        'default'   => 'global',
        'options'   => array(
            'global'   => esc_html__('Global Settings','agenxe'),
            'page'     => esc_html__('Page Settings','agenxe'),
        )
	) );

    $agenxe_page_meta->add_field( array(
        'name'    => esc_html__( 'Breadcumb Image', 'agenxe' ),
        'desc'    => esc_html__( 'Upload an image or enter an URL.', 'agenxe' ),
        'id'      => $prefix . 'breadcumb_image',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
        ),
        'text'    => array(
            'add_upload_file_text' => __( 'Add File', 'agenxe' ) // Change upload button text. Default: "Add or Upload File"
        ),
        'preview_size' => 'large', // Image size to use when previewing in the admin.
    ) );

    $agenxe_page_meta->add_field( array(
		'name' => esc_html__( 'Page Title', 'agenxe' ),
		'desc' => esc_html__( 'check to display Page Title.', 'agenxe' ),
		'id'   => $prefix . 'page_title',
        'type' => 'select',
        'default' => '1',
        'options'   => array(
            '1'   => esc_html__('Show','agenxe'),
            '2'     => esc_html__('Hide','agenxe'),
        )
	) );

    $agenxe_page_meta->add_field( array(
		'name' => esc_html__( 'Page Title Settings', 'agenxe' ),
		'id'   => $prefix . 'page_title_settings',
        'type' => 'select',
        'options'   => array(
            'default'  => esc_html__('Default Title','agenxe'),
            'custom'  => esc_html__('Custom Title','agenxe'),
        ),
        'default'   => 'default'
    ) );

    $agenxe_page_meta->add_field( array(
		'name' => esc_html__( 'Custom Page Title', 'agenxe' ),
		'id'   => $prefix . 'custom_page_title',
        'type' => 'text'
    ) );

    $agenxe_page_meta->add_field( array(
		'name' => esc_html__( 'Breadcrumb', 'agenxe' ),
		'desc' => esc_html__( 'Select Show to display breadcrumb area', 'agenxe' ),
		'id'   => $prefix . 'page_breadcrumb_trigger',
        'type' => 'switch_btn',
        'default' => agenxe_set_checkbox_default_for_new_post( true ),
    ) );

    /* Page Grid Lines */
    $agenxe_grid_meta = new_cmb2_box( array(
		'id'            => $prefixpage . 'page_grid_meta_section',
		'title'         => esc_html__( 'Page Grid Line', 'agenxe' ),
		'object_types'  => array( 'page', 'agenxe_event' ), // Post type
        'closed'        => true
    ) );

    $agenxe_grid_meta->add_field( array(
		'name' => esc_html__( 'Page Grid Line Area', 'agenxe' ),
		'desc' => esc_html__( 'check to display page grid line area.', 'agenxe' ),
		'id'   => $prefix . 'page_grid_area',
        'type' => 'select',
        'default' => '1',
        'options'   => array(
            '1'   => esc_html__('Show','agenxe'),
            '2'     => esc_html__('Hide','agenxe'),
        )
    ) );

    $agenxe_layout_meta = new_cmb2_box( array(
		'id'            => $prefixpage . 'page_layout_section',
		'title'         => esc_html__( 'Page Layout', 'agenxe' ),
        'context' 		=> 'side',
        'priority' 		=> 'high',
        'object_types'  => array( 'page' ), // Post type
        'closed'        => true
	) );

	$agenxe_layout_meta->add_field( array(
		'desc'       => esc_html__( 'Set page layout container,container fluid,fullwidth or both. It\'s work only in template builder page.', 'agenxe' ),
		'id'         => $prefix . 'custom_page_layout',
		'type'       => 'radio',
        'options' => array(
            '1' => esc_html__( 'Container', 'agenxe' ),
            '2' => esc_html__( 'Container Fluid', 'agenxe' ),
            '3' => esc_html__( 'Fullwidth', 'agenxe' ),
        ),
	) );

	// code for body class//

    $agenxe_layout_meta->add_field( array(
	'name' => esc_html__( 'Insert Your Body Class', 'agenxe' ),
	'id'   => $prefix . 'custom_body_class',
	'type' => 'text'
    ) );

}

add_action( 'cmb2_admin_init', 'agenxe_register_taxonomy_metabox' );
/**
 * Hook in and add a metabox to add fields to taxonomy terms
 */
function agenxe_register_taxonomy_metabox() {

    $prefix = '_agenxe_';
	/**
	 * Metabox to add fields to categories and tags
	 */
	$agenxe_term_meta = new_cmb2_box( array(
		'id'               => $prefix.'term_edit',
		'title'            => esc_html__( 'Category Metabox', 'agenxe' ),
		'object_types'     => array( 'term' ),
		'taxonomies'       => array( 'category'),
	) );
	$agenxe_term_meta->add_field( array(
		'name'     => esc_html__( 'Extra Info', 'agenxe' ),
		'id'       => $prefix.'term_extra_info',
		'type'     => 'title',
		'on_front' => false,
	) );
	$agenxe_term_meta->add_field( array(
		'name' => esc_html__( 'Category Image', 'agenxe' ),
		'desc' => esc_html__( 'Set Category Image', 'agenxe' ),
		'id'   => $prefix.'term_avatar',
        'type' => 'file',
        'text'    => array(
			'add_upload_file_text' => esc_html__('Add Image','agenxe') // Change upload button text. Default: "Add or Upload File"
		),
	) );


	/**
	 * Metabox for the user profile screen
	 */
	$agenxe_user = new_cmb2_box( array(
		'id'               => $prefix.'user_edit',
		'title'            => esc_html__( 'User Profile Metabox', 'agenxe' ), // Doesn't output for user boxes
		'object_types'     => array( 'user' ), // Tells CMB2 to use user_meta as post_meta
		'show_names'       => true,
		'new_user_section' => 'add-new-user', // where form will show on new user page. 'add-existing-user' is only other valid option.
	) );
    $agenxe_user->add_field( array(
		'name' => esc_html__( 'Author Designation', 'agenxe' ),
		'desc' => esc_html__( 'Use This Field When Author Designation', 'agenxe' ),
		'id'   => $prefix . 'author_desig',
        'type' => 'text',
    ) );
	$agenxe_user->add_field( array(
		'name'     => esc_html__( 'Social Profile', 'agenxe' ),
		'id'       => $prefix.'user_extra_info',
		'type'     => 'title',
		'on_front' => false,
	) );

	$group_field_id = $agenxe_user->add_field( array(
        'id'          => $prefix .'social_profile_group',
        'type'        => 'group',
        'description' => __( 'Social Profile', 'agenxe' ),
        'options'     => array(
            'group_title'       => __( 'Social Profile {#}', 'agenxe' ), // since version 1.1.4, {#} gets replaced by row number
            'add_button'        => __( 'Add Another Social Profile', 'agenxe' ),
            'remove_button'     => __( 'Remove Social Profile', 'agenxe' ),
            'closed'         => true
        ),
    ) );

    $agenxe_user->add_group_field( $group_field_id, array(
        'name'        => __( 'Icon Class', 'agenxe' ),
        'id'          => $prefix .'social_profile_icon',
        'type'        => 'text', // This field type
    ) );

    $agenxe_user->add_group_field( $group_field_id, array(
        'desc'       => esc_html__( 'Set social profile link.', 'agenxe' ),
        'id'         => $prefix . 'lawyer_social_profile_link',
        'name'       => esc_html__( 'Social Profile link', 'agenxe' ),
        'type'       => 'text'
    ) );
}
