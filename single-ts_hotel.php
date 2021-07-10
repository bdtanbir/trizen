<?php
get_header();

while (have_posts()): the_post();
get_template_part('inc/breadcrumb-simple');


$hotel_gallery = get_post_meta(get_the_ID(), 'trizen_hotel_image_gallery', true);
$hotel_address = get_post_meta( get_the_ID(), 'address', true );
$hotel_video   = get_post_meta( get_the_ID(), 'trizen_hotel_video_url', true );

$breadcrumb_shape     = get_theme_mod('show_breadcrumb_overlay_shape', 1);
$hotel_video_btn_text = get_theme_mod('trizen_hotel_details_bdc_video_btn_txt', __('Video', 'trizen'));
$hotel_photo_btn_text = get_theme_mod('trizen_hotel_details_bdc_photo_btn_txt', __('More Photos', 'trizen'));

if($breadcrumb_shape == 1) {
	$breadcrumb_shape_show = '';
} else {
	$breadcrumb_shape_show = 'hide-before';
}

$post_id = get_the_ID();
$count_review                 = get_comment_count($post_id)['approved'];
$hotel_facilities             = get_categories( array ( 'taxonomy' => 'hotel_facilities' ) );
$trizen_hotel_features_data   = get_post_meta(get_the_ID(), 'trizen_hotel_features_data_group', true);
$trizen_hotel_faqs_data       = get_post_meta(get_the_ID(), 'trizen_hotel_faqs_data_group', true);
?>


	<!-- ================================
	    START BREADCRUMB AREA
	================================= -->
	<section class="breadcrumb-area hotel-details-breadcrumb py-0 <?php echo esc_attr($breadcrumb_shape_show); ?>">
		<div class="breadcrumb-wrap">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="breadcrumb-btn">
							<div class="btn-box">
                                <?php if(!empty($hotel_video_btn_text)) { ?>
                                    <a class="theme-btn hotel-video-btn" data-fancybox="video" data-src="<?php echo esc_attr($hotel_video); ?>"
                                       data-speed="700">
                                        <i class="la la-video-camera mr-2"></i><?php echo esc_html($hotel_video_btn_text); ?>
                                    </a>
                                <?php } if(!empty($hotel_photo_btn_text)) { ?>
                                    <a class="theme-btn hotel-gallery-btn" data-src="<?php the_post_thumbnail_url(); ?>"
                                       data-fancybox="gallery"
                                       data-caption="<?php esc_attr_e('Showing image - 1', 'trizen'); ?>"
                                       data-speed="700">
                                        <i class="la la-photo mr-2"></i><?php echo esc_html($hotel_photo_btn_text); ?>
                                    </a>
                                <?php } ?>
							</div>
							<?php
							$hidden = array();
							if( $images = get_posts( array(
								'post_type'      => 'attachment',
								'orderby'        => 'post__in',
								'order'          => 'ASC',
								'post__in'       => explode(',',get_post_meta(get_the_ID(), 'trizen_hotel_image_gallery', true)),
								'numberposts'    => -1,
								'post_mime_type' => 'image'
							) ) ) {

							    $count = 2;
								foreach( $images as $image ) {
									$hidden[]  = $image->ID;
									$image_src = wp_get_attachment_image_src( $image->ID, array( 80, 80 ) );
									$image_src = str_replace('-150x150', '', $image_src);
									$image_src = str_replace( '-100x100', '', $image_src );
									echo '<a class="d-none"
                                   data-fancybox="gallery"
                                   data-src="'.$image_src[0].'"
                                   data-caption="'.esc_attr__('Showing image - ', 'trizen').$count++.'"
                                   data-speed="700"></a>';
								}

							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- ================================
	    END BREADCRUMB AREA
	================================= -->

	<!-- ================================
	    START TOUR DETAIL AREA
	================================= -->
	<section class="tour-detail-area padding-bottom-90px">
		<div class="single-content-navbar-wrap menu section-bg" id="single-content-navbar">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="single-content-nav" id="single-content-nav">
							<ul>
								<li>
                                    <a data-scroll="description" href="#description" class="scroll-link active">
                                        <?php esc_html_e('Hotel Details', 'trizen'); ?>
                                    </a>
                                </li>
								<li>
                                    <a data-scroll="availability" href="#availability" class="scroll-link">
                                        <?php esc_html_e('Availability', 'trizen'); ?>
                                    </a>
                                </li>
                                <?php if($hotel_facilities) { ?>
                                    <li>
                                        <a data-scroll="amenities" href="#amenities" class="scroll-link">
                                            <?php esc_html_e('Amenities', 'trizen'); ?>
                                        </a>
                                    </li>
                                <?php } if(!empty($trizen_hotel_faqs_data)) { ?>
                                    <li>
                                        <a data-scroll="faq" href="#faq" class="scroll-link">
                                            <?php esc_html_e('Faq', 'trizen'); ?>
                                        </a>
                                    </li>
                                <?php }

                                if(comments_open($post_id) && get_option('hotel_review') == 'on') {
                                ?>
                                    <li>
                                        <a data-scroll="reviews" href="#reviews" class="scroll-link">
                                            <?php esc_html_e('Reviews', 'trizen'); ?>
                                        </a>
                                    </li>
                                <?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!-- end single-content-navbar-wrap -->
		<div class="single-content-box">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<div class="single-content-wrap padding-top-60px">
							<div id="description" class="page-scroll">
								<div class="single-content-item pb-4">
                                    <?php if(!empty(get_the_title())) { ?>
                                        <h3 class="title font-size-26">
                                            <?php the_title(); ?>
                                        </h3>
                                    <?php } ?>
									<div class="d-flex align-items-center pt-2">
                                        <?php if(!empty($hotel_address)) { ?>
                                            <p class="mr-2 mb-0"><?php echo esc_html($hotel_address); ?></p>
                                        <?php }

                                        $avg = TSReview::get_avg_rate();
                                        ?>
										<p class="mb-0">
											<span class="badge badge-warning text-white font-size-16">
                                                <?php echo esc_html($avg); ?>
                                            </span>
											<span><?php comments_number(__('(0 review)', 'trizen'), __('(1 review)', 'trizen'), __('(% reviews)', 'trizen')); ?></span>
										</p>
									</div>
								</div>
                                <?php if($trizen_hotel_features_data) {
                                    get_template_part('template-parts/hotel/hotel-features');
                                } ?>
								<div class="section-block"></div>
								<div class="single-content-item padding-top-40px padding-bottom-40px">
                                    <?php if(!empty(get_the_title())) { ?>
                                        <h3 class="title font-size-20 mb-3">
                                            <?php esc_html_e('About ', 'trizen'); the_title(); ?>
                                        </h3>
                                    <?php }

                                    the_content();
                                    ?>
								</div>
								<div class="section-block"></div>
							</div>
							<div id="availability" class="page-scroll">
								<div class="single-content-item padding-top-40px padding-bottom-30px">
									<h3 class="title font-size-20"><?php esc_html_e('Available Rooms', 'trizen'); ?></h3>
                                    <div class="ts-list-rooms relative" data-toggle-section="ts-list-rooms">
                                        <div class="loader-wrapper">
                                            <div class="loader">
                                                <svg class="spinner" viewBox="0 0 50 50">
                                                    <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="fetch">
                                            <?php
                                            global $post;
                                            $query = search_room();
                                            while ($query->have_posts()) {
                                                $query->the_post();
                                                get_template_part('template-parts/room/available-room');
                                            }
                                            wp_reset_postdata();
                                            ?>
                                        </div>
                                    </div>
								</div>
								<div class="section-block"></div>
							</div>
                            <?php if($hotel_facilities) {
                                get_template_part('template-parts/hotel/hotel-amenities');
                            }

                            if( !empty( $trizen_hotel_faqs_data ) ) {
                                get_template_part( 'template-parts/hotel/hotel-faqs' );
                            }
                            ?>

							<div id="reviews" class="page-scroll">
								<div class="single-content-item padding-top-40px padding-bottom-40px">
									<h3 class="title font-size-20"><?php esc_html_e('Reviews', 'trizen'); ?></h3>
									<div class="review-container padding-top-30px">
										<div class="row align-items-center">
											<div class="col-lg-4">
												<div class="review-summary">
													<h2><?php echo esc_html($avg); ?><span><?php esc_html_e('/5', 'trizen'); ?></span></h2>
													<p><?php echo TSReview::get_rate_review_text($avg, $count_review); ?></p>
													<span><?php esc_html_e('Based on ', 'trizen'); comments_number(__('0 Review', 'trizen'), __('1 Review', 'trizen'), __('% Reviews', 'trizen')); ?></span>
												</div>
											</div>
											<div class="col-lg-8">
												<div class="review-bars">
													<div class="row">
                                                        <?php
                                                        $stars = TSReview::get_review_summary();
                                                            $i = 1;
                                                            foreach ($stars as $star) {
                                                                ?>
                                                                <div class="col-lg-6">
                                                                    <div class="progress-item">
                                                                        <h3 class="progressbar-title"><?php echo esc_html($star['name']); ?></h3>
                                                                        <div class="progressbar-content line-height-20 d-flex align-items-center justify-content-between">
                                                                            <div class="progressbar-box flex-shrink-0">
                                                                                <div class="progressbar-line" data-percent="<?php echo esc_attr($star['percent']); ?>%">
                                                                                    <div class="progressbar-line-item bar-bg-<?php echo $i++; ?>"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="bar-percent"><?php echo esc_html($star['summary']) ?></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php }
                                                        ?>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="section-block"></div>
							</div>
                            <?php if(comments_open($post_id)) { ?>
                                <div class="review-box">
                                    <div class="single-content-item padding-top-40px">
                                        <?php
                                        $comments_count   = wp_count_comments(get_the_ID());
                                        $total            = (int)$comments_count->approved;
                                        $comment_per_page = (int)get_option('comments_per_page', 10);
                                        $paged            = (int)get('comment_page', 1);
                                        $from             = $comment_per_page * ($paged - 1) + 1;
                                        $to               = ($paged * $comment_per_page < $total) ? ($paged * $comment_per_page) : $total;
                                        ?>
                                        <h3 class="title font-size-20"><?php echo sprintf(__('Showing %s reviews', 'trizen'), $to); ?></h3>
                                        <div class="comments-list padding-top-50px">
                                            <?php
                                            $offset = ($paged - 1) * $comment_per_page;
                                            $args = [
                                                'number'  => $comment_per_page,
                                                'offset'  => $offset,
                                                'post_id' => get_the_ID(),
                                                'status'  => ['approve']
                                            ];
                                            $comments_query = new WP_Comment_Query;
                                            $comments       = $comments_query->query($args);

                                            if ($comments):
                                                foreach ($comments as $key => $comment):
                                                    $args[ 'avatar_size' ] = 90;
                                                    if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) :
                                                    else :
                                                        $comment_class = empty( $args[ 'has_children' ] ) ? '' : $comment_class .= 'parent';
                                                        if ( !$comment->comment_approved ) {
                                                            return;
                                                        }

                                                        $comment_id   = $comment->comment_ID;
                                                        $user_id      = get_comment( $comment_id )->user_id;
                                                        $user_email   = get_comment( $comment_id )->comment_author_email;
                                                        $current_user = wp_get_current_user();
                                                        ?>
                                                        <div class="comment">
                                                            <div class="comment-avatar">
                                                                <?php echo ts_get_profile_avatar( $user_id, 90 ) ?>
                                                            </div>
                                                            <div class="comment-body">
                                                                <div class="meta-data">
                                                                    <?php
                                                                    $stars        = TSReview::get_review_stars( get_the_ID() );
                                                                    $comment_rate = (float)get_comment_meta( $comment_id, 'comment_rate', true );

                                                                    if(!empty($user_id)){ ?>
                                                                        <h3 class="comment__author"><?php echo TravelHelper::get_username( $user_id ); ?></h3>
                                                                        <?php
                                                                    } else { ?>
                                                                        <h3 class="comment__author"><?php echo esc_html($comment->comment_author); ?></h3>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                    <div class="meta-data-inner d-flex">
                                                                        <?php if( $stars ) { ?>
                                                                            <span class="ratings d-flex align-items-center mr-1">
                                                                                <?php
                                                                                    echo number_format( $comment_rate, 1, '.', ',' );
                                                                                ?>
                                                                            </span>
                                                                        <?php } ?>
                                                                        <p class="comment__date">
                                                                            <?php echo get_comment_date( getDateFormat(), $comment_id ) ?>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <p class="comment-content">
                                                                    <?php
                                                                    $content = get_comment_text( $comment_id );

                                                                    echo esc_html(balanceTags($content)); ?>
                                                                </p>
                                                                <div class="reviews-reaction">
                                                                    <?php
                                                                    $count_like = (int)get_comment_meta( $comment_id, '_comment_like_count', true );

                                                                    $review_obj = new TSReview();
                                                                    if ( $review_obj->check_like( $comment_id ) ):
                                                                        ?>
                                                                        <a data-id="<?php echo esc_attr( $comment_id ); ?>" class="btn-like comment-dislike ts-like-review" href="#" title="<?php esc_attr_e('Dislike This', 'trizen'); ?>" data-toggle="tooltip" data-placement="top">
                                                                            <i class="la la-thumbs-o-up"></i> <?php echo '<span class="like-count">' . esc_html($count_like) . '</span>'; ?>
                                                                        </a>
                                                                    <?php else: ?>
                                                                        <a data-id="<?php echo esc_attr( $comment_id ); ?>" href="#" class="btn-like comment-like ts-like-review " title="<?php esc_attr_e('Like This', 'trizen'); ?>" data-toggle="tooltip" data-placement="top">
                                                                            <i class="la la-thumbs-o-up"></i> <?php echo '<span class="like-count">' . esc_html($count_like) . '</span>'; ?>
                                                                        </a>
                                                                    <?php
                                                                    endif;
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    endif;
                                                endforeach;
                                            endif;
                                            ?>
                                        </div>
                                        <?php
                                            TravelHelper::comment_form();
                                        ?>
                                    </div>
                                </div>
                            <?php } ?>
						</div>
					</div>
					<div class="col-lg-4">
                        <?php get_sidebar('ts_hotel'); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- ================================
	    END TOUR DETAIL AREA
	================================= -->

<?php

share_hotel_room_tour_etc(get_the_title(), get_the_permalink(), 'Hotel');
get_template_part('template-parts/hotel/hotel-related-items');
endwhile;

get_template_part('template-parts/footer/static-cta');

get_footer();
