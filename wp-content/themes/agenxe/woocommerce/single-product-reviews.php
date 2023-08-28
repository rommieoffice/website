<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 4.3.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! comments_open() ) {
	return;
}

?>
<div class="woocommerce-Reviews">
	<div class="th-comment-area list-style-none th-comments-wrap" id="comments">
			<?php
			$count = $product->get_review_count();
			if ( $count && wc_review_ratings_enabled() ) {
				/* translators: 1: reviews count 2: product name */
				$reviews_title = sprintf( esc_html( _n( '%1$s review for %2$s', '%1$s reviews for %2$s', $count, 'agenxe' ) ), esc_html( $count ), '<span>' . get_the_title() . '</span>' );
				echo apply_filters( 'woocommerce_reviews_title', $reviews_title, $count, $product ); // WPCS: XSS ok.
			} else {
				echo '<h3 class="woocommerce-Reviews-title">';
				esc_html_e( 'Reviews', 'agenxe' );
				echo '</h3>';
			}
			?>

		<?php if ( have_comments() ) : ?>
			<ul class="comment-list">
				<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
			</ul>

			<?php
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
				echo '<nav class="woocommerce-pagination">';
				paginate_comments_links(
					apply_filters(
						'woocommerce_comment_pagination_args',
						array(
							'prev_text' => '&larr;',
							'next_text' => '&rarr;',
							'type'      => 'list',
						)
					)
				);
				echo '</nav>';
			endif;
			?>
		<?php else : ?>
			<p class="woocommerce-noreviews"><?php esc_html_e( 'There are no reviews yet.', 'agenxe' ); ?></p>
		<?php endif; ?>
	</div>

	<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) : ?>
		<div class="th-comment-form">
			<div class="review-form" id="review_form">
				<?php
                $commenter    = wp_get_current_commenter();
                $consent = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';
                $aria_req = ( $req ? "required='required'" : '' );
				$comment_form = array(
					/* translators: %s is product title */
					'title_reply'         => have_comments() ? esc_html__( 'Add a review', 'agenxe' ) : sprintf( esc_html__( 'Be the first to review &ldquo;%s&rdquo;', 'agenxe' ), get_the_title() ),
					/* translators: %s is product title */
					'title_reply_to'      => esc_html__( 'Leave a Reply to %s', 'agenxe' ),
					'title_reply_before'  => '<div class="form-title"><h3 class="blog-inner-title">',
					'title_reply_after'   => '</h3></div>',
					'comment_notes_after' => '',
                    'class_submit'          => 'th-btn',
                    'submit_field'          => '<div class="row"><div class="col-12">%1$s %2$s</div></div>',
    	            'submit_button'         => '<button type="submit" name="%1$s" id="%2$s" class="%3$s">'.esc_html__('Post Review','agenxe').'</button>',
					'logged_in_as'        => '',
					'comment_field'       => '',
				);

				$name_email_required = (bool) get_option( 'require_name_email', 1 );

                $comment_form['fields'] = array();

                $comment_form['fields']['author'] = '<div class="row"><div class="col-md-6 form-group"><input class="form-control style2" type="text" name="author" placeholder="'. esc_attr__( 'Your Name', 'agenxe' ) .'" value="'. esc_attr( $commenter['comment_author'] ).'" '.esc_attr( $aria_req ).'><i class="text-title far fa-user"></i></div>';
                $comment_form['fields']['email'] = '<div class="col-md-6 form-group"><input class="form-control style2" type="email" name="email"  value="' . esc_attr(  $commenter['comment_author_email'] ) .'" placeholder="'. esc_attr__( 'Your E-mail', 'agenxe' ) .'" '.esc_attr( $aria_req ).'><i class="text-title far fa-envelope"></i></div></div>';

				$account_page_url = wc_get_page_permalink( 'myaccount' );
				if ( $account_page_url ) {
					/* translators: %s opening and closing link tags respectively */
					$comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf( esc_html__( 'You must be %1$slogged in%2$s to post a review.', 'agenxe' ), '<a href="' . esc_url( $account_page_url ) . '">', '</a>' ) . '</p>';
				}
				if ( wc_review_ratings_enabled() && !is_user_logged_in() ) {
					$comment_form['comment_field'] = '<div class="form-group rating-select d-flex align-items-center  mb-20"><label for="rating">' . esc_html__( 'Your Rating', 'agenxe' ) . '</label><select name="rating" id="rating" required>
						<option value="">' . esc_html__( 'Rate&hellip;', 'agenxe' ) . '</option>
						<option value="5">' . esc_html__( 'Perfect', 'agenxe' ) . '</option>
						<option value="4">' . esc_html__( 'Good', 'agenxe' ) . '</option>
						<option value="3">' . esc_html__( 'Average', 'agenxe' ) . '</option>
						<option value="2">' . esc_html__( 'Not that bad', 'agenxe' ) . '</option>
						<option value="1">' . esc_html__( 'Very poor', 'agenxe' ) . '</option>
					</select></div>';

				}
				if ( wc_review_ratings_enabled() && is_user_logged_in() ) {
					$comment_form['comment_field'] = '<div class="form-group rating-select d-flex align-items-center  mb-20"><label for="rating">' . esc_html__( 'Your Rating', 'agenxe' ) . '</label><select name="rating" id="rating" required>
                    <option value="">' . esc_html__( 'Rate&hellip;', 'agenxe' ) . '</option>
                    <option value="5">' . esc_html__( 'Perfect', 'agenxe' ) . '</option>
                    <option value="4">' . esc_html__( 'Good', 'agenxe' ) . '</option>
                    <option value="3">' . esc_html__( 'Average', 'agenxe' ) . '</option>
                    <option value="2">' . esc_html__( 'Not that bad', 'agenxe' ) . '</option>
                    <option value="1">' . esc_html__( 'Very poor', 'agenxe' ) . '</option>
                </select></div>';
				}

				$comment_form['comment_field'] .= '<div class="row"><div class="col-12 form-group"><textarea placeholder="'.esc_attr__('Write a Message','agenxe').'" class="form-control style2" id="comment" rows="8" cols="5" name="comment" required></textarea><i class="text-title far fa-pencil-alt"></i></div></div>';
                $comment_form['fields']['cookies']    = '<div class="row"><div class="col-12"><div class="custom-checkbox mb-20"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . esc_attr( $consent ) . ' /><label for="wp-comment-cookies-consent">' . esc_html__( 'Save my name, email, and website in this browser for the next time I comment.','agenxe' ) . '<span class="checkmark"></span></label></div></div></div>';
				comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
				?>
			</div>
		</div>
	<?php else : ?>
		<p class="woocommerce-verification-required"><?php esc_html_e( 'Only logged in customers who have purchased this product may leave a review.', 'agenxe' ); ?></p>
	<?php endif; ?>

	<div class="clear"></div>
</div>