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
		'page_title' 	=> 'Theme Partner Settings',
		'menu_title'	=> 'Members and Partners',
		'parent_slug'	=> 'theme-general-options',
		
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


function aqia_content_width() {
	
	$GLOBALS['content_width'] = apply_filters( 'aqia_content_width', 640 );
}
add_action( 'after_setup_theme', 'aqia_content_width', 0 );

function my_enqueue() {
	wp_register_script( 'isotope', get_template_directory_uri().'/js/lib/isotope.pkgd.min.js', array('jquery'),  true );
	wp_register_script( 'isotope-init', get_template_directory_uri().'/js/ajax-filter.js', array('jquery', 'isotope'),  true );
	wp_enqueue_script('isotope-init');
    wp_localize_script( 'isotope-init', 'my_ajax_object',
            array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'my_enqueue' );

add_action( 'wpcf7_init', 'wpcf7_add_form_tag_current_url' );
function wpcf7_add_form_tag_current_url() {
    // Add shortcode for the form [current_url]
    wpcf7_add_form_tag( 'current_url',
        'wpcf7_current_url_form_tag_handler',
        array(
            'name-attr' => true
        )
    );
}

// Parse the shortcode in the frontend
function wpcf7_current_url_form_tag_handler( $tag ) {
    global $wp;
    $url = home_url( $wp->request );
    return '<input type="hidden" name="'.$tag['name'].'" value="'.$url.'" />';
}
function ajax_filterposts_handler() {

	$category = esc_attr( $_POST['category'] );
	
	$terms = get_terms( array(
		'taxonomy' => 'offer_type',
    'hide_empty' => false,
	) );
	$args = array(
		'post_type' => 'offer',
		'post_status' => 'publish',
		'posts_per_page' => -1,
		'orderby' => 'date',
		'order' => 'DESC',
		'tax_query'      => array(
			array(
				'taxonomy' => 'offer_type',
				'field'    => 'id',
				'terms'    => array($category)
			),
		),
	);
	
	$posts = 'No posts found.';

	$the_query = new WP_Query( $args );
 
	if ( $the_query->have_posts() ) :
		ob_start();

		while ( $the_query->have_posts() ) : $the_query->the_post();
		get_template_part( 'template-parts/content-part-offer' );
		endwhile;

		$posts = ob_get_clean();
	endif;

	$return = array(
		'posts' => $posts
	);

	wp_send_json($return);
exit();
}

add_action( 'wp_ajax_filterposts', 'ajax_filterposts_handler' );
add_action( 'wp_ajax_nopriv_filterposts', 'ajax_filterposts_handler' );

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
	wp_enqueue_style( 'slick-style',  get_template_directory_uri() . '/css/slick-theme.css');
	wp_register_script( 'slider', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', null, null, true );
	wp_enqueue_script('slider');
	
	//wp_enqueue_script( 'masnry', 'https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js' );
	wp_enqueue_script( 'pdf-object', 'https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.1.1/pdfobject.js', array(), true );

	
	

	wp_enqueue_script( 'aqia-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'aqia-customscript', get_template_directory_uri() . '/js/customscript.js', array( 'jquery' ), '', true );
	
	wp_enqueue_style( 'icofont', get_template_directory_uri() . '/fonts/icofont/icofont.min.css' );
	

	wp_enqueue_script( 'aqia-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_style( 'aqia-style', get_stylesheet_uri() );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'aqia_scripts' );


// Register and load the widget
function wpb_load_widget() {
    register_widget( 'skal_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );
 
// Creating the widget 
class skal_widget extends WP_Widget {
 
	function __construct() {
		parent::__construct('skal_widget', __('AQIA Contact Details', 'skal_widget_domain'), 
			// Widget description
			array( 'description' => __( 'Widget for contact details', 'skal_widget_domain' ), ) 
		);
	}
 
// Creating widget front-end
 
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
	
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];
	
		// display the output
		//echo __( 'Hello, World!', 'skal_widget_domain' );
		
		echo get_theme_mod( 'main_email' );
		echo get_theme_mod( 'address' );
		echo "<br>";
		echo get_theme_mod( 'phone_number' );
		echo $args['after_widget'];
	}
         
	// Widget Backend 
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'New title', 'skal_widget_domain' );
		}
	// Widget admin form
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php 
	}
     
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class skal_widget ends here

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

