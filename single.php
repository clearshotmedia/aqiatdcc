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

	
	



<header class="entry-header ">
	<div class="container">
		
		<div class="row justify-content-between">
	<div class="col-lg-9 ">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</div>
		<div class="col-3 d-none d-lg-block">
		<?php if ( 'post' === get_post_type() ) :
		?>
		<div class="entry-meta">
			<?php
			aqia_posted_on();
			
			?>
		</div><!-- .entry-meta -->
	<?php endif; ?>
		</div>
		</div>
		</div>
		
		<?php get_template_part( 'template-parts/breadcrumbs' ); ?>

	</header>
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
