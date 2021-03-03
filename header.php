<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package trizen
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta name="author" content="TechyDevs">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php esc_attr_e('Travel Booking WordPress Theme', 'trizen'); ?>">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<!-- Template CSS Files -->
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
if(function_exists('wp_body_open')) {
	wp_body_open();
}

$header_bar = get_theme_mod('show_header_bar', 1);
$preloader  = get_theme_mod('show_preloader', 1);
?>

<!-- start cssload-loader -->
<?php
if($preloader == 1) {
	get_template_part( './layout/loader' );
} ?>
<!-- end cssload-loader -->

<!-- ================================
            START HEADER AREA
================================= -->
<header class="header-area">
	<?php
    if($header_bar == 1) {
		get_template_part( 'template-parts/header/header-bar' );
	} ?>
	<div class="header-menu-wrapper padding-right-100px padding-left-100px">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="menu-wrapper">
						<a href="#" class="down-button"><i class="la la-angle-down"></i></a>
						<div class="logo">
							<?php get_template_part('template-parts/header/common-logo'); ?>
							<div class="menu-toggler">
								<i class="la la-bars"></i>
								<i class="la la-times"></i>
							</div><!-- end menu-toggler -->
						</div><!-- end logo -->
						<div class="main-menu-content">
							<nav>
								<ul>
									<li>
										<a href="#">Home <i class="la la-angle-down"></i></a>
										<ul class="dropdown-menu-item">
											<li><a href="index.html">Home - main</a></li>
											<li><a href="index2.html">Home - Hotel</a></li>
											<li><a href="index3.html">Home - Activity</a></li>
											<li><a href="index4.html">Home - Car</a></li>
											<li><a href="index5.html">Home - Cruise</a></li>
											<li><a href="index6.html">Home - Flight</a></li>
											<li><a href="index7.html">Home - City Tour <span class="badge bg-2 text-white">New</span></a></li>
										</ul>
									</li>
									<li>
										<a href="#">Tour <i class="la la-angle-down"></i></a>
										<ul class="dropdown-menu-item">
											<li><a href="tour-fullwidth.html">Tour Full width</a></li>
											<li><a href="tour-grid.html">Tour Grid</a></li>
											<li><a href="tour-list.html">Tour List</a></li>
											<li><a href="tour-left-sidebar.html">Tour Left Sidebar</a></li>
											<li><a href="tour-right-sidebar.html">Tour Right Sidebar</a></li>
											<li><a href="tour-details.html">Tour details</a></li>
											<li><a href="tour-booking.html">Tour Booking</a></li>
											<li><a href="tour-search-result.html">Tour Search Result</a></li>
										</ul>
									</li>
									<li>
										<a href="#">Cruise <i class="la la-angle-down"></i></a>
										<ul class="dropdown-menu-item">
											<li><a href="cruises.html">Cruises</a></li>
											<li><a href="cruises-list.html">Cruise list</a></li>
											<li><a href="cruise-sidebar.html">Cruise Sidebar</a></li>
											<li><a href="cruise-details.html">Cruise details</a></li>
											<li><a href="cruise-booking.html">Cruise Booking</a></li>
											<li><a href="cruise-search-result.html">Cruise Search Result</a></li>
										</ul>
									</li>
									<li>
										<a href="#">Pages <i class="la la-angle-down"></i></a>
										<div class="dropdown-menu-item mega-menu">
											<ul class="row no-gutters">
												<li class="col-lg-3 mega-menu-item">
													<ul>
														<li><a href="add-hotel.html">add hotel </a></li>
														<li><a href="add-flight.html">add flight </a></li>
														<li><a href="add-tour.html">add tour </a></li>
														<li><a href="add-cruise.html">add cruise </a></li>
														<li><a href="add-car.html">add car</a></li>
														<li><a href="user-dashboard.html">User Dashboard</a></li>
														<li><a href="admin-dashboard.html">Admin Dashboard</a></li>
														<li><a href="career.html">career <span class="badge bg-2 text-white">New</span></a></li>
													</ul>
												</li>
												<li class="col-lg-3 mega-menu-item">
													<ul>
														<li><a href="career-details.html">career details<span class="badge bg-2 text-white">New</span></a></li>
														<li><a href="user-profile.html">User profile</a></li>
														<li><a href="become-local-expert.html">Become Local Expert</a></li>
														<li><a href="contact.html">contact</a></li>
														<li><a href="cart.html">Cart</a></li>
														<li><a href="checkout.html">Checkout</a></li>
														<li><a href="recover.html">recover password</a></li>
														<li><a href="payment-received.html">payment received</a></li>
													</ul>
												</li>
												<li class="col-lg-3 mega-menu-item">
													<ul>
														<li><a href="payment-complete.html">payment complete</a></li>
														<li><a href="destinations.html">Destinations</a></li>
														<li><a href="about.html">about</a></li>
														<li><a href="services.html">Our Services</a></li>
														<li><a href="gallery.html">Gallery</a></li>
														<li><a href="pricing.html">pricing</a></li>
														<li><a href="faq.html">faq</a></li>
													</ul>
												</li>
												<li class="col-lg-3 mega-menu-item">
													<ul>
														<li><a href="add-new-post.html">add new post</a></li>
														<li><a href="blog-full-width.html">blog full width</a></li>
														<li><a href="blog-grid.html">blog grid</a></li>
														<li><a href="blog-sidebar.html">blog sidebar</a></li>
														<li><a href="blog-single.html">blog details</a></li>
														<li><a href="coming-soon.html">Coming Soon</a></li>
														<li><a href="page-404.html">404 page</a></li>
													</ul>
												</li>
											</ul>
										</div>
									</li>
									<li>
										<a href="#">Flight <i class="la la-angle-down"></i></a>
										<ul class="dropdown-menu-item">
											<li><a href="flight-grid.html">Flight grid</a></li>
											<li><a href="flight-list.html">Flight list</a></li>
											<li><a href="flight-sidebar.html">Flight sidebar </a></li>
											<li><a href="flight-single.html">Flight details</a></li>
											<li><a href="flight-booking.html">Flight Booking</a></li>
											<li><a href="flight-search-result.html">Flight Search Result</a></li>
										</ul>
									</li>
									<li>
										<a href="#">Hotel <i class="la la-angle-down"></i></a>
										<ul class="dropdown-menu-item">
											<li><a href="hotel-grid.html">Hotel grid</a></li>
											<li><a href="hotel-list.html">Hotel list</a></li>
											<li><a href="hotel-sidebar.html">Hotel sidebar </a></li>
											<li><a href="hotel-single.html">Hotel details</a></li>
											<li><a href="hotel-booking.html">Hotel Booking</a></li>
											<li><a href="hotel-search-result.html">Hotel Search Result</a></li>
											<li>
												<a href="#">Rooms <i class="la la-plus"></i></a>
												<ul class="sub-menu">
													<li><a href="room-list.html">Room List</a></li>
													<li><a href="room-grid.html">Room Grid</a></li>
													<li><a href="room-search-result.html">Search Result</a></li>
													<li><a href="room-search-result-list.html">Search Result list</a></li>
													<li><a href="room-details.html">Room Details</a></li>
												</ul>
											</li>
										</ul>
									</li>
									<li>
										<a href="#">car <i class="la la-angle-down"></i></a>
										<ul class="dropdown-menu-item">
											<li><a href="car-grid.html">car grid</a></li>
											<li><a href="car-list.html">car list</a></li>
											<li><a href="car-sidebar.html">car sidebar </a></li>
											<li><a href="car-single.html">car details</a></li>
											<li><a href="car-booking.html">Car Booking</a></li>
											<li><a href="car-search-result.html">Car Search Result</a></li>
										</ul>
									</li>
								</ul>
							</nav>
						</div><!-- end main-menu-content -->
						<div class="nav-btn">
							<a href="become-local-expert.html" class="theme-btn">Become Local Expert</a>
						</div><!-- end nav-btn -->
					</div><!-- end menu-wrapper -->
				</div><!-- end col-lg-12 -->
			</div><!-- end row -->
		</div><!-- end container-fluid -->
	</div><!-- end header-menu-wrapper -->
</header>
<!-- ================================
         END HEADER AREA
================================= -->