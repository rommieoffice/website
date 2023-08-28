<?php
    /**
     * Class For Builder
     */
    class AgenxeBuilder{

        function __construct(){
            // register admin menus
        	add_action( 'admin_menu', [$this, 'register_settings_menus'] );

            // Custom Footer Builder With Post Type
			add_action( 'init',[ $this,'post_type' ],0 );

 		    add_action( 'elementor/frontend/after_enqueue_scripts', [ $this,'widget_scripts'] );

			add_filter( 'single_template', [ $this, 'load_canvas_template' ] );

            add_action( 'elementor/element/wp-page/document_settings/after_section_end', [ $this,'agenxe_add_elementor_page_settings_controls' ],10,2 );

		}

		public function widget_scripts( ) {
			wp_enqueue_script( 'agenxe-core',AGENXE_PLUGDIRURI.'assets/js/agenxe-core.js',array( 'jquery' ),'1.0',true );
		}


        public function agenxe_add_elementor_page_settings_controls( \Elementor\Core\DocumentTypes\Page $page ){

			$page->start_controls_section(
                'agenxe_header_option',
                [
                    'label'     => __( 'Header Option', 'agenxe' ),
                    'tab'       => \Elementor\Controls_Manager::TAB_SETTINGS,
                ]
            );


            $page->add_control(
                'agenxe_header_style',
                [
                    'label'     => __( 'Header Option', 'agenxe' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => [
    					'prebuilt'             => __( 'Pre Built', 'agenxe' ),
    					'header_builder'       => __( 'Header Builder', 'agenxe' ),
    				],
                    'default'   => 'prebuilt',
                ]
			);

            $page->add_control(
                'agenxe_header_builder_option',
                [
                    'label'     => __( 'Header Name', 'agenxe' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => $this->agenxe_header_choose_option(),
                    'condition' => [ 'agenxe_header_style' => 'header_builder'],
                    'default'	=> ''
                ]
            );

            $page->end_controls_section();

            $page->start_controls_section(
                'agenxe_footer_option',
                [
                    'label'     => __( 'Footer Option', 'agenxe' ),
                    'tab'       => \Elementor\Controls_Manager::TAB_SETTINGS,
                ]
            );
            $page->add_control(
    			'agenxe_footer_choice',
    			[
    				'label'         => __( 'Enable Footer?', 'agenxe' ),
    				'type'          => \Elementor\Controls_Manager::SWITCHER,
    				'label_on'      => __( 'Yes', 'agenxe' ),
    				'label_off'     => __( 'No', 'agenxe' ),
    				'return_value'  => 'yes',
    				'default'       => 'yes',
    			]
    		);
            $page->add_control(
                'agenxe_footer_style',
                [
                    'label'     => __( 'Footer Style', 'agenxe' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => [
    					'prebuilt'             => __( 'Pre Built', 'agenxe' ),
    					'footer_builder'       => __( 'Footer Builder', 'agenxe' ),
    				],
                    'default'   => 'prebuilt',
                    'condition' => [ 'agenxe_footer_choice' => 'yes' ],
                ]
            );
            $page->add_control(
                'agenxe_footer_builder_option',
                [
                    'label'     => __( 'Footer Name', 'agenxe' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => $this->agenxe_footer_build_choose_option(),
                    'condition' => [ 'agenxe_footer_style' => 'footer_builder','agenxe_footer_choice' => 'yes' ],
                    'default'	=> ''
                ]
            );

			$page->end_controls_section();

        }

		public function register_settings_menus(){
			add_menu_page(
				esc_html__( 'Agenxe Builder', 'agenxe' ),
            	esc_html__( 'Agenxe Builder', 'agenxe' ),
				'manage_options',
				'agenxe',
				[$this,'register_settings_contents__settings'],
				'dashicons-admin-site',
				2
			);

			add_submenu_page('agenxe', esc_html__('Footer Builder', 'agenxe'), esc_html__('Footer Builder', 'agenxe'), 'manage_options', 'edit.php?post_type=agenxe_footerbuild');
			add_submenu_page('agenxe', esc_html__('Header Builder', 'agenxe'), esc_html__('Header Builder', 'agenxe'), 'manage_options', 'edit.php?post_type=agenxe_header');
			add_submenu_page('agenxe', esc_html__('Tab Builder', 'agenxe'), esc_html__('Tab Builder', 'agenxe'), 'manage_options', 'edit.php?post_type=agenxe_tab_builder');
		}

		// Callback Function
		public function register_settings_contents__settings(){
            echo '<h2>';
			    echo esc_html__( 'Welcome To Header And Footer Builder Of This Theme','agenxe' );
            echo '</h2>';
		}

		public function post_type() {

			$labels = array(
				'name'               => __( 'Footer', 'agenxe' ),
				'singular_name'      => __( 'Footer', 'agenxe' ),
				'menu_name'          => __( 'Agenxe Footer Builder', 'agenxe' ),
				'name_admin_bar'     => __( 'Footer', 'agenxe' ),
				'add_new'            => __( 'Add New', 'agenxe' ),
				'add_new_item'       => __( 'Add New Footer', 'agenxe' ),
				'new_item'           => __( 'New Footer', 'agenxe' ),
				'edit_item'          => __( 'Edit Footer', 'agenxe' ),
				'view_item'          => __( 'View Footer', 'agenxe' ),
				'all_items'          => __( 'All Footer', 'agenxe' ),
				'search_items'       => __( 'Search Footer', 'agenxe' ),
				'parent_item_colon'  => __( 'Parent Footer:', 'agenxe' ),
				'not_found'          => __( 'No Footer found.', 'agenxe' ),
				'not_found_in_trash' => __( 'No Footer found in Trash.', 'agenxe' ),
			);

			$args = array(
				'labels'              => $labels,
				'public'              => true,
				'rewrite'             => false,
				'show_ui'             => true,
				'show_in_menu'        => false,
				'show_in_nav_menus'   => false,
				'exclude_from_search' => true,
				'capability_type'     => 'post',
				'hierarchical'        => false,
				'supports'            => array( 'title', 'elementor' ),
			);

			register_post_type( 'agenxe_footerbuild', $args );

			$labels = array(
				'name'               => __( 'Header', 'agenxe' ),
				'singular_name'      => __( 'Header', 'agenxe' ),
				'menu_name'          => __( 'Agenxe Header Builder', 'agenxe' ),
				'name_admin_bar'     => __( 'Header', 'agenxe' ),
				'add_new'            => __( 'Add New', 'agenxe' ),
				'add_new_item'       => __( 'Add New Header', 'agenxe' ),
				'new_item'           => __( 'New Header', 'agenxe' ),
				'edit_item'          => __( 'Edit Header', 'agenxe' ),
				'view_item'          => __( 'View Header', 'agenxe' ),
				'all_items'          => __( 'All Header', 'agenxe' ),
				'search_items'       => __( 'Search Header', 'agenxe' ),
				'parent_item_colon'  => __( 'Parent Header:', 'agenxe' ),
				'not_found'          => __( 'No Header found.', 'agenxe' ),
				'not_found_in_trash' => __( 'No Header found in Trash.', 'agenxe' ),
			);

			$args = array(
				'labels'              => $labels,
				'public'              => true,
				'rewrite'             => false,
				'show_ui'             => true,
				'show_in_menu'        => false,
				'show_in_nav_menus'   => false,
				'exclude_from_search' => true,
				'capability_type'     => 'post',
				'hierarchical'        => false,
				'supports'            => array( 'title', 'elementor' ),
			);

			register_post_type( 'agenxe_header', $args );

			$labels = array(
				'name'               => __( 'Tab Builder', 'agenxe' ),
				'singular_name'      => __( 'Tab Builder', 'agenxe' ),
				'menu_name'          => __( 'Gesund Tab Builder', 'agenxe' ),
				'name_admin_bar'     => __( 'Tab Builder', 'agenxe' ),
				'add_new'            => __( 'Add New', 'agenxe' ),
				'add_new_item'       => __( 'Add New Tab Builder', 'agenxe' ),
				'new_item'           => __( 'New Tab Builder', 'agenxe' ),
				'edit_item'          => __( 'Edit Tab Builder', 'agenxe' ),
				'view_item'          => __( 'View Tab Builder', 'agenxe' ),
				'all_items'          => __( 'All Tab Builder', 'agenxe' ),
				'search_items'       => __( 'Search Tab Builder', 'agenxe' ),
				'parent_item_colon'  => __( 'Parent Tab Builder:', 'agenxe' ),
				'not_found'          => __( 'No Tab Builder found.', 'agenxe' ),
				'not_found_in_trash' => __( 'No Tab Builder found in Trash.', 'agenxe' ),
			);

			$args = array(
				'labels'              => $labels,
				'public'              => true,
				'rewrite'             => false,
				'show_ui'             => true,
				'show_in_menu'        => false,
				'show_in_nav_menus'   => false,
				'exclude_from_search' => true,
				'capability_type'     => 'post',
				'hierarchical'        => false,
				'supports'            => array( 'title', 'elementor' ),
			);

			register_post_type( 'agenxe_tab_builder', $args );
		}

		function load_canvas_template( $single_template ) {

			global $post;

			if ( 'agenxe_footerbuild' == $post->post_type || 'agenxe_header' == $post->post_type || 'agenxe_tab_build' == $post->post_type ) {

				$elementor_2_0_canvas = ELEMENTOR_PATH . '/modules/page-templates/templates/canvas.php';

				if ( file_exists( $elementor_2_0_canvas ) ) {
					return $elementor_2_0_canvas;
				} else {
					return ELEMENTOR_PATH . '/includes/page-templates/canvas.php';
				}
			}

			return $single_template;
		}

        public function agenxe_footer_build_choose_option(){

			$agenxe_post_query = new WP_Query( array(
				'post_type'			=> 'agenxe_footerbuild',
				'posts_per_page'	    => -1,
			) );

			$agenxe_builder_post_title = array();
			$agenxe_builder_post_title[''] = __('Select a Footer','agenxe');

			while( $agenxe_post_query->have_posts() ) {
				$agenxe_post_query->the_post();
				$agenxe_builder_post_title[ get_the_ID() ] =  get_the_title();
			}
			wp_reset_postdata();

			return $agenxe_builder_post_title;

		}

		public function agenxe_header_choose_option(){

			$agenxe_post_query = new WP_Query( array(
				'post_type'			=> 'agenxe_header',
				'posts_per_page'	    => -1,
			) );

			$agenxe_builder_post_title = array();
			$agenxe_builder_post_title[''] = __('Select a Header','agenxe');

			while( $agenxe_post_query->have_posts() ) {
				$agenxe_post_query->the_post();
				$agenxe_builder_post_title[ get_the_ID() ] =  get_the_title();
			}
			wp_reset_postdata();

			return $agenxe_builder_post_title;

        }

    }

    $builder_execute = new AgenxeBuilder();