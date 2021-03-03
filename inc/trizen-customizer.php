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
				'label'         => __('Dark Logo', 'trizen'),
				'section'       => 'title_tagline',
				'priority'      => 9,
				'settings'      => 'custom_logo',
				'type'          => 'upload',
				'button_labels' => array(
					'select'       => __('Select Logo', 'trizen'),
					'change'       => __('Change Logo', 'trizen'),
					'remove'       => __('Remove', 'trizen'),
					'default'      => __('Default', 'trizen'),
					'placeholder'  => __('No Logo selected', 'trizen'),
					'frame_title'  => __('Select Logo', 'trizen'),
					'frame_button' => __('Choose Logo', 'trizen'),

				),
			)));
			/* General Retina Logo */
			$wp_customize->add_setting('retina_logo', array(
				'transport'         => 'refresh',
				'sanitize_callback' => [$this, 'sanitize_file']
			));
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'retina_logo', array(
				'label'         => __('Dark Retina Logo', 'trizen'),
				'section'       => 'title_tagline',
				'priority'      => 9,
				'settings'      => 'retina_logo',
				'type'          => 'upload',
				'button_labels' => array(
					'select'       => __('Select Logo', 'trizen'),
					'change'       => __('Change Logo', 'trizen'),
					'remove'       => __('Remove', 'trizen'),
					'default'      => __('Default', 'trizen'),
					'placeholder'  => __('No Logo selected', 'trizen'),
					'frame_title'  => __('Select Logo', 'trizen'),
					'frame_button' => __('Choose Logo', 'trizen'),

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
				'label'    => __('Show Header Bar', 'trizen'),
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
				'label'    => __('Show PreLoader', 'trizen'),
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
				'label'    => __('Show Static Page\'s InfoBox', 'trizen'),
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
				'label'    => __('Show Static Footer CTA', 'trizen'),
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
				'label'    => __('Show Footer Left Widget', 'trizen'),
				'section'  => 'trizen_general_options',
				'settings' => 'show_footer_lf_widget',
				'type'     => 'checkbox',
			));


			/*--------------------------
			 *  Header
			 * -------------------------*/
			$wp_customize->add_panel('trizen_header_panel_options', array(
				'title'    => __('Header', 'trizen'),
				'priority' => 2,
			));
			/* Header Bar */
			$wp_customize->add_section('trizen_header_options', array(
				'title'           => __('Header Bar', 'trizen'),
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
				'label'           => __('Contact Info', 'trizen'),
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
				'label'           => __('Mobile Number', 'trizen'),
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
				'label'           => __('Email', 'trizen'),
				'section'         => 'trizen_header_options',
				'settings'        => 'trizen_hd_bar_email',
				'type'            => 'text',
			));


			/*--------------------------
			 *  Footer
			 * -------------------------*/
			$wp_customize->add_panel('trizen_footer_panel_options', array(
				'title'    => __('Footer', 'trizen'),
				'priority' => 200,
			));
			/* Static InfoBox */
			$wp_customize->add_section('trizen_footer_stc_pg_options', array(
				'title'           => __('Static InfoBox', 'trizen'),
				'priority'        => 2,
				'panel'           => 'trizen_footer_panel_options',
				'active_callback' => 'trizen_show_static_pg_infobox_callback'
			));
			/* Box 1 */
			$wp_customize->add_setting('trizen_stc_pg_infobox_hd', array(
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control('trizen_stc_pg_infobox_hd', array(
				'label'           => __('Box 1', 'trizen'),
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
				'label'           => __('Title', 'trizen'),
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
