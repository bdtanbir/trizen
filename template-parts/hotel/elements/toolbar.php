<?php

?>

<div class="filter-bar d-flex align-items-center justify-content-between">
    <div class="filter-bar-filter d-flex flex-wrap align-items-center">
        <div class="filter-option">
            <h3 class="title font-size-16">Filter by:</h3>
        </div>
        <div class="filter-option">
            <div class="dropdown dropdown-contain">
                <a class="dropdown-toggle dropdown-btn dropdown--btn" href="#" role="button" data-toggle="dropdown">
                    Filter Price
                </a>
                <div class="dropdown-menu dropdown-menu-wrap">
                    <div class="dropdown-item">
                        <div class="slider-range-wrap">
                            <div class="price-slider-amount padding-bottom-20px">
                                <label for="amount2" class="filter__label">Price:</label>
                                <input type="text" id="amount2" class="amounts">
                            </div>
                            <div id="slider-range2"></div>
                        </div>
                        <div class="btn-box pt-4">
                            <button class="theme-btn theme-btn-small theme-btn-transparent" type="button">Apply</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="filter-option">
            <div class="dropdown dropdown-contain">
                <a class="dropdown-toggle dropdown-btn dropdown--btn" href="#" role="button" data-toggle="dropdown">
                    Review Score
                </a>
                <div class="dropdown-menu dropdown-menu-wrap">
                    <div class="dropdown-item">
                        <div class="checkbox-wrap">
                            <div class="custom-checkbox">
                                <input type="checkbox" id="r1">
                                <label for="r1">
                                                        <span class="ratings d-flex align-items-center">
                                                            <i class="la la-star"></i>
                                                            <i class="la la-star"></i>
                                                            <i class="la la-star"></i>
                                                            <i class="la la-star"></i>
                                                            <i class="la la-star"></i>
                                                            <span class="color-text-3 font-size-13 ml-1">(55.590)</span>
                                                        </span>
                                </label>
                            </div>
                            <div class="custom-checkbox">
                                <input type="checkbox" id="r2">
                                <label for="r2">
                                                        <span class="ratings d-flex align-items-center">
                                                            <i class="la la-star"></i>
                                                            <i class="la la-star"></i>
                                                            <i class="la la-star"></i>
                                                            <i class="la la-star"></i>
                                                            <i class="la la-star-o"></i>
                                                            <span class="color-text-3 font-size-13 ml-1">(40.590)</span>
                                                        </span>
                                </label>
                            </div>
                            <div class="custom-checkbox">
                                <input type="checkbox" id="r3">
                                <label for="r3">
                                                        <span class="ratings d-flex align-items-center">
                                                            <i class="la la-star"></i>
                                                            <i class="la la-star"></i>
                                                            <i class="la la-star"></i>
                                                            <i class="la la-star-o"></i>
                                                            <i class="la la-star-o"></i>
                                                            <span class="color-text-3 font-size-13 ml-1">(23.590)</span>
                                                        </span>
                                </label>
                            </div>
                            <div class="custom-checkbox">
                                <input type="checkbox" id="r4">
                                <label for="r4">
                                                        <span class="ratings d-flex align-items-center">
                                                            <i class="la la-star"></i>
                                                            <i class="la la-star"></i>
                                                            <i class="la la-star-o"></i>
                                                            <i class="la la-star-o"></i>
                                                            <i class="la la-star-o"></i>
                                                            <span class="color-text-3 font-size-13 ml-1">(12.590)</span>
                                                        </span>
                                </label>
                            </div>
                            <div class="custom-checkbox">
                                <input type="checkbox" id="r5">
                                <label for="r5">
                                                        <span class="ratings d-flex align-items-center">
                                                            <i class="la la-star"></i>
                                                            <i class="la la-star-o"></i>
                                                            <i class="la la-star-o"></i>
                                                            <i class="la la-star-o"></i>
                                                            <i class="la la-star-o"></i>
                                                            <span class="color-text-3 font-size-13 ml-1">(590)</span>
                                                        </span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="filter-option">
            <div class="dropdown dropdown-contain">
                <a class="dropdown-toggle dropdown-btn dropdown--btn" href="#" role="button" data-toggle="dropdown">
                    Facilities
                </a>
                <div class="dropdown-menu dropdown-menu-wrap">
                    <div class="dropdown-item">
                        <div class="checkbox-wrap">
                            <div class="custom-checkbox">
                                <input type="checkbox" id="catChb1">
                                <label for="catChb1">Pet Allowed</label>
                            </div>
                            <div class="custom-checkbox">
                                <input type="checkbox" id="catChb2">
                                <label for="catChb2">Groups Allowed</label>
                            </div>
                            <div class="custom-checkbox">
                                <input type="checkbox" id="catChb3">
                                <label for="catChb3">Tour Guides</label>
                            </div>
                            <div class="custom-checkbox">
                                <input type="checkbox" id="catChb4">
                                <label for="catChb4">Access for disabled</label>
                            </div>
                            <div class="custom-checkbox">
                                <input type="checkbox" id="catChb5">
                                <label for="catChb5">Room Service</label>
                            </div>
                            <div class="custom-checkbox">
                                <input type="checkbox" id="catChb6">
                                <label for="catChb6">Parking</label>
                            </div>
                            <div class="custom-checkbox">
                                <input type="checkbox" id="catChb7">
                                <label for="catChb7">Restaurant</label>
                            </div>
                            <div class="custom-checkbox">
                                <input type="checkbox" id="catChb8">
                                <label for="catChb8">Pet friendly</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="select-contain">
        <select class="select-contain-select">
            <option value="1">Short by default</option>
            <option value="2">Popular Hotel</option>
            <option value="3">Price: low to high</option>
            <option value="4">Price: high to low</option>
            <option value="5">A to Z</option>
        </select>
    </div>
</div>
