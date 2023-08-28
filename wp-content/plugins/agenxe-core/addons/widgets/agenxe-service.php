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
 * Service Widget .
 *
 */
class agenxe_Service extends Widget_Base {

	public function get_name() {
		return 'agenxeservice';
	}
	public function get_title() {
		return __( 'Services', 'agenxe' );
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'agenxe' ];
	}

	protected function register_controls() {

		 $this->start_controls_section(
			'service_section',
			[
				'label'     => __( 'Services', 'agenxe' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'layout_style',
			[
				'label' 	=> __( 'Services Style', 'agenxe' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Style One', 'agenxe' ),
					'2'  		=> __( 'Style Two', 'agenxe' ),
					'3'  		=> __( 'Style Three', 'agenxe' ),
					'4'  		=> __( 'Style Four', 'agenxe' ),
				],
			]
		);

		$this->add_control(
			'shape',
			[
				'label'     => __( 'Background Shape', 'agenxe' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => [
					'active' => true,
				],
				'condition'	=> [
					'layout_style' => ['2', '4']
				]
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'show_number',
			[
				'label' 		=> __( 'Show Number?', 'agenxe' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Yes', 'agenxe' ),
				'label_off' 	=> __( 'No', 'agenxe' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);

		$repeater->add_control(
			'service_img',
			[
				'label'     => __( 'Image', 'agenxe' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => [
					'active' => true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
			]
		);

        $repeater->add_control(
			'service_title',
            [
				'label'         => __( 'Title', 'agenxe' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Title' , 'agenxe' ),
				'label_block'   => true,
				'rows' => '2'
			]
		);

        $repeater->add_control(
			'service_content',
            [
				'label'         => __( 'Content', 'agenxe' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Content' , 'agenxe' ),
				'label_block'   => true,
				'rows' => '4'
			]
		);

		$repeater->add_control(
			'button_text',
			[
				'label' 	=> __( 'Button Text', 'agenxe' ),
                'type' 		=> Controls_Manager::TEXT,
                'label_block' => true,
                'default'  	=> __( 'Read More', 'agenxe' )
			]
        );

        $repeater->add_control(
			'button_link',
			[
				'label' 		=> __( 'Link', 'agenxe' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'agenxe' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);

		$this->add_control(
			'service_list',
			[
				'label' 		=> __( 'Service Lists', 'agenxe' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'service_title' 		=> __( 'Personalized Learning', 'agenxe' ),
					],
				],
				'condition'	=> [
					'layout_style' => ['1', '2', '4']
				]
			]
		);

		$repeater2 = new Repeater();

		$repeater2->add_control(
			'show_number',
			[
				'label' 		=> __( 'Show Number?', 'agenxe' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Yes', 'agenxe' ),
				'label_off' 	=> __( 'No', 'agenxe' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);

		$repeater2->add_control(
			'service_img',
			[
				'label'     => __( 'Image', 'agenxe' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => [
					'active' => true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
			]
		);

        $repeater2->add_control(
			'service_title',
            [
				'label'         => __( 'Title', 'agenxe' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Title' , 'agenxe' ),
				'label_block'   => true,
				'rows' => '2'
			]
		);

		$repeater2->add_control(
			'button_text',
			[
				'label' 	=> __( 'Button Text', 'agenxe' ),
                'type' 		=> Controls_Manager::TEXT,
                'label_block' => true,
                'default'  	=> __( 'Read More', 'agenxe' )
			]
        );

        $repeater2->add_control(
			'button_link',
			[
				'label' 		=> __( 'Link', 'agenxe' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'agenxe' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);

		$this->add_control(
			'service_list_2',
			[
				'label' 		=> __( 'Service Lists', 'agenxe' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater2->get_controls(),
				'default' 		=> [
					[
						'service_title' 		=> __( 'Personalized Learning', 'agenxe' ),
					],
				],
				'condition'	=> [
					'layout_style' => ['3']
				]
			]
		);

        $this->end_controls_section();

        //---------------------------------------
			//Style Section Start
		//---------------------------------------

		//-------------------------Content Style-----------------------//
		$this->start_controls_section(
			'tab_styling',
			[
				'label' 	=> __( 'Content Styling', 'agenxe' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'style_tabs'
		);

			$this->start_controls_tab(
				'first_style_tab',
				[
					'label' => esc_html__( 'Title', 'agenxe' ),
				]
			);

			$this->add_control(
				'first_tab_color',
				[
					'label' 		=> __( 'Color', 'agenxe' ),
					'type' 			=> Controls_Manager::COLOR,
					'selectors' 	=> [
						'{{WRAPPER}} .th-title a'	=> 'color: {{VALUE}}!important;',
					],
				]
			);
			
			$this->add_control(
				'first_tab_color2',
				[
					'label' 		=> __( 'Hover Color', 'agenxe' ),
					'type' 			=> Controls_Manager::COLOR,
					'selectors' 	=> [
						'{{WRAPPER}} .th-title a:hover'	=> 'color: {{VALUE}}!important;',
					],
				]
			);

			$this->add_group_control(
			Group_Control_Typography::get_type(),
					[
					'name' 			=> 'first_tab_typography',
						'label' 		=> __( 'Typography', 'agenxe' ),
						'selector' 	=> '{{WRAPPER}} .th-title',
				]
			);

			$this->add_responsive_control(
				'first_tab_margin',
				[
					'label' 		=> __( 'Margin', 'agenxe' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', '%', 'em' ],
					'selectors' 	=> [
						'{{WRAPPER}} .th-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'first_tab_padding',
				[
					'label' 		=> __( 'Padding', 'agenxe' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', '%', 'em' ],
					'selectors' 	=> [
						'{{WRAPPER}} .th-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->end_controls_tab();

			//--------------------secound--------------------//
			$this->start_controls_tab(
				'sec_style_tab',
				[
					'label' => esc_html__( 'Content', 'agenxe' ),
					'condition'	=> [
						'layout_style' => ['1', '2']
					]
				]
			);

			$this->add_control(
				'sec_tab_color',
				[
					'label' 		=> __( 'Color', 'agenxe' ),
					'type' 			=> Controls_Manager::COLOR,
					'selectors' 	=> [
						'{{WRAPPER}} .th-desc'	=> 'color: {{VALUE}}!important;',
					],
				]
			);

			$this->add_group_control(
			Group_Control_Typography::get_type(),
					[
					'name' 			=> 'sec_tab_typography',
						'label' 		=> __( 'Typography', 'agenxe' ),
						'selector' 	=> '{{WRAPPER}} .th-desc',
				]
			);

			$this->add_responsive_control(
				'sec_tab_margin',
				[
					'label' 		=> __( 'Margin', 'agenxe' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', '%', 'em' ],
					'selectors' 	=> [
						'{{WRAPPER}} .th-desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'sec_tab_padding',
				[
					'label' 		=> __( 'Padding', 'agenxe' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', '%', 'em' ],
					'selectors' 	=> [
						'{{WRAPPER}} .th-desc' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->end_controls_tab();

			//--------------------threth--------------------//
			$this->start_controls_tab(
				'third_style_tab',
				[
					'label' => esc_html__( 'Button', 'agenxe' ),
					'condition'	=> [
						'layout_style' => ['1', '2']
					]
				]
			);

			$this->add_control(
				'third_tab_color',
				[
					'label' 		=> __( 'Color', 'agenxe' ),
					'type' 			=> Controls_Manager::COLOR,
					'selectors' 	=> [
						'{{WRAPPER}} .th_btn'	=> '--theme-color: {{VALUE}}!important;',
					],
				]
			);

			$this->add_control(
				'third_tab_bg',
				[
					'label' 		=> __( 'Hover Color', 'agenxe' ),
					'type' 			=> Controls_Manager::COLOR,
					'selectors' 	=> [
						'{{WRAPPER}} .th_btn:hover'	=> '--theme-color: {{VALUE}}!important;',
					],
				]
			);

			$this->add_group_control(
			Group_Control_Typography::get_type(),
					[
					'name' 			=> 'third_tab_typography',
						'label' 		=> __( 'Typography', 'agenxe' ),
						'selector' 	=> '{{WRAPPER}} .th_btn',
				]
			);

			$this->add_responsive_control(
				'third_tab_margin',
				[
					'label' 		=> __( 'Margin', 'agenxe' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', '%', 'em' ],
					'selectors' 	=> [
						'{{WRAPPER}} .th_btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();
    ?>

    <?php if( $settings['layout_style'] == '2' ): ?>
		<div class="row gy-30 gx-30">
			<?php foreach( $settings['service_list'] as $key => $data ): ?>
			<div class="col-lg-6">
				<div class="service-wrap style2 wow fadeInUp" data-bg-src="<?php echo esc_url($settings['shape']['url']); ?>">
					<div class="service-wrap_bg"></div>
					<div class="service-wrap_icon">
						<?php echo agenxe_img_tag( array(
								'url'   => esc_url( $data['service_img']['url']  ),
							)); ?>
					</div>
					<div class="service-wrap_content">
						<h3 class="box-title th-title"><a href="<?php echo esc_url( $data['button_link']['url'] ); ?>"><?php echo esc_html( $data['service_title'] ); ?></a></h3>
						<p class="service-wrap_text th-desc"><?php echo esc_html( $data['service_content'] );  ?></p>
						<a href="<?php echo esc_url( $data['button_link']['url'] ); ?>" class="link-btn th_btn"><?php echo wp_kses_post( $data['button_text'] );  ?></a>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>

	<?php elseif( $settings['layout_style'] == '3' ): ?>
		<?php foreach( $settings['service_list_2'] as $key => $data ): 
			$n = $key + 1;
		?>
		<div class="service-wrap style3 wow fadeInUp">
			<div class="service-wrap_bg">
				<?php echo agenxe_img_tag( array(
					'url'   => esc_url( $data['service_img']['url']  ),
					)); ?>
			</div>
			<div class="service-wrap_content">
				<?php if(!empty( $data['show_number'])): ?>
					<div class="service-wrap_num"><?php echo esc_attr('0' . $n ); ?></div>
				<?php endif; ?>
				<h3 class="service-wrap_title th-title"><a href="<?php echo esc_url( $data['button_link']['url'] ); ?>"><?php echo esc_html( $data['service_title'] ); ?></a></h3>
				<a href="<?php echo esc_url( $data['button_link']['url'] ); ?>" class="service-wrap_icon th_btn"><?php echo wp_kses_post( $data['button_text'] );  ?></a>
			</div>
		</div>
		<?php endforeach; ?>

	<?php elseif( $settings['layout_style'] == '4' ): ?>
		<div class="row th-carousel" data-slide-show="2" data-ml-slide-show="2" data-lg-slide-show="2" data-md-slide-show="1" data-arrows="true">
			<?php foreach( $settings['service_list'] as $key => $data ): ?>
			<div class="col-md-6">
				<div class="service-wrap style2 wow fadeInUp" data-bg-src="<?php echo esc_url($settings['shape']['url']); ?>">
					<div class="service-wrap_bg"></div>
					<div class="service-wrap_icon">
						<?php echo agenxe_img_tag( array(
								'url'   => esc_url( $data['service_img']['url']  ),
							)); ?>
					</div>
					<div class="service-wrap_content">
						<h3 class="box-title th-title"><a href="<?php echo esc_url( $data['button_link']['url'] ); ?>"><?php echo esc_html( $data['service_title'] ); ?></a></h3>
						<p class="service-wrap_text th-desc"><?php echo esc_html( $data['service_content'] );  ?></p>
						<a href="<?php echo esc_url( $data['button_link']['url'] ); ?>" class="link-btn th_btn"><?php echo wp_kses_post( $data['button_text'] );  ?></a>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>

    <?php else: ?>
		<div class="row justify-content-between gy-40">
			<?php foreach( $settings['service_list'] as $key => $data ): ?>
			<div class="col-xl-auto col-lg-4 service-counter-divider">
				<div class="service-wrap style4 wow fadeInUp">
					<div class="service-wrap_thumb">
						<?php echo agenxe_img_tag( array(
								'url'   => esc_url( $data['service_img']['url']  ),
								'class' => 'service-wrap_img',
							)); ?>
					</div>
					<?php if(!empty( $data['show_number'])): ?>
						<div class="service-wrap_number"><?php echo $key + 1; ?></div>
					<?php endif; ?>
					<div class="service-wrap_content">
						<h3 class="box-title th-title"><a href="<?php echo esc_url( $data['button_link']['url'] ); ?>"><?php echo esc_html( $data['service_title'] ); ?></a></h3>
						<p class="service-wrap_text th-desc"><?php echo esc_html( $data['service_content'] );  ?></p>
						<a href="<?php echo esc_url( $data['button_link']['url'] ); ?>" class="link-btn th_btn"><?php echo wp_kses_post( $data['button_text'] );  ?></a>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>

    <?php endif; 

	}

}