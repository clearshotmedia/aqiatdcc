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

		<?php get_template_part( 'template-parts/breadcrumbs' ); 
		$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' );
		?>

	</header>
	<div class="jumbotron entry-image" style="background:url('<?php echo $url; ?>'); background-position:center;background-size: cover;">
	
	
		
	</div>
	<div class="lead">

</div>
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
