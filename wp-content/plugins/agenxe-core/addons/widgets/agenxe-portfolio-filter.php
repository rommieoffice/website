<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
/**
 *
 * Filter Portfolio Widget .
 *
 */
class Agenxe_Portfolio_Filter extends Widget_Base{

	public function get_name() {
		return 'agenxeportfilofilter';
	}
	public function get_title() {
		return __( 'Portfolio Filter', 'agenxe' );
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'agenxe' ];
	}

	protected function register_controls() {

		 $this->start_controls_section(
			'portfolio_filter_section',
			[
				'label' 	=> __( 'Portfolio Filter Button', 'souler' ),
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
					'2'  		=> __( 'Style Two', 'agenxe' ),
					// '3'  		=> __( 'Style Three', 'agenxe' ),
				],
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'filter_title', [
				'label' 		=> __( 'Filter Title', 'souler' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'UI/UX Design' , 'souler' ),
				'label_block' 	=> true,
			]	
		);	
		$repeater->add_control(
			'filter_data', [
				'label' 		=> __( 'Filtering nav data', 'souler' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'cat1' , 'souler' ),
				'label_block' 	=> true,
			]
        );

        $this->add_control(
			'portfolio_filter',
			[
				'label' 		=> __( 'Filter Buttons', 'souler' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'filter_title' 		=> __( 'UI/UX Design', 'souler' ),
					]
				],
				'title_field' 	=> '{{{ filter_title }}}',
			]
		);	

		 $this->end_controls_section();

		 $this->start_controls_section(
			'portfolio_section',
			[
				'label' 	=> __( 'Portfolio Filter Content', 'souler' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
		);

        $repeater = new Repeater();

        $repeater->add_control(
			'filter_content_data', [
				'label' 		=> __( 'Filtering nav data', 'souler' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'cat1' , 'souler' ),
				'label_block' 	=> true,
			]
        ); 

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
				'default'       => __( 'Marketing Agency' , 'agenxe' ),
				'label_block'   => true,
				'rows' => '2'
			]
		);

        $repeater->add_control(
			'portfolio_title',
            [
				'label'         => __( 'Title', 'agenxe' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Email Marketing' , 'agenxe' ),
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
						'portfolio_cate'	=> __( 'Marketing Agency', 'agenxe' ),
					],
				],		
			]
		);

        $this->end_controls_section();

		//---------------------------------------
			//Style Section Start
		//---------------------------------------

		/*-----------------------------------------Tab Menu styling------------------------------------*/
		$this->start_controls_section(
			'menu_styling',
			[
				'label' 	=> __( 'Menu Style', 'agenxe' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

   		$this->add_control(
			'menu_color',
			[
				'label' 		=> __( 'Color', 'agenxe' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .portfolio-filter-btn .tab-btn'	=> 'color: {{VALUE}}!important;',
				],
			]
        );

         $this->add_control(
			'menu_hover_color',
			[
				'label' 		=> __( 'Hover Color', 'agenxe' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .portfolio-filter-btn .tab-btn.active, {{WRAPPER}} .portfolio-filter-btn .tab-btn:hover'	=> '--theme-color: {{VALUE}}!important;',
				],
			]
        );       

        $this->add_control(
			'menu_border_color',
			[
				'label' 		=> __( 'Border Color', 'agenxe' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .portfolio-filter-btn .tab-btn:after'	=> '--theme-color: {{VALUE}}!important;',
				],
			]
        );       

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'menu_typography',
		 		'label' 		=> __( 'Typography', 'agenxe' ),
		 		'selector' 	=> '{{WRAPPER}} .portfolio-filter-btn .tab-btn',
			]
		);

        $this->end_controls_section();

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

    if( $settings['layout_style'] == '2' ){
        $column_class = 'col-md-6';
    }else{
        $column_class = 'col-md-6 col-lg-4';
    }
    ?>

        <div class="text-center">
            <div class="portfolio-filter-btn filter-menu filter-menu-active mb-50">
                <button data-filter="*" class="tab-btn active" type="button">Show All</button>
                <?php 
           		foreach( $settings['portfolio_filter'] as $data ): 
           		$replace        = array(' ','-',' - ');
           		$with           = array('','','');
       			$filter_slug       = strtolower(str_replace( $replace, $with, $data['filter_data'] ));
           		?>
                    <button data-filter=".<?php echo esc_attr( $filter_slug ); ?>" class="tab-btn" type="button"><?php echo esc_html($data['filter_title']); ?></button>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="row gx-40 gy-40 filter-active">
            <?php 
           		foreach( $settings['portfolio_list'] as $data ): 
           		$replace        = array('-',' - ');
				$with           = array('','','');
				$filter_slug       = strtolower(str_replace( $replace, $with, $data['filter_content_data'] ));

           	?>
            <div class="<?php echo esc_attr( $column_class .' '. $filter_slug); ?> filter-item">
                <div class="project-card3 wow fadeInUp">
                    <div class="project-img">
                        <?php echo agenxe_img_tag( array(
								'url'   => esc_url( $data['portfolio_img']['url']  ),
							)); ?>
                    </div>
                    <a href="project-details.html" class="icon-btn" tabindex="-1"><i class="far fa-arrow-up-right"></i></a>
                    <div class="project-content">
                        <p class="project-card_subtitle th-sub"><?php echo esc_html( $data['portfolio_cate'] ); ?></p>
                        <h4 class="box-title th-title"><a href="<?php echo esc_url( $data['portfolio_link']['url'] ); ?>"><?php echo esc_html( $data['portfolio_title'] ); ?></a></h4>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

		<?php


	}
}