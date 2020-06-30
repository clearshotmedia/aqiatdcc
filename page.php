<?php
/**
 * Template Name: Level 1 Template
 * @package aqia
 */

get_header();
?>

		<?php 
		$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' );
		?>

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
