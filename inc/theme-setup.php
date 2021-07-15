<?php


if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'trizen_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function trizen_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on trizen, use a find and replace
		 * to change 'trizen' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'trizen', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary_menu' => esc_html__( 'Header Primary Menu', 'trizen' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'trizen_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 134,
				'width'       => 30,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
        // Add support for Block Styles.
        add_theme_support( 'wp-block-styles' );
        // Add support for full and wide align images.
        add_theme_support( 'align-wide' );
        // Add support for editor styles.
        add_theme_support( 'editor-styles' );
        // Add editor style css
        add_editor_style( 'style-editor.css' );
        // Add support for responsive embedded content.
        add_theme_support( 'responsive-embeds' );
        // Add custom editor font sizes.
        add_theme_support(
            'editor-font-sizes',
            array(
                array(
                    'name'      => __( 'Small', 'trizen' ),
                    'shortName' => __( 'S', 'trizen' ),
                    'size'      => 16,
                    'slug'      => 'small',
                ),
                array(
                    'name'      => __( 'Normal', 'trizen' ),
                    'shortName' => __( 'M', 'trizen' ),
                    'size'      => 22,
                    'slug'      => 'normal',
                ),
                array(
                    'name'      => __( 'Large', 'trizen' ),
                    'shortName' => __( 'L', 'trizen' ),
                    'size'      => 36,
                    'slug'      => 'large',
                ),
                array(
                    'name'      => __( 'Huge', 'trizen' ),
                    'shortName' => __( 'XL', 'trizen' ),
                    'size'      => 50,
                    'slug'      => 'huge',
                ),
            )
        );
        // Editor color palette.
        add_theme_support(
            'editor-color-palette',
            array(
                array(
                    'name'  => __( 'Primary', 'trizen' ),
                    'slug'  => 'primary',
                    'color' => '#287dfa',
                ),
                array(
                    'name'  => __( 'Secondary', 'trizen' ),
                    'slug'  => 'secondary',
                    'color' => '#0d233e',
                ),
                array(
                    'name'  => __( 'Dark Gray', 'trizen' ),
                    'slug'  => 'dark-gray',
                    'color' => '#7f8897',
                ),
                array(
                    'name'  => __( 'Light Gray', 'trizen' ),
                    'slug'  => 'light-gray',
                    'color' => '#eeeeee',
                ),
                array(
                    'name'  => __( 'White', 'trizen' ),
                    'slug'  => 'white',
                    'color' => '#ffffff',
                ),
            )
        );
	}
endif;
add_action( 'after_setup_theme', 'trizen_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function trizen_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'trizen_content_width', 640 );
}
add_action( 'after_setup_theme', 'trizen_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function trizen_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widgets', 'trizen' ),
			'id'            => 'trizen-footer-widgets',
			'description'   => esc_html__( 'Add Footer widgets here.', 'trizen' ),
			'before_widget' => '<div class="col-lg-3 responsive-column"><div id="%1$s" class="footer-item %2$s">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h4 class="title curve-shape pb-3 margin-bottom-20px" data-text="curvs">',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Blog Sidebar', 'trizen' ),
			'id'            => 'blog-sidebar',
			'description'   => esc_html__( 'Add Blog Sidebar Widgets here.', 'trizen' ),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="title stroke-shape">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Hotel Sidebar', 'trizen' ),
			'id'            => 'hotel-sidebar',
			'description'   => esc_html__( 'Add hotel sidebar Widgets here.', 'trizen' ),
			'before_widget' => '<div id="%1$s" class="sidebar-widget single-content-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="title stroke-shape">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Hotel Room Sidebar', 'trizen' ),
			'id'            => 'hotel-room-sidebar',
			'description'   => esc_html__( 'Add hotel room sidebar Widgets here.', 'trizen' ),
			'before_widget' => '<div id="%1$s" class="sidebar-widget single-content-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="title stroke-shape">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'trizen_widgets_init' );



/*
 * Comment Fields Supports
 * */
function trizen_comment_field_move_to_bottom($fields)
{
	$comment_field = $fields['comment'];
	unset($fields['comment']);
	$fields['comment'] = $comment_field;
	return $fields;
}
add_filter('comment_form_fields', 'trizen_comment_field_move_to_bottom');

/*
* Highlight Search
*/
/*function trizen_highlight_search_results($text){
	if (is_search()){
		$pattern = '/('.join('|', explode( ' ', get_search_query())).')/i';
		$text = preg_replace($pattern, '<span class="search-highlight">\0</span>', $text);
	}
	return $text;
}
add_filter('the_content','trizen_highlight_search_results');
add_filter('the_excerpt','trizen_highlight_search_results');
add_filter('the_title','trizen_highlight_search_results');*/

/**
 * Trizen Breadcrumb Setup
 */
if (!function_exists( 'trizen_breadcrumb_title' )) :
	function trizen_breadcrumb_title()
	{

		if (is_singular('post')) :
			$posts_page_id = get_option( 'page_for_posts' );
			if ( !$posts_page_id ) :

				return get_the_title();

			else :
				return get_the_title();

			endif;

		elseif ( is_home() ):

			$frontpage_id    = get_option( 'page_for_posts' );
			$frontpage_title = get_the_title( $frontpage_id );

			if ($frontpage_id) :

				return $frontpage_title;

			else :

				return esc_html__( 'Blog', 'trizen' );

			endif;

		elseif ( is_singular() ):

			return get_the_title();

		elseif ( is_search() ):

			return esc_html__( 'Search - ', 'trizen' ) . get_search_query();

		elseif ( is_404() ):

			return esc_html__( '404', 'trizen' );

		elseif ( is_tag() ):

			return single_tag_title( null, false );

		elseif ( is_category() ):

			return single_cat_title( null, false );

		elseif ( is_tax() ):

			return single_term_title( null, false );

		elseif ( is_author() ):

			return esc_html__( 'Author - ', 'trizen' ) . get_the_author();

		elseif ( is_archive() ):

			return get_the_archive_title();

		elseif ( is_page() ):

			return get_the_title();

		else:

			return get_the_title();

		endif;
	}
endif;



add_filter('duplicate_comment_id', '__return_false');
