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
 * Video Widget .
 *
 */
class agenxe_Video extends Widget_Base {

	public function get_name() {
		return 'agenxevideo';
	}
	public function get_title() {
		return __( 'Video Box', 'agenxe' );
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'agenxe' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'video_section',
			[
				'label' 	=> __( 'video Box', 'agenxe' ),
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
					'2' 		=> __( 'Style Two', 'agenxe' ),
				],
			]
		);  
		
		$this->add_control(
            'image',
            [
                'label'     => __( 'Choose Image', 'agenxe' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
            ]
        );

		$this->add_control(
			'video_link',
			[
				'label' 		=> esc_html__( 'Video URL', 'agenxe' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'agenxe' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);

		$this->end_controls_section();

        //---------------------------------------
			//Style Section Start
		//---------------------------------------


	}

	protected function render() {

        $settings = $this->get_settings_for_display();
        ?>

        <?php if( $settings['layout_style'] == '2' ): ?> 
			<div class="th-video" data-overlay="black" data-opacity="6">
				<?php echo agenxe_img_tag( array(
						'url'   => esc_url( $settings['image']['url']  ),
					)); ?>
				<a href="<?php echo esc_url( $settings['video_link']['url'] ); ?>" class="play-btn style8 popup-video"><i class="fa-sharp fa-solid fa-play"></i></a>
			</div>

        <?php else: ?>
			<div class="video-area-1 text-center " data-bg-src="<?php echo esc_url($settings['image']['url']); ?>" data-overlay="black" data-opacity="6">
				<div class="container">
					<div class="video-box1">
						<a href="<?php echo esc_url( $settings['video_link']['url'] ); ?>" class="play-btn style6 popup-video"><i class="fa-sharp fa-solid fa-play"></i></a>
					</div>
				</div>
			</div>

        <?php endif;

	}

}