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
 * Portfolio Widget .
 *
 */
class agenxe_Portfolio extends Widget_Base {

	public function get_name() {
		return 'agenxeportfolio';
	}
	public function get_title() {
		return __( 'Portfolio', 'agenxe' );
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'agenxe' ];
	}

	protected function register_controls() {

		 $this->start_controls_section(
			'portfolio_section',
			[
				'label'     => __( 'portfolios', 'agenxe' ),
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
					'2'  		=> __( 'Style Two', 'agenxe' ),
					'3'  		=> __( 'Style Three', 'agenxe' ),
					'4'  		=> __( 'Style Four', 'agenxe' ),
				],
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'portfolio_img',
			[
				'label' 		=> __( 'Choose Image', 'agenxe' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
			]
		); 

		$repeater->add_control(
			'portfolio_cate',
            [
				'label'         => __( 'Category', 'agenxe' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'truck Freight' , 'agenxe' ),
				'label_block'   => true,
				'rows' => '2'
			]
		);

        $repeater->add_control(
			'portfolio_title',
            [
				'label'         => __( 'Title', 'agenxe' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Health Insurance' , 'agenxe' ),
				'label_block'   => true,
				'rows' => '3'
			]
		);

        $repeater->add_control(
			'portfolio_link',
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
			'portfolio_list',
			[
				'label' 		=> __( 'portfolio List', 'agenxe' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'portfolio_cate'	=> __( 'Health Insurance', 'agenxe' ),
					],
				],		
			]
		);

        $this->end_controls_section();

        //---------------------------------------
			//Style Section Start
		//---------------------------------------

		//-------------------------Subtitle Style-----------------------//
		$this->start_controls_section(
			'subtitle_style',
			[
				'label' 	=> __( 'Subtitle Style', 'agenxe' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'subtitle_color',
			[
				'label' 		=> __( 'Color', 'agenxe' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-sub' => 'color: {{VALUE}}',
				],
			]
		);	

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'subtitle_typography',
				'label' 	=> __( 'Typography', 'agenxe' ),
				'selector' 	=> '{{WRAPPER}} .th-sub',
			]
		);

		$this->add_responsive_control(
			'subtitle_margin',
			[
				'label' 		=> __( 'Margin', 'agenxe' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-sub' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_responsive_control(
			'subtitle_padding',
			[
				'label' 		=> __( 'Padding', 'agenxe' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-sub' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
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
					'{{WRAPPER}} .th-title a' => 'color: {{VALUE}} !important',
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
			<div class="row project-wrap">
				<?php foreach( $settings['portfolio_list'] as $key => $data ): ?>
				<div class="col-md-12 project-card_wrap">
                    <div class="project-card4 ">
                        <div class="project-card_number">
							<?php echo esc_html__('0', 'agenxe'); echo esc_html($key + 1); ?>
						</div>
                        <div class="project-content">
							<h6 class="project-subtitle th-sub"><?php echo esc_html( $data['portfolio_cate'] ); ?></h6>
							<h4 class="project-title th-title"><a href="<?php echo esc_url( $data['portfolio_link']['url'] ); ?>" tabindex="-1"><?php echo esc_html( $data['portfolio_title'] ); ?></a></h4>
                        </div>
                        <div class="project-img">
							<?php echo agenxe_img_tag( array(
								'url'   => esc_url( $data['portfolio_img']['url']  ),
							)); ?>
                        </div>
                        <a class="icon-btn" href="<?php echo esc_url( $data['portfolio_link']['url'] ); ?>"><i class="far fa-arrow-up-right"></i></a>
                    </div>
                </div>
				<?php endforeach; ?>
            </div>

		<?php elseif( $settings['layout_style'] == '3' ): ?>
            <div class="row th-carousel project-slider-3" data-slide-show="4" data-lg-slide-show="3" data-md-slide-show="2" data-sm-slide-show="1">
				<?php 
				$x=0;
				foreach( $settings['portfolio_list'] as $data ): 
				$x = $x + .2;
				?>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="project-card3 wow fadeInUp" data-wow-delay="<?php echo esc_attr($x); ?>s">
                        <div class="project-img">
							<?php echo agenxe_img_tag( array(
								'url'   => esc_url( $data['portfolio_img']['url']  ),
							)); ?>
                        </div>
						<a href="<?php echo esc_url($data['portfolio_img']['url']); ?>" class="icon-btn popup-image" tabindex="-1"><i class="far fa-arrow-up-right"></i></a>
                        <div class="project-content">
                                <p class="project-card_subtitle th-sub"><?php echo esc_html( $data['portfolio_cate'] ); ?></p>
                                <h4 class="box-title th-title"><a href="<?php echo esc_url( $data['portfolio_link']['url'] ); ?>"><?php echo esc_html( $data['portfolio_title'] ); ?></a></h4>
                        </div>
                    </div>
                </div>
				<?php endforeach; ?>
            </div>

		<?php elseif( $settings['layout_style'] == '4' ): ?>
            <div class="row th-carousel" data-slide-show="3" data-lg-slide-show="3" data-md-slide-show="2" data-sm-slide-show="1">
				<?php 
				$x=0;
				foreach( $settings['portfolio_list'] as $data ): 
				$x = $x + .2;
				?>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="project-card3 wow fadeInUp" data-wow-delay="<?php echo esc_attr($x); ?>s">
                        <div class="project-img">
							<?php echo agenxe_img_tag( array(
								'url'   => esc_url( $data['portfolio_img']['url']  ),
							)); ?>
                        </div>
						<a href="<?php echo esc_url($data['portfolio_img']['url']); ?>" class="icon-btn popup-image" tabindex="-1"><i class="far fa-arrow-up-right"></i></a>
                        <div class="project-content">
                                <p class="project-card_subtitle th-sub"><?php echo esc_html( $data['portfolio_cate'] ); ?></p>
                                <h4 class="box-title th-title"><a href="<?php echo esc_url( $data['portfolio_link']['url'] ); ?>"><?php echo esc_html( $data['portfolio_title'] ); ?></a></h4>
                        </div>
                    </div>
                </div>
				<?php endforeach; ?>
            </div>

    	<?php else: ?>
		<div class="container-fluid p-0">
			<div class="row th-carousel portfolio-slider1" data-slide-show="4" data-ml-slide-show="3" data-lg-slide-show="2" data-md-slide-show="1" data-sm-slide-show="1" data-dots="false" data-arrows="false" id="portfolio-slider1">
				<?php foreach( $settings['portfolio_list'] as $data ): ?>
                <div class="col-lg-3">
                    <div class="project-card">
                        <div class="project-img">
							<?php echo agenxe_img_tag( array(
								'url'   => esc_url( $data['portfolio_img']['url']  ),
							)); ?>
                        </div>
                        <div class="project-content">
                            <p class="project-card_subtitle th-sub"><?php echo esc_html( $data['portfolio_cate'] ); ?></p>
                            <h4 class="project-card_title th-title"><a href="<?php echo esc_url( $data['portfolio_link']['url'] ); ?>"><?php echo esc_html( $data['portfolio_title'] ); ?></a></h4>
                        </div>
						<a href="<?php echo esc_url($data['portfolio_img']['url']); ?>" class="icon-btn popup-image" tabindex="-1"><i class="fas fa-arrow-up-right"></i></a>
                    </div>
                </div>
				<?php endforeach; ?>
            </div>
        </div>
		
      <?php endif; 

	}

}