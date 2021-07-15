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
	<meta name="author" content="<?php esc_attr_e('TechyDevs', 'trizen'); ?>">
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

<!-- start pre-loader -->
<?php
if($preloader == 1) {
	get_template_part( 'layout/loader' );
} ?>
<!-- end pre-loader -->

<!-- ================================
            START HEADER AREA
================================= -->
<!--<header class="header-area">-->
	<?php
    if($header_bar == 1) {
		get_template_part( 'template-parts/header/header-bar' );
	}

    $header_btn = get_theme_mod('trizen_hd_menu_bar_btn_text', __('Become Local Expert', 'trizen'));
	$header_btn_url = get_theme_mod('trizen_hd_menu_bar_btn_url', __('#', 'trizen'));
    ?>
	<header class="header-menu-wrapper padding-right-100px padding-left-100px">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="menu-wrapper">
						<a href="#" class="down-button"><i class="la la-angle-down"></i></a>
						<div class="logo">
							<?php get_template_part('template-parts/header/common-logo'); ?>
							<div class="menu-toggler">
								<i class="la la-bars"></i>
								<i class="la la-times"></i>
							</div>
						</div>
                        <?php if(has_nav_menu('primary_menu')) { ?>
                            <div class="main-menu-content">
                                <?php get_template_part('template-parts/header/nav-menu'); ?>
                            </div>
                        <?php } if(!empty($header_btn)) { ?>
                            <div class="nav-btn">
                                <a href="<?php echo esc_url($header_btn_url); ?>" class="theme-btn">
                                    <?php echo esc_html($header_btn); ?>
                                </a>
                            </div>
                        <?php } ?>
					</div>
				</div>
			</div>
		</div>
	</header>
<!--</header>-->
<!-- ================================
         END HEADER AREA
================================= -->