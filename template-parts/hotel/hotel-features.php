<?php
$trizen_hotel_features_data   = get_post_meta(get_the_ID(), 'trizen_hotel_features_data_group', true);
?>
<div class="section-block"></div>
<div class="single-content-item py-4">
	<div class="row">
		<?php
		foreach ( $trizen_hotel_features_data as $item ) { ?>
			<div class="col-lg-4 responsive-column">
				<div class="single-tour-feature d-flex align-items-center mb-3">
					<?php if(!empty($item['trizen_hotel_features_icon'])) { ?>
						<div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
							<i class="<?php echo esc_attr($item['trizen_hotel_features_icon']); ?>"></i>
						</div>
					<?php } if(!empty($item['trizen_hotel_features_title']) || $item['trizen_hotel_features_stitle']) { ?>
						<div class="single-feature-titles">
							<?php if(!empty($item['trizen_hotel_features_title'])) { ?>
								<h3 class="title font-size-15 font-weight-medium">
									<?php echo esc_html($item['trizen_hotel_features_title']); ?>
								</h3>
							<?php } if(!empty($item['trizen_hotel_features_stitle'])) { ?>
								<span class="font-size-13">
                                                                        <?php echo esc_html($item['trizen_hotel_features_stitle']); ?>
                                                                    </span>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
			</div>
		<?php } ?>

	</div><!-- end row -->
</div>
