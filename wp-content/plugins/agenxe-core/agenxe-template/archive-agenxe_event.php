<?php 

    // Block direct access
    if( ! defined( 'ABSPATH' ) ){
        exit();
    }

    // header
    get_header();
?>
 <div class="event-area space-top">
        <div class="container space-extra-bottom">
            <div class="row gy-4">
                <?php 
                     $args = array(
                        'post_type'         => 'agenxe_event',
                        'posts_per_page'    => 6,
                        'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
                    );

                    $event_query = new WP_Query( $args );
                    $x = 0;
                     while($event_query->have_posts()): 
                     $event_query->the_post();
                     $x++;

                    $start_date       = agenxe_meta( 'event_schedule_start' );
                    $end_date       = agenxe_meta( 'event_schedule_end' );
                    $time       = agenxe_meta( 'event_time' );
                    $location   = agenxe_meta( 'event_laction' );
                    $iframe   = agenxe_meta( 'event_iframe' );

                    
                ?>
                <div class="col-lg-4 col-md-6">
                    <div class="event-card">
                        <?php if(has_post_thumbnail()): ?>
                        <div class="thumb">
                            <?php the_post_thumbnail( 'agenxe_356X276' ); ?>
                        </div>
                        <?php endif; ?>
                        <div class="details">
                            <h4 class="event-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h4>
                            <div class="meta">
                                <span><i class="fa-regular fa-clock"></i><?php echo esc_html( $start_date .' '.$end_date. ' ' . $time); ?></span>
                                 <a class='popup-video' href='<?php echo $iframe ?>'>
                                    <i class="fa-regular fa-location-dot"></i> <?php echo esc_html( $location ); ?>
                                </a>
                            </div>
                            <a class="read-more-btn" href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html__('More Details', 'agenxe'); ?> <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
 
                <?php endwhile;  ?>

                       <div class="as-pagination text-center pt-20">
                        <?php
                        $big = 999999999; // need an unlikely integer
                        $arg = array(
                            'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                            'format' => '?paged=%#%',
                            'current' => max( 1, get_query_var('paged') ),
                            'total' => $event_query->max_num_pages,
                            'prev_text'    => '<i class="fa fa-chevron-left"></i>',
                            'next_text'    => '<i class="fa fa-chevron-right"></i>',
                            'type' => 'list',
                        );

                            $return = paginate_links( $arg );
                       
                        echo str_replace( '<span aria-current="page" class="page-numbers current">', '<span aria-current="page" class="page-numbers active">', $return );
                        ?>
                </div><!-- /.pagination -->
                                        
                <?php wp_reset_postdata();  ?>

            </div>
        </div>
    </div>


<?php

    get_footer();