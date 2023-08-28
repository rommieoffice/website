<?php 

// Block direct access
if( ! defined( 'ABSPATH' ) ){
    exit();
}

// header
get_header();
?>

<section class="event-section space-top">
    <div class="container">
        <div class="event-details space-bottom">
            <?php while( have_posts( ) ) :
                the_post();
                 $time       = agenxe_meta( 'event_time' );
                 $gallery       = agenxe_meta( 'event_gallery' );
                 $event_info       = agenxe_meta( 'event_details' );
                 $iframe   = agenxe_meta( 'event_iframe' );
                 $link1   = agenxe_meta( 'event_calendar_link' );
                 $link2   = agenxe_meta( 'event_calendar_link2' );
            ?>
            <?php if(!empty( $gallery)): ?>
            <div class="row event-img-slider as-carousel" id="eventimgslide">
                <?php foreach($gallery as $item): ?>
                <div class="col-12 img-box">
                    <img src="<?php echo esc_url($item); ?>" alt="event 3">
                </div>
                <?php endforeach; ?>
               
            </div>
            <?php else: ?>
                <div class="row event-img-slider">
                     <div class="col-12 img-box">
                        <?php the_post_thumbnail(); ?>
                     </div>
                </div>
            <?php endif; ?>
            
            <div class="row mb-35 gy-4">
                <div class="col-lg-7">
                    <div class="event-title-box">
                        <div class="date">
                            <span class="day"><?php echo get_the_date('d'); ?></span> 
                            <span class="month"><?php echo get_the_date('M'); ?></span>
                        </div>
                        <div class="title-info">
                            <h2 class="h2 event-title"><?php the_title(); ?></h2>
                            <ul class="event-info">
                                <li><i class="fal fa-clock"></i><?php echo esc_html($time) ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 align-self-center">
                    <div class="btn-group justify-content-lg-end">
                        <a target="_blank" href="<?php echo esc_attr($link1) ?>" class="as-btn wave-btn"><?php echo esc_html__('Save On Calendar', 'agenxe'); ?></a>
                        <a target="_blank" href="<?php echo esc_attr($link2) ?>" class="as-btn wave-btn"><?php echo esc_html__('Ical Export', 'agenxe'); ?></a>
                    </div>
                </div>
            </div>
            
            <div class="mb-30">
                <?php the_content(); ?>
            </div>
            
            <div class="row gy-30">
                <div class="col-lg-7">
                    <h3><?php echo esc_html__('Event Details', 'agenxe'); ?></h3>
                    <?php if(!empty( $event_info)): ?>
                    <div class="checklist">
                        <ul>
                        <?php foreach($event_info as $item): ?>
                            <li><?php echo wp_kses_post($item['event_details_icon'] . $item['event_details_content']); ?></li>
                        <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>                    
                </div>            
                <?php if(!empty($iframe)): ?>        
                <div class="col-lg-5 align-self-center">
                    <div class="event-location map-sec">
                        <iframe src=" <?php echo $iframe; ?>"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                      
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <?php endwhile;
            wp_reset_postdata(); ?>
        </div>

        <div class="event-nav">
            <?php 
            $prev_post = get_previous_post();
            $next_post = get_next_post(); 
            ?>
            <?php if($prev_post): 
                 $prev_title = strip_tags(str_replace('"', '', $prev_post->post_title));
            ?>
            <a href="<?php echo get_permalink($prev_post->ID); ?>" class="nav-btn">
                <i class="far fa-long-arrow-left"></i> <span><?php echo  $prev_title; ?></span>
            </a> 
             <?php endif; ?>
            <?php if($next_post): 
                 $next_title = strip_tags(str_replace('"', '', $next_post->post_title));
            ?>
            <a href="<?php echo get_permalink($next_post->ID); ?>" class="nav-btn"><span><?php echo  $next_title; ?> </span>
                <i class="far fa-long-arrow-right"></i>
            </a>
            <?php endif; ?>
        </div>

    </div>
</section>

<?php
get_footer();