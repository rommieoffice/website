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
 * features Widget .
 *
 */
class Agenxe_Features extends Widget_Base {

	public function get_name() {
		return 'agenxefeatures';
	}
	public function get_title() {
		return __( 'features', 'agenxe' );
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'agenxe' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'arrow_section',
			[
				'label'     => __( 'features', 'agenxe' ),
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
					'3' 		=> __( 'Style Three', 'agenxe' ),
					'4' 		=> __( 'Style Four', 'agenxe' ),
					'5' 		=> __( 'Style Five', 'agenxe' ),
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
					'layout_style' => ['1'],
				]
			]
		); 
	
        $repeater = new Repeater();

		$repeater->add_control(
			'icon',
			[
				'label' 		=> __( 'Choose Image', 'agenxe' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
			]
		); 

        $repeater->add_control(
			'title',
            [
				'label'         => __( 'Title', 'agenxe' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Claim Success Rates' , 'agenxe' ),
				'label_block'   => true,
				'rows' => '2'
			]
		);

		$repeater->add_control(
			'link',
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
			'features_list',
			[
				'label' 		=> __( 'Features List', 'agenxe' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'DIGITAL MARKETING', 'agenxe' ),
					],
				],
				'condition'	=> [
					'layout_style' => ['1', '3'],
				]
			]
		);

		$repeater2 = new Repeater();

        $repeater2->add_control(
			'icon',
            [
				'label'         => __( 'Icon', 'agenxe' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( '' , 'agenxe' ),
				'label_block'   => true,
				'rows' => '2'
			]
		);

        $repeater2->add_control(
			'title',
            [
				'label'         => __( 'Title', 'agenxe' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Title' , 'agenxe' ),
				'label_block'   => true,
				'rows' => '2'
			]
		);

        $repeater2->add_control(
			'desc',
            [
				'label'         => __( 'Description', 'agenxe' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Description' , 'agenxe' ),
				'label_block'   => true,
				'rows' => '4'
			]
		);

		$this->add_control(
			'features_list_2',
			[
				'label' 		=> __( 'Features List', 'agenxe' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater2->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'Creative Team', 'agenxe' ),
					],
				],
				'condition'	=> [
					'layout_style' => ['2', '5'],
				]
			]
		);

		$repeater3 = new Repeater();

        $repeater3->add_control(
			'icon',
            [
				'label'         => __( 'Icon', 'agenxe' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( '' , 'agenxe' ),
				'label_block'   => true,
				'rows' => '2'
			]
		);

        $repeater3->add_control(
			'title',
            [
				'label'         => __( 'Title', 'agenxe' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Title' , 'agenxe' ),
				'label_block'   => true,
				'rows' => '2'
			]
		);

        $repeater3->add_control(
			'desc',
            [
				'label'         => __( 'Description', 'agenxe' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Description' , 'agenxe' ),
				'label_block'   => true,
				'rows' => '4'
			]
		);

		$repeater3->add_control(
			'button_text',
			[
				'label' 	=> __( 'Button Text', 'agenxe' ),
                'type' 		=> Controls_Manager::TEXT,
                'label_block' => true,
                'default'  	=> __( 'Read More', 'agenxe' )
			]
        );

        $repeater3->add_control(
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
			'features_list_3',
			[
				'label' 		=> __( 'Features List', 'agenxe' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater3->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'Creative Team', 'agenxe' ),
					],
				],
				'condition'	=> [
					'layout_style' => ['4'],
				]
			]
		);

        $this->end_controls_section();

        //---------------------------------------
			//Style Section Start
		//---------------------------------------	

		//-------------------------General Style-----------------------//
		$this->start_controls_section(
			'style',
			[
				'label' => __( 'General', 'agenxe' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
				'condition'	=> [
					'layout_style' => ['1', '3'],
				]	
			]
		);

		$this->add_control(
			'general_bg',
			[
				'label' 		=> __( 'Background Color', 'agenxe' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-wrap' => 'background-color: {{VALUE}}!important',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'selector' => '{{WRAPPER}} .th-wrap',
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

		$this->add_control(
			'title_color2',
			[
				'label' 		=> __( 'Hover Color', 'agenxe' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-title a:hover' => 'color: {{VALUE}} !important',
				],
				'condition'	=> [
					'layout_style' => ['1', '3'],
				]	
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
				'condition'	=> [
					'layout_style' => ['2', '4'],
				]	
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
			<div class="wcu-wrap1">
				<?php foreach( $settings['features_list_2'] as $data ): ?>
				<div class="wcu-wrap wow fadeInUp">
					<?php if(!empty($data['icon'])): ?>
					<div class="wcu-wrap_icon">
						<?php echo wp_kses_post( $data['icon'] ); ?>
					</div>
					<?php endif; ?>
					<div class="wcu-wrap_details">
						<h3 class="box-title th-title"><?php echo esc_html( $data['title'] ); ?></h3>
						<p class="wcu-wrap_text th-desc"><?php echo esc_html( $data['desc'] ); ?></p>
					</div>
				</div>
				<?php endforeach; ?>
			</div>

		<?php elseif( $settings['layout_style'] == '3' ): ?>
			<div class="feature-area-2 th-wrap">
				<div class="container-fluid">
					<div class="row feature-slider-2 th-carousel" data-slide-show="6" data-xl-slide-show="5" data-ml-slide-show="4" data-lg-slide-show="3" data-md-slide-show="2" data-sm-slide-show="2" data-speed="2000" data-autoplay-speed="400">
						<?php foreach( $settings['features_list'] as $data ): ?>
						<!-- Single Item -->
						<div class="col-sm-6 col-xl-4 col-lg-6 col-md-4">
							<div class="feature-item">
								<div class="feature_icon">
									<?php echo agenxe_img_tag( array(
										'url'   => esc_url( $data['icon']['url']  ),
									)); ?>
								</div>
								<h3 class="box-title th-title"><a href="<?php echo esc_url( $data['link']['url'] ); ?>"><?php echo esc_html( $data['title'] ); ?></a></h3>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>

		<?php elseif( $settings['layout_style'] == '4' ): ?>
			<div class="wcu-wrap2 ms-xl-5 mt-xl-0 mt-40">
				<?php foreach( $settings['features_list_3'] as $data ): ?>
				<div class="wcu-wrap wow fadeInUp">
					<?php if(!empty($data['icon'])): ?>
					<div class="wcu-wrap_icon">
						<?php echo wp_kses_post( $data['icon'] ); ?>
					</div>
					<?php endif; ?>
					<div class="wcu-wrap_details">
						<h3 class="box-title th-title"><?php echo esc_html( $data['title'] ); ?></h3>
						<p class="wcu-wrap_text th-desc"><?php echo esc_html( $data['desc'] ); ?></p>
						<div class="btn-wrap">
							<a href="<?php echo esc_url( $data['button_link']['url'] ); ?>" class="link-btn"><?php echo wp_kses_post( $data['button_text'] );  ?></a>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>

		<?php elseif( $settings['layout_style'] == '5' ): ?>
			<div class="row">
				<?php foreach( $settings['features_list_2'] as $data ): ?>
				<div class="col-md-6 wcu-grid">
					<div class="wcu-wrap wow fadeInUp">
						<?php if(!empty($data['icon'])): ?>
						<div class="wcu-wrap_icon">
							<?php echo wp_kses_post( $data['icon'] ); ?>
						</div>
						<?php endif; ?>
						<div class="wcu-wrap_details">
							<h3 class="box-title th-title"><?php echo esc_html( $data['title'] ); ?></h3>
							<p class="wcu-wrap_text th-desc"><?php echo esc_html( $data['desc'] ); ?></p>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>

        <?php else: ?>
			<div class="feature-area-1 bg-theme th-wrap" data-bg-src="<?php echo esc_url($settings['image']['url']); ?>">
				<div class="container-fluid">
					<div class="row feature-slider-1 th-carousel" data-slide-show="6" data-xl-slide-show="5" data-ml-slide-show="4" data-lg-slide-show="3" data-md-slide-show="2" data-sm-slide-show="2" data-speed="2000" data-autoplay-speed="400">
						<?php foreach( $settings['features_list'] as $data ): ?>
						<!-- Single Item -->
						<div class="col-sm-6 col-xl-4 col-lg-6 col-md-4">
							<div class="feature-item">
								<div class="feature_icon">
									<?php echo agenxe_img_tag( array(
										'url'   => esc_url( $data['icon']['url']  ),
									)); ?>
								</div>
								<h3 class="box-title th-title"><a href="<?php echo esc_url( $data['link']['url'] ); ?>"><?php echo esc_html( $data['title'] ); ?></a></h3>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
        

    <?php endif;
			
	}
}