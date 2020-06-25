<?php
/**
 * Add WooCommerce support
 *
 * @package tdcc
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

add_action( 'after_setup_theme', 'tdcc_woocommerce_support' );
if ( ! function_exists( 'tdcc_woocommerce_support' ) ) {
	/**
	 * Declares WooCommerce theme support.
	 */
	function tdcc_woocommerce_support() {
		add_theme_support( 'woocommerce' );



// Remove woocommerce breadcrumbs
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

		// Add New Woocommerce 3.0.0 Product Gallery support.
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-slider' );

		// hook in and customizer form fields.
		add_filter( 'woocommerce_form_field_args', 'tdcc_wc_form_field_args', 10, 3 );
	}
}

/* overwrite product title */ 
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
add_action( 'woocommerce_shop_loop_item_title', 'tdcc_template_loop_product_title', 10 );

function tdcc_template_loop_product_title() {
	echo '<h6 class="' . esc_attr( apply_filters( 'woocommerce_product_loop_title_classes', 'product-title' ) ) . '">' . get_the_title() . '</h6>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}


/*************Start Checkout edit *****************/ 

add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {
     unset($fields['order']['order_comments']);
	 unset($fields['billing']['billing_company']);

	 if ( ( $key = array_search( 'form-row-wide', $fields['billing']['billing_email']['class'] ) ) !== false ) {
        unset( $fields['billing']['billing_email']['class'][ $key ] );
	}
	if ( ( $key = array_search( 'form-row-wide', $fields['billing']['billing_phone']['class'] ) ) !== false ) {
        unset( $fields['billing']['billing_phone']['class'][ $key ] );
    }

	 if ( ( $key = array_search( 'form-row-wide', $fields['billing']['billing_city']['class'] ) ) !== false ) {
        unset( $fields['billing']['billing_city']['class'][ $key ] );
    }

    if ( ( $key = array_search( 'form-row-wide', $fields['billing']['billing_state']['class'] ) ) !== false ) {
        unset( $fields['billing']['billing_state']['class'][ $key ] );
    }
	if ( ( $key = array_search( 'form-row-wide', $fields['billing']['billing_postcode']['class'] ) ) !== false ) {
        unset( $fields['billing']['billing_postcode']['class'][ $key ] );
    }

    if ( ( $key = array_search( 'form-row-wide', $fields['billing']['billing_country']['class'] ) ) !== false ) {
        unset( $fields['billing']['billing_country']['class'][ $key ] );
    }
	
	$fields['billing']['billing_email']['class'][] = 'form-row-first';
    $fields['billing']['billing_phone']['class'][] = 'form-row-last';
	$fields['billing']['billing_city']['class'][] = 'form-row-first';
    $fields['billing']['billing_state']['class'][] = 'form-row-last';
	$fields['billing']['billing_postcode']['class'][] = 'form-row-last';
	$fields['billing']['billing_country']['class'][] = 'form-row-first';


     return $fields;
}

add_filter( 'woocommerce_checkout_fields', 'custom_checkout_order' );
 
function custom_checkout_order( $checkout_fields ) {
	$checkout_fields['billing']['billing_email']['priority'] = 4;
	$checkout_fields['billing']['billing_phone']['priority'] = 5;
	$checkout_fields['billing']['billing_country']['priority'] = 95;
	return $checkout_fields;
}
remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 ); 

/*************End Checkout edit *****************/ 

/**
 * First unhook the WooCommerce wrappers
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

/**
 * Then hook in your own functions to display the wrappers your theme requires
 */
add_action( 'woocommerce_before_main_content', 'tdcc_woocommerce_wrapper_start', 10 );
add_action( 'woocommerce_after_main_content', 'tdcc_woocommerce_wrapper_end', 10 );
if ( ! function_exists( 'tdcc_woocommerce_wrapper_start' ) ) {
	function tdcc_woocommerce_wrapper_start() {
		$container = get_theme_mod( 'tdcc_container_type' );
		
		echo '<header class="entry-header">';
		get_template_part( 'page-templates/breadcrumbs' ); 
		echo '<div class="container"><div class="row"><div class="col-12"><h1 class="entry-title">';
		woocommerce_page_title();
		echo '</h1>';
		
		echo '</div></div></div></header>';
		echo '<div class="wrapper" id="woocommerce-wrapper">';
		echo '<div class="' . esc_attr( $container ) . '" id="content" tabindex="-1">';
		echo '<div class="row">';
	//	get_template_part( 'global-templates/left-sidebar-check' );
		echo '<div class="col-md-4">';
		dynamic_sidebar( 'sidebar-my-custom-shop' );
		echo '</div>';
		echo '<div class="col-md-8">';
		echo '<main class="site-main" id="main">';
	}
}
if ( ! function_exists( 'tdcc_woocommerce_wrapper_end' ) ) {
	function tdcc_woocommerce_wrapper_end() {
		echo '</main><!-- #main -->';
		echo '</div>';
		//get_template_part( 'global-templates/right-sidebar-check' );
		echo '</div><!-- .row -->';
		echo '</div><!-- Container end -->';
		echo '</div><!-- Wrapper end -->';
	}
}


