<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Group_Control_Border;
/**
 *
 * Banner Widget.
 *
 */
class agenxe_Banner extends Widget_Base {

	public function get_name() {
		return 'agenxebanner';
	}
	public function get_title() {
		return __( 'Banner', 'agenxe' );
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'agenxe_header_elements' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'banner_section',
			[
				'label' 	=> __( 'Banner', 'agenxe' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'layout_style',
			[
				'label' 		=> __( 'Layout Style', 'agenxe' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options' 		=> [
					'1'  		=> __( 'Style One', 'agenxe' ),
					'2' 		=> __( 'Style Two', 'agenxe' ),
					'3' 		=> __( 'Style Three', 'agenxe' ),
				],
			]
		);

		$this->add_control(
            'banner_bg',
            [
                'label'     => __( 'Banner BG', 'agenxe' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
            ]
        );

		$this->add_control(
            'banner_img',
            [
                'label'     => __( 'Banner Image', 'agenxe' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],	
            ]
        );

		$this->add_control(
            'banner_img2',
            [
                'label'     => __( 'Title Image', 'agenxe' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
				'condition'	=> [
					'layout_style' => ['1']
				]	
            ]
        );

        $this->add_control(
			'banner_title', [
				'label' 		=> __( 'Title', 'agenxe' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Title here' , 'agenxe' ),
				'label_block' 	=> true,	
			]
        );

        $this->add_control(
			'banner_title2', [
				'label' 		=> __( 'Title 2', 'agenxe' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Title here' , 'agenxe' ),
				'label_block' 	=> true,
				'condition'	=> [
					'layout_style' => ['1']
				]	
			]
        );

        $this->add_control(
			'banner_title3', [
				'label' 		=> __( 'Title 3', 'agenxe' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Title here' , 'agenxe' ),
				'label_block' 	=> true,
				'condition'	=> [
					'layout_style' => ['1']
				]	
			]
        );

		$this->add_control(
			'button_text',
			[
				'label' 	=> __( 'Button Text', 'agenxe' ),
                'type' 		=> Controls_Manager::TEXT,
                'label_block' => true,
                'default'  	=> __( 'Read More', 'agenxe' ),
				'condition'	=> [
					'layout_style' => ['2']
				]
			]
        );

        $this->add_control(
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
				'condition'	=> [
					'layout_style' => ['2']
				]
			]
		);
		
		$this->add_control(
            'banner_bg2',
            [
                'label'     => __( 'Button Shape', 'agenxe' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
				'condition'	=> [
					'layout_style' => ['2']
				]
            ]
        );
		
		$this->add_control(
            'video_img',
            [
                'label'     => __( 'Video Image', 'agenxe' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
				'condition'	=> [
					'layout_style' => ['3']
				]	
            ]
        );

		$this->add_control(
			'video_bg_link',
			[
				'label' 		=> __( 'Video bg video path Link', 'agenxe' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'agenxe' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
				'condition'	=> [
					'layout_style' => ['2']
				]	
			]
		);

		$this->add_control(
			'video_link',
			[
				'label' 		=> __( 'Youtube Video Link', 'agenxe' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'agenxe' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
				'condition'	=> [
					'layout_style' => ['2', '3']
				]	
			]
		);

		$this->add_control(
            'client_img',
            [
                'label'     => __( 'Client Image', 'agenxe' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
				'condition'	=> [
					'layout_style' => ['3']
				]	
            ]
        );

		$this->add_control(
			'client_title', [
				'label' 		=> __( 'Title', 'agenxe' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( '' , 'agenxe' ),
				'label_block' 	=> true,
				'condition'	=> [
					'layout_style' => ['3']
				]	
			]
        );

		$this->add_control(
			'client_title2', [
				'label' 		=> __( 'Title 2', 'agenxe' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( '' , 'agenxe' ),
				'label_block' 	=> true,
				'condition'	=> [
					'layout_style' => ['3']
				]	
			]
        );
		
		$this->add_control(
            'shape',
            [
                'label'     => __( 'Shape', 'agenxe' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],	
            ]
        );
		$this->add_control(
            'shape2',
            [
                'label'     => __( 'Shape', 'agenxe' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],	
            ]
        );
		$this->add_control(
            'shape3',
            [
                'label'     => __( 'Shape', 'agenxe' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
				'condition'	=> [
					'layout_style' => ['1', '3']
				]	
            ]
        );
		$this->add_control(
            'shape4',
            [
                'label'     => __( 'Shape', 'agenxe' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
				'condition'	=> [
					'layout_style' => ['1']
				]	
            ]
        );

		$this->end_controls_section();


        //---------------------------------------
			//Style Section Start
		//---------------------------------------

		//-------------------------Title Style-----------------------//
		$this->start_controls_section(
			'title_style',
			[
				'label' 	=> __( 'Title Style', 'agenxe' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' 		=> __( 'Color', 'agenxe' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-title' => 'color: {{VALUE}} !important',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'title_typography',
				'label' 	=> __( 'Typography', 'agenxe' ),
                'selector' 	=> '{{WRAPPER}} .th-title',
			]
        );

        $this->add_responsive_control(
			'title_margin',
			[
				'label' 		=> __( 'Margin', 'agenxe' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'title_padding',
			[
				'label' 		=> __( 'Padding', 'agenxe' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

		$this->end_controls_section();  

		//-------------------------Description Style-----------------------//
		$this->start_controls_section(
			'desc_style',
			[
				'label' 	=> __( 'Description Style', 'agenxe' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'	=> [
					'layout_style' => ['3']
				]	
			]
		);

		$this->add_control(
			'desc_color',
			[
				'label' 		=> __( 'Color', 'agenxe' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-desc' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'desc_typography',
				'label' 	=> __( 'Typography', 'agenxe' ),
				'selector' 	=> '{{WRAPPER}} .th-desc',
			]
		);

		$this->add_responsive_control(
			'desc_margin',
			[
				'label' 		=> __( 'Margin', 'agenxe' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_responsive_control(
			'desc_padding',
			[
				'label' 		=> __( 'Padding', 'agenxe' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-desc' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'condition'	=> [
					'layout_style' => ['2']
				]	
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
	<div class="th-hero-wrapper hero-2" id="hero" data-bg-src="<?php echo esc_url($settings['banner_bg']['url']); ?>">
        <div class="hero-bg-anime2-1 shape-mockup spin d-lg-block d-none" data-left="8%" data-top="22%">
			<?php echo agenxe_img_tag( array(
						'url'   => esc_url( $settings['shape']['url']  ),
					)); ?>
        </div>
        <div class="hero-bg-anime2-2 shape-mockup jump d-lg-block d-none" data-right="13%" data-top="21%">
			<?php echo agenxe_img_tag( array(
						'url'   => esc_url( $settings['shape2']['url']  ),
					)); ?>
        </div>
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-9">
                    <div class="hero-style2">
                        <h1 class="hero-title text-white th-title"><?php echo wp_kses_post($settings['banner_title']) ?></h1>
						<a href="<?php echo esc_url( $settings['button_link']['url'] ); ?>" class="th-btn cta-btn th_btn background-image" style="background-image: url(<?php echo esc_url($settings['banner_bg2']['url']); ?>);"><?php echo wp_kses_post( $settings['button_text'] );  ?></a>
                    </div>
                </div>

            </div>
        </div>
		<div class="video-area-2 text-center " data-mask-src="<?php echo esc_url($settings['banner_img']['url']); ?>">
			<video class="video" id="video" src="<?php echo esc_url( $settings['video_bg_link']['url'] ) ?>" loop="" muted="" autoplay="">
            </video>
            <div class="container">
                <div class="video-box1">
                    <a href="<?php echo esc_url( $settings['video_link']['url'] ) ?>" class="play-btn style6 popup-video"><i class="fa-sharp fa-solid fa-play"></i></a>
                </div>
            </div>
        </div>
    </div>

	<?php elseif($settings['layout_style'] == '3' ): ?>
	<div class="th-hero-wrapper hero-3" id="hero" data-bg-src="<?php echo esc_url($settings['banner_bg']['url']); ?>">
        <div class="hero-bg-anime2-1 shape-mockup spin d-lg-block d-none" data-left="8%" data-top="22%">
			<?php echo agenxe_img_tag( array(
						'url'   => esc_url( $settings['shape']['url']  ),
					)); ?>
        </div>
        <div class="hero-bg-anime2-2 shape-mockup jump d-lg-block d-none" data-right="13%" data-top="21%">
			<?php echo agenxe_img_tag( array(
						'url'   => esc_url( $settings['shape2']['url']  ),
					)); ?>
        </div>
        <div class="hero-bg-anime2-3 shape-mockup movingX d-lg-block d-none" data-left="50%" data-top="35%">
			<?php echo agenxe_img_tag( array(
						'url'   => esc_url( $settings['shape3']['url']  ),
					)); ?>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-9 col-md-8">
                    <div class="hero-style3">
						<h1 class="hero-title text-white th-title"><?php echo wp_kses_post($settings['banner_title']) ?></h1>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6 align-self-md-end">
                    <div class="hero-video-wrap jump" data-bg-src="<?php echo esc_url($settings['video_img']['url']); ?>">
                        <div class="video-box3">
                            <a href="<?php echo esc_url( $settings['video_link']['url'] ) ?>" class="play-btn style7 popup-video"><i class="fa-sharp fa-solid fa-play"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="hero-client-wrap">
                        <div class="thumb">
							<?php echo agenxe_img_tag( array(
								'url'   => esc_url( $settings['client_img']['url']  ),
							)); ?>
                        </div>
                        <div class="hero-client_title th-desc">
							<?php echo wp_kses_post($settings['client_title']) ?>
                        </div>
                        <div class="hero-tag">
                            <div class="about-experience-tag style2">
                                <span class="hero-title-anime"><?php echo wp_kses_post($settings['client_title2']) ?></span>
                            </div>
                            <div class="hero-tag_icon">
                                <i class="fal fa-arrow-up-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 align-self-end">
                    <div class="hero-thumb3">
						<?php echo agenxe_img_tag( array(
								'url'   => esc_url( $settings['banner_img']['url']  ),
							)); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


	<?php else: ?>
		<div class="th-hero-wrapper hero-1" id="hero" data-bg-src="<?php echo esc_url($settings['banner_bg']['url']); ?>">
			<div class="hero-bg-anime1-1 shape-mockup spin d-lg-block d-none" data-left="8%" data-top="22%">
				<?php echo agenxe_img_tag( array(
						'url'   => esc_url( $settings['shape']['url']  ),
					)); ?>
			</div>
			<div class="hero-bg-anime1-2 shape-mockup movingX d-lg-block d-none" data-left="42%" data-top="21%">
				<?php echo agenxe_img_tag( array(
						'url'   => esc_url( $settings['shape2']['url']  ),
					)); ?>
			</div>
			<div class="hero-bg-anime1-3 shape-mockup jump d-lg-block d-none" data-right="13%" data-top="21%">
				<?php echo agenxe_img_tag( array(
						'url'   => esc_url( $settings['shape3']['url']  ),
					)); ?>
			</div>
			<div class="hero-bg-anime1-4 shape-mockup movingX d-lg-block d-none" data-left="20%" data-bottom="15%">
				<?php echo agenxe_img_tag( array(
						'url'   => esc_url( $settings['shape4']['url']  ),
					)); ?>
			</div>
			<div class="container">
				<div class="row align-items-center justify-content-center">
					<div class="col-lg-3 text-lg-end text-center order-lg-2">
						<div class="hero-thumb">
							<?php echo agenxe_img_tag( array(
								'url'   => esc_url( $settings['banner_img']['url']  ),
							)); ?>
						</div>
					</div>
					<div class="col-lg-9 order-lg-1">
						<div class="hero-style1">
							<h1 class="hero-title text-white th-title"><?php echo wp_kses_post($settings['banner_title']) ?></h1>
							<h1 class="hero-title text-white th-title">
								<?php echo agenxe_img_tag( array(
									'url'   => esc_url( $settings['banner_img2']['url']  ),
								)); ?><?php echo wp_kses_post($settings['banner_title2']) ?>
							</h1>
							<h1 class="hero-title text-white th-title"><?php echo wp_kses_post($settings['banner_title3']) ?></h1> 
						</div>
					</div>

				</div>
			</div>
		</div>

	<?php endif; 
		
	}

}