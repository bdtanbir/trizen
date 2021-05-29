<?php

function trizen_scripts() {
	wp_enqueue_style('google-roboto-font', '//fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap');
	wp_enqueue_style('lib-all-min', '//pro.fontawesome.com/releases/v5.10.0/css/all.css');
	if ( !function_exists('add_UA_widget_categories')) {
		wp_enqueue_style('lib-bootstrap-min', get_theme_file_uri('/assets/css/bootstrap.min.css'));
		wp_enqueue_style('lib-line-awesome', '//maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css');

		wp_enqueue_style( 'owl-carousel-min', get_theme_file_uri( '/assets/css/owl.carousel.min.css' ) );
		wp_enqueue_style( 'owl-theme-default-min', get_theme_file_uri( '/assets/css/owl.theme.default.min.css' ) );
	}
	wp_enqueue_style('lib-bootstrap-select-min', get_theme_file_uri('/assets/css/bootstrap-select.min.css'));
	wp_enqueue_style( 'lib-jquery-fancybox-min', get_theme_file_uri( '/assets/css/jquery.fancybox.min.css' ) );
	wp_enqueue_style( 'lib-daterangepicker', get_theme_file_uri( '/assets/css/daterangepicker.css' ) );
	wp_enqueue_style( 'lib-animate-min', get_theme_file_uri( '/assets/css/animate.min.css' ) );
	wp_enqueue_style( 'lib-animated-headline', get_theme_file_uri( '/assets/css/animated-headline.css' ) );
	wp_enqueue_style( 'lib-jquery-ui', get_theme_file_uri( '/assets/css/jquery-ui.css' ) );
	wp_enqueue_style( 'lib-flag-icon-min', get_theme_file_uri( '/assets/css/flag-icon.min.css' ) );
	wp_enqueue_style( 'lib-leaflet', get_theme_file_uri( '/assets/css/leaflet.css' ) );
	wp_enqueue_style( 'trizen-main-style', get_theme_file_uri( '/assets/css/style.css' ) );

	wp_enqueue_style( 'trizen-style', get_stylesheet_uri(), array(), _S_VERSION );

	if ( is_admin_bar_showing() ) {
		$admin_bar_showing_body_sp = <<<EOD
        .fixed-nav .header-menu-wrapper {
            margin-top: 30px;
        }
        .single-nav-sticky {
            top: 30px;
        }
        @media only screen and (max-width: 768px) {
        
        }
        @media screen and (max-width: 600px) {
        
        }
        @media screen and (max-width: 425px) {
        }
EOD;
		wp_add_inline_style('trizen-style', $admin_bar_showing_body_sp);
	}



	$hotel_details_breadcrumb_bg        = get_theme_mod('trizen_hotel_details_bdc_bg');
	$breadcrumb_bg                      = get_theme_mod('trizen_breadcrumb1_bg');
	$hotel_details_bdc_pt               = get_theme_mod('trizen_hotel_details_bdc_wrap_pt', 225);
	$hotel_details_bdc_pb               = get_theme_mod('trizen_hotel_details_bdc_wrap_pb', 30);
	$breadcrumb1_pt                     = get_theme_mod('trizen_breadcrumb1_wrapper_pt', 90);
	$breadcrumb1_pb                     = get_theme_mod('trizen_breadcrumb1_wrapper_pb', 100);
	$breadcrumb1_title_clr              = get_theme_mod('trizen_breadcrumb_title_clr', __('#ffffff', 'trizen'));
	$breadcrumb1_title_size             = get_theme_mod('trizen_breadcrumb1_title_size', 40);
	$breadcrumb1_bdc_bg                 = get_theme_mod('trizen_breadcrumb1_bdc_bg', __('rgba(0, 0, 0, 0.3)', 'trizen'));
	$breadcrumb1_bdc_clr                = get_theme_mod('trizen_breadcrumb1_bdc_clr', __('#ffffff', 'trizen'));
	$breadcrumb1_bdc_hv_clr             = get_theme_mod('trizen_breadcrumb1_bdc_hv_clr', __('#287dfa', 'trizen'));
	$breadcrumb1_bdc_size               = get_theme_mod('trizen_breadcrumb1_bdc_size', 16);
	$hotel_details_bdc_video_btn_clr    = get_theme_mod('trizen_hotel_details_bdc_video_btn_clr', __('#5d646d', 'trizen'));
	$hotel_details_bdc_video_btn_bg     = get_theme_mod('trizen_hotel_details_bdc_video_btn_bg', __('#ffffff', 'trizen'));
	$hotel_details_bdc_video_btn_clr_hv = get_theme_mod('trizen_hotel_details_bdc_video_btn_clr_hv', __('#ffffff', 'trizen'));
	$hotel_details_bdc_video_btn_bg_hv  = get_theme_mod('trizen_hotel_details_bdc_video_btn_bg_hv', __('#287dfa', 'trizen'));
	$hotel_details_bdc_photo_btn_clr    = get_theme_mod('trizen_hotel_details_bdc_photo_btn_clr', __('#5d646d', 'trizen'));
	$hotel_details_bdc_photo_btn_bg     = get_theme_mod('trizen_hotel_details_bdc_photo_btn_bg', __('#ffffff', 'trizen'));
	$hotel_details_bdc_photo_btn_clr_hv = get_theme_mod('trizen_hotel_details_bdc_photo_btn_clr_hv', __('#ffffff', 'trizen'));
	$hotel_details_bdc_photo_btn_bg_hv  = get_theme_mod('trizen_hotel_details_bdc_photo_btn_bg_hv', __('#287dfa', 'trizen'));
	?>
	<style>
        .hotel-details-breadcrumb {
        <?php if(!empty($hotel_details_breadcrumb_bg)) { ?>
            background-image: url("<?php echo esc_url($hotel_details_breadcrumb_bg); ?>");
        <?php } ?>
        }
        .hotel-details-breadcrumb .breadcrumb-btn {
            <?php if(!empty($hotel_details_bdc_pt)) { ?>
                padding-top: <?php echo esc_attr($hotel_details_bdc_pt); ?>px;
            <?php } if(!empty($hotel_details_bdc_pb)) { ?>
                padding-bottom: <?php echo esc_attr($hotel_details_bdc_pb); ?>px;
            <?php } ?>
        }
        .breadcrumb-area.static-breadcrumb {
            <?php if(!empty($breadcrumb_bg)) { ?>
                background-image: url("<?php echo esc_url($breadcrumb_bg); ?>");
            <?php } if(!empty($breadcrumb1_pt)) { ?>
                padding-top: <?php echo esc_attr($breadcrumb1_pt); ?>px;
            <?php } if(!empty($breadcrumb1_pb)) { ?>
                padding-bottom: <?php echo esc_attr($breadcrumb1_pb); ?>px;
            <?php } ?>
        }
        .breadcrumb-area.static-breadcrumb .breadcrumb-content h2 {
            <?php if(!empty($breadcrumb1_title_clr)) { ?>
                color: <?php echo esc_attr($breadcrumb1_title_clr); ?>;
            <?php } if(!empty($breadcrumb1_title_clr)) { ?>
                font-size: <?php echo esc_attr($breadcrumb1_title_size); ?>px;
            <?php } ?>
        }
        .breadcrumb-area.static-breadcrumb .breadcrumb-list .list-items {
            <?php if(!empty($breadcrumb1_bdc_bg)) { ?>
                background: <?php echo esc_attr($breadcrumb1_bdc_bg); ?>;
            <?php } ?>
        }
        .breadcrumb-area.static-breadcrumb .breadcrumb-list .list-items li a,
        .breadcrumb-area.static-breadcrumb .breadcrumb-list .list-items li {
            <?php if(!empty($breadcrumb1_bdc_clr)) { ?>
                color: <?php echo esc_attr($breadcrumb1_bdc_clr); ?>;
            <?php } ?>
        }
        .breadcrumb-area.static-breadcrumb .breadcrumb-list .list-items li a:hover {
            <?php if(!empty($breadcrumb1_bdc_hv_clr)) { ?>
                color: <?php echo esc_attr($breadcrumb1_bdc_hv_clr); ?>;
            <?php } ?>
        }
        .breadcrumb-area.static-breadcrumb .breadcrumb-list .list-items li {
            <?php if(!empty($breadcrumb1_bdc_size)) { ?>
                font-size: <?php echo esc_attr($breadcrumb1_bdc_size); ?>;
            <?php } ?>
        }
        .hotel-details-breadcrumb .breadcrumb-btn .hotel-video-btn {
            <?php if(!empty($hotel_details_bdc_video_btn_clr)) { ?>
                color: <?php echo esc_attr($hotel_details_bdc_video_btn_clr); ?>;
            <?php } if(!empty($hotel_details_bdc_video_btn_bg)) { ?>
                background: <?php echo esc_attr($hotel_details_bdc_video_btn_bg); ?>;
            <?php } ?>
        }
        .hotel-details-breadcrumb .breadcrumb-btn .hotel-video-btn:hover {
            <?php if(!empty($hotel_details_bdc_video_btn_clr_hv)) { ?>
                color: <?php echo esc_attr($hotel_details_bdc_video_btn_clr_hv); ?>;
            <?php } if(!empty($hotel_details_bdc_video_btn_bg_hv)) { ?>
                background: <?php echo esc_attr($hotel_details_bdc_video_btn_bg_hv); ?>;
            <?php } ?>
        }
        .hotel-details-breadcrumb .breadcrumb-btn .hotel-gallery-btn {
            <?php if(!empty($hotel_details_bdc_photo_btn_clr)) { ?>
                color: <?php echo esc_attr($hotel_details_bdc_photo_btn_clr); ?>;
            <?php } if(!empty($hotel_details_bdc_photo_btn_bg)) { ?>
                background: <?php echo esc_attr($hotel_details_bdc_photo_btn_bg); ?>;
            <?php } ?>
        }
        .hotel-details-breadcrumb .breadcrumb-btn .hotel-gallery-btn:hover {
            <?php if(!empty($hotel_details_bdc_photo_btn_clr_hv)) { ?>
                color: <?php echo esc_attr($hotel_details_bdc_photo_btn_clr_hv); ?>;
            <?php } if(!empty($hotel_details_bdc_photo_btn_bg_hv)) { ?>
                background: <?php echo esc_attr($hotel_details_bdc_photo_btn_bg_hv); ?>;
            <?php } ?>
        }
	</style>
	<?php
	wp_enqueue_script('lib-jquery-ui', get_template_directory_uri() .'/assets/js/jquery-ui.js', array('jquery'), '1.0.0', true);
	wp_enqueue_script('lib-bootstrap-popper-min', get_template_directory_uri() .'/assets/js/popper.min.js', array('jquery'), '1.0.0', true);
	wp_enqueue_script('lib-bootstrap-min', get_template_directory_uri() .'/assets/js/bootstrap.min.js', array('jquery'), '1.0.0', true);
	wp_enqueue_script('lib-bootstrap-select-min', get_template_directory_uri() .'/assets/js/bootstrap-select.min.js', array('jquery'), '1.0.0', true);
	wp_enqueue_script('lib-moment-min', get_template_directory_uri() .'/assets/js/moment.min.js', array('jquery'), '1.0.0', true);
	wp_enqueue_script('lib-daterangepicker-min', get_template_directory_uri() .'/assets/js/daterangepicker.js', array('jquery'), '1.0.0', true);
	if(!function_exists('add_UA_widget_categories')) {
		wp_enqueue_script('lib-owl-carousel-min', get_template_directory_uri() .'/assets/js/owl.carousel.min.js', array('jquery'), '1.0.0', true);
		wp_enqueue_script('lib-isotope', get_template_directory_uri() .'/assets/js/isotope.js', array('jquery'), '1.0.0', true);
	}
	wp_enqueue_script('lib-fancybox-min', get_template_directory_uri() .'/assets/js/jquery.fancybox.min.js', array('jquery'), '1.0.0', true);
	wp_enqueue_script('lib-countTo-min', get_template_directory_uri() .'/assets/js/jquery.countTo.min.js', array('jquery'), '1.0.0', true);
	wp_enqueue_script('lib-animated-headline', get_template_directory_uri() .'/assets/js/animated-headline.js', array('jquery'), '1.0.0', true);
	// wp_enqueue_script('lib-jquery-ripples-min', get_template_directory_uri() .'/assets/js/jquery.ripples-min.js', array('jquery'), '1.0.0', true);
	wp_enqueue_script('lib-quantity-input-js', get_template_directory_uri() .'/assets/js/quantity-input.js', array('jquery'), '1.0.0', true);
	wp_enqueue_script('theme-navbar-sticky-js', get_template_directory_uri() .'/assets/js/navbar-sticky.js', array('jquery'), '1.0.0', true);
	wp_enqueue_script('theme-total-price-js', get_template_directory_uri() .'/assets/js/total-price.js', array('jquery'), '1.0.0', true);
	wp_enqueue_script('lib-leaflet-js', get_template_directory_uri() .'/assets/js/leaflet.js', array('jquery'), '1.0.0', true);
	wp_enqueue_script('lib-map-js', get_template_directory_uri() .'/assets/js/map.js', array('jquery'), '1.0.0', true);

	wp_enqueue_script( 'trizen-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	wp_enqueue_script('trizen-js', get_template_directory_uri().'/assets/js/main.js', array('jquery'), _S_VERSION, true);


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	$ajax_url =(function_exists('edd_get_ajax_url'))?edd_get_ajax_url():admin_url( 'admin-ajax.php' );
	wp_localize_script(
		'trizen-js',
		'trizen_main_ajax',
		array(
			'ajaxurl' => $ajax_url,
			'nonce'   => wp_create_nonce('trizen_main'),
		)
	);


    
    wp_localize_script('jquery', 'ts_params', [
        'theme_url'                => get_template_directory_uri(),
        'site_url'                 => site_url(),
        'ajax_url'                 => admin_url('admin-ajax.php'),
        'loading_url'              => admin_url('/images/wpspin_light.gif'),
        'ts_search_nonce'          => wp_create_nonce("st_search_security"),
        'free_text'                => esc_html__('Free', 'trizen'),
        'locale'                   => get_locale(),
        'text_refresh'             => esc_html__("Refresh", 'trizen'),
        'text_loading'             => esc_html__("Loading...", 'trizen'),
        'text_no_more'             => esc_html__("No More", 'trizen'),
        'no_vacancy'               => esc_html__('No vacancies', 'trizen'),
        'a_vacancy'                => esc_html__('a vacancy', 'trizen'),
        'more_vacancy'             => esc_html__('vacancies', 'trizen'),
        'utm'                      => (is_ssl() ? 'https' : 'http') . '://shinetheme.com/utm/utm.gif',
        '_s'                       => wp_create_nonce('ts_frontend_security'),
        'text_price'               => esc_html__("Price", 'trizen'),
        'text_origin_price'        => esc_html__("Origin Price", 'trizen'),
        'text_unavailable'         => esc_html__('Not Available ', 'trizen'),
        'text_available'           => esc_html__('Available ', 'trizen'),
        'text_adult_price'         => esc_html__('Adult Price ', 'trizen'),
        'text_child_price'         => esc_html__('Child Price ', 'trizen'),
        'text_update'              => esc_html__('Update ', 'trizen'),
        'text_adult'               => esc_html__('Adult ', 'trizen'),
        'text_child'               => esc_html__('Child ', 'trizen'),
        'text_use_this_media'      => esc_html__('Use this media', 'trizen'),
        'text_select_image'        => esc_html__('Select Image', 'trizen'),
        'text_confirm_delete_item' => esc_html__('Are you sure want to delete this item?', 'trizen'),
        'text_process_cancel'      => esc_html__('You cancelled the process', 'trizen'),
        'prev_month'               => esc_html__('prev month', 'trizen'),
        'next_month'               => esc_html__('next month', 'trizen'),
        'please_waite'             => esc_html__('Please wait...', 'trizen'),
    ]);


    if (function_exists('edd_get_option')) {
        $loginRedirectPageID = edd_get_option( 'login_redirect_page', '' );
        $loginRedirect       = get_permalink( $loginRedirectPageID );
    } else {
        $loginRedirect = home_url();
    }
    wp_enqueue_script('trizen-login-register', get_template_directory_uri().'/assets/js/trizen-login-register.js', array('jquery'), time(),true);
    wp_localize_script( 'trizen-login-register', 'ajax_auth_object', array(
        'ajaxurl'         => admin_url( 'admin-ajax.php' ),
        'redirecturl'     => isset($loginRedirect) ? $loginRedirect : home_url(),
        'loadingmessage'  => esc_html__('Sending user info, please wait...','trizen')
    ));
}
add_action( 'wp_enqueue_scripts', 'trizen_scripts' );
add_action( 'wp_ajax_trizen_ajaxlogin', 'trizen_ajaxlogin' );
add_action( 'wp_ajax_nopriv_trizen_ajaxlogin', 'trizen_ajaxlogin' );
add_action( 'wp_ajax_nopriv_trizen_ajaxregister','trizen_ajax_register' );
add_action( 'wp_ajax_trizen_ajaxregister', 'trizen_ajax_register' );


function trizen_admin_script()
{
	wp_enqueue_style( 'lib-daterangepicker', get_theme_file_uri( '/assets/css/daterangepicker.css' ) );
	wp_enqueue_style(
		'trizen-global-css',
		get_template_directory_uri().( '/assets/css/trizen-global.css' ),
		time()
	);
	wp_enqueue_script('lib-daterangepicker-min', get_template_directory_uri() .'/assets/js/daterangepicker.js', array('jquery'), '1.0.0', true);

}
add_action('admin_enqueue_scripts', 'trizen_admin_script');


