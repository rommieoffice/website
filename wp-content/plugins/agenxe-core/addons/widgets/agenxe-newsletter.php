<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Background;
/**
 * 
 * Newsletter Widget .
 *
 */
class Agenxe_Newsletter extends Widget_Base {

	public function get_name() {
		return 'agenxenewsletter';
	}
	public function get_title() {
		return __( 'Newsletter', 'agenxe' );
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'agenxe' ];
	}
	
	protected function register_controls() {

		$this->start_controls_section(
			'layout_section',
			[
				'label'     => __( 'Newsletter Style', 'agenxe' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
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
			'title',
            [
				'label'         => __( 'Title', 'agenxe' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Title' , 'agenxe' ),
				'label_block'   => true,
				'rows' 		=> 3,
				'condition' => [
					'layout_style' => ['1']
				]
			]
		);

		$this->add_control(
			'newsletter_placeholder',
			[
				'label' 		=> __( 'Newsletter Placeholder Text', 'agenxe' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 		=> 2,
				'default' 		=> __( 'Enter Your Email', 'agenxe' ),
			]
		);

		$this->add_control(
			'newsletter_button',
			[
				'label' 		=> __( 'Newsletter Button Text', 'agenxe' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Subscribe', 'agenxe' ),
			]
		);

		$this->add_control(
			'desc',
            [
				'label'         => __( 'Description', 'agenxe' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Description' , 'agenxe' ),
				'label_block'   => true,
				'rows' 		=> 3,
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
				'label'     => __( 'General Styling', 'agenxe' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition'	=> [
					'layout_style' => ['1']
				]	
			]
		);

		$this->add_control(
			'general_bg',
			[
				'label' 		=> __( 'Background', 'agenxe' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-bg' => 'background-color: {{VALUE}} !important;',
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
					'{{WRAPPER}} .th-bg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);

		$this->end_controls_section();

		//-------------------------Title Style-----------------------//
        $this->start_controls_section(
			'section_title_style_section',
			[
				'label' => __( 'Title Style', 'agenxe' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
				'condition'	=> [
					'layout_style' => ['1']
				]	
			]
		);

        $this->add_control(
			'section_title_color',
			[
				'label' 	=> __( 'Color', 'agenxe' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .th-title' => 'color: {{VALUE}}!important;',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'section_title_typography',
				'label' 	=> __( 'Typography', 'agenxe' ),
                'selector' 	=> '{{WRAPPER}} .th-title',
			]
		);

        $this->add_responsive_control(
			'section_title_margin',
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
			'section_title_padding',
			[
				'label' 		=> __( 'Padding', 'agenxe' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
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
			<form class="newsletter-form">
				<input class="form-control" type="email" placeholder="<?php echo esc_attr( $settings['newsletter_placeholder'] ); ?>" required="">
				<button type="submit" class="th-btn"><?php echo wp_kses_post( $settings['newsletter_button'] ); ?></button>
				<?php if(!empty($settings['desc'])): ?>
				<div class="form-group">
					<div class="custom-checkbox">
						<input type="checkbox" id="agreepolicy" checked>
						<label for="agreepolicy" class="th-desc"><?php echo wp_kses_post($settings['desc']); ?></label>
					</div>
				</div>
				<?php endif; ?>
			</form>
		
    	<?php else: ?>
			<div class="widget newsletter-widget style2 footer-widget">
				<div class="newsletter-wrap th-bg">
					<h3 class="widget_title th-title"><?php echo wp_kses_post($settings['title']); ?></h3>
					<form class="newsletter-form">
						<input class="form-control" type="email" placeholder="<?php echo esc_attr( $settings['newsletter_placeholder'] ); ?>" required="">
						<button type="submit" class="th-btn"><?php echo wp_kses_post( $settings['newsletter_button'] ); ?></button>
						<?php if(!empty($settings['desc'])): ?>
						<div class="form-group">
							<div class="custom-checkbox">
								<input type="checkbox" id="agreepolicy" checked>
								<label for="agreepolicy" class="th-desc"><?php echo wp_kses_post($settings['desc']); ?></label>
							</div>
						</div>
						<?php endif; ?>
					</form>
				</div>
			</div>

	<?php endif;

	}
}
						