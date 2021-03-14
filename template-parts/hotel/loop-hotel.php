<?php
    $badge_title = get_post_meta(get_the_ID(), 'trizen_hotel_badge_title', true);
    $address_title = get_post_meta(get_the_ID(), 'trizen_hotel_address_title', true);
    $hotel_regular_price = get_post_meta( get_the_ID(), 'trizen_hotel_regular_price', true );

    if(get_the_post_thumbnail()) {
        $empty_img = 'empty-hotel-img';
    } else {
        $empty_img = 'empty-hotel-img';
    }
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
                <?php esc_html_e('4.4/5', 'trizen'); ?>
            </span>
			<span class="review__text">
                <?php esc_html_e('Average', 'trizen'); ?>
            </span>
			<span class="rating__text">
                <?php esc_html_e('(30 Reviews)', 'trizen'); ?>
            </span>
		</div>
		<div class="card-price d-flex align-items-center justify-content-between">
            <p>
                <span class="price__from">
                    <?php esc_html_e('From', 'trizen'); ?>
                </span>
                <span class="price__num">
                    <?php if(!empty($hotel_regular_price)) {
                        esc_html_e('$', 'trizen'); echo esc_html($hotel_regular_price);
                    } else {
                        esc_html_e('$0.00', 'trizen');
                    } ?>
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


