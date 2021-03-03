<?php

function trizen_scripts() {
	wp_enqueue_style('google-roboto-font', '//fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap');
	wp_enqueue_style('lib-all-min', '//pro.fontawesome.com/releases/v5.10.0/css/all.css');
	if ( !function_exists('add_UA_widget_categories')) {
		wp_enqueue_style('lib-bootstrap-min', get_theme_file_uri('/assets/css/bootstrap.min.css'));
		wp_enqueue_style('lib-bootstrap-select-min', get_theme_file_uri('/assets/css/bootstrap-select.min.css'));
		wp_enqueue_style('lib-line-awesome', '//maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css');

		wp_enqueue_style( 'owl-carousel-min', get_theme_file_uri( '/assets/css/owl.carousel.min.css' ) );
		wp_enqueue_style( 'owl-theme-default-min', get_theme_file_uri( '/assets/css/owl.theme.default.min.css' ) );
	}
	wp_enqueue_style( 'lib-jquery-fancybox-min', get_theme_file_uri( '/assets/css/jquery.fancybox.min.css' ) );
	wp_enqueue_style( 'lib-daterangepicker', get_theme_file_uri( '/assets/css/daterangepicker.css' ) );
	wp_enqueue_style( 'lib-animate-min', get_theme_file_uri( '/assets/css/animate.min.css' ) );
	wp_enqueue_style( 'lib-animated-headline', get_theme_file_uri( '/assets/css/animated-headline.css' ) );
	wp_enqueue_style( 'lib-jquery-ui', get_theme_file_uri( '/assets/css/jquery-ui.css' ) );
	wp_enqueue_style( 'lib-flag-icon-min', get_theme_file_uri( '/assets/css/flag-icon.min.css' ) );
	wp_enqueue_style( 'trizen-main-style', get_theme_file_uri( '/assets/css/style.css' ) );

	wp_enqueue_style( 'trizen-style', get_stylesheet_uri(), array(), _S_VERSION );

	if ( is_admin_bar_showing() ) {
		$admin_bar_showing_body_sp = <<<EOD
        .fixed-nav .header-menu-wrapper {
            margin-top: 30px;
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
//	wp_enqueue_script('lib-jquery-ripples-min', get_template_directory_uri() .'/assets/js/jquery.ripples-min.js', array('jquery'), '1.0.0', true);
//	wp_enqueue_script('lib-quantity-input-js', get_template_directory_uri() .'/assets/js/quantity-input.js', array('jquery'), '1.0.0', true);

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
}
add_action( 'wp_enqueue_scripts', 'trizen_scripts' );


