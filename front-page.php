<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aqia
 */

get_header();
?>

	<div class="content-home">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'home' );

			

		endwhile; // End of the loop.
		?>

<?php

while(have_rows('module')) {
	the_row();

	tdcc_theme_partial('/modules/'.get_row_layout().'.php');
}

?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
