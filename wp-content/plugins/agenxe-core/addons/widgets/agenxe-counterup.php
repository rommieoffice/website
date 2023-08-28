<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Group_Control_Border;
/**
 *
 * Counter Up Widget .
 *
 */
class agenxe_Counterup extends Widget_Base {

	public function get_name() {
		return 'agenxecounterup';
	}
	public function get_title() {
		return __( 'Counter Up', 'agenxe' );
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'agenxe' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'counter_section',
			[
				'label' 	=> __( 'Counter Up', 'agenxe' ),
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
					'3' 		=> __( 'Style Three', 'agenxe' ),
				],
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
				'condition'	=> [
					'layout_style' => ['1', '3'],
				]
			]
		);  

		$repeater = new Repeater();

		$repeater->add_control(
			'icon',
			[
				'label'     => __( 'Counter Icon', 'agenxe' ),
				'type'      => Controls_Manager::TEXTAREA,
				'rows' 		=> 2,
				'default' 	=> __( '', 'agenxe' ),
			]
		);	

		$repeater->add_control(
			'counter_number',
			[
				'label'     => __( 'Counter Number', 'agenxe' ),
				'type'      => Controls_Manager::TEXTAREA,
				'rows' 		=> 2,
				'default' 	=> __( '25', 'agenxe' ),
			]
		);	
		
		$repeater->add_control(
			'counter_number_after',
			[
				'label'     => __( 'Counter Number After', 'agenxe' ),
				'type'      => Controls_Manager::TEXTAREA,
				'rows' 		=> 2,
				'default' 	=> __( '', 'agenxe' ),
			]
		);	

		$repeater->add_control(
			'counter_text',
			[
				'label'     => __( 'Counter Text', 'agenxe' ),
				'type'      => Controls_Manager::TEXTAREA,
				'rows' 		=> 2,
				'default' 	=> __( 'Project Completed', 'agenxe' ),
			]
		);

		$this->add_control(
			'counter_list',
			[
				'label' 		=> __( 'Counter', 'agenxe' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'counter_text' 		=> __( 'Counter One', 'agenxe' ),
					],
				],
			]
		);

		$this->end_controls_section();

        //---------------------------------------
			//Style Section Start
		//---------------------------------------

		//-------------------------Content Style-----------------------//
		$this->start_controls_section(
			'overview_con_styling',
			[
				'label' 	=> __( 'Content Styling', 'agenxe' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->start_controls_tabs(
			'style_tabs2'
		);

			$this->start_controls_tab(
				'style_normal_tab2',
				[
					'label' => esc_html__( 'Number', 'agenxe' ),
				]
			);

			$this->add_control(
				'overview_title_color',
				[
					'label' 		=> __( 'Color', 'agenxe' ),
					'type' 			=> Controls_Manager::COLOR,
					'selectors' 	=> [
						'{{WRAPPER}} .th-num'	=> '--white-color: {{VALUE}}!important;',
					],
				]
			);

			$this->add_group_control(
			Group_Control_Typography::get_type(),
				[
					'name' 			=> 'overview_title_typography',
					'label' 		=> __( 'Typography', 'agenxe' ),
					'selector' 	=> '{{WRAPPER}} .th-num',
				]
			);

			$this->add_responsive_control(
				'overview_title_margin',
				[
					'label' 		=> __( 'Margin', 'agenxe' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', '%', 'em' ],
					'selectors' 	=> [
						'{{WRAPPER}} .th-num' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'overview_title_padding',
				[
					'label' 		=> __( 'Padding', 'agenxe' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', '%', 'em' ],
					'selectors' 	=> [
						'{{WRAPPER}} .th-num' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->end_controls_tab();

			//--------------------secound--------------------//

			$this->start_controls_tab(
				'style_hover_tab2',
				[
					'label' => esc_html__( 'Title', 'agenxe' ),
				]
			);

			$this->add_control(
				'overview_content_color',
				[
					'label' 		=> __( 'Color', 'agenxe' ),
					'type' 			=> Controls_Manager::COLOR,
					'selectors' 	=> [
						'{{WRAPPER}} .th-title'	=> 'color: {{VALUE}}!important;',
					],
				]
			);

			$this->add_group_control(
			Group_Control_Typography::get_type(),
				[
					'name' 			=> 'overview_content_typography',
					'label' 		=> __( 'Typography', 'agenxe' ),
					'selector' 	=> '{{WRAPPER}} .th-title',
				]
			);

			$this->add_responsive_control(
				'overview_content_margin',
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
				'overview_content_padding',
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

		$this->end_controls_tabs();

		$this->end_controls_section();

	}

	protected function render() {

	$settings = $this->get_settings_for_display();
	?>
		<?php if( $settings['layout_style'] == '2' ): ?>
			<div class="row gy-40 justify-content-between">
				<?php 
				$x = 1;
				foreach( $settings['counter_list'] as $data ): 
				$x = $x + 2;
				?>
                <div class="col-sm-auto">
                    <div class="counter-card2 wow fadeInUp" data-wow-delay="0.<?php echo esc_attr($x) ?>s">
						<h2 class="counter-card_number th-num"><span class="counter-number"><?php echo esc_html( $data['counter_number'] ) ?></span><?php echo esc_html( $data['counter_number_after'] ) ?></h2>
                        <p class="counter-card_text th-title"><?php echo wp_kses_post( $data['counter_text'] ) ?></p>
                    </div>
                </div>
				<?php endforeach; ?>
            </div>

		<?php elseif( $settings['layout_style'] == '3' ): ?>
			<div class="counter-area-3 bg-theme" data-bg-src="<?php echo esc_url($settings['image']['url']); ?>">
                <div class="row gy-40 justify-content-md-between justify-content-center">
					<?php 
					$x = 1;
					foreach( $settings['counter_list'] as $data ): 
					$x = $x + 2;
					?>
                    <div class="col-sm-auto">
                        <div class="counter-card2 wow fadeInUp" data-wow-delay="0.<?php echo esc_attr($x) ?>s">
                            <h2 class="counter-card_number th-num"><span class="counter-number"><?php echo esc_html( $data['counter_number'] ) ?></span><?php echo esc_html( $data['counter_number_after'] ) ?></h2>
                            <p class="counter-card_text text-white th-title"><?php echo wp_kses_post( $data['counter_text'] ) ?></p>
                        </div>
                    </div>
               	<?php endforeach; ?>
                </div>
            </div>

		<?php else: ?>
			<div class="row gy-40 justify-content-between">
				<?php 
				$x = 1;
				foreach( $settings['counter_list'] as $data ): 
				$x = $x + 2;
				?>
				<div class="col-sm-6 col-lg-auto">
                    <div class="counter-card wow fadeInUp" data-wow-delay="0.<?php echo esc_attr($x) ?>s">
                        <div class="counter-card_details">
							<h2 class="counter-card_number th-num">
                                <div class="counter-card_bg" data-bg-src="<?php echo esc_url($settings['image']['url']); ?>">
                                    <span class="counter-number"><?php echo esc_html( $data['counter_number'] ) ?></span><?php echo esc_html( $data['counter_number_after'] ) ?>
                                </div>
                                <span class="counter-number"><?php echo esc_html( $data['counter_number'] ) ?></span><?php echo esc_html( $data['counter_number_after'] ) ?>
                            </h2>
                            <p class="counter-card_text th-title"><?php echo wp_kses_post( $data['counter_text'] ) ?></p>
                        </div>
                    </div>
                </div>
               <?php endforeach; ?>
            </div>

		<?php endif;

	}

}