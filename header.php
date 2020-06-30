<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package tdcc
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">
<?php	//tdcc_header();
	
		$classes = array(
			'site-header',
			'header-contained',
		);

		//if ( $is_disable_sticky != 1 ) {
	//		$classes[] = 'is-sticky no-scroll';
	//	} else {
			$classes[] = 'no-sticky no-scroll header-fixed';
	//	}

		$transparent = 'no-t';
		$classes[] = $transparent;
		$classes[] = 'h-on-top';

    ?>
		<header id="masthead" class="<?php echo esc_attr( join( ' ', $classes ) ); ?>" role="banner">
			<div class="container">

			<div class="row py-2">

				<div class="col-2">
				<div class="site-branding">
				<?php
				the_custom_logo();
				?>
				</div>
				</div>
				

				<div class="col-10">
					<div class="row">
					<div class="col-12 d-none d-lg-block "><div class="header-widget">
    <span class="tagline"><?php echo the_field('header_tagline', 'option');?></span><a href="<?php echo the_field('facebook_link', 'option'); ?>"><i class="icofont-facebook"></i></a> <a href="<?php echo the_field('twitter_link', 'option'); ?>"><i class="icofont-twitter"></i></a>  <a href="mailto:<?php echo the_field('email_address', 'option'); ?>"><i class="icofont-envelope"></i></a>
</div></div>
					<div class="col-12 pt-2">
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
				</div> </div>
					</div>

				<!-- header right wrapper--->
							</div>

				</div> <!-- row -->
			</div> <!-- container -->
		</header><!-- #masthead -->
		<?php $link = get_field('sub_header_link', 'option'); ?>
	<header class="entry-header ">
	<div class="container">
	<div class="row"> <div class="col align-self-end"><a href="<?php 
	echo $link['url'];
	?>"  class="elearn"><?php 
	echo $link['title'];
	?> <i class="icofont-swoosh-right"></i></a></div></div>
		</div>
		
		<?php get_template_part( 'template-parts/breadcrumbs' ); ?>

	</header>