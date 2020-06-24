<?php
/**
 * Template Name: Level 2 Template
 * @package aqia
 */


get_header();

?>
<header class="entry-header ">
	<div class="container">
		
		<div class="row justify-content-between">
	<div class="col-lg-9 ">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</div>
		<div class="col-3 d-none d-lg-block">
		<a href="http://skillsalliance.com.au/store"target="_blank" class="elearn">QFSR Skills Alliance eLearning Portal <i class="icofont-swoosh-right"></i></a>
		</div>
		</div>
		</div>
		
		<?php get_template_part( 'template-parts/breadcrumbs' ); ?>

	</header>

	
	<div id="primary" class="content-area container">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

            get_template_part( 'template-parts/content', 'two' );
         

	
		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
