<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package trizen
 */

if ( ! is_active_sidebar( 'blog-sidebar' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
    <div class="sidebar mb-0">
	    <?php dynamic_sidebar( 'blog-sidebar' ); ?>
        <!--<div class="sidebar-widget">
            <h3 class="title stroke-shape">Search Post</h3>
            <div class="contact-form-action">
                <form action="#">
                    <div class="input-box">
                        <div class="form-group mb-0">
                            <input class="form-control pl-3" type="text" placeholder="Type your keywords...">
                            <button class="search-btn" type="submit"><i class="la la-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="sidebar-widget">
            <h3 class="title stroke-shape">Categories</h3>
            <div class="sidebar-category">
                <div class="custom-checkbox">
                    <input type="checkbox" id="cat1">
                    <label for="cat1">All <span class="font-size-13 ml-1">(55)</span></label>
                </div>
                <div class="custom-checkbox">
                    <input type="checkbox" id="cat2">
                    <label for="cat2">Active Adventure Tours <span class="font-size-13 ml-1">(8)</span></label>
                </div>
                <div class="custom-checkbox">
                    <input type="checkbox" id="cat3">
                    <label for="cat3">Ecotourism <span class="font-size-13 ml-1">(5)</span></label>
                </div>
                <div class="custom-checkbox">
                    <input type="checkbox" id="cat4">
                    <label for="cat4">Escorted Tours <span class="font-size-13 ml-1">(2)</span></label>
                </div>
                <div class="custom-checkbox">
                    <input type="checkbox" id="cat5">
                    <label for="cat5">Group Tours <span class="font-size-13 ml-1">(11)</span></label>
                </div>
                <div class="custom-checkbox">
                    <input type="checkbox" id="cat6">
                    <label for="cat6">Ligula <span class="font-size-13 ml-1">(3)</span></label>
                </div>
                <div class="collapse" id="categoryMenu">
                    <div class="custom-checkbox">
                        <input type="checkbox" id="cat7">
                        <label for="cat7">Family Tours <span class="font-size-13 ml-1">(4)</span></label>
                    </div>
                    <div class="custom-checkbox">
                        <input type="checkbox" id="cat8">
                        <label for="cat8">City Trips <span class="font-size-13 ml-1">(5)</span></label>
                    </div>
                    <div class="custom-checkbox">
                        <input type="checkbox" id="cat9">
                        <label for="cat9">National Parks Tours <span class="font-size-13 ml-1">(3)</span></label>
                    </div>
                    <div class="custom-checkbox">
                        <input type="checkbox" id="cat10">
                        <label for="cat10">Vacations <span class="font-size-13 ml-1">(3)</span></label>
                    </div>
                    <div class="custom-checkbox">
                        <input type="checkbox" id="cat11">
                        <label for="cat11">Early booking <span class="font-size-13 ml-1">(7)</span></label>
                    </div>
                    <div class="custom-checkbox">
                        <input type="checkbox" id="cat12">
                        <label for="cat12">Last minute <span class="font-size-13 ml-1">(2)</span></label>
                    </div>
                </div>
                <a class="btn-text" data-toggle="collapse" href="#categoryMenu" role="button" aria-expanded="false" aria-controls="categoryMenu">
                    <span class="show-more">Show More <i class="la la-angle-down"></i></span>
                    <span class="show-less">Show Less <i class="la la-angle-up"></i></span>
                </a>
            </div>
        </div>
        <div class="sidebar-widget">
            <div class="section-tab section-tab-2 pb-3">
                <ul class="nav nav-tabs" id="myTab3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" id="recent-tab" data-toggle="tab" href="#recent" role="tab" aria-controls="recent" aria-selected="true">
                            Recent
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" id="popular-tab" data-toggle="tab" href="#popular" role="tab" aria-controls="popular" aria-selected="false">
                            Popular
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="new-tab" data-toggle="tab" href="#new" role="tab" aria-controls="new" aria-selected="false">
                            New
                        </a>
                    </li>
                </ul>
            </div>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane " id="recent" role="tabpanel" aria-labelledby="recent-tab">
                    <div class="card-item card-item-list recent-post-card">
                        <div class="card-img">
                            <a href="blog-single.html" class="d-block">
                                <img src="images/small-img4.jpg" alt="blog-img">
                            </a>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title"><a href="blog-single.html">Pack wisely before traveling</a></h3>
                            <p class="card-meta">
                                <span class="post__date"> 1 March, 2020</span>
                                <span class="post-dot"></span>
                                <span class="post__time">3 Mins read</span>
                            </p>
                        </div>
                    </div>
                    <div class="card-item card-item-list recent-post-card">
                        <div class="card-img">
                            <a href="blog-single.html" class="d-block">
                                <img src="images/small-img5.jpg" alt="blog-img">
                            </a>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title"><a href="blog-single.html">Change your place and get the fresh air</a></h3>
                            <p class="card-meta">
                                <span class="post__date"> 1 March, 2020</span>
                                <span class="post-dot"></span>
                                <span class="post__time">3 Mins read</span>
                            </p>
                        </div>
                    </div>
                    <div class="card-item card-item-list recent-post-card mb-0">
                        <div class="card-img">
                            <a href="blog-single.html" class="d-block">
                                <img src="images/small-img6.jpg" alt="blog-img">
                            </a>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title"><a href="blog-single.html">Introducing this amazing city</a></h3>
                            <p class="card-meta">
                                <span class="post__date"> 1 March, 2020</span>
                                <span class="post-dot"></span>
                                <span class="post__time">3 Mins read</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show active" id="popular" role="tabpanel" aria-labelledby="popular-tab">
                    <div class="card-item card-item-list recent-post-card">
                        <div class="card-img">
                            <a href="blog-single.html" class="d-block">
                                <img src="images/small-img7.jpg" alt="blog-img">
                            </a>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title"><a href="blog-single.html">The Castle on the Cliff: Majestic, Magic</a></h3>
                            <p class="card-meta">
                                <span class="post__date"> 1 March, 2020</span>
                                <span class="post-dot"></span>
                                <span class="post__time">3 Mins read</span>
                            </p>
                        </div>
                    </div>
                    <div class="card-item card-item-list recent-post-card">
                        <div class="card-img">
                            <a href="blog-single.html" class="d-block">
                                <img src="images/small-img8.jpg" alt="blog-img">
                            </a>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title"><a href="blog-single.html">Change your place and get the fresh air</a></h3>
                            <p class="card-meta">
                                <span class="post__date"> 1 March, 2020</span>
                                <span class="post-dot"></span>
                                <span class="post__time">3 Mins read</span>
                            </p>
                        </div>
                    </div>
                    <div class="card-item card-item-list recent-post-card mb-0">
                        <div class="card-img">
                            <a href="blog-single.html" class="d-block">
                                <img src="images/small-img9.jpg" alt="blog-img">
                            </a>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title"><a href="blog-single.html">All Aboard the Rocky Mountaineer</a></h3>
                            <p class="card-meta">
                                <span class="post__date"> 1 March, 2020</span>
                                <span class="post-dot"></span>
                                <span class="post__time">3 Mins read</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane " id="new" role="tabpanel" aria-labelledby="new-tab">
                    <div class="card-item card-item-list recent-post-card">
                        <div class="card-img">
                            <a href="blog-single.html" class="d-block">
                                <img src="images/small-img7.jpg" alt="blog-img">
                            </a>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title"><a href="blog-single.html">The Castle on the Cliff: Majestic, Magic</a></h3>
                            <p class="card-meta">
                                <span class="post__date"> 1 March, 2020</span>
                                <span class="post-dot"></span>
                                <span class="post__time">3 Mins read</span>
                            </p>
                        </div>
                    </div>
                    <div class="card-item card-item-list recent-post-card">
                        <div class="card-img">
                            <a href="blog-single.html" class="d-block">
                                <img src="images/small-img8.jpg" alt="blog-img">
                            </a>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title"><a href="blog-single.html">Change your place and get the fresh air</a></h3>
                            <p class="card-meta">
                                <span class="post__date"> 1 March, 2020</span>
                                <span class="post-dot"></span>
                                <span class="post__time">3 Mins read</span>
                            </p>
                        </div>
                    </div>
                    <div class="card-item card-item-list recent-post-card mb-0">
                        <div class="card-img">
                            <a href="blog-single.html" class="d-block">
                                <img src="images/small-img9.jpg" alt="blog-img">
                            </a>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title"><a href="blog-single.html">All Aboard the Rocky Mountaineer</a></h3>
                            <p class="card-meta">
                                <span class="post__date"> 1 March, 2020</span>
                                <span class="post-dot"></span>
                                <span class="post__time">3 Mins read</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sidebar-widget">
            <h3 class="title stroke-shape">Archives</h3>
            <div class="sidebar-list">
                <ul class="list-items">
                    <li><i class="la la-dot-circle mr-2 text-color"></i><a href="#">June 2015</a></li>
                    <li><i class="la la-dot-circle mr-2 text-color"></i><a href="#">May 2016</a></li>
                    <li><i class="la la-dot-circle mr-2 text-color"></i><a href="#">April 2017</a></li>
                    <li><i class="la la-dot-circle mr-2 text-color"></i><a href="#">February 2019</a></li>
                </ul>
            </div>
        </div>
        <div class="sidebar-widget">
            <h3 class="title stroke-shape">Tag Cloud</h3>
            <ul class="tag-list">
                <li><a href="#">Travel</a></li>
                <li><a href="#">Adventure</a></li>
                <li><a href="#">Tour</a></li>
                <li><a href="#">Nature</a></li>
                <li><a href="#">Island</a></li>
                <li><a href="#">Parks</a></li>
                <li><a href="#">Cruise</a></li>
                <li><a href="#">Mountains</a></li>
                <li><a href="#">Bar</a></li>
                <li><a href="#">Beaches</a></li>
                <li><a href="#">Nightlife</a></li>
            </ul>
        </div>
        <div class="sidebar-widget">
            <h3 class="title stroke-shape">About us</h3>
            <div class="sidebar-about">
                <div class="sidebar-about-img">
                    <img src="images/destination-img3.jpg" alt="">
                    <p class="font-size-28 font-weight-bold text-white">Trizen</p>
                </div>
                <p class="pt-3">Sed ut perspiciatis unde omnis iste natus error sit voluptatem eaque ipsa quae ab illo inventore incididunt ut labore et dolore magna</p>
            </div>
        </div>
        <div class="sidebar-widget">
            <h3 class="title stroke-shape">Follow & Connect</h3>
            <ul class="social-profile">
                <li><a href="#"><i class="lab la-facebook-f"></i></a></li>
                <li><a href="#"><i class="lab la-twitter"></i></a></li>
                <li><a href="#"><i class="lab la-instagram"></i></a></li>
                <li><a href="#"><i class="lab la-linkedin-in"></i></a></li>
            </ul>
        </div>-->
    </div>
</aside><!-- #secondary -->
