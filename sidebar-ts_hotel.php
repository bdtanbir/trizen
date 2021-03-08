<?php

$hotel_regular_price = get_post_meta( get_the_ID(), 'trizen_hotel_regular_price', true );
$hotel_sale_price    = get_post_meta( get_the_ID(), 'trizen_hotel_sale_price', true );

if(!is_active_sidebar('hotel-sidebar')) {
    return;
}
?>

<div class="sidebar single-content-sidebar mb-0">
    <?php
    dynamic_sidebar('hotel-sidebar');
    ?>
	<!--<div class="sidebar-widget single-content-widget">
		<div class="sidebar-widget-item">
			<div class="sidebar-book-title-wrap mb-3">
				<h3><?php /*esc_html_e('Popular','trizen'); */?></h3>
				<?php
/*				if(!empty($hotel_regular_price) && !empty($hotel_sale_price)) { */?>
					<p>
						<span class="text-form"><?php /*esc_html_e('From', 'trizen'); */?></span>
						<span class="text-value ml-2 mr-1">$<?php /*echo esc_html($hotel_sale_price); */?></span>
						<span class="before-price">$<?php /*echo esc_html($hotel_regular_price); */?></span>
					</p>
				<?php /*} else {
					if(!empty($hotel_regular_price)) {
						*/?>
						<p>
							<span class="text-form"><?php /*esc_html_e('From', 'trizen'); */?></span>
							<span class="text-value ml-2">$<?php /*echo esc_html($hotel_regular_price); */?></span>
						</p>
						<?php
/*					} else {
						if(!empty($hotel_sale_price) && empty($hotel_regular_price)) { */?>
							<p>
                                <span class="text-form">
                                    <?php /*esc_html_e('We are sorry! First add', 'trizen'); */?><strong><?php /*esc_html_e(' Regular Price', 'trizen'); */?></strong><?php /*esc_html_e(' and then sale price!', 'trizen'); */?>
                                </span>
							</p>
							<?php
/*						}
					}
				}*/?>
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
		</div>
		<div class="sidebar-widget-item">
			<div class="qty-box mb-2 d-flex align-items-center justify-content-between">
				<label class="font-size-16">Adults <span>Age 18+</span></label>
				<div class="qtyBtn d-flex align-items-center">
					<div class="qtyDec"><i class="la la-minus"></i></div>
					<input type="text" name="qtyInput" value="0">
					<div class="qtyInc"><i class="la la-plus"></i></div>
				</div>
			</div>
			<div class="qty-box mb-2 d-flex align-items-center justify-content-between">
				<label class="font-size-16">Children <span>2-12 years old</span></label>
				<div class="qtyBtn d-flex align-items-center">
					<div class="qtyDec"><i class="la la-minus"></i></div>
					<input type="text" name="qtyInput" value="0">
					<div class="qtyInc"><i class="la la-plus"></i></div>
				</div>
			</div>
			<div class="qty-box mb-2 d-flex align-items-center justify-content-between">
				<label class="font-size-16">Infants <span>0-2 years old</span></label>
				<div class="qtyBtn d-flex align-items-center">
					<div class="qtyDec"><i class="la la-minus"></i></div>
					<input type="text" name="qtyInput" value="0">
					<div class="qtyInc"><i class="la la-plus"></i></div>
				</div>
			</div>
		</div>
		<div class="btn-box pt-2">
			<a href="tour-booking.html" class="theme-btn text-center w-100 mb-2"><i class="la la-shopping-cart mr-2 font-size-18"></i>Book Now</a>
			<a href="#" class="theme-btn text-center w-100 theme-btn-transparent"><i class="la la-heart-o mr-2"></i>Add to Wishlist</a>
			<div class="d-flex align-items-center justify-content-between pt-2">
				<a href="#" class="btn theme-btn-hover-gray font-size-15" data-toggle="modal" data-target="#sharePopupForm"><i class="la la-share mr-1"></i>Share</a>
				<p><i class="la la-eye mr-1 font-size-15 color-text-2"></i>3456</p>
			</div>
		</div>
	</div>
	<div class="sidebar-widget single-content-widget">
		<h3 class="title stroke-shape">Why Book With Us?</h3>
		<div class="sidebar-list">
			<ul class="list-items">
				<li><i class="la la-dollar icon-element mr-2"></i>No-hassle best price guarantee</li>
				<li><i class="la la-microphone icon-element mr-2"></i>Customer care available 24/7</li>
				<li><i class="la la-thumbs-up icon-element mr-2"></i>Hand-picked Tours & Activities</li>
				<li><i class="la la-file-text icon-element mr-2"></i>Free Travel Insureance</li>
			</ul>
		</div>
	</div>
	<div class="sidebar-widget single-content-widget">
		<h3 class="title stroke-shape">Get a Question?</h3>
		<p class="font-size-14 line-height-24">Do not hesitate to give us a call. We are an expert team and we are happy to talk to you.</p>
		<div class="sidebar-list pt-3">
			<ul class="list-items">
				<li><i class="la la-phone icon-element mr-2"></i><a href="#">+ 61 23 8093 3400</a></li>
				<li><i class="la la-envelope icon-element mr-2"></i><a href="mailto:info@trizen.com">info@trizen.com</a></li>
			</ul>
		</div>
	</div>-->
</div>
