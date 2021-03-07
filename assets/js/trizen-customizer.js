/* global wp, jQuery */
/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	wp.customize( 'trizen_stc_pg_infobox_1_title', function( value ) {
		value.bind( function( to ) {
			$( '.info-area .icon-box .info__title' ).text( to );
		} );
	} );
	wp.customize( 'trizen_stc_pg_infobox_1_content', function( value ) {
		value.bind( function( to ) {
			$( '.info-area .icon-box .info__desc' ).text( to );
		} );
	} );
	wp.customize( 'trizen_stc_pg_infobox_2_title', function( value ) {
		value.bind( function( to ) {
			$( '.info-area .icon-box .info__title' ).text( to );
		} );
	} );
	wp.customize( 'trizen_stc_pg_infobox_2_content', function( value ) {
		value.bind( function( to ) {
			$( '.info-area .icon-box .info__desc' ).text( to );
		} );
	} );
	wp.customize( 'trizen_stc_pg_infobox_3_title', function( value ) {
		value.bind( function( to ) {
			$( '.info-area .icon-box .info__title' ).text( to );
		} );
	} );
	wp.customize( 'trizen_stc_pg_infobox_3_content', function( value ) {
		value.bind( function( to ) {
			$( '.info-area .icon-box .info__desc' ).text( to );
		} );
	} );
	wp.customize( 'trizen_stc_cta_title', function( value ) {
		value.bind( function( to ) {
			$( '.subscriber-area .section-heading h2' ).text( to );
		} );
	} );
	wp.customize( 'trizen_stc_cta_shortcode', function( value ) {
		value.bind( function( to ) {
			$( '.subscriber-area .subscriber-box .contact-form-action' ).text( to );
		} );
	} );
	wp.customize( 'trizen_foot_lf_widget_content', function( value ) {
		value.bind( function( to ) {
			$( '.footer-area .footer-item .footer__desc' ).text( to );
		} );
	} );
	wp.customize( 'trizen_copyright_txt', function( value ) {
		value.bind( function( to ) {
			$( '.copy-right .copy__desc' ).text( to );
		} );
	} );
	wp.customize( 'trizen_hd_user_action_login_title', function( value ) {
		value.bind( function( to ) {
			$( '.header-right-action .user-login-btn' ).text( to );
		} );
	} );
	wp.customize( 'trizen_hd_user_action_logout_title', function( value ) {
		value.bind( function( to ) {
			$( '.header-right-action .user-logout-btn' ).text( to );
		} );
	} );
	wp.customize( 'trizen_hd_user_action_signup_title', function( value ) {
		value.bind( function( to ) {
			$( '.header-right-action .user-signup-btn' ).text( to );
		} );
	} );
	wp.customize( 'trizen_hotel_details_bdc_video_btn_txt', function( value ) {
		value.bind( function( to ) {
			$( '.hotel-details-breadcrumb .breadcrumb-btn .hotel-video-btn' ).text( to );
		} );
	} );
	wp.customize( 'trizen_hotel_details_bdc_photo_btn_txt', function( value ) {
		value.bind( function( to ) {
			$( '.hotel-details-breadcrumb .breadcrumb-btn .hotel-gallery-btn' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					clip: 'rect(1px, 1px, 1px, 1px)',
					position: 'absolute',
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					clip: 'auto',
					position: 'relative',
				} );
				$( '.site-title, .site-title a, .site-description' ).css( {
					color: to,
				} );
			}
		} );
	} );

	wp.customize( 'trizen_hotel_details_bdc_bg', function( value ) {
		value.bind( function( to ) {
			$( '.hotel-details-breadcrumb' ).css('background-image', 'url('+to+')');
		} );
	} );
	wp.customize( 'trizen_breadcrumb1_bg', function( value ) {
		value.bind( function( to ) {
			$( '.breadcrumb-area.static-breadcrumb' ).css('background-image', 'url('+to+')');
		} );
	} );
	wp.customize( 'trizen_hotel_details_bdc_wrap_pt', function( value ) {
		value.bind( function( to ) {
			$( '.hotel-details-breadcrumb .breadcrumb-btn' ).css('padding-top', to+'px');
		} );
	} );
	wp.customize( 'trizen_hotel_details_bdc_wrap_pb', function( value ) {
		value.bind( function( to ) {
			$( '.hotel-details-breadcrumb .breadcrumb-btn' ).css('padding-bottom', to+'px');
		} );
	} );
	wp.customize( 'trizen_breadcrumb1_wrapper_pt', function( value ) {
		value.bind( function( to ) {
			$( '.breadcrumb-area.static-breadcrumb' ).css('padding-top', to+'px');
		} );
	} );
	wp.customize( 'trizen_breadcrumb1_wrapper_pb', function( value ) {
		value.bind( function( to ) {
			$( '.breadcrumb-area.static-breadcrumb' ).css('padding-bottom', to+'px');
		} );
	} );
	wp.customize( 'trizen_breadcrumb_title_clr', function( value ) {
		value.bind( function( to ) {
			$( '.breadcrumb-area.static-breadcrumb .breadcrumb-content h2' ).css('color', to);
		} );
	} );
	wp.customize( 'trizen_breadcrumb1_title_size', function( value ) {
		value.bind( function( to ) {
			$( '.breadcrumb-area.static-breadcrumb .breadcrumb-content h2' ).css('font-size', to+'px');
		} );
	} );
	wp.customize( 'trizen_breadcrumb1_bdc_bg', function( value ) {
		value.bind( function( to ) {
			$( '.breadcrumb-area.static-breadcrumb .breadcrumb-list .list-items' ).css('background', to);
		} );
	} );
	wp.customize( 'trizen_breadcrumb1_bdc_clr', function( value ) {
		value.bind( function( to ) {
			$( '.breadcrumb-area.static-breadcrumb .breadcrumb-list .list-items li, .breadcrumb-area.static-breadcrumb .breadcrumb-list .list-items li a' ).css('color', to);
		} );
	} );
	wp.customize( 'trizen_breadcrumb1_bdc_hv_clr', function( value ) {
		value.bind( function( to ) {
			$( '.breadcrumb-area.static-breadcrumb .breadcrumb-list .list-items li a:hover' ).css('color', to);
		} );
	} );
	wp.customize( 'trizen_breadcrumb1_bdc_size', function( value ) {
		value.bind( function( to ) {
			$( '.breadcrumb-area.static-breadcrumb .breadcrumb-list .list-items li' ).css('font-size', to+'px');
		} );
	} );
	wp.customize( 'trizen_hotel_details_bdc_video_btn_clr', function( value ) {
		value.bind( function( to ) {
			$( '.hotel-details-breadcrumb .breadcrumb-btn .hotel-video-btn' ).css('color', to);
		} );
	} );
	wp.customize( 'trizen_hotel_details_bdc_video_btn_bg', function( value ) {
		value.bind( function( to ) {
			$( '.hotel-details-breadcrumb .breadcrumb-btn .hotel-video-btn' ).css('background', to);
		} );
	} );
	wp.customize( 'trizen_hotel_details_bdc_video_btn_clr_hv', function( value ) {
		value.bind( function( to ) {
			$( '.hotel-details-breadcrumb .breadcrumb-btn .hotel-video-btn:hover' ).css('color', to);
		} );
	} );
	wp.customize( 'trizen_hotel_details_bdc_video_btn_bg_hv', function( value ) {
		value.bind( function( to ) {
			$( '.hotel-details-breadcrumb .breadcrumb-btn .hotel-video-btn:hover' ).css('background', to);
		} );
	} );
	wp.customize( 'trizen_hotel_details_bdc_photo_btn_clr', function( value ) {
		value.bind( function( to ) {
			$( '.hotel-details-breadcrumb .breadcrumb-btn .hotel-gallery-btn' ).css('color', to);
		} );
	} );
	wp.customize( 'trizen_hotel_details_bdc_photo_btn_bg', function( value ) {
		value.bind( function( to ) {
			$( '.hotel-details-breadcrumb .breadcrumb-btn .hotel-gallery-btn' ).css('background', to);
		} );
	} );
	wp.customize( 'trizen_hotel_details_bdc_photo_btn_clr_hv', function( value ) {
		value.bind( function( to ) {
			$( '.hotel-details-breadcrumb .breadcrumb-btn .hotel-gallery-btn:hover' ).css('color', to);
		} );
	} );
	wp.customize( 'trizen_hotel_details_bdc_photo_btn_bg_hv', function( value ) {
		value.bind( function( to ) {
			$( '.hotel-details-breadcrumb .breadcrumb-btn .hotel-gallery-btn:hover' ).css('background', to);
		} );
	} );
}( jQuery ) );
