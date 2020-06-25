<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package aqia
 */

get_header();
?>

	
	



	<div class="lead"></div>
	<div id="primary" class="post content-area container">
		<main id="main" class="site-main">
<!-- .entry-header -->

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			

			
			

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php

get_footer();
