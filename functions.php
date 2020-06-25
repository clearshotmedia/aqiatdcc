<?php
/**
 * aqia functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package aqia
 */




define( 'aqia_VERSION', '1.0.0' ); 
add_action( 'after_setup_theme', 'aqia_setup' );
if ( ! function_exists( 'aqia_setup' ) ) :
	/**
	 * Global Functions
	 */
	function aqia_setup() {
		// Theme Language
		load_theme_textdomain( 'aqia', get_template_directory() . '/languages' );

		// Add Title Tag support
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		// Register Menus
		register_nav_menus( array(
			'main_menu'		 => esc_html__( 'Main Menu', 'aqia' ),
			'main_menu_mob' => esc_html__( 'Mobile main menu', 'aqia' ),
		) );
		add_theme_support( 'html5', array('search-form') );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'aqia_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		add_theme_support( 'custom-logo', array(
			'height'      => 150,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		// WooCommerce support.
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
		add_theme_support( 'html5', array( 'search-form' ) );
		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, icons, and column width.
		 */
		add_editor_style( array( 'css/bootstrap.css', 'css/editor-style.css' ) );
			// Define path and URL to the ACF plugin.
define( 'MY_ACF_PATH', get_stylesheet_directory() . '/inc/acf/' );
define( 'MY_ACF_URL', get_stylesheet_directory_uri() . '/inc/acf/' );

// Include the ACF plugin.
include_once( MY_ACF_PATH . 'acf.php' );
include_once( MY_ACF_PATH . 'pro/acf-pro.php' );
include_once( MY_ACF_PATH . 'acf-fields.php' );


if( function_exists('acf_add_options_page') ) {
	$arg = acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-options',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-options',
	));

}
// Customize the url setting to fix incorrect asset URLs.
add_filter('acf/settings/url', 'my_acf_settings_url');
function my_acf_settings_url( $url ) {
    return MY_ACF_URL;
}

// (Optional) Hide the ACF admin menu item.
add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
function my_acf_settings_show_admin( $show_admin ) {
    return true;
}
	}
endif;








// Register widget area.

function aqia_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'aqia' ),
		'id'			 => 'footer-1',
		'before_widget'	 => '<div id="%1$s" class="widget %2$s">',
		'after_widget'	 => '</div>',
		'before_title'	 => '<div class="widget-title"><h3>',
		'after_title'	 => '</h3></div>',
	) );
	register_sidebar(
		array(
			'name'			 => esc_html__( 'Footer 2', 'aqia' ),
			'id'			 => 'footer-2',
			'before_widget'	 => '<div id="%1$s" class="widget %2$s">',
			'after_widget'	 => '</div>',
			'before_title'	 => '<div class="widget-title"><h3>',
			'after_title'	 => '</h3></div>',
	));
	register_sidebar(
		array(
			'name'			 => esc_html__( 'Footer 3', 'aqia' ),
			'id'			 => 'footer-3',
			'before_widget'	 => '<div id="%1$s" class="widget %2$s">',
			'after_widget'	 => '</div>',
			'before_title'	 => '<div class="widget-title"><h3>',
			'after_title'	 => '</h3></div>',
	));
	register_sidebar(
		array(
			'name'			 => esc_html__( 'Bottom Sidebar', 'aqia' ),
			'id'			 => 'sidebar-1',
			'before_widget'	 => '<div id="%1$s" class="widget %2$s">',
			'after_widget'	 => '</div>',
			'before_title'	 => '<div class="sidebar-title"><h3>',
			'after_title'	 => '</h3></div>',
	));
	register_sidebar(
		array(
			'name'			 => esc_html__( 'Left Sidebar', 'aqia' ),
			'id'			 => 'sidebar-',
			'before_widget'	 => '<div id="%1$s" class="widget %2$s">',
			'after_widget'	 => '</div>',
			'before_title'	 => '<div class="sidebar-title"><h3>',
			'after_title'	 => '</h3></div>',
	));

}
add_action( 'widgets_init', 'aqia_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function aqia_scripts() {
	wp_register_script( 'jQuery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js', null, null, true );
	wp_enqueue_script('jQuery');
	wp_enqueue_style( 'bootstrap-cdn-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' );
	wp_enqueue_script( 'bootstrap-cdn-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js' );
	

	wp_enqueue_script( 'aqia-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'aqia-customscript', get_template_directory_uri() . '/js/customscript.js', array( 'jquery' ), '', true );
	
	wp_enqueue_style( 'icofont', get_template_directory_uri() . '/fonts/icofont/icofont.min.css' );
	

	wp_enqueue_script( 'aqia-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_style( 'aqia-style', get_stylesheet_uri() );
	$the_theme     = wp_get_theme();
		$theme_version = $the_theme->get( 'Version' );

		$css_version = $theme_version . '.' . filemtime( get_template_directory() . '/css/theme.min.css' );
		wp_enqueue_style( 'tdcc-styles', get_template_directory_uri() . '/css/theme.min.css', array(), $css_version );
}
add_action( 'wp_enqueue_scripts', 'aqia_scripts' );




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
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

