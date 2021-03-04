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
}( jQuery ) );
