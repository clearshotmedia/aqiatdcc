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
	<?php post_type_archive_title( '<h1 class="entry-title">', '</h1>' );	?>
		</div>
		
		<?php get_template_part( 'template-parts/breadcrumbs' ); 
		 $img = wp_get_attachment_image_src(get_post_thumbnail_id(get_option('page_for_posts')),'full'); 
		 $featured_image = $img[0];
		?>

	</header><!-- .entry-header -->
		
	
	<div class="lead">


</div> 


	<div id="primary" class="content-area container">
		<main id="main" class="site-main">
            <div class="dfg">
        <?php	post_type_archive_title( '<h1 class="currency">', '</h1>' ); ?>
</div>
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
				<div class="news-header">
				<?php
			the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' );
		

		if ( 'news' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
                $date = get_field('news_date'); 
                echo $date;
                ?>


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
	
<?php
get_footer();