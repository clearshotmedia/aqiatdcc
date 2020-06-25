<?php
/**
 * Custom hooks.
 *
 * @package tdcc
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'tdcc_site_info' ) ) {
	/**
	 * Add site info hook to WP hook library.
	 */
	function tdcc_site_info() {
		do_action( 'tdcc_site_info' );
	}
}

if ( ! function_exists( 'tdcc_add_site_info' ) ) {
	add_action( 'tdcc_site_info', 'tdcc_add_site_info' );

	/**
	 * Add site info content.
	 */
	function tdcc_add_site_info() {
		$the_theme = wp_get_theme();

		$site_info = sprintf(
			'Site built by <a href="clearshotmedia.com.au">ClearShot Media</a><span class="sep"> | </span>2020'
			
			
			
		);

		echo apply_filters( 'tdcc_site_info_content', $site_info ); // WPCS: XSS ok.
	}
}
