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
 * Skill Widget .
 *
 */
class agenxe_Skill extends Widget_Base {

	public function get_name() {
		return 'agenxeskill';
	}
	public function get_title() {
		return __( 'Skill Bar', 'agenxe' );
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'agenxe' ];
	}

	protected function register_controls() {

        $this->start_controls_section(
                'skill_bar_section',
                    [
                        'label' 	=> __( 'Skill Bar', 'agenxe' ),
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
                    ],
                ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'skill_title',
                [
                'label'         => __( 'Title', 'agenxe' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => __( 'Skill' , 'agenxe' ),
                'label_block'   => true,
                ]
        );

        $repeater->add_control(
            'skill_num',
                [
                'label'         => __( 'Number', 'agenxe' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => __( '90' , 'agenxe' ),
                'label_block'   => true,
                ]
        );

        $this->add_control(
            'skill_lists',
            [
                'label' 		=> __( 'Skill Lists', 'agenxe' ),
                'type' 			=> Controls_Manager::REPEATER,
                'fields' 		=> $repeater->get_controls(),
                'default' 		=> [
                        [
                            'skill_title' 		=> __( 'Title', 'agenxe' ),
                        ],
                ],
            ]
        );

        $this->end_controls_section();

    //---------------------------------------
        //Style Section Start
    //---------------------------------------

	//-------------------------General Style-----------------------//
    $this->start_controls_section(
        'general_section',
        [
            'label' => __( 'General Style', 'agenxe' ),
            'tab' 	=> Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_control(
        'general_color',
        [
            'label' 	=> __( 'Bar Color', 'agenxe' ),
            'type' 		=> Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .progress-bar' => '--theme-color: {{VALUE}}!important;',
            ],
        ]
    );

    $this->end_controls_section();

	//-------------------------Content Style-----------------------//
    $this->start_controls_section(
        'content_style_section',
        [
            'label' => __( 'Content Style', 'agenxe' ),
            'tab' 	=> Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_control(
        'content_color',
        [
            'label' 	=> __( 'Label Color', 'agenxe' ),
            'type' 		=> Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .th-title' => 'color: {{VALUE}}!important;',
            ],
        ]
    );

    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' 		=> 'content_typography',
            'label' 	=> __( 'Label Typography', 'agenxe' ),
            'selector' 	=> '{{WRAPPER}} .th-title',
        ]
    );

    $this->add_control(
        'content_color2',
        [
            'label' 	=> __( 'Number Color', 'agenxe' ),
            'type' 		=> Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .progress-value' => 'color: {{VALUE}}!important;',
            ],
        ]
    );

    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' 		=> 'content_typography2',
            'label' 	=> __( 'Number Typography', 'agenxe' ),
            'selector' 	=> '{{WRAPPER}} .progress-value',
        ]
    );

    $this->end_controls_section();


	}

	protected function render() {

    $settings = $this->get_settings_for_display();
    ?>

    <?php if( $settings['layout_style'] == '2' ): ?>

    <?php else: ?>
        <?php foreach( $settings['skill_lists'] as $data ): ?>
            <div class="skill-feature">
                <h5 class="skill-feature_title th-title"><?php echo esc_html($data['skill_title']) ?></h5>
                <div class="progress">
                    <div class="progress-bar" style="width: <?php echo esc_attr($data['skill_num']) ?>%;">
                    </div>
                    <div class="progress-value"><span class="counter-number"><?php echo esc_attr($data['skill_num']) ?></span> %</div>
                </div>
            </div>

        <?php endforeach; ?>

    <?php endif; 

	}

}