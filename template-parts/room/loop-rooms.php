<?php
$number_of_adults = get_post_meta(get_the_ID(), 'trizen_room_facility_num_of_adults', true);
$number_of_beds   = get_post_meta(get_the_ID(), 'trizen_room_facility_num_of_beds', true);
$room_footage     = get_post_meta(get_the_ID(), 'trizen_hotel_room_footage', true);
$room_price       = get_post_meta(get_the_ID(), 'trizen_room_price', true);
$room_gallery     = get_post_meta(get_the_ID(), 'trizen_hotel_room_image_gallery', true );

?>
	<div class="card-item room-card">
        <?php if($room_gallery) { ?>
            <div class="card-img-carousel carousel-action carousel--action">
                <?php
                if ( $images = get_posts( array(
                    'post_type'      => 'attachment',
                    'orderby'        => 'post__in',
                    'order'          => 'ASC',
                    'post__in'       => explode( ',', get_post_meta( get_the_ID(), 'trizen_hotel_room_image_gallery', true ) ),
                    'numberposts'    => - 1,
                    'post_mime_type' => 'image'
                ) ) ) {
                    foreach ( $images as $image ) {
                        $image_src = wp_get_attachment_image_src( $image->ID, array( 80, 80 ) );
                        $image_src = str_replace( '-150x150', '', $image_src );
                        $image_src = str_replace( '-100x100', '', $image_src );
                        echo '<div class="card-img">
                                <a href="'.get_the_permalink().'" class="d-block">
                                    <img src="' . $image_src[0] . '" alt="'.get_the_title().'">
                                </a>
                            </div>';
                    }
                }
                ?>
            </div>
        <?php } else {
            if(get_the_post_thumbnail()) {
            ?>
                <div class="card-img">
                    <a href="<?php the_permalink(); ?>" class="d-block">
                        <?php the_post_thumbnail(); ?>
                    </a>
                </div>
            <?php
            }
        } ?>
		<div class="card-body">
            <?php if(!empty($room_price)) { ?>
                <div class="card-price pb-2">
                    <p>
                        <span class="price__from">
                            <?php esc_html_e('From', 'trizen'); ?>
                        </span>
                        <span class="price__num"><?php esc_html_e('$', 'trizen'); echo esc_html($room_price); ?></span>
                    </p>
                </div>
            <?php } if (!empty(get_the_title())) { ?>
                <h3 class="card-title font-size-26">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h3>
            <?php } if (!empty(get_the_content())) { ?>
                <p class="card-text pt-2">
                    <?php
                        echo wp_trim_words(get_the_content(),'25','');
                    ?>
                </p>
            <?php } ?>
			<div class="card-attributes pt-3 pb-4">
				<ul class="d-flex align-items-center">
					<li class="d-flex align-items-center">
                        <i class="la la-bed"></i><span><?php echo esc_html($number_of_beds); esc_html_e(' Beds', 'trizen'); ?></span>
                    </li>
                    <?php if(!empty($room_footage)) { ?>
					<li class="d-flex align-items-center">
                        <i class="la la-building"></i><span><?php echo esc_html($room_footage); ?> <?php esc_html_e('ft', 'trizen'); ?><sup><?php esc_html_e('2', 'trizen'); ?></sup></span>
                    </li>
                    <?php } ?>
					<li class="d-flex align-items-center">
                        <i class="la la-users"></i><span><?php echo esc_html($number_of_adults); esc_html_e(' Adults', 'trizen'); ?></span>
                    </li>
				</ul>
			</div>
			<div class="card-btn">
				<a href="<?php the_permalink(); ?>" class="theme-btn theme-btn-transparent">
                    <?php esc_html_e('Book Now', 'trizen'); ?>
                </a>
			</div>
		</div>
	</div>


