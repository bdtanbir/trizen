<?php
    $section_title = get_theme_mod('trizen_hotel_related_items_sec_title');
    $hotel_ids     = explode(',', get_theme_mod('trizen_hotel_related_items_ids'));
    if(!empty(get_theme_mod('trizen_hotel_related_items_ids'))) {
        $args = array(
            'post_type' => 'ts_hotel',
            'post__in' => $hotel_ids
        );
    } else {
        $args = array(
            'post_type' => 'ts_hotel',
        );
    }
    $item_query = new WP_Query($args);

    if($item_query->have_posts()) {
?>

<div class="section-block"></div>

<section class="related-tour-area related-hotel-wrap section--padding">
	<div class="container">

        <?php if(!empty($section_title)) { ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading text-center">
                        <h2 class="sec__title"><?php echo esc_html($section_title); ?></h2>
                    </div>
                </div>
            </div>
        <?php } ?>

		<div class="row padding-top-50px">

            <?php while ($item_query->have_posts()) { $item_query->the_post();
                $hotel_badge_title = get_post_meta(get_the_ID(), 'trizen_hotel_badge_title', true);
                $hotel_address     = get_post_meta(get_the_ID(), 'trizen_hotel_address_title', true);
                $review_rate       = TSReview::get_avg_rate();
                $price             = get_price();
            ?>
                <div class="col-lg-4 responsive-column">
                    <div class="card-item">
                        <?php if(get_the_post_thumbnail()) { ?>
                            <div class="card-img">
                                <a href="<?php the_permalink(); ?>" class="d-block">
                                    <?php the_post_thumbnail(); ?>
                                </a>
                                <?php if(!empty($hotel_badge_title)) { ?>
                                    <span class="badge"><?php echo esc_html($hotel_badge_title); ?></span>
                                <?php } ?>
                                <div class="add-to-wishlist icon-element" data-toggle="tooltip" data-placement="top" title="<?php esc_attr_e('Bookmark', 'trizen'); ?>">
                                    <i class="la la-heart-o"></i>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="card-body">
                            <?php
                            if(empty(get_the_post_thumbnail())) {
                                if(!empty($hotel_badge_title)) { ?>
                                    <span class="badge"><?php echo esc_html($hotel_badge_title); ?></span>
                            <?php }
                            }
                            if(get_the_title()) { ?>
                                <h3 class="card-title">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                            <?php } if(!empty($hotel_address)) { ?>
                                <p class="card-meta"><?php echo esc_html($hotel_address); ?></p>
                            <?php } ?>
                            <div class="card-rating">
                                <span class="badge text-white"><?php echo esc_html($review_rate); ?></span>
                                <span class="review__text"><?php esc_html_e('Average', 'trizen'); ?></span>
                                <span class="rating__text"><?php comments_number(__('(0 Review)', 'trizen'), __('(1 Review)', 'trizen'), __('(% Reviews)', 'trizen')); ?></span>
                            </div>
                            <div class="card-price d-flex align-items-center justify-content-between">
                                <p>
                                    <span class="price__from"><?php esc_html_e('From ', 'trizen'); ?></span>
                                    <span class="price__num"><?php echo TravelHelper::format_money($price); ?></span>
                                    <span class="price__text"><?php esc_html_e('Per night', 'trizen'); ?></span>
                                </p>
                                <a href="<?php the_permalink(); ?>" class="btn-text">
                                    <?php esc_html_e('See details', 'trizen'); ?><i class="la la-angle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

		</div>
	</div>
</section>
<?php } ?>

