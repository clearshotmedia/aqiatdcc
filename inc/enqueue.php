<?php 
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


?>