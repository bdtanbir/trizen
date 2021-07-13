

<div class="advanced-wrap col-lg-12 pb-3">
    <a class="btn collapse-btn theme-btn-hover-gray font-size-15" data-toggle="collapse" href="#collapseTwo" role="button" aria-expanded="false" aria-controls="collapseTwo">
        More option <i class="la la-angle-down ml-1"></i>
    </a>
    <div class="pt-3 collapse" id="collapseTwo">
        <div class="slider-range-wrap ">
            <div class="price-slider-amount padding-bottom-20px advance-item range-slider">
				<?php
				$data_min_max = get_min_max_price( 'ts_hotel' );
				$max          = ( (float)$data_min_max[ 'max' ] > 0 ) ? (float)$data_min_max[ 'max' ] : 0;
				$min          = ( (float)$data_min_max[ 'min' ] > 0 ) ? (float)$data_min_max[ 'min' ] : 0;
				$rate_change = 1;
				$max         = round( 1 * $max );
				if ( (float)$max < 0 ) $max = 0;

				$min = round( 1 * $min );
				if ( (float)$min < 0 ) $min = 0;
				$value_show = $min . ";" . $max; // default if error

				if ( $rate_change ) {
					if ( request( 'price_range' ) ) {
						$price_range = explode( ';', request( 'price_range' ) );

						$value_show = $price_range[ 0 ] . ";" . $price_range[ 1 ];
					} else {

						$value_show = $min . ";" . $max;
					}
				}
				?>
                <label for="amount" class="filter__label">
                    Price:
                </label>

                <div class="item-content">
                    <input type="text" class="price_range" name="price_range"
                           value="<?php echo esc_attr($value_show); ?>"
                           data-symbol="<?php echo get_woocommerce_currency_symbol(); ?>"
                           data-min="<?php echo esc_attr( $min ); ?>"
                           data-max="<?php echo esc_attr( $max ); ?>"
                           data-step="0"/>
                </div>
            </div>
        </div>
        <div class="checkbox-wrap taxonomy-advance-search">
			<?php
			$search_tax_advance = 'hotel_facilities';
			$get_label_tax = get_taxonomy($search_tax_advance);
			$tax = get('taxonomy');
			$in_facilities = [];
			$temp_facilities = '';
			if(!empty($tax)){
				if(isset($tax[$search_tax_advance])){
					if(!empty($tax[$search_tax_advance])){
						$temp_facilities = $tax[$search_tax_advance];
						$in_facilities = explode(',', $tax[$search_tax_advance]);
					}
				}
			}

			if(!empty($get_label_tax)){
				echo '<h3 class="title font-size-15 pb-3">'.esc_html($get_label_tax->label).'</h3>';
			}
			?>
            <div class="item-content">
				<?php
				$facilities = get_terms(
					[
						'taxonomy'   => $search_tax_advance,
						'hide_empty' => false
					]
				);
				if ( $facilities && !is_wp_error($facilities)) {
					foreach ( $facilities as $term ) {
						?>
                        <div class="custom-checkbox d-inline-block mr-4 ts-icheck-item">
                            <input
                                    type="checkbox" id="c<?php echo esc_attr($term->term_id); ?>"
                                    name="" value="<?php echo esc_attr($term->term_id); ?>"
								<?php echo in_array($term->term_id, $in_facilities) ? 'checked' : ''; ?>>
                            <label for="c<?php echo esc_attr($term->term_id); ?>"><?php echo esc_html($term->name); ?></label>
                        </div>
						<?php
					}
				}
				?>
            </div>
            <input type="hidden" class="data_taxonomy" name="taxonomy[<?php echo esc_attr($search_tax_advance)?>]" value="<?php echo esc_attr($temp_facilities); ?>">
        </div>
    </div>
</div>
