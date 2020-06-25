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
		<a href="#" target="_blank" class="elearn">Link <i class="icofont-swoosh-right"></i></a>
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
	<div class="lead">


</div>
	<div id="primary" class="content-area ">
		<main id="main" class="site-main">
	
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

	
		endwhile; // End of the loop.
		?>
	
		</main><!-- #main -->
	</div><!-- #primary -->
	
<?php

get_footer();
