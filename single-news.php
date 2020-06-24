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
	<div class="lead">


</div>	

	<div class="content-area container">
		<main id="main" class="site-main">
		<?php the_title( '<h1 class="currency">', '</h1>' ); ?>
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'news' );

	
		endwhile; // End of the loop.
		?>
		
		</main><!-- #main -->
	</div><!-- #primary -->
	
<?php

get_footer();
