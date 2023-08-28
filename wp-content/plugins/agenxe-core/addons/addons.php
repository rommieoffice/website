<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Main Agenxe Core Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */

final class Agenxe_Extension {

	/**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 *
	 * @var string The plugin version.
	 */
	const VERSION = '1.0.0';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum Elementor version required to run the plugin.
	 */

	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '7.0';


	/**
	 * Instance
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 * @static
	 *
	 * @var Elementor_Test_Extension The single instance of the class.
	 */

	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @static
	 *
	 * @return Elementor_Test_Extension An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {
		add_action( 'plugins_loaded', [ $this, 'init' ] );
	}

	/**
	 * Initialize the plugin
	 *
	 * Load the plugin only after Elementor (and other plugins) are loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed load the files required to run the plugin.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init() {

		// Check if Elementor installed and activated

		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version

		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version

		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}


		// Add Plugin actions

		add_action( 'elementor/widgets/register', [ $this, 'init_widgets' ] );


        // Register widget scripts

		add_action( 'elementor/frontend/after_enqueue_scripts', [ $this, 'widget_scripts' ]);


		// Specific Register widget scripts

		// add_action( 'elementor/frontend/after_register_scripts', [ $this, 'agenxe_regsiter_widget_scripts' ] );
		// add_action( 'elementor/frontend/before_register_scripts', [ $this, 'agenxe_regsiter_widget_scripts' ] );


        // category register

		add_action( 'elementor/elements/categories_registered',[ $this, 'agenxe_elementor_widget_categories' ] );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'agenxe' ),
			'<strong>' . esc_html__( 'Agenxe Core', 'agenxe' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'agenxe' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */

			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'agenxe' ),
			'<strong>' . esc_html__( 'Agenxe Core', 'agenxe' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'agenxe' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}
	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(

			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'agenxe' ),
			'<strong>' . esc_html__( 'Agenxe Core', 'agenxe' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'agenxe' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	/**
	 * Init Widgets
	 *
	 * Include widgets files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */

	public function init_widgets() {

		$widget_register = \Elementor\Plugin::instance()->widgets_manager;

		// Header Include file & Widget Register
		require_once( AGENXE_ADDONS . '/header/header.php' );
		$widget_register->register ( new \Agenxe_Header() );

		// Include All Widget Files
		foreach($this->Agenxe_Include_File() as $widget_file_name){
			require_once( AGENXE_ADDONS . '/widgets/agenxe-'."$widget_file_name".'.php' );
		}

		// All Widget Register
		foreach($this->Agenxe_Register_File() as $name){
			$widget_register->register ( $name );
		}
		
	}

	public function Agenxe_Include_File(){
		return [
			'banner', 
			'section-title', 
			'button', 
			'blog', 
			'service', 
			'testimonial', 
			'team', 
			'team-info', 
			'image', 
			'contact-info', 
			'contact-form', 
			'counterup', 
			'faq', 
			'brand-logo', 
			'cta', 
			'gallery', 
			'info-box', 
			'portfolio', 
			'portfolio-info',
			'newsletter', 
 
			'portfolio-filter',
			'animated-shape', 
			// 'arrows', 
			// 'tab-builder', 
			'skill', 
			// 'about-info', 
			'step', 
			// 'choose', 
			'features', 
			'video', 
			'price' 
		];
	}

	public function Agenxe_Register_File(){
		return [
			new \Agenxe_Banner() ,
			new \Agenxe_Section_Title(),
			new \Agenxe_Button(),
			new \Agenxe_Blog(),
			new \Agenxe_Service(),
			new \Agenxe_Testimonial(),
			new \Agenxe_Team(),
			new \Agenxe_Team_info(),
			new \Agenxe_Image(),
			new \Agenxe_Contact_Info(),
			new \Agenxe_Contact_Form(),
			new \Agenxe_Counterup(),
			new \Agenxe_Faq(),
			new \Agenxe_Brand_Logo(),
			new \Agenxe_Cta(),
			new \Agenxe_Gallery(),
			new \Agenxe_Info_Box(),
			new \agenxe_Portfolio(),
			new \agenxe_Portfolio_Info(),
			new \agenxe_Newsletter(),

			new \Agenxe_Portfolio_Filter(),
			new \Agenxe_Animated_Shape(),
			// new \Agenxe_Arrows(),
			// new \Agenxe_Tab_Builder(),
			new \agenxe_Skill(),
			// new \Agenxe_About_Info(),
			new \agenxe_Step(),
			// new \agenxe_Choose(),
			new \Agenxe_Features(),
			new \agenxe_Video(),
			new \Agenxe_Price()
		];
	}

    public function widget_scripts() {

        wp_enqueue_script(
            'agenxe-frontend-script',
            AGENXE_PLUGDIRURI . 'assets/js/agenxe-frontend.js',
            array('jquery'),
            false,
            true
		);

	}


	// public function agenxe_regsiter_widget_scripts( ) {

	// 	wp_register_script(
 //            'agenxe-tilt',
 //            AGENXE_PLUGDIRURI . 'assets/js/tilt.jquery.min.js',
 //            array('jquery'),
 //            false,
 //            true
	// 	);
	// }


    function agenxe_elementor_widget_categories( $elements_manager ) {

        $elements_manager->add_category(
            'agenxe',
            [
                'title' => __( 'Agenxe', 'agenxe' ),
                'icon' 	=> 'fa fa-plug',
            ]
        );

        $elements_manager->add_category(
            'agenxe_footer_elements',
            [
                'title' => __( 'Agenxe Footer Elements', 'agenxe' ),
                'icon' 	=> 'fa fa-plug',
            ]
		);

		$elements_manager->add_category(
            'agenxe_header_elements',
            [
                'title' => __( 'Agenxe Header Elements', 'agenxe' ),
                'icon' 	=> 'fa fa-plug',
            ]
        );
	}
}

Agenxe_Extension::instance();