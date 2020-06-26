<?php
/*** @package aqia
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
<div class="main-header">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'aqia' ); ?></a>

	<header id="masthead" class="site-header container">
		<div class="nav-bar-container row ">
	
		<div class="col-lg-4 col-9">
			<?php
			the_custom_logo();
			
			?>
		</div><!-- .site-branding -->

		<div class=" col-3 d-none d-lg-block ">
		<div class="header-widget">
    <span class="tagline"><?php echo the_field('header_tagline', 'option');?></span><a href="<?php echo the_field('facebook_link', 'option'); ?>"><i class="icofont-facebook"></i></a> <a href="<?php echo the_field('twitter_link', 'option'); ?>"><i class="icofont-twitter"></i></a>  <a href="mailto:<?php echo the_field('email_address', 'option'); ?>"><i class="icofont-envelope"></i></a>
</div>
		</div>
</div> <div class="row align-center">
<div class="col-12 d-none d-lg-block">
   
   
		<nav id="site-navigation" class="main-navigation ">
        <?php
			wp_nav_menu( array(
				'theme_location' => 'main_menu',
				'menu_id'        => 'primary-menu',
			) );
			?>

		</nav><!-- #site-navigation -->
		</div>
		<div class="col-3 d-lg-none">
		<div class="nav-toggle ">
				<div class="bar"></div>
				<div class="bar"></div>
				<div class="bar"></div>
			</div> 
			
		</div>
			</div>
	</header><!-- #masthead -->
	
	<nav class="site-nav">
		<div class="section-inner menus group">

        <div class="home-menu-section container">
		
        </div>


        <div class="mob-menu container-fluid">

       
        <div class="row"><div class="col-12">
		<?php
			wp_nav_menu( array(
				'theme_location' => 'main_menu',
				'menu_id'        => 'primary-menu',
			) );
			?>
				<div class="col-12 header-widget">
				<span class="tagline"><?php echo the_field('header_tagline', 'option');?></span>
				<a href="<?php echo the_field('facebook_link', 'option'); ?>"><i class="icofont-facebook"></i></a> <a href="<?php echo the_field('twitter_link', 'option'); ?>"><i class="icofont-twitter"></i></a>  <a href="mailto:<?php echo the_field('email_address', 'option'); ?>"><i class="icofont-envelope"></i></a></div>
        </div></div>

        </div>

		
		</div>
	
		
		
	</nav>

	</div>
	<?php $link = get_field('sub_header_link', 'option'); ?>
	<header class="entry-header ">
	<div class="container">
	<div class="row"> <div class="col align-self-end"><a href="<?php 
	echo $link['url'];
	?>" target="_blank" class="elearn"><?php 
	echo $link['title'];
	?> <i class="icofont-swoosh-right"></i></a></div></div>
		</div>
		
		<?php get_template_part( 'template-parts/breadcrumbs' ); ?>

	</header>
	<div id="content" class="site-content">
	
