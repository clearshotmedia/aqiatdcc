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





$tdcc_includes = array(
	//'/theme-settings.php',                  // Initialize theme default settings.
	'/template-functions.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/woocommerce.php',                     // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
);

foreach ( $tdcc_includes as $file ) {
	require_once get_template_directory() . '/inc' . $file;
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */

