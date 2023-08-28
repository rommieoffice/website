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
 * Team Info Widget
 *
 */
class agenxe_Team_info extends Widget_Base{

	public function get_name() {
		return 'agenxeteaminfo';
	}
	public function get_title() {
		return esc_html__( 'Team Member Info', 'agenxe' );
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'agenxe' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'team_member_content',
			[
				'label'		=> esc_html__( 'Member Info','agenxe' ),
				'tab'		=> Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'layout_style',
			[
				'label' 		=> __( 'Layout Style', 'agenxe' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options'		=> [
					'1'  			=> __( 'Style One', 'agenxe' ),
				],
			]
		);

        $this->add_control(
			'team_image',
			[
				'label' 		=> esc_html__( 'Member Image', 'agenxe' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
        );

		$this->add_control(
			'content_name',
			[
				'label' 	=> esc_html__( 'Member Name', 'agenxe' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> esc_html__( 'Angela Kwang', 'agenxe' ),
                'rows' => '2'
			]
        );

        $this->add_control(
			'content_desig',
			[
				'label' 	=> esc_html__( 'Member Designation', 'agenxe' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> esc_html__( 'Teacher', 'agenxe' ),
                'rows' => '2'
			]
        ); 

        $this->add_control(
			'description',
			[
				'label' 	=> esc_html__( 'Description', 'agenxe' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> esc_html__( 'Synergistically procrastinate technology without inexpensive partnerships. Credibly synergize long-term high-impact infomediaries before covalent solution. ', 'agenxe' ),
				'separator' => 'after',
			]
        );  

		$repeater = new Repeater();

		$repeater->add_control(
			'label',
				[
				'label'         => __( 'Label', 'agenxe' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( 'Title' , 'agenxe' ),
				'label_block'   => true,
				]
		);

		$repeater->add_control(
			'content',
				[
				'label'         => __( 'Content', 'agenxe' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Content' , 'agenxe' ),
				'label_block'   => true,
				]
		);

		$this->add_control(
			'feature_lists',
			[
				'label' 		=> __( 'Feature Lists', 'agenxe' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
						[
							'label' 		=> __( 'Experience', 'agenxe' ),
						],
				],
			]
		);

		$this->add_control(
			'fb_link',
			[
				'label' 		=> esc_html__( 'Facebook Link', 'logistik' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'logistik' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);

		$this->add_control(
			'twitter_link',
			[
				'label' 		=> esc_html__( 'Twitter Link', 'logistik' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'logistik' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);

		$this->add_control(
			'pinterest_link',
			[
				'label' 		=> esc_html__( 'Pinterest Link', 'logistik' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'logistik' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
					
				],
			]
		);

		$this->add_control(
			'linkedin_link',
			[
				'label' 		=> esc_html__( 'Linkedin Link', 'logistik' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'logistik' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
				'separator' => 'after',
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
				'label' 	=> __( 'Contnet Styling', 'agenxe' ),
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
					'label' => esc_html__( 'Content', 'agenxe' ),
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

		$this->end_controls_tabs();
		$this->end_controls_section();

	}

	protected function render() {

	$settings = $this->get_settings_for_display(); 
	?>
    	<?php if( $settings['layout_style'] == '2' ): ?>

	    <?php else: 
			$f_target = $settings['fb_link']['is_external'] ? ' target="_blank"' : '';
			$f_nofollow = $settings['fb_link']['nofollow'] ? ' rel="nofollow"' : '';
			$t_target = $settings['twitter_link']['is_external'] ? ' target="_blank"' : '';
			$t_nofollow = $settings['twitter_link']['nofollow'] ? ' rel="nofollow"' : '';
			$p_target = $settings['pinterest_link']['is_external'] ? ' target="_blank"' : '';
			$p_nofollow = $settings['pinterest_link']['nofollow'] ? ' rel="nofollow"' : '';
			$l_target = $settings['linkedin_link']['is_external'] ? ' target="_blank"' : '';
			$l_nofollow = $settings['linkedin_link']['nofollow'] ? ' rel="nofollow"' : '';
		?>
			<div class="row">
				<div class="col-lg-6 position-relative">
					<div class="team-details-thumb me-xl-5">
						<div class="thumb">
							<?php echo agenxe_img_tag( array(
								'url'   => esc_url( $settings['team_image']['url']  ),
								'class' => 'w-100',
							)); ?>
						</div>
					</div>
				</div>
				<div class="col-lg-6 align-self-center">
					<div class="team-details-wrap">
						<h2 class="page-title mb-2 th-name"><?php echo esc_html($settings['content_name']); ?></h2>
						<span class="team-details-desig fw-bold text-theme th-desig"><?php echo esc_html($settings['content_desig']); ?></span>
						<p class="mt-25 mb-35 th-text"><?php echo esc_html($settings['description']); ?></p>
						<div class="team-details-info-wrap mb-50">
							<ul>
								<?php foreach( $settings['feature_lists'] as $data ): ?>
								<li><strong><?php echo esc_html($data['label']) ?> </strong><span>:</span> <?php echo wp_kses_post($data['content']) ?></li>
								<?php endforeach; ?>
							</ul>
						</div>
						<div class="th-social style-border mt-15 mb-20">
							<?php if( ! empty( $settings['fb_link']['url']) ): ?>
								<a <?php echo wp_kses_post( $f_nofollow.$f_target ); ?> href="<?php echo esc_url( $settings['fb_link']['url'] ); ?>"><i class="fab fa-facebook-f"></i></a>
							<?php endif; ?>

							<?php if( ! empty( $settings['twitter_link']['url']) ): ?>
								<a <?php echo wp_kses_post( $t_nofollow.$t_target ); ?>  href="<?php echo esc_url( $settings['twitter_link']['url'] ); ?>"><i class="fab fa-twitter"></i></a>
							<?php endif; ?>

							<?php if( ! empty( $settings['pinterest_link']['url']) ): ?>
								<a <?php echo wp_kses_post( $p_nofollow.$p_target ); ?>  href="<?php echo esc_url( $settings['pinterest_link']['url'] ); ?>"><i class="fab fa-pinterest-p"></i></a>
							<?php endif; ?>

							<?php if( ! empty( $settings['linkedin_link']['url']) ): ?>
								<a <?php echo wp_kses_post( $l_nofollow.$l_target ); ?>  href="<?php echo esc_url( $settings['linkedin_link']['url'] ); ?>"><i class="fab fa-linkedin-in"></i></a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>


    	<?php endif;
		
	}
}