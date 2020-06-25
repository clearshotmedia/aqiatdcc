<?php
/**
 * Template Name: MyCricket Template
 * @package aqia
 */


get_header();

?>


	
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
