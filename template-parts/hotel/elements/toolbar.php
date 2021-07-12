<?php

$name_asc  = 'name_asc';
$name_desc = 'name_desc';
if(!isset($post_type)){
	$post_type = 'ts_hotel';
}
?>

<div class="filter-bar d-flex align-items-center justify-content-between">

    <div class="layout-view d-flex align-items-center">
        <a href="hotel-grid.html" data-toggle="tooltip" data-placement="top" title="<?php esc_attr_e('Grid View', 'trizen'); ?>" class="active">
            <i class="la la-th-large"></i>
        </a>
        <a href="hotel-list.html" data-toggle="tooltip" data-placement="top" title="<?php esc_attr_e('List View', 'trizen'); ?>">
            <i class="la la-th-list"></i>
        </a>
    </div>
    <div class="select-contain">

        <div class="dropdown dropdown-contain">
            <a class="dropdown-toggle dropdown-btn dropdown--btn" href="#" role="button" data-toggle="dropdown">
                Short by default
            </a>
            <div class="dropdown-menu dropdown-menu-wrap sort-menu">
                <div class="dropdown-item">
                    <div class="sort-title">
                        <h3>
                            <?php echo __('SORT BY', 'trizen'); ?>
                            <span class="hidden-lg hidden-md hidden-sm close-filter btn-clear-filter" id="btn-clear-filter" data-placement="top" data-toggle="tooltip" title="<?php esc_attr_e('Clear Filter', 'trizen'); ?>">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </span>
                        </h3>
                    </div>
                    <div class="sort-item st-icheck">
                        <div class="st-icheck-item">
                            <label>
                                <input class="service_order" type="radio" name="service_order_" data-value="new"/><span class="checkmark"></span>
	                            <?php echo esc_html__('New hotel', 'trizen'); ?>
                            </label>
                        </div>
                    </div>
                    <div class="sort-item st-icheck">
                        <span class="title"><?php echo __('Price', 'trizen'); ?></span>
                        <div class="st-icheck-item">
                            <label>
                                <input class="service_order" type="radio" name="service_order_"  data-value="price_asc"/><span class="checkmark"></span>
	                            <?php echo __('Low to High', 'trizen'); ?>
                            </label>
                        </div>
                        <div class="st-icheck-item">
                            <label>
                                <input class="service_order" type="radio" name="service_order_"  data-value="price_desc"/><span class="checkmark"></span>
	                            <?php echo __('High to Low', 'trizen'); ?>
                            </label>
                        </div>
                    </div>
                    <div class="sort-item st-icheck">
                        <span class="title"><?php echo __('Name', 'trizen'); ?></span>
                        <div class="st-icheck-item">
                            <label>
                                <input class="service_order" type="radio" name="service_order_"  data-value="<?php echo esc_attr($name_asc); ?>"/><span class="checkmark"></span>
	                            <?php echo __('a - z', 'trizen'); ?>
                            </label>
                        </div>
                        <div class="st-icheck-item">
                            <label>
                                <input class="service_order" type="radio" name="service_order_"  data-value="<?php echo esc_attr($name_desc); ?>"/><span class="checkmark"></span>
	                            <?php echo __('z - a', 'trizen'); ?>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<!--        <select class="select-contain-select">
            <option value="1">Short by default</option>
            <option value="2">Popular Hotel</option>
            <option value="3">Price: low to high</option>
            <option value="4">Price: high to low</option>
            <option value="5">A to Z</option>
        </select>-->
    </div>
</div>
