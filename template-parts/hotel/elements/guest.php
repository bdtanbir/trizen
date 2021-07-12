<?php
$room_num_search = get( 'room_num_search', 1 );
$adult_number    = get( 'adult_number', 1 );
$child_number    = get( 'child_number', 0 );

?>

<div class="input-box form-extra-field field-guest">
	<label class="label-text">
		<?php esc_html_e('Guests', 'useful-addons-elementor'); ?>
    </label>
    <div class="form-group">
        <div class="dropdown dropdown-contain gty-container">
            <a class="dropdown-toggle dropdown-btn" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                <span class="adult" data-text="<?php esc_attr_e('Adult', 'useful-addons-elementor'); ?>" data-text-multi="<?php esc_attr_e('Adults', 'useful-addons-elementor'); ?>">
                    <?php echo sprintf( _n( '%s Adult', '%s Adults', esc_attr($adult_number), 'useful-addons-elementor' ), esc_attr($adult_number) ) ?>
                </span>
                &nbsp;-&nbsp;
                <span class="children" data-text="<?php esc_attr_e('Child', 'useful-addons-elementor'); ?>" data-text-multi="<?php esc_attr_e('Children', 'useful-addons-elementor'); ?>">
                    <?php echo sprintf( _n( '%s Child', '%s Children', esc_attr($child_number), 'useful-addons-elementor' ), esc_attr($child_number) ); ?>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-wrap">
                <div class="dropdown-item">
                    <div class="qty-box d-flex align-items-center justify-content-between">
                        <label for="room_num_search">
							<?php esc_html_e('Rooms', 'useful-addons-elementor'); ?>
                        </label>
                        <div class="qtyBtn d-flex align-items-center">
                            <div class="qtyDec">
                                <i class="la la-minus"></i>
                            </div>
                            <input
                                    id="room_num_search"
                                    type="text"
                                    name="room_num_search"
                                    value="<?php echo esc_attr($room_num_search); ?>"
                                    class="qty-input ts-input-number"
                                    autocomplete="off" readonly data-min="1" data-max="100" />
                            <div class="qtyInc">
                                <i class="la la-plus"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dropdown-item">
                    <div class="qty-box d-flex align-items-center justify-content-between">
                        <label for="adult_number">
							<?php esc_html_e('Adults', 'useful-addons-elementor'); ?>
                        </label>
                        <div class="qtyBtn d-flex align-items-center">
                            <div class="qtyDec">
                                <i class="la la-minus"></i>
                            </div>
                            <input
                                    id="adult_number"
                                    class="ts-input-number"
                                    type="text"
                                    name="adult_number"
                                    value="<?php echo esc_attr($adult_number); ?>"
                                    autocomplete="off" readonly data-min="1" data-max="100"/>
                            <div class="qtyInc">
                                <i class="la la-plus"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dropdown-item">
                    <div class="qty-box d-flex align-items-center justify-content-between">
                        <label for="child_number">
							<?php esc_html_e('Children', 'useful-addons-elementor'); ?>
                        </label>
                        <div class="qtyBtn d-flex align-items-center">
                            <div class="qtyDec">
                                <i class="la la-minus"></i>
                            </div>
                            <input class="ts-input-number" id="child_number" type="text" name="child_number" value="<?php echo esc_attr($child_number); ?>" autocomplete="off" readonly data-min="0" data-max="100" />
                            <div class="qtyInc">
                                <i class="la la-plus"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
