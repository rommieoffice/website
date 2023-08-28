<?php

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
/**
 *
 * Header Widget .
 *
 */
class Agenxe_Header extends Widget_Base {

	public function get_name() {
		return 'agenxeheader';
	}
	public function get_title() {
		return __( 'Header', 'agenxe' );
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'agenxe_header_elements' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'layout_section',
			[
				'label' 	=> __( 'Header', 'agenxe' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'layout_style',
			[
				'label' 	=> __( 'Layout Style', 'agenxe' ),
				'type' 		=> Controls_Manager::SELECT,
				'options' 	=> [
					'1' => __( 'Style One', 'agenxe' ),
				],
				'default' => '1',
			]
        );

		$this->add_control(
			'logo_image',

			[
				'label' 		=> __( 'Upload Logo', 'agenxe' ),
				'type' 			=> Controls_Manager::MEDIA,
			]
		);		

		$menus = $this->agenxe_menu_select();

		if( !empty( $menus ) ){
	        $this->add_control(
				'agenxe_menu_select',
				[
					'label'     	=> __( 'Select Agenxe Menu', 'agenxe' ),
					'type'      	=> Controls_Manager::SELECT,
					'options'   	=> $menus,
					'description' 	=> sprintf( __( 'Go to the <a href="%s" target="_blank">Menus screen</a> to manage your menus.', 'agenxe' ), admin_url( 'nav-menus.php' ) ),
				]
			);
		}else {
			$this->add_control(
				'no_menu',
				[
					'type' 				=> Controls_Manager::RAW_HTML,
					'raw' 				=> '<strong>' . __( 'There are no menus in your site.', 'agenxe' ) . '</strong><br>' . sprintf( __( 'Go to the <a href="%s" target="_blank">Menus screen</a> to create one.', 'agenxe' ), admin_url( 'nav-menus.php?action=edit&menu=0' ) ),
					'separator' 		=> 'after',
					'content_classes' 	=> 'elementor-panel-alert elementor-panel-alert-info',
				]
			);
		}

		$this->add_control(
			'show_search_btn',
			[
				'label' 		=> __( 'Show Search Button?', 'agenxe' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'agenxe' ),
				'label_off' 	=> __( 'Hide', 'agenxe' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);		

		$this->add_control(
			'show_cart_btn',
			[
				'label' 		=> __( 'Show Cart Button?', 'agenxe' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'agenxe' ),
				'label_off' 	=> __( 'Hide', 'agenxe' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
				'separator'		=> 'before',
			]
		);

		$this->add_control(
			'show_btn',
			[
				'label' 		=> __( 'Show Button?', 'agenxe' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'agenxe' ),
				'label_off' 	=> __( 'Hide', 'agenxe' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);

		$this->add_control(
			'button_text',
			[
				'label' 		=> __( 'Button Text', 'agenxe' ),
				'type' 			=> Controls_Manager::TEXT,
				'label_block' 	=> true,
				'default' 	=> __( 'REGISTER NOW', 'agenxe' ),
				'condition'		=> [
					'show_btn' => [ 'yes' ],
				],
			]
		);

		$this->add_control(
			'button_url',
			[
				'label' 		=> esc_html__( 'Button Link', 'agenxe' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'agenxe' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
				'condition'		=> [
					'show_btn' => [ 'yes' ],
				],
			]
		);

        $this->end_controls_section();

		//---------------------------------------
			//Style Section Start
		//---------------------------------------

		//-------------------------General Style-----------------------//
		 $this->start_controls_section(
			'general_styling',
			[
				'label'     => __( 'Background Styling', 'agenxe' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'header_menu_bg',
			[
				'label' 		=> __( 'Menu Background', 'agenxe' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .sticky-wrapper' => 'background-color: {{VALUE}} !important;',
                ],
			]
        );    

		$this->end_controls_section();

		//-------------------------Menu Bar Style-----------------------//
        $this->start_controls_section(
			'menubar_styling3',
			[
				'label'     => __( 'Menu Styling', 'agenxe' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'menu_text_color',
			[
				'label' 			=> __( 'Menu Text Color', 'agenxe' ),
				'type' 				=> Controls_Manager::COLOR,
				'selectors' 		=> [
					'{{WRAPPER}} .main-menu>ul>li>a' => 'color: {{VALUE}};',
                ]
			]
        );

        $this->add_control(
			'menu_text_hover_color',
			[
				'label' 			=> __( 'Menu Hover Color', 'agenxe' ),
				'type' 				=> Controls_Manager::COLOR,
				'selectors' 		=> [
					'{{WRAPPER}} .main-menu>ul>li>a:hover' => 'color: {{VALUE}};',
                ]
			]
        );

        $this->add_control(
			'dropdown_text_color',
			[
				'label' 			=> __( 'Dropdown Text Color', 'agenxe' ),
				'type' 				=> Controls_Manager::COLOR,
				'selectors' 		=> [
					'{{WRAPPER}} .main-menu ul.sub-menu li a' => 'color: {{VALUE}};',
                ]
			]
        );

        $this->add_control(
			'dropdown_text_hover_color',
			[
				'label' 			=> __( 'Dropdown Hover Color', 'agenxe' ),
				'type' 				=> Controls_Manager::COLOR,
				'selectors' 		=> [
					'{{WRAPPER}} .main-menu ul.sub-menu li a:hover' => 'color: {{VALUE}};',
                ]
			]
        );

		// $this->add_control(
		// 	'dropdown_icon_color',
		// 	[
		// 		'label' 			=> __( 'Dropdown Icon Color', 'agenxe' ),
		// 		'type' 				=> Controls_Manager::COLOR,
		// 		'selectors' 		=> [
		// 			'{{WRAPPER}} .main-menu ul.sub-menu li a:before' => 'color: {{VALUE}} !important;',
        //         ]
		// 	]
        // );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'menu_typography',
				'label' 		=> __( 'Menu Typography', 'agenxe' ),
                'selector' 		=> '{{WRAPPER}} .main-menu>ul>li>a, {{WRAPPER}} .main-menu ul.sub-menu li a',
			]
		);

        $this->add_responsive_control(
			'menu_margin',
			[
				'label' 		=> __( 'Menu Margin', 'agenxe' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .main-menu>ul>li>a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ]
			]
        );

        $this->add_responsive_control(
			'menu_padding',
			[
				'label' 		=> __( 'Menu Padding', 'agenxe' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .main-menu>ul>li>a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ]
			]
		);

		$this->end_controls_section();

		//-------------------------Button Style-----------------------//
		$this->start_controls_section(
			'button_style_section',
			[
				'label' 	=> __( 'Button Style', 'agenxe' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'button_typography',
				'label' 	=> __( 'Typography', 'agenxe' ),
				'selector' 	=> '{{WRAPPER}} .th_btn',
			]
		);

		$this->start_controls_tabs(
			'style_tabs'
		);

			$this->start_controls_tab(
				'first_style_tab',
				[
					'label' => esc_html__( 'Normal', 'agenxe' ),
				]
			);

			$this->add_control(
				'button_color',
				[
					'label' 		=> __( 'Color', 'agenxe' ),
					'type' 			=> Controls_Manager::COLOR,
					'selectors' 	=> [
						'{{WRAPPER}} .th_btn' => 'color: {{VALUE}}',
					],
				]
			);
	
			$this->add_control(
				'button_bg',
				[
					'label' 		=> __( 'Background Color', 'agenxe' ),
					'type' 			=> Controls_Manager::COLOR,
					'selectors' 	=> [
						'{{WRAPPER}} .th_btn' => 'background-color:{{VALUE}}',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'border',
					'selector' => '{{WRAPPER}} .th_btn',
				]
			);

			$this->end_controls_tab();

			//--------------------secound--------------------//
			$this->start_controls_tab(
				'sec_style_tab',
				[
					'label' => esc_html__( 'Hover', 'agenxe' ),
				]
			);

			$this->add_control(
				'button_h_color',
				[
					'label' 		=> __( 'Hover Color ', 'agenxe' ),
					'type' 			=> Controls_Manager::COLOR,
					'selectors' 	=> [
						'{{WRAPPER}} .th_btn:hover' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'button_h_bg',
				[
					'label' 		=> __( 'Background Hover Color', 'agenxe' ),
					'type' 			=> Controls_Manager::COLOR,
					'selectors' 	=> [
						'{{WRAPPER}} .th_btn:before, {{WRAPPER}} .th_btn:after' => 'background-color:{{VALUE}} !important',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'border2',
					'selector' => '{{WRAPPER}} .th_btn:hover',
				]
			);

			$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_control(
			'hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_responsive_control(
			'button_margin',
			[
				'label' 		=> __( 'Margin', 'agenxe' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th_btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_responsive_control(
			'button_padding',
			[
				'label' 		=> __( 'Padding', 'agenxe' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th_btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		
		$this->add_responsive_control(
			'button_border_radius',
			[
				'label' 		=> __( 'Border Radius', 'agenxe' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th_btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->end_controls_section();

    }

    public function agenxe_menu_select(){
	    $agenxe_menu = wp_get_nav_menus();
	    $menu_array  = array();
		$menu_array[''] = __( 'Select A Menu', 'agenxe' );
	    foreach( $agenxe_menu as $menu ){
	        $menu_array[ $menu->slug ] = $menu->name;
	    }
	    return $menu_array;
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

		global $woocommerce;

        //Menu by menu select
        $agenxe_avaiable_menu   = $this->agenxe_menu_select();
		if( ! $agenxe_avaiable_menu ){
			return;
		}
		$args = [
			'menu' 			=> $settings['agenxe_menu_select'],
			'menu_class' 	=> 'agenxe-menu',
			'container' 	=> '',
		];

		//Mobile menu, Offcanvas, Search
        echo agenxe_mobile_menu();
		echo agenxe_header_cart_offcanvas();
		echo agenxe_header_offcanvas();
		echo agenxe_search_box();
		?>

		<?php if( $settings['layout_style'] == '2' ): ?>

	
		<?php else: ?>
			<div class="th-header header-layout2">
				<div class="sticky-wrapper">
					<!-- Main Menu Area -->
					<div class="menu-area">
						<div class="container th-container">
							<div class="row align-items-center justify-content-between">
								<div class="col-auto">
									<div class="header-logo">
										<a href="<?php echo esc_url( home_url( '/' ) ) ?>">
											<?php echo agenxe_img_tag( array(
												'url'   => esc_url( $settings['logo_image']['url']  ),
											)); ?>
										</a>
									</div>
								</div>
								<div class="col-auto">
									<nav class="main-menu d-none d-lg-inline-block">
										<?php if( ! empty( $settings['agenxe_menu_select'] ) ){
											wp_nav_menu( $args );
										} ?>
									</nav>
									<button type="button" class="th-menu-toggle d-block d-lg-none"><i class="far fa-bars"></i></button>
								</div>
								<div class="col-auto d-none d-lg-block">
									<div class="header-button">
										<?php if(!empty( $settings['show_search_btn'])): ?>
											<button type="button" class="simple-icon searchBoxToggler"><i class="far fa-search"></i></button>
										<?php endif; ?>
										<?php 
											if(!empty( $settings['show_cart_btn'])): 
												if( ! empty( $woocommerce->cart->cart_contents_count ) ){
													$count = $woocommerce->cart->cart_contents_count;
												}else{
													$count = "0";
												}
										?>
										<button type="button" class="simple-icon sideMenuToggler">
											<i class="far fa-shopping-cart"></i>
											<span class="badge"><?php echo esc_html( $count ); ?></span>
										</button>
										<?php endif; ?>
										<?php if(!empty( $settings['show_btn'])): ?>
											<a href="<?php echo esc_url($settings['button_url']['url']); ?>" class="th-btn th_btn"><?php echo wp_kses_post($settings['button_text']); ?></a>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		<?php endif; 

	}
}