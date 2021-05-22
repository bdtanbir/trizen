<?php
/**
 * trizen functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package trizen
 */
require get_template_directory() . '/inc/theme-setup.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/enqueue.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/trizen-customizer.php';

/**
 * Navwalker
 */
require get_template_directory() . '/lib/navwalker.php';

/**
 * Custom Comment
 */
require get_template_directory() . '/inc/custom-comments.php';

/**
 * TGM Plugin Activation.
 */
require get_template_directory() . '/inc/tgmpa.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/* Allowed Html */
function trizen_wses_allowed_menu_html() {
	return array (
		'a' => array (
			'href'  => array(),
			'class' => array(),
		),
		'div' => array (
			'id'  => array(),
			'class' => array(),
		),
		'h1' => array (
			'id'  => array(),
			'class' => array(),
		),
		'h2' => array (
			'id'  => array(),
			'class' => array(),
		),
		'h3' => array (
			'id'  => array(),
			'class' => array(),
		),
		'h4' => array (
			'id'  => array(),
			'class' => array(),
		),
		'h5' => array (
			'id'  => array(),
			'class' => array(),
		),
		'h6' => array (
			'id'  => array(),
			'class' => array(),
		),
		'span' => array (
			'id'  => array(),
			'class' => array(),
		),
		'p' => array (
			'id'  => array(),
			'class' => array(),
		),
		'strong' => array (
			'id'  => array(),
			'class' => array(),
		),
		'b' => array (
			'id'  => array(),
			'class' => array(),
		),
		'code' => array (
			'id'  => array(),
			'class' => array(),
		),
		'br' => array (
			'id'  => array(),
			'class' => array(),
		),
		'pre' => array (
			'id'  => array(),
			'class' => array(),
		),
		'ul' => array (
			'id'  => array(),
			'class' => array(),
		),
		'li' => array (
			'id'  => array(),
			'class' => array(),
		),
		'i' => array (
			'id'  => array(),
			'class' => array(),
		),
	);
}

/* SVG Image Support */
function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

/**
 * Trizen Function - Printing the current user name.
 * Displays the currently logged in user name.
 */

if( ! function_exists( 'trizen_print_current_user_name' ) ){
	function trizen_print_current_user_name(){
		$current_user = wp_get_current_user();
		echo esc_html($current_user->user_login);
	}
}
add_action( 'wp_ajax_trizen_main_ajax',  'trizen_main_ajax' );
add_action( 'wp_ajax_nopriv_trizen_main_ajax','trizen_main_ajax');

/**
 * Trizen Function - Authorization init.
 * Initializing the authorisation.
 */

if( ! function_exists( 'trizen_authorisation_init' ) ){
	function trizen_authorisation_init(){
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
		add_action( 'wp_ajax_trizen_ajaxlogin', 'trizen_ajaxlogin' );
		add_action( 'wp_ajax_nopriv_trizen_ajaxlogin', 'trizen_ajaxlogin' );
		add_action( 'wp_ajax_nopriv_trizen_ajaxregister','trizen_ajax_register' );
		add_action( 'wp_ajax_trizen_ajaxregister', 'trizen_ajax_register' );
	}
}
add_action('init', 'trizen_authorisation_init');

/**
 * Trizen Function - Ajax Login.
 * Ajax popup login actions.
 */
if( ! function_exists( 'trizen_ajaxlogin' ) ){
	function trizen_ajaxlogin(){

		// First check the nonce, if it fails the function will break
		check_ajax_referer( 'ajax-login-nonce', 'security' );

		// Nonce is checked, get the POST data and sign user on
		// Call auth_user_login
		trizen_auth_user_login($_POST['username'], $_POST['password'], 'Login');

		die();
	}
}


/**
 * Techydevs Function - Ajax Register.
 * Ajax popup register actions.
 */

if( ! function_exists( 'trizen_ajax_register' ) ){
	function trizen_ajax_register(){

		global $options; $options = get_option('trizen_register_login');

		// First check the nonce, if it fails the function will break
		check_ajax_referer( 'ajax-register-nonce', 'security' );

		// Nonce is checked, get the POST data and sign user on
		$info = array();
		$info['user_nicename'] = $info['nickname'] = $info['display_name'] = $info['first_name'] = $info['user_login'] = sanitize_user($_POST['username']) ;
		$info['user_pass']     = sanitize_text_field($_POST['password']);
		$info['user_email']    = sanitize_email( $_POST['email']);

		// Register the user

		if(!is_email($info['user_email']) ){
			echo json_encode(array('loggedin'=>false, 'message'=>esc_html__("Please enter a valid email address","trizen")));
			die();
		}
		if(sanitize_text_field($_POST['password2'])!=$info['user_pass']){
			echo json_encode(array('loggedin'=>false, 'message'=>esc_html__("Please enter same password in both fields","trizen")));
			die();
		}
		if(!isset($info['user_pass'])|| !(strlen($info['user_pass']) >0 ) ){
			echo json_encode(array('loggedin'=>false, 'message'=>esc_html__("Password fields cannot be blank","trizen")));
			die();
		}

		$user_register = wp_insert_user( $info );
		if ( is_wp_error($user_register) ){
			$error  = $user_register->get_error_codes() ;

			if(in_array('empty_user_login', $error))
				echo json_encode(array('loggedin'=>false, 'message'=>$user_register->get_error_message('empty_user_login')));
			elseif(in_array('existing_user_login',$error))
				echo json_encode(array('loggedin'=>false, 'message'=>esc_html__('This username is already registered.','trizen')));
			elseif(in_array('existing_user_email',$error))
				echo json_encode(array('loggedin'=>false, 'message'=>esc_html__('This email address is already registered.','trizen')));
		} else {

			trizen_auth_user_login($info['nickname'], $info['user_pass'], 'Registration');
		}

		die();
	}
}


