
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
 * Contact Info Widget .
 *
 */
class Agenxe_Contact_Info extends Widget_Base {

	public function get_name() {
		return 'agenxecontactinfo';
	}
	public function get_title() {
		return __( 'Contact Info', 'agenxe' );
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'agenxe' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'title_section',
			[
				'label' 	=> __( 'Contact Info', 'agenxe' ),
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
			'title',
            [
				'label'         => __( 'Title', 'agenxe' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Get In Touch' , 'agenxe' ),
				'label_block'   => true,
				'rows' 		=> 2,
				'condition' => [
					'layout_style' => ['2']
				]
			]
		);	

		$this->add_control(
			'phone_number',
            [
				'label'         => __( 'Phone Number', 'agenxe' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( '+11 (456) 568 65' , 'agenxe' ),
				'label_block'   => true,
			]
		);		

        $this->add_control(
			'email_address',
            [
				'label'         => __( 'Email Address', 'agenxe' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( 'info.support@gmail.com' , 'agenxe' ),
				'label_block'   => true,
			]
		);

        $this->add_control(
			'address_name',
            [
				'label'         => __( 'Address Name', 'agenxe' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( '3891 Ranchview Dr. Richardson, California 62639' , 'agenxe' ),
				'rows' 		=> 3,
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
				'condition' => [
					'layout_style' => ['2']
				]
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

		//-------------------------Content Style-----------------------//
		$this->start_controls_section(
			'desc_style',
			[
				'label' 	=> __( 'Content Style', 'agenxe' ),
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

		$this->add_control(
			'desc_color2',
			[
				'label' 		=> __( 'Hover Color', 'agenxe' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-desc:hover' => 'color: {{VALUE}}',
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

		$this->end_controls_section();
		
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        $email    	= $settings['email_address'];
        $email2    	= $settings['email_address2'];
		$phone    	= $settings['phone_number'];        
		$phone2    	= $settings['phone_number2'];        

		$email          = is_email( $email );
		$email2          = is_email( $email2 );

		$replace        = array(' ','-',' - ');
		$replace_phone        = array(' ','-',' - ', '(', ')');
		$with           = array('','','');

		$emailurl       = str_replace( $replace, $with, $email );
		$emailurl2       = str_replace( $replace, $with, $email2 );
		$phoneurl       = str_replace( $replace_phone, $with, $phone );		
		$phoneurl2       = str_replace( $replace_phone, $with, $phone2 );		
        ?>
        <?php if( $settings['layout_style'] == '2' ): ?>
			<div class="title-area mb-25 text-lg-start text-center">
				<h2 class="sec-title th-title"><?php echo wp_kses_post($settings['title']); ?></h2>
			</div>
			<p class="mt-n2 text-lg-start text-center th-desc"><?php echo wp_kses_post($settings['address_name']); ?></p>
			<a href="<?php echo esc_attr( 'mailto:'.$emailurl); ?>" class="contact-mail th-desc mb-25"><?php echo esc_html($email); ?></a>
			<a href="<?php echo esc_attr( 'tel:'.$phoneurl); ?>" class="contact-number th-desc mb-30"><?php echo esc_html($phone); ?></a>

        <?php else: ?>
			<div class="th-widget-contact">
				<div class="info-box">
					<p class="info-box_text th-desc">
						<?php echo wp_kses_post($settings['address_name']); ?>
					</p>
				</div>
				<div class="info-box">
					<a href="<?php echo esc_attr( 'mailto:'.$emailurl); ?>" class="info-box_link th-desc"><?php echo esc_html($email); ?></a>
				</div>
				<div class="info-box">
					<a href="<?php echo esc_attr( 'tel:'.$phoneurl); ?>" class="info-box_link th-desc">
						<?php echo esc_html($phone); ?>
					</a>
				</div>
			</div>

        <?php  endif;

	}

}
