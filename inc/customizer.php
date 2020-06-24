<?php
/**
 * aqia Theme Customizer
 *
 * @package aqia
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function aqia_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Add Social Media Section
	$wp_customize->add_section(
		'social-media',
		array(
			'title' => __( 'Skills Alliance Business Settings', 'aqia' ),
			'priority' => 30,
			'description' => __( 'Settings for contact details and social media site wide.', 'aqia' )
		)
	);
	$wp_customize->add_setting( 'phone_number', array( 'default' => '' ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'phone_number', array( 'label' => __( 'Main Phone Number', 'aqia' ), 'section' => 'social-media', 'settings' => 'phone_number', ) ) );
	$wp_customize->add_setting( 'store_email', array( 'default' => '' ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'store_email', array( 'label' => __( 'Main Email', 'aqia' ), 'section' => 'social-media', 'settings' => 'store_email', ) ) );
	
	$wp_customize->add_setting( 'fax_number', array( 'default' => '' ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fax_number', array( 'label' => __( 'Main Fax', 'aqia' ), 'section' => 'social-media', 'settings' => 'fax_number', ) ) );

	$wp_customize->add_setting( 'address', array( 'default' => '' ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'address', array( 'label' => __( 'Address', 'aqia' ), 'section' => 'social-media', 'settings' => 'address', 'type' => 'textarea',) ) );

	$wp_customize->add_setting( 'facebook_url', array( 'default' => '' ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'facebook_url', array( 'label' => __( 'Facebook URL', 'aqia' ), 'section' => 'social-media', 'settings' => 'facebook_url', ) ) );

	
	$wp_customize->add_setting( 'twitter_url', array( 'default' => '' ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'twitter_url', array( 'label' => __( 'Twitter URL', 'aqia' ), 'section' => 'social-media', 'settings' => 'twitter_url', ) ) );



	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'aqia_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'aqia_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'aqia_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function aqia_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function aqia_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function aqia_customize_preview_js() {
	wp_enqueue_script( 'aqia-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'aqia_customize_preview_js' );
