<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package aqia
 */

if ( ! function_exists( 'aqia_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function aqia_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( '%s', 'post date', 'aqia' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'aqia_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function aqia_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'aqia' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

function tdcc_theme_url() {
	return get_stylesheet_directory_uri();
}

function tdcc_theme_dir() {
	return get_stylesheet_directory();
}

function tdcc_theme_partial($path, $args = array()) {
	extract($args);
	include tdcc_theme_dir().$path;
}

if ( ! function_exists( 'aqia_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function aqia_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php
			the_post_thumbnail( 'post-thumbnail', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
			?>
		</a>

		<?php
		endif; // End is_singular().
	}
endif;

add_action( 'wp_ajax_nopriv_ajax_pagination', 'my_ajax_pagination' );
add_action( 'wp_ajax_ajax_pagination', 'my_ajax_pagination' );

function my_ajax_pagination() {


	$query_vars = json_decode( stripslashes( $_POST['query_vars'] ), true );

	$query_vars['post_id'] = $_POST['postid'];
	
	
	$posts = new WP_Query( $query_vars );
	$GLOBALS['wp_query'] = $posts;
	
	echo '<div class="news-inner">';
	echo '<h4>' . get_the_title($query_vars['post_id']) . '</h4>';
	echo '<div class="news-excerpt">';
	echo get_the_excerpt($query_vars['post_id']);
	echo '</div>';
	echo '<a href="' . get_the_permalink($query_vars['post_id']) . '">';
	echo '<button>Read More</button></a>';
	echo '</div>';



    die();
}




add_action( 'tdcc_site_start', 'tdcc_site_header' );
if ( ! function_exists( 'tdcc_site_header' ) ) {
	/**
	 * Display site header
	 */
	function tdcc_site_header() {
	

		//if ( $is_disable_sticky != 1 ) {
	//		$classes[] = 'is-sticky no-scroll';
	//	} else {
			$classes[] = 'no-sticky no-scroll header-fixed';
	//	}

		$transparent = 'no-t';
		
		$classes[] = $transparent;

		$pos = sanitize_text_field( get_theme_mod( 'tdcc_header_position', 'top' ) );
		if ( $pos == 'below_hero' ) {
			$classes[] = 'h-below-hero';
		} else {
			$classes[] = 'h-on-top';
		}

		?>
		<header id="masthead" class="<?php echo esc_attr( join( ' ', $classes ) ); ?>" role="banner">
			<div class="container">
				<div class="site-branding">
				<?php
				the_custom_logo();
				?>
				</div>
				<div class="header-right-wrapper">
					<a href="#0" id="nav-toggle"><?php _e( 'Menu', 'tdcc' ); ?><span></span></a>
					<nav id="site-navigation" class="main-navigation" role="navigation">
						<ul class="tdcc-menu">
							<?php wp_nav_menu(
								array(
									'theme_location' => 'primary',
									'container' => '',
									'items_wrap' => '%3$s',
								)
							); ?>
							<a class="cart-header" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><i class="fa fa-shopping-cart"></i> </a>
						</ul>
					</nav>

					
				

				
					<!-- #site-navigation -->
				</div>
			</div>
		</header><!-- #masthead -->
		<?php
	}
}

if ( ! function_exists( 'tdcc_header' ) ) {
	/**
	 * @since 2.0.0
	 */
	function tdcc_header() {
		$transparent = 'no-transparent';
		$classes = array();
		
		$pos = sanitize_text_field( get_theme_mod( 'tdcc_header_position', 'top' ) );
		
		
			$classes[] = 'h-on-top';
		

		$classes[] = $transparent;

		echo '<div id="header-section" class="' . esc_attr( join( ' ', $classes ) ) . '">';

			do_action( 'tdcc_header_section_start' );
		if ( $pos == 'below_hero' ) {
			if ( is_page_template( 'template-frontpage.php' ) ) {
				do_action( 'tdcc_header_end' );
			}
		}

			$hide_header = false;
			$page_id = false;
		if ( is_singular() || is_page() ) {
			$page_id = get_the_ID();
		}
		//if ( tdcc_is_wc_active() ) {
			if ( is_shop() ) {
				$page_id = wc_get_page_id( 'shop' );
			}
		//}

		if ( $page_id ) {
			$hide_header = get_post_meta( $page_id, '_hide_header', true );
		}

		if ( ! $hide_header ) {
			/**
			 * Hooked: tdcc_site_header
			 *
			 * @see tdcc_site_header
			 */
			do_action( 'tdcc_site_start' );
		}

		if ( $pos != 'below_hero' ) {
			if ( is_page_template( 'template-frontpage.php' ) ) {
				do_action( 'tdcc_header_end' );
			}
		}

			do_action( 'tdcc_header_section_end' );
		echo '</div>';
	}
}



