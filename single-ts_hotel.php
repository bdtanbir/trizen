<?php
get_header();

get_template_part('inc/breadcrumb-simple');
$hotel_gallery = get_post_meta(get_the_ID(), 'trizen_hotel_image_gallery', true);
$hotel_address   = get_post_meta( get_the_ID(), 'trizen_hotel_address_title', true );
$hotel_video   = get_post_meta( get_the_ID(), 'trizen_hotel_video_url', true );

$breadcrumb_shape     = get_theme_mod('show_breadcrumb_overlay_shape', 1);
$hotel_video_btn_text = get_theme_mod('trizen_hotel_details_bdc_video_btn_txt', __('Video', 'trizen'));
$hotel_photo_btn_text = get_theme_mod('trizen_hotel_details_bdc_photo_btn_txt', __('More Photos', 'trizen'));

if($breadcrumb_shape == 1) {
	$breadcrumb_shape_show = '';
} else {
	$breadcrumb_shape_show = 'hide-before';
}


$hotel_facilities = get_categories( array ( 'taxonomy' => 'hotel_facilities' ) );
$trizen_hotel_features_data   = get_post_meta(get_the_ID(), 'trizen_hotel_features_data_group', true);

$trizen_hotel_faqs_data    = get_post_meta(get_the_ID(), 'trizen_hotel_faqs_data_group', true);
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
								<a class="theme-btn hotel-video-btn" data-fancybox="video" data-src="<?php echo esc_attr($hotel_video); ?>"
								   data-speed="700">
									<i class="la la-video-camera mr-2"></i><?php echo esc_html($hotel_video_btn_text); ?>
								</a>
								<a class="theme-btn hotel-gallery-btn" data-src="<?php the_post_thumbnail_url(); ?>"
								   data-fancybox="gallery"
								   data-caption="<?php esc_attr_e('Showing image - 1', 'trizen'); ?>"
								   data-speed="700">
									<i class="la la-photo mr-2"></i><?php echo esc_html($hotel_photo_btn_text); ?>
								</a>
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
                                <?php } ?>
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
                                        <?php } ?>
										<p class="mb-0">
											<span class="badge badge-warning text-white font-size-16">
                                                <?php esc_html_e('4.7', 'trizen'); ?>
                                            </span>
											<span><?php esc_html_e('(4,209 Reviews)', 'trizen'); ?></span>
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
									<h3 class="title font-size-20">
                                        <?php esc_html_e('Availability', 'trizen'); ?>
                                    </h3>
									<div class="contact-form-action padding-bottom-35px">
										<form method="post">
											<div class="row">
												<div class="col-lg-6 responsive-column">
													<div class="input-box">
														<label class="label-text"><?php esc_html_e('Check in - Check out', 'trizen'); ?></label>
														<div class="form-group">
															<span class="la la-calendar form-icon"></span>
															<input class="date-range form-control" type="text" name="daterange">
														</div>
													</div>
												</div>
												<div class="col-lg-6 responsive-column">
													<div class="input-box">
														<label class="label-text">
                                                            <?php esc_html_e('Rooms', 'trizen'); ?>
                                                        </label>
														<div class="form-group">
															<div class="select-contain w-auto">
																<select class="select-contain-select">
																	<option value="0"><?php esc_html_e('Select Rooms', 'trizen'); ?></option>
																	<option value="1"><?php esc_html_e('1 Room', 'trizen'); ?></option>
																	<option value="2"><?php esc_html_e('2 Rooms', 'trizen'); ?></option>
																	<option value="3"><?php esc_html_e('3 Rooms', 'trizen'); ?></option>
																	<option value="4"><?php esc_html_e('4 Rooms', 'trizen'); ?></option>
																	<option value="5"><?php esc_html_e('5 Rooms', 'trizen'); ?></option>
																	<option value="6"><?php esc_html_e('6 Rooms', 'trizen'); ?></option>
																	<option value="7"><?php esc_html_e('7 Rooms', 'trizen'); ?></option>
																	<option value="8"><?php esc_html_e('8 Rooms', 'trizen'); ?></option>
																	<option value="9"><?php esc_html_e('9 Rooms', 'trizen'); ?></option>
																	<option value="10"><?php esc_html_e('10 Rooms', 'trizen'); ?></option>
																	<option value="11"><?php esc_html_e('11 Rooms', 'trizen'); ?></option>
																	<option value="12"><?php esc_html_e('12 Rooms', 'trizen'); ?></option>
																	<option value="13"><?php esc_html_e('13 Rooms', 'trizen'); ?></option>
																	<option value="14"><?php esc_html_e('14 Rooms', 'trizen'); ?></option>
																</select>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-6 responsive-column">
													<div class="input-box">
														<label class="label-text">
                                                            <?php esc_html_e('Adults (18+)', 'trizen'); ?>
                                                        </label>
														<div class="form-group">
															<div class="select-contain w-auto">
																<select class="select-contain-select">
																	<option value="0"><?php esc_html_e('Select Adults', 'trizen'); ?></option>
																	<option value="1"><?php esc_html_e('1 Adults', 'trizen'); ?></option>
																	<option value="2"><?php esc_html_e('2 Adults', 'trizen'); ?></option>
																	<option value="3"><?php esc_html_e('3 Adults', 'trizen'); ?></option>
																	<option value="4"><?php esc_html_e('4 Adults', 'trizen'); ?></option>
																	<option value="5"><?php esc_html_e('5 Adults', 'trizen'); ?></option>
																	<option value="6"><?php esc_html_e('6 Adults', 'trizen'); ?></option>
																	<option value="7"><?php esc_html_e('7 Adults', 'trizen'); ?></option>
																	<option value="8"><?php esc_html_e('8 Adults', 'trizen'); ?></option>
																	<option value="9"><?php esc_html_e('9 Adults', 'trizen'); ?></option>
																	<option value="10"><?php esc_html_e('10 Adults', 'trizen'); ?></option>
																	<option value="11"><?php esc_html_e('11 Adults', 'trizen'); ?></option>
																	<option value="12"><?php esc_html_e('12 Adults', 'trizen'); ?></option>
																	<option value="13"><?php esc_html_e('13 Adults', 'trizen'); ?></option>
																	<option value="14"><?php esc_html_e('14 Adults', 'trizen'); ?></option>
																</select>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-6 responsive-column">
													<div class="input-box">
														<label class="label-text">
                                                            <?php esc_html_e('Children (0-17)', 'trizen'); ?>
                                                        </label>
														<div class="form-group">
															<div class="select-contain w-auto">
																<select class="select-contain-select">
																	<option value="0"><?php esc_html_e('Select Children', 'trizen'); ?></option>
																	<option value="1"><?php esc_html_e('1 Children', 'trizen'); ?></option>
																	<option value="2"><?php esc_html_e('2 Children', 'trizen'); ?></option>
																	<option value="3"><?php esc_html_e('3 Children', 'trizen'); ?></option>
																	<option value="4"><?php esc_html_e('4 Children', 'trizen'); ?></option>
																	<option value="5"><?php esc_html_e('5 Children', 'trizen'); ?></option>
																</select>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-12">
													<div class="btn-box">
														<button type="button" class="theme-btn"><?php esc_html_e('Search Now', 'trizen'); ?></button>
													</div>
												</div>
											</div>
										</form>
									</div>

									<h3 class="title font-size-20"><?php esc_html_e('Available Rooms', 'trizen'); ?></h3>
									<div class="cabin-type padding-top-30px">
										<div class="cabin-type-item seat-selection-item d-flex">
											<div class="cabin-type-img flex-shrink-0">
												<img src="<?php echo get_template_directory_uri(); ?>/assets/images/inside-cabin.jpg" alt="<?php esc_attr_e('Room Image', 'trizen'); ?>">
											</div>
											<div class="cabin-type-detail">
												<h3 class="title"><?php esc_html_e('Standard Family Room', 'trizen'); ?></h3>
												<div class="row padding-top-20px">
													<div class="col-lg-6 responsive-column">
														<div class="single-tour-feature d-flex align-items-center mb-3">
															<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2">
																<i class="la la-wifi"></i>
															</div>
															<div class="single-feature-titles">
																<h3 class="title font-size-15 font-weight-medium"><?php esc_html_e('Free Wi-Fi','trizen'); ?></h3>
															</div>
														</div>
													</div>
													<div class="col-lg-6 responsive-column">
														<div class="single-tour-feature d-flex align-items-center mb-3">
															<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2">
																<i class="la la-bed"></i>
															</div>
															<div class="single-feature-titles">
																<h3 class="title font-size-15 font-weight-medium"><?php esc_html_e('2 Single beds', 'trizen'); ?></h3>
															</div>
														</div>
													</div>
													<div class="col-lg-6 responsive-column">
														<div class="single-tour-feature d-flex align-items-center mb-3">
															<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2">
																<i class="la la-building"></i>
															</div>
															<div class="single-feature-titles">
																<h3 class="title font-size-15 font-weight-medium"><?php esc_html_e('15 m²', 'trizen'); ?></h3>
															</div>
														</div>
													</div>
													<div class="col-lg-6 responsive-column">
														<div class="single-tour-feature d-flex align-items-center mb-3">
															<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2">
																<i class="la la-hotel"></i>
															</div>
															<div class="single-feature-titles">
																<h3 class="title font-size-15 font-weight-medium"><?php esc_html_e('Shower and bathtub', 'trizen'); ?></h3>
															</div>
														</div>
													</div>
												</div>
												<div class="room-photos">
													<a class="btn theme-btn-hover-gray" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/img1.jpg"
													   data-fancybox="gallery"
													   data-caption="<?php esc_attr_e('Showing image - 01', 'trizen'); ?>"
													   data-speed="700">
														<i class="la la-photo mr-2"></i><?php esc_html_e('Room Photos', 'trizen'); ?>
													</a>
													<a class="d-none"
													   data-fancybox="gallery"
													   data-src="<?php echo get_template_directory_uri(); ?>/assets/images/img2.jpg"
													   data-caption="<?php esc_attr_e('Showing image - 02', 'trizen'); ?>"
													   data-speed="700"></a>
													<a class="d-none"
													   data-fancybox="gallery"
													   data-src="<?php echo get_template_directory_uri(); ?>/assets/images/img3.jpg"
													   data-caption="<?php esc_attr_e('Showing image - 03', 'trizen'); ?>"
													   data-speed="700"></a>
													<a class="d-none"
													   data-fancybox="gallery"
													   data-src="<?php echo get_template_directory_uri(); ?>/assets/images/img4.jpg"
													   data-caption="<?php esc_attr_e('Showing image - 04', 'trizen'); ?>"
													   data-speed="700"></a>
												</div>
											</div>
											<div class="cabin-price">
												<p class="text-uppercase font-size-14"><?php esc_html_e('Per/night', 'trizen'); ?><strong class="mt-n1 text-black font-size-18 font-weight-black d-block"><?php esc_html_e('$121', 'trizen'); ?></strong></p>
												<div class="custom-checkbox mb-0">
													<input type="checkbox" id="selectChb1">
													<label for="selectChb1" class="theme-btn theme-btn-small"><?php esc_html_e('Select', 'trizen'); ?></label>
												</div>
											</div>
										</div>
									</div>

									<div class="cabin-type padding-top-30px">
										<div class="cabin-type-item seat-selection-item d-flex">
											<div class="cabin-type-img flex-shrink-0">
												<img src="<?php echo get_template_directory_uri(); ?>/assets/images/oceanview-cabin.jpg" alt="<?php esc_attr_e('Room Image', 'trizen'); ?>">
											</div>
											<div class="cabin-type-detail">
												<h3 class="title"><?php esc_html_e('Superior Double Room', 'trizen'); ?></h3>
												<div class="row padding-top-20px">
													<div class="col-lg-6 responsive-column">
														<div class="single-tour-feature d-flex align-items-center mb-3">
															<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2">
																<i class="la la-wifi"></i>
															</div>
															<div class="single-feature-titles">
																<h3 class="title font-size-15 font-weight-medium"><?php esc_html_e('Free Wi-Fi', 'trizen'); ?></h3>
															</div>
														</div>
													</div>
													<div class="col-lg-6 responsive-column">
														<div class="single-tour-feature d-flex align-items-center mb-3">
															<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2">
																<i class="la la-bed"></i>
															</div>
															<div class="single-feature-titles">
																<h3 class="title font-size-15 font-weight-medium"><?php esc_html_e('2 Single beds', 'trizen'); ?></h3>
															</div>
														</div>
													</div>
													<div class="col-lg-6 responsive-column">
														<div class="single-tour-feature d-flex align-items-center mb-3">
															<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2">
																<i class="la la-building"></i>
															</div>
															<div class="single-feature-titles">
																<h3 class="title font-size-15 font-weight-medium"><?php esc_html_e('15 m²', 'trizen'); ?></h3>
															</div>
														</div>
													</div>
													<div class="col-lg-6 responsive-column">
														<div class="single-tour-feature d-flex align-items-center mb-3">
															<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2">
																<i class="la la-hotel"></i>
															</div>
															<div class="single-feature-titles">
																<h3 class="title font-size-15 font-weight-medium"><?php esc_html_e('Shower and bathtub', 'trizen'); ?></h3>
															</div>
														</div>
													</div>
												</div>
												<div class="room-photos">
													<a class="btn theme-btn-hover-gray" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/img1.jpg"
													   data-fancybox="gallery"
													   data-caption="<?php esc_attr_e('Showing image - 01', 'trizen'); ?>"
													   data-speed="700">
														<i class="la la-photo mr-2"></i><?php esc_html_e('Room Photos', 'trizen'); ?>
													</a>
													<a class="d-none"
													   data-fancybox="gallery"
													   data-src="<?php echo get_template_directory_uri(); ?>/assets/images/img2.jpg"
													   data-caption="<?php esc_attr_e('Showing image - 02', 'trizen'); ?>"
													   data-speed="700"></a>
													<a class="d-none"
													   data-fancybox="gallery"
													   data-src="<?php echo get_template_directory_uri(); ?>/assets/images/img3.jpg"
													   data-caption="<?php esc_attr_e('Showing image - 03', 'trizen'); ?>"
													   data-speed="700"></a>
													<a class="d-none"
													   data-fancybox="gallery"
													   data-src="<?php echo get_template_directory_uri(); ?>/assets/images/img4.jpg"
													   data-caption="<?php esc_attr_e('Showing image - 04', 'trizen'); ?>"
													   data-speed="700"></a>
												</div>
											</div>
											<div class="cabin-price">
												<p class="text-uppercase font-size-14"><?php esc_html_e('Per/night', 'trizen'); ?><strong class="mt-n1 text-black font-size-18 font-weight-black d-block"><?php esc_html_e('$121', 'trizen'); ?></strong></p>
												<div class="custom-checkbox mb-0">
													<input type="checkbox" id="selectChb2">
													<label for="selectChb2" class="theme-btn theme-btn-small"><?php esc_html_e('Select', 'trizen'); ?></label>
												</div>
											</div>
										</div>
									</div>

									<div class="cabin-type padding-top-30px">
										<div class="cabin-type-item seat-selection-item d-flex">
											<div class="cabin-type-img flex-shrink-0">
												<img src="<?php echo get_template_directory_uri(); ?>/assets/images/balcony-cabin.jpg" alt="">
											</div>
											<div class="cabin-type-detail">
												<h3 class="title"><?php esc_html_e('Deluxe Single Room', 'trizen'); ?></h3>
												<div class="row padding-top-20px">
													<div class="col-lg-6 responsive-column">
														<div class="single-tour-feature d-flex align-items-center mb-3">
															<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2">
																<i class="la la-wifi"></i>
															</div>
															<div class="single-feature-titles">
																<h3 class="title font-size-15 font-weight-medium"><?php esc_html_e('Free Wi-Fi', 'trizen'); ?></h3>
															</div>
														</div>
													</div>
													<div class="col-lg-6 responsive-column">
														<div class="single-tour-feature d-flex align-items-center mb-3">
															<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2">
																<i class="la la-bed"></i>
															</div>
															<div class="single-feature-titles">
																<h3 class="title font-size-15 font-weight-medium"><?php esc_html_e('2 Single beds', 'trizen'); ?></h3>
															</div>
														</div>
													</div>
													<div class="col-lg-6 responsive-column">
														<div class="single-tour-feature d-flex align-items-center mb-3">
															<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2">
																<i class="la la-building"></i>
															</div>
															<div class="single-feature-titles">
																<h3 class="title font-size-15 font-weight-medium"><?php esc_html_e('15 m²', 'trizen'); ?></h3>
															</div>
														</div>
													</div>
													<div class="col-lg-6 responsive-column">
														<div class="single-tour-feature d-flex align-items-center mb-3">
															<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2">
																<i class="la la-hotel"></i>
															</div>
															<div class="single-feature-titles">
																<h3 class="title font-size-15 font-weight-medium"><?php esc_html_e('Shower and bathtub', 'trizen'); ?></h3>
															</div>
														</div>
													</div>
												</div>
												<div class="room-photos">
													<a class="btn theme-btn-hover-gray" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/img1.jpg"
													   data-fancybox="gallery"
													   data-caption="<?php esc_attr_e('Showing image - 01', 'trizen'); ?>"
													   data-speed="700">
														<i class="la la-photo mr-2"></i><?php esc_html_e('Room Photos', 'trizen'); ?>
													</a>
													<a class="d-none"
													   data-fancybox="gallery"
													   data-src="<?php echo get_template_directory_uri(); ?>/assets/images/img2.jpg"
													   data-caption="<?php esc_attr_e('Showing image - 02', 'trizen'); ?>"
													   data-speed="700"></a>
													<a class="d-none"
													   data-fancybox="gallery"
													   data-src="<?php echo get_template_directory_uri(); ?>/assets/images/img3.jpg"
													   data-caption="<?php esc_attr_e('Showing image - 03', 'trizen'); ?>"
													   data-speed="700"></a>
													<a class="d-none"
													   data-fancybox="gallery"
													   data-src="<?php echo get_template_directory_uri(); ?>/assets/images/img4.jpg"
													   data-caption="<?php esc_attr_e('Showing image - 04', 'trizen'); ?>"
													   data-speed="700"></a>
												</div>
											</div>
											<div class="cabin-price">
												<p class="text-uppercase font-size-14"><?php esc_html_e('Per/night', 'trizen'); ?><strong class="mt-n1 text-black font-size-18 font-weight-black d-block"><?php esc_html_e('$121','trizen'); ?></strong></p>
												<div class="custom-checkbox mb-0">
													<input type="checkbox" id="selectChb3">
													<label for="selectChb3" class="theme-btn theme-btn-small">
                                                        <?php esc_html_e('Select', 'trizen'); ?>
                                                    </label>
												</div>
											</div>
										</div><!-- end cabin-type-item -->
									</div><!-- end cabin-type -->
									<div class="cabin-type padding-top-30px">
										<div class="cabin-type-item seat-selection-item d-flex">
											<div class="cabin-type-img flex-shrink-0">
												<img src="<?php echo get_template_directory_uri(); ?>/assets/images/suite-cabin.jpg" alt="">
											</div>
											<div class="cabin-type-detail">
												<h3 class="title"><?php esc_html_e('Single Bed Room', 'trizen'); ?></h3>
												<div class="row padding-top-20px">
													<div class="col-lg-6 responsive-column">
														<div class="single-tour-feature d-flex align-items-center mb-3">
															<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2">
																<i class="la la-wifi"></i>
															</div>
															<div class="single-feature-titles">
																<h3 class="title font-size-15 font-weight-medium">
                                                                    <?php esc_html_e('Free Wi-Fi', 'trizen'); ?>
                                                                </h3>
															</div>
														</div>
													</div><!-- end col-lg-6 -->
													<div class="col-lg-6 responsive-column">
														<div class="single-tour-feature d-flex align-items-center mb-3">
															<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2">
																<i class="la la-bed"></i>
															</div>
															<div class="single-feature-titles">
																<h3 class="title font-size-15 font-weight-medium">
                                                                    <?php esc_html_e('1 Single beds', 'trizen'); ?>
                                                                </h3>
															</div>
														</div>
													</div><!-- end col-lg-6 -->
													<div class="col-lg-6 responsive-column">
														<div class="single-tour-feature d-flex align-items-center mb-3">
															<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2">
																<i class="la la-building"></i>
															</div>
															<div class="single-feature-titles">
																<h3 class="title font-size-15 font-weight-medium">
                                                                    <?php esc_html_e('15 m²', 'trizen'); ?>
                                                                </h3>
															</div>
														</div>
													</div>
													<div class="col-lg-6 responsive-column">
														<div class="single-tour-feature d-flex align-items-center mb-3">
															<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2">
																<i class="la la-hotel"></i>
															</div>
															<div class="single-feature-titles">
																<h3 class="title font-size-15 font-weight-medium">
                                                                    <?php esc_html_e('Shower and bathtub', 'trizen'); ?>
                                                                </h3>
															</div>
														</div>
													</div>
												</div>
												<div class="room-photos">
													<a class="btn theme-btn-hover-gray" data-src="images/img1.jpg"
													   data-fancybox="gallery"
													   data-caption="<?php esc_html_e('Showing image - 01', 'trizen'); ?>"
													   data-speed="700">
														<i class="la la-photo mr-2"></i><?php esc_html_e('Room Photos', 'trizen'); ?>
													</a>
													<a class="d-none"
													   data-fancybox="gallery"
													   data-src="<?php echo get_template_directory_uri(); ?>/assets/images/img2.jpg"
													   data-caption="<?php esc_attr_e('Showing image - 02', 'trizen'); ?>"
													   data-speed="700"></a>
													<a class="d-none"
													   data-fancybox="gallery"
													   data-src="<?php echo get_template_directory_uri(); ?>/assets/images/img3.jpg"
													   data-caption="<?php esc_attr_e('Showing image - 03', 'trizen'); ?>"
													   data-speed="700"></a>
													<a class="d-none"
													   data-fancybox="gallery"
													   data-src="<?php echo get_template_directory_uri(); ?>/assets/images/img4.jpg"
													   data-caption="<?php esc_attr_e('Showing image - 04', 'trizen'); ?>"
													   data-speed="700"></a>
												</div>
											</div>
											<div class="cabin-price">
												<p class="text-uppercase font-size-14"><?php esc_html_e('Per/night', 'trizen'); ?><strong class="mt-n1 text-black font-size-18 font-weight-black d-block"><?php esc_html_e('$121', 'trizen'); ?></strong></p>
												<div class="custom-checkbox mb-0">
													<input type="checkbox" id="selectChb4">
													<label for="selectChb4" class="theme-btn theme-btn-small">
                                                        <?php esc_html_e('Select', 'trizen'); ?>
                                                    </label>
												</div>
											</div>
										</div><!-- end cabin-type-item -->
									</div><!-- end cabin-type -->
								</div><!-- end single-content-item -->
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
								<!--<div class="single-content-item padding-top-40px padding-bottom-40px">
									<h3 class="title font-size-20">Reviews</h3>
									<div class="review-container padding-top-30px">
										<div class="row align-items-center">
											<div class="col-lg-4">
												<div class="review-summary">
													<h2>4.5<span>/5</span></h2>
													<p>Excellent</p>
													<span>Based on 4 reviews</span>
												</div>
											</div>
											<div class="col-lg-8">
												<div class="review-bars">
													<div class="row">
														<div class="col-lg-6">
															<div class="progress-item">
																<h3 class="progressbar-title">Service</h3>
																<div class="progressbar-content line-height-20 d-flex align-items-center justify-content-between">
																	<div class="progressbar-box flex-shrink-0">
																		<div class="progressbar-line" data-percent="70%">
																			<div class="progressbar-line-item bar-bg-1"></div>
																		</div>
																	</div>
																	<div class="bar-percent">4.6</div>
																</div>
															</div>
														</div>
														<div class="col-lg-6">
															<div class="progress-item">
																<h3 class="progressbar-title">Location</h3>
																<div class="progressbar-content line-height-20 d-flex align-items-center justify-content-between">
																	<div class="progressbar-box flex-shrink-0">
																		<div class="progressbar-line" data-percent="55%">
																			<div class="progressbar-line-item bar-bg-2"></div>
																		</div>
																	</div>
																	<div class="bar-percent">4.7</div>
																</div>
															</div>
														</div>
														<div class="col-lg-6">
															<div class="progress-item">
																<h3 class="progressbar-title">Value for Money</h3>
																<div class="progressbar-content line-height-20 d-flex align-items-center justify-content-between">
																	<div class="progressbar-box flex-shrink-0">
																		<div class="progressbar-line" data-percent="40%">
																			<div class="progressbar-line-item bar-bg-3"></div>
																		</div>
																	</div>
																	<div class="bar-percent">2.6</div>
																</div>
															</div>
														</div>
														<div class="col-lg-6">
															<div class="progress-item">
																<h3 class="progressbar-title">Cleanliness</h3>
																<div class="progressbar-content line-height-20 d-flex align-items-center justify-content-between">
																	<div class="progressbar-box flex-shrink-0">
																		<div class="progressbar-line" data-percent="60%">
																			<div class="progressbar-line-item bar-bg-4"></div>
																		</div>
																	</div>
																	<div class="bar-percent">3.6</div>
																</div>
															</div>
														</div>
														<div class="col-lg-6">
															<div class="progress-item">
																<h3 class="progressbar-title">Facilities</h3>
																<div class="progressbar-content line-height-20 d-flex align-items-center justify-content-between">
																	<div class="progressbar-box flex-shrink-0">
																		<div class="progressbar-line" data-percent="50%">
																			<div class="progressbar-line-item bar-bg-5"></div>
																		</div>
																	</div>
																	<div class="bar-percent">2.6</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>-->
                                <?php
                                $stats = TSReview::get_review_summary();
                                if ($stats) {
                                    foreach ($stats as $stat) {
                                        ?>
                                        <div class="item">
                                            <div class="progress">
                                                <div class="percent"
                                                     style="width: <?php echo esc_attr($stat['percent']); ?>%;"></div>
                                            </div>
                                            <div class="label">
                                                <?php echo esc_html($stat['name']); ?>
                                                <div class="number"><?php echo esc_html($stat['summary']) ?>
                                                    <?php esc_html_e('/5', 'trizen'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }
                                }
                                ?>
								<div class="section-block"></div>
							</div>
							<div class="review-box">
								<div class="single-content-item padding-top-40px">
									<!--<h3 class="title font-size-20">Showing 3 guest reviews</h3>
									<div class="comments-list padding-top-50px">
										<div class="comment">
											<div class="comment-avatar">
												<img class="avatar__img" alt="" src="images/team8.jpg">
											</div>
											<div class="comment-body">
												<div class="meta-data">
													<h3 class="comment__author">Jenny Doe</h3>
													<div class="meta-data-inner d-flex">
	                                                    <span class="ratings d-flex align-items-center mr-1">
	                                                        <i class="la la-star"></i>
	                                                        <i class="la la-star"></i>
	                                                        <i class="la la-star"></i>
	                                                        <i class="la la-star"></i>
	                                                        <i class="la la-star"></i>
	                                                    </span>
														<p class="comment__date">April 5, 2019</p>
													</div>
												</div>
												<p class="comment-content">
													Lorem ipsum dolor sit amet, dolores mandamus moderatius ea ius, sed civibus vivendum imperdiet ei, amet tritani sea id. Ut veri diceret fierent mei, qui facilisi suavitate euripidis
												</p>
												<div class="comment-reply d-flex align-items-center justify-content-between">
													<a class="theme-btn" href="#" data-toggle="modal" data-target="#replayPopupForm">
														<span class="la la-mail-reply mr-1"></span>Reply
													</a>
													<div class="reviews-reaction">
														<a href="#" class="comment-like"><i class="la la-thumbs-up"></i> 13</a>
														<a href="#" class="comment-dislike"><i class="la la-thumbs-down"></i> 2</a>
														<a href="#" class="comment-love"><i class="la la-heart-o"></i> 5</a>
													</div>
												</div>
											</div>
										</div>
										<div class="comment comment-reply-item">
											<div class="comment-avatar">
												<img class="avatar__img" alt="" src="images/team9.jpg">
											</div>
											<div class="comment-body">
												<div class="meta-data">
													<h3 class="comment__author">Jenny Doe</h3>
													<div class="meta-data-inner d-flex">
	                                                    <span class="ratings d-flex align-items-center mr-1">
	                                                        <i class="la la-star"></i>
	                                                        <i class="la la-star"></i>
	                                                        <i class="la la-star"></i>
	                                                        <i class="la la-star"></i>
	                                                        <i class="la la-star"></i>
	                                                    </span>
														<p class="comment__date">April 5, 2019</p>
													</div>
												</div>
												<p class="comment-content">
													Lorem ipsum dolor sit amet, dolores mandamus moderatius ea ius, sed civibus vivendum imperdiet ei, amet tritani sea id. Ut veri diceret fierent mei, qui facilisi suavitate euripidis
												</p>
												<div class="comment-reply d-flex align-items-center justify-content-between">
													<a class="theme-btn" href="#" data-toggle="modal" data-target="#replayPopupForm">
														<span class="la la-mail-reply mr-1"></span>Reply
													</a>
													<div class="reviews-reaction">
														<a href="#" class="comment-like"><i class="la la-thumbs-up"></i> 13</a>
														<a href="#" class="comment-dislike"><i class="la la-thumbs-down"></i> 2</a>
														<a href="#" class="comment-love"><i class="la la-heart-o"></i> 5</a>
													</div>
												</div>
											</div>
										</div>
										<div class="comment">
											<div class="comment-avatar">
												<img class="avatar__img" alt="" src="images/team10.jpg">
											</div>
											<div class="comment-body">
												<div class="meta-data">
													<h3 class="comment__author">Jenny Doe</h3>
													<div class="meta-data-inner d-flex">
	                                                    <span class="ratings d-flex align-items-center mr-1">
	                                                        <i class="la la-star"></i>
	                                                        <i class="la la-star"></i>
	                                                        <i class="la la-star"></i>
	                                                        <i class="la la-star"></i>
	                                                        <i class="la la-star"></i>
	                                                    </span>
														<p class="comment__date">April 5, 2019</p>
													</div>
												</div>
												<p class="comment-content">
													Lorem ipsum dolor sit amet, dolores mandamus moderatius ea ius, sed civibus vivendum imperdiet ei, amet tritani sea id. Ut veri diceret fierent mei, qui facilisi suavitate euripidis
												</p>
												<div class="comment-reply d-flex align-items-center justify-content-between">
													<a class="theme-btn" href="#" data-toggle="modal" data-target="#replayPopupForm">
														<span class="la la-mail-reply mr-1"></span>Reply
													</a>
													<div class="reviews-reaction">
														<a href="#" class="comment-like"><i class="la la-thumbs-up"></i> 13</a>
														<a href="#" class="comment-dislike"><i class="la la-thumbs-down"></i> 2</a>
														<a href="#" class="comment-love"><i class="la la-heart-o"></i> 5</a>
													</div>
												</div>
											</div>
										</div>
										<div class="btn-box load-more text-center">
											<button class="theme-btn theme-btn-small theme-btn-transparent" type="button">Load More Review</button>
										</div>
									</div>-->

                                    <div class="summary">
                                        <?php
                                        $comments_count = wp_count_comments(get_the_ID());
                                        $total = (int)$comments_count->approved;
                                        $comment_per_page = (int)get_option('comments_per_page', 10);
                                        $paged = (int)get('comment_page', 1);
                                        $from = $comment_per_page * ($paged - 1) + 1;
                                        $to = ($paged * $comment_per_page < $total) ? ($paged * $comment_per_page) : $total;
                                        ?>
                                        <?php comments_number(__('0 review on this Hotel', 'trizen'), __('1 review on this Hotel', 'trizen'), __('% reviews on this Hotel', 'trizen')); ?>
                                        - <?php echo sprintf(__('Showing %s to %s', 'trizen'), $from, $to) ?>
                                    </div>
                                    <?php
                                    $offset = ($paged - 1) * $comment_per_page;
                                    $args = [
                                        'number' => $comment_per_page,
                                        'offset' => $offset,
                                        'post_id' => get_the_ID(),
                                        'status' => ['approve']
                                    ];
                                    $comments_query = new WP_Comment_Query;
                                    $comments = $comments_query->query($args);

                                    if ($comments):
                                        foreach ($comments as $key => $comment):
//                                            get_template_part('template-parts/hotel/review-lists');
                                            $args[ 'avatar_size' ] = 50;
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
                                                <div class="comment-item">
                                                    <div class="comment-item-head">
                                                        <div class="media">
                                                            <div class="media-left">
                                                                <?php echo ts_get_profile_avatar( $user_id, 50 ) ?>
                                                            </div>
                                                            <div class="media-body">
                                                                <?php
                                                                if(!empty($user_id)){
                                                                    ?>
                                                                    <h4 class="media-heading"><?php echo TSAdminRoom::get_username( $user_id ); ?></h4>
                                                                    <?php
                                                                }else{
                                                                    ?>
                                                                    <h4 class="media-heading"><?php echo esc_html($comment->comment_author); ?></h4>
                                                                    <?php
                                                                }
                                                                ?>
                                                                <div class="date"><?php echo get_comment_date( getDateFormat(), $comment_id ) ?></div>
                                                            </div>
                                                        </div>
                                                        <div class="like">
                                                            <?php
                                                            $count_like = (int)get_comment_meta( $comment_id, '_comment_like_count', true );
                                                            echo '<span>' . esc_html($count_like) . '</span>' . _n( ' like this', ' likes this', $count_like, 'trizen' );
                                                            ?>
                                                            <?php /*$review_obj = new TSReview();
                if ( $review_obj->check_like( $comment_id ) ):
                    */?><!--
                    <a data-id="<?php /*echo esc_attr( $comment_id ); */?>" href="#"
                       class="btn-like st-like-review ">
                        <i class="fa fa-thumbs-o-down"></i>
                    </a>
                <?php /*else: */?>
                    <a data-id="<?php /*echo esc_attr( $comment_id ); */?>" href="#"
                       class="btn-like st-like-review ">
                        <i class="fa fa-thumbs-o-up"></i>
                    </a>
                --><?php
                                                            /*                endif;*/
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="comment-item-body">
                                                        <?php
                                                        $stats        = TSReview::get_review_stats( get_the_ID() );
                                                        $comment_rate = (float)get_comment_meta( $comment_id, 'comment_rate', true );
                                                        ?>
                                                        <?php if(isset($post_type) and in_array($post_type, ['ts_tours', 'ts_activity'])){ ?>
                                                            <?php if ( $comment_title = get_comment_meta( $comment_id, 'comment_title', true ) ): ?>
                                                                <h4 class="title st_tours" <?php if(!$stats) echo 'style="padding-left: 0;"'; ?>>
                                                                    <?php echo esc_html(balanceTags( $comment_title )) ?>
                                                                </h4>
                                                                <?php
                                                                if ( $stats ) {
                                                                    echo '<ul class="review-star">';
                                                                    echo rate_to_string($comment_rate);
                                                                    echo '</ul>';
                                                                }
                                                                ?>
                                                            <?php else:
                                                                if ( $stats ) {
                                                                    echo '<ul class="review-star">';
                                                                    echo rate_to_string($comment_rate);
                                                                    echo '</ul>';
                                                                }
                                                            endif; ?>
                                                        <?php }else{
                                                            ?>
                                                            <?php if ( $comment_title = get_comment_meta( $comment_id, 'comment_title', true ) ): ?>
                                                                <h4 class="title" <?php if(!$stats) echo 'style="padding-left: 0;"'; ?>>
                                                                    <?php
                                                                    if ( $stats ) {
                                                                        echo '<span class="comment-rate">' . number_format( $comment_rate, 1, '.', ',' ) . '</span>';
                                                                    }
                                                                    ?>
                                                                    "<?php echo esc_html(balanceTags( $comment_title )) ?>"
                                                                </h4>
                                                            <?php else:
                                                                if ( $stats ) {
                                                                    echo '<span class="comment-rate">' . number_format( $comment_rate, 1, '.', ',' ) . '</span>';
                                                                }
                                                            endif; ?>
                                                            <?php
                                                        } ?>
                                                        <?php
                                                        if ( !$stats && $comment_rate ) {
                                                            ?>
                                                            <div class="ts-stars style-2">
                                                                <?php
                                                                for ( $i = 1; $i <= 5; $i++ ) {
                                                                    if ( $i <= $comment_rate ) {
                                                                        echo '<i class="fa fa-star"></i>';
                                                                    } else {
                                                                        echo '<i class="fa fa-star grey"></i>';
                                                                    }
                                                                }
                                                                ?>
                                                            </div>
                                                        <?php }
                                                        ?>
                                                        <div class="detail">
                                                            <?php
                                                            $content = get_comment_text( $comment_id );
                                                            ?>
                                                            <div class="ts-description"
                                                                 data-show-all="ts-description-<?php echo esc_attr($comment_id); ?>" <?php if ( str_word_count( $content ) >= 80 ) {
                                                                echo ' data-height="80"';
                                                            } ?>>
                                                                <?php echo esc_html(balanceTags($content)); ?>
                                                            </div>
                                                            <?php if ( str_word_count( $content ) >= 80 ) { ?>
                                                                <a href="#" class="ts-link block"
                                                                   data-show-target="ts-description-<?php echo esc_attr($comment_id); ?>"
                                                                   data-text-less="<?php esc_attr_e( 'View Less', 'trizen' ) ?>"
                                                                   data-text-more="<?php esc_attr_e( 'View More', 'trizen' ) ?>">
                                                                    <span class="text"><?php esc_html_e( 'View More', 'trizen' ) ?></span>
                                                                    <i class="fa fa-caret-down ml3"></i>
                                                                </a>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            endif;
                                        endforeach;
                                    endif;

                                    TSAdminRoom::comment_form(); ?>
									<!--<div class="comment-forum padding-top-40px">
										<div class="form-box">
											<div class="form-title-wrap">
												<h3 class="title">Write a Review</h3>
											</div>
											<div class="form-content">
												<div class="rate-option p-2">
													<div class="row">
														<div class="col-lg-4 responsive-column">
															<div class="rate-option-item">
																<label>Service</label>
																<div class="rate-stars-option">
																	<input type="checkbox" id="lst1" value="1">
																	<label for="lst1"></label>
																	<input type="checkbox" id="lst2" value="2">
																	<label for="lst2"></label>
																	<input type="checkbox" id="lst3" value="3">
																	<label for="lst3"></label>
																	<input type="checkbox" id="lst4" value="4">
																	<label for="lst4"></label>
																	<input type="checkbox" id="lst5" value="5">
																	<label for="lst5"></label>
																</div>
															</div>
														</div>
														<div class="col-lg-4 responsive-column">
															<div class="rate-option-item">
																<label>Location</label>
																<div class="rate-stars-option">
																	<input type="checkbox" id="l1" value="1">
																	<label for="l1"></label>
																	<input type="checkbox" id="l2" value="2">
																	<label for="l2"></label>
																	<input type="checkbox" id="l3" value="3">
																	<label for="l3"></label>
																	<input type="checkbox" id="l4" value="4">
																	<label for="l4"></label>
																	<input type="checkbox" id="l5" value="5">
																	<label for="l5"></label>
																</div>
															</div>
														</div>
														<div class="col-lg-4 responsive-column">
															<div class="rate-option-item">
																<label>Value for Money</label>
																<div class="rate-stars-option">
																	<input type="checkbox" id="vm1" value="1">
																	<label for="vm1"></label>
																	<input type="checkbox" id="vm2" value="2">
																	<label for="vm2"></label>
																	<input type="checkbox" id="vm3" value="3">
																	<label for="vm3"></label>
																	<input type="checkbox" id="vm4" value="4">
																	<label for="vm4"></label>
																	<input type="checkbox" id="vm5" value="5">
																	<label for="vm5"></label>
																</div>
															</div>
														</div>
														<div class="col-lg-4 responsive-column">
															<div class="rate-option-item">
																<label>Cleanliness</label>
																<div class="rate-stars-option">
																	<input type="checkbox" id="cln1" value="1">
																	<label for="cln1"></label>
																	<input type="checkbox" id="cln2" value="2">
																	<label for="cln2"></label>
																	<input type="checkbox" id="cln3" value="3">
																	<label for="cln3"></label>
																	<input type="checkbox" id="cln4" value="4">
																	<label for="cln4"></label>
																	<input type="checkbox" id="cln5" value="5">
																	<label for="cln5"></label>
																</div>
															</div>
														</div>
														<div class="col-lg-4 responsive-column">
															<div class="rate-option-item">
																<label>Facilities</label>
																<div class="rate-stars-option">
																	<input type="checkbox" id="f1" value="1">
																	<label for="f1"></label>
																	<input type="checkbox" id="f2" value="2">
																	<label for="f2"></label>
																	<input type="checkbox" id="f3" value="3">
																	<label for="f3"></label>
																	<input type="checkbox" id="f4" value="4">
																	<label for="f4"></label>
																	<input type="checkbox" id="f5" value="5">
																	<label for="f5"></label>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="contact-form-action">
													<form method="post">
														<div class="row">
															<div class="col-lg-6 responsive-column">
																<div class="input-box">
																	<label class="label-text">Name</label>
																	<div class="form-group">
																		<span class="la la-user form-icon"></span>
																		<input class="form-control" type="text" name="text" placeholder="Your name">
																	</div>
																</div>
															</div>
															<div class="col-lg-6 responsive-column">
																<div class="input-box">
																	<label class="label-text">Email</label>
																	<div class="form-group">
																		<span class="la la-envelope-o form-icon"></span>
																		<input class="form-control" type="email" name="email" placeholder="Email address">
																	</div>
																</div>
															</div>
															<div class="col-lg-12">
																<div class="input-box">
																	<label class="label-text">Message</label>
																	<div class="form-group">
																		<span class="la la-pencil form-icon"></span>
																		<textarea class="message-control form-control" name="message" placeholder="Write message"></textarea>
																	</div>
																</div>
															</div>
															<div class="col-lg-12">
																<div class="btn-box">
																	<button type="button" class="theme-btn">Leave a Review</button>
																</div>
															</div>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>-->
								</div>
							</div>
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
get_template_part('template-parts/hotel/hotel-related-items');

get_template_part('template-parts/footer/static-cta');
get_footer();
