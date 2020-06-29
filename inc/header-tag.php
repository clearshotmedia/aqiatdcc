<?php


if ( ! function_exists( 'tdcc_is_transparent_header' ) ) {
	function tdcc_is_transparent_header() {
		$check = false;
		if ( is_front_page() && is_page_template( 'template-frontpage.php' ) ) {
			if ( get_theme_mod( 'tdcc_header_transparent' ) ) {
				$check = true;
			}
		} elseif ( is_page() && has_post_thumbnail() ) {
			if ( ! get_post_meta( get_the_ID(), '_cover', true ) ) {
				return false;
			}
			if ( get_theme_mod( 'tdcc_page_title_bar_disable' ) == 1 ) {
				return false;
			}
			if ( has_post_thumbnail() ) {
				if ( get_theme_mod( 'tdcc_header_transparent' ) ) {
					$check = true;
				}
			}
		} elseif ( is_home() ) {
			if ( get_theme_mod( 'tdcc_page_title_bar_disable' ) == 1 ) {
				return false;
			}

			$new_page = get_option( 'page_for_posts' );
			if ( ! get_post_meta( $new_page, '_cover', true ) ) {
				return false;
			}

			if ( has_post_thumbnail( $new_page ) ) {
				if ( get_theme_mod( 'tdcc_header_transparent' ) ) {
					$check = true;
				}
			}
		}

		return $check;
	}
}

add_action( 'tdcc_site_start', 'tdcc_site_header' );
if ( ! function_exists( 'tdcc_site_header' ) ) {
	/**
	 * Display site header
	 */
	function tdcc_site_header() {
		$header_width = get_theme_mod( 'tdcc_header_width', 'contained' );
		$is_disable_sticky = sanitize_text_field( get_theme_mod( 'tdcc_sticky_header_disable' ) );
		$classes = array(
			'site-header',
			'header-' . $header_width,
		);

		//if ( $is_disable_sticky != 1 ) {
	//		$classes[] = 'is-sticky no-scroll';
	//	} else {
			$classes[] = 'no-sticky no-scroll header-fixed';
	//	}

		$transparent = 'no-t';
		if ( tdcc_is_transparent_header() ) {
			$transparent = 'is-t';
		}
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
                                    'theme_location' => 'main_menu',
                                    'menu_id'        => 'primary-menu',
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



