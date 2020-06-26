<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aqia
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>



	
<div class="row py-4">
<div class=" order-lg-2  col-lg-9">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'aqia' ),
			'after'  => '</div>',
		) );
		?>
	</div>
	<div class="left-sidebar col-lg-3 order-lg-1">

	<div class="navigation-sidebar">
		
	
<div class="nav--menu">
<?php  /* menu */
                    wp_nav_menu( array(
                                'menu'              => 'mycricket',
                                'theme_location'    => 'mycricket',
                                'depth'             => 5,
                                'container'         => 'div',
                                'container_class'   => ' heelo  ',
                                'menu_class'        => 'nav navbar-nav  ',
								)
                    ); 
                 ?>
</div>
               
            





	</div>

	</div>

	<!-- .entry-content -->
</div>

	
		

</article><!-- #post-<?php the_ID(); ?> -->