/**
 * Trizen Function - Auth user login.
 * Authenticating the popup login user.
 */
if( ! function_exists( 'trizen_auth_user_login' ) ){
	function trizen_auth_user_login($user_login, $password, $login)
	{
		$info                  = array();
		$info['user_login']    = $user_login;
		$info['user_password'] = $password;
		$info['remember']      = true;

		add_action( 'set_logged_in_cookie', 'trizen_loggedin_cookie' );
		function trizen_loggedin_cookie( $logged_in_cookie ){
			$_COOKIE[LOGGED_IN_COOKIE] = $logged_in_cookie;
		}

		$user_signon = wp_signon( $info, is_ssl() ? true : false);
		if ( is_wp_error($user_signon) ){
			echo json_encode(array('loggedin'=>false, 'message'=>esc_html__('Wrong username or password.','trizen')));
		} else {
			global $current_user;
			wp_set_current_user($user_signon->ID);
			if($login=="Login"){
				echo json_encode(array('loggedin'=>true, 'message'=>esc_html__('Login successful, redirecting...','trizen')));
			}
			else{
				echo json_encode(array('loggedin'=>true, 'message'=>esc_html__('Registration successful, redirecting...','trizen')));
			}

		}

		die();
	}
}


function __search_by_title_only( $search, $wp_query )
{
	global $wpdb;
	if(empty($search)) {
		return $search; // skip processing - no search term in query
	}
	$q = $wp_query->query_vars;
	$n = !empty($q['exact']) ? '' : '%';
	$search =
	$searchand = '';
	foreach ((array)$q['search_terms'] as $term) {
		$term = esc_sql($wpdb->esc_like($term));
		$search .= "{$searchand}($wpdb->posts.post_title LIKE '{$n}{$term}{$n}')";
		$searchand = ' AND ';
	}
	if (!empty($search)) {
		$search = " AND ({$search}) ";
		if (!is_user_logged_in())
			$search .= " AND ($wpdb->posts.post_password = '') ";
	}
	return $search;
}
add_filter('posts_search', '__search_by_title_only', 500, 2);

add_filter('ts_customer_infomation_edit_order', '_customer_infomation_edit_order', 15, 2 );
function _customer_infomation_edit_order($html, $order_id){

	$form_builder = get_post_meta( $order_id, 'wb_form_for_order', true );

	if (!empty($form_builder)) {
		$html = '';

		foreach ($form_builder as $k => $v) {

			$data = wp_parse_args($v, array(
				'title' => '',
				'desc' => '',
				'placeholder' => '',
				'type' => '',
				'name' => '',
				'required' => false,
				'class' => '',
				'custom_id' => '',
				'option_value' => false,
				'post_type' => '',
				'taxonomy' => '',
				'icon' => '',
				'validate' => '',
				'attrs' => array()
			));
			$data['class'] = implode(' ', $data['class']);
			$field_object = WB_Form_Builder_Controller::inst()->get_field($data['type']);
			if($data['name'] == 'st_note'){
				$field_html = '';
			}else{
				$field_html = $field_object->get_admin_html($data, $order_id);
			}
			$html .= $field_html;
		}
	}
	return $html;
}

add_filter('ts_is_woocommerce_checkout', 'ts_check_is_checkout_woocomerce');
if (!function_exists('ts_check_is_checkout_woocomerce')) {
	function ts_check_is_checkout_woocomerce($check) {
		if (class_exists('Woocommerce')) {
			$check = true;
		} else {
			$check = false;
		}
		return $check;
	}
}

function trizen_setcookie( $name, $value, $expire = 0, $secure = false ) {
	setcookie( $name, $value, $expire, '/', null, null );
}

function delete_cart( $cart_name ) {
	setcookie( $cart_name, '', time() - 3600 );
}

function destroy_cart() {
	do_action( 'ts_before_destroy_cart' );

	delete_cart( 'ts_cart' );
	delete_cart( 'ts_cart_coupon' );

	do_action( 'ts_after_destroy_cart' );

}

add_action( 'init', '_remove_cart' );
function _remove_cart() {
    if(class_exists('TSAvailability')) {
        if (get('action', '') === 'ts-remove-cart' && wp_verify_nonce(get('security', ''), 'ts-security')) {
            if (class_exists('WC_Product')) {
                global $woocommerce;
                WC()->cart->empty_cart();
            }
            destroy_cart();
            wp_redirect(remove_query_arg(['action', 'security']));
            exit();
        }
    }
}


if (!function_exists('post_reading_time')) :
    function post_reading_time($post_id) {
        $content = apply_filters('the_content', get_post_field('post_content', $post_id));
        $read_words = '10';
        $decode_content = html_entity_decode($content);
        $filter_shortcode = do_shortcode($decode_content);
        $strip_tags = wp_strip_all_tags($filter_shortcode, true);
        $count = str_word_count($strip_tags);
        $word_per_min = (absint($count) / $read_words);
        $word_per_min = ceil($word_per_min);
        if ( absint($word_per_min) > 0) {
            $word_count_strings = sprintf(_n('%s Min Read  ', '%s Min Read  ',
                number_format_i18n($word_per_min), 'trizen'), number_format_i18n($word_per_min));
            if ('post' == get_post_type($post_id)):
                echo '<span class="post__time">';
                echo esc_html($word_count_strings);
                echo '</span>';
            endif;
        }
        if ( absint($word_per_min) == Null) {
            echo '<span class="post__time">';
            esc_html_e('0 Min Read', 'trizen');
            echo '</span>';
        }
    }
endif;
