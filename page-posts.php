<?php
/**
 * Template Name: Research Archive
 * @package aqia
 */

get_header();
?>

	<div id="primary" class="content-area container">
		<main id="main" class="site-main">
		<header class=" entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	
		<?php
		if ( have_posts() ) :
				?>

			<div class="row">
			<?php /* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				?> 
				<div class="col-sm-4">
				<?php
				get_template_part( 'template-parts/content', get_post_type() );
				?> </div> <?php
			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
