<?php
/**
* @version  1.0
* @package  agenxe
* @author   Themeholy <themeholy@gmail.com>
*
* Websites: https://themeholy.com/
*
*/

/**************************************
* Creating About Us Widget
***************************************/

class agenxe_aboutus_widget extends WP_Widget {

        function __construct() {

            parent::__construct(
                // Base ID of your widget
                'agenxe_aboutus_widget',

                // Widget name will appear in UI
                esc_html__( 'Agenxe :: About Us Widget', 'agenxe' ),

                // Widget description
                array(
                    'customize_selective_refresh'   => true,
                    'description'                   => esc_html__( 'Add About Us Widget', 'agenxe' ),
                    'classname'                     => 'no-class',
                )
            );

        }

        // This is where the action happens
        public function widget( $args, $instance ) {

            $title   = apply_filters( 'widget_title', $instance['title'] );
            $about_us   = apply_filters( 'widget_about_us', $instance['about_us'] );
            $social_icon      = isset( $instance['social_icon'] ) ? $instance['social_icon'] : false;
            if ( isset( $instance[ 'aboutus_img_url' ] ) ) {
                $aboutus_img_url = $instance[ 'aboutus_img_url' ];
            }else {
                $aboutus_img_url = '#';
            }


            //before and after widget arguments are defined by themes
            echo $args['before_widget'];

                echo '<div class="th-widget-about">';
                    echo '<h3 class="widget_title">'.esc_html($title).'</h3>';
                    echo '<p class="about-text">'.wp_kses_post( $about_us ).'</p>';
                    if($social_icon){
                        echo '<div class="th-social style-border">';
                            echo agenxe_social_icon();
                        echo '</div>';
                    }
                echo '</div>';

            echo $args['after_widget'];
        }

        // Widget Backend
        public function form( $instance ) {

            //Title
            if ( isset( $instance[ 'title' ] ) ) {
                $title = $instance[ 'title' ];
            }else {
                $title = '';
            }
            
            if ( isset( $instance[ 'about_us' ] ) ) {
                $about_us = $instance[ 'about_us' ];
            }else {
                $about_us = '';
            }

            //Social text
            if ( isset( $instance[ 'social_text' ] ) ) {
                $social_text = $instance[ 'social_text' ];
            }else {
                $social_text = '';
            }

            $social_icon = isset( $instance['social_icon'] ) ? (bool) $instance['social_icon'] : false;
            
            // Widget admin form
            ?>
            
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>">
                    <?php
                        _e( 'Title:' ,'agenxe');
                    ?>
                </label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" placeholder="<?php echo esc_attr__('About Us', 'agenxe'); ?>" value="<?php echo esc_attr( $title ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'about_us' ); ?>">
                    <?php
                        _e( 'About Us:' ,'agenxe');
                    ?>
                </label>
                <textarea class="widefat" id="<?php echo $this->get_field_id( 'about_us' ); ?>" name="<?php echo $this->get_field_name( 'about_us' ); ?>" rows="8" cols="80"><?php echo esc_html( $about_us ); ?></textarea>
            </p>

            <p>
                <input class="checkbox" type="checkbox"<?php checked( $social_icon ); ?> id="<?php echo $this->get_field_id( 'social_icon' ); ?>" name="<?php echo $this->get_field_name( 'social_icon' ); ?>" />
                <label for="<?php echo $this->get_field_id( 'social_icon' ); ?>"><?php _e( 'Display Social Icon?' ); ?></label>
            </p>

            <?php
        }


         // Updating widget replacing old instances with new
         public function update( $new_instance, $old_instance ) {

            $instance = array();
            $instance['title']        = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
            $instance['about_us']           = ( ! empty( $new_instance['about_us'] ) ) ? strip_tags( $new_instance['about_us'] ) : '';
            $instance['social_text']           = ( ! empty( $new_instance['social_text'] ) ) ? strip_tags( $new_instance['social_text'] ) : '';
            $instance['social_icon']      = isset( $new_instance['social_icon'] ) ? (bool) $new_instance['social_icon'] : false;
            return $instance;
        }
    } // Class agenxe_aboutus_widget ends here


    // Register and load the widget
    function agenxe_aboutus_load_widget() {
        register_widget( 'agenxe_aboutus_widget' );
    }
    add_action( 'widgets_init', 'agenxe_aboutus_load_widget' );