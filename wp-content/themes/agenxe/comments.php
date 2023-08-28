<?php
/**
 * @Packge     : Agenxe
 * @Version    : 1.0
 * @Author     : Themeholy
 * @Author URI : https://themeforest.net/user/themeholy
 *
 */

    // Block direct access
    if( ! defined( 'ABSPATH' ) ){
        exit();
    }

    if ( post_password_required() ) {
        return;
    }


    if( have_comments() ) :
?>
<!-- Comments -->
<div class="th-comments-wrap">
    <h2 class="blog-inner-title h4">
        <?php printf( _nx( 'Comment (1)', 'Comments (%1$s)', get_comments_number(), 'comments title', 'agenxe' ), number_format_i18n( get_comments_number() ) ); ?><span class="shape"></span>
    </h2>
    <ul class="comment-list">
        <?php
            the_comments_navigation();
                wp_list_comments( array(
                    'style'       => 'ul',
                    'short_ping'  => true,
                    'avatar_size' => 100,
                    'callback'    => 'agenxe_comment_callback'
                ) );
            the_comments_navigation();
        ?>
    </ul>
</div>

<!-- End of Comments -->
<?php
    endif;
?>
<?php 
add_filter( 'comment_form_fields', 'move_comment_field' );
function move_comment_field( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}
?>

<?php
    $commenter = wp_get_current_commenter();
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? "required" : '' );
    $consent = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';
    $fields =  array(
      'author'  => '<div class="row"><div class="col-md-6 form-group"><input class="form-control" type="text" name="author" placeholder="'. esc_attr__( 'Full Name', 'agenxe' ) .'" value="'. esc_attr( $commenter['comment_author'] ).'" '.esc_attr( $aria_req ).'><i class="fal fa-user"></i></div>',
      'email'   => '<div class="col-md-6 form-group"><input class="form-control" type="email" name="email"  value="' . esc_attr(  $commenter['comment_author_email'] ) .'" placeholder="'. esc_attr__( 'Email Address', 'agenxe' ) .'" '.esc_attr( $aria_req ).'><i class="fal fa-envelope"></i></div></div>',
      'url'     => '<div class="row"><div class="col-12 form-group"><input type="text" placeholder="'. esc_attr__( 'Website', 'agenxe' ) .'" value="'. esc_attr( $commenter['comment_author_url'] ).'" class="form-control"> <i class="fal fa-globe"></i></div></div>',

      'cookies' => '',
    
    );

    $args = array(
        'fields'                => $fields,
        'comment_field'   =>'<div class="row"><div class="col-md-12 form-group"><textarea rows="10" class="form-control" name="comment" placeholder="'. esc_attr__( 'Comment', 'agenxe' ) .'" '.esc_attr( $aria_req ).'></textarea><i class="far fa-pencil-alt"></i></div></div>',
        'class_form'            => 'comment-form',
        'title_reply'           => esc_html__( 'Post Comment', 'agenxe' ),
        'title_reply_before'    => '<div class=""><h3 class="blog-inner-title h4">',
        'title_reply_after'     => '</h3></div>',
        'comment_notes_before'  => '<p class="form-text">'.esc_html__('Your email address will not be published. Required fields are marked *','agenxe').'</p>',
        'logged_in_as'          => '<p class="form-text">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>','agenxe' ), admin_url( 'profile.php' ), esc_attr( $user_identity ), wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
        'class_submit'          => 'th-btn',
        'submit_field'          => '<div class="col-12 form-group mb-0">%1$s %2$s</div>',
        'submit_button'         => '<button type="submit" name="%1$s" id="%2$s" class="%3$s">'.esc_html__('Post Comment','agenxe').'<i class="fas fa-arrow-up-right ms-2"></i></button>',
        
       
    );

    if(  comments_open() ) {
        echo '<!-- Comment Form -->';
        echo '<div id="comments" class="th-comment-form">';
            comment_form( $args );
        echo '</div>';
        echo '<!-- End of Comment Form -->';
    }