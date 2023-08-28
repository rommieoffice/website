<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Image_Size;
/**
 *
 * Portfolio Info Widget
 *
 */
class agenxe_Portfolio_Info extends Widget_Base{

	public function get_name() {
		return 'agenxeeportfolioinfo';
	}
	public function get_title() {
		return esc_html__( 'Portfolio Info', 'agenxe' );
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'agenxe' ];
	}

	public function get_script_depends() {
		return [ 'agenxe-frontend-script' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'portfolio_content',
			[
				'label'		=> esc_html__( 'Portfolio Info','agenxe' ),
				'tab'		=> Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
			'title',
            [
				'label'         => __( 'Title', 'agenxe' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Get In Touch' , 'agenxe' ),
				'label_block'   => true,
				'rows' 		=> 2,
			]
		);	
 
        $repeater = new Repeater();

        $repeater->add_control(
			'label',
			[
				'label' 	=> __( 'List Title', 'agenxe' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( '', 'agenxe' )
			]
        );

        $repeater->add_control(
			'content',
			[
				'label' 	=> __( 'List Content', 'agenxe' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( '', 'agenxe' )
			]
        );

		$this->add_control(
			'portfolio_lists',
			[
				'label' 		=> __( 'Portfolio Info List', 'agenxe' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'label'    => __( 'Clients :', 'agenxe' ),
						'content'    => __( 'Ronald Richards', 'agenxe' ),
					],
				],
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
                    'label' => esc_html__( 'Label', 'agenxe' ),
                ]
            );

            $this->add_control(
                'overview_title_color',
                [
                    'label' 		=> __( 'Color', 'agenxe' ),
                    'type' 			=> Controls_Manager::COLOR,
                    'selectors' 	=> [
                        '{{WRAPPER}} .page-content-list li strong'	=> 'color: {{VALUE}}!important;'
                    ],
                ]
            );

            $this->add_group_control(
            Group_Control_Typography::get_type(),
                [
                    'name' 			=> 'overview_title_typography',
                    'label' 		=> __( 'Typography', 'agenxe' ),
                    'selector' 	=> '{{WRAPPER}} .page-content-list li strong',
                ]
            );

            $this->end_controls_tab();

            //--------------------secound--------------------//
            $this->start_controls_tab(
                'style_hover_tab2',
                [
                    'label' => esc_html__( 'Content', 'agenxe' ),
                ]
            );

            $this->add_control(
                'overview_content_color',
                [
                    'label' 		=> __( 'Color', 'agenxe' ),
                    'type' 			=> Controls_Manager::COLOR,
                    'selectors' 	=> [
                        '{{WRAPPER}} .page-content-list li'	=> 'color: {{VALUE}}!important;',
                    ],
                ]
            );

            $this->add_group_control(
            Group_Control_Typography::get_type(),
                [
                    'name' 			=> 'overview_content_typography',
                    'label' 		=> __( 'Typography', 'agenxe' ),
                    'selector' 	=> '{{WRAPPER}} .page-content-list li',
                ]
            );

            $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();


	}

	protected function render() {

    $settings = $this->get_settings_for_display(); 
    ?>
       <div class="page-content-details">
            <h2 class="page-title th-title mb-0"><?php echo wp_kses_post($settings['title']); ?></h2>
            <ul class="page-content-list">
                <?php  foreach( $settings['portfolio_lists'] as $data ): ?>
                <li><strong><?php echo esc_html( $data['label'] ); ?></strong><?php echo esc_html( $data['content'] ); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>

    <?php
		
	}
}