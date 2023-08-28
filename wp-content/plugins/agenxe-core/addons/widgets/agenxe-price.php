<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Border;
use \Elementor\Repeater;
/**
 *
 * Price Widget .
 *
 */
class Agenxe_Price extends Widget_Base {

	public function get_name() {
		return 'agenxeprice';
	}
	public function get_title() {
		return __( 'Price Box', 'agenxe' );
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'agenxe' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'price_section',
			[
				'label' 	=> __( 'Price Box', 'agenxe' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'layout_style',
			[
				'label' 	=> __( 'Layout Style', 'agenxe' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Style One', 'agenxe' ),
				],
			]
		);

		$repeater = new Repeater();

        $repeater->add_control(
			'title',
			[
				'label'     => __( 'Title', 'agenxe' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                 'default'  	=> esc_html__( 'Basic Plan', 'agenxe' ),
			]
        );

        $repeater->add_control(
			'price',
			[
				'label'     => __( 'Price', 'agenxe' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 3,
                 'default'  	=> esc_html__( '$55/Per Month', 'agenxe' ),
			]
        );	

        $repeater->add_control(
			'features', [
				'label' 		=> __( 'Features', 'agenxe' ),
				'type' 			=> Controls_Manager::WYSIWYG,
				'default' 		=> __( '12 Hour Session' , 'agenxe' ),
				'label_block' 	=> true,
			]
        );

        $repeater->add_control(
			'button_text',
			[
				'label' 	=> esc_html__( 'Button Text', 'agenxe' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> esc_html__( 'Choose Plan', 'agenxe' ),
			]
        );

        $repeater->add_control(
			'button_link',
			[
				'label' 		=> esc_html__( 'Link', 'agenxe' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'agenxe' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);

        $this->add_control(
			'price_list',
			[
				'label' 		=> __( 'Price List', 'agenxe' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'title', 'agenxe' ),
					],
				],
			]
		);

		$this->end_controls_section();

        //---------------------------------------
			//Style Section Start
		//---------------------------------------

		//-------------------------General Style-----------------------//
        $this->start_controls_section(
			'style',
			[
				'label' => __( 'General', 'agenxe' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'general_bg',
			[
				'label' 		=> __( 'Background Color', 'agenxe' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .price-card' => 'background-color: {{VALUE}}!important',
                ],
			]
        );

		$this->add_responsive_control(
			'general_padding',
			[
				'label' 		=> __( 'Padding', 'agenxe' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .price-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);

        $this->end_controls_section();


		//-------------------------Package Name Style-----------------------//
        $this->start_controls_section(
			'price_title_style',
			[
				'label' => __( 'Package Name Style', 'agenxe' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
			'price_title_color',
			[
				'label' 	=> __( 'Color', 'agenxe' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .price-card_title' => 'color: {{VALUE}}!important;',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'price_title_typography',
				'label' 	=> __( '  Typography', 'agenxe' ),
                'selector' 	=> '{{WRAPPER}} .price-card_title',
			]
		);

        $this->add_responsive_control(
			'price_title_margin',
			[
				'label' 		=> __( '  Margin', 'agenxe' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .price-card_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'price_title_padding',
			[
				'label' 		=> __( '  Padding', 'agenxe' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .price-card_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);

        $this->end_controls_section();

		//-------------------------Price Style-----------------------//
        $this->start_controls_section(
			'price_style_section',
			[
				'label' => __( 'Price Style', 'agenxe' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'price_subtitle_color',
			[
				'label' 		=> __( ' Color', 'agenxe' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .price-card_price' => 'color: {{VALUE}}!important',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'price_subtitle_typography',
				'label' 	=> __( '  Typography', 'agenxe' ),
                'selector' 	=> '{{WRAPPER}} .price-card_price',
			]
        );

        $this->add_responsive_control(
			'price_subtitle_margin',
			[
				'label' 		=> __( '  Margin', 'agenxe' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .price-card_price' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

			]
        );

        $this->add_responsive_control(
			'price_subtitle_padding',
			[
				'label' 		=> __( '  Padding', 'agenxe' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .price-card_price' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
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

	protected function render() {

	$settings = $this->get_settings_for_display();
	?>
	
		<?php if( $settings['layout_style'] == '2' ): ?>
    

		<?php else: ?>
			<div class="row gy-4 justify-content-center">
				<?php 
				$x = 1;
				foreach( $settings['price_list'] as $data ): 
				$x = $x + 2;
				?>
				<div class="col-xl-4 col-md-6">
					<div class="price-card wow fadeInUp" data-wow-delay="0.<?php echo esc_attr($x) ?>s">
						<div class="price-card_top">
							<h3 class="price-card_title"><?php echo esc_html($data['title']); ?></h3>
							<h4 class="price-card_price">
								<?php echo wp_kses_post($data['price']); ?>
							</h4>
						</div>
						<div class="price-card_content">
							<div class="checklist">
								<?php echo wp_kses_post($data['features']); ?>
							</div>
							<a href="<?php echo esc_url( $data['button_link']['url'] ); ?>" class="th-btn style-border2 w-100 th_btn"><?php echo esc_html($data['button_text']); ?></a>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>

        <?php endif; 

	}

}