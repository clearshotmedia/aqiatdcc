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
	<?php single_post_title( '<h1 class="entry-title">', '</h1>' );  
	if ( ! function_exists( 'breadcrumb_trail' ) ) {
		require get_template_directory() . '/inc/breadcrumbs.php';
	}
	?>
	
		
		
		</div>
		<div id="breadcrumb">
	<div class="container">
<div class="row ">
	<div class="col ">
	
	<?php
	$breadcrumb_args = array(
		'container'   => 'div',
		'show_browse' => false,
	);
	breadcrumb_trail( $breadcrumb_args );
	?>
	</div>
	</div>
</div>
</div>
		
		<?php get_template_part( 'template-parts/breadcrumbs' ); 
		 $img = wp_get_attachment_image_src(get_post_thumbnail_id(get_option('page_for_posts')),'full'); 
		 $featured_image = $img[0];
		?>

	</header><!-- .entry-header -->
		
	<div class="jumbotron entry-image" style="background:url('<?php echo $featured_image; ?>');background-position:center;background-size: cover;">
	<?php single_post_title( '<h1 class="main-title">', '</h1>' ); ?>
	
		
	</div>


	<div id="primary" class="content-area container">
		<main id="main" class="site-main">
			

<div class="row">
<div class="col index">
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


			</div></div>
			<!-- .entry-meta -->
		<?php endif;
		 if( get_field('author_name')){?>
		

		<p class="author"> Author: <?php the_field('author_name'); ?> </p><?php } ?>
		<hr class="brand primary">
				<p class="exc"><?php
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
				?></p> <?php
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
      <div class="slide"><a href="https://fitness.org.au/"><img src="/wp-content/uploads/2019/07/Fitness-Australia-Logo1.jpg"></a></div>
      <div class="slide"><a href="https://www.qsport.org.au/home/"><img src="/wp-content/uploads/2019/07/qSport_Stacked.png"></a></div>
      <div class="slide"><a href="https://qorf.org.au/"><img src="/wp-content/uploads/2019/07/qorf.png"></a></div>
      <div class="slide"><a href="https://sportscommunity.com.au/aqia-signup/"><img src="/wp-content/uploads/2019/07/Sports-Community-Logo.jpg"></a></div>
      <div class="slide"><a href="https://www.qld.gov.au"><img src="/wp-content/uploads/2019/08/Queensland-Government-Logo.png"></a></div>
      <div class="slide"><a href="http://tdcommunitysolutions.com.au/Public/terry-dillon-solutions/importance-of-community-administration.aspx"><img src="/wp-content/uploads/2019/08/TD_Solutions_Transparent.png"></a></div>
      
   </section>
   


                </div>
            </div></div>
		</footer><!-- .entry-footer -->
<?php
get_footer();
