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
 * Choose Us Widget . 
 *
 */
class agenxe_Choose extends Widget_Base {

	public function get_name() {
		return 'agenxechoose';
	}
	public function get_title() {
		return __( 'Choose Us', 'agenxe' );
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'agenxe' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'contact_form_section',
			[
				'label' 	=> __( 'Choose Us', 'agenxe' ),
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
					'2' 		=> __( 'Style Two', 'agenxe' ),
				],
			]
		);     

		$this->add_control(
			'section_subtitle',
			[
				'label' 	=> __( 'Section Subtitle', 'agenxe' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Section Subtitle', 'agenxe' ),
                'rows' => '2',
			]
        );

		$this->add_control(
			'section_title',
			[
				'label' 	=> __( 'Section Title', 'agenxe' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Section Title', 'agenxe' ),
			]
        );

		$this->add_control(
			'section_desc',
			[
				'label' 	=> __( 'Section Description', 'agenxe' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Section Description', 'agenxe' ),
			]
        );

		$this->add_control(
			'image',
			[
				'label' 		=> __( 'Choose Image', 'agenxe' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
			]
		);   

		$this->add_control(
			'image2',
			[
				'label' 		=> __( 'Choose Image', 'agenxe' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
			]
		);  

		$this->add_control(
			'video_link',
			[
				'label' 		=> __( 'Video Link', 'agenxe' ),
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
			'year',
			[
				'label' 	=> __( 'Experience', 'agenxe' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Experience', 'agenxe' ),
				'condition'	=> [
					'layout_style' => ['1']
				]
			]
        );

		$repeater = new Repeater();

		$repeater->add_control(
			'service_icon',
			[
				'label'     => __( 'Icon', 'agenxe' ),
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
				// 'condition'	=> [
				// 	'layout_style' => ['1', '2', '3']
				// ]
			]
		);

        $this->end_controls_section();

        //---------------------------------------
			//Style Section Start
		//---------------------------------------

        //-------------------------Subtitle Style-----------------------//
		$this->start_controls_section(
			'subtitle_style',
			[
				'label' 	=> __( 'Subtitle Style', 'agenxe' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'subtitle_color',
			[
				'label' 		=> __( 'Color', 'agenxe' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-sub' => 'color: {{VALUE}}',
                ],
			]
        );	

		$this->add_control(
			'subtitle_bg',
			[
				'label' 		=> __( 'Background', 'agenxe' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-sub' => 'background: {{VALUE}}',
				],
			]
		);	

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'subtitle_typography',
				'label' 	=> __( 'Typography', 'agenxe' ),
                'selector' 	=> '{{WRAPPER}} .th-sub',
			]
        );

        $this->add_responsive_control(
			'subtitle_margin',
			[
				'label' 		=> __( 'Margin', 'agenxe' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-sub' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'subtitle_padding',
			[
				'label' 		=> __( 'Padding', 'agenxe' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-sub' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

		$this->end_controls_section();

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

	}

	protected function render() {

	$settings = $this->get_settings_for_display();
	?>

	<?php if( $settings['layout_style'] == '2' ): ?>
	<div class="feature-area-3 bg-smoke overflow-hidden">
		<div class="shape-mockup jump-reverse d-none d-xl-block" data-top="-20px" data-left="0">
			<?php echo agenxe_img_tag( array(
					'url'   => esc_url( $settings['image2']['url'] ),
				)); ?>
		</div>
		<div class="space position-relative z-index-3">
			<div class="img-half img-right video-box2 z-index-1">
				<?php echo agenxe_img_tag( array(
						'url'   => esc_url( $settings['image']['url'] ),
					)); ?>
				<a href="<?php echo esc_url( $settings['video_link']['url'] ); ?>" class="play-btn style4 popup-video"><i class="fa-sharp fa-solid fa-play"></i></a>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-xl-6">
						<div class="me-xxl-5 pe-xxl-4">
							<div class="title-area mb-40 text-center text-lg-start">
								<span class="sub-title th-sub"><?php echo esc_html($settings['section_subtitle']) ?></span>
								<h2 class="sec-title th-title"><?php echo esc_html($settings['section_title']) ?></h2>
								<p class="sec-text th-desc mt-30"><?php echo esc_html($settings['section_desc']) ?></p>
							</div>
						</div>
						<div class="feature-slider-wrap">
							<div class="row th-carousel feature-slider" data-slide-show="3" data-lg-slide-show="2" data-md-slide-show="2" data-sm-slide-show="2" data-arrows="false">
								<?php foreach( $settings['service_list'] as $data ): ?>
								<div class="col-xl-3 col-lg-4 col-md-6">
									<div class="service-box style2">
										<div class="service-box_icon">
											<?php echo agenxe_img_tag( array(
												'url'   => esc_url( $data['service_icon']['url']  ),
											)); ?>
										</div>
										<h3 class="service-box_title h6"><a href="<?php echo esc_url( $data['button_link']['url'] ); ?>"><?php echo esc_html( $data['service_title'] ); ?></a></h3>
										<p class="service-box_text"><?php echo esc_html( $data['service_content'] );  ?></p>
									</div>
								</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php else: ?>
	<div class="row justify-content-between align-items-xl-center">
		<div class="col-lg-6 align-self-end order-lg-2">
			<div class="why-thumb7 mb-lg-0 mb-5">
					<?php echo agenxe_img_tag( array(
						'url'   => esc_url( $settings['image']['url'] ),
					)); ?>
				<div class="why-thumb-wrap">
					<h4 class="about-counter_title"><?php echo wp_kses_post( $settings['year'] ); ?></h4>
					<div class="thumb">
						<?php echo agenxe_img_tag( array(
							'url'   => esc_url( $settings['image2']['url'] ),
						)); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-6 order-lg-1">
			<div class="me-xxl-5 pe-xxl-4">
				<div class="title-area mb-40 text-center text-lg-start">
					<span class="sub-title th-sub"><?php echo esc_html($settings['section_subtitle']) ?></span>
					<h2 class="sec-title th-title"><?php echo esc_html($settings['section_title']) ?></h2>
					<p class="sec-text th-desc mt-30"><?php echo esc_html($settings['section_desc']) ?></p>
				</div>
			</div>
			<div class="feature-slider-wrap">
				<div class="row th-carousel feature-slider" data-slide-show="3" data-lg-slide-show="2" data-md-slide-show="2" data-sm-slide-show="2" data-arrows="false">
					<?php foreach( $settings['service_list'] as $data ): ?>
					<div class="col-xl-3 col-lg-4 col-md-6">
						<div class="service-box style2">
							<div class="service-box_icon">
								<?php echo agenxe_img_tag( array(
									'url'   => esc_url( $data['service_icon']['url']  ),
								)); ?>
							</div>
							<h3 class="service-box_title h6"><a href="<?php echo esc_url( $data['button_link']['url'] ); ?>"><?php echo esc_html( $data['service_title'] ); ?></a></h3>
							<p class="service-box_text"><?php echo esc_html( $data['service_content'] );  ?></p>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
	
	<?php endif;

	}

}