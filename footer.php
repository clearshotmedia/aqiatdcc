<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aqia
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="footer-main container my-1">
			<div class="row ">
			<div class="col-md-4  footer-1">
				
			<?php dynamic_sidebar( 'footer-1' ); ?>
			

			</div>
			<div class="col-md-4 footer-2 ">
			<?php dynamic_sidebar( 'footer-2' ); ?>
			</div>
			<div class="col-md-4 footer-3 ">
			<?php dynamic_sidebar( 'footer-3' ); ?>
			</div>

		</div>

		<div class="site-info row ">
		<div class="col-4 alignleft">
		
		<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( '© 2020 TDCC' ) );
				?>
				
		</div>
		<div class="col-4 aligncenter">
		<a href="<?php echo esc_url( __( 'https://clearshot.media/', 'aqia' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Site built by %s', 'aqia' ), 'ClearShot Media' );
				?>
			</a>
		</div>
		<div class="col-4 social alignright">
		<a href="#"><i class="icofont-facebook"></i></a> <a href="#"><i class="icofont-twitter"></i></a>
		
		</div>

</div>
			
				
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
