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
 * Info Box Widget .
 *
 */
class agenxe_Info_Box extends Widget_Base {

	public function get_name() {
		return 'agenxeinfobox';
	}
	public function get_title() {
		return __( 'Info Box', 'agenxe' );
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
				'label'		 	=> __( 'Info Box', 'agenxe' ),
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

		$this->add_control(
			'image',
			[
				'label' 		=> __( 'Choose Image', 'agenxe' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'condition'	=> [
					'layout_style' => ['1']
				]	
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
				'condition'	=> [
					'layout_style' => ['1']
				]	
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
				'condition'	=> [
					'layout_style' => ['1']
				]	
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

		$phone    	= $settings['num'];
		$replace_phoone        = array(' ','-',' - ', '(', ')');
		$with           = array('','','');
		$phoneurl       = str_replace( $replace_phoone, $with, $phone );
    ?>

        <?php if( $settings['layout_style'] == '2' ): ?>
			<div class="btn-wrap mb-40">
				<a href="<?php echo esc_url( $settings['button_link']['url'] ); ?>" class="th-btn th_btn"><?php echo wp_kses_post($settings['button_text']); ?></a>
				<div class="about-info-wrap">
					<div class="icon"><i class="fas fa-phone-plus"></i></div>
					<div class="details">
						<p class="about-info-title th-title"><?php echo esc_html($settings['title']); ?></p>
						<a class="about-info-link th-desc" href="<?php echo esc_attr('tel:' . $phoneurl); ?>"><?php echo esc_html($settings['num']); ?></a>
					</div>
				</div>
			</div>
   
    	<?php else: ?>
			<div class="about-info-wrap wow fadeInUp">
				<div class="about-profile">
					<div class="avater">
						<?php echo agenxe_img_tag( array(
							'url'   => esc_url( $settings['image']['url'] ),
						)); ?>
					</div>
					<div class="media-body">
						<h3 class="title th-title"><?php echo esc_html($settings['title']); ?></h3>
						<span class="desig th-desc"><?php echo esc_html($settings['desc']); ?></span>
					</div>
				</div>
				<div class="about-profile-signature">
					<?php echo agenxe_img_tag( array(
							'url'   => esc_url( $settings['image2']['url'] ),
						)); ?>
				</div>
			</div>

	<?php  endif;

	}

}