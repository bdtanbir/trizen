<?php
/**
 * trizen Theme Customizer
 *
 * @package trizen
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */


if ( ! class_exists( 'Trizen_Customizer' ) ) {
	class Trizen_Customizer
	{
		/**
		 * Add postMessage support for site title and description for the Theme Customizer.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		function register($wp_customize)
		{
			$wp_customize->get_setting('blogname')->transport       = 'postMessage';
			$wp_customize->get_setting('blogdescription')->transport = 'postMessage';


			/* General Dark Logo */
			$wp_customize->add_setting('custom_logo', array(
				'transport'         => 'refresh',
				'sanitize_callback' => [$this, 'sanitize_file']
			));
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_logo', array(
				'label'         => esc_html__('Dark Logo', 'trizen'),
				'section'       => 'title_tagline',
				'priority'      => 9,
				'settings'      => 'custom_logo',
				'type'          => 'upload',
				'button_labels' => array(
					'select'       => esc_html__('Select Logo', 'trizen'),
					'change'       => esc_html__('Change Logo', 'trizen'),
					'remove'       => esc_html__('Remove', 'trizen'),
					'default'      => esc_html__('Default', 'trizen'),
					'placeholder'  => esc_html__('No Logo selected', 'trizen'),
					'frame_title'  => esc_html__('Select Logo', 'trizen'),
					'frame_button' => esc_html__('Choose Logo', 'trizen'),
				),
			)));
			/* General Retina Logo */
			$wp_customize->add_setting('retina_logo', array(
				'transport'         => 'refresh',
				'sanitize_callback' => [$this, 'sanitize_file']
			));
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'retina_logo', array(
				'label'         => esc_html__('Dark Retina Logo', 'trizen'),
				'section'       => 'title_tagline',
				'priority'      => 9,
				'settings'      => 'retina_logo',
				'type'          => 'upload',
				'button_labels' => array(
					'select'       => esc_html__('Select Logo', 'trizen'),
					'change'       => esc_html__('Change Logo', 'trizen'),
					'remove'       => esc_html__('Remove', 'trizen'),
					'default'      => esc_html__('Default', 'trizen'),
					'placeholder'  => esc_html__('No Logo selected', 'trizen'),
					'frame_title'  => esc_html__('Select Logo', 'trizen'),
					'frame_button' => esc_html__('Choose Logo', 'trizen'),

				),
			)));

			/*--------------------------
			 *  General Options
			 * -------------------------*/
			$wp_customize->add_section('trizen_general_options', array(
				'title'           => __('General', 'trizen'),
				'priority'        => 1,
			));
			/* Show Header Bar */
			$wp_customize->add_setting('show_header_bar', array(
				'default'           => true,
				'transport'         => 'refresh',
				'sanitize_callback' => array($this, 'sanitize_checkbox'),
			));
			$wp_customize->add_control('show_header_bar', array(
				'label'    => esc_html__('Show Header Bar', 'trizen'),
				'section'  => 'trizen_general_options',
				'settings' => 'show_header_bar',
				'type'     => 'checkbox',
			));
			/* Show PreLoader */
			$wp_customize->add_setting('show_preloader', array(
				'default'           => true,
				'transport'         => 'refresh',
				'sanitize_callback' => array($this, 'sanitize_checkbox'),
			));
			$wp_customize->add_control('show_preloader', array(
				'label'    => esc_html__('Show PreLoader', 'trizen'),
				'section'  => 'trizen_general_options',
				'settings' => 'show_preloader',
				'type'     => 'checkbox',
			));
			/* Show Static InfoBox */
			$wp_customize->add_setting('show_static_infobox', array(
				'default'           => false,
				'transport'         => 'refresh',
				'sanitize_callback' => array($this, 'sanitize_checkbox'),
			));
			$wp_customize->add_control('show_static_infobox', array(
				'label'    => esc_html__('Show Static Page\'s InfoBox', 'trizen'),
				'section'  => 'trizen_general_options',
				'settings' => 'show_static_infobox',
				'type'     => 'checkbox',
			));
			/* Show Static CTA */
			$wp_customize->add_setting('show_static_footer_cta', array(
				'default'           => false,
				'transport'         => 'refresh',
				'sanitize_callback' => array($this, 'sanitize_checkbox'),
			));
			$wp_customize->add_control('show_static_footer_cta', array(
				'label'    => esc_html__('Show Static Footer CTA', 'trizen'),
				'section'  => 'trizen_general_options',
				'settings' => 'show_static_footer_cta',
				'type'     => 'checkbox',
			));
			/* Show Footer Left Widget */
			$wp_customize->add_setting('show_footer_lf_widget', array(
				'default'           => false,
				'transport'         => 'refresh',
				'sanitize_callback' => array($this, 'sanitize_checkbox'),
			));
			$wp_customize->add_control('show_footer_lf_widget', array(
				'label'    => esc_html__('Show Footer Left Widget', 'trizen'),
				'section'  => 'trizen_general_options',
				'settings' => 'show_footer_lf_widget',
				'type'     => 'checkbox',
			));
			/* Show Breadcrumb Overlay Shape */
			$wp_customize->add_setting('show_breadcrumb_overlay_shape', array(
				'default'           => true,
				'transport'         => 'refresh',
				'sanitize_callback' => array($this, 'sanitize_checkbox'),
			));
			$wp_customize->add_control('show_breadcrumb_overlay_shape', array(
				'label'    => esc_html__('Show Breadcrumb Overlay Shape', 'trizen'),
				'section'  => 'trizen_general_options',
				'settings' => 'show_breadcrumb_overlay_shape',
				'type'     => 'checkbox',
			));
			/* Show Related Post */
			$wp_customize->add_setting('show_related_post', array(
				'default'           => true,
				'transport'         => 'refresh',
				'sanitize_callback' => array($this, 'sanitize_checkbox'),
			));
			$wp_customize->add_control('show_related_post', array(
				'label'    => esc_html__('Show Related Post', 'trizen'),
				'section'  => 'trizen_general_options',
				'settings' => 'show_related_post',
				'type'     => 'checkbox',
			));
			/* Show Related Rooms in Room single */
			$wp_customize->add_setting('show_related_rooms', array(
				'default'           => true,
				'transport'         => 'refresh',
				'sanitize_callback' => array($this, 'sanitize_checkbox'),
			));
			$wp_customize->add_control('show_related_rooms', array(
				'label'    => esc_html__('Show Related Rooms in room single', 'trizen'),
				'section'  => 'trizen_general_options',
				'settings' => 'show_related_rooms',
				'type'     => 'checkbox',
			));


			/*--------------------------
			 *  Header
			 * -------------------------*/
			$wp_customize->add_panel('trizen_header_panel_options', array(
				'title'    => esc_html__('Header', 'trizen'),
				'priority' => 2,
			));
			/* Header Bar */
			$wp_customize->add_section('trizen_header_options', array(
				'title'           => esc_html__('Header Bar', 'trizen'),
				'priority'        => 2,
				'panel'           => 'trizen_header_panel_options',
				'active_callback' => 'trizen_show_header_bar_callback'
			));
			// Contact Info Heading
			$wp_customize->add_setting('trizen_hd_bar_heading', array(
				'transport'         => 'refresh',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_hd_bar_heading', array(
				'label'           => esc_html__('Contact Info', 'trizen'),
				'section'         => 'trizen_header_options',
				'settings'        => 'trizen_hd_bar_heading',
				'type'            => 'hidden',
			));
			// Mobile Number
			$wp_customize->add_setting('trizen_hd_bar_mobile_num', array(
				'transport'         => 'refresh',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_hd_bar_mobile_num', array(
				'label'           => esc_html__('Mobile Number', 'trizen'),
				'section'         => 'trizen_header_options',
				'settings'        => 'trizen_hd_bar_mobile_num',
				'type'            => 'text',
			));
			// Email
			$wp_customize->add_setting('trizen_hd_bar_email', array(
				'transport'         => 'refresh',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_hd_bar_email', array(
				'label'           => esc_html__('Email', 'trizen'),
				'section'         => 'trizen_header_options',
				'settings'        => 'trizen_hd_bar_email',
				'type'            => 'text',
			));
			// User Action Heading
			$wp_customize->add_setting('trizen_hd_user_action_hd', array(
				'transport'         => 'refresh',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_hd_user_action_hd', array(
				'label'           => esc_html__('User Action', 'trizen'),
				'section'         => 'trizen_header_options',
				'settings'        => 'trizen_hd_user_action_hd',
				'type'            => 'hidden',
			));
			// User Action: Login Title
			$wp_customize->add_setting('trizen_hd_user_action_login_title', array(
				'default'           => esc_html__('Login', 'trizen'),
				'transport'         => 'refresh',
				'sanitize_callback' => 'trizen_sanitize_textarea',
			));
			$wp_customize->add_control('trizen_hd_user_action_login_title', array(
				'label'           => esc_html__('Login Title', 'trizen'),
				'section'         => 'trizen_header_options',
				'settings'        => 'trizen_hd_user_action_login_title',
				'type'            => 'text',
			));
			// User Action: Logout Title
			$wp_customize->add_setting('trizen_hd_user_action_logout_title', array(
				'default'           => esc_html__('Logout', 'trizen'),
				'transport'         => 'refresh',
				'sanitize_callback' => 'trizen_sanitize_textarea',
			));
			$wp_customize->add_control('trizen_hd_user_action_logout_title', array(
				'label'           => esc_html__('Logout Title', 'trizen'),
				'section'         => 'trizen_header_options',
				'settings'        => 'trizen_hd_user_action_logout_title',
				'type'            => 'text',
			));
			// User Action: SignUp Title
			$wp_customize->add_setting('trizen_hd_user_action_signup_title', array(
				'default'           => esc_html__('Sign Up', 'trizen'),
				'transport'         => 'refresh',
				'sanitize_callback' => 'trizen_sanitize_textarea',
			));
			$wp_customize->add_control('trizen_hd_user_action_signup_title', array(
				'label'           => esc_html__('Sign Up Title', 'trizen'),
				'section'         => 'trizen_header_options',
				'settings'        => 'trizen_hd_user_action_signup_title',
				'type'            => 'text',
			));
			/*---------------------
				Header Menu Bar
			-----------------------*/
			$wp_customize->add_section('trizen_header_menu_options', array(
				'title'           => esc_html__('Header Menu Bar', 'trizen'),
				'priority'        => 4,
				'panel'           => 'trizen_header_panel_options',
			));
			// Header Menu Bar Button
			$wp_customize->add_setting('trizen_hd_menu_bar_btn_text', array(
				'default'           => esc_html__('Become Local Expert', 'trizen'),
				'transport'         => 'refresh',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_hd_menu_bar_btn_text', array(
				'label'           => esc_html__('Header Button', 'trizen'),
				'section'         => 'trizen_header_menu_options',
				'settings'        => 'trizen_hd_menu_bar_btn_text',
				'type'            => 'text',
			));
			// Header Menu Bar Button URL
			$wp_customize->add_setting('trizen_hd_menu_bar_btn_url', array(
				'default'           => __('#', 'trizen'),
				'transport'         => 'refresh',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_hd_menu_bar_btn_url', array(
				'label'           => esc_html__('Header Button URL', 'trizen'),
				'section'         => 'trizen_header_menu_options',
				'settings'        => 'trizen_hd_menu_bar_btn_url',
				'type'            => 'text',
			));


			/*--------------------------
			 *  Breadcrumb(s)
			 * -------------------------*/
			$wp_customize->add_panel('trizen_breadcrumbs_panel_options', array(
				'title'    => esc_html__('Breadcrumb(s)', 'trizen'),
				'priority' => 50,
			));
			/* Breadcrumb 1 */
			$wp_customize->add_section('trizen_breadcrumb1_options', array(
				'title'           => esc_html__('General Breadcrumb', 'trizen'),
				'priority'        => 2,
				'panel'           => 'trizen_breadcrumbs_panel_options',
			));
			// Breadcrumb 1 BG
			$wp_customize->add_setting('trizen_breadcrumb1_bg', array(
				'transport'         => 'postMessage',
				'sanitize_callback' => [$this, 'sanitize_file']
			));
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'trizen_breadcrumb1_bg', array(
				'type'          => 'upload',
				'label'         => esc_html__('Background', 'trizen'),
				'section'       => 'trizen_breadcrumb1_options',
				'settings'      => 'trizen_breadcrumb1_bg',
				'button_labels' => array(
					'select'       => esc_html__('Select Image', 'trizen'),
					'change'       => esc_html__('Change Image', 'trizen'),
					'remove'       => esc_html__('Remove', 'trizen'),
					'default'      => esc_html__('Default', 'trizen'),
					'placeholder'  => esc_html__('No Image selected', 'trizen'),
					'frame_title'  => esc_html__('Select Image', 'trizen'),
					'frame_button' => esc_html__('Choose Image', 'trizen'),

				),
			)));
			// Wrapper Style
			$wp_customize->add_setting('trizen_breadcrumb1_wrapper_hd', array(
				'transport'         => 'postMessage',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_breadcrumb1_wrapper_hd', array(
				'label'    => esc_html__('Wrapper', 'trizen'),
				'section'  => 'trizen_breadcrumb1_options',
				'settings' => 'trizen_breadcrumb1_wrapper_hd',
				'type'     => 'hidden',
			));
			// Wrapper Padding-top
			$wp_customize->add_setting('trizen_breadcrumb1_wrapper_pt', array(
				'default'           => 90,
				'transport'         => 'postMessage',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_breadcrumb1_wrapper_pt', array(
				'label'    => esc_html__('Padding Top', 'trizen'),
				'section'  => 'trizen_breadcrumb1_options',
				'settings' => 'trizen_breadcrumb1_wrapper_pt',
				'type'     => 'number',
				'choices'  => array(
					'min'  => 0,
					'max'  => 500,
					'step' => 1,
				),
			));
			// Wrapper Padding-bottom
			$wp_customize->add_setting('trizen_breadcrumb1_wrapper_pb', array(
				'default'           => 100,
				'transport'         => 'postMessage',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_breadcrumb1_wrapper_pb', array(
				'label'    => esc_html__('Padding Bottom', 'trizen'),
				'section'  => 'trizen_breadcrumb1_options',
				'settings' => 'trizen_breadcrumb1_wrapper_pb',
				'type'     => 'number',
				'choices'  => array(
					'min'  => 0,
					'max'  => 500,
					'step' => 1,
				),
			));
			// Title Style
			$wp_customize->add_setting('trizen_breadcrumb1_title_hd', array(
				'transport'         => 'postMessage',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_breadcrumb1_title_hd', array(
				'label'    => esc_html__('Title', 'trizen'),
				'section'  => 'trizen_breadcrumb1_options',
				'settings' => 'trizen_breadcrumb1_title_hd',
				'type'     => 'hidden',
			));
			// Title Color
			$wp_customize->add_setting('trizen_breadcrumb_title_clr', array(
				'default'           => esc_html__('#ffffff', 'trizen'),
				'sanitize_callback' => 'sanitize_hex_color',
				'transport'         => 'postMessage'
			));
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'trizen_breadcrumb_title_clr', array(
				'type'    => 'color',
				'label'   => esc_html__('Color', 'trizen'),
				'section' => 'trizen_breadcrumb1_options',
			)));
			// Title Font-size
			$wp_customize->add_setting('trizen_breadcrumb1_title_size', array(
				'default'           => 40,
				'transport'         => 'postMessage',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_breadcrumb1_title_size', array(
				'label'    => esc_html__('Font Size', 'trizen'),
				'section'  => 'trizen_breadcrumb1_options',
				'settings' => 'trizen_breadcrumb1_title_size',
				'type'     => 'number',
				'choices'  => array(
					'min'  => 0,
					'max'  => 500,
					'step' => 1,
				),
			));
			// Breadcrumb Style
			$wp_customize->add_setting('trizen_breadcrumb1_bdc_hd', array(
				'transport'         => 'postMessage',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_breadcrumb1_bdc_hd', array(
				'label'    => esc_html__('Breadcrumb', 'trizen'),
				'section'  => 'trizen_breadcrumb1_options',
				'settings' => 'trizen_breadcrumb1_bdc_hd',
				'type'     => 'hidden',
			));
			// Breadcrumb BG
			$wp_customize->add_setting('trizen_breadcrumb1_bdc_bg', array(
				'default'           => esc_html__('rgba(0, 0, 0, 0.3)', 'trizen'),
				'sanitize_callback' => 'sanitize_hex_color',
				'transport'         => 'postMessage'
			));
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'trizen_breadcrumb1_bdc_bg', array(
				'type'    => 'color',
				'label'   => esc_html__('Background', 'trizen'),
				'section' => 'trizen_breadcrumb1_options',
			)));
			// Breadcrumb Font-size
			$wp_customize->add_setting('trizen_breadcrumb1_bdc_size', array(
				'default'           => 16,
				'transport'         => 'postMessage',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_breadcrumb1_bdc_size', array(
				'label'    => esc_html__('Font Size', 'trizen'),
				'section'  => 'trizen_breadcrumb1_options',
				'settings' => 'trizen_breadcrumb1_bdc_size',
				'type'     => 'number',
				'choices'  => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				),
			));
			// Breadcrumb Color
			$wp_customize->add_setting('trizen_breadcrumb1_bdc_clr', array(
				'default'           => esc_html__('#ffffff', 'trizen'),
				'sanitize_callback' => 'sanitize_hex_color',
				'transport'         => 'postMessage'
			));
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'trizen_breadcrumb1_bdc_clr', array(
				'type'    => 'color',
				'label'   => esc_html__('Color', 'trizen'),
				'section' => 'trizen_breadcrumb1_options',
			)));
			// Breadcrumb Hover Color
			$wp_customize->add_setting('trizen_breadcrumb1_bdc_hv_clr', array(
				'default'           => esc_html__('#287dfa', 'trizen'),
				'sanitize_callback' => 'sanitize_hex_color',
				'transport'         => 'postMessage'
			));
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'trizen_breadcrumb1_bdc_hv_clr', array(
				'type'    => 'color',
				'label'   => esc_html__('Hover Color', 'trizen'),
				'section' => 'trizen_breadcrumb1_options',
			)));


			/* Hotel Details Breadcrumb Customize */
			$wp_customize->add_section('trizen_hotel_details_bdc_options', array(
				'title'           => esc_html__('Hotel Details Breadcrumb', 'trizen'),
				'priority'        => 2,
				'panel'           => 'trizen_breadcrumbs_panel_options',
			));
			// Breadcrumb BG
			$wp_customize->add_setting('trizen_hotel_details_bdc_bg', array(
				'transport'         => 'postMessage',
				'sanitize_callback' => [$this, 'sanitize_file']
			));
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'trizen_hotel_details_bdc_bg', array(
				'type'          => 'upload',
				'label'         => esc_html__('Background', 'trizen'),
				'section'       => 'trizen_hotel_details_bdc_options',
				'settings'      => 'trizen_hotel_details_bdc_bg',
				'button_labels' => array(
					'select'       => esc_html__('Select Image', 'trizen'),
					'change'       => esc_html__('Change Image', 'trizen'),
					'remove'       => esc_html__('Remove', 'trizen'),
					'default'      => esc_html__('Default', 'trizen'),
					'placeholder'  => esc_html__('No Image selected', 'trizen'),
					'frame_title'  => esc_html__('Select Image', 'trizen'),
					'frame_button' => esc_html__('Choose Image', 'trizen'),

				),
			)));
			// Wrapper Style
			$wp_customize->add_setting('trizen_hotel_details_bdc_wrap_hd', array(
				'transport'         => 'postMessage',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_hotel_details_bdc_wrap_hd', array(
				'label'    => esc_html__('Wrapper', 'trizen'),
				'section'  => 'trizen_hotel_details_bdc_options',
				'settings' => 'trizen_hotel_details_bdc_wrap_hd',
				'type'     => 'hidden',
			));
			// Wrapper Padding-top
			$wp_customize->add_setting('trizen_hotel_details_bdc_wrap_pt', array(
				'default'           => 225,
				'transport'         => 'postMessage',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_hotel_details_bdc_wrap_pt', array(
				'label'    => esc_html__('Padding Top', 'trizen'),
				'section'  => 'trizen_hotel_details_bdc_options',
				'settings' => 'trizen_hotel_details_bdc_wrap_pt',
				'type'     => 'number',
				'choices'  => array(
					'min'  => 0,
					'max'  => 500,
					'step' => 1,
				),
			));
			// Wrapper Padding-bottom
			$wp_customize->add_setting('trizen_hotel_details_bdc_wrap_pb', array(
				'default'           => 30,
				'transport'         => 'postMessage',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_hotel_details_bdc_wrap_pb', array(
				'label'    => esc_html__('Padding Bottom', 'trizen'),
				'section'  => 'trizen_hotel_details_bdc_options',
				'settings' => 'trizen_hotel_details_bdc_wrap_pb',
				'type'     => 'number',
				'choices'  => array(
					'min'  => 0,
					'max'  => 500,
					'step' => 1,
				),
			));

			// Video Button Style
			$wp_customize->add_setting('trizen_hotel_details_bdc_video_btn_hd', array(
				'transport'         => 'postMessage',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_hotel_details_bdc_video_btn_hd', array(
				'label'    => esc_html__('Video Button', 'trizen'),
				'section'  => 'trizen_hotel_details_bdc_options',
				'settings' => 'trizen_hotel_details_bdc_video_btn_hd',
				'type'     => 'hidden',
			));
			// Video Button Text
			$wp_customize->add_setting('trizen_hotel_details_bdc_video_btn_txt', array(
				'default'           => esc_html__('Video', 'trizen'),
				'transport'         => 'postMessage',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_hotel_details_bdc_video_btn_txt', array(
				'label'    => esc_html__('Text', 'trizen'),
				'section'  => 'trizen_hotel_details_bdc_options',
				'settings' => 'trizen_hotel_details_bdc_video_btn_txt',
				'type'     => 'text',
			));
			// Video Button Color
			$wp_customize->add_setting('trizen_hotel_details_bdc_video_btn_clr', array(
				'default'           => esc_html__('#5d646d', 'trizen'),
				'sanitize_callback' => 'sanitize_hex_color',
				'transport'         => 'postMessage'
			));
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'trizen_hotel_details_bdc_video_btn_clr', array(
				'type'    => 'color',
				'label'   => esc_html__('Color', 'trizen'),
				'section' => 'trizen_hotel_details_bdc_options',
			)));
			// Video Button Background
			$wp_customize->add_setting('trizen_hotel_details_bdc_video_btn_bg', array(
				'default'           => esc_html__('#ffffff', 'trizen'),
				'sanitize_callback' => 'sanitize_hex_color',
				'transport'         => 'postMessage'
			));
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'trizen_hotel_details_bdc_video_btn_bg', array(
				'type'    => 'color',
				'label'   => esc_html__('Background', 'trizen'),
				'section' => 'trizen_hotel_details_bdc_options',
			)));
			// Video Button Hover Color
			$wp_customize->add_setting('trizen_hotel_details_bdc_video_btn_clr_hv', array(
				'default'           => esc_html__('#ffffff', 'trizen'),
				'sanitize_callback' => 'sanitize_hex_color',
				'transport'         => 'postMessage'
			));
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'trizen_hotel_details_bdc_video_btn_clr_hv', array(
				'type'    => 'color',
				'label'   => esc_html__('Hover Color', 'trizen'),
				'section' => 'trizen_hotel_details_bdc_options',
			)));
			// Video Button Hover Background
			$wp_customize->add_setting('trizen_hotel_details_bdc_video_btn_bg_hv', array(
				'default'           => esc_html__('#287dfa', 'trizen'),
				'sanitize_callback' => 'sanitize_hex_color',
				'transport'         => 'postMessage'
			));
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'trizen_hotel_details_bdc_video_btn_bg_hv', array(
				'type'    => 'color',
				'label'   => esc_html__('Hover Background', 'trizen'),
				'section' => 'trizen_hotel_details_bdc_options',
			)));

			// More Photo Button Style
			$wp_customize->add_setting('trizen_hotel_details_bdc_photo_btn_hd', array(
				'transport'         => 'postMessage',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_hotel_details_bdc_photo_btn_hd', array(
				'label'    => esc_html__('More Photos Button', 'trizen'),
				'section'  => 'trizen_hotel_details_bdc_options',
				'settings' => 'trizen_hotel_details_bdc_photo_btn_hd',
				'type'     => 'hidden',
			));
			// More Photo Button Text
			$wp_customize->add_setting('trizen_hotel_details_bdc_photo_btn_txt', array(
				'default'           => esc_html__('More Photos', 'trizen'),
				'transport'         => 'postMessage',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_hotel_details_bdc_photo_btn_txt', array(
				'label'    => esc_html__('Text', 'trizen'),
				'section'  => 'trizen_hotel_details_bdc_options',
				'settings' => 'trizen_hotel_details_bdc_photo_btn_txt',
				'type'     => 'text',
			));
			// More Photo Button Color
			$wp_customize->add_setting('trizen_hotel_details_bdc_photo_btn_clr', array(
				'default'           => esc_html__('#5d646d', 'trizen'),
				'sanitize_callback' => 'sanitize_hex_color',
				'transport'         => 'postMessage'
			));
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'trizen_hotel_details_bdc_photo_btn_clr', array(
				'type'    => 'color',
				'label'   => esc_html__('Color', 'trizen'),
				'section' => 'trizen_hotel_details_bdc_options',
			)));
			// More Photo Button Background
			$wp_customize->add_setting('trizen_hotel_details_bdc_photo_btn_bg', array(
				'default'           => esc_html__('#ffffff', 'trizen'),
				'sanitize_callback' => 'sanitize_hex_color',
				'transport'         => 'postMessage'
			));
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'trizen_hotel_details_bdc_photo_btn_bg', array(
				'type'    => 'color',
				'label'   => esc_html__('Background', 'trizen'),
				'section' => 'trizen_hotel_details_bdc_options',
			)));
			// More Photo Button Hover Color
			$wp_customize->add_setting('trizen_hotel_details_bdc_photo_btn_clr_hv', array(
				'default'           => esc_html__('#ffffff', 'trizen'),
				'sanitize_callback' => 'sanitize_hex_color',
				'transport'         => 'postMessage'
			));
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'trizen_hotel_details_bdc_photo_btn_clr_hv', array(
				'type'    => 'color',
				'label'   => esc_html__('Hover Color', 'trizen'),
				'section' => 'trizen_hotel_details_bdc_options',
			)));
			// More Photo Button Hover Background
			$wp_customize->add_setting('trizen_hotel_details_bdc_photo_btn_bg_hv', array(
				'default'           => esc_html__('#287dfa', 'trizen'),
				'sanitize_callback' => 'sanitize_hex_color',
				'transport'         => 'postMessage'
			));
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'trizen_hotel_details_bdc_photo_btn_bg_hv', array(
				'type'    => 'color',
				'label'   => esc_html__('Hover Background', 'trizen'),
				'section' => 'trizen_hotel_details_bdc_options',
			)));

			


			/*--------------------------
			 *  Room Grid
			 * -------------------------*/
			$wp_customize->add_panel('trizen_room_grid_panel_options', array(
				'title'    => esc_html__('Room Grid', 'trizen'),
				'priority' => 100,
			));
			/* Related Rooms */
			$wp_customize->add_section('trizen_room_grid_options', array(
				'title'           => esc_html__('Related Rooms', 'trizen'),
				'priority'        => 2,
				'panel'           => 'trizen_room_grid_panel_options',
			));
			// Title
			$wp_customize->add_setting('trizen_room_grid_related_rooms_title', array(
				'transport'         => 'refresh',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_room_grid_related_rooms_title', array(
				'label'           => esc_html__('Title', 'trizen'),
				'section'         => 'trizen_room_grid_options',
				'settings'        => 'trizen_room_grid_related_rooms_title',
				'type'            => 'text',
			));
			// Content
			$wp_customize->add_setting('trizen_room_grid_related_rooms_content', array(
				'transport'         => 'refresh',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_room_grid_related_rooms_content', array(
				'label'           => esc_html__('Content', 'trizen'),
				'section'         => 'trizen_room_grid_options',
				'settings'        => 'trizen_room_grid_related_rooms_content',
				'type'            => 'textarea',
			));


			/*--------------------------
			 *  Hotel
			 * -------------------------*/
            $wp_customize->add_panel('trizen_hotel_panel_options', array(
                'title'    => esc_html__('Hotel', 'trizen'),
                'priority' => 70,
            ));
            /* Hotel Details */
            $wp_customize->add_section('trizen_hotel_options', array(
                'title'           => esc_html__('Hotel Details', 'trizen'),
                'priority'        => 1,
                'panel'           => 'trizen_hotel_panel_options',
            ));
            // Hotel Related Section Title HD
            $wp_customize->add_setting('trizen_hotel_related_items_sec_hd', array(
                'transport'         => 'refresh',
                'sanitize_callback' => 'wp_filter_nohtml_kses',
            ));
            $wp_customize->add_control('trizen_hotel_related_items_sec_hd', array(
                'label'           => esc_html__('Related Hotel(s)', 'trizen'),
                'section'         => 'trizen_hotel_options',
                'settings'        => 'trizen_hotel_related_items_sec_hd',
                'type'            => 'hidden',
            ));
            // Hotel Related Section Title
            $wp_customize->add_setting('trizen_hotel_related_items_sec_title', array(
                'transport'         => 'refresh',
                'sanitize_callback' => 'wp_filter_nohtml_kses',
            ));
            $wp_customize->add_control('trizen_hotel_related_items_sec_title', array(
                'label'           => esc_html__('Section Title', 'trizen'),
                'section'         => 'trizen_hotel_options',
                'settings'        => 'trizen_hotel_related_items_sec_title',
                'type'            => 'text',
                'description'     => esc_html__('Related hotel section title', 'trizen')
            ));
            // Hotel Related Items Ids
            $wp_customize->add_setting('trizen_hotel_related_items_ids', array(
                'transport'         => 'refresh',
                'sanitize_callback' => 'wp_filter_nohtml_kses',
            ));
            $wp_customize->add_control('trizen_hotel_related_items_ids', array(
                'label'           => esc_html__('Hotel(s) ID', 'trizen'),
                'section'         => 'trizen_hotel_options',
                'settings'        => 'trizen_hotel_related_items_ids',
                'type'            => 'text',
                'description'     => __('Related hotel(s) ID for example: <strong>1, 2, 3</strong>', 'trizen')
            ));


			/*--------------------------
			 *  404 Page
			 * -------------------------*/
			$wp_customize->add_section('trizen_error_options', array(
				'title'           => esc_html__('404 Page', 'trizen'),
				'priority'        => 170,
			));
			/* 404 Image */
			$wp_customize->add_setting('trizen_error_img', array(
				'default'			=> get_template_directory_uri().'/assets/images/404.png',
				'transport'         => 'postMessage',
				'sanitize_callback' => [$this, 'sanitize_file']
			));
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'trizen_error_img', array(
				'type'          => 'upload',
				'label'         => esc_html__('Error Image', 'trizen'),
				'section'       => 'trizen_error_options',
				'settings'      => 'trizen_error_img',
				'button_labels' => array(
					'select'       => esc_html__('Select Image', 'trizen'),
					'change'       => esc_html__('Change Image', 'trizen'),
					'remove'       => esc_html__('Remove', 'trizen'),
					'default'      => esc_html__('Default', 'trizen'),
					'placeholder'  => esc_html__('No Image selected', 'trizen'),
					'frame_title'  => esc_html__('Select Image', 'trizen'),
					'frame_button' => esc_html__('Choose Image', 'trizen'),
				),
			)));
			// 404 Title
			$wp_customize->add_setting('trizen_error_title', array(
				'default'           => esc_html__('Ooops! This Page Does Not Exist', 'trizen'),
				'transform'         => 'postMessage',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_error_title', array(
				'label'           => esc_html__('Error Title', 'trizen'),
				'section'         => 'trizen_error_options',
				'settings'        => 'trizen_error_title',
				'type'            => 'text',
			));
			// 404 Content
			$wp_customize->add_setting('trizen_error_content', array(
				'default'           => __('We\'re sorry, but it appears the website address you entered was</br>
				incorrect, or is temporarily unavailable.', 'trizen'),
				'transform'         => 'postMessage',
				'sanitize_callback' => 'trizen_sanitize_textarea',
			));
			$wp_customize->add_control('trizen_error_content', array(
				'label'           => esc_html__('Error Content', 'trizen'),
				'section'         => 'trizen_error_options',
				'settings'        => 'trizen_error_content',
				'type'            => 'textarea',
			));
			// 404 back to home button
			$wp_customize->add_setting('trizen_error_btn', array(
				'default'           => esc_html__('Back to Home', 'trizen'),
				'transform'         => 'postMessage',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_error_btn', array(
				'label'           => esc_html__('Error Button', 'trizen'),
				'section'         => 'trizen_error_options',
				'settings'        => 'trizen_error_btn',
				'type'            => 'text',
			));


			/*--------------------------
			 *  Blog
			 * -------------------------*/
			$wp_customize->add_panel('trizen_blog_panel_options', array(
				'title'    => esc_html__('Blog', 'trizen'),
				'priority' => 200,
			));
			/* Blog Related Post */
			$wp_customize->add_section('trizen_related_post_options', array(
				'title'           => esc_html__('Blog Related Post', 'trizen'),
				'priority'        => 2,
				'panel'           => 'trizen_blog_panel_options',
				'active_callback' => 'trizen_show_related_post_callback',
			));
			// Blog Related Post Title
			$wp_customize->add_setting('trizen_related_post_title', array(
				'default'           => esc_html__('Related Posts', 'trizen'),
				'transform'         => 'postMessage',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_related_post_title', array(
				'label'           => esc_html__('Section Title', 'trizen'),
				'section'         => 'trizen_related_post_options',
				'settings'        => 'trizen_related_post_title',
				'type'            => 'text',
			));
			// Blog Related Post ID(s)
			$wp_customize->add_setting('trizen_related_post_ids', array(
				'transform'         => 'postMessage',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_related_post_ids', array(
				'label'           => esc_html__('Posts ID(s)', 'trizen'),
				'section'         => 'trizen_related_post_options',
				'settings'        => 'trizen_related_post_ids',
				'type'            => 'text',
				'description'     => __('Enter Post\'s ID(s) here. Example(s): <strong>1,2,3,4</strong>', 'trizen')
			));


			/*--------------------------
			 *  Footer
			 * -------------------------*/
			$wp_customize->add_panel('trizen_footer_panel_options', array(
				'title'    => esc_html__('Footer', 'trizen'),
				'priority' => 200,
			));
			/* Static InfoBox */
			$wp_customize->add_section('trizen_footer_stc_pg_options', array(
				'title'           => esc_html__('Static InfoBox', 'trizen'),
				'priority'        => 2,
				'panel'           => 'trizen_footer_panel_options',
				'active_callback' => 'trizen_show_static_pg_infobox_callback'
			));
			/* Box 1 */
			$wp_customize->add_setting('trizen_stc_pg_infobox_hd', array(
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_stc_pg_infobox_hd', array(
				'label'           => esc_html__('Box 1', 'trizen'),
				'section'         => 'trizen_footer_stc_pg_options',
				'settings'        => 'trizen_stc_pg_infobox_hd',
				'type'            => 'hidden',
			));
			// Box 1 Title
			$wp_customize->add_setting('trizen_stc_pg_infobox_1_title', array(
				'transform'         => 'postMessage',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_stc_pg_infobox_1_title', array(
				'label'           => esc_html__('Title', 'trizen'),
				'section'         => 'trizen_footer_stc_pg_options',
				'settings'        => 'trizen_stc_pg_infobox_1_title',
				'type'            => 'text',
			));
			// Box 1 Content
			$wp_customize->add_setting('trizen_stc_pg_infobox_1_content', array(
				'transform'         => 'postMessage',
				'sanitize_callback' => 'trizen_sanitize_textarea',
			));
			$wp_customize->add_control('trizen_stc_pg_infobox_1_content', array(
				'label'           => __('Content', 'trizen'),
				'section'         => 'trizen_footer_stc_pg_options',
				'settings'        => 'trizen_stc_pg_infobox_1_content',
				'type'            => 'textarea',
			));
			// Box 1 box URL
			$wp_customize->add_setting('trizen_stc_pg_infobox_1_bx_url', array(
				'default'           => __('#', 'trizen'),
				'transport'         => 'refresh',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_stc_pg_infobox_1_bx_url', array(
				'label'    => __('Box Link', 'trizen'),
				'section'  => 'trizen_footer_stc_pg_options',
				'settings' => 'trizen_stc_pg_infobox_1_bx_url',
				'type'     => 'text',
			));
			/* -------------------------------------------------------------- */
			/* Box 2 */
			$wp_customize->add_setting('trizen_stc_pg_infobox_hd2', array(
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_stc_pg_infobox_hd2', array(
				'label'           => __('Box 2', 'trizen'),
				'section'         => 'trizen_footer_stc_pg_options',
				'settings'        => 'trizen_stc_pg_infobox_hd2',
				'type'            => 'hidden',
			));
			// Box 2 Title
			$wp_customize->add_setting('trizen_stc_pg_infobox_2_title', array(
				'transform'         => 'postMessage',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_stc_pg_infobox_2_title', array(
				'label'           => __('Title', 'trizen'),
				'section'         => 'trizen_footer_stc_pg_options',
				'settings'        => 'trizen_stc_pg_infobox_2_title',
				'type'            => 'text',
			));
			// Box 2 Content
			$wp_customize->add_setting('trizen_stc_pg_infobox_2_content', array(
				'transform'         => 'postMessage',
				'sanitize_callback' => 'trizen_sanitize_textarea',
			));
			$wp_customize->add_control('trizen_stc_pg_infobox_2_content', array(
				'label'           => __('Content', 'trizen'),
				'section'         => 'trizen_footer_stc_pg_options',
				'settings'        => 'trizen_stc_pg_infobox_2_content',
				'type'            => 'textarea',
			));
			// Box 2 box URL
			$wp_customize->add_setting('trizen_stc_pg_infobox_2_bx_url', array(
				'default'           => __('#', 'trizen'),
				'transport'         => 'refresh',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_stc_pg_infobox_2_bx_url', array(
				'label'    => __('Box Link', 'trizen'),
				'section'  => 'trizen_footer_stc_pg_options',
				'settings' => 'trizen_stc_pg_infobox_2_bx_url',
				'type'     => 'text',
			));
			/* -------------------------------------------------------------- */
			/* Box 3 */
			$wp_customize->add_setting('trizen_stc_pg_infobox_hd3', array(
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_stc_pg_infobox_hd3', array(
				'label'           => __('Box 3', 'trizen'),
				'section'         => 'trizen_footer_stc_pg_options',
				'settings'        => 'trizen_stc_pg_infobox_hd3',
				'type'            => 'hidden',
			));
			// Box 3 Title
			$wp_customize->add_setting('trizen_stc_pg_infobox_3_title', array(
				'transform'         => 'postMessage',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_stc_pg_infobox_3_title', array(
				'label'           => __('Title', 'trizen'),
				'section'         => 'trizen_footer_stc_pg_options',
				'settings'        => 'trizen_stc_pg_infobox_3_title',
				'type'            => 'text',
			));
			// Box 3 Content
			$wp_customize->add_setting('trizen_stc_pg_infobox_3_content', array(
				'transform'         => 'postMessage',
				'sanitize_callback' => 'trizen_sanitize_textarea',
			));
			$wp_customize->add_control('trizen_stc_pg_infobox_3_content', array(
				'label'           => __('Content', 'trizen'),
				'section'         => 'trizen_footer_stc_pg_options',
				'settings'        => 'trizen_stc_pg_infobox_3_content',
				'type'            => 'textarea',
			));
			// Box 3 box URL
			$wp_customize->add_setting('trizen_stc_pg_infobox_3_bx_url', array(
				'default'           => __('#', 'trizen'),
				'transport'         => 'refresh',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_stc_pg_infobox_3_bx_url', array(
				'label'    => __('Box Link', 'trizen'),
				'section'  => 'trizen_footer_stc_pg_options',
				'settings' => 'trizen_stc_pg_infobox_3_bx_url',
				'type'     => 'text',
			));

			/* CTA */
			$wp_customize->add_section('trizen_footer_stc_cta_options', array(
				'title'           => __('CTA', 'trizen'),
				'priority'        => 3,
				'panel'           => 'trizen_footer_panel_options',
				'active_callback' => 'trizen_show_static_pg_cta_callback',
			));
			// CTA Title
			$wp_customize->add_setting('trizen_stc_cta_title', array(
				'transport'         => 'refresh',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_stc_cta_title', array(
				'label'    => __('Title', 'trizen'),
				'section'  => 'trizen_footer_stc_cta_options',
				'settings' => 'trizen_stc_cta_title',
				'type'     => 'text',
			));
			// CTA Shortcode
			$wp_customize->add_setting('trizen_stc_cta_shortcode', array(
				'transport'         => 'refresh',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_stc_cta_shortcode', array(
				'label'       => __('Shortcode', 'trizen'),
				'section'     => 'trizen_footer_stc_cta_options',
				'settings'    => 'trizen_stc_cta_shortcode',
				'type'        => 'textarea',
				'description' => __('Enter mailchimp shortcode here. <strong>[shortcode]</strong>', 'trizen')
			));


			/* Footer Left Widget */
			$wp_customize->add_section('trizen_footer_lf_widget_options', array(
				'title'           => __('Footer Left Widget', 'trizen'),
				'priority'        => 4,
				'panel'           => 'trizen_footer_panel_options',
			));
			// Footer Left Widget Content
			$wp_customize->add_setting('trizen_foot_lf_widget_content', array(
				'transport'         => 'refresh',
				'sanitize_callback' => 'trizen_sanitize_textarea',
			));
			$wp_customize->add_control('trizen_foot_lf_widget_content', array(
				'label'    => __('Content', 'trizen'),
				'section'  => 'trizen_footer_lf_widget_options',
				'settings' => 'trizen_foot_lf_widget_content',
				'type'     => 'textarea',
			));
			// Footer Left Widget Address
			$wp_customize->add_setting('trizen_foot_lf_widget_address', array(
				'transport'         => 'refresh',
				'sanitize_callback' => 'trizen_sanitize_textarea',
			));
			$wp_customize->add_control('trizen_foot_lf_widget_address', array(
				'label'    => __('Address', 'trizen'),
				'section'  => 'trizen_footer_lf_widget_options',
				'settings' => 'trizen_foot_lf_widget_address',
				'type'     => 'textarea',
			));
			// Footer Left Widget Number
			$wp_customize->add_setting('trizen_foot_lf_widget_pn_num', array(
				'transport'         => 'refresh',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_foot_lf_widget_pn_num', array(
				'label'    => __('Phone Number', 'trizen'),
				'section'  => 'trizen_footer_lf_widget_options',
				'settings' => 'trizen_foot_lf_widget_pn_num',
				'type'     => 'text',
			));
			// Footer Left Widget Email
			$wp_customize->add_setting('trizen_foot_lf_widget_email', array(
				'transport'         => 'refresh',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_foot_lf_widget_email', array(
				'label'    => __('Email', 'trizen'),
				'section'  => 'trizen_footer_lf_widget_options',
				'settings' => 'trizen_foot_lf_widget_email',
				'type'     => 'text',
			));

			/* Footer Security Links */
			$wp_customize->add_section('trizen_footer_security_links_options', array(
				'title'           => __('Footer Security Links', 'trizen'),
				'priority'        => 5,
				'panel'           => 'trizen_footer_panel_options',
			));
			// Footer Security Terms & Condition
			$wp_customize->add_setting('trizen_foot_security_terms_title', array(
				'transport'         => 'refresh',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_foot_security_terms_title', array(
				'label'    => __('Terms Title', 'trizen'),
				'section'  => 'trizen_footer_security_links_options',
				'settings' => 'trizen_foot_security_terms_title',
				'type'     => 'text',
			));
			// Footer Security Terms & Condition URL
			$wp_customize->add_setting('trizen_foot_security_terms_url', array(
				'transport'         => 'refresh',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_foot_security_terms_url', array(
				'label'    => __('Terms URL', 'trizen'),
				'section'  => 'trizen_footer_security_links_options',
				'settings' => 'trizen_foot_security_terms_url',
				'type'     => 'text',
			));
			// Footer Security Privacy
			$wp_customize->add_setting('trizen_foot_security_privacy_title', array(
				'transport'         => 'refresh',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_foot_security_privacy_title', array(
				'label'    => __('Privacy Title', 'trizen'),
				'section'  => 'trizen_footer_security_links_options',
				'settings' => 'trizen_foot_security_privacy_title',
				'type'     => 'text',
			));
			// Footer Security Privacy URL
			$wp_customize->add_setting('trizen_foot_security_privacy_url', array(
				'transport'         => 'refresh',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_foot_security_privacy_url', array(
				'label'    => __('Privacy URL', 'trizen'),
				'section'  => 'trizen_footer_security_links_options',
				'settings' => 'trizen_foot_security_privacy_url',
				'type'     => 'text',
			));
			// Footer Security Privacy
			$wp_customize->add_setting('trizen_foot_security_help_title', array(
				'transport'         => 'refresh',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_foot_security_help_title', array(
				'label'    => __('Help Title', 'trizen'),
				'section'  => 'trizen_footer_security_links_options',
				'settings' => 'trizen_foot_security_help_title',
				'type'     => 'text',
			));
			// Footer Security Privacy URL
			$wp_customize->add_setting('trizen_foot_security_help_url', array(
				'transport'         => 'refresh',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_foot_security_help_url', array(
				'label'    => __('Help URL', 'trizen'),
				'section'  => 'trizen_footer_security_links_options',
				'settings' => 'trizen_foot_security_help_url',
				'type'     => 'text',
			));


			/* Footer Social Links */
			$wp_customize->add_section('trizen_footer_social_links_options', array(
				'title'           => __('Footer Social Links/Copyright', 'trizen'),
				'priority'        => 6,
				'panel'           => 'trizen_footer_panel_options',
			));
			// Footer Social Facebook URL
			$wp_customize->add_setting('trizen_foot_social_fb', array(
				'transport'         => 'refresh',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_foot_social_fb', array(
				'label'    => __('Facebook (URL)', 'trizen'),
				'section'  => 'trizen_footer_social_links_options',
				'settings' => 'trizen_foot_social_fb',
				'type'     => 'text',
			));
			// Footer Social Twitter URL
			$wp_customize->add_setting('trizen_foot_social_tw', array(
				'transport'         => 'refresh',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_foot_social_tw', array(
				'label'    => __('Twitter (URL)', 'trizen'),
				'section'  => 'trizen_footer_social_links_options',
				'settings' => 'trizen_foot_social_tw',
				'type'     => 'text',
			));
			// Footer Social Instagram URL
			$wp_customize->add_setting('trizen_foot_social_inc', array(
				'transport'         => 'refresh',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_foot_social_inc', array(
				'label'    => __('Instagram (URL)', 'trizen'),
				'section'  => 'trizen_footer_social_links_options',
				'settings' => 'trizen_foot_social_inc',
				'type'     => 'text',
			));
			// Footer Social Linkedin URL
			$wp_customize->add_setting('trizen_foot_social_ln', array(
				'transport'         => 'refresh',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_foot_social_ln', array(
				'label'    => __('Linkedin (URL)', 'trizen'),
				'section'  => 'trizen_footer_social_links_options',
				'settings' => 'trizen_foot_social_ln',
				'type'     => 'text',
			));
			// Footer Social Google+ URL
			$wp_customize->add_setting('trizen_foot_social_ggl', array(
				'transport'         => 'refresh',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_foot_social_ggl', array(
				'label'    => __('Google+ (URL)', 'trizen'),
				'section'  => 'trizen_footer_social_links_options',
				'settings' => 'trizen_foot_social_ggl',
				'type'     => 'text',
			));
			// Footer Social Pinterest URL
			$wp_customize->add_setting('trizen_foot_social_pnt', array(
				'transport'         => 'refresh',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_foot_social_pnt', array(
				'label'    => __('Pinterest (URL)', 'trizen'),
				'section'  => 'trizen_footer_social_links_options',
				'settings' => 'trizen_foot_social_pnt',
				'type'     => 'text',
			));
			// Footer Social Github URL
			$wp_customize->add_setting('trizen_foot_social_gt', array(
				'transport'         => 'refresh',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_foot_social_gt', array(
				'label'    => __('Github (URL)', 'trizen'),
				'section'  => 'trizen_footer_social_links_options',
				'settings' => 'trizen_foot_social_gt',
				'type'     => 'text',
			));
			// Copyright text
			$wp_customize->add_setting('trizen_copyright_txt', array(
				'default'           => __('© Copyright Trizen 2020. Made with by TechyDevs.com', 'trizen'),
				'transport'         => 'postMessage',
				'sanitize_callback' => 'wp_filter_nohtml_kses'
			));
			$wp_customize->add_control('trizen_copyright_txt', array(
				'label'    => __('Copyright text', 'trizen'),
				'section'  => 'trizen_footer_social_links_options',
				'settings' => 'trizen_copyright_txt',
				'type'     => 'textarea',
			));

			/*----------------------------------------
			 * Selective Refresh
			 * --------------------------------------*/
			if (isset($wp_customize->selective_refresh)) {
				$wp_customize->selective_refresh->add_partial('blogname', array(
					'selector'        => '.site-name',
					'render_callback' => 'trizen_customize_partial_blogname',
				));
				$wp_customize->selective_refresh->add_partial('blogdescription', array(
					'selector'        => '.site-description',
					'render_callback' => 'trizen_customize_partial_blogdescription',
				));
				$wp_customize->selective_refresh->add_partial('trizen_stc_pg_infobox_1_title', array(
					'selector'        => '.info-area .icon-box .info__title',
				));
				$wp_customize->selective_refresh->add_partial('trizen_stc_pg_infobox_1_content', array(
					'selector'        => '.info-area .icon-box .info__desc',
				));
				$wp_customize->selective_refresh->add_partial('trizen_stc_pg_infobox_2_title', array(
					'selector'        => '.info-area .icon-box .info__title',
				));
				$wp_customize->selective_refresh->add_partial('trizen_stc_pg_infobox_2_content', array(
					'selector'        => '.info-area .icon-box .info__desc',
				));
				$wp_customize->selective_refresh->add_partial('trizen_stc_pg_infobox_3_title', array(
					'selector'        => '.info-area .icon-box .info__title',
				));
				$wp_customize->selective_refresh->add_partial('trizen_stc_pg_infobox_3_content', array(
					'selector'        => '.info-area .icon-box .info__desc',
				));
				$wp_customize->selective_refresh->add_partial('trizen_stc_cta_title', array(
					'selector'        => '.subscriber-area .section-heading h2',
				));
				$wp_customize->selective_refresh->add_partial('trizen_stc_cta_shortcode', array(
					'selector'        => '.subscriber-area .subscriber-box .contact-form-action',
				));
				$wp_customize->selective_refresh->add_partial('trizen_foot_lf_widget_content', array(
					'selector'        => '.footer-area .footer-item .footer__desc',
				));
				$wp_customize->selective_refresh->add_partial('trizen_copyright_txt', array(
					'selector'        => '.copy-right .copy__desc',
				));
				$wp_customize->selective_refresh->add_partial('trizen_hd_user_action_login_title', array(
					'selector'        => '.header-right-action .user-login-btn',
				));
				$wp_customize->selective_refresh->add_partial('trizen_hd_user_action_logout_title', array(
					'selector'        => '.header-right-action .user-logout-btn',
				));
				$wp_customize->selective_refresh->add_partial('trizen_hd_user_action_signup_title', array(
					'selector'        => '.header-right-action .user-signup-btn',
				));
				$wp_customize->selective_refresh->add_partial('trizen_hd_menu_bar_btn_text', array(
					'selector'        => '.menu-wrapper .nav-btn',
				));
				$wp_customize->selective_refresh->add_partial('trizen_related_post_title', array(
					'selector'        => '.related-posts .title',
				));
				$wp_customize->selective_refresh->add_partial('trizen_hotel_details_bdc_video_btn_txt', array(
					'selector'        => '.hotel-details-breadcrumb .breadcrumb-btn .hotel-video-btn',
				));
				$wp_customize->selective_refresh->add_partial('trizen_hotel_details_bdc_photo_btn_txt', array(
					'selector'        => '.hotel-details-breadcrumb .breadcrumb-btn .hotel-gallery-btn',
				));
				$wp_customize->selective_refresh->add_partial('trizen_room_grid_related_rooms_title', array(
					'selector'        => '.related-rooms-wrap .section-heading h2',
				));
				$wp_customize->selective_refresh->add_partial('trizen_room_grid_related_rooms_content', array(
					'selector'        => '.related-rooms-wrap .section-heading p',
				));
				$wp_customize->selective_refresh->add_partial('trizen_error_title', array(
					'selector'        => '.error-area .section-heading h2',
				));
				$wp_customize->selective_refresh->add_partial('trizen_error_content', array(
					'selector'        => '.error-area .section-heading p',
				));
				$wp_customize->selective_refresh->add_partial('trizen_hotel_related_items_sec_title', array(
					'selector'        => '.related-hotel-wrap .section-heading h2',
				));
			}

			add_action('wp_enqueue_scripts', [$this, 'customize_preview_js']);
		}

		/**
		 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
		 */
		function customize_preview_js(){
			// Script
			wp_enqueue_script(
				'trizen-theme-customizer-js',
				get_template_directory_uri() . '/assets/js/trizen-customizer.js',
				'',
				'1.0.0',
				true
			);
		}

		function sanitize_select($input, $setting){
			$input = sanitize_key($input);
			$choices = $setting->manager->get_control($setting->id)->choices;
			return (array_key_exists($input, $choices) ? $input : $setting->default);
		}

		function sanitize_file($file, $setting){
			//allowed file types
			$mimes = array(
				'jpg|jpeg|jpe' => 'image/jpeg',
				'gif' => 'image/gif',
				'png' => 'image/png'
			);
			//check file type from file name
			$file_ext = wp_check_filetype($file, $mimes);
			//if file has a valid mime type return it, otherwise return default
			return ($file_ext['ext'] ? $file : $setting->default);
		}

		/**
		 * Sanitize boolean for checkbox.
		 *
		 * @param bool $checked Whether or not a box is checked.
		 *
		 * @return bool
		 */
		function sanitize_checkbox($checked){
			return ( ( isset( $checked ) && true === $checked ) ? true : false );
		}

		function sanitize_radio($input, $setting){
			//input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
			$input = sanitize_key($input);
			//get the list of possible radio box options
			$choices = $setting->manager->get_control($setting->id)->choices;
			//return input if valid or return default option
			return (array_key_exists($input, $choices) ? $input : $setting->default);
		}
	}
	$trizen_customizer = new Trizen_Customizer();
	add_action('customize_register', [$trizen_customizer, 'register']);
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function trizen_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function trizen_customize_partial_blogdescription() {
	bloginfo( 'description' );
}




