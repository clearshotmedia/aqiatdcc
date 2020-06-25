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
    <span class="tagline">tagline</span><a href="#"><i class="icofont-facebook"></i></a> <a href="#"><i class="icofont-twitter"></i></a>  <a href="#"><i class="icofont-envelope"></i></a>
</div>
		</div>
</div> <div class="row">
<div class=" d-none d-lg-block">
   
   
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
				<span class="tagline">tagline</span>
				<a href="#"><i class="icofont-facebook"></i></a> <a href="#"><i class="icofont-twitter"></i></a>  <a href="#"><i class="icofont-envelope"></i></a></div>
        </div></div>

        </div>

		
		</div>
	
		
		
	</nav>

	</div>
	<div id="content" class="site-content">
	
