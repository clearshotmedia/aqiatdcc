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



	
<div class="row">
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
		<div><h4>Services</h4></div>
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
<a href="/survey">
<img src="/wp-content/uploads/2019/07/SkillsSurvey_promo.png"></a>
	</div>

	</div>

	<!-- .entry-content -->
</div>

	
		<footer class="entry-footer">
         <hr class="brand primary" >
		<div id="partners" class="smaller container ">
			<div class="row ">
                <div class="col-12">
					<h3>Members & Partners</h3>
            
 
               <section class="customer-logos slider">
               <?php
	if( have_rows('partner', 'option') ):	
 	// loop through the rows of data
	while ( have_rows('partner', 'option') ) : the_row();
	?>  <div class="slide"><a href="
	<?php echo the_sub_field('partner_link'); ?>"><img src="<?php echo the_sub_field('partner_image');?>"> </a></div><?php
    endwhile;
		else :
    // no rows found
	endif; ?>
     
   </section>
   
   


                </div>
            </div></div>
		</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
