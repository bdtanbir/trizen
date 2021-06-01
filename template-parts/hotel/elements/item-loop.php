<?php
global $post;
the_post();
$post_id         = get_the_ID();
$post_translated = TravelHelper::post_translated($post_id, 'ts_hotel');
$url             = ts_get_link_with_search(get_permalink($post_translated),array('start','end','date','adult_number','child_number'),$_GET);
$badge_title     = get_post_meta(get_the_ID(), 'trizen_hotel_badge_title', true);
$address         = get_post_meta(get_the_ID(), 'address', true);
?>

<div class="card-item">
    <div class="card-img">
        <a href="<?php echo esc_url($url); ?>" class="d-block">

            <?php
            if (has_post_thumbnail()) {
                echo get_the_post_thumbnail();
            } else {
                echo 'No Image Added';
            }
            ?>
        </a>
        <?php if(!empty($badge_title)) { ?>
            <span class="badge">
                <?php echo esc_html($badge_title); ?>
            </span>
        <?php } ?>

        <?php if (is_user_logged_in()) { ?>
            <?php $data = TSUser_f::get_icon_wishlist(); ?>
            <div class="add-to-wishlist icon-element service-add-wishlist login <?php echo ($data['status']) ? 'added' : ''; ?>"
                 data-id="<?php echo esc_attr($post_translated); ?>"
                 data-type="<?php echo get_post_type($post_translated); ?>"
                 data-toggle="tooltip" data-placement="top" title="<?php echo ($data['status']) ? __('Remove from Bookmark', 'trizen') : __('Bookmark', 'trizen'); ?>">
                <i class="la la-heart-o"></i>
            </div>
        <?php } else { ?>
            <a href="" class="login" data-toggle="modal" data-target="#loginPopupForm">
                <div class="add-to-wishlist icon-element service-add-wishlist" title="<?php echo __('Add to wishlist', 'trizen'); ?>">
                    <i class="la la-heart-o"></i>
                </div>
            </a>
        <?php } ?>
    </div>
    <div class="card-body">
        <h3 class="card-title">
            <a href="hotel-single.html">
                <?php the_title(); ?>
            </a>
        </h3>
        <?php if(!empty($address)) { ?>
            <p class="card-meta">
                <?php echo esc_html($address); ?>
            </p>
        <?php } ?>
        <div class="card-rating">
            <span class="badge text-white">4.4/5</span>
            <span class="review__text">Average</span>
            <span class="rating__text">(30 Reviews)</span>
        </div>
        <div class="card-price d-flex align-items-center justify-content-between">
            <p>
                <span class="price__from">From</span>
                <span class="price__num">$88.00</span>
                <span class="price__text">Per night</span>
            </p>
            <a href="hotel-single.html" class="btn-text">See details<i class="la la-angle-right"></i></a>
        </div>
    </div>
</div>

