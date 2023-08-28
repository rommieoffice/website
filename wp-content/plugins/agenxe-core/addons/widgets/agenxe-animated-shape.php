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
class agenxe_Animated_Shape extends Widget_Base {

	public function get_name() {
		return 'agenxeshapeimage';
	}
	public function get_title() {
		return __( 'Animated Image', 'agenxe' );
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
			'effect_style',
			[
				'label' 		=> esc_html__( 'Add Styling Attributes', 'agenxe' ),
				'type' 			=> \Elementor\Controls_Manager::SELECT,
				'options' 		=> [
					'jump'  			=> esc_html__( 'Jumping Effect', 'agenxe' ),
					'jump-reverse'  	=> esc_html__( 'Jumping Reverse Effect', 'agenxe' ),
					'movingX'  			=> esc_html__( 'Moving Effect', 'agenxe' ),
					'moving-reverse'	=> esc_html__( 'Moving Reverse Effect', 'agenxe' ),
					'rotate-x'			=> esc_html__( 'Rotate Effect', 'agenxe' ),
					'spin'			=> esc_html__( 'Spin Effect', 'agenxe' ),
					'spin-slow'			=> esc_html__( 'Spin Slow Effect', 'agenxe' ),
					'ripple-animation'			=> esc_html__( 'Ripple Animation Effect', 'agenxe' ),
					''			=> esc_html__( 'No Effect', 'agenxe' ),
				],
				'default' => [ 'jump'],
			]
		);

		$this->add_control(
			'from_top',
			[
				'label' 		=> __( 'Top', 'agenxe' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
			]
		);

		$this->add_control(
			'from_left',
			[
				'label' 		=> __( 'Left', 'agenxe' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> '%',
				'range' 		=> [
					'%' 			=> [
						'min' 			=> 0,
						'max' 			=> 100,
					],
				],
			]
		);

		$this->add_control(
			'from_right',
			[
				'label' 		=> __( 'Right', 'agenxe' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> '%',
				'range' 		=> [
					'%' 			=> [
						'min' 			=> 0,
						'max' 			=> 100,
					],
				],
			]
		);

		$this->add_control(
			'from_bottom',
			[
				'label' 		=> __( 'Bottom', 'agenxe' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> '%',
				'range' 		=> [
					'%' 			=> [
						'min' 			=> 0,
						'max' 			=> 100,
					],
				],
			]
		);

		$this->add_control(
			'responsive_style',
			[
				'label' 		=> esc_html__( 'Responsive Styling', 'agenxe' ),
				'type' 			=> \Elementor\Controls_Manager::SELECT2,
				'multiple' 		=> true,
				'options' 		=> [
					'd-xxl-block'  		=> esc_html__( 'Hide From Extra large Device', 'agenxe' ),
					'd-xl-block'  		=> esc_html__( 'Hide From large Device', 'agenxe' ),
					'd-lg-block'  		=> esc_html__( 'Hide From Tablet', 'agenxe' ),
					'd-md-block'  		=> esc_html__( 'Hide From Mobile', 'agenxe' ),
					'd-sm-block'  		=> esc_html__( 'D SM Block', 'agenxe' ),
					'd-none'  			=> esc_html__( 'Display None', 'agenxe' ),
					' '  				=> esc_html__( 'Default', 'agenxe' ),
				],
			]
		);

		$this->add_control(
			'image_class', [
				'label' 		=> __( 'Image Class Name', 'agenxe' ),
				'description' 		=> __( 'Class name for image size control', 'agenxe' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
        );

        $this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        $this->add_render_attribute('wrapper','class','shape-mockup');
        $this->add_render_attribute('wrapper','class', $settings['image_class']);
        $this->add_render_attribute('wrapper','class', $settings['effect_style']);
        $this->add_render_attribute('wrapper','class', $settings['responsive_style']);

        if($settings['from_bottom']['size']){
	        $this->add_render_attribute( 'wrapper', 'data-bottom', $settings['from_bottom']['size'] .'%' );
	    }
	    if($settings['from_top']['size']){
	        $this->add_render_attribute( 'wrapper', 'data-top', $settings['from_top']['size'] .'%' );
	    }
	    if($settings['from_right']['size']){
	        $this->add_render_attribute( 'wrapper', 'data-right', $settings['from_right']['size'] .'%' );
	    }
	    if($settings['from_left']['size']){
	        $this->add_render_attribute( 'wrapper', 'data-left', $settings['from_left']['size'] .'%' );
	    }

        if( !empty( $settings['image']['id'] ) ) {
            echo '<!-- Image -->';
                echo '<div '.$this->get_render_attribute_string('wrapper').'>';
					echo '<img src="'.esc_url( $settings['image']['url']).'" alt="'.esc_html( get_bloginfo('name') ).'" >';
                echo '</div>';
            echo '<!-- End Image -->';
        }
		
	}
}