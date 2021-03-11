<?php
	get_header();

$room_facilities = get_categories( array ( 'taxonomy' => 'room_facilities' ) );
$trizen_room_other_facility_data = get_post_meta(get_the_ID(), 'trizen_room_other_facility_data_group', true);
?>


<!-- ================================
    START ROOM DETAIL BREAD
================================= -->
<section class="room-detail-bread text-center">
<!--    <img src="https://techydevs.com/demos/themes/html/trizen-demo/trizen/images/img31.jpg" alt="">-->
	<div class="full-width-slider carousel-action">
		<div class="full-width-slide-item">
			<img src="https://techydevs.com/demos/themes/html/trizen-demo/trizen/images/img31.jpg" alt="">
		</div>
		<div class="full-width-slide-item">
			<img src="https://techydevs.com/demos/themes/html/trizen-demo/trizen/images/img31.jpg" alt="">
		</div>
		<div class="full-width-slide-item">
			<img src="https://techydevs.com/demos/themes/html/trizen-demo/trizen/images/img31.jpg" alt="">
		</div>
		<div class="full-width-slide-item">
			<img src="https://techydevs.com/demos/themes/html/trizen-demo/trizen/images/img31.jpg" alt="">
		</div>
		<div class="full-width-slide-item">
			<img src="https://techydevs.com/demos/themes/html/trizen-demo/trizen/images/img31.jpg" alt="">
		</div>
	</div>
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
							<li>
								<a data-scroll="services" href="#services" class="scroll-link">
									<?php esc_html_e('Services', 'trizen'); ?>
								</a>
							</li>
                            <?php if($room_facilities) { ?>
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
				<div class="col-lg-8">
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

                                get_template_part('template-parts/room/room-rules');
                                ?>
							</div>
							<div class="section-block"></div>
						</div>
                        <?php
                        if($trizen_room_other_facility_data) {
                            get_template_part('template-parts/room/room-other-facility');
                        }

                        if($room_facilities) {
	                        get_template_part( 'template-parts/room/room-amenities' );
                        }
                        ?>

						<div id="location-map" class="page-scroll">
							<div class="single-content-item padding-top-40px padding-bottom-40px">
								<h3 class="title font-size-20">
                                    <?php esc_html_e('Location', 'trizen'); ?>
                                </h3>
								<div class="map-container padding-top-30px">
									<div id="map"></div>
								</div>
							</div>
							<div class="section-block"></div>
						</div>
						<div id="reviews" class="page-scroll">
							<div class="single-content-item padding-top-40px padding-bottom-40px">
								<h3 class="title font-size-20">
                                    <?php esc_html_e('Reviews', 'trizen'); ?>
                                </h3>
								<div class="review-container padding-top-30px">
									<div class="row align-items-center">
										<div class="col-lg-4">
											<div class="review-summary">
												<h2>
                                                    <?php esc_html_e('4.5', 'trizen'); ?><span><?php esc_html_e('/5', 'trizen'); ?></span>
                                                </h2>
												<p>
                                                    <?php esc_html_e('Excellent', 'trizen'); ?>
                                                </p>
												<span>
                                                    <?php esc_html_e('Based on 4 reviews', 'trizen'); ?>
                                                </span>
											</div>
										</div>
										<div class="col-lg-8">
											<div class="review-bars">
												<div class="row">
													<div class="col-lg-6">
														<div class="progress-item">
															<h3 class="progressbar-title">
                                                                <?php esc_html_e('Service', 'trizen'); ?>
                                                            </h3>
															<div class="progressbar-content line-height-20 d-flex align-items-center justify-content-between">
																<div class="progressbar-box flex-shrink-0">
																	<div class="progressbar-line" data-percent="70%">
																		<div class="progressbar-line-item bar-bg-1"></div>
																	</div>
																</div>
																<div class="bar-percent">
                                                                    <?php esc_html_e('4.6', 'trizen'); ?>
                                                                </div>
															</div>
														</div>
													</div>
													<div class="col-lg-6">
														<div class="progress-item">
															<h3 class="progressbar-title">
                                                                <?php esc_html_e('Location', 'trizen'); ?>
                                                            </h3>
															<div class="progressbar-content line-height-20 d-flex align-items-center justify-content-between">
																<div class="progressbar-box flex-shrink-0">
																	<div class="progressbar-line" data-percent="55%">
																		<div class="progressbar-line-item bar-bg-2"></div>
																	</div>
																</div>
																<div class="bar-percent"><?php esc_html_e('4.7', 'trizen'); ?></div>
															</div>
														</div>
													</div>
													<div class="col-lg-6">
														<div class="progress-item">
															<h3 class="progressbar-title">
                                                                <?php esc_html_e('Value for Money', 'trizen'); ?>
                                                            </h3>
															<div class="progressbar-content line-height-20 d-flex align-items-center justify-content-between">
																<div class="progressbar-box flex-shrink-0">
																	<div class="progressbar-line" data-percent="40%">
																		<div class="progressbar-line-item bar-bg-3"></div>
																	</div>
																</div>
																<div class="bar-percent">
                                                                    <?php esc_html_e('2.6', 'trizen'); ?>
                                                                </div>
															</div>
														</div>
													</div>
													<div class="col-lg-6">
														<div class="progress-item">
															<h3 class="progressbar-title">
                                                                <?php esc_html_e('Cleanliness', 'trizen'); ?>
                                                            </h3>
															<div class="progressbar-content line-height-20 d-flex align-items-center justify-content-between">
																<div class="progressbar-box flex-shrink-0">
																	<div class="progressbar-line" data-percent="60%">
																		<div class="progressbar-line-item bar-bg-4"></div>
																	</div>
																</div>
																<div class="bar-percent">
                                                                    <?php esc_html_e('3.6', 'trizen'); ?>
                                                                </div>
															</div>
														</div>
													</div>
													<div class="col-lg-6">
														<div class="progress-item">
															<h3 class="progressbar-title">
                                                                <?php esc_html_e('Facilities', 'trizen'); ?>
                                                            </h3>
															<div class="progressbar-content line-height-20 d-flex align-items-center justify-content-between">
																<div class="progressbar-box flex-shrink-0">
																	<div class="progressbar-line" data-percent="50%">
																		<div class="progressbar-line-item bar-bg-5"></div>
																	</div>
																</div>
																<div class="bar-percent">
                                                                    <?php esc_html_e('2.6', 'trizen'); ?>
                                                                </div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="section-block"></div>
						</div>
						<div class="review-box">
							<div class="single-content-item padding-top-40px">
								<h3 class="title font-size-20">
                                    <?php esc_html_e('Showing 3 guest reviews', 'trizen'); ?>
                                </h3>
								<div class="comments-list comment-list padding-top-50px">
									<div class="comment comment-item">
										<div class="comment-avatar">
											<img class="avatar__img" alt="" src="https://techydevs.com/demos/themes/html/trizen-demo/trizen/images/team8.jpg">
										</div>
										<div class="comment-body">
											<div class="meta-data">
												<h3 class="comment__author">
                                                    <?php esc_html_e('Jenny Doe', 'trizen'); ?>
                                                </h3>
												<div class="meta-data-inner d-flex">
                                                    <span class="ratings d-flex align-items-center mr-1">
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                    </span>
													<p class="comment__date">
                                                        <?php esc_html_e('April 5, 2019', 'trizen'); ?>
                                                    </p>
												</div>
											</div>
											<p class="comment-content">
                                                <?php
                                                    esc_html_e('Lorem ipsum dolor sit amet, dolores mandamus moderatius ea ius, sed civibus vivendum imperdiet ei, amet tritani sea id. Ut veri diceret fierent mei, qui facilisi suavitate euripidis', 'trizen');
                                                ?>
											</p>
											<div class="comment-reply d-flex align-items-center justify-content-between">
												<a class="theme-btn" href="#" data-toggle="modal" data-target="#replayPopupForm">
													<span class="la la-mail-reply mr-1"></span><?php esc_html_e('Reply', 'trizen'); ?>
												</a>
												<div class="reviews-reaction">
													<a href="#" class="comment-like">
                                                        <i class="la la-thumbs-up"></i> <?php esc_html_e('13', 'trizen'); ?>
                                                    </a>
													<a href="#" class="comment-dislike">
                                                        <i class="la la-thumbs-down"></i> <?php esc_html_e('2', 'trizen'); ?>
                                                    </a>
													<a href="#" class="comment-love">
                                                        <i class="la la-heart-o"></i> <?php esc_html_e('5', 'trizen'); ?>
                                                    </a>
												</div>
											</div>
										</div>
									</div>
									<div class="comment comment-item comment-reply-item">
										<div class="comment-avatar">
											<img class="avatar__img" alt="" src="https://techydevs.com/demos/themes/html/trizen-demo/trizen/images/team8.jpg">
										</div>
										<div class="comment-body">
											<div class="meta-data">
												<h3 class="comment__author">
                                                    <?php esc_html_e('Jenny Doe', 'trizen'); ?>
                                                </h3>
												<div class="meta-data-inner d-flex">
                                                    <span class="ratings d-flex align-items-center mr-1">
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                    </span>
													<p class="comment__date">
                                                        <?php esc_html_e('April 5, 2019', 'trizen'); ?>
                                                    </p>
												</div>
											</div>
											<p class="comment-content">
												<?php esc_html_e('Lorem ipsum dolor sit amet, dolores mandamus moderatius ea ius, sed civibus vivendum imperdiet ei, amet tritani sea id. Ut veri diceret fierent mei, qui facilisi suavitate euripidis', 'trizen'); ?>
											</p>
											<div class="comment-reply d-flex align-items-center justify-content-between">
												<a class="theme-btn" href="#" data-toggle="modal" data-target="#replayPopupForm">
													<span class="la la-mail-reply mr-1"></span><?php esc_html_e('Reply', 'trizen'); ?>
												</a>
												<div class="reviews-reaction">
													<a href="#" class="comment-like">
                                                        <i class="la la-thumbs-up"></i> <?php esc_html_e('13', 'trizen'); ?>
                                                    </a>
													<a href="#" class="comment-dislike">
                                                        <i class="la la-thumbs-down"></i> <?php esc_html_e('2', 'trizen'); ?>
                                                    </a>
													<a href="#" class="comment-love">
                                                        <i class="la la-heart-o"></i> <?php esc_html_e('5', 'trizen'); ?>
                                                    </a>
												</div>
											</div>
										</div>
									</div>
									<div class="comment comment-item">
										<div class="comment-avatar">
											<img class="avatar__img" alt="" src="https://techydevs.com/demos/themes/html/trizen-demo/trizen/images/team8.jpg">
										</div>
										<div class="comment-body">
											<div class="meta-data">
												<h3 class="comment__author">
                                                    <?php esc_html_e('Jenny Doe', 'trizen'); ?>
                                                </h3>
												<div class="meta-data-inner d-flex">
                                                    <span class="ratings d-flex align-items-center mr-1">
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                    </span>
													<p class="comment__date">
                                                        <?php esc_html_e('April 5, 2019', 'trizen'); ?>
                                                    </p>
												</div>
											</div>
											<p class="comment-content">
												<?php esc_html_e('Lorem ipsum dolor sit amet, dolores mandamus moderatius ea ius, sed civibus vivendum imperdiet ei, amet tritani sea id. Ut veri diceret fierent mei, qui facilisi suavitate euripidis', 'trizen'); ?>
											</p>
											<div class="comment-reply d-flex align-items-center justify-content-between">
												<a class="theme-btn" href="#" data-toggle="modal" data-target="#replayPopupForm">
													<span class="la la-mail-reply mr-1"></span><?php esc_html_e('Reply', 'trizen'); ?>
												</a>
												<div class="reviews-reaction">
													<a href="#" class="comment-like">
                                                        <i class="la la-thumbs-up"></i> <?php esc_html_e('13', 'trizen'); ?>
                                                    </a>
													<a href="#" class="comment-dislike">
                                                        <i class="la la-thumbs-down"></i> <?php esc_html_e('2', 'trizen'); ?>
                                                    </a>
													<a href="#" class="comment-love">
                                                        <i class="la la-heart-o"></i> <?php esc_html_e('5', 'trizen'); ?>
                                                    </a>
												</div>
											</div>
										</div>
									</div>
									<div class="btn-box load-more text-center">
										<button class="theme-btn theme-btn-small theme-btn-transparent" type="button">
                                            <?php esc_html_e('Load More Review', 'trizen'); ?>
                                        </button>
									</div>
								</div>
								<div class="comment-forum padding-top-40px">
									<div class="form-box">
										<div class="form-title-wrap">
											<h3 class="title">
                                                <?php esc_html_e('Write a Review', 'trizen'); ?>
                                            </h3>
										</div>
										<div class="form-content">
											<div class="rate-option p-2">
												<div class="row">
													<div class="col-lg-4 responsive-column">
														<div class="rate-option-item">
															<label>
                                                                <?php esc_html_e('Service', 'trizen'); ?>
                                                            </label>
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
															<label><?php esc_html_e('Location', 'trizen'); ?></label>
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
															<label><?php esc_html_e('Value for Money', 'trizen'); ?></label>
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
															<label><?php esc_html_e('Cleanliness', 'trizen'); ?></label>
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
															<label><?php esc_html_e('Facilities', 'trizen'); ?></label>
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
																<label class="label-text" for="input-name"><?php esc_html_e('Name', 'trizen'); ?></label>
																<div class="form-group">
																	<span class="la la-user form-icon"></span>
																	<input id="input-name" class="form-control" type="text" name="text" placeholder="<?php esc_attr_e('Your name', 'trizen'); ?>">
																</div>
															</div>
														</div>
														<div class="col-lg-6 responsive-column">
															<div class="input-box">
																<label class="label-text" for="input-email">
                                                                    <?php esc_html_e('Email', 'trizen'); ?>
                                                                </label>
																<div class="form-group">
																	<span class="la la-envelope-o form-icon"></span>
																	<input id="input-email" class="form-control" type="email" name="email" placeholder="<?php esc_attr_e('Email address', 'trizen'); ?>">
																</div>
															</div>
														</div>
														<div class="col-lg-12">
															<div class="input-box">
																<label class="label-text" for="input-message">
                                                                    <?php esc_html_e('Message', 'trizen'); ?>
                                                                </label>
																<div class="form-group">
																	<span class="la la-pencil form-icon"></span>
																	<textarea id="input-message" class="message-control form-control" name="message" placeholder="<?php esc_attr_e('Write message', 'trizen'); ?>"></textarea>
																</div>
															</div>
														</div>
														<div class="col-lg-12">
															<div class="btn-box">
																<button type="button" class="theme-btn">
                                                                    <?php esc_html_e('Leave a Review', 'trizen'); ?>
                                                                </button>
															</div>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<?php get_sidebar('hotel_room'); ?>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- ================================
    END TOUR DETAIL AREA
================================= -->

<div class="section-block"></div>

<!-- ================================
    START RELATE TOUR AREA
================================= -->
<section class="related-tour-area section--padding">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="section-heading text-center">
					<h2 class="sec__title">
                        <?php esc_html_e('Other Rooms', 'trizen'); ?>
                    </h2>
					<p class="sec__desc">
                        <?php esc_html_e('Could also be interest for you', 'trizen'); ?>
                    </p>
				</div>
			</div>
		</div>
		<div class="row padding-top-50px">
			<div class="col-lg-6">
				<div class="card-item room-card">
					<div class="card-img-carousel carousel-action carousel--action">
						<div class="card-img">
							<a href="room-details.html" class="d-block">
								<img src="images/img5.jpg" alt="hotel-img">
							</a>
						</div>
						<div class="card-img">
							<a href="room-details.html" class="d-block">
								<img src="images/img29.jpg" alt="hotel-img">
							</a>
						</div>
						<div class="card-img">
							<a href="room-details.html" class="d-block">
								<img src="images/img30.jpg" alt="hotel-img">
							</a>
						</div>
					</div>
					<div class="card-body">
						<div class="card-price pb-2">
							<p>
								<span class="price__from">From</span>
								<span class="price__num">$88.00</span>
							</p>
						</div>
						<h3 class="card-title font-size-26"><a href="room-details.html">Premium Lake View Room</a></h3>
						<p class="card-text pt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam asperiores commodi deleniti hic inventore laboriosam laborum molestias, non odit quaerat! Aperiam culpa facilis fuga impedit.</p>
						<div class="card-attributes pt-3 pb-4">
							<ul class="d-flex align-items-center">
								<li class="d-flex align-items-center"><i class="la la-bed"></i><span>2 Beds</span></li>
								<li class="d-flex align-items-center"><i class="la la-building"></i><span>24 ft<sup>2</sup></span></li>
								<li class="d-flex align-items-center"><i class="la la-bathtub"></i><span>2 Bathrooms</span></li>
							</ul>
						</div>
						<div class="card-btn d-flex align-items-center">
							<div class="btn-box">
								<a href="room-details.html" class="theme-btn theme-btn-transparent">Book Now</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="card-item room-card">
					<div class="card-img-carousel carousel-action carousel--action">
						<div class="card-img">
							<a href="room-details.html" class="d-block">
								<img src="images/img31.jpg" alt="hotel-img">
							</a>
						</div>
						<div class="card-img">
							<a href="room-details.html" class="d-block">
								<img src="images/img32.jpg" alt="hotel-img">
							</a>
						</div>
						<div class="card-img">
							<a href="room-details.html" class="d-block">
								<img src="images/img33.jpg" alt="hotel-img">
							</a>
						</div>
					</div>
					<div class="card-body">
						<div class="card-price pb-2">
							<p>
								<span class="price__from">From</span>
								<span class="price__num">$45.00</span>
							</p>
						</div>
						<h3 class="card-title font-size-26"><a href="room-details.html">Standard 2 Bed Male Dorm</a></h3>
						<p class="card-text pt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam asperiores commodi deleniti hic inventore laboriosam laborum molestias, non odit quaerat! Aperiam culpa facilis fuga impedit.</p>
						<div class="card-attributes pt-3 pb-4">
							<ul class="d-flex align-items-center">
								<li class="d-flex align-items-center"><i class="la la-bed"></i><span>2 Beds</span></li>
								<li class="d-flex align-items-center"><i class="la la-building"></i><span>24 ft<sup>2</sup></span></li>
								<li class="d-flex align-items-center"><i class="la la-bathtub"></i><span>2 Bathrooms</span></li>
							</ul>
						</div>
						<div class="card-btn d-flex align-items-center">
							<div class="btn-box">
								<a href="room-details.html" class="theme-btn theme-btn-transparent">Book Now</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- ================================
    END RELATE TOUR AREA
================================= -->


<?php
	get_footer();
?>
