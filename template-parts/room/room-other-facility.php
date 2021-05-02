<?php
    $trizen_room_other_facility_data = get_post_meta(get_the_ID(), 'trizen_room_other_facility_data_group', true);

    if(is_array($trizen_room_other_facility_data)) {
?>

<div id="services" class="page-scroll">
	<div class="single-content-item padding-top-40px padding-bottom-40px">
		<h3 class="title font-size-20">
			<?php esc_html_e('Services', 'trizen'); ?>
		</h3>
		<div class="row pt-4">

			<?php
			foreach ( $trizen_room_other_facility_data as $item ) { ?>
                <div class="col-lg-4 responsive-column">
                    <div class="single-tour-feature d-flex align-items-center mb-3">
                        <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                            <i class="la la-check-circle"></i>
                        </div>
                        <div class="single-feature-titles">
                            <h3 class="title font-size-15 font-weight-medium">
                                <?php echo esc_html($item['trizen_room_other_facility_title']); ?>
                            </h3>
                        </div>
                    </div>
                </div>
            <?php } ?>

		</div>
	</div>
	<div class="section-block"></div>
</div>

<?php } ?>