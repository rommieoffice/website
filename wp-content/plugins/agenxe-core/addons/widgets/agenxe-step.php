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
 * Step Widget .
 *
 */
class agenxe_Step extends Widget_Base {

	public function get_name() {
		return 'agenxestep';
	}
	public function get_title() {
		return __( 'Step/Process', 'agenxe' );
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'agenxe' ];
	}

	protected function register_controls() {

		 $this->start_controls_section(
			'section_title_section',
			[
				'label'		 	=> __( 'Steps', 'agenxe' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
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
				],
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'icon',
			[
				'label'     => __( 'Icon', 'agenxe' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => [
					'active' => true,
				],
			]
		);

		$repeater->add_control(
			'title',
			[
				'label' 	=> __( 'Title', 'agenxe' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Online Quote', 'agenxe' )
			]
        );

		$repeater->add_control(
			'desc',
			[
				'label' 	=> __( 'Description', 'agenxe' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 4,
                'default'  	=> __( 'Description here', 'agenxe' )
			]
        );

		$this->add_control(
			'info_lists',
			[
				'label' 		=> __( 'Info Lists', 'agenxe' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title'    => __( 'Online Quote', 'agenxe' ),
					],
				],
				// 'condition'	=> [
				// 	'layout_style' => ['1'],
				// ]
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
		
    	<?php else: ?>
			<div class="process-card-area wow fadeInUp">
                <div class="process-line"></div>
                <div class="row gy-40 justify-content-center">
					<?php  
					$x = 0;
					foreach( $settings['info_lists'] as $data ): 
					$x++;
					?>
                    <div class="col-md-6 col-lg-3 process-card-wrap">
                        <div class="process-card">
							<div class="process-card_icon">
								<?php echo agenxe_img_tag( array(
									'url'   => esc_url( $data['icon']['url']  ),
								)); ?>
							</div>
                            <div class="process-card_number"><?php echo esc_attr('0' . $x ); ?></div>
                            <h2 class="box-title th-title"><?php echo esc_html($data['title']); ?></h2>
                            <p class="process-card_text th-desc"><?php echo esc_html($data['desc']); ?></p>
                        </div>
                    </div>
					<?php endforeach; ?>
                </div>
            </div>

		<?php endif;

	}

}