<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Box_Shadow;
/**
 *
 * Faq Widget .
 *
 */
class agenxe_Faq extends Widget_Base {

	public function get_name() {
		return 'agenxefaq';
	}
	public function get_title() {
		return __( 'Faq', 'agenxe' );
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'agenxe' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'faq_section',
			[
				'label'		 	=> __( 'Faq', 'agenxe' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
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
			'faq_id',
			[
				'label' 	=> __( 'Faq ID', 'agenxe' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( '1', 'agenxe' )
			]
        );

        $repeater = new Repeater();

        $repeater->add_control(
			'faq_question',
			[
				'label' 	=> __( 'Faq Question', 'agenxe' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Our Principles', 'agenxe' )
			]
        );

        $repeater->add_control(
			'faq_answer',
			[
				'label' 	=> __( 'Faq Answer', 'agenxe' ),
                'type' 		=> Controls_Manager::WYSIWYG,
                'default'  	=> __( 'Morbi condimentum congue dui, elementum maximus augue porttitor a. Quisque volutpat et dui at fringilla. Integer sed justo quis lacus sodales porta. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam molestie id nibh viverra fringilla. Nulla facilisi. Proin iaculis ornare lorem in imperdiet. Donec rutrum viverra dictum. Morbi et massa enim.', 'agenxe' )
			]
        );

		$this->add_control(
			'faq_repeater',
			[
				'label' 		=> __( 'Faq', 'agenxe' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'faq_question'    => __( 'Our Principles', 'agenxe' ),
					],

				],
			]
		);

        $this->end_controls_section();

        //---------------------------------------
			//Style Section Start
		//---------------------------------------

		//-------------------------Question Style-----------------------//
        $this->start_controls_section(
			'faq_style_section',
			[
				'label' => __( 'Faq Question Style', 'agenxe' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
			'faq_question_color',
			[
				'label' 	=> __( 'Color', 'agenxe' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .accordion-button, {{WRAPPER}} .accordion-button:after' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'faq_question_active_color',
			[
				'label' 	=> __( 'Active Color', 'agenxe' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .accordion-button:not(.collapsed), {{WRAPPER}} .accordion-button:not(.collapsed):after' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'faq_question_typography',
				'label' 	=> __( 'Typography', 'agenxe' ),
                'selector' 	=> '{{WRAPPER}} .accordion-button',
			]
		);

        $this->add_responsive_control(
			'faq_question_margin',
			[
				'label' 		=> __( 'Margin', 'agenxe' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .accordion-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'faq_question_padding',
			[
				'label' 		=> __( 'Padding', 'agenxe' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .accordion-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);

		$this->end_controls_section();

		//-------------------------Answer Style-----------------------//
		$this->start_controls_section(
			'faq_style_section2',
			[
				'label' => __( 'Faq Answer Style', 'agenxe' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'faq_answer_color2',
			[
				'label' 		=> __( 'Content Color', 'agenxe' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .accordion-body p' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'faq_answer_typography2',
				'label' 	=> __( 'Content Typography', 'agenxe' ),
                'selector' 	=> '{{WRAPPER}} .accordion-body p',
			]
        );

        $this->add_responsive_control(
			'faq_answer_margin2',
			[
				'label' 		=> __( 'Content Margin', 'agenxe' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .accordion-body p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

		$this->add_responsive_control(
			'faq_answer_padding',
			[
				'label' 		=> __( 'Answer Padding', 'agenxe' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .accordion-body p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);

        $this->end_controls_section();

	}

	protected function render() {

	$settings = $this->get_settings_for_display();
	?>
        <?php 
			if( $settings['layout_style'] == '2' ){
				$class = 'style2';
			}else{
				$class = '';
			}
		?>

		<div class="accordion-area accordion  wow fadeInUp <?php echo esc_attr($class); ?>" id="faqAccordion<?php echo esc_attr($settings['faq_id']) ?>">
			<?php 
			$x = 0;
			$n = 1;
            foreach( $settings['faq_repeater'] as $single_data ):
            	$unique_id = uniqid();
            	$x++;
            	$n++;
				if( $x == '1' ){
					$ariaexpanded 	= 'true';
					$class 			= 'show';
					$collesed 		= '';
					$is_active 		= 'active';
				}else{
					$ariaexpanded 	= 'false';
					$class 			= '';
					$collesed 		= 'collapsed';
					$is_active 		= '';
				}
		 	 ?>
            <div class="accordion-card">
            	<?php if( ! empty( $single_data['faq_question'] ) ): ?>
                <div class="accordion-header" id="collapse-item-<?php echo esc_attr( $unique_id ); ?>">
                    <button class="accordion-button <?php echo esc_attr( $collesed ); ?>" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse-<?php echo esc_attr( $unique_id ); ?>" aria-expanded="<?php echo esc_attr( $ariaexpanded ); ?>" aria-controls="collapse-<?php echo esc_attr( $unique_id ); ?>"><?php echo wp_kses_post($single_data['faq_question']); ?></button>
                </div>
                <?php endif; ?>
                <?php if( ! empty( $single_data['faq_answer'] ) ): ?>
                <div id="collapse-<?php echo esc_attr( $unique_id ); ?>" class="accordion-collapse collapse <?php echo esc_attr( $class ); ?>"
                    aria-labelledby="collapse-item-<?php echo esc_attr( $unique_id ); ?>" data-bs-parent="#faqAccordion<?php echo esc_attr($settings['faq_id']) ?>">
                    <div class="accordion-body">
						<p class="faq-text"><?php echo wp_kses_post($single_data['faq_answer']); ?></p>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>

    <?php 

	}
}