/* Register sidebars */ 

function tdcc_my_custom_widgets_init() {

	register_sidebar( array(
	  'name'          => __( 'My Shop Sidebar', '__tdcc__' ),
	  'id'            => 'sidebar-my-custom-shop',
	  'description'   => __( 'Appears on the index shop page.', '__tdcc__' ),
	  'before_widget' => '<div id="%1$s" class="widget %2$s">',
	  'after_widget'  => '</div>',
	  'before_title'  => '<h5 class="h-widget">',
	  'after_title'   => '</h5>',
	) );
  
  }
  
  add_action( 'widgets_init', 'tdcc_my_custom_widgets_init' );


/**
 * Filter hook function monkey patching form classes
 * Author: Adriano Monecchi http://stackoverflow.com/a/36724593/307826
 *
 * @param string $args Form attributes.
 * @param string $key Not in use.
 * @param null   $value Not in use.
 *
 * @return mixed
 */
if ( ! function_exists( 'tdcc_wc_form_field_args' ) ) {
	function tdcc_wc_form_field_args( $args, $key, $value = null ) {
		// Start field type switch case.
		switch ( $args['type'] ) {
			/* Targets all select input type elements, except the country and state select input types */
			case 'select':
				// Add a class to the field's html element wrapper - woocommerce
				// input types (fields) are often wrapped within a <p></p> tag.
				$args['class'][] = 'form-group';
				// Add a class to the form input itself.
				$args['input_class']       = array( 'form-control', 'input-lg' );
				$args['label_class']       = array( 'control-label' );
				$args['custom_attributes'] = array(
					'data-plugin'      => 'select2',
					'data-allow-clear' => 'true',
					'aria-hidden'      => 'true',
					// Add custom data attributes to the form input itself.
				);
				break;
			// By default WooCommerce will populate a select with the country names - $args
			// defined for this specific input type targets only the country select element.
			case 'country':
				$args['class'][]     = 'form-group single-country';
				$args['label_class'] = array( 'control-label' );
				break;
			// By default WooCommerce will populate a select with state names - $args defined
			// for this specific input type targets only the country select element.
			case 'state':
				// Add class to the field's html element wrapper.
				$args['class'][] = 'form-group';
				// add class to the form input itself.
				$args['input_class']       = array( '', 'input-lg' );
				$args['label_class']       = array( 'control-label' );
				$args['custom_attributes'] = array(
					'data-plugin'      => 'select2',
					'data-allow-clear' => 'true',
					'aria-hidden'      => 'true',
				);
				break;
			case 'password':
			case 'text':
			case 'email':
			case 'tel':
			case 'number':
				$args['class'][]     = 'form-group';
				$args['input_class'] = array( 'form-control', 'input-lg' );
				$args['label_class'] = array( 'control-label' );
				break;
			case 'textarea':
				$args['input_class'] = array( 'form-control', 'input-lg' );
				$args['label_class'] = array( 'control-label' );
				break;
			case 'checkbox':
				$args['label_class'] = array( 'custom-control custom-checkbox' );
				$args['input_class'] = array( 'custom-control-input', 'input-lg' );
				break;
			case 'radio':
				$args['label_class'] = array( 'custom-control custom-radio' );
				$args['input_class'] = array( 'custom-control-input', 'input-lg' );
				break;
			default:
				$args['class'][]     = 'form-group';
				$args['input_class'] = array( 'form-control', 'input-lg' );
				$args['label_class'] = array( 'control-label' );
				break;
		} // end switch ($args).
		return $args;
	}
}

if ( ! is_admin() && ! function_exists( 'wc_review_ratings_enabled' ) ) {
	/**
	 * Check if reviews are enabled.
	 *
	 * Function introduced in WooCommerce 3.6.0., include it for backward compatibility.
	 *
	 * @return bool
	 */
	function wc_reviews_enabled() {
		return 'yes' === get_option( 'woocommerce_enable_reviews' );
	}

	/**
	 * Check if reviews ratings are enabled.
	 *
	 * Function introduced in WooCommerce 3.6.0., include it for backward compatibility.
	 *
	 * @return bool
	 */
	function wc_review_ratings_enabled() {
		return wc_reviews_enabled() && 'yes' === get_option( 'woocommerce_enable_review_rating' );
	}
}
