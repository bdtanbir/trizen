<?php
    $badge_title = get_post_meta(get_the_ID(), 'trizen_hotel_badge_title', true);
    $address_title = get_post_meta(get_the_ID(), 'address', true);
    $price = get_price();

    if(get_the_post_thumbnail()) {
        $empty_img = 'empty-hotel-img';
    } else {
        $empty_img = 'empty-hotel-img';
    }
        $avg = TSReview::get_avg_rate();
?>

<div class="card-item <?php echo esc_attr($empty_img); ?>">
	<?php if(get_the_post_thumbnail()) { ?>
        <div class="card-img">
            <a href="<?php the_permalink(); ?>" class="d-block">
                <?php the_post_thumbnail(); ?>
            </a>
            <?php if (!empty($badge_title)) { ?>
                <span class="badge">
                    <?php echo esc_html($badge_title); ?>
                </span>
            <?php } ?>
            <div class="add-to-wishlist icon-element" data-toggle="tooltip" data-placement="top" title="<?php esc_attr_e('Bookmark', 'trizen'); ?>">
                <i class="la la-heart-o"></i>
            </div>
        </div>
    <?php } ?>
	<div class="card-body">
		<?php if (!get_the_post_thumbnail() && !empty($badge_title)) { ?>
            <span class="badge">
                <?php echo esc_html($badge_title); ?>
            </span>
		<?php } if(get_the_title()) { ?>
            <h3 class="card-title">
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>
            </h3>
        <?php } if(!empty($address_title)) { ?>
            <p class="card-meta">
                <?php echo esc_html($address_title); ?>
            </p>
        <?php } ?>
		<div class="card-rating">
			<span class="badge text-white">
                <?php echo esc_html($avg); ?>
            </span>
			<span class="review__text">
                <?php esc_html_e('Average', 'trizen'); ?>
            </span>
			<span class="rating__text">
                <?php comments_number(__('(0 Review)', 'trizen'), __('(1 Review)', 'trizen'), __('(% Reviews)', 'trizen')); ?>
            </span>
		</div>
		<div class="card-price d-flex align-items-center justify-content-between">
            <p>
                <span class="price__from">
                    <?php esc_html_e('From', 'trizen'); ?>
                </span>
                <span class="price__num">
                    <?php echo TravelHelper::format_money($price); ?>
                </span>
                <span class="price__text">
                    <?php esc_html_e('Per night', 'trizen'); ?>
                </span>
            </p>
			<a href="<?php the_permalink(); ?>" class="btn-text">
                <?php esc_html_e('See details', 'trizen'); ?><i class="la la-angle-right"></i>
            </a>
		</div>
	</div>
</div>


