<?php
$room_price = get_post_meta(get_the_ID(), 'trizen_room_price', true);
$trizen_hotel_room_extra_service_data    = get_post_meta(get_the_ID(), 'trizen_hotel_extra_services_data_group', true);
?>


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
                    <?php if($trizen_hotel_room_extra_service_data) { ?>
                        <div id="checkboxContainPrice">

                            <!--<div class="custom-checkbox">
                                <input type="checkbox" name="cleaning" id="cleaningChb" value="15.00" />
                                <label for="cleaningChb" class="d-flex justify-content-between align-items-center">
                                    <?php /*esc_html_e('Cleaning Fee', 'trizen'); */?> <span class="text-black font-weight-regular"><?php /*esc_html_e('$15', 'trizen'); */?></span>
                                </label>
                            </div>
                            <div class="custom-checkbox">
                                <input type="checkbox" name="airport-pickup" id="airportPickupChb" value="20.00" />
                                <label for="airportPickupChb" class="d-flex justify-content-between align-items-center">
                                    <?php /*esc_html_e('Airport pickup', 'trizen'); */?> <span class="text-black font-weight-regular"><?php /*esc_html_e('$20', 'trizen'); */?></span>
                                </label>
                            </div>
                            <div class="custom-checkbox">
                                <input type="checkbox" name="breakfast" id="breakfastChb" value="10.00" />
                                <label for="breakfastChb" class="d-flex justify-content-between align-items-center">
                                    <?php /*esc_html_e('Breakfast', 'trizen'); */?> <span class="text-black font-weight-regular"><?php /*esc_html_e('$10/ per person', 'trizen'); */?></span>
                                </label>
                            </div>-->

                            <?php
                            foreach ( $trizen_hotel_room_extra_service_data as $key => $item ) {
                                $extra_price_title = strtolower(str_replace(' ', '-', $item['trizen_hotel_room_extra_service_title']));
                                ?>
                                <div class="custom-checkbox">
                                    <input type="checkbox" name="<?php echo esc_attr($extra_price_title); ?>" id="<?php echo esc_attr($extra_price_title); echo esc_attr('-'.$key); ?>" value="<?php echo esc_attr($item['trizen_hotel_room_extra_service_price']); ?>" />
                                    <label for="<?php echo esc_attr($extra_price_title); echo esc_attr('-'.$key); ?>" class="d-flex justify-content-between align-items-center">
                                        <?php echo esc_html($item['trizen_hotel_room_extra_service_title']); ?>
                                        <span class="text-black font-weight-regular">
                                            <?php esc_html_e('$', 'trizen'); echo esc_html($item['trizen_hotel_room_extra_service_price']); echo esc_html($item['trizen_hotel_room_extra_service_price_designation']); ?>
                                        </span>
                                    </label>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
					<div class="total-price pt-3">
						<p class="text-black">
							<?php esc_html_e('Your Price', 'trizen'); ?>
						</p>
						<p class="d-flex align-items-center">
							<span class="font-size-17 text-black"><?php esc_html_e('$', 'trizen'); ?></span> <input type="text" name="total" class="num" value="<?php echo esc_attr($room_price); ?>" readonly="readonly"/><span><?php esc_html_e('/ per room', 'trizen'); ?></span>
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



