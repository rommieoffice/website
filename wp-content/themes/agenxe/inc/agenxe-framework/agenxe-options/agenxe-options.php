<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "agenxe_opt";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }


    $alowhtml = array(
        'p' => array(
            'class' => array()
        ),
        'span' => array()
    );


    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();

    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        // 'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Agenxe Options', 'agenxe' ),
        'page_title'           => esc_html__( 'Agenxe Options', 'agenxe' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );


    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => esc_html__( 'Theme Information 1', 'agenxe' ),
            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'agenxe' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => esc_html__( 'Theme Information 2', 'agenxe' ),
            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'agenxe' )
        )
    );
    Redux::set_help_tab( $opt_name, $tabs );

    // Set the help sidebar
    $content = esc_html__( '<p>This is the sidebar content, HTML is allowed.</p>', 'agenxe' );
    Redux::set_help_sidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */


    // -> START General Fields

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'General', 'agenxe' ),
        'id'               => 'agenxe_general',
        'customizer_width' => '450px',
        'icon'             => 'el el-cog',
        'fields'           => array(
            array(
                'id'       => 'agenxe_theme_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Theme Color', 'agenxe' ),
                'subtitle' => esc_html__( 'Set Theme Color', 'agenxe' )
            ),
            array(
                'id'       => 'agenxe_map_apikey',
                'type'     => 'text',
                'title'    => esc_html__( 'Map Api Key', 'agenxe' ),
                'subtitle' => esc_html__( 'Set Map Api Key', 'agenxe' ),
            ),
        )

    ) );

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Back To Top', 'agenxe' ),
        'id'               => 'agenxe_backtotop',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'agenxe_display_bcktotop',
                'type'     => 'switch',
                'title'    => esc_html__( 'Back To Top Button', 'agenxe' ),
                'subtitle' => esc_html__( 'Switch On to Display back to top button.', 'agenxe' ),
                'default'  => true,
                'on'       => esc_html__( 'Enabled', 'agenxe' ),
                'off'      => esc_html__( 'Disabled', 'agenxe' ),
            ),
            array(
                'id'       => 'agenxe_bcktotop_bg_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Background Color', 'agenxe' ),
                'subtitle' => esc_html__( 'Set Back to top button Background Color.', 'agenxe' ),
                'required' => array('agenxe_display_bcktotop','equals','1'),
                'output'   => array( 'background-color' =>'.scroll-top svg' ),
            ),
            array(
                'id'       => 'agenxe_bcktotop_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Color', 'agenxe' ),
                'subtitle' => esc_html__( 'Set Back to top Icon Color.', 'agenxe' ),
                'required' => array('agenxe_display_bcktotop','equals','1'),
                'output'   => array( '--theme-color' =>'.scroll-top:after' ),
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Preloader', 'agenxe' ),
        'id'               => 'agenxe_preloader',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'agenxe_display_preloader', 
                'type'     => 'switch',
                'title'    => esc_html__( 'Preloader', 'agenxe' ),
                'subtitle' => esc_html__( 'Switch Enabled to Display Preloader.', 'agenxe' ),
                'default'  => true,
                'on'       => esc_html__('Enabled','agenxe'),
                'off'      => esc_html__('Disabled','agenxe'),
            ),
        )
    ));

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Page Grid Lines', 'agenxe' ),
        'id'               => 'agenxe_grid_lines',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'agenxe_display_grid_line', 
                'type'     => 'switch',
                'title'    => esc_html__( 'Page Grid Line', 'agenxe' ),
                'subtitle' => esc_html__( 'Switch Enabled to Display Page Grid Line.', 'agenxe' ),
                'default'  => true,
                'on'       => esc_html__('Enabled','agenxe'),
                'off'      => esc_html__('Disabled','agenxe'),
            ),
        )
    ));

    /* End General Fields */

    /* Admin Lebel Fields */
    Redux::setSection( $opt_name, array(
        'title'             => esc_html__( 'Admin Label', 'agenxe' ),
        'id'                => 'agenxe_admin_label',
        'customizer_width'  => '450px',
        'subsection'        => true,
        'fields'            => array(
            array(
                'title'     => esc_html__( 'Admin Login Logo', 'agenxe' ),
                'subtitle'  => esc_html__( 'It belongs to the back-end of your website to log-in to admin panel.', 'agenxe' ),
                'id'        => 'agenxe_admin_login_logo',
                'type'      => 'media',
            ),
            array(
                'title'     => esc_html__( 'Custom CSS For admin', 'agenxe' ),
                'subtitle'  => esc_html__( 'Any CSS your write here will run in admin.', 'agenxe' ),
                'id'        => 'agenxe_theme_admin_custom_css',
                'type'      => 'ace_editor',
                'mode'      => 'css',
                'theme'     => 'chrome',
                'full_width'=> true,
            ),
        ),
    ) );

    // -> START Basic Fields
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header', 'agenxe' ),
        'id'               => 'agenxe_header',
        'customizer_width' => '400px',
        'icon'             => 'el el-credit-card',
        'fields'           => array(
            array(
                'id'       => 'agenxe_header_options',
                'type'     => 'button_set',
                'default'  => '1',
                'options'  => array(
                    "1"   => esc_html__('Prebuilt','agenxe'),
                    "2"      => esc_html__('Header Builder','agenxe'),
                ),
                'title'    => esc_html__( 'Header Options', 'agenxe' ),
                'subtitle' => esc_html__( 'Select header options.', 'agenxe' ),
            ),
            array(
                'id'       => 'agenxe_header_select_options',
                'type'     => 'select',
                'data'     => 'posts',
                'args'     => array(
                    'post_type'     => 'agenxe_header'
                ),
                'title'    => esc_html__( 'Header', 'agenxe' ),
                'subtitle' => esc_html__( 'Select header.', 'agenxe' ),
                'required' => array( 'agenxe_header_options', 'equals', '2' )
            ),
         
            array(
                'id'       => 'agenxe_header_topbar_bg_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Header Menu Background Color', 'agenxe' ),
                'subtitle' => esc_html__( 'Set Topbar Background Color', 'agenxe' ),
                'output'   => array( 'background-color'    =>  '.header-layout1.prebuilt .sticky-wrapper' ),
                'required' => array( 'agenxe_header_options', 'equals', '1' )
            ),
            array(
                'id'       => 'agenxe_header_search_switcher',
                'type'     => 'switch',
                'default'  => 1,
                'on'       => esc_html__( 'Show', 'agenxe' ),
                'off'      => esc_html__( 'Hide', 'agenxe' ),
                'title'    => esc_html__( 'Show Search Icon?', 'agenxe' ),
                'subtitle' => esc_html__( 'Click Show To Display Search Icon?', 'agenxe'),
                'required' => array( 'agenxe_header_options', 'equals', '1' )
            ),
            array(
                'id'       => 'agenxe_header_cart_switcher',
                'type'     => 'switch',
                'default'  => 1,
                'on'       => esc_html__( 'Show', 'agenxe' ),
                'off'      => esc_html__( 'Hide', 'agenxe' ),
                'title'    => esc_html__( 'Show Cart Icon?', 'agenxe' ),
                'subtitle' => esc_html__( 'Click Show To Display Cart Icon?', 'agenxe'),
                'required' => array( 'agenxe_header_options', 'equals', '1' ),
            ),
            array(
                'id'       => 'agenxe_btn_switcher',
                'type'     => 'switch',
                'default'  => 1,
                'on'       => esc_html__( 'Show', 'agenxe' ),
                'off'      => esc_html__( 'Hide', 'agenxe' ),
                'title'    => esc_html__( 'Button Show?', 'agenxe' ),
                'subtitle' => esc_html__( 'Click Show To Display Buttion?', 'agenxe'),
                'required' => array( 'agenxe_header_options', 'equals', '1' ),
            ),
            array(
                'id'       => 'agenxe_btn_text',
                'type'     => 'text',
                'validate' => 'html',
                'default'  => esc_html__( 'Let’s Talk', 'agenxe' ),
                'title'    => esc_html__( 'Button Text', 'agenxe' ),
                'subtitle' => esc_html__( 'Set Button Text', 'agenxe' ),
                'required' => array( 
                    array('agenxe_btn_switcher','equals','1') 
                )
            ),
            array(
                'id'       => 'agenxe_btn_url',
                'type'     => 'text',
                'default'  => esc_html__( '#', 'agenxe' ),
                'title'    => esc_html__( 'Button URL?', 'agenxe' ),
                'subtitle' => esc_html__( 'Set Button URL Here', 'agenxe' ),
                'required' => array( 
                    array('agenxe_btn_switcher','equals','1') 
                )
            ),
            array(
                'id'       => 'agenxe_btn_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Button Color', 'agenxe' ),
                'subtitle' => esc_html__( 'Set Header Button Color', 'agenxe' ),
                'output'   => array( 'color'    =>  '.prebuilt .th_btn' ),
                'required' => array( 
                    array('agenxe_btn_switcher','equals','1') 
                )
            ),
            array(
                'id'       => 'agenxe_btn_hover_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Button Hover Color', 'agenxe' ),
                'subtitle' => esc_html__( 'Set Button Hover Color', 'agenxe' ),
                'output'   => array( 'color'    =>  '.prebuilt .th_btn:hover' ),
                'required' => array( 
                    array('agenxe_btn_switcher','equals','1') 
                )
            ),
            array(
                'id'       => 'agenxe_btn_bg_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Button Background', 'agenxe' ),
                'subtitle' => esc_html__( 'Set Button Background Color', 'agenxe' ),
                'output'   => array( 'background-color'    =>  '.prebuilt .th_btn' ),
                'required' => array(  
                    array('agenxe_btn_switcher','equals','1') 
                )
            ),
            array(
                'id'       => 'agenxe_btn_bg_hover_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Button Background Hover', 'agenxe' ),
                'subtitle' => esc_html__( 'Set Button Background Hover Color', 'agenxe' ),
                'output'   => array( 'background-color'  =>  '.prebuilt .th_btn:after, .prebuilt .th_btn:before'),
                'required' => array( 
                    array('agenxe_btn_switcher','equals','1') 
                )
            ),
        ),
    ) );
    // -> START Header Logo
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header Logo', 'agenxe' ),
        'id'               => 'agenxe_header_logo_option',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'agenxe_site_logo',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Logo', 'agenxe' ),
                'compiler' => 'true',
                'subtitle' => esc_html__( 'Upload your site logo for header ( recommendation png format ).', 'agenxe' ),
            ),
            array(
                'id'       => 'agenxe_site_logo_dimensions',
                'type'     => 'dimensions',
                'units'    => array('px'),
                'title'    => esc_html__('Logo Dimensions (Width/Height).', 'agenxe'),
                'output'   => array('.header-logo .logo img'),
                'subtitle' => esc_html__('Set logo dimensions to choose width, height, and unit.', 'agenxe'),
            ),
            array(
                'id'       => 'agenxe_site_logomargin_dimensions',
                'type'     => 'spacing',
                'mode'     => 'margin',
                'output'   => array('.header-logo .logo img'),
                'units_extended' => 'false',
                'units'    => array('px'),
                'title'    => esc_html__('Logo Top and Bottom Margin.', 'agenxe'),
                'left'     => false,
                'right'    => false,
                'subtitle' => esc_html__('Set logo top and bottom margin.', 'agenxe'),
                'default'            => array(
                    'units'           => 'px'
                )
            ),
            array(
                'id'       => 'agenxe_text_title',
                'type'     => 'text',
                'validate' => 'html',
                'title'    => esc_html__( 'Text Logo', 'agenxe' ),
                'subtitle' => esc_html__( 'Write your logo text use as logo ( You can use span tag for text color ).', 'agenxe' ),
            )
        )
    ) );
    // -> End Header Logo

    // -> START Header Menu
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header Menu Style', 'agenxe' ),
        'id'               => 'agenxe_header_menu_option',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'agenxe_header_menu_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Menu Color', 'agenxe' ),
                'subtitle' => esc_html__( 'Set Menu Color', 'agenxe' ),
                'output'   => array( '--white-color'    =>  '.prebuilt .main-menu>ul>li>a' ),
            ),
            array(
                'id'       => 'agenxe_header_menu_hover_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Menu Hover Color', 'agenxe' ),
                'subtitle' => esc_html__( 'Set Menu Hover Color', 'agenxe' ),
                'output'   => array( '--theme-color'    =>  '.prebuilt .main-menu>ul>li>a:hover' ),
            ),
            array(
                'id'       => 'agenxe_header_submenu_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Submenu Color', 'agenxe' ),
                'subtitle' => esc_html__( 'Set Submenu Color', 'agenxe' ),
                'output'   => array( '--dark-color'    =>  '.prebuilt .main-menu ul.sub-menu li a' ),
            ),
            array(
                'id'       => 'agenxe_header_submenu_hover_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Submenu Hover Color', 'agenxe' ),
                'subtitle' => esc_html__( 'Set Submenu Hover Color', 'agenxe' ),
                'output'   => array( '--theme-color'    =>  '.prebuilt .main-menu ul.sub-menu li a:hover' ),
            ),
        )
    ) );
    // -> End Header Menu

     // -> START Mobile Menu
     Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Mobile Menu', 'agenxe' ), 
        'id'               => 'agenxe_mobile_menu_option',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'agenxe_menu_menu_show',
                'type'     => 'switch',
                'title'    => esc_html__( 'Mobile Menu Hide/Show', 'agenxe' ),
                'subtitle' => esc_html__( 'Hide / Show mobile menu ( Default settings SHOW ).', 'agenxe' ),
                'default'  => '1',
                'on'       => 'Show',
                'off'      => 'Hide',
            ),
            array(
                'id'       => 'agenxe_mobile_logo', 
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Logo', 'agenxe' ),
                'compiler' => 'true',
                'subtitle' => esc_html__( 'Upload your mobile logo for mobile menu ( recommendation png format ).', 'agenxe' ),
            ),
            array(
                'id'       => 'agenxe_mobile_logo_dimensions',
                'type'     => 'dimensions',
                'units'    => array('px'),
                'title'    => esc_html__('Logo Dimensions (Width/Height).', 'agenxe'),
                'output'   => array('.th-menu-wrapper .mobile-logo img'),
                'subtitle' => esc_html__('Set logo dimensions to choose width, height, and unit.', 'agenxe'),
            ),
            array(
                'id'       => 'agenxe_mobile_menu_bg',
                'type'     => 'color',
                'title'    => esc_html__( 'Logo Background', 'agenxe' ),
                'subtitle' => esc_html__( 'Set logo backgorund', 'agenxe' ),
                'output'   => array( 'background-color'    =>  '.th-menu-wrapper .mobile-logo' ),
            ),
    
        )
    ) );
    // -> End Mobile Menu


     // -> START Offcanvas Menu
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Offcanvas', 'agenxe' ),
        'id'               => 'agenxe_offcanvas_panel',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'agenxe_offcanvas_panel_bg',
                'type'     => 'background',
                'title'    => esc_html__( 'Offcanvas Panel Background', 'agenxe' ),
                'output'   => array('.sidemenu-wrapper .sidemenu-content'),
                'subtitle' => esc_html__( 'Set Offcanvas Panel Background Color', 'agenxe' ),
            ),
            array(
                'id'       => 'agenxe_offcanvas_title_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Offcanvas Title Color', 'agenxe' ),
                'subtitle' => esc_html__( 'Set Offcanvas Title color.', 'agenxe' ),
                'output'   => array( '.sidemenu-content .widget_title' )
            ),
        )
    ) );
    // -> End Offcanvas

    // -> START Blog Page
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Blog', 'agenxe' ),
        'id'         => 'agenxe_blog_page',
        'icon'  => 'el el-blogger',
        'fields'     => array(

            array(
                'id'       => 'agenxe_blog_sidebar',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Layout', 'agenxe' ),
                'subtitle' => esc_html__( 'Choose blog layout from here. If you use this option then you will able to change three type of blog layout ( Default Left Sidebar Layour ). ', 'agenxe' ),
                'options'  => array(
                    '1' => array(
                        'alt' => esc_attr__('1 Column','agenxe'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/no-sideber.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('2 Column Left','agenxe'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/left-sideber.png')
                    ),
                    '3' => array(
                        'alt' => esc_attr__('2 Column Right','agenxe'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/right-sideber.png' )
                    ),

                ),
                'default'  => '3'
            ),
            array(
                'id'       => 'agenxe_blog_grid',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Post Column', 'agenxe' ),
                'subtitle' => esc_html__( 'Select your blog post column from here. If you use this option then you will able to select three type of blog post layout ( Default Two Column ).', 'agenxe' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '1' => array(
                        'alt' => esc_attr__('1 Column','agenxe'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/1column.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('2 Column Left','agenxe'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/2column.png')
                    ),
                    '3' => array(
                        'alt' => esc_attr__('2 Column Right','agenxe'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/3column.png' )
                    ),

                ),
                'default'  => '1'
            ),
            array(
                'id'       => 'agenxe_blog_page_title_switcher',
                'type'     => 'switch',
                'default'  => 1,
                'on'       => esc_html__('Show','agenxe'),
                'off'      => esc_html__('Hide','agenxe'),
                'title'    => esc_html__('Blog Page Title', 'agenxe'),
                'subtitle' => esc_html__('Control blog page title show / hide. If you use this option then you will able to show / hide your blog page title ( Default Setting Show ).', 'agenxe'),
            ),
            array(
                'id'       => 'agenxe_blog_page_title_setting',
                'type'     => 'button_set',
                'title'    => esc_html__('Blog Page Title Setting', 'agenxe'),
                'subtitle' => esc_html__('Control blog page title setting. If you use this option then you can able to show default or custom blog page title ( Default Blog ).', 'agenxe'),
                'options'  => array(
                    "predefine"   => esc_html__('Default','agenxe'),
                    "custom"      => esc_html__('Custom','agenxe'),
                ),
                'default'  => 'predefine',
                'required' => array("agenxe_blog_page_title_switcher","equals","1")
            ),
            array(
                'id'       => 'agenxe_blog_page_custom_title',
                'type'     => 'text',
                'title'    => esc_html__('Blog Custom Title', 'agenxe'),
                'subtitle' => esc_html__('Set blog page custom title form here. If you use this option then you will able to set your won title text.', 'agenxe'),
                'required' => array('agenxe_blog_page_title_setting','equals','custom')
            ),
            array(
                'id'            => 'agenxe_blog_postExcerpt',
                'type'          => 'slider',
                'title'         => esc_html__('Blog Posts Excerpt', 'agenxe'),
                'subtitle'      => esc_html__('Control the number of characters you want to show in the blog page for each post.. If you use this option then you can able to control your blog post characters from here ( Default show 10 ).', 'agenxe'),
                "default"       => 46,
                "min"           => 0,
                "step"          => 1,
                "max"           => 100,
                'resolution'    => 1,
                'display_value' => 'text',
            ),
            array(
                'id'       => 'agenxe_blog_readmore_setting',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Read More Text Setting', 'agenxe' ),
                'subtitle' => esc_html__( 'Control read more text from here.', 'agenxe' ),
                'options'  => array(
                    "default"   => esc_html__('Default','agenxe'),
                    "custom"    => esc_html__('Custom','agenxe'),
                ),
                'default'  => 'default',
            ),
            array(
                'id'       => 'agenxe_blog_custom_readmore',
                'type'     => 'text',
                'title'    => esc_html__('Read More Text', 'agenxe'),
                'subtitle' => esc_html__('Set read moer text here. If you use this option then you will able to set your won text.', 'agenxe'),
                'required' => array('agenxe_blog_readmore_setting','equals','custom')
            ),
            array(
                'id'       => 'agenxe_blog_title_color',
                'output'   => array( '.Themeholy-blog .blog-title a'),
                'type'     => 'color',
                'title'    => esc_html__( 'Blog Title Color', 'agenxe' ),
                'subtitle' => esc_html__( 'Set Blog Title Color.', 'agenxe' ),
            ),
            array(
                'id'       => 'agenxe_blog_title_hover_color',
                'output'   => array( '.Themeholy-blog .blog-title a:hover'),
                'type'     => 'color',
                'title'    => esc_html__( 'Blog Title Hover Color', 'agenxe' ),
                'subtitle' => esc_html__( 'Set Blog Title Hover Color.', 'agenxe' ),
            ),
            array(
                'id'       => 'agenxe_blog_contant_color',
                'output'   => array( '.blog-content p'),
                'type'     => 'color',
                'title'    => esc_html__( 'Blog Excerpt / Content Color', 'agenxe' ),
                'subtitle' => esc_html__( 'Set Blog Excerpt / Content Color.', 'agenxe' ),
            ),
            array(
                'id'       => 'agenxe_blog_read_more_button_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Read More Button Color', 'agenxe' ),
                'subtitle' => esc_html__( 'Set Read More Button Color.', 'agenxe' ),
                'output'   => array( '--theme-color' => '.blog-single .blog-content .th-btn' ),
            ),
            array(
                'id'       => 'agenxe_blog_read_more_button_hover_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Read More Button Hover Color', 'agenxe' ),
                'subtitle' => esc_html__( 'Set Read More Button Hover Color.', 'agenxe' ),
                'output'   => array( '--title-color' => '.blog-single .blog-content .th-btn:hover' ),
            ),
            array(
                'id'       => 'agenxe_blog_pagination_color',
                'output'   => array( '.th-pagination a'),
                'type'     => 'color',
                'title'    => esc_html__('Blog Pagination Color', 'agenxe'),
                'subtitle' => esc_html__('Set Blog Pagination Color.', 'agenxe'),
            ),
            array(
                'id'       => 'agenxe_blog_pagination_bg_color',
                'output'   => array( '--smoke-color' => '.th-pagination a'),
                'type'     => 'color',
                'title'    => esc_html__('Blog Pagination Background', 'agenxe'),
                'subtitle' => esc_html__('Set Blog Pagination Backgorund Color.', 'agenxe'),
            ),
            // array(
            //     'id'       => 'agenxe_blog_pagination_active_color',
            //     'output'   => array( '.pagination li span.current'),
            //     'type'     => 'color',
            //     'title'    => esc_html__('Blog Pagination Active Color', 'agenxe'),
            //     'subtitle' => esc_html__('Set Blog Pagination Active Color.', 'agenxe'),
            //     'required'  => array('agenxe_blog_pagination', '=', '1')
            // ),
            array(
                'id'       => 'agenxe_blog_pagination_hover_color',
                'output'   => array( '.th-pagination a:hover, .th-pagination a.active'),
                'type'     => 'color',
                'title'    => esc_html__('Blog Pagination Hover & Active Color', 'agenxe'),
                'subtitle' => esc_html__('Set Blog Pagination Hover & Active Color.', 'agenxe'),
            ),
            array(
                'id'       => 'agenxe_blog_pagination_bg_hover_color',
                'output'   => array( '--theme-color' => '.th-pagination a:hover, .th-pagination a.active'),
                'type'     => 'color',
                'title'    => esc_html__('Blog Pagination Hover & Active Background', 'agenxe'),
                'subtitle' => esc_html__('Set Blog Pagination Background Hover & Active Color.', 'agenxe'),
            ),
        ),
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Single Blog Page', 'agenxe' ),
        'id'         => 'agenxe_post_detail_styles',
        'subsection' => true,
        'fields'     => array(

            array(
                'id'       => 'agenxe_blog_single_sidebar',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Layout', 'agenxe' ),
                'subtitle' => esc_html__( 'Choose blog single page layout from here. If you use this option then you will able to change three type of blog single page layout ( Default Left Sidebar Layour ). ', 'agenxe' ),
                'options'  => array(
                    '1' => array(
                        'alt' => esc_attr__('1 Column','agenxe'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/no-sideber.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('2 Column Left','agenxe'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/left-sideber.png')
                    ),
                    '3' => array(
                        'alt' => esc_attr__('2 Column Right','agenxe'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/right-sideber.png' )
                    ),

                ),
                'default'  => '3'
            ),
            array(
                'id'       => 'agenxe_post_details_title_position',
                'type'     => 'button_set',
                'default'  => 'header',
                'options'  => array(
                    'header'        => esc_html__('On Header','agenxe'),
                    'below'         => esc_html__('Below Thumbnail','agenxe'),
                ),
                'title'    => esc_html__('Blog Post Title Position', 'agenxe'),
                'subtitle' => esc_html__('Control blog post title position from here.', 'agenxe'),
            ),
            array(
                'id'       => 'agenxe_post_details_custom_title',
                'type'     => 'text',
                'title'    => esc_html__('Blog Details Custom Title', 'agenxe'),
                'subtitle' => esc_html__('This title will show in Breadcrumb title.', 'agenxe'),
                'required' => array('agenxe_post_details_title_position','equals','below')
            ),
            array(
                'id'       => 'agenxe_display_post_tags',
                'type'     => 'switch',
                'title'    => esc_html__( 'Tags', 'agenxe' ),
                'subtitle' => esc_html__( 'Switch On to Display Tags.', 'agenxe' ),
                'default'  => true,
                'on'        => esc_html__('Enabled','agenxe'),
                'off'       => esc_html__('Disabled','agenxe'),
            ),
            array(
                'id'       => 'agenxe_post_details_share_options',
                'type'     => 'switch',
                'title'    => esc_html__('Share Options', 'agenxe'),
                'subtitle' => esc_html__('Control post share options from here. If you use this option then you will able to show or hide post share options.', 'agenxe'),
                'on'        => esc_html__('Show','agenxe'),
                'off'       => esc_html__('Hide','agenxe'),
                'default'   => '0',
            ),
            array(
                'id'       => 'agenxe_post_details_author_desc_trigger',
                'type'     => 'switch',
                'title'    => esc_html__('Author Options', 'agenxe'),
                'subtitle' => esc_html__('Switch On to Display Author Box', 'agenxe'),
                'on'        => esc_html__('Show','agenxe'),
                'off'       => esc_html__('Hide','agenxe'),
                'default'   => '0',
            ),
           
        )
    ));

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Meta Data', 'agenxe' ),
        'id'         => 'agenxe_common_meta_data',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'agenxe_display_post_author',
                'type'     => 'switch',
                'title'    => esc_html__( 'Post author', 'agenxe' ),
                'subtitle' => esc_html__( 'Switch On to Display Post Author.', 'agenxe' ),
                'default'  => true,
                'on'        => esc_html__('Enabled','agenxe'),
                'off'       => esc_html__('Disabled','agenxe'),
            ),
            array(
                'id'       => 'agenxe_display_post_date',
                'type'     => 'switch',
                'title'    => esc_html__( 'Post Date', 'agenxe' ),
                'subtitle' => esc_html__( 'Switch On to Display Post Date.', 'agenxe' ),
                'default'  => true,
                'on'        => esc_html__('Enabled','agenxe'),
                'off'       => esc_html__('Disabled','agenxe'),
            ),
            array(
                'id'       => 'agenxe_display_post_comments',
                'type'     => 'switch',
                'title'    => esc_html__( 'Post Comment', 'agenxe' ),
                'subtitle' => esc_html__( 'Switch On to Display Post Comment Number.', 'agenxe' ),
                'default'  => false,
                'on'        => esc_html__('Enabled','agenxe'),
                'off'       => esc_html__('Disabled','agenxe'),
            ),
            array(
                'id'       => 'agenxe_display_post_tag',
                'type'     => 'switch',
                'title'    => esc_html__( 'Post Category', 'agenxe' ),
                'subtitle' => esc_html__( 'Switch On to Display Post Category.', 'agenxe' ),
                'default'  => true,
                'on'        => esc_html__('Enabled','agenxe'),
                'off'       => esc_html__('Disabled','agenxe'),
            ),
            array(
                'id'       => 'agenxe_blog_meta_icon_color',
                'output'   => array( '.blog-meta a i'),
                'type'     => 'color',
                'title'    => esc_html__('Blog Meta Icon Color', 'agenxe'),
                'subtitle' => esc_html__('Set Blog Meta Icon Color.', 'agenxe'),
            ),
            array(
                'id'       => 'agenxe_blog_meta_text_color',
                'output'   => array( '.blog-meta a,.blog-meta span'),
                'type'     => 'color',
                'title'    => esc_html__( 'Blog Meta Text Color', 'agenxe' ),
                'subtitle' => esc_html__( 'Set Blog Meta Text Color.', 'agenxe' ),
            ),
            array(
                'id'       => 'agenxe_blog_meta_text_hover_color',
                'output'   => array( '.blog-meta a:hover'),
                'type'     => 'color',
                'title'    => esc_html__( 'Blog Meta Hover Text Color', 'agenxe' ),
                'subtitle' => esc_html__( 'Set Blog Meta Hover Text Color.', 'agenxe' ),
            ),
        )
    ));

    /* End blog Page */

    // -> START Page Option
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Page & Breadcrumb', 'agenxe' ),
        'id'         => 'agenxe_page_page',
        'icon'  => 'el el-file',
        'fields'     => array(
            array(
                'id'       => 'agenxe_page_sidebar',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Select layout', 'agenxe' ),
                'subtitle' => esc_html__( 'Choose your page layout. If you use this option then you will able to choose three type of page layout ( Default no sidebar ). ', 'agenxe' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '1' => array(
                        'alt' => esc_attr__('1 Column','agenxe'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/no-sideber.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('2 Column Left','agenxe'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/left-sideber.png')
                    ),
                    '3' => array(
                        'alt' => esc_attr__('2 Column Right','agenxe'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/right-sideber.png' )
                    ),

                ),
                'default'  => '1'
            ),
            array(
                'id'       => 'agenxe_page_layoutopt',
                'type'     => 'button_set',
                'title'    => esc_html__('Sidebar Settings', 'agenxe'),
                'subtitle' => esc_html__('Set page sidebar. If you use this option then you will able to set three type of sidebar ( Default no sidebar ).', 'agenxe'),
                //Must provide key => value pairs for options
                'options' => array(
                    '1' => esc_html__( 'Page Sidebar', 'agenxe' ),
                    '2' => esc_html__( 'Blog Sidebar', 'agenxe' )
                 ),
                'default' => '1',
                'required'  => array('agenxe_page_sidebar','!=','1')
            ),
            array(
                'id'       => 'agenxe_page_title_switcher',
                'type'     => 'switch',
                'title'    => esc_html__('Title', 'agenxe'),
                'subtitle' => esc_html__('Switch enabled to display page title. Fot this option you will able to show / hide page title.  Default setting Enabled', 'agenxe'),
                'default'  => '1',
                'on'        => esc_html__('Enabled','agenxe'),
                'off'       => esc_html__('Disabled','agenxe'),
            ),
            array(
                'id'       => 'agenxe_page_title_tag',
                'type'     => 'select',
                'options'  => array(
                    'h1'        => esc_html__('H1','agenxe'),
                    'h2'        => esc_html__('H2','agenxe'),
                    'h3'        => esc_html__('H3','agenxe'),
                    'h4'        => esc_html__('H4','agenxe'),
                    'h5'        => esc_html__('H5','agenxe'),
                    'h6'        => esc_html__('H6','agenxe'),
                ),
                'default'  => 'h1',
                'title'    => esc_html__( 'Title Tag', 'agenxe' ),
                'subtitle' => esc_html__( 'Select page title tag. If you use this option then you can able to change title tag H1 - H6 ( Default tag H1 )', 'agenxe' ),
                'required' => array("agenxe_page_title_switcher","equals","1")
            ),
            array(
                'id'       => 'agenxe_allHeader_title_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Title Color', 'agenxe' ),
                'subtitle' => esc_html__( 'Set Title Color', 'agenxe' ),
                'output'   => array( 'color' => '.breadcumb-title' ),
                'required' => array("agenxe_page_title_switcher","equals","1")
            ),
            array(
                'id'       => 'agenxe_allHeader_bg',
                'type'     => 'background',
                'title'    => esc_html__( 'Background', 'agenxe' ),
                'subtitle' => esc_html__( 'Setting page header background. If you use this option then you will able to set Background Color, Background Image, Background Repeat, Background Size, Background Attachment, Background Position.', 'agenxe' ),
                'output'   => array( 'background' => '.breadcumb-wrapper' ),
            ),
             array(
                'id'       => 'agenxe_shoppage_bg',
                'type'     => 'background',
                'title'    => esc_html__( 'Background For Shop Pages', 'agenxe' ),
                'output'   => array( 'background' => '.custom-woo-class' ),
            ),
            array(
                'id'       => 'agenxe_archivepage_bg',
                'type'     => 'background',
                'title'    => esc_html__( 'Background For Archive Pages', 'agenxe' ),
                'output'   => array( 'background' => '.custom-archive-class' ),
            ),
            array(
                'id'       => 'agenxe_searchpage_bg',
                'type'     => 'background',
                'title'    => esc_html__( 'Background For Search Pages', 'agenxe' ),
                'output'   => array( 'background' => '.custom-search-class' ),
            ),
            array(
                'id'       => 'agenxe_errorpage_bg',
                'type'     => 'background',
                'title'    => esc_html__( 'Background For Error Pages', 'agenxe' ),
                'output'   => array( 'background' => '.custom-error-class' ),
            ),
            array(
                'id'       => 'agenxe_enable_breadcrumb',
                'type'     => 'switch',
                'title'    => esc_html__( 'Breadcrumb Hide/Show', 'agenxe' ),
                'subtitle' => esc_html__( 'Hide / Show breadcrumb from all pages and posts ( Default settings hide ).', 'agenxe' ),
                'default'  => '1',
                'on'       => 'Show',
                'off'      => 'Hide',
            ),
            array(
                'id'       => 'agenxe_allHeader_breadcrumbtextcolor',
                'type'     => 'color',
                'title'    => esc_html__( 'Breadcrumb Color', 'agenxe' ),
                'subtitle' => esc_html__( 'Choose page header breadcrumb text color here.If you user this option then you will able to set page breadcrumb color.', 'agenxe' ),
                'required' => array("agenxe_enable_breadcrumb","equals","1"),
                'output'   => array( 'color' => '.breadcumb-wrapper .breadcumb-content ul li a' ),
            ),
            array(
                'id'       => 'agenxe_allHeader_breadcrumbtextactivecolor',
                'type'     => 'color',
                'title'    => esc_html__( 'Breadcrumb Active Color', 'agenxe' ),
                'subtitle' => esc_html__( 'Choose page header breadcrumb text active color here.If you user this option then you will able to set page breadcrumb active color.', 'agenxe' ),
                'required' => array( "agenxe_enable_breadcrumb", "equals", "1" ),
                'output'   => array( 'color' => '.breadcumb-wrapper .breadcumb-content ul li:last-child' ),
            ),
            array(
                'id'       => 'agenxe_allHeader_dividercolor',
                'type'     => 'color',
                'title'    => esc_html__( 'Breadcrumb Divider Color', 'agenxe' ),
                'subtitle' => esc_html__( 'Choose breadcrumb divider color.', 'agenxe' ),
                'required' => array( "agenxe_enable_breadcrumb", "equals", "1" ),
                'output'   => array( 'color'=>'.breadcumb-wrapper .breadcumb-content ul li:after' ),
            ),
        ),
    ) );
    /* End Page option */

    // -> START 404 Page

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( '404 Page', 'agenxe' ),
        'id'         => 'agenxe_404_page',
        'icon'       => 'el el-ban-circle',
        'fields'     => array(
            array(
                'id'       => 'agenxe_error_img',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Error Image', 'agenxe' ),
                'compiler' => 'true',
                'subtitle' => esc_html__( 'Upload your error image ( recommendation png format ).', 'agenxe' ),
            ),
            array(
                'id'       => 'agenxe_error_title',
                'type'     => 'text',
                'title'    => esc_html__( 'Page Title', 'agenxe' ),
                'subtitle' => esc_html__( 'Set Page title ', 'agenxe' ),
                'default'  => esc_html__( 'Sorry! Page did not found', 'agenxe' ),
            ),
            array(
                'id'       => 'agenxe_error_title_color',
                'type'     => 'color',
                'output'   => array( '.error-title' ),
                'title'    => esc_html__( 'Title Color', 'agenxe' ),
                'subtitle' => esc_html__( 'Pick a subtitle color', 'agenxe' ),
                'validate' => 'color'
            ), 
            array(
                'id'       => 'agenxe_error_description',
                'type'     => 'text',
                'title'    => esc_html__( 'Page Description', 'agenxe' ),
                'subtitle' => esc_html__( 'Set Page Subtitle ', 'agenxe' ),
                'default'  => esc_html__( 'Unfortunately, something went wrong and this page does not exist. Try using the search or return to the previous page.', 'agenxe' ),
            ),
            array(
                'id'       => 'agenxe_error_desc_color',
                'type'     => 'color',
                'output'   => array( '.error-text' ),
                'title'    => esc_html__( 'Description Color', 'agenxe' ),
                'subtitle' => esc_html__( 'Pick a description color', 'agenxe' ),
                'validate' => 'color'
            ),
            array(
                'id'       => 'agenxe_error_btn_text',
                'type'     => 'text',
                'title'    => esc_html__( 'Button Text', 'agenxe' ),
                'subtitle' => esc_html__( 'Set Button Text ', 'agenxe' ),
                'default'  => esc_html__( 'Return To Home', 'agenxe' ),
            ),
            array(
                'id'       => 'agenxe_error_btn_img',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Error Image', 'agenxe' ),
                'compiler' => 'true',
                'subtitle' => esc_html__( 'Upload your button shape( recommendation png format ).', 'agenxe' ),
            ),
            array(
                'id'       => 'agenxe_error_btn_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Button Color', 'agenxe' ),
                'subtitle' => esc_html__( 'Button Color.', 'agenxe' ),
                'output'   => array( 'color' => '.th-btn.error-btn' ),
            ),
            array(
                'id'       => 'agenxe_error_btn_bg',
                'type'     => 'color',
                'title'    => esc_html__( 'Button Background', 'agenxe' ),
                'subtitle' => esc_html__( 'Button Color.', 'agenxe' ),
                'output'   => array( '--theme-color' => '.th-btn.error-btn' ),
            ),
            array(
                'id'       => 'agenxe_error_btn_hover_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Button Hover Color', 'agenxe' ),
                'subtitle' => esc_html__( 'Set Button Hover Color.', 'agenxe' ),
                'output'   => array( 'color' => '.th-btn.error-btn:hover',  ),
            ),
            array(
                'id'       => 'agenxe_error_btn_hover_bg',
                'type'     => 'color',
                'title'    => esc_html__( 'Button Hover Background', 'agenxe' ),
                'subtitle' => esc_html__( 'Set Button Hover Color.', 'agenxe' ),
                'output'   => array( '--white-color' => '.th-btn.error-btn:hover' ),
            ),
        ),
    ) );

    /* End 404 Page */
    // -> START Woo Page Option

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Woocommerce Page', 'agenxe' ),
        'id'         => 'agenxe_woo_page_page',
        'icon'  => 'el el-shopping-cart',
        'fields'     => array(
            array(
                'id'       => 'agenxe_woo_shoppage_sidebar',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Set Shop Page Sidebar.', 'agenxe' ),
                'subtitle' => esc_html__( 'Choose shop page sidebar', 'agenxe' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '1' => array(
                        'alt' => esc_attr__('1 Column','agenxe'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/no-sideber.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('2 Column Left','agenxe'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/left-sideber.png')
                    ),
                    '3' => array(
                        'alt' => esc_attr__('2 Column Right','agenxe'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/right-sideber.png' )
                    ),

                ),
                'default'  => '1'
            ),
            array(
                'id'       => 'agenxe_woo_product_col',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Product Column', 'agenxe' ),
                'subtitle' => esc_html__( 'Set your woocommerce product column.', 'agenxe' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '2' => array(
                        'alt' => esc_attr__('2 Columns','agenxe'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/2col.png')
                    ),
                    '3' => array(
                        'alt' => esc_attr__('3 Columns','agenxe'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/3col.png' )
                    ),
                    '4' => array(
                        'alt' => esc_attr__('4 Columns','agenxe'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/4col.png')
                    ),
                    '5' => array(
                        'alt' => esc_attr__('5 Columns','agenxe'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/5col.png')
                    ),
                    '6' => array(
                        'alt' => esc_attr__('6 Columns','agenxe'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/6col.png' )
                    ),
                    '5' => array(
                        'alt' => esc_attr__('5 Columns','agenxe'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/5col.png')
                    ),
                    '6' => array(
                        'alt' => esc_attr__('6 Columns','agenxe'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/6col.png' )
                    ),),
                'default'  => '4'
            ),
            array(
                'id'       => 'agenxe_woo_product_perpage',
                'type'     => 'text',
                'title'    => esc_html__( 'Product Per Page', 'agenxe' ),
                'default' => '10'
            ),
            array(
                'id'       => 'agenxe_woo_singlepage_sidebar',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Product Single Page sidebar', 'agenxe' ),
                'subtitle' => esc_html__( 'Choose product single page sidebar.', 'agenxe' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '1' => array(
                        'alt' => esc_attr__('1 Column','agenxe'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/no-sideber.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('2 Column Left','agenxe'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/left-sideber.png')
                    ),
                    '3' => array(
                        'alt' => esc_attr__('2 Column Right','agenxe'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/right-sideber.png' )
                    ),

                ),
                'default'  => '1'
            ),
            array(
                'id'       => 'agenxe_product_details_title_position',
                'type'     => 'button_set',
                'default'  => 'below',
                'options'  => array(
                    'header'        => esc_html__('On Header','agenxe'),
                    'below'         => esc_html__('Below Thumbnail','agenxe'),
                ),
                'title'    => esc_html__('Product Details Title Position', 'agenxe'),
                'subtitle' => esc_html__('Control product details title position from here.', 'agenxe'),
            ),
            array(
                'id'       => 'agenxe_product_details_custom_title',
                'type'     => 'text',
                'title'    => esc_html__( 'Product Details Title', 'agenxe' ),
                'default'  => esc_html__( 'Shop Details', 'agenxe' ),
                'required' => array('agenxe_product_details_title_position','equals','below'),
            ),
            array(
                'id'       => 'agenxe_product_details_custom_title',
                'type'     => 'text',
                'title'    => esc_html__( 'Product Details Title', 'agenxe' ),
                'default'  => esc_html__( 'Shop Details', 'agenxe' ),
                'required' => array('agenxe_product_details_title_position','equals','below'),
            ),
            array(
                'id'       => 'agenxe_woo_relproduct_display',
                'type'     => 'switch',
                'title'    => esc_html__( 'Related product Hide/Show', 'agenxe' ),
                'subtitle' => esc_html__( 'Hide / Show related product in single page (Default Settings Show)', 'agenxe' ),
                'default'  => '1',
                'on'       => esc_html__('Show','agenxe'),
                'off'      => esc_html__('Hide','agenxe')
            ),
            array(
                'id'       => 'agenxe_woo_relproduct_subtitle',
                'type'     => 'text',
                'title'    => esc_html__( 'Related products Subtitle', 'agenxe' ),
                'default'  => esc_html__( 'Some Others Product', 'agenxe' ),
                'required' => array('agenxe_woo_relproduct_display','equals',true)
            ),
            array(
                'id'       => 'agenxe_woo_relproduct_title',
                'type'     => 'text',
                'title'    => esc_html__( 'Related products Title', 'agenxe' ),
                'default'  => esc_html__( 'Related products', 'agenxe' ),
                'required' => array('agenxe_woo_relproduct_display','equals',true)
            ),
            array(
                'id'       => 'agenxe_woo_relproduct_slider', 
                'type'     => 'switch',
                'title'    => esc_html__( 'Related product Sldier On/Off', 'agenxe' ),
                'subtitle' => esc_html__( 'Slider On/Off related product slider in single page (Default Settings Slider On)', 'agenxe' ),
                'default'  => '1',
                'on'       => esc_html__('Slider On','agenxe'),
                'off'      => esc_html__('Slider Off','agenxe')
            ),
            array(
                'id'       => 'agenxe_woo_relproduct_num',
                'type'     => 'text',
                'title'    => esc_html__( 'Related products number', 'agenxe' ),
                'subtitle' => esc_html__( 'Set how many related products you want to show in single product page.', 'agenxe' ),
                'default'  => 4,
                'required' => array('agenxe_woo_relproduct_display','equals',true)
            ),

            array(
                'id'       => 'agenxe_woo_related_product_col',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Related Product Column', 'agenxe' ),
                'subtitle' => esc_html__( 'Set your woocommerce related product column. it works if slider is off', 'agenxe' ),
                'required' => array('agenxe_woo_relproduct_display','equals',true),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '6' => array(
                        'alt' => esc_attr__('2 Columns','agenxe'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/2col.png')
                    ),
                    '4' => array(
                        'alt' => esc_attr__('3 Columns','agenxe'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/3col.png' )
                    ),
                    '3' => array(
                        'alt' => esc_attr__('4 Columns','agenxe'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/4col.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('6 Columns','agenxe'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/6col.png' )
                    ),

                ),
                'default'  => '4'
            ),
            array(
                'id'       => 'agenxe_woo_upsellproduct_display',
                'type'     => 'switch',
                'title'    => esc_html__( 'Upsell product Hide/Show', 'agenxe' ),
                'subtitle' => esc_html__( 'Hide / Show upsell product in single page (Default Settings Show)', 'agenxe' ),
                'default'  => '1',
                'on'       => esc_html__('Show','agenxe'),
                'off'      => esc_html__('Hide','agenxe'),
            ),
            array(
                'id'       => 'agenxe_woo_upsellproduct_num',
                'type'     => 'text',
                'title'    => esc_html__( 'Upsells products number', 'agenxe' ),
                'subtitle' => esc_html__( 'Set how many upsells products you want to show in single product page.', 'agenxe' ),
                'default'  => 3,
                'required' => array('agenxe_woo_upsellproduct_display','equals',true),
            ),

            array(
                'id'       => 'agenxe_woo_upsell_product_col',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Upsells Product Column', 'agenxe' ),
                'subtitle' => esc_html__( 'Set your woocommerce upsell product column.', 'agenxe' ),
                'required' => array('agenxe_woo_upsellproduct_display','equals',true),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '6' => array(
                        'alt' => esc_attr__('2 Columns','agenxe'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/2col.png')
                    ),
                    '4' => array(
                        'alt' => esc_attr__('3 Columns','agenxe'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/3col.png' )
                    ),
                    '3' => array(
                        'alt' => esc_attr__('4 Columns','agenxe'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/4col.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('6 Columns','agenxe'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/6col.png' )
                    ),

                ),
                'default'  => '4'
            ),
            array(
                'id'       => 'agenxe_woo_crosssellproduct_display',
                'type'     => 'switch',
                'title'    => esc_html__( 'Cross sell product Hide/Show', 'agenxe' ),
                'subtitle' => esc_html__( 'Hide / Show cross sell product in single page (Default Settings Show)', 'agenxe' ),
                'default'  => '1',
                'on'       => esc_html__( 'Show', 'agenxe' ),
                'off'      => esc_html__( 'Hide', 'agenxe' ),
            ),
            array(
                'id'       => 'agenxe_woo_crosssellproduct_num',
                'type'     => 'text',
                'title'    => esc_html__( 'Cross sell products number', 'agenxe' ),
                'subtitle' => esc_html__( 'Set how many cross sell products you want to show in single product page.', 'agenxe' ),
                'default'  => 3,
                'required' => array('agenxe_woo_crosssellproduct_display','equals',true),
            ),

            array(
                'id'       => 'agenxe_woo_crosssell_product_col',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Cross sell Product Column', 'agenxe' ),
                'subtitle' => esc_html__( 'Set your woocommerce cross sell product column.', 'agenxe' ),
                'required' => array( 'agenxe_woo_crosssellproduct_display', 'equals', true ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '6' => array(
                        'alt' => esc_attr__('2 Columns','agenxe'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/2col.png')
                    ),
                    '4' => array(
                        'alt' => esc_attr__('3 Columns','agenxe'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/3col.png' )
                    ),
                    '3' => array(
                        'alt' => esc_attr__('4 Columns','agenxe'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/4col.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('6 Columns','agenxe'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/6col.png' )
                    ),

                ),
                'default'  => '4'
            ),
        ),
    ) );

    /* End Woo Page option */
    // -> START Gallery
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Gallery', 'agenxe' ),
        'id'         => 'agenxe_gallery_widget',
        'icon'       => 'el el-gift',
        'fields'     => array(
            array(
                'id'          => 'agenxe_gallery_image_widget',
                'type'        => 'slides',
                'title'       => esc_html__('Add Gallery Image', 'agenxe'),
                'subtitle'    => esc_html__('Add gallery Image and url.', 'agenxe'),
                'show'        => array(
                    'title'          => false,
                    'description'    => false,
                    'progress'       => false,
                    'icon'           => false,
                    'facts-number'   => false,
                    'facts-title1'   => false,
                    'facts-title2'   => false,
                    'facts-number-2' => false,
                    'facts-title3'   => false,
                    'facts-number-3' => false,
                    'url'            => true,
                    'project-button' => false,
                    'image_upload'   => true,
                ),
            ),
        ),
    ) );
    // -> START Subscribe
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Subscribe', 'agenxe' ),
        'id'         => 'agenxe_subscribe_page',
        'icon'       => 'el el-eject',
        'fields'     => array(

            array(
                'id'       => 'agenxe_subscribe_apikey',
                'type'     => 'text',
                'title'    => esc_html__( 'Mailchimp API Key', 'agenxe' ),
                'subtitle' => esc_html__( 'Set mailchimp api key.', 'agenxe' ),
            ),
            array(
                'id'       => 'agenxe_subscribe_listid',
                'type'     => 'text',
                'title'    => esc_html__( 'Mailchimp List ID', 'agenxe' ),
                'subtitle' => esc_html__( 'Set mailchimp list id.', 'agenxe' ),
            ),
        ),
    ) );

    /* End Subscribe */

    // -> START Social Media

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Social', 'agenxe' ),
        'id'         => 'agenxe_social_media',
        'icon'      => 'el el-globe',
        'desc'      => esc_html__( 'Social', 'agenxe' ),
        'fields'     => array(
            array(
                'id'          => 'agenxe_social_links',
                'type'        => 'slides',
                'title'       => esc_html__('Social Profile Links', 'agenxe'),
                'subtitle'    => esc_html__('Add social icon and url.', 'agenxe'),
                'show'        => array(
                    'title'          => true,
                    'description'    => true,
                    'progress'       => false,
                    'facts-number'   => false,
                    'facts-title1'   => false,
                    'facts-title2'   => false,
                    'facts-number-2' => false,
                    'facts-title3'   => false,
                    'facts-number-3' => false,
                    'url'            => true,
                    'project-button' => false,
                    'image_upload'   => false,
                ),
                'placeholder'   => array(
                    'icon'          => esc_html__( 'Icon (example: fa fa-facebook) ','agenxe'),
                    'title'         => esc_html__( 'Social Icon Class', 'agenxe' ),
                    'description'   => esc_html__( 'Social Icon Title', 'agenxe' ),
                ),
            ),
        ),
    ) );

    /* End social Media */


    // -> START Footer Media
    Redux::setSection( $opt_name , array(
       'title'            => esc_html__( 'Footer', 'agenxe' ),
       'id'               => 'agenxe_footer',
       'desc'             => esc_html__( 'agenxe Footer', 'agenxe' ),
       'customizer_width' => '400px',
       'icon'              => 'el el-photo',
   ) );

   Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Pre-built Footer / Footer Builder', 'agenxe' ),
        'id'         => 'agenxe_footer_section',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'agenxe_footer_builder_trigger',
                'type'     => 'button_set',
                'default'  => 'prebuilt',
                'options'  => array(
                    'footer_builder'        => esc_html__('Footer Builder','agenxe'),
                    'prebuilt'              => esc_html__('Pre-built Footer','agenxe'),
                ),
                'title'    => esc_html__( 'Footer Builder', 'agenxe' ),
            ),
            array(
                'id'       => 'agenxe_footer_builder_select',
                'type'     => 'select',
                'required' => array( 'agenxe_footer_builder_trigger','equals','footer_builder'),
                'data'     => 'posts',
                'args'     => array(
                    'post_type'     => 'agenxe_footerbuild'
                ),
                'on'       => esc_html__( 'Enabled', 'agenxe' ),
                'off'      => esc_html__( 'Disable', 'agenxe' ),
                'title'    => esc_html__( 'Select Footer', 'agenxe' ),
                'subtitle' => esc_html__( 'First make your footer from footer custom types then select it from here.', 'agenxe' ),
            ),

            
            
            array(
                'id'       => 'agenxe_footerwidget_enable',
                'type'     => 'switch',
                'title'    => esc_html__( 'Footer Widget', 'agenxe' ),
                'default'  => 1,
                'on'       => esc_html__( 'Enabled', 'agenxe' ),
                'off'      => esc_html__( 'Disable', 'agenxe' ),
                'required' => array( 'agenxe_footer_builder_trigger','equals','prebuilt'),
            ),
            array(
                'id'       => 'agenxe_footer_background',
                'type'     => 'background',
                'title'    => esc_html__( 'Footer Widget Background', 'agenxe' ),
                'subtitle' => esc_html__( 'Set footer background.', 'agenxe' ),
                'output'   => array( '.footer-layout4' ),
                'required' => array( 'agenxe_footerwidget_enable','=','1' ),
            ),
            array(
                'id'       => 'agenxe_footer_widget_title_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Footer Widget Title Color', 'agenxe' ),
                'required' => array('agenxe_footerwidget_enable','=','1'),
                'output'   => array( '.footer-widget .widget_title' ),
            ),
            array(
                'id'       => 'agenxe_footer_widget_anchor_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Footer Widget Anchor Color', 'agenxe' ),
                'required' => array('agenxe_footerwidget_enable','=','1'),
                'output'   => array( '.footer-widget.widget_nav_menu a' ),
            ),
            array(
                'id'       => 'agenxe_footer_widget_anchor_hov_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Footer Widget Anchor Hover Color', 'agenxe' ),
                'required' => array('agenxe_footerwidget_enable','=','1'),
                'output'   => array( '--theme-color'    =>  '.footer-widget.widget_nav_menu a:hover' ),
            ),

        ),
    ) );

    // -> START Footer cta
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Footer Cta', 'agenxe' ),
        'id'         => 'agenxe_cta',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'agenxe_footer_cta_enable',
                'type'     => 'switch',
                'title'    => esc_html__( 'Footer cta', 'agenxe' ),
                'default'  => 0,
                'on'       => esc_html__( 'Enabled', 'agenxe' ),
                'off'      => esc_html__( 'Disable', 'agenxe' ),
            ),
            array(
                'id'       => 'agenxe_cta_title',
                'type'     => 'text',
                'title'    => esc_html__('cta Title', 'agenxe'),
                'subtitle' => esc_html__('Set cta title', 'agenxe'),
                'default'  => esc_html__( 'Let’s Grow your Business', 'agenxe' ),
                'required' => array('agenxe_footer_cta_enable','=','1'),
            ),
            array(
                'id'       => 'agenxe_cta_title_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Title Color', 'agenxe' ),
                'subtitle' => esc_html__( 'Set Title Color', 'agenxe' ),
                'output'   => array( 'color'    =>  '.cta-area-1 .cta-title' ),
                'required' => array( 
                    array('agenxe_footer_cta_enable','equals','1') 
                )
            ),
            array(
                'id'       => 'agenxe_cta_btn_text',
                'type'     => 'text',
                'validate' => 'html',
                'default'  => esc_html__( 'Let’s Talk', 'agenxe' ),
                'title'    => esc_html__( 'Let’s Talk', 'agenxe' ),
                'subtitle' => esc_html__( 'Set Button Text', 'agenxe' ),
                'required' => array( 
                    array('agenxe_footer_cta_enable','equals','1') 
                )
            ),
            array(
                'id'       => 'agenxe_cta_btn_url',
                'type'     => 'text',
                'default'  => esc_html__( '#', 'agenxe' ),
                'title'    => esc_html__( 'Button URL?', 'agenxe' ),
                'subtitle' => esc_html__( 'Set Button URL Here', 'agenxe' ),
                'required' => array( 
                    array('agenxe_footer_cta_enable','equals','1') 
                )
            ),
            array(
                'id'       => 'agenxe_cta_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Button Color', 'agenxe' ),
                'subtitle' => esc_html__( 'Set Header Button Color', 'agenxe' ),
                'output'   => array( 'color'    =>  '.cta-area-1 .th_btn' ),
                'required' => array( 
                    array('agenxe_footer_cta_enable','equals','1') 
                )
            ),
            array(
                'id'       => 'agenxe_cta_hover_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Button Hover Color', 'agenxe' ),
                'subtitle' => esc_html__( 'Set Button Hover Color', 'agenxe' ),
                'output'   => array( 'color'    =>  '.cta-area-1 .th_btn:hover' ),
                'required' => array( 
                    array('agenxe_footer_cta_enable','equals','1') 
                )
            ),
            array(
                'id'       => 'agenxe_cta_bg_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Button Background', 'agenxe' ),
                'subtitle' => esc_html__( 'Set Button Background Color', 'agenxe' ),
                'output'   => array( 'background-color'    =>  '.cta-area-1 .th_btn' ),
                'required' => array(  
                    array('agenxe_footer_cta_enable','equals','1') 
                )
            ),
            array(
                'id'       => 'agenxe_cta_bg_hover_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Button Background Hover', 'agenxe' ),
                'subtitle' => esc_html__( 'Set Button Background Hover Color', 'agenxe' ),
                'output'   => array( 'background-color'  =>  '.cta-area-1 .th_btn:after, .cta-area-1 .th_btn:before'),
                'required' => array( 
                    array('agenxe_footer_cta_enable','equals','1') 
                )
            ),

        )
    ));

    // -> START Footer Bottom
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Footer Bottom', 'agenxe' ),
        'id'         => 'agenxe_footer_bottom',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'agenxe_disable_footer_bottom',
                'type'     => 'switch',
                'title'    => esc_html__( 'Footer Bottom?', 'agenxe' ),
                'default'  => 1,
                'on'       => esc_html__('Enabled','agenxe'),
                'off'      => esc_html__('Disable','agenxe'),
                'required' => array('agenxe_footer_builder_trigger','equals','prebuilt'),
            ),

            array(
                'id'       => 'agenxe_footer_bottom_background2',
                'type'     => 'color',
                'title'    => esc_html__( 'Footer Bottom Background Color', 'agenxe' ),
                'required' => array( 'agenxe_disable_footer_bottom','=','1' ),
                'output'   => array( 'background-color'   =>   '.footer-layout1 .copyright-wrap' ),
            ),
            array(
                'id'       => 'agenxe_copyright_text',
                'type'     => 'text',
                'title'    => esc_html__( 'Copyright Text', 'agenxe' ),
                'subtitle' => esc_html__( 'Add Copyright Text', 'agenxe' ),
                'default'  => sprintf( 'Copyright <i class="fal fa-copyright"></i> %s By <a href="%s">%s</a>. All Rights Reserved.',date('Y'),esc_url('#'),__( 'Agenxe.','agenxe' ) ),
                'required' => array( 'agenxe_disable_footer_bottom','equals','1' ),
            ),
            array(
                'id'       => 'agenxe_footer_copyright_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Footer Copyright Text Color', 'agenxe' ),
                'subtitle' => esc_html__( 'Set footer copyright text color', 'agenxe' ),
                'required' => array( 'agenxe_disable_footer_bottom','equals','1'),
                'output'   => array( '.footer-layout1 .copyright-wrap .copyright-text' ),
            ),
            array(
                'id'       => 'agenxe_footer_copyright_acolor',
                'type'     => 'color',
                'title'    => esc_html__( 'Footer Copyright Ancor Color', 'agenxe' ),
                'subtitle' => esc_html__( 'Set footer copyright ancor color', 'agenxe' ),
                'required' => array( 'agenxe_disable_footer_bottom','equals','1'),
                'output'    => array('color' => '.copyright-wrap a, .copyright-wrap .footer-links ul li a')
            ),
            array(
                'id'       => 'agenxe_footer_copyright_a_hover_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Footer Copyright Ancor Hover Color', 'agenxe' ),
                'subtitle' => esc_html__( 'Set footer copyright ancor Hover color', 'agenxe' ),
                'required' => array( 'agenxe_disable_footer_bottom','equals','1'),
                'output'    => array('color' => '.copyright-wrap a:hover, .copyright-wrap .footer-links ul li a:hover')
            ), 

        )
    ));

    /* End Footer Media */

    // -> START Custom Css
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Custom Css', 'agenxe' ),
        'id'         => 'agenxe_custom_css_section',
        'icon'  => 'el el-css',
        'fields'     => array(
            array(
                'id'       => 'agenxe_css_editor',
                'type'     => 'ace_editor',
                'title'    => esc_html__('CSS Code', 'agenxe'),
                'subtitle' => esc_html__('Paste your CSS code here.', 'agenxe'),
                'mode'     => 'css',
                'theme'    => 'monokai',
            )
        ),
    ) );

    /* End custom css */



    if ( file_exists( dirname( __FILE__ ) . '/../README.md' ) ) {
        $section = array(
            'icon'   => 'el el-list-alt',
            'title'  => __( 'Documentation', 'agenxe' ),
            'fields' => array(
                array(
                    'id'       => '17',
                    'type'     => 'raw',
                    'markdown' => true,
                    'content_path' => dirname( __FILE__ ) . '/../README.md', // FULL PATH, not relative please
                    //'content' => 'Raw content here',
                ),
            ),
        );
        Redux::setSection( $opt_name, $section );
    }
    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'agenxe' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'agenxe' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }