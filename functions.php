<?php
/**
 * elemntor functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package elemntor
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function elemntor_setup() {

	load_theme_textdomain( 'elemntor', get_template_directory() . '/languages' );

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
			'header-menu' => esc_html__( 'Header Menu', 'elemntor' ),
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
			'elemntor_custom_background_args',
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
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'elemntor_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function elemntor_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'elemntor_content_width', 640 );
}
add_action( 'after_setup_theme', 'elemntor_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function elemntor_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'elemntor' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'elemntor' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'elemntor_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function elemntor_scripts() {
	wp_enqueue_style('elementor-style', get_stylesheet_uri());

	wp_enqueue_style('elementor-icomoon-style', get_template_directory_uri() . '/assets/fonts/icomoon/style.css');

	wp_enqueue_style('elementor-bootsrap.min', get_template_directory_uri() . '/assets/css/bootstrap.min.css');

	wp_enqueue_style('elementor-magnific-popup.css', get_template_directory_uri() . '/assets/css/magnific-popup.css');

	wp_enqueue_style('elementor-jquery-ui.css', get_template_directory_uri() . '/assets/css/jquery-ui.css');

	wp_enqueue_style('elementor-owl.carousel.min.css', get_template_directory_uri() . '/assets/css/owl.carousel.min.css');

	wp_enqueue_style('elementor-owl.theme.default.min.css', get_template_directory_uri() . '/assets/css/owl.theme.default.min.css');

	wp_enqueue_style('elementor-bootstrap-datepicker.css', get_template_directory_uri() . '/assets/css/bootstrap-datepicker.css');

	wp_enqueue_style('elementor-flaticon.css', get_template_directory_uri() . '/assets/fonts/flaticon/font/flaticon.css');

	wp_enqueue_style('elementor-aos.css', get_template_directory_uri() . '/assets/css/aos.css');

	wp_enqueue_style('elementor-main-style', get_template_directory_uri() . '/assets/css/style.css');

	wp_deregister_script('jquery');

	wp_enqueue_script('elementor-jquery-3.3.1.min ', get_template_directory_uri() . '/assets/js/jquery-3.3.1.min.js', array(), '3.3.1', true);

	// wp_deregister('jquery-ui');

	wp_enqueue_script('elementor-jquery-ui.js', get_template_directory_uri() . '/assets/js/jquery-3.3.1.min.js', array(), '1.0', true);

	wp_enqueue_script('popper', get_template_directory_uri() . '/assets/js/popper.min.js', array(), '1.0', true);

	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '1.0', true);

	wp_enqueue_script('elementor-owl.carousel.min.js', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array(), '1.0', true);
	
	wp_enqueue_script('elementor-jquery.magnific-popup.min.js', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array(), '1.0', true);

	wp_enqueue_script('elementor-jquery.sticky.js', get_template_directory_uri() . '/assets/js/jquery.sticky.js', array(), '1.0', true);

	wp_enqueue_script('elementor-jquery.waypoints.min.js', get_template_directory_uri() . '/assets/js/jquery.waypoints.min.js', array(), '1.0', true);
	
	wp_enqueue_script('elementor-jquery.animateNumber.min.js', get_template_directory_uri() . '/assets/js/jquery.animateNumber.min.js', array(), '1.0', true);

	wp_enqueue_script('elementor-aos.js', get_template_directory_uri() . '/assets/js/aos.js', array(), '1.0', true);

	wp_enqueue_script('elementor-main.js', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0', true);
	

	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'elemntor_scripts' );


function elementr_add_link_atts($atts){
	$atts['class'] = 'nav-link';
	return $atts;
}

add_filter('nav_menu_link_attributes', 'elementr_add_link_atts');

add_filter( 'use_block_editor_for_post', '__return_false' );