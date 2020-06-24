<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aqia
 */

get_header();
?>

<header class="entry-header p">
	<div class="container">
	<?php
				the_archive_title( '<h1 class="entry-title">', '</h1>' );
				
				?>
		</div>
		
		<?php get_template_part( 'template-parts/breadcrumbs' ); 
		 $img = wp_get_attachment_image_src(get_post_thumbnail_id(get_option('page_for_posts')),'full'); 
		 $featured_image = $img[0];
		?>

	</header><!-- .entry-header -->
		
	<div class="jumbotron entry-image" style="background:url('<?php echo $featured_image; ?>');background-position:center;background-size: cover;">
	<?php
				the_archive_title( '<h1 class="b main-title">', '</h1>' );
				
				?>
	
		
	</div>
	<div class="lead">


</div>


	<div id="primary" class="content-area container">
		<main id="main" class="site-main">
			

<div class="row">
<div class=" col">
<?php
		if ( have_posts() ) :
				?>

			
			<?php /* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				?> 
				<div class="blog-header">
				<?php
			the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' );
		

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				aqia_posted_on();?>


			</div></div><!-- .entry-meta -->
		<?php endif; ?>
				<?php
				the_excerpt( sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'aqia' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				) );
				
			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
		
	</div>
	

	<!-- .entry-content -->
</div>



		</main><!-- #main -->
	</div><!-- #primary -->
	<footer class="entry-footer">
		<div id="partners" class="smaller container ">
			<div class="row ">
                <div class="col-12">
					<h3>Members & Partners</h3>
            
 
					<section class="customer-logos slider">

	  <?php
	if( have_rows('partner', 'option') ):	
 	// loop through the rows of data
	while ( have_rows('partner', 'option') ) : the_row();
	?>  <div class="slide"><a href="
	<?php echo the_sub_field('partner_link'); ?>"><img src="<?php echo the_sub_field('partner_image');?>"> </a></div><?php
    endwhile;
		else :
    // no rows found
	endif; ?>
      
   </section>
   


                </div>
            </div></div>
		</footer><!-- .entry-footer -->
<?php
get_footer();