<?php
$room_facilities = get_categories( array ( 'taxonomy' => 'room_facilities' ) );
?>


<div id="amenities" class="page-scroll">
	<div class="single-content-item padding-top-40px padding-bottom-40px">
		<h3 class="title font-size-20">
			<?php esc_html_e('Amenities', 'trizen'); ?>
		</h3>
		<div class="row pt-4">

			<?php
			foreach ($room_facilities as $room_facility) {
			$room_facility_icon = get_term_meta( $room_facility->term_id, 'trizen-room-facilities-icon', true );
			?>
				<div class="col-lg-4 responsive-column">
					<div class="single-tour-feature d-flex align-items-center mb-3">
						<?php if(!empty($room_facility_icon)) { ?>
							<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
								<i class="<?php echo esc_attr($room_facility_icon); ?>"></i>
							</div>
						<?php } if(!empty($room_facility->name)) { ?>
							<div class="single-feature-titles">
								<h3 class="title font-size-15 font-weight-medium">
									<?php echo esc_html($room_facility->name); ?>
								</h3>
							</div>
						<?php } ?>
					</div>
				</div>
			<?php } ?>

		</div>
	</div>
	<div class="section-block"></div>
</div>


