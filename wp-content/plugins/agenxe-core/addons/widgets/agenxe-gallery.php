<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Group_Control_Border;
/**
 *
 * Gallery Widget .
 *
 */
class Agenxe_Gallery extends Widget_Base {

	public function get_name() {
		return 'agenxegallery';
	}
	public function get_title() {
		return __( 'Gallery', 'agenxe' );
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'agenxe' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'counter_section',
			[
				'label' 	=> __( 'Gallery', 'agenxe' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
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
			'gallery',
			[
				'label' => esc_html__( 'Add Gallery Slider', 'agenxe' ),
				'type' => \Elementor\Controls_Manager::GALLERY,
				'default' => [],
			]
		);

        $this->add_control(
			'gallery_icon',
            [
				'label'         => __( 'Gallery Icon', 'agenxe' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( '<i class="fab fa-instagram"></i>' , 'agenxe' ),
				'label_block'   => true,
				'rows' => '4',
			]
		);

		$this->end_controls_section();

		//---------------------------------------
			//Style Section Start
		//---------------------------------------

		//-------------------------General Style-----------------------//
        $this->start_controls_section(
            'gallery_style_section',
            [
                'label' => __( 'Gallery Style', 'agenxe' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'gallery_overlay_color',
            [
                'label' 	=> __( 'Overlay Color', 'agenxe' ),
                'type' 		=> Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gallery-card .gallery-img:before' => 'background-color: {{VALUE}}!important;',
                ],
            ]
        );

        $this->end_controls_section();	

	}

	protected function render() {

	$settings = $this->get_settings_for_display();
	?>
		 <?php if( $settings['layout_style'] == '2' ): ?>


		 <?php else: ?>
            <div class="sidebar-gallery">
                <?php foreach ( $settings['gallery'] as $single_data ): ?>
                <div class="gallery-thumb">
                        <?php echo agenxe_img_tag( array(
                            'url'   => esc_url( $single_data['url'] ),
                        ) ); ?>
                    <a href="<?php echo esc_url( $single_data['url'] ); ?>" class="gallery-btn"><?php echo wp_kses_post($settings['gallery_icon']) ?></a>
                </div>
                <?php endforeach; ?>
            </div>


    <?php   endif;
	}

}