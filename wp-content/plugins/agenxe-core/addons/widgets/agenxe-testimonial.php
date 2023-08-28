<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
/**
 *
 * Testimonial Slider Widget .
 *
 */
class agenxe_Testimonial extends Widget_Base{

	public function get_name() {
		return 'agenxetestimonialslider';
	}
	public function get_title() {
		return __( 'Testimonial Slider', 'agenxe' );
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'agenxe' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'testimonial_slider_section',
			[
				'label' 	=> __( 'Testimonial Slider', 'agenxe' ),
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

		$repeater = new Repeater();

		$repeater->add_control(
			'client_image',
			[
				'label' 		=> __( 'Client Image', 'agenxe' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'quote_image',
			[
				'label' 		=> __( 'Quote Icon', 'agenxe' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'client_service', [
				'label' 		=> __( 'Feedback Title', 'agenxe' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Good Services' , 'agenxe' ),
				'label_block' 	=> true,
			]
        );

		$repeater->add_control(
			'client_name', [
				'label' 		=> __( 'Client Name', 'agenxe' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Vlademir Hilto' , 'agenxe' ),
				'label_block' 	=> true,
			]
        );

		$repeater->add_control(
			'client_desig', [
				'label' 		=> __( 'Client Designation', 'agenxe' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'IT Student' , 'agenxe' ),
				'label_block' 	=> true,
			]
        );

        $repeater->add_control(
			'client_feedback', [
				'label' 		=> __( 'Client Feedback', 'agenxe' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( '“Quickly maximize visionary solutions after mission critical action items productivate premium portals for impactful -services stinctively negotiate enabled niche markets via growth strategies”' , 'agenxe' ),
				'label_block' 	=> true,
			]
		);

		$repeater->add_control(
			'client_rating',
			[
				'label' 	=> __( 'Client Rating', 'agenxe' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '5',
				'options' 	=> [
					'one'  		=> __( 'One Star', 'agenxe' ),
					'two' 		=> __( 'Two Star', 'agenxe' ),
					'three' 	=> __( 'Three Star', 'agenxe' ),
					'four' 		=> __( 'Four Star', 'agenxe' ),
					'five' 	 	=> __( 'Five Star', 'agenxe' ),
				],
			]
		);

		$this->add_control(
			'slides',
			[
				'label' 		=> __( 'Slides', 'agenxe' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'client_image' 		=> Utils::get_placeholder_image_src(),
					],
				],
				'title_field' 	=> '{{{ client_name }}}',
				'condition'	=> [
					'layout_style' => ['1', '2']
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
					'label' => esc_html__( 'Nmae', 'agenxe' ),
				]
			);

			$this->add_control(
				'first_tab_color',
				[
					'label' 		=> __( 'Color', 'agenxe' ),
					'type' 			=> Controls_Manager::COLOR,
					'selectors' 	=> [
						'{{WRAPPER}} .th-name'	=> 'color: {{VALUE}}!important;',
					],
				]
			);

			$this->add_group_control(
			Group_Control_Typography::get_type(),
				[
					'name' 			=> 'first_tab_typography',
					'label' 		=> __( 'Typography', 'agenxe' ),
					'selector' 	=> '{{WRAPPER}} .th-name',
				]
			);

			$this->add_responsive_control(
				'first_tab_margin',
				[
					'label' 		=> __( 'Margin', 'agenxe' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', '%', 'em' ],
					'selectors' 	=> [
						'{{WRAPPER}} .th-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .th-name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->end_controls_tab();

			//--------------------secound--------------------//
			$this->start_controls_tab(
				'sec_style_tab',
				[
					'label' => esc_html__( 'Desig', 'agenxe' ),
				]
			);

			$this->add_control(
				'sec_tab_color',
				[
					'label' 		=> __( 'Color', 'agenxe' ),
					'type' 			=> Controls_Manager::COLOR,
					'selectors' 	=> [
						'{{WRAPPER}} .th-desig'	=> 'color: {{VALUE}}!important;',
					],
				]
			);

			$this->add_group_control(
			Group_Control_Typography::get_type(),
				[
					'name' 			=> 'sec_tab_typography',
					'label' 		=> __( 'Typography', 'agenxe' ),
					'selector' 	=> '{{WRAPPER}} .th-desig',
				]
			);

			$this->add_responsive_control(
				'sec_tab_margin',
				[
					'label' 		=> __( 'Margin', 'agenxe' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', '%', 'em' ],
					'selectors' 	=> [
						'{{WRAPPER}} .th-desig' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .th-desig' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->end_controls_tab();

			//--------------------threth--------------------//
			$this->start_controls_tab(
				'third_style_tab',
				[
					'label' => esc_html__( 'Feedback', 'agenxe' ),
				]
			);

			$this->add_control(
				'third_tab_color',
				[
					'label' 		=> __( 'Color', 'agenxe' ),
					'type' 			=> Controls_Manager::COLOR,
					'selectors' 	=> [
						'{{WRAPPER}} .th-text'	=> 'color: {{VALUE}}!important;',
					],
				]
			);

			$this->add_group_control(
			Group_Control_Typography::get_type(),
				[
					'name' 			=> 'third_tab_typography',
					'label' 		=> __( 'Typography', 'agenxe' ),
					'selector' 	=> '{{WRAPPER}} .th-text',
				]
			);

			$this->add_responsive_control(
				'third_tab_margin',
				[
					'label' 		=> __( 'Margin', 'agenxe' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', '%', 'em' ],
					'selectors' 	=> [
						'{{WRAPPER}} .th-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'third_tab_padding',
				[
					'label' 		=> __( 'Padding', 'agenxe' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', '%', 'em' ],
					'selectors' 	=> [
						'{{WRAPPER}} .th-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->end_controls_tab();

			//--------------------four--------------------//
			$this->start_controls_tab(
				'fourth_style_tab',
				[
					'label' => esc_html__( 'Title', 'agenxe' ),
					'condition'	=> [
						'layout_style' => ['1']
					]
				]
			);

			$this->add_control(
				'fourth_tab_color',
				[
					'label' 		=> __( 'Color', 'agenxe' ),
					'type' 			=> Controls_Manager::COLOR,
					'selectors' 	=> [
						'{{WRAPPER}} .th-rating'	=> 'color: {{VALUE}}!important;',
					],
				]
			);
			
			$this->add_group_control(
			Group_Control_Typography::get_type(),
				[
					'name' 			=> 'fourth_tab_typography',
					'label' 		=> __( 'Typography', 'agenxe' ),
					'selector' 	=> '{{WRAPPER}} .th-rating',
				]
			);

			$this->add_responsive_control(
				'fourth_tab_margin',
				[
					'label' 		=> __( 'Margin', 'agenxe' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', '%', 'em' ],
					'selectors' 	=> [
						'{{WRAPPER}} .th-rating' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'fourth_tab_padding',
				[
					'label' 		=> __( 'Padding', 'agenxe' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', '%', 'em' ],
					'selectors' 	=> [
						'{{WRAPPER}} .th-rating' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            <div class="testi-slider-indicator 2" data-themenavfor=".testi-slider-2">
				<?php foreach( $settings['slides'] as $key => $data ) : 
					$active = ($key == 0) ? 'active' : ''; 
				?>
				<a class="indicator-btn <?php echo esc_attr($active); ?>">
					<?php  echo agenxe_img_tag( array(
						'url'	=> esc_url( $data['client_image']['url'] ),
					) ); ?>
				</a>
				<?php endforeach; ?>
			</div>
			<div class="th-carousel testi-slider-2 row wow fadeInUp" id="testimonial-slider1" data-slide-show="1" data-ml-slide-show="1" data-lg-slide-show="1" data-md-slide-show="1" data-arrows="true">
				<?php foreach( $settings['slides'] as $data ) : ?>
				<div class="col-lg-6">
					<div class="testi-card style2">
						<p class="testi-card_text th-text"><?php echo wp_kses_post( $data['client_feedback'] ); ?></p>
						<div class="testi-card_profile">
							<div class="media-left">
								<h3 class="testi-card_name th-name"><?php echo esc_html( $data['client_name'] ); ?></h3>
								<span class="testi-card_desig th-desig"><?php echo esc_html( $data['client_desig'] ); ?></span>
							</div>
							<div class="testi-box_quote">
								<?php  echo agenxe_img_tag( array(
										'url'	=> esc_url( $data['quote_image']['url'] ),
									) ); ?>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>

		<?php else: ?>
			<div class="th-carousel testi-slider-1 row wow fadeInUp" id="testimonial-slider1" data-slide-show="1" data-ml-slide-show="1" data-lg-slide-show="1" data-md-slide-show="1" data-dots="true" data-arrows="false">
				<?php foreach( $settings['slides'] as $data ) : ?>
				<div class="col-12">
					<div class="testi-card">
						<div class="testi-card_media">
							<div class="testi-card_quote">
								<?php  echo agenxe_img_tag( array(
										'url'	=> esc_url( $data['quote_image']['url'] ),
									) ); ?>
							</div>
							<div class="media-left">
								<h6 class="testi-card_title th-rating"><?php echo esc_html( $data['client_service'] ); ?></h6>
								<div class="rating">
									<span>
										<?php 
											if( $data['client_rating'] == 'one' ){
												echo '<i class="fa-solid fa-star"></i>';
												echo '<i class="fa-regular fa-star"></i>';
												echo '<i class="fa-regular fa-star"></i>';
												echo '<i class="fa-regular fa-star"></i>';
												echo '<i class="fa-regular fa-star"></i>';
											}elseif( $data['client_rating'] == 'two' ){
												echo '<i class="fa-solid fa-star"></i>';
												echo '<i class="fa-solid fa-star"></i>';
												echo '<i class="fa-regular fa-star"></i>';
												echo '<i class="fa-regular fa-star"></i>';
												echo '<i class="fa-regular fa-star"></i>';
											}elseif( $data['client_rating'] == 'three' ){
												echo '<i class="fa-solid fa-star"></i>';
												echo '<i class="fa-solid fa-star"></i>';
												echo '<i class="fa-solid fa-star"></i>';
												echo '<i class="fa-regular fa-star"></i>';
												echo '<i class="fa-regular fa-star"></i>';
											}elseif( $data['client_rating'] == 'four' ){
												echo '<i class="fa-solid fa-star"></i>';
												echo '<i class="fa-solid fa-star"></i>';
												echo '<i class="fa-solid fa-star"></i>';
												echo '<i class="fa-solid fa-star"></i>';
												echo '<i class="fa-regular fa-star"></i>';
											}else{
												echo '<i class="fa-solid fa-star"></i>';
												echo '<i class="fa-solid fa-star"></i>';
												echo '<i class="fa-solid fa-star"></i>';
												echo '<i class="fa-solid fa-star"></i>';
												echo '<i class="fa-solid fa-star"></i>';
											}
										?>
									</span>
								</div>
							</div>
						</div>
						<p class="testi-card_text th-text"><?php echo wp_kses_post( $data['client_feedback'] ); ?></p>
						<div class="testi-card_profile">
							<div class="media-left">
								<div class="testi-card_avater">
									<?php  echo agenxe_img_tag( array(
										'url'	=> esc_url( $data['client_image']['url'] ),
									) ); ?>
								</div>
							</div>
							<div class="media-body">
								<h3 class="testi-card_name th-name"><?php echo esc_html( $data['client_name'] ); ?></h3>
								<span class="testi-card_desig th-desig"><?php echo esc_html( $data['client_desig'] ); ?></span>
							</div>

						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		<?php endif;

	}

}