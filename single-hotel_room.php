<?php
	get_header();
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
							<li>
								<a data-scroll="amenities" href="#amenities" class="scroll-link">
									<?php esc_html_e('Amenities', 'trizen'); ?>
								</a>
							</li>
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
                                ?>
								<h3 class="title font-size-15 font-weight-medium pb-3">
                                    <?php esc_html_e('House Rules', 'trizen'); ?>
                                </h3>
								<ul class="list-items">
									<li>
                                        <i class="la la-dot-circle mr-2"></i><?php esc_html_e('No smoking, parties or events.', 'trizen'); ?>
                                    </li>
									<li>
                                        <i class="la la-dot-circle mr-2"></i><?php esc_html_e('Check-in time is 2 PM - 4 PM and check-out by 10 AM.', 'trizen'); ?>
                                    </li>
								</ul>
							</div>
							<div class="section-block"></div>
						</div>
						<div id="services" class="page-scroll">
							<div class="single-content-item padding-top-40px padding-bottom-40px">
								<h3 class="title font-size-20">
                                    <?php esc_html_e('Services', 'trizen'); ?>
                                </h3>
								<div class="row pt-4">
									<div class="col-lg-4 responsive-column">
										<div class="single-tour-feature d-flex align-items-center mb-3">
											<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
												<i class="la la-check-circle"></i>
											</div>
											<div class="single-feature-titles">
												<h3 class="title font-size-15 font-weight-medium">
                                                    <?php esc_html_e('Bicycle Hire', 'trizen'); ?>
                                                </h3>
											</div>
										</div>
									</div>
									<div class="col-lg-4 responsive-column">
										<div class="single-tour-feature d-flex align-items-center mb-3">
											<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
												<i class="la la-check-circle"></i>
											</div>
											<div class="single-feature-titles">
												<h3 class="title font-size-15 font-weight-medium">
                                                    <?php esc_html_e('Conference Rooms', 'trizen'); ?>
                                                </h3>
											</div>
										</div>
									</div>
									<div class="col-lg-4 responsive-column">
										<div class="single-tour-feature d-flex align-items-center mb-3">
											<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
												<i class="la la-check-circle"></i>
											</div>
											<div class="single-feature-titles">
												<h3 class="title font-size-15 font-weight-medium">
                                                    <?php esc_html_e('Fruit Basket', 'trizen'); ?>
                                                </h3>
											</div>
										</div>
									</div>
									<div class="col-lg-4 responsive-column">
										<div class="single-tour-feature d-flex align-items-center mb-3">
											<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
												<i class="la la-check-circle"></i>
											</div>
											<div class="single-feature-titles">
												<h3 class="title font-size-15 font-weight-medium">
                                                    <?php esc_html_e('Massage', 'trizen'); ?>
                                                </h3>
											</div>
										</div>
									</div>
									<div class="col-lg-4 responsive-column">
										<div class="single-tour-feature d-flex align-items-center mb-3">
											<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
												<i class="la la-check-circle"></i>
											</div>
											<div class="single-feature-titles">
												<h3 class="title font-size-15 font-weight-medium">
                                                    <?php esc_html_e('Sightseeing', 'trizen'); ?>
                                                </h3>
											</div>
										</div>
									</div>
									<div class="col-lg-4 responsive-column">
										<div class="single-tour-feature d-flex align-items-center mb-3">
											<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
												<i class="la la-check-circle"></i>
											</div>
											<div class="single-feature-titles">
												<h3 class="title font-size-15 font-weight-medium">
                                                    <?php esc_html_e('Car Hire', 'trizen'); ?>
                                                </h3>
											</div>
										</div>
									</div>
									<div class="col-lg-4 responsive-column">
										<div class="single-tour-feature d-flex align-items-center mb-3">
											<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
												<i class="la la-check-circle"></i>
											</div>
											<div class="single-feature-titles">
												<h3 class="title font-size-15 font-weight-medium">
                                                    <?php esc_html_e('Fitness Center', 'trizen'); ?>
                                                </h3>
											</div>
										</div>
									</div>
									<div class="col-lg-4 responsive-column">
										<div class="single-tour-feature d-flex align-items-center mb-3">
											<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
												<i class="la la-check-circle"></i>
											</div>
											<div class="single-feature-titles">
												<h3 class="title font-size-15 font-weight-medium">
                                                    <?php esc_html_e('Laundry', 'trizen'); ?>
                                                </h3>
											</div>
										</div>
									</div>
									<div class="col-lg-4 responsive-column">
										<div class="single-tour-feature d-flex align-items-center mb-3">
											<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
												<i class="la la-check-circle"></i>
											</div>
											<div class="single-feature-titles">
												<h3 class="title font-size-15 font-weight-medium">
                                                    <?php esc_html_e('Own Parking Space', 'trizen'); ?>
                                                </h3>
											</div>
										</div>
									</div>
									<div class="col-lg-4 responsive-column">
										<div class="single-tour-feature d-flex align-items-center mb-3">
											<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
												<i class="la la-check-circle"></i>
											</div>
											<div class="single-feature-titles">
												<h3 class="title font-size-15 font-weight-medium">
                                                    <?php esc_html_e('Wake-Up Call', 'trizen'); ?>
                                                </h3>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="section-block"></div>
						</div>
						<div id="amenities" class="page-scroll">
							<div class="single-content-item padding-top-40px padding-bottom-40px">
								<h3 class="title font-size-20">
                                    <?php esc_html_e('Amenities', 'trizen'); ?>
                                </h3>
								<div class="row pt-4">
									<div class="col-lg-4 responsive-column">
										<div class="single-tour-feature d-flex align-items-center mb-3">
											<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
												<i class="la la-couch"></i>
											</div>
											<div class="single-feature-titles">
												<h3 class="title font-size-15 font-weight-medium">
                                                    <?php esc_html_e('2 Seater Sofa', 'trizen'); ?>
                                                </h3>
											</div>
										</div>
									</div>
									<div class="col-lg-4 responsive-column">
										<div class="single-tour-feature d-flex align-items-center mb-3">
											<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
												<i class="la la-television"></i>
											</div>
											<div class="single-feature-titles">
												<h3 class="title font-size-15 font-weight-medium">
                                                    <?php esc_html_e('40-Inch Samsung LED TV', 'trizen'); ?>
                                                </h3>
											</div>
										</div>
									</div>
									<div class="col-lg-4 responsive-column">
										<div class="single-tour-feature d-flex align-items-center mb-3">
											<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
												<i class="la la-gear"></i>
											</div>
											<div class="single-feature-titles">
												<h3 class="title font-size-15 font-weight-medium">
                                                    <?php esc_html_e('Butler Service', 'trizen'); ?>
                                                </h3>
											</div>
										</div>
									</div>
									<div class="col-lg-4 responsive-column">
										<div class="single-tour-feature d-flex align-items-center mb-3">
											<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
												<i class="la la-wifi"></i>
											</div>
											<div class="single-feature-titles">
												<h3 class="title font-size-15 font-weight-medium">
                                                    <?php esc_html_e('Free Wi – Fi', 'trizen'); ?>
                                                </h3>
											</div>
										</div>
									</div>
									<div class="col-lg-4 responsive-column">
										<div class="single-tour-feature d-flex align-items-center mb-3">
											<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
												<i class="la la-swimming-pool"></i>
											</div>
											<div class="single-feature-titles">
												<h3 class="title font-size-15 font-weight-medium">
                                                    <?php esc_html_e('Private Pool', 'trizen'); ?>
                                                </h3>
											</div>
										</div>
									</div>
									<div class="col-lg-4 responsive-column">
										<div class="single-tour-feature d-flex align-items-center mb-3">
											<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
												<i class="la la-user"></i>
											</div>
											<div class="single-feature-titles">
												<h3 class="title font-size-15 font-weight-medium">
                                                    <?php esc_html_e('24h Room Service', 'trizen'); ?>
                                                </h3>
											</div>
										</div>
									</div>
									<div class="col-lg-4 responsive-column">
										<div class="single-tour-feature d-flex align-items-center mb-3">
											<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
												<i class="la la-air-freshener"></i>
											</div>
											<div class="single-feature-titles">
												<h3 class="title font-size-15 font-weight-medium">
                                                    <?php esc_html_e('Air Conditioning', 'trizen'); ?>
                                                </h3>
											</div>
										</div>
									</div>
									<div class="col-lg-4 responsive-column">
										<div class="single-tour-feature d-flex align-items-center mb-3">
											<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
												<i class="la la-phone"></i>
											</div>
											<div class="single-feature-titles">
												<h3 class="title font-size-15 font-weight-medium">
                                                    <?php esc_html_e('Direct Dial Phone', 'trizen'); ?>
                                                </h3>
											</div>
										</div>
									</div>
									<div class="col-lg-4 responsive-column">
										<div class="single-tour-feature d-flex align-items-center mb-3">
											<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
												<i class="la la-bullhorn"></i>
											</div>
											<div class="single-feature-titles">
												<h3 class="title font-size-15 font-weight-medium">
                                                    <?php esc_html_e('Hair Dryer', 'trizen'); ?>
                                                </h3>
											</div>
										</div>
									</div>
									<div class="col-lg-4 responsive-column">
										<div class="single-tour-feature d-flex align-items-center mb-3">
											<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
												<i class="la la-bathtub"></i>
											</div>
											<div class="single-feature-titles">
												<h3 class="title font-size-15 font-weight-medium">
                                                    <?php esc_html_e('Bathtub', 'trizen'); ?>
                                                </h3>
											</div>
										</div>
									</div>
									<div class="col-lg-4 responsive-column">
										<div class="single-tour-feature d-flex align-items-center mb-3">
											<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
												<i class="la la-hand-holding-usd"></i>
											</div>
											<div class="single-feature-titles">
												<h3 class="title font-size-15 font-weight-medium">
                                                    <?php esc_html_e('Safe Deposit Box', 'trizen'); ?>
                                                </h3>
											</div>
										</div>
									</div>
									<div class="col-lg-4 responsive-column">
										<div class="single-tour-feature d-flex align-items-center mb-3">
											<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
												<i class="la la-luggage-cart"></i>
											</div>
											<div class="single-feature-titles">
												<h3 class="title font-size-15 font-weight-medium"><?php esc_html_e('Luggage storage', 'trizen'); ?></h3>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="section-block"></div>
						</div>
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
								<div class="comments-list padding-top-50px">
									<div class="comment">
										<div class="comment-avatar">
											<img class="avatar__img" alt="" src="<?php echo get_template_directory_uri(); ?>/assets/images/team8.jpg">
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
									<div class="comment comment-reply-item">
										<div class="comment-avatar">
											<img class="avatar__img" alt="" src="<?php echo get_template_directory_uri(); ?>/assets/images/team9.jpg">
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
									<div class="comment">
										<div class="comment-avatar">
											<img class="avatar__img" alt="" src="<?php echo get_template_directory_uri(); ?>/assets/images/team10.jpg">
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
																<label class="label-text"><?php esc_html_e('Name', 'trizen'); ?></label>
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
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="sidebar single-content-sidebar mb-0">
						<div class="sidebar-widget single-content-widget">
							<h3 class="title stroke-shape">
                                <?php esc_html_e('Your Reservation', 'trizen'); ?>
                            </h3>
							<div class="sidebar-widget-item">
								<div class="contact-form-action">
									<form action="#">
										<div class="input-box">
											<label class="label-text" for="input-check-in">
                                                <?php esc_html_e('Check-in', 'trizen'); ?>
                                            </label>
											<div class="form-group">
												<span class="la la-calendar form-icon"></span>
												<input id="input-check-in" class="date-range form-control" type="text" name="daterange-single">
											</div>
										</div>
										<div class="input-box">
											<label class="label-text" for="input-check-out">
                                                <?php esc_html_e('Check-out', 'trizen'); ?>
                                            </label>
											<div class="form-group">
												<span class="la la-calendar form-icon"></span>
												<input id="input-check-out" class="date-range form-control" type="text" name="daterange-single">
											</div>
										</div>
										<div class="input-box">
											<label class="label-text" for="input-form-select">
                                                <?php esc_html_e('Rooms', 'trizen'); ?>
                                            </label>
											<div class="form-group">
												<div class="select-contain w-auto">
													<select id="input-form-select" class="select-contain-select">
														<option value="0">
                                                            <?php esc_html_e('Select Room', 'trizen'); ?>
                                                        </option>
														<option value="1" selected>
                                                            <?php esc_html_e('1 Room', 'trizen'); ?>
                                                        </option>
														<option value="2">
                                                            <?php esc_html_e('2 Rooms', 'trizen'); ?>
                                                        </option>
														<option value="3">
                                                            <?php esc_html_e('3 Rooms', 'trizen'); ?>
                                                        </option>
														<option value="4">
                                                            <?php esc_html_e('4 Rooms', 'trizen'); ?>
                                                        </option>
														<option value="5">
                                                            <?php esc_html_e('5 Rooms', 'trizen'); ?>
                                                        </option>
														<option value="6">
                                                            <?php esc_html_e('6 Rooms', 'trizen'); ?>
                                                        </option>
														<option value="7">
                                                            <?php esc_html_e('7 Rooms', 'trizen'); ?>
                                                        </option>
														<option value="8">
                                                            <?php esc_html_e('8 Rooms', 'trizen'); ?>
                                                        </option>
														<option value="9">
                                                            <?php esc_html_e('9 Rooms', 'trizen'); ?>
                                                        </option>
														<option value="10">
                                                            <?php esc_html_e('10 Rooms', 'trizen'); ?>
                                                        </option>
													</select>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
							<div class="sidebar-widget-item">
								<div class="qty-box mb-2 d-flex align-items-center justify-content-between">
									<label class="font-size-16" for="hotel-room-adult-input">
                                        <?php esc_html_e('Adults', 'trizen'); ?> <span><?php esc_html_e('Age 18+', 'trizen'); ?></span>
                                    </label>
									<div class="qtyBtn d-flex align-items-center">
										<div class="qtyDec"><i class="la la-minus"></i></div>
										<input id="hotel-room-adult-input" type="text" name="qtyInput" value="0">
										<div class="qtyInc"><i class="la la-plus"></i></div>
									</div>
								</div>
								<div class="qty-box mb-2 d-flex align-items-center justify-content-between">
									<label class="font-size-16" for="hotel-room-children-input">
                                        <?php esc_html_e('Children', 'trizen'); ?> <span><?php esc_html_e('2-12 years old', 'trizen'); ?></span>
                                    </label>
									<div class="qtyBtn d-flex align-items-center">
										<div class="qtyDec"><i class="la la-minus"></i></div>
										<input id="hotel-room-children-input" type="text" name="qtyInput" value="0">
										<div class="qtyInc"><i class="la la-plus"></i></div>
									</div>
								</div>
								<div class="qty-box mb-2 d-flex align-items-center justify-content-between">
									<label class="font-size-16" for="hotel-room-infants-input">
                                        <?php esc_html_e('Infants', 'trizen'); ?> <span><?php esc_html_e('0-2 years old', 'trizen'); ?></span>
                                    </label>
									<div class="qtyBtn d-flex align-items-center">
										<div class="qtyDec"><i class="la la-minus"></i></div>
										<input id="hotel-room-infants-input" type="text" name="qtyInput" value="0">
										<div class="qtyInc"><i class="la la-plus"></i></div>
									</div>
								</div>
							</div>
							<div class="sidebar-widget-item py-4">
								<h3 class="title stroke-shape">
                                    <?php esc_html_e('Extra Services', 'trizen'); ?>
                                </h3>
								<div class="extra-service-wrap">
									<form action="#" method="post" class="extraServiceForm" id="extraServiceForm">
										<div id="checkboxContainPrice">
											<div class="custom-checkbox">
												<input type="checkbox" name="cleaning" id="cleaningChb" value="15.00" />
												<label for="cleaningChb" class="d-flex justify-content-between align-items-center">
                                                    <?php esc_html_e('Cleaning Fee', 'trizen'); ?> <span class="text-black font-weight-regular"><?php esc_html_e('$15', 'trizen'); ?></span>
                                                </label>
											</div>
											<div class="custom-checkbox">
												<input type="checkbox" name="airport-pickup" id="airportPickupChb" value="20.00" />
												<label for="airportPickupChb" class="d-flex justify-content-between align-items-center">
                                                    <?php esc_html_e('Airport pickup', 'trizen'); ?> <span class="text-black font-weight-regular"><?php esc_html_e('$20', 'trizen'); ?></span>
                                                </label>
											</div>
											<div class="custom-checkbox">
												<input type="checkbox" name="breakfast" id="breakfastChb" value="10.00" />
												<label for="breakfastChb" class="d-flex justify-content-between align-items-center">
                                                    <?php esc_html_e('Breakfast', 'trizen'); ?> <span class="text-black font-weight-regular"><?php esc_html_e('$10/ per person', 'trizen'); ?></span>
                                                </label>
											</div>
											<div class="custom-checkbox">
												<input type="checkbox" name="parking" id="parkingChb" value="5.00" />
												<label for="parkingChb" class="d-flex justify-content-between align-items-center">
                                                    <?php esc_html_e('Parking', 'trizen'); ?> <span class="text-black font-weight-regular"><?php esc_html_e('$5/ per night', 'trizen'); ?></span>
                                                </label>
											</div>
										</div>
										<div class="total-price pt-3">
											<p class="text-black">
                                                <?php esc_html_e('Your Price', 'trizen'); ?>
                                            </p>
											<p class="d-flex align-items-center">
                                                <span class="font-size-17 text-black"><?php esc_html_e('$', 'trizen'); ?></span> <input type="text" name="total" class="num" value="<?php esc_attr_e('80.00', 'trizen'); ?>" readonly="readonly"/><span><?php esc_html_e('/ per room', 'trizen'); ?></span>
                                            </p>
										</div>
									</form>
								</div>
							</div>
							<div class="btn-box">
								<a href="cart.html" class="theme-btn text-center w-100 mb-2">
                                    <?php esc_html_e('Book Now', 'trizen'); ?>
                                </a>
							</div>
						</div>
						<div class="sidebar-widget single-content-widget">
							<h3 class="title stroke-shape">
                                <?php esc_html_e('Why Book With Us?', 'trizen'); ?>
                            </h3>
							<div class="sidebar-list">
								<ul class="list-items">
									<li>
                                        <i class="la la-dollar icon-element mr-2"></i>
                                        <?php esc_html_e('No-hassle best price guarantee', 'trizen'); ?>
                                    </li>
									<li>
                                        <i class="la la-microphone icon-element mr-2"></i>
                                        <?php esc_html_e('Customer care available 24/7', 'trizen'); ?>
                                    </li>
									<li>
                                        <i class="la la-thumbs-up icon-element mr-2"></i>
                                        <?php esc_html_e('Hand-picked Tours & Activities', 'trizen'); ?>
                                    </li>
									<li>
                                        <i class="la la-file-text icon-element mr-2"></i>
                                        <?php esc_html_e('Free Travel Insureance', 'trizen'); ?>
                                    </li>
								</ul>
							</div>
						</div>
						<div class="sidebar-widget single-content-widget">
							<h3 class="title stroke-shape">
                                <?php esc_html_e('Get a Question?', 'trizen'); ?>
                            </h3>
							<p class="font-size-14 line-height-24">
                                <?php esc_html_e('Do not hesitate to give us a call. We are an expert team and we are happy to talk to you.', 'trizen'); ?>
                            </p>
							<div class="sidebar-list pt-3">
								<ul class="list-items">
									<li>
                                        <i class="la la-phone icon-element mr-2"></i>
                                        <a href="#"><?php esc_html_e('+ 61 23 8093 3400', 'trizen'); ?></a>
                                    </li>
									<li>
                                        <i class="la la-envelope icon-element mr-2"></i>
                                        <a href="mailto:info@trizen.com"><?php esc_html_e('info@trizen.com', 'trizen'); ?></a>
                                    </li>
								</ul>
							</div>
						</div>
					</div>
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
