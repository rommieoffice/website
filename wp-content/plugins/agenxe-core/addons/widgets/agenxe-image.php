<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Border;
/**
 *
 * Image Widget .
 *
 */
class agenxe_Image extends Widget_Base {

	public function get_name() {
		return 'agenxeimage';
	}
	public function get_title() {
		return __( 'Image', 'agenxe' );
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'agenxe' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'image_section',
			[
				'label' 	=> __( 'Image', 'agenxe' ),
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
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
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
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
				'condition'	=> [
					'layout_style' => ['1', '5'],
				]
			]
		);  

		$this->add_control(
			'image3',
			[
				'label' 		=> __( 'Choose Image', 'agenxe' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'condition'	=> [
					'layout_style' => ['1','4','5'],
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
				'rows' 		=> 3,
				'condition'	=> [
					'layout_style' => ['1','3', '4', '5'],
				]
			]
		);
		
		$this->add_control(
			'number',
            [
				'label'         => __( 'Number', 'agenxe' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( '' , 'agenxe' ),
				'label_block'   => true,
				'rows' 		=> 2,
				'condition'	=> [
					'layout_style' => ['3', '4'],
				]
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
			<div class="wcu-thumb-1 text-xl-end mb-xl-0 mb-40 wow fadeInUp tilt-active">
				<?php echo agenxe_img_tag( array(
						'url'   => esc_url( $settings['image']['url'] ),
					)); ?>
			</div>

		<?php elseif( $settings['layout_style'] == '3' ): ?>
			<div class="img-box2 mb-40 mb-xl-0 wow fadeInUp">
				<div class="img1">
					<?php echo agenxe_img_tag( array(
						'url'   => esc_url( $settings['image']['url'] ),
						'class' => 'tilt-active',
					)); ?>
				</div>
				<div class="about-counter1">
					<h4 class="counter-title"><?php echo wp_kses_post($settings['number']); ?></h4>
					<div class="about-experience-tag style2">
						<span class="hero-title-anime"><?php echo wp_kses_post($settings['title']); ?></span>
					</div>
				</div>
			</div>

		<?php elseif( $settings['layout_style'] == '4' ): ?>
			<div class="img-box3 mb-40 mb-lg-0 wow fadeInUp">
				<div class="img1">
					<?php echo agenxe_img_tag( array(
						'url'   => esc_url( $settings['image']['url'] ),
						'class' => 'tilt-active',
					)); ?>
				</div>
				<div class="img-box-tag">
					<div class="about-experience-tag style3" data-bg-src="<?php echo esc_url($settings['image3']['url']); ?>">
						<span class="hero-title-anime"><?php echo wp_kses_post($settings['title']); ?></span>
					</div>
					<h4 class="counter-title"><?php echo wp_kses_post($settings['number']); ?></h4>
				</div>
			</div>

		<?php elseif( $settings['layout_style'] == '5' ): ?>
			<div class="testi-thumb2 mb-xl-0 mb-40">
				<?php echo agenxe_img_tag( array(
						'url'   => esc_url( $settings['image']['url'] ),
					)); ?>
				<div class="testi-client-wrap bg-theme" data-bg-src="<?php echo esc_url($settings['image3']['url']); ?>">
					<?php echo agenxe_img_tag( array(
						'url'   => esc_url( $settings['image2']['url'] ),
					)); ?>
					<h6><?php echo wp_kses_post($settings['title']); ?></h6>
				</div>
			</div>

		<?php else: ?>
			<div class="img-box1 mb-40 mb-xl-0 wow fadeInUp">
				<div class="img1">
					<?php echo agenxe_img_tag( array(
						'url'   => esc_url( $settings['image']['url'] ),
						'class' => 'tilt-active',
					)); ?>
				</div>
				<div class="about-experience-tag" data-bg-src="<?php echo esc_url($settings['image3']['url']); ?>">
					<span class="hero-title-anime"><?php echo wp_kses_post($settings['title']); ?></span>
				</div>
				<div class="img2">
					<?php echo agenxe_img_tag( array(
						'url'   => esc_url( $settings['image2']['url'] ),
						'class' => 'tilt-active',
					)); ?>
				</div>
			</div>
      
    <?php endif;
	
	}

}