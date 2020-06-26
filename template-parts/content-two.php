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
		

		<?php dynamic_sidebar( 'sidebar-left' ); ?>


		
  <ul class="side-nav">
  <li> <a href="/club-and-association-admin">Organisation and Club Admin</a></li>
         <li> <a href="/grants-and-funding">Grants</a></li>
         <li> <a href="/legal">Legal</a></li>
  <li> <a href="/hr">HR</a></li>
  <li> <a href="/workforce-development">Workforce Development</a></li>
         <ul class="side-nav-in">
            <li><a href="/workforce-development/advocacy-and-engagement/"><i class="icofont-thin-right"></i>Advocacy and Engagement </a></li>
            <li><a href="/workforce-development/national-training-package/"><i class="icofont-thin-right"></i>National Training Package</a></li>
            <li><a href="/workforce-development/skilling-qld/"><i class="icofont-thin-right"></i>Skilling QLD'ers for Work</a></li>
         </ul>
  <li> <a href="/research-and-publications">Research and Publications</a></li>
  
</ul>

	</div>

	</div>

	<!-- .entry-content -->
</div>

	
		

</article><!-- #post-<?php the_ID(); ?> -->
