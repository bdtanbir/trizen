<?php
$room_price = get_post_meta(get_the_ID(), 'trizen_room_price', true);
$trizen_hotel_room_extra_service_data    = get_post_meta(get_the_ID(), 'trizen_hotel_extra_services_data_group', true);


// $default_args = array(
// 	'post_type' => 'hotel_room'
// );
// $room_query = new WP_Query($default_args);
?>


<div class="sidebar single-content-sidebar mb-0">
	<?php 
		dynamic_sidebar( 'hotel-room-sidebar' );
	?>
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



