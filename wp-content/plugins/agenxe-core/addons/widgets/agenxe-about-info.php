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
 * About Info Widget .
 *
 */
class Agenxe_About_Info extends Widget_Base {

	public function get_name() {
		return 'agenxeaboutinfo';
	}

	public function get_title() {
		return __( 'About Info', 'agenxe' );
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
				'label'		 	=> __( 'About Info', 'agenxe' ),
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
					'2'  		=> __( 'Style Two', 'agenxe' ),				
					'3'  		=> __( 'Style Three', 'agenxe' ),								
				],
			]
		);

		$this->add_control(
			'button_text',
			[
				'label' 	=> esc_html__( 'Button Text', 'agenxe' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> esc_html__( 'Read More', 'agenxe' ),
				'label_block' => true,
				'condition' => [
					'layout_style' => ['2']
				]
			]
        );

        $this->add_control(
			'button_link',
			[
				'label' 		=> esc_html__( 'Button Link', 'agenxe' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'agenxe' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
				'condition' => [
					'layout_style' => ['2']
				]
			]
		);

		$this->add_control(
			'image',
			[
				'label'     => __( 'Image', 'agenxe' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'image2',
			[
				'label'     => __( 'Image', 'agenxe' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => [
					'active' => true,
				],
				'condition' => [
					'layout_style' => ['3']
				]
			]
		);
		
		$this->add_control(
			'title',
            [
				'label'         => __( 'Title', 'agenxe' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Title here' , 'agenxe' ),
				'label_block'   => true,
				'rows' => '2',
				'condition' => [
					'layout_style' => ['3']
				]
			]
		);

		$this->add_control(
			'desc',
            [
				'label'         => __( 'Description', 'agenxe' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Description here' , 'agenxe' ),
				'label_block'   => true,
				'rows' => '4',
				
			]
		);

		$this->add_control(
			'info',
			[
				'label' 	=> __( 'Info', 'agenxe' ),
                'type' 		=> Controls_Manager::WYSIWYG,
                'default'  	=> __( '', 'agenxe' )
			]
        );

        $this->end_controls_section();

        //---------------------------------------
			//Style Section Start
		//---------------------------------------

		//-------------------------Content Style-----------------------//
        $this->start_controls_section(
			'section_desc_style_section',
			[
				'label' => __( 'Content Style', 'agenxe' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'section_desc_color',
			[
				'label' 		=> __( 'Color', 'agenxe' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-desc' => 'color: {{VALUE}}!important',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'section_desc_typography',
				'label' 	=> __( 'Typography', 'agenxe' ),
                'selector' 	=> '{{WRAPPER}} .th-desc',
			]
        );

        $this->add_responsive_control(
			'section_desc_margin',
			[
				'label' 		=> __( 'Margin', 'agenxe' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'section_desc_padding',
			[
				'label' 		=> __( 'Padding', 'agenxe' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-desc' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->end_controls_section();

		//-------------------------Content Style-----------------------//
		$this->start_controls_section(
			'section_desc_style_section2',
			[
				'label' => __( 'Content 2 Style', 'agenxe' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'section_desc_color2',
			[
				'label' 		=> __( 'Color', 'agenxe' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-desc2' => 'color: {{VALUE}}!important',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'section_desc_typography2',
				'label' 	=> __( 'Typography', 'agenxe' ),
                'selector' 	=> '{{WRAPPER}} .th-desc2',
			]
        );

        $this->add_responsive_control(
			'section_desc_margin2',
			[
				'label' 		=> __( 'Margin', 'agenxe' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-desc2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'section_desc_padding2',
			[
				'label' 		=> __( 'Padding', 'agenxe' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-desc2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();
        ?>

        <?php if( $settings['layout_style'] == '2' ): ?>
			<div class="btn-group">
				<a href="<?php echo esc_url( $settings['button_link']['url'] ); ?>" class="th-btn"><?php echo wp_kses_post($settings['button_text']); ?></a>
				<div class="about-profile2">
					<div class="avater">
							<?php echo agenxe_img_tag( array(
								'url'   => esc_url( $settings['image']['url']  ),
							)); ?>
					</div>
					<div class="media-body">
						<h3 class="title th-desc"><?php echo esc_html( $settings['desc'] ); ?></h3>
						<span class="desig th-desc2"><?php echo wp_kses_post($settings['info']); ?></span>
					</div>
				</div>
			</div>

        <?php elseif( $settings['layout_style'] == '3' ): ?>
			<div class="appointment-author-wrap mb-xl-0">
				<div class="author-wrap">
					<div class="thumb">
						<?php echo agenxe_img_tag( array(
								'url'   => esc_url( $settings['image']['url']  ),
							)); ?>
					</div>
					<div class="author-details">
						<h4 class="auhtor-title th-desc"><?php echo esc_html( $settings['title'] ); ?></h4>
						<p class="author-desig th-desc2"><?php echo esc_html( $settings['desc'] ); ?></p>
						<div class="th-social">
							<?php echo wp_kses_post($settings['info']); ?>
						</div>
					</div>
				</div>
				<div class="author-sign">
					<?php echo agenxe_img_tag( array(
							'url'   => esc_url( $settings['image2']['url']  ),
						)); ?>
				</div>
			</div>
			
    	<?php else: ?>
			<div class="th-widget-about">
				<div class="about-logo">
					<a href="index.html">
						<?php echo agenxe_img_tag( array(
							'url'   => esc_url( $settings['image']['url']  ),
						)); ?>
					</a>
				</div>
				<p class="about-text th-desc"><?php echo esc_html( $settings['desc'] ); ?> </p>
				<div class="th-desc2">
					<?php echo wp_kses_post($settings['info']); ?>
				</div>
			</div>

		<?php endif;

	}

}
