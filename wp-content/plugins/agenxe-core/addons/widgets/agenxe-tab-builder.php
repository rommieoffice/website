<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Group_Control_Border;
/**
 *
 * Tab Builder Widget .
 *
 */
class agenxe_Tab_Builder extends Widget_Base {

	public function get_name() {
		return 'agenxetabbuilder';
	}
	public function get_title() {
		return __( 'Tab Builder', 'agenxe' );
	}
	public function get_icon() {
		return 'th-icon';
    }
    public function get_categories() {
		return [ 'agenxe' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'tab_builder_section',
			[
				'label' 	=> __( 'Tab Builder', 'agenxe' ),
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
			'tab_builder_text',
			[
				'label' 	=> __( 'Tab Builder Title', 'agenxe' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		 => '2',			]
        );

		$repeater->add_control(
			'agenxe_tab_builder_option',
			[
				'label'     => __( 'Tab Name', 'agenxe' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => $this->agenxe_tab_builder_choose_option(),
				'default'	=> ''
			]
		);

		$this->add_control(
			'tab_builder_repeater',
			[
				'label' 		=> __( 'Tab', 'agenxe' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'tab_builder_text'    => __( 'Air Freight', 'agenxe' ),
					],
					[
						'tab_builder_text'    => __( 'Road Freight', 'agenxe' ),
					],
					
				],
				'title_field' 	=> '{{{ tab_builder_text }}}',
			]
		);

        $this->end_controls_section();

        //---------------------------------------
			//Style Section Start
		//---------------------------------------


    }

	public function agenxe_tab_builder_choose_option(){

		$agenxe_post_query = new WP_Query( array(
			'post_type'				=> 'agenxe_tab_builder',
			'posts_per_page'	    => -1,
		) );

		$agenxe_tab_builder_title = array();
		$agenxe_tab_builder_title[''] = __( 'Select a Tab','Foodelio');

		while( $agenxe_post_query->have_posts() ) {
			$agenxe_post_query->the_post();
			$agenxe_tab_builder_title[ get_the_ID() ] =  get_the_title();
		}
		wp_reset_postdata();

		return $agenxe_tab_builder_title;

	}

	protected function render() {

        $settings = $this->get_settings_for_display();
	?>
	 	<?php if( $settings['layout_style'] == '2' ): ?>

		<?php else: ?>
			<div class="nav nav-tabs faq-tabs" id="nav-tab" role="tablist">
				<?php 
					$x = 0;
					foreach( $settings['tab_builder_repeater'] as $single_menu ): 
					$x++;
					$active = $x == '1' ? 'active':'';
				?>
				<button class="nav-link  <?php echo $active; ?>" id="nav-step<?php echo $x; ?>-tab" data-bs-toggle="tab" data-bs-target="#nav-step<?php echo $x; ?>" type="button"><?php echo esc_html( $single_menu['tab_builder_text'] ); ?></button>
				<?php endforeach; ?>
			</div>
			<div class="tab-content" id="nav-tabContent">
				<?php 
					$x = 0;
					foreach( $settings['tab_builder_repeater'] as $single_menu ): 
					$x++;
					$active = $x == '1' ? 'active show':'';
				?>
				<div class="tab-pane fade <?php echo $active; ?>" id="nav-step<?php echo $x; ?>" role="tabpanel">
					<?php $elementor = \Elementor\Plugin::instance();
					if( ! empty( $single_menu['agenxe_tab_builder_option'] ) ){
						echo $elementor->frontend->get_builder_content_for_display( $single_menu['agenxe_tab_builder_option'] );
					} ?>
				</div>
				<?php endforeach; ?>
			</div>

		<?php endif;
      
	}
}