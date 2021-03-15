<?php
	get_header();

$room_facilities = get_categories( array ( 'taxonomy' => 'room_facilities' ) );
$trizen_room_other_facility_data = get_post_meta(get_the_ID(), 'trizen_room_other_facility_data_group', true);
$trizen_room_rules_data = get_post_meta(get_the_ID(), 'trizen_room_rules_data_group', true);
$related_rooms = get_theme_mod('show_related_rooms', 1);


if(is_active_sidebar( 'hotel-room-sidebar' )) {
	$col_num = '8';
} else {
	$col_num = '12';
}
?>

<!-- ================================
    START ROOM DETAIL BREAD
================================= -->
<section class="room-detail-bread text-center">
<!--    <img src="https://techydevs.com/demos/themes/html/trizen-demo/trizen/images/img31.jpg" alt="">-->
	<?php
			$hidden = array();
	if ( $images = get_posts( array(
		'post_type'      => 'attachment',
		'orderby'        => 'post__in',
		'order'          => 'ASC',
		'post__in'       => explode( ',', get_post_meta( get_the_ID(), 'trizen_hotel_room_image_gallery', true ) ),
		'numberposts'    => - 1,
		'post_mime_type' => 'image'
	) ) ) {
		echo '<div class="full-width-slider carousel-action">';
		foreach ( $images as $image ) {
			$hidden[]  = $image->ID;
			$image_src = wp_get_attachment_image_src( $image->ID, array( 80, 80 ) );
			$image_src = str_replace('-150x150', '', $image_src);
			$image_src = str_replace( '-100x100', '', $image_src );
			echo '<div class="full-width-slide-item" data-id="' . $image->ID . '">
			<img src="' . $image_src[0] . '" alt="' . __( "Image", "trizen-helper" ) . '"></div>';
		}
		echo '</div>';
	} else {
		echo '<div class="full-width-slide-item">';
		the_post_thumbnail();
		echo '</div>';
	}
	?>
</section>
<!-- ================================
    END ROOM DETAIL BREAD
================================= -->

<!-- ================================
    START TOUR DETAIL AREA
================================= -->
<section class="tour-detail-area hotel-room-details padding-bottom-90px">
	<div class="single-content-navbar-wrap menu section-bg" id="single-content-navbar">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="single-content-nav" id="single-content-nav">
						<ul>
							<li>
								<a data-scroll="description" href="#description" class="scroll-link active">
									<?php esc_html_e('Description', 'trizen'); ?>
								</a>
							</li>
							<?php if($trizen_room_other_facility_data) { ?>
								<li>
									<a data-scroll="services" href="#services" class="scroll-link">
										<?php esc_html_e('Services', 'trizen'); ?>
									</a>
								</li>
                            <?php } if($room_facilities) { ?>
                                <li>
                                    <a data-scroll="amenities" href="#amenities" class="scroll-link">
                                        <?php esc_html_e('Amenities', 'trizen'); ?>
                                    </a>
                                </li>
                            <?php } ?>
							<li>
								<a data-scroll="location-map" href="#location-map" class="scroll-link">
									<?php esc_html_e('Map', 'trizen'); ?>
								</a>
							</li>
							<li>
								<a data-scroll="reviews" href="#reviews" class="scroll-link">
									<?php esc_html_e('Reviews', 'trizen'); ?>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="single-content-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-<?php echo esc_attr( $col_num ); ?>">
					<div class="single-content-wrap padding-top-60px">
						<div id="description" class="page-scroll">
							<div class="single-content-item pb-4">
                                <?php if(get_the_title()) { ?>
                                    <h3 class="title font-size-26">
                                        <?php the_title(); ?>
                                    </h3>
                                <?php } ?>
								<p class="pt-2 mb-0">
									<span class="badge badge-warning text-white font-size-16">
										<?php esc_html_e('4.6', 'trizen'); ?>
									</span>
									<span>
                                        <?php esc_html_e('(4,209 Reviews)', 'trizen'); ?>
                                    </span>
								</p>
							</div>
							<div class="section-block"></div>
							<div class="single-content-item padding-top-30px padding-bottom-40px">
                                <?php if(!empty(get_the_content())) { ?>
                                    <h3 class="title font-size-20 mb-3">
                                        <?php esc_html_e('Description', 'trizen'); ?>
                                    </h3>
                                    <?php
                                    the_content();
                                }

                                if($trizen_room_rules_data) {
	                                get_template_part( 'template-parts/room/room-rules' );
                                }
                                ?>
							</div>
							<div class="section-block"></div>
						</div>
                        <?php
                        /* Other Facility */
                        if($trizen_room_other_facility_data) {
                            get_template_part('template-parts/room/room-other-facility');
                        }

                        /* Amenities */
                        if($room_facilities) {
	                        get_template_part( 'template-parts/room/room-amenities' );
                        }

                        /* Location */
                        get_template_part('template-parts/room/room-location');

                        /* Reviews */
                        get_template_part('template-parts/room/room-reviews');

                        /* Review Lists */
                        get_template_part('template-parts/room/room-review-lists');
                        ?>

					</div>
				</div>
				<?php
				if(is_active_sidebar( 'hotel-room-sidebar' )) {
				?>
				<div class="col-lg-4">
					<?php get_sidebar('hotel_room'); ?>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</section>
<!-- ================================
    END TOUR DETAIL AREA
================================= -->

<div class="section-block"></div>

<!-- ================================
    START RELATE ROOMS AREA
================================= -->
<?php 
if($related_rooms == 1) {
	get_template_part('template-parts/room/related-rooms');
}
?>
<!-- ================================
    END RELATE ROOMS AREA
================================= -->


<?php
	get_footer();
?>
