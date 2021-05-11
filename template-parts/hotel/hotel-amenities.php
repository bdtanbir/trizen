<?php
$hotel_facilities = get_categories( array ( 'taxonomy' => 'hotel_facilities' ) );

if($hotel_facilities) {
?>

<div id="amenities" class="page-scroll">
	<div class="single-content-item padding-top-40px padding-bottom-20px">
		<h3 class="title font-size-20">
			<?php esc_html_e('Amenities', 'trizen'); ?>
		</h3>
		<div class="amenities-feature-item pt-4">
			<div class="row">
				<?php
				foreach ($hotel_facilities as $hotel_facility) {
					$hotel_facility_icon = get_term_meta( $hotel_facility->term_id, 'trizen-hotel-facilities-icon', true );
					?>
					<div class="col-lg-4 responsive-column">
						<div class="single-tour-feature d-flex align-items-center mb-3">
							<?php if(!empty($hotel_facility_icon)) { ?>
								<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
									<i class="<?php echo esc_attr($hotel_facility_icon); ?>"></i>
								</div>
							<?php } if(!empty($hotel_facility->name)) { ?>
								<div class="single-feature-titles">
									<h3 class="title font-size-15 font-weight-medium">
										<?php echo esc_html($hotel_facility->name); ?>
									</h3>
								</div>
							<?php } ?>
						</div>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</div>
	<div class="section-block"></div>
</div>
<?php } ?>
