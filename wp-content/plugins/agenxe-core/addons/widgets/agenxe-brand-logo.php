<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Border;
/**
 *
 * Brand Logo Widget .
 *
 */
class agenxe_Brand_Logo extends Widget_Base {

	public function get_name() {
		return 'agenxebrandlogo';
	}
	public function get_title() {
		return __( 'Brand Logo', 'agenxe' );
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'agenxe' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'client_logo_section',
			[
				'label' 	=> __( 'Brand Logo', 'agenxe' ),
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

		$this->add_control(
			'title',
            [
				'label'         => __( 'Title', 'agenxe' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Title here' , 'agenxe' ),
				'label_block'   => true,
				'rows' 		=> 3,
				'condition'	=> [
					'layout_style' => ['1'],
				]
			]
		);

        $repeater = new Repeater();

		$repeater->add_control(
			'client_logo',
			[
				'label' 	=> __( 'Client Logo', 'agenxe' ),
				'type' 		=> Controls_Manager::MEDIA,
				'default' => [
					'url' 	=> Utils::get_placeholder_image_src(),
				],
			]
		);		

		$this->add_control(
			'logos',
			[
				'label' 		=> __( 'Client Logos', 'agenxe' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'client_logo' => Utils::get_placeholder_image_src(),
					],
					[
						'client_logo' => Utils::get_placeholder_image_src(),
					],
					[
						'client_logo' => Utils::get_placeholder_image_src(),
					],
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

		$this->add_control(
			'title_color2',
			[
				'label' 		=> __( 'Line Color', 'agenxe' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-title:before, {{WRAPPER}} .th-title:after' => '--border-color: {{VALUE}} !important',
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

	}

	protected function render() {

	$settings = $this->get_settings_for_display();
	?>
	
	<?php if( $settings['layout_style'] == '2' ): ?>


	<?php else: ?>
		<div class="title-area text-center">
			<span class="sub-title th-title client-title wow fadeInUp mb-0">
				<?php echo wp_kses_post($settings['title']); ?>
			</span>
		</div>
		<div class="row slider-shadow th-carousel arrow-style2" data-slide-show="6" data-lg-slide-show="5" data-md-slide-show="3" data-sm-slide-show="3">
			<?php foreach( $settings['logos'] as $data ): ?>
			<div class="col-md-6 col-auto">
				<div class="client-card wow fadeInUp">
					<a href="#" class="client-img">
						<?php echo agenxe_img_tag( array(
							'url'   => esc_url( $data['client_logo']['url'] ),
						) ); ?>
					</a>
				</div>
			</div>
			<?php endforeach; ?>
		</div>

    <?php endif;

	}
}