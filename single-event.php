<?php
/**
 * Template Name: Level 1 Template
 * @package aqia
 */

get_header();
?>
<header class="entry-header ">
	<div class="container">
	<div class="row justify-content-between">
	<div class="col-lg-9">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</div>
		<div class="col-3 d-none d-lg-block">
		<a href="http://skillsalliance.com.au/store" target="_blank" class="elearn">QFSR Skills Alliance eLearning Portal <i class="icofont-swoosh-right"></i></a>
		</div>
		</div>
		</div>
		
		<?php get_template_part( 'template-parts/breadcrumbs' ); 
		$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' );
		?>

	</header>
	<div class="jumbotron entry-image" style="background:url('<?php echo $url; ?>'); background-position:center;background-size: cover;">
	<?php the_title( '<h1 class="main-title">', '</h1>' ); ?>
	
		
	</div>
	<div id="primary" class="content-area container">
		<main id="main" class="site-main">
		
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'event' );

	
		endwhile; // End of the loop.
		?>
		
		</main><!-- #main -->
	</div><!-- #primary -->
	<footer class="entry-footer">
	
		<div id="partners" class="smaller container ">
		<hr class="brand primary" >
			<div class="row ">
                <div class="col-12">
					<h3>Our Partners</h3>
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
<?php

get_footer();