/* Custom sanitize function for Validate the textarea field. */
if( ! function_exists( 'trizen_sanitize_textarea' ) ) {
	function trizen_sanitize_textarea ( $value, $key ) {
		// Allow only a, div, span, ul, li, p, img, iframe, object, embed, em, strong and script tags in textarea fields.
		$allow_tags = wp_kses_allowed_html( 'post' );
		$allow_tags['a']      = array( 'href'  => true, 'class' => true, 'target' => true, 'style' => true );
		$allow_tags['div']    = array( 'class' => true, 'style' => true );
		$allow_tags['span']   = array( 'class' => true, 'style' => true );
		$allow_tags['ul']     = array( 'class' => true, 'style' => true );
		$allow_tags['li']     = array( 'class' => true, 'style' => true );
		$allow_tags['p']      = array( 'class' => true, 'style' => true );
		$allow_tags['img']    = array('src'    => true, 'alt'   => true, 'width'  => true, 'height' => true );
		$allow_tags['iframe'] = array('src'    => true, 'width' => true, 'height' => true, 'id'     => true, 'class' => true, 'name' => true );
		$allow_tags['object'] = array('src'    => true, 'width' => true, 'height' => true, 'id'     => true, 'class' => true, 'name' => true );
		$allow_tags['embed']  = array('src'    => true, 'width' => true, 'height' => true, 'id'     => true, 'class' => true, 'name' => true );
		$allow_tags['em']     = array('class'  => true );
		$allow_tags['strong'] = array();
		$allow_tags['script'] = array( 'type' => true, 'src'   => true );
		$allow_tags['link']   = array( 'type' => true, 'href'  => true, 'rel' => true, 'id' => true, 'media' =>true );
		$allow_tags['i']      = array( 'id'   => true, 'class' =>true );
		return wp_kses( $value, $allow_tags );
	}
}



/* callback functions */
if ( ! function_exists( 'trizen_show_header_bar_callback' ) ) {
	function trizen_show_header_bar_callback( $control ) {
		if ( $control->manager->get_setting( 'show_header_bar' )->value() == 1 ) {
			return true;
		} else {
			return false;
		}
	}
}
if ( ! function_exists( 'trizen_show_static_pg_infobox_callback' ) ) {
	function trizen_show_static_pg_infobox_callback( $control ) {
		if ( $control->manager->get_setting( 'show_static_infobox' )->value() == 1 ) {
			return true;
		} else {
			return false;
		}
	}
}
if ( ! function_exists( 'trizen_show_static_pg_cta_callback' ) ) {
	function trizen_show_static_pg_cta_callback( $control ) {
		if ( $control->manager->get_setting( 'show_static_footer_cta' )->value() == 1 ) {
			return true;
		} else {
			return false;
		}
	}
}
if ( ! function_exists( 'trizen_show_related_post_callback' ) ) {
	function trizen_show_related_post_callback( $control ) {
		if ( $control->manager->get_setting( 'show_related_post' )->value() == 1 ) {
			return true;
		} else {
			return false;
		}
	}
}
