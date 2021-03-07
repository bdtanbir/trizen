<?php
get_header();

get_template_part('inc/breadcrumb-simple');
$hotel_gallery = get_post_meta(get_the_ID(), 'trizen_hotel_image_gallery', true);
$hotel_address   = get_post_meta( get_the_ID(), 'trizen_hotel_address_title', true );
$hotel_video   = get_post_meta( get_the_ID(), 'trizen_hotel_video_url', true );

$breadcrumb_shape     = get_theme_mod('show_breadcrumb_overlay_shape', 1);
$hotel_video_btn_text = get_theme_mod('trizen_hotel_details_bdc_video_btn_txt', __('Video', 'trizen'));
$hotel_photo_btn_text = get_theme_mod('trizen_hotel_details_bdc_photo_btn_txt', __('More Photos', 'trizen'));

$hotel_regular_price = get_post_meta( get_the_ID(), 'trizen_hotel_regular_price', true );
$hotel_sale_price    = get_post_meta( get_the_ID(), 'trizen_hotel_sale_price', true );

if($breadcrumb_shape == 1) {
	$breadcrumb_shape_show = '';
} else {
	$breadcrumb_shape_show = 'hide-before';
}
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
									echo '<a class="d-none"
                                   data-fancybox="gallery"
                                   data-src="'.$image_src[0].'"
                                   data-caption="'.__('Showing image - ', 'trizen').$count++.'"
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
								<li><a data-scroll="description" href="#description" class="scroll-link active">Hotel Details</a></li>
								<li><a data-scroll="availability" href="#availability" class="scroll-link">Availability</a></li>
								<li><a data-scroll="amenities" href="#amenities" class="scroll-link">Amenities</a></li>
								<li><a data-scroll="faq" href="#faq" class="scroll-link">Faq</a></li>
								<li><a data-scroll="reviews" href="#reviews" class="scroll-link">Reviews</a></li>
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
                                            <p class="mr-2"><?php echo esc_html($hotel_address); ?></p>
                                        <?php } ?>
										<p>
											<span class="badge badge-warning text-white font-size-16">4.7</span>
											<span>(4,209 Reviews)</span>
										</p>
									</div>
								</div><!-- end single-content-item -->
								<div class="section-block"></div>
								<div class="single-content-item py-4">
									<div class="row">
										<div class="col-lg-4 responsive-column">
											<div class="single-tour-feature d-flex align-items-center mb-3">
												<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
													<i class="la la-hotel"></i>
												</div>
												<div class="single-feature-titles">
													<h3 class="title font-size-15 font-weight-medium">Hotel Type</h3>
													<span class="font-size-13">4 Star</span>
												</div>
											</div><!-- end single-tour-feature -->
										</div><!-- end col-lg-4 -->
										<div class="col-lg-4 responsive-column">
											<div class="single-tour-feature d-flex align-items-center mb-3">
												<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
													<i class="la la-user"></i>
												</div>
												<div class="single-feature-titles">
													<h3 class="title font-size-15 font-weight-medium">Extra People</h3>
													<span class="font-size-13">No Charge</span>
												</div>
											</div><!-- end single-tour-feature -->
										</div><!-- end col-lg-4 -->
										<div class="col-lg-4 responsive-column">
											<div class="single-tour-feature d-flex align-items-center mb-3">
												<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
													<i class="la la-bed"></i>
												</div>
												<div class="single-feature-titles">
													<h3 class="title font-size-15 font-weight-medium">Minimum Stay</h3>
													<span class="font-size-13">2 Nights</span>
												</div>
											</div><!-- end single-tour-feature -->
										</div><!-- end col-lg-4 -->
										<div class="col-lg-4 responsive-column">
											<div class="single-tour-feature d-flex align-items-center mb-3">
												<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
													<i class="la la-money"></i>
												</div>
												<div class="single-feature-titles">
													<h3 class="title font-size-15 font-weight-medium">Security Deposit</h3>
													<span class="font-size-13">$279</span>
												</div>
											</div><!-- end single-tour-feature -->
										</div><!-- end col-lg-4 -->
										<div class="col-lg-4 responsive-column">
											<div class="single-tour-feature d-flex align-items-center mb-3">
												<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
													<i class="la la-globe"></i>
												</div>
												<div class="single-feature-titles">
													<h3 class="title font-size-15 font-weight-medium">Country</h3>
													<span class="font-size-13">France</span>
												</div>
											</div><!-- end single-tour-feature -->
										</div><!-- end col-lg-4 -->
										<div class="col-lg-4 responsive-column">
											<div class="single-tour-feature d-flex align-items-center mb-3">
												<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
													<i class="la la-map"></i>
												</div>
												<div class="single-feature-titles">
													<h3 class="title font-size-15 font-weight-medium">City</h3>
													<span class="font-size-13">Paris</span>
												</div>
											</div><!-- end single-tour-feature -->
										</div><!-- end col-lg-4 -->
										<div class="col-lg-4 responsive-column">
											<div class="single-tour-feature d-flex align-items-center mb-3">
												<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
													<i class="la la-user"></i>
												</div>
												<div class="single-feature-titles">
													<h3 class="title font-size-15 font-weight-medium">Neighborhood</h3>
													<span class="font-size-13">République</span>
												</div>
											</div><!-- end single-tour-feature -->
										</div><!-- end col-lg-4 -->
										<div class="col-lg-4 responsive-column">
											<div class="single-tour-feature d-flex align-items-center mb-3">
												<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
													<i class="la la-times"></i>
												</div>
												<div class="single-feature-titles">
													<h3 class="title font-size-15 font-weight-medium">Cancellation</h3>
													<span class="font-size-13">Strict</span>
												</div>
											</div><!-- end single-tour-feature -->
										</div><!-- end col-lg-4 -->
									</div><!-- end row -->
								</div><!-- end single-content-item -->
								<div class="section-block"></div>
								<div class="single-content-item padding-top-40px padding-bottom-40px">
									<h3 class="title font-size-20">About Hilton Hotel and Resorts</h3>
									<p class="py-3">Per consequat adolescens ex, cu nibh commune temporibus vim, ad sumo viris eloquentiam sed. Mea appareat omittantur eloquentiam ad, nam ei quas oportere democritum. Prima causae admodum id est, ei timeam inimicus sed. Sit an meis aliquam, cetero inermis vel ut. An sit illum euismod facilisis, tamquam vulputate pertinacia eum at.</p>
									<p>Cum et probo menandri. Officiis consulatu pro et, ne sea sale invidunt, sed ut sint blandit efficiendi. Atomorum explicari eu qui, est enim quaerendum te. Quo harum viris id. Per ne quando dolore evertitur, pro ad cibo commune.</p>
								</div><!-- end single-content-item -->
								<div class="section-block"></div>
							</div><!-- end description -->
							<div id="availability" class="page-scroll">
								<div class="single-content-item padding-top-40px padding-bottom-30px">
									<h3 class="title font-size-20">Availability</h3>
									<div class="contact-form-action padding-bottom-35px">
										<form method="post">
											<div class="row">
												<div class="col-lg-6 responsive-column">
													<div class="input-box">
														<label class="label-text">Check in - Check out</label>
														<div class="form-group">
															<span class="la la-calendar form-icon"></span>
															<input class="date-range form-control" type="text" name="daterange">
														</div>
													</div>
												</div>
												<div class="col-lg-6 responsive-column">
													<div class="input-box">
														<label class="label-text">Rooms</label>
														<div class="form-group">
															<div class="select-contain w-auto">
																<select class="select-contain-select">
																	<option value="0">Select Rooms</option>
																	<option value="1">1 Room</option>
																	<option value="2">2 Rooms</option>
																	<option value="3">3 Rooms</option>
																	<option value="4">4 Rooms</option>
																	<option value="5">5 Rooms</option>
																	<option value="6">6 Rooms</option>
																	<option value="7">7 Rooms</option>
																	<option value="8">8 Rooms</option>
																	<option value="9">9 Rooms</option>
																	<option value="10">10 Rooms</option>
																	<option value="11">11 Rooms</option>
																	<option value="12">12 Rooms</option>
																	<option value="13">13 Rooms</option>
																	<option value="14">14 Rooms</option>
																</select>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-6 responsive-column">
													<div class="input-box">
														<label class="label-text">Adults (18+)</label>
														<div class="form-group">
															<div class="select-contain w-auto">
																<select class="select-contain-select">
																	<option value="0">Select Adults</option>
																	<option value="1">1 Adults</option>
																	<option value="2">2 Adults</option>
																	<option value="3">3 Adults</option>
																	<option value="4">4 Adults</option>
																	<option value="5">5 Adults</option>
																	<option value="6">6 Adults</option>
																	<option value="7">7 Adults</option>
																	<option value="8">8 Adults</option>
																	<option value="9">9 Adults</option>
																	<option value="10">10 Adults</option>
																	<option value="11">11 Adults</option>
																	<option value="12">12 Adults</option>
																	<option value="13">13 Adults</option>
																	<option value="14">14 Adults</option>
																</select>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-6 responsive-column">
													<div class="input-box">
														<label class="label-text">Children (0-17)</label>
														<div class="form-group">
															<div class="select-contain w-auto">
																<select class="select-contain-select">
																	<option value="0">Select Children</option>
																	<option value="1">1 Children</option>
																	<option value="2">2 Children</option>
																	<option value="3">3 Children</option>
																	<option value="4">4 Children</option>
																	<option value="5">5 Children</option>
																</select>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-12">
													<div class="btn-box">
														<button type="button" class="theme-btn">Search Now</button>
													</div>
												</div>
											</div>
										</form>
									</div><!-- end contact-form-action -->
									<h3 class="title font-size-20">Available Rooms</h3>
									<div class="cabin-type padding-top-30px">
										<div class="cabin-type-item seat-selection-item d-flex">
											<div class="cabin-type-img flex-shrink-0">
												<img src="images/inside-cabin.jpg" alt="">
											</div>
											<div class="cabin-type-detail">
												<h3 class="title">Standard Family Room</h3>
												<div class="row padding-top-20px">
													<div class="col-lg-6 responsive-column">
														<div class="single-tour-feature d-flex align-items-center mb-3">
															<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2">
																<i class="la la-wifi"></i>
															</div>
															<div class="single-feature-titles">
																<h3 class="title font-size-15 font-weight-medium">Free Wi-Fi</h3>
															</div>
														</div>
													</div><!-- end col-lg-6 -->
													<div class="col-lg-6 responsive-column">
														<div class="single-tour-feature d-flex align-items-center mb-3">
															<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2">
																<i class="la la-bed"></i>
															</div>
															<div class="single-feature-titles">
																<h3 class="title font-size-15 font-weight-medium">2 Single beds</h3>
															</div>
														</div>
													</div><!-- end col-lg-6 -->
													<div class="col-lg-6 responsive-column">
														<div class="single-tour-feature d-flex align-items-center mb-3">
															<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2">
																<i class="la la-building"></i>
															</div>
															<div class="single-feature-titles">
																<h3 class="title font-size-15 font-weight-medium">15 m²</h3>
															</div>
														</div>
													</div><!-- end col-lg-6 -->
													<div class="col-lg-6 responsive-column">
														<div class="single-tour-feature d-flex align-items-center mb-3">
															<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2">
																<i class="la la-hotel"></i>
															</div>
															<div class="single-feature-titles">
																<h3 class="title font-size-15 font-weight-medium">Shower and bathtub</h3>
															</div>
														</div>
													</div><!-- end col-lg-6 -->
												</div><!-- end row -->
												<div class="room-photos">
													<a class="btn theme-btn-hover-gray" data-src="images/img1.jpg"
													   data-fancybox="gallery"
													   data-caption="Showing image - 01"
													   data-speed="700">
														<i class="la la-photo mr-2"></i>Room Photos
													</a>
													<a class="d-none"
													   data-fancybox="gallery"
													   data-src="images/img2.jpg"
													   data-caption="Showing image - 02"
													   data-speed="700"></a>
													<a class="d-none"
													   data-fancybox="gallery"
													   data-src="images/img3.jpg"
													   data-caption="Showing image - 03"
													   data-speed="700"></a>
													<a class="d-none"
													   data-fancybox="gallery"
													   data-src="images/img4.jpg"
													   data-caption="Showing image - 04"
													   data-speed="700"></a>
												</div>
											</div>
											<div class="cabin-price">
												<p class="text-uppercase font-size-14">Per/night<strong class="mt-n1 text-black font-size-18 font-weight-black d-block">$121</strong></p>
												<div class="custom-checkbox mb-0">
													<input type="checkbox" id="selectChb1">
													<label for="selectChb1" class="theme-btn theme-btn-small">Select</label>
												</div>
											</div>
										</div><!-- end cabin-type-item -->
									</div><!-- end cabin-type -->
									<div class="cabin-type padding-top-30px">
										<div class="cabin-type-item seat-selection-item d-flex">
											<div class="cabin-type-img flex-shrink-0">
												<img src="images/oceanview-cabin.jpg" alt="">
											</div>
											<div class="cabin-type-detail">
												<h3 class="title">Superior Double Room</h3>
												<div class="row padding-top-20px">
													<div class="col-lg-6 responsive-column">
														<div class="single-tour-feature d-flex align-items-center mb-3">
															<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2">
																<i class="la la-wifi"></i>
															</div>
															<div class="single-feature-titles">
																<h3 class="title font-size-15 font-weight-medium">Free Wi-Fi</h3>
															</div>
														</div>
													</div><!-- end col-lg-6 -->
													<div class="col-lg-6 responsive-column">
														<div class="single-tour-feature d-flex align-items-center mb-3">
															<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2">
																<i class="la la-bed"></i>
															</div>
															<div class="single-feature-titles">
																<h3 class="title font-size-15 font-weight-medium">2 Single beds</h3>
															</div>
														</div>
													</div><!-- end col-lg-6 -->
													<div class="col-lg-6 responsive-column">
														<div class="single-tour-feature d-flex align-items-center mb-3">
															<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2">
																<i class="la la-building"></i>
															</div>
															<div class="single-feature-titles">
																<h3 class="title font-size-15 font-weight-medium">15 m²</h3>
															</div>
														</div>
													</div><!-- end col-lg-6 -->
													<div class="col-lg-6 responsive-column">
														<div class="single-tour-feature d-flex align-items-center mb-3">
															<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2">
																<i class="la la-hotel"></i>
															</div>
															<div class="single-feature-titles">
																<h3 class="title font-size-15 font-weight-medium">Shower and bathtub</h3>
															</div>
														</div>
													</div><!-- end col-lg-6 -->
												</div><!-- end row -->
												<div class="room-photos">
													<a class="btn theme-btn-hover-gray" data-src="images/img1.jpg"
													   data-fancybox="gallery"
													   data-caption="Showing image - 01"
													   data-speed="700">
														<i class="la la-photo mr-2"></i>Room Photos
													</a>
													<a class="d-none"
													   data-fancybox="gallery"
													   data-src="images/img2.jpg"
													   data-caption="Showing image - 02"
													   data-speed="700"></a>
													<a class="d-none"
													   data-fancybox="gallery"
													   data-src="images/img3.jpg"
													   data-caption="Showing image - 03"
													   data-speed="700"></a>
													<a class="d-none"
													   data-fancybox="gallery"
													   data-src="images/img4.jpg"
													   data-caption="Showing image - 04"
													   data-speed="700"></a>
												</div>
											</div>
											<div class="cabin-price">
												<p class="text-uppercase font-size-14">Per/night<strong class="mt-n1 text-black font-size-18 font-weight-black d-block">$121</strong></p>
												<div class="custom-checkbox mb-0">
													<input type="checkbox" id="selectChb2">
													<label for="selectChb2" class="theme-btn theme-btn-small">Select</label>
												</div>
											</div>
										</div><!-- end cabin-type-item -->
									</div><!-- end cabin-type -->
									<div class="cabin-type padding-top-30px">
										<div class="cabin-type-item seat-selection-item d-flex">
											<div class="cabin-type-img flex-shrink-0">
												<img src="images/balcony-cabin.jpg" alt="">
											</div>
											<div class="cabin-type-detail">
												<h3 class="title">Deluxe Single Room</h3>
												<div class="row padding-top-20px">
													<div class="col-lg-6 responsive-column">
														<div class="single-tour-feature d-flex align-items-center mb-3">
															<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2">
																<i class="la la-wifi"></i>
															</div>
															<div class="single-feature-titles">
																<h3 class="title font-size-15 font-weight-medium">Free Wi-Fi</h3>
															</div>
														</div>
													</div><!-- end col-lg-6 -->
													<div class="col-lg-6 responsive-column">
														<div class="single-tour-feature d-flex align-items-center mb-3">
															<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2">
																<i class="la la-bed"></i>
															</div>
															<div class="single-feature-titles">
																<h3 class="title font-size-15 font-weight-medium">2 Single beds</h3>
															</div>
														</div>
													</div><!-- end col-lg-6 -->
													<div class="col-lg-6 responsive-column">
														<div class="single-tour-feature d-flex align-items-center mb-3">
															<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2">
																<i class="la la-building"></i>
															</div>
															<div class="single-feature-titles">
																<h3 class="title font-size-15 font-weight-medium">15 m²</h3>
															</div>
														</div>
													</div><!-- end col-lg-6 -->
													<div class="col-lg-6 responsive-column">
														<div class="single-tour-feature d-flex align-items-center mb-3">
															<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2">
																<i class="la la-hotel"></i>
															</div>
															<div class="single-feature-titles">
																<h3 class="title font-size-15 font-weight-medium">Shower and bathtub</h3>
															</div>
														</div>
													</div><!-- end col-lg-6 -->
												</div><!-- end row -->
												<div class="room-photos">
													<a class="btn theme-btn-hover-gray" data-src="images/img1.jpg"
													   data-fancybox="gallery"
													   data-caption="Showing image - 01"
													   data-speed="700">
														<i class="la la-photo mr-2"></i>Room Photos
													</a>
													<a class="d-none"
													   data-fancybox="gallery"
													   data-src="images/img2.jpg"
													   data-caption="Showing image - 02"
													   data-speed="700"></a>
													<a class="d-none"
													   data-fancybox="gallery"
													   data-src="images/img3.jpg"
													   data-caption="Showing image - 03"
													   data-speed="700"></a>
													<a class="d-none"
													   data-fancybox="gallery"
													   data-src="images/img4.jpg"
													   data-caption="Showing image - 04"
													   data-speed="700"></a>
												</div>
											</div>
											<div class="cabin-price">
												<p class="text-uppercase font-size-14">Per/night<strong class="mt-n1 text-black font-size-18 font-weight-black d-block">$121</strong></p>
												<div class="custom-checkbox mb-0">
													<input type="checkbox" id="selectChb3">
													<label for="selectChb3" class="theme-btn theme-btn-small">Select</label>
												</div>
											</div>
										</div><!-- end cabin-type-item -->
									</div><!-- end cabin-type -->
									<div class="cabin-type padding-top-30px">
										<div class="cabin-type-item seat-selection-item d-flex">
											<div class="cabin-type-img flex-shrink-0">
												<img src="images/suite-cabin.jpg" alt="">
											</div>
											<div class="cabin-type-detail">
												<h3 class="title">Single Bed Room</h3>
												<div class="row padding-top-20px">
													<div class="col-lg-6 responsive-column">
														<div class="single-tour-feature d-flex align-items-center mb-3">
															<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2">
																<i class="la la-wifi"></i>
															</div>
															<div class="single-feature-titles">
																<h3 class="title font-size-15 font-weight-medium">Free Wi-Fi</h3>
															</div>
														</div>
													</div><!-- end col-lg-6 -->
													<div class="col-lg-6 responsive-column">
														<div class="single-tour-feature d-flex align-items-center mb-3">
															<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2">
																<i class="la la-bed"></i>
															</div>
															<div class="single-feature-titles">
																<h3 class="title font-size-15 font-weight-medium">1 Single beds</h3>
															</div>
														</div>
													</div><!-- end col-lg-6 -->
													<div class="col-lg-6 responsive-column">
														<div class="single-tour-feature d-flex align-items-center mb-3">
															<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2">
																<i class="la la-building"></i>
															</div>
															<div class="single-feature-titles">
																<h3 class="title font-size-15 font-weight-medium">15 m²</h3>
															</div>
														</div>
													</div><!-- end col-lg-6 -->
													<div class="col-lg-6 responsive-column">
														<div class="single-tour-feature d-flex align-items-center mb-3">
															<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2">
																<i class="la la-hotel"></i>
															</div>
															<div class="single-feature-titles">
																<h3 class="title font-size-15 font-weight-medium">Shower and bathtub</h3>
															</div>
														</div>
													</div><!-- end col-lg-6 -->
												</div><!-- end row -->
												<div class="room-photos">
													<a class="btn theme-btn-hover-gray" data-src="images/img1.jpg"
													   data-fancybox="gallery"
													   data-caption="Showing image - 01"
													   data-speed="700">
														<i class="la la-photo mr-2"></i>Room Photos
													</a>
													<a class="d-none"
													   data-fancybox="gallery"
													   data-src="images/img2.jpg"
													   data-caption="Showing image - 02"
													   data-speed="700"></a>
													<a class="d-none"
													   data-fancybox="gallery"
													   data-src="images/img3.jpg"
													   data-caption="Showing image - 03"
													   data-speed="700"></a>
													<a class="d-none"
													   data-fancybox="gallery"
													   data-src="images/img4.jpg"
													   data-caption="Showing image - 04"
													   data-speed="700"></a>
												</div>
											</div>
											<div class="cabin-price">
												<p class="text-uppercase font-size-14">Per/night<strong class="mt-n1 text-black font-size-18 font-weight-black d-block">$121</strong></p>
												<div class="custom-checkbox mb-0">
													<input type="checkbox" id="selectChb4">
													<label for="selectChb4" class="theme-btn theme-btn-small">Select</label>
												</div>
											</div>
										</div><!-- end cabin-type-item -->
									</div><!-- end cabin-type -->
								</div><!-- end single-content-item -->
								<div class="section-block"></div>
							</div><!-- end location-map -->
							<div id="amenities" class="page-scroll">
								<div class="single-content-item padding-top-40px padding-bottom-20px">
									<h3 class="title font-size-20">Amenities</h3>
									<div class="amenities-feature-item pt-4">
										<div class="row">
											<div class="col-lg-4 responsive-column">
												<div class="single-tour-feature d-flex align-items-center mb-3">
													<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
														<i class="la la-wifi"></i>
													</div>
													<div class="single-feature-titles">
														<h3 class="title font-size-15 font-weight-medium">WI-FI</h3>
													</div>
												</div><!-- end single-tour-feature -->
											</div><!-- end col-lg-4 -->
											<div class="col-lg-4 responsive-column">
												<div class="single-tour-feature d-flex align-items-center mb-3">
													<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
														<i class="la la-check"></i>
													</div>
													<div class="single-feature-titles">
														<h3 class="title font-size-15 font-weight-medium">Swimming Pool</h3>
													</div>
												</div><!-- end single-tour-feature -->
											</div><!-- end col-lg-4 -->
											<div class="col-lg-4 responsive-column">
												<div class="single-tour-feature d-flex align-items-center mb-3">
													<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
														<i class="la la-television"></i>
													</div>
													<div class="single-feature-titles">
														<h3 class="title font-size-15 font-weight-medium">Television</h3>
													</div>
												</div><!-- end single-tour-feature -->
											</div><!-- end col-lg-4 -->
											<div class="col-lg-4 responsive-column">
												<div class="single-tour-feature d-flex align-items-center mb-3">
													<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
														<i class="la la-coffee"></i>
													</div>
													<div class="single-feature-titles">
														<h3 class="title font-size-15 font-weight-medium">Coffee</h3>
													</div>
												</div><!-- end single-tour-feature -->
											</div><!-- end col-lg-4 -->
											<div class="col-lg-4 responsive-column">
												<div class="single-tour-feature d-flex align-items-center mb-3">
													<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
														<i class="la la-tree"></i>
													</div>
													<div class="single-feature-titles">
														<h3 class="title font-size-15 font-weight-medium">Air Conditioning</h3>
													</div>
												</div><!-- end single-tour-feature -->
											</div><!-- end col-lg-4 -->
											<div class="col-lg-4 responsive-column">
												<div class="single-tour-feature d-flex align-items-center mb-3">
													<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
														<i class="la la-gear"></i>
													</div>
													<div class="single-feature-titles">
														<h3 class="title font-size-15 font-weight-medium">Fitness Facility</h3>
													</div>
												</div><!-- end single-tour-feature -->
											</div><!-- end col-lg-4 -->
											<div class="col-lg-4 responsive-column">
												<div class="single-tour-feature d-flex align-items-center mb-3">
													<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
														<i class="la la-check"></i>
													</div>
													<div class="single-feature-titles">
														<h3 class="title font-size-15 font-weight-medium">Fridge</h3>
													</div>
												</div><!-- end single-tour-feature -->
											</div><!-- end col-lg-4 -->
											<div class="col-lg-4 responsive-column">
												<div class="single-tour-feature d-flex align-items-center mb-3">
													<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
														<i class="la la-glass"></i>
													</div>
													<div class="single-feature-titles">
														<h3 class="title font-size-15 font-weight-medium">Wine Bar</h3>
													</div>
												</div><!-- end single-tour-feature -->
											</div><!-- end col-lg-4 -->
											<div class="col-lg-4 responsive-column">
												<div class="single-tour-feature d-flex align-items-center mb-3">
													<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
														<i class="la la-music"></i>
													</div>
													<div class="single-feature-titles">
														<h3 class="title font-size-15 font-weight-medium">Entertainment</h3>
													</div>
												</div><!-- end single-tour-feature -->
											</div><!-- end col-lg-4 -->
											<div class="col-lg-4 responsive-column">
												<div class="single-tour-feature d-flex align-items-center mb-3">
													<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
														<i class="la la-lock"></i>
													</div>
													<div class="single-feature-titles">
														<h3 class="title font-size-15 font-weight-medium">Secure Vault</h3>
													</div>
												</div><!-- end single-tour-feature -->
											</div><!-- end col-lg-4 -->
											<div class="col-lg-4 responsive-column">
												<div class="single-tour-feature d-flex align-items-center mb-3">
													<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
														<i class="la la-car"></i>
													</div>
													<div class="single-feature-titles">
														<h3 class="title font-size-15 font-weight-medium">Pick And Drop</h3>
													</div>
												</div><!-- end single-tour-feature -->
											</div><!-- end col-lg-4 -->
											<div class="col-lg-4 responsive-column">
												<div class="single-tour-feature d-flex align-items-center mb-3">
													<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
														<i class="la la-check"></i>
													</div>
													<div class="single-feature-titles">
														<h3 class="title font-size-15 font-weight-medium">Room Service</h3>
													</div>
												</div><!-- end single-tour-feature -->
											</div><!-- end col-lg-4 -->
											<div class="col-lg-4 responsive-column">
												<div class="single-tour-feature d-flex align-items-center mb-3">
													<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
														<i class="la la-check-circle"></i>
													</div>
													<div class="single-feature-titles">
														<h3 class="title font-size-15 font-weight-medium">Pets Allowed</h3>
													</div>
												</div><!-- end single-tour-feature -->
											</div><!-- end col-lg-4 -->
											<div class="col-lg-4 responsive-column">
												<div class="single-tour-feature d-flex align-items-center mb-3">
													<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
														<i class="la la-coffee"></i>
													</div>
													<div class="single-feature-titles">
														<h3 class="title font-size-15 font-weight-medium">Breakfast</h3>
													</div>
												</div><!-- end single-tour-feature -->
											</div><!-- end col-lg-4 -->
											<div class="col-lg-4 responsive-column">
												<div class="single-tour-feature d-flex align-items-center mb-3">
													<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
														<i class="la la-car"></i>
													</div>
													<div class="single-feature-titles">
														<h3 class="title font-size-15 font-weight-medium">Free Parking</h3>
													</div>
												</div><!-- end single-tour-feature -->
											</div><!-- end col-lg-4 -->
											<div class="col-lg-4 responsive-column">
												<div class="single-tour-feature d-flex align-items-center mb-3">
													<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
														<i class="la la-fire"></i>
													</div>
													<div class="single-feature-titles">
														<h3 class="title font-size-15 font-weight-medium">Fire Place</h3>
													</div>
												</div><!-- end single-tour-feature -->
											</div><!-- end col-lg-4 -->
											<div class="col-lg-4 responsive-column">
												<div class="single-tour-feature d-flex align-items-center mb-3">
													<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
														<i class="la la-wheelchair"></i>
													</div>
													<div class="single-feature-titles">
														<h3 class="title font-size-15 font-weight-medium">Handicap Accessible</h3>
													</div>
												</div><!-- end single-tour-feature -->
											</div><!-- end col-lg-4 -->
											<div class="col-lg-4 responsive-column">
												<div class="single-tour-feature d-flex align-items-center mb-3">
													<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
														<i class="la la-user-secret"></i>
													</div>
													<div class="single-feature-titles">
														<h3 class="title font-size-15 font-weight-medium">Doorman</h3>
													</div>
												</div><!-- end single-tour-feature -->
											</div><!-- end col-lg-4 -->
											<div class="col-lg-4 responsive-column">
												<div class="single-tour-feature d-flex align-items-center mb-3">
													<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
														<i class="la la-building"></i>
													</div>
													<div class="single-feature-titles">
														<h3 class="title font-size-15 font-weight-medium">Elevator In Building</h3>
													</div>
												</div><!-- end single-tour-feature -->
											</div><!-- end col-lg-4 -->
											<div class="col-lg-4 responsive-column">
												<div class="single-tour-feature d-flex align-items-center mb-3">
													<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
														<i class="la la-gift"></i>
													</div>
													<div class="single-feature-titles">
														<h3 class="title font-size-15 font-weight-medium">Suitable For Events</h3>
													</div>
												</div><!-- end single-tour-feature -->
											</div><!-- end col-lg-4 -->
											<div class="col-lg-4 responsive-column">
												<div class="single-tour-feature d-flex align-items-center mb-3">
													<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
														<i class="la la-gamepad"></i>
													</div>
													<div class="single-feature-titles">
														<h3 class="title font-size-15 font-weight-medium">Play Place</h3>
													</div>
												</div><!-- end single-tour-feature -->
											</div><!-- end col-lg-4 -->
										</div><!-- end row -->
									</div>
								</div><!-- end single-content-item -->
								<div class="section-block"></div>
							</div><!-- end faq -->
							<div id="faq" class="page-scroll">
								<div class="single-content-item padding-top-40px padding-bottom-40px">
									<h3 class="title font-size-20">FAQs</h3>
									<div class="accordion accordion-item padding-top-30px" id="accordionExample2">
										<div class="card">
											<div class="card-header" id="faqHeadingFour">
												<h2 class="mb-0">
													<button class="btn btn-link d-flex align-items-center justify-content-end flex-row-reverse font-size-16" type="button" data-toggle="collapse" data-target="#faqCollapseFour" aria-expanded="true" aria-controls="faqCollapseFour">
														<span class="ml-3">How do I know a reservation is accepted or confirmed?</span>
														<i class="la la-minus"></i>
														<i class="la la-plus"></i>
													</button>
												</h2>
											</div>
											<div id="faqCollapseFour" class="collapse show" aria-labelledby="faqHeadingFour" data-parent="#accordionExample2">
												<div class="card-body d-flex">
													<p>Mea appareat omittantur eloquentiam ad, nam ei quas oportere democritum. Prima causae admodum id est, ei timeam inimicus sed. Sit an meis aliquam, cetero inermis vel ut. An sit illum euismod facilisis Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
												</div>
											</div>
										</div><!-- end card -->
										<div class="card">
											<div class="card-header" id="faqHeadingFive">
												<h2 class="mb-0">
													<button class="btn btn-link d-flex align-items-center justify-content-end flex-row-reverse font-size-16" type="button" data-toggle="collapse" data-target="#faqCollapseFive" aria-expanded="false" aria-controls="faqCollapseFive">
														<span class="ml-3">Am I allowed to decline reservation requests?</span>
														<i class="la la-minus"></i>
														<i class="la la-plus"></i>
													</button>
												</h2>
											</div>
											<div id="faqCollapseFive" class="collapse" aria-labelledby="faqHeadingFive" data-parent="#accordionExample2">
												<div class="card-body d-flex">
													<p>Mea appareat omittantur eloquentiam ad, nam ei quas oportere democritum. Prima causae admodum id est, ei timeam inimicus sed. Sit an meis aliquam, cetero inermis vel ut. An sit illum euismod facilisis Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
												</div>
											</div>
										</div><!-- end card -->
										<div class="card">
											<div class="card-header" id="faqHeadingSix">
												<h2 class="mb-0">
													<button class="btn btn-link d-flex align-items-center justify-content-end flex-row-reverse font-size-16" type="button" data-toggle="collapse" data-target="#faqCollapseSix" aria-expanded="false" aria-controls="faqCollapseSix">
														<span class="ml-3">What happens if I let a reservation request expire?</span>
														<i class="la la-minus"></i>
														<i class="la la-plus"></i>
													</button>
												</h2>
											</div>
											<div id="faqCollapseSix" class="collapse" aria-labelledby="faqHeadingSix" data-parent="#accordionExample2">
												<div class="card-body d-flex">
													<p>Mea appareat omittantur eloquentiam ad, nam ei quas oportere democritum. Prima causae admodum id est, ei timeam inimicus sed. Sit an meis aliquam, cetero inermis vel ut. An sit illum euismod facilisis Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
												</div>
											</div>
										</div><!-- end card -->
										<div class="card">
											<div class="card-header" id="faqHeadingSeven">
												<h2 class="mb-0">
													<button class="btn btn-link d-flex align-items-center justify-content-end flex-row-reverse font-size-16" type="button" data-toggle="collapse" data-target="#faqCollapseSeven" aria-expanded="false" aria-controls="faqCollapseSeven">
														<span class="ml-3">How do I set reservation requirements?</span>
														<i class="la la-minus"></i>
														<i class="la la-plus"></i>
													</button>
												</h2>
											</div>
											<div id="faqCollapseSeven" class="collapse" aria-labelledby="faqHeadingSeven" data-parent="#accordionExample2">
												<div class="card-body d-flex">
													<p>Mea appareat omittantur eloquentiam ad, nam ei quas oportere democritum. Prima causae admodum id est, ei timeam inimicus sed. Sit an meis aliquam, cetero inermis vel ut. An sit illum euismod facilisis Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
												</div>
											</div>
										</div><!-- end card -->
									</div>
								</div><!-- end single-content-item -->
								<div class="section-block"></div>
							</div><!-- end faq -->
							<div id="reviews" class="page-scroll">
								<div class="single-content-item padding-top-40px padding-bottom-40px">
									<h3 class="title font-size-20">Reviews</h3>
									<div class="review-container padding-top-30px">
										<div class="row align-items-center">
											<div class="col-lg-4">
												<div class="review-summary">
													<h2>4.5<span>/5</span></h2>
													<p>Excellent</p>
													<span>Based on 4 reviews</span>
												</div>
											</div><!-- end col-lg-4 -->
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
																		</div> <!-- End Skill Bar -->
																	</div>
																	<div class="bar-percent">4.6</div>
																</div>
															</div><!-- end progress-item -->
														</div><!-- end col-lg-6 -->
														<div class="col-lg-6">
															<div class="progress-item">
																<h3 class="progressbar-title">Location</h3>
																<div class="progressbar-content line-height-20 d-flex align-items-center justify-content-between">
																	<div class="progressbar-box flex-shrink-0">
																		<div class="progressbar-line" data-percent="55%">
																			<div class="progressbar-line-item bar-bg-2"></div>
																		</div> <!-- End Skill Bar -->
																	</div>
																	<div class="bar-percent">4.7</div>
																</div>
															</div><!-- end progress-item -->
														</div><!-- end col-lg-6 -->
														<div class="col-lg-6">
															<div class="progress-item">
																<h3 class="progressbar-title">Value for Money</h3>
																<div class="progressbar-content line-height-20 d-flex align-items-center justify-content-between">
																	<div class="progressbar-box flex-shrink-0">
																		<div class="progressbar-line" data-percent="40%">
																			<div class="progressbar-line-item bar-bg-3"></div>
																		</div> <!-- End Skill Bar -->
																	</div>
																	<div class="bar-percent">2.6</div>
																</div>
															</div><!-- end progress-item -->
														</div><!-- end col-lg-6 -->
														<div class="col-lg-6">
															<div class="progress-item">
																<h3 class="progressbar-title">Cleanliness</h3>
																<div class="progressbar-content line-height-20 d-flex align-items-center justify-content-between">
																	<div class="progressbar-box flex-shrink-0">
																		<div class="progressbar-line" data-percent="60%">
																			<div class="progressbar-line-item bar-bg-4"></div>
																		</div> <!-- End Skill Bar -->
																	</div>
																	<div class="bar-percent">3.6</div>
																</div>
															</div><!-- end progress-item -->
														</div><!-- end col-lg-6 -->
														<div class="col-lg-6">
															<div class="progress-item">
																<h3 class="progressbar-title">Facilities</h3>
																<div class="progressbar-content line-height-20 d-flex align-items-center justify-content-between">
																	<div class="progressbar-box flex-shrink-0">
																		<div class="progressbar-line" data-percent="50%">
																			<div class="progressbar-line-item bar-bg-5"></div>
																		</div> <!-- End Skill Bar -->
																	</div>
																	<div class="bar-percent">2.6</div>
																</div>
															</div><!-- end progress-item -->
														</div><!-- end col-lg-6 -->
													</div><!-- end row -->
												</div>
											</div><!-- end col-lg-8 -->
										</div>
									</div>
								</div><!-- end single-content-item -->
								<div class="section-block"></div>
							</div><!-- end reviews -->
							<div class="review-box">
								<div class="single-content-item padding-top-40px">
									<h3 class="title font-size-20">Showing 3 guest reviews</h3>
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
										</div><!-- end comments -->
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
										</div><!-- end comments -->
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
										</div><!-- end comments -->
										<div class="btn-box load-more text-center">
											<button class="theme-btn theme-btn-small theme-btn-transparent" type="button">Load More Review</button>
										</div>
									</div><!-- end comments-list -->
									<div class="comment-forum padding-top-40px">
										<div class="form-box">
											<div class="form-title-wrap">
												<h3 class="title">Write a Review</h3>
											</div><!-- form-title-wrap -->
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
														</div><!-- col-lg-4 -->
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
														</div><!-- col-lg-4 -->
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
														</div><!-- col-lg-4 -->
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
														</div><!-- col-lg-4 -->
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
														</div><!-- col-lg-4 -->
													</div><!-- end row -->
												</div><!-- end rate-option -->
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
												</div><!-- end contact-form-action -->
											</div><!-- end form-content -->
										</div><!-- end form-box -->
									</div><!-- end comment-forum -->
								</div><!-- end single-content-item -->
							</div><!-- end review-box -->
						</div><!-- end single-content-wrap -->
					</div><!-- end col-lg-8 -->
					<div class="col-lg-4">
						<div class="sidebar single-content-sidebar mb-0">
							<div class="sidebar-widget single-content-widget">
								<div class="sidebar-widget-item">
									<div class="sidebar-book-title-wrap mb-3">
										<h3><?php esc_html_e('Popular','trizen'); ?></h3>
                                        <?php
                                        if(!empty($hotel_regular_price) && !empty($hotel_sale_price)) { ?>
                                            <p>
                                                <span class="text-form"><?php esc_html_e('From', 'trizen'); ?></span>
                                                <span class="text-value ml-2 mr-1">$<?php echo esc_html($hotel_sale_price); ?></span>
                                                <span class="before-price">$<?php echo esc_html($hotel_regular_price); ?></span>
                                            </p>
                                        <?php } else {
                                            if(!empty($hotel_regular_price)) {
                                            ?>
                                                <p>
                                                    <span class="text-form"><?php esc_html_e('From', 'trizen'); ?></span>
                                                    <span class="text-value ml-2">$<?php echo esc_html($hotel_regular_price); ?></span>
                                                </p>
                                            <?php
                                            } else {
                                                if(!empty($hotel_sale_price) && empty($hotel_regular_price)) { ?>
                                                    <p>
                                                        <span class="text-form">
                                                            <?php esc_html_e('We are sorry! First add', 'trizen'); ?><strong><?php esc_html_e(' Regular Price', 'trizen'); ?></strong><?php esc_html_e(' and then sale price!', 'trizen'); ?>
                                                        </span>
                                                    </p>
                                                <?php
                                                }
                                            }
                                        }?>
									</div>
								</div>
								<div class="sidebar-widget-item">
									<div class="contact-form-action">
										<form action="#">
											<div class="input-box">
												<label class="label-text">Check in - Check out</label>
												<div class="form-group">
													<span class="la la-calendar form-icon"></span>
													<input class="date-range form-control" type="text" name="daterange">
												</div>
											</div>
											<div class="input-box">
												<label class="label-text">Rooms</label>
												<div class="form-group">
													<div class="select-contain w-auto">
														<select class="select-contain-select">
															<option value="0">Select Rooms</option>
															<option value="1">1 Room</option>
															<option value="2">2 Rooms</option>
															<option value="3">3 Rooms</option>
															<option value="4">4 Rooms</option>
															<option value="5">5 Rooms</option>
															<option value="6">6 Rooms</option>
															<option value="7">7 Rooms</option>
															<option value="8">8 Rooms</option>
															<option value="9">9 Rooms</option>
															<option value="10">10 Rooms</option>
															<option value="11">11 Rooms</option>
															<option value="12">12 Rooms</option>
															<option value="13">13 Rooms</option>
															<option value="14">14 Rooms</option>
														</select>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div><!-- end sidebar-widget-item -->
								<div class="sidebar-widget-item">
									<div class="qty-box mb-2 d-flex align-items-center justify-content-between">
										<label class="font-size-16">Adults <span>Age 18+</span></label>
										<div class="qtyBtn d-flex align-items-center">
											<div class="qtyDec"><i class="la la-minus"></i></div>
											<input type="text" name="qtyInput" value="0">
											<div class="qtyInc"><i class="la la-plus"></i></div>
										</div>
									</div><!-- end qty-box -->
									<div class="qty-box mb-2 d-flex align-items-center justify-content-between">
										<label class="font-size-16">Children <span>2-12 years old</span></label>
										<div class="qtyBtn d-flex align-items-center">
											<div class="qtyDec"><i class="la la-minus"></i></div>
											<input type="text" name="qtyInput" value="0">
											<div class="qtyInc"><i class="la la-plus"></i></div>
										</div>
									</div><!-- end qty-box -->
									<div class="qty-box mb-2 d-flex align-items-center justify-content-between">
										<label class="font-size-16">Infants <span>0-2 years old</span></label>
										<div class="qtyBtn d-flex align-items-center">
											<div class="qtyDec"><i class="la la-minus"></i></div>
											<input type="text" name="qtyInput" value="0">
											<div class="qtyInc"><i class="la la-plus"></i></div>
										</div>
									</div><!-- end qty-box -->
								</div><!-- end sidebar-widget-item -->
								<div class="btn-box pt-2">
									<a href="tour-booking.html" class="theme-btn text-center w-100 mb-2"><i class="la la-shopping-cart mr-2 font-size-18"></i>Book Now</a>
									<a href="#" class="theme-btn text-center w-100 theme-btn-transparent"><i class="la la-heart-o mr-2"></i>Add to Wishlist</a>
									<div class="d-flex align-items-center justify-content-between pt-2">
										<a href="#" class="btn theme-btn-hover-gray font-size-15" data-toggle="modal" data-target="#sharePopupForm"><i class="la la-share mr-1"></i>Share</a>
										<p><i class="la la-eye mr-1 font-size-15 color-text-2"></i>3456</p>
									</div>
								</div>
							</div><!-- end sidebar-widget -->
							<div class="sidebar-widget single-content-widget">
								<h3 class="title stroke-shape">Enquiry Form</h3>
								<div class="enquiry-forum">
									<div class="form-box">
										<div class="form-content">
											<div class="contact-form-action">
												<form method="post">
													<div class="input-box">
														<label class="label-text">Your Name</label>
														<div class="form-group">
															<span class="la la-user form-icon"></span>
															<input class="form-control" type="text" name="text" placeholder="Your name">
														</div>
													</div>
													<div class="input-box">
														<label class="label-text">Your Email</label>
														<div class="form-group">
															<span class="la la-envelope-o form-icon"></span>
															<input class="form-control" type="email" name="email" placeholder="Email address">
														</div>
													</div>
													<div class="input-box">
														<label class="label-text">Message</label>
														<div class="form-group">
															<span class="la la-pencil form-icon"></span>
															<textarea class="message-control form-control" name="message" placeholder="Write message"></textarea>
														</div>
													</div>
													<div class="input-box">
														<div class="form-group">
															<div class="custom-checkbox mb-0">
																<input type="checkbox" id="agreeChb">
																<label for="agreeChb">I agree with <a href="#">Terms of Service</a> and
																	<a href="#">Privacy Statement</a></label>
															</div>
														</div>
													</div>
													<div class="btn-box">
														<button type="button" class="theme-btn">Submit Enquiry</button>
													</div>
												</form>
											</div><!-- end contact-form-action -->
										</div><!-- end form-content -->
									</div><!-- end form-box -->
								</div><!-- end enquiry-forum -->
							</div><!-- end sidebar-widget -->
							<div class="sidebar-widget single-content-widget">
								<h3 class="title stroke-shape">Why Book With Us?</h3>
								<div class="sidebar-list">
									<ul class="list-items">
										<li><i class="la la-dollar icon-element mr-2"></i>No-hassle best price guarantee</li>
										<li><i class="la la-microphone icon-element mr-2"></i>Customer care available 24/7</li>
										<li><i class="la la-thumbs-up icon-element mr-2"></i>Hand-picked Tours & Activities</li>
										<li><i class="la la-file-text icon-element mr-2"></i>Free Travel Insureance</li>
									</ul>
								</div><!-- end sidebar-list -->
							</div><!-- end sidebar-widget -->
							<div class="sidebar-widget single-content-widget">
								<h3 class="title stroke-shape">Get a Question?</h3>
								<p class="font-size-14 line-height-24">Do not hesitate to give us a call. We are an expert team and we are happy to talk to you.</p>
								<div class="sidebar-list pt-3">
									<ul class="list-items">
										<li><i class="la la-phone icon-element mr-2"></i><a href="#">+ 61 23 8093 3400</a></li>
										<li><i class="la la-envelope icon-element mr-2"></i><a href="mailto:info@trizen.com">info@trizen.com</a></li>
									</ul>
								</div><!-- end sidebar-list -->
							</div><!-- end sidebar-widget -->
							<div class="sidebar-widget single-content-widget">
								<h3 class="title stroke-shape">Organized by</h3>
								<div class="author-content">
									<div class="d-flex">
										<div class="author-img">
											<a href="#"><img src="images/team8.jpg" alt="testimonial image"></a>
										</div>
										<div class="author-bio">
											<h4 class="author__title"><a href="#">royaltravelagency</a></h4>
											<span class="author__meta">Member Since 2017</span>
											<span class="ratings d-flex align-items-center">
	                                            <i class="la la-star"></i>
	                                            <i class="la la-star"></i>
	                                            <i class="la la-star"></i>
	                                            <i class="la la-star"></i>
	                                            <i class="la la-star-o"></i>
	                                            <span class="ml-2">305 Reviews</span>
	                                        </span>
											<div class="btn-box pt-3">
												<a href="#" class="theme-btn theme-btn-small theme-btn-transparent">Ask a Question</a>
											</div>
										</div>
									</div>
								</div>
							</div><!-- end sidebar-widget -->
						</div><!-- end sidebar -->
					</div><!-- end col-lg-4 -->
				</div><!-- end row -->
			</div><!-- end container -->
		</div><!-- end single-content-box -->
	</section>
	<!-- ================================
	    END TOUR DETAIL AREA
	================================= -->

<?php
get_template_part('template-parts/hotel/hotel-related-items');

get_template_part('template-parts/footer/static-cta');
get_footer();